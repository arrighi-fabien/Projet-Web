if (document.querySelector("#search-form")) {
  document
    .querySelector("#search-form")
    .addEventListener("submit", (event) => {
      event.preventDefault();
      // get the value of the attribute data-type of id btn-search
      const type = document
        .querySelector("#btn-search")
        .getAttribute("data-btn");
      let url = "";
      let current_url = "";

      const form = document.querySelector('#search-form');
      const formData = new FormData(form);

      let params_value = [];
      let params_name = [];
      if (type == "company") {
        const company =
          document.querySelector("#search-form__name").value;
        const city = document.querySelector("#search-form__city").value;
        const sector = document.querySelector(
          "#search-form__sector"
        ).value;
        const nb_students = document.querySelector(
          "#search-form__nb-students"
        ).value;
        const rate = document.querySelector("#search-form__rate").value;
        const trust = document.querySelector(
          "#search-form__confidence"
        ).value;
        //get domain url
        url = window.location.origin + "/api/search/companies";
        current_url = window.location.href.split("?")[0];
        //create a tab with all params name and variables and use a foreach to add them to the url
        params_value = [
          company,
          city,
          sector,
          nb_students,
          rate,
          trust,
        ];
        params_name = [
          "company_name",
          "city_name",
          "sector_name",
          "student_accepted",
          "rate",
          "trust",
        ];
      } else if (type == "offer") {
        const internship =
          document.querySelector("#search-form__name").value;
        const company = document.querySelector(
          "#search-form__company"
        ).value;
        const city = document.querySelector("#search-form__city").value;
        const nb_places = document.querySelector(
          "#search-form__nb-places"
        ).value;
        const offer_date = document.querySelector(
          "#search-form__offer-date"
        ).value;
        const skills = document.querySelector(
          "#search-form__skills"
        ).value;
        const duration =
          document.querySelector("#search-form__duration").value == 0
            ? ""
            : document.querySelector("#search-form__duration")
              .value;
        const salary =
          document.querySelector("#search-form__salary").value == 0
            ? ""
            : document.querySelector("#search-form__salary").value;

        //get domain url
        url = window.location.origin + "/api/search/offers";
        current_url = window.location.href.split("?")[0];
        //create a tab with all params name and variables and use a foreach to add them to the url
        params_value = [
          internship,
          company,
          city,
          nb_places,
          offer_date,
          skills,
          duration,
          salary,
        ];
        params_name = [
          "internship_name",
          "company_name",
          "city_name",
          "nb_places",
          "offer_date",
          "skills",
          "duration",
          "salary",
        ];
      }
      search(event, params_name, params_value, url, current_url, type, 1);
    });
}

function paginationOffer(class_name) {
  const nb_page = document.querySelector(class_name).innerHTML;
  //get button .btn--pagination--last and get the value of the attribute data-data-pagination-max
  const $max_page = document.querySelector(class_name).getAttribute("data-pagination-max");
  let params_value = [];
  let params_name = [];
  const type = document
    .querySelector("#btn-search")
    .getAttribute("data-btn");
  if (type == "offer") {
    params_name = [
      "internship_name",
      "company_name",
      "city_name",
      "nb_places",
      "offer_date",
      "skills",
      "duration",
      "salary",
    ];
    params_value = [
    ];
    params_name.forEach((param_name) => {
      // verify if the param is in the url and if it is not empty then add it to the tab params_value
      if (window.location.href.indexOf(param_name) > -1 && window.location.href.split(param_name + "=")[1].split("&")[0] !== "") {
        params_value.push(window.location.href.split(param_name + "=")[1].split("&")[0]);
      } else {
        params_value.push("");
      }
    });
  }
  search(event, params_name, params_value, window.location.origin + "/api/search/offers", window.location.href.split("?")[0], type, nb_page);
}


function search(event, params_name, params_value, url, current_url, type, nb_page) {
  //get value of <a> with the id "pagination__current" 
  params_value.push(nb_page);
  params_name.push("page");

  let params = {};
  let url_params = "";
  let i = 0;
  //check with ternary operator if the param is the first one or not
  params_value.forEach((param) => {
    if (param !== "") {
      url_params +=
        url_params.indexOf("?") > -1
          ? "&" + params_name[i] + "=" + param
          : "?" + params_name[i] + "=" + param;
      params[params_name[i]] = param;
    }
    i++;
  });

  url += url_params;
  current_url += url_params;
  //replace the current url with the new one
  window.history.replaceState({}, "", current_url);

  $.ajax({
    url: url,
    data: params,
    type: "GET",
    dataType: "json",
    success: function (data) {
      // get in data the last element which is the max page
      const max_page = data.pop();
      // delete all the previous results
      document.querySelector("#result").innerHTML = "";
      //check if there is no result
      if (data.length === 0) {
        document.querySelector("#result").innerHTML =
          '<h3 class="no-result">Aucun résultat</h3>';
      }
      if (type == "company") {
        data.forEach((result) => {
          displayCompanyCard(result);
        });
      } else if (type == "offer") {
        let card_number = 0;
        data.forEach((result) => {
          displayOfferCard(result, card_number);
          card_number++;
        });
        //call the function to add the event listener on the card-link
        displayPreviewOffer();
        offers_json = data;
        //check if the max page is egal to 1 then hide the pagination div with class "btn__pagination"
        if (max_page <= 1) {
          document.querySelector(".btn__pagination").style.display = "none";
        } else {
          tab_class = [".btn--pagination--first", ".btn--pagination--previous", ".btn--pagination--current", ".btn--pagination--next", ".btn--pagination--last"];
          tab_value = [1, nb_page - 1, nb_page, parseInt(nb_page) + 1, max_page];
          console.log(tab_value);
          tab_class.forEach((class_name) => {
            console.log(class_name);
            if (document.querySelector(class_name) != null) {
              //change texte inside the button depending on the value of the tab_value at the same index
              document.querySelector(class_name).innerHTML = tab_value[tab_class.indexOf(class_name)];
            }
          });
          if (nb_page <= 1) {
            document.querySelector(".btn--pagination--previous").style.display = "none";
          } else {
            document.querySelector(".btn--pagination--previous").style.display = "inline-block";
          }
          if (nb_page <= 2) {
            document.querySelector(".btn--pagination--first").style.display = "none";
            document.querySelector(".btn--pagination--first--separator").style.display = "none";
          } else {
            document.querySelector(".btn--pagination--first").style.display = "inline-block";
            document.querySelector(".btn--pagination--first--separator").style.display = "inline-block";
          }
          if (nb_page >= max_page - 1) {
            document.querySelector(".btn--pagination--last").style.display = "none";
            document.querySelector(".btn--pagination--last--separator").style.display = "none";
          } else {
            document.querySelector(".btn--pagination--last").style.display = "inline-block";
            document.querySelector(".btn--pagination--last--separator").style.display = "inline-block";
          }
          if (nb_page >= max_page) {
            document.querySelector(".btn--pagination--next").style.display = "none";
          }
          else {
            document.querySelector(".btn--pagination--next").style.display = "inline-block";
          }
        }
      }
    },
    error: function (data) {
      //pass
    },
  });
}

function displayOfferCard(data, card_number) {
  document.querySelector('#result').innerHTML += `
    <div class="card-company card-background">
      <span data-id="${card_number}" class="card-link card-preview"> </span>
      <div class="card-company__content">
        <img src="/img/company/${data.company_name}.webp" alt="${data.company_name} logo" class="card-company__content__img">
        <div class="card-company__content__info">
          <h4 class="card-company__content__info__job">${data.internship_name}</h4>
          <h5 class="card-company__content__info__title">${data.company_name}</h5>
          <p class="card-company__content__city">${data.city_name}</p>
          <p class="small-text">${data.offer_date}</p>
        </div>
      </div>
      <a href="##" class="card-bookmark">
        <svg><use href="/img/sprite.svg#bookmark_fill"></use></svg>
      </a>
    </div>
  `;
}


function displayCompanyCard(data) {
  let nb_offer = (data.offers > 1) ? 's' : '';
  document.querySelector('#result').innerHTML += `
    <div class="card-company card-background">
    <a href="/company-${data.id_company}" class="card-link"><span></span></a>
    <div class="card-company__content">
        <img src="${data.company_logo}" alt="${data.company_name} logo" class="card-company__content__img">
      <div class="card-company__content__info">
        <h4 class="card-company__content__info__title">${data.company_name}</h4>
        <div class="text-and-svg">
          <svg><use href="/img/sprite.svg#building"></use></svg>
          <p class="card-company__content__sector">${data.sector_name}</p>
        </div>
        <div class="text-and-svg">
          <svg><use href="/img/sprite.svg#map"></use></svg>
          <p class="card-company__content__city">${data.city}</p>
        </div>
      </div>
    </div>
    <p class="card-company__offer">${data.offers} offre${nb_offer}</p>
    </div>
  `;
}