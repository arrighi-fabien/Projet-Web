if (document.querySelector("#search-form")) {
  document.querySelector("#search-form").addEventListener("submit", (event) => {
      event.preventDefault();
      const type = document.querySelector('#btn-search').getAttribute('data-btn');
      let url = '';
      let current_url = '';

      const form = document.querySelector('#search-form');
      const formData = new FormData(form);

      if (type == 'company') {
        url = window.location.origin + '/api/search/companies';
      }
      else if (type == 'offer') {
        url = window.location.origin + '/api/search/offers';
      }
      else if (type == 'user') {
        url = window.location.origin + '/api/search/users';
      }
      current_url = window.location.href.split('?')[0];
      let url_params = '';
      // Check with ternary operator if the param is the first one or not
      // If it's the first one to be not empty, add a '?' before the param
      // Else add a '&' before the param
      // Add the param to the url
      formData.forEach((value, key) => {
        if (value !== '' && value !== '0') {
          url_params += (url_params.indexOf('?') > -1) ? '&' + key + '=' + value : '?' + key + '=' + value;
        }
      });

      url += url_params;
      current_url += url_params;
      window.history.replaceState({}, "", current_url);
      search(url, type, 1);
    });
}

function paginationOffer(class_name) {
  let nb_page = document.querySelector(class_name).innerHTML;
  nb_page = parseInt(nb_page);
  let params_value = [];
  let params_name = [];
  const type = document
    .querySelector("#btn-search")
    .getAttribute("data-btn");
  params_value = [];
  if (type == "offer") {
    url = window.location.origin + "/api/search/offers";
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
  } else if (type == "company") {
    url = window.location.origin + "/api/search/companies";
    params_name = [
      "company_name",
      "city_name",
      "sector_name",
      "student_accepted",
      "rate",
      "trust",
    ];
  }
  params_name.forEach((param_name) => {
    // verify if the param is in the url and if it is not empty then add it to the tab params_value
    if (window.location.href.indexOf(param_name) > -1 && window.location.href.split(param_name + "=")[1].split("&")[0] !== "") {
      params_value.push(window.location.href.split(param_name + "=")[1].split("&")[0]);
    } else {
      params_value.push("");
    }
  });
  current_url = window.location.href.split("?")[0];
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
  search(url, type, nb_page);
}


function search(url, type, nb_page) {
  $.ajax({
    url: url,
    type: "GET",
    dataType: "json",
    success: function (data) {
      // get in data the last element which is the max page
      let max_page = data.pop();
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
        offers_json = data;
        displayPreviewOffer();
      } else if (type == "user") {
        data.forEach((result) => {
          displayUserCard(result);
        });
      }
      if (max_page == 0) {
        document.querySelector(".btn__pagination").style.display = "none";
      } else {
        document.querySelector(".btn__pagination").style.display = "inline-block";
        tab_class = [".btn--pagination--first", ".btn--pagination--previous", ".btn--pagination--current", ".btn--pagination--next", ".btn--pagination--last"];
        tab_value = [1, nb_page - 1, nb_page, parseInt(nb_page) + 1, max_page];
        tab_class.forEach((class_name) => {
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
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
      });
    },
    error: function (data) {
      //pass
    },
  });
}

function displayOfferCard(data, card_number) {
  // get origin page
  let origin = window.location.href.split("?")[0];
  // if origin is the admin page then add the admin/offer- before the id of the internship
  let link = "";
  if (origin.indexOf("admin") > -1) {
    link = `<a href="/admin/offer-${data.id_internship}" class="card-link"></a>`;
  } else {
    link = `<span data-id="${card_number}" class="card-link card-preview"> </span>`;
  }
  document.querySelector('#result').innerHTML += `
    <div class="card-company card-background">`
      + link +
      `<div class="card-company__content">
        <img src="/img/company/${data.company_name}.webp" alt="${data.company_name} logo" class="card-company__content__img">
        <div class="card-company__content__info">
          <h4 class="card-company__content__info__job">${data.internship_name}</h4>
          <h5 class="card-company__content__info__title">${data.company_name}</h5>
          <p class="card-company__content__city">${data.city_name}</p>
          <p class="small-text">${data.offer_date}</p>
        </div>
      </div>
      <svg><use href="/img/sprite.svg#bookmark_fill"></use></svg>
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

function displayUserCard(data) {
  document.querySelector('#result').innerHTML += `
  <div class="card-company card-background">
    <a href="/admin/user-${data.id_user}" class="card-link"></a>
    <div class="card-company__content">
      <img src="/img/user.webp" alt="Default logo" class="card-company__content__img">
      <div class="card-company__content__info">
        <h4 class="card-company__content__info__title">${data.last_name} ${data.first_name}</h4>
        <div class="text-and-svg">
          <svg><use href="/img/sprite.svg#building"></use></svg>
          <p class="card-company__content__sector">${data.promotion_name}</p>
        </div>
        <div class="text-and-svg">
          <svg><use href="/img/sprite.svg#map"></use></svg>
          <p class="card-company__content__city">${data.center_name}</p>
        </div>
      </div>
    </div>
  </div>
  `;
}