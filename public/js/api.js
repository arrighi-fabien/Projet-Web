if (document.querySelector('#search-form')) {
  document.querySelector('#search-form').addEventListener('submit', (event) => {
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

    // Replace the current url with the new one
    window.history.replaceState({}, '', current_url);

    $.ajax({
      url: url,
      body: formData,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        document.querySelector('#result').innerHTML = '';
        if (data.length === 0) {
          document.querySelector('#result').innerHTML = '<h3 class="no-result">Aucun résultat</h3>';
        }
        if (type == 'company') {
          data.forEach(result => {
            displayCompanyCard(result);
          });
        }
        else if (type == 'offer') {
          let card_number = 0;
          data.forEach(result => {
            displayOfferCard(result, card_number);
            card_number++;
          });
          // Call the function to add the event listener on the card-link
          displayPreviewOffer();
          offers_json = data;
        }
        else if (type == 'user') {
          data.forEach(result => {
            displayUserCard(result);
          });
        }
      },
      error: function (error) {
        console.log("error");
      }
    });
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

function displayUserCard(data) {
  document.querySelector('#result').innerHTML += `
  <div class="card-company card-background">
    <span class="card-link card-preview"> </span>
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