if (document.querySelector('#search-form')) {
  document.querySelector('#search-form').addEventListener('submit', (event) => {
      event.preventDefault();
      // get the value of the attribute data-type of id btn-search
      const type = document.querySelector('#btn-search').getAttribute('data-btn');
      let url = '';
      let current_url = '';
      let params_value = [];
      let params_name = [];
      if (type == 'company') {
        const company = document.querySelector('#search-form__name').value;
        const city = document.querySelector('#search-form__city').value;
        const sector = document.querySelector('#search-form__sector').value;
        const nb_students = document.querySelector('#search-form__nb-students').value;
        const rate = document.querySelector('#search-form__rate').value;
        const trust = document.querySelector('#search-form__confidence').value;
        //get domain url
        url = window.location.origin + '/api/search/companies';
        current_url = window.location.href.split('?')[0];
        //create a tab with all params name and variables and use a foreach to add them to the url
        params_value = [company, city, sector, nb_students, rate, trust];
        params_name = ['company_name', 'city_name', 'sector_name', 'student_accepted', 'rate', 'trust'];
      }
      else if (type == 'offer') {
        const internship = document.querySelector('#search-form__name').value;
        const company = document.querySelector('#search-form__company').value;
        const city = document.querySelector('#search-form__city').value;
        const nb_places = document.querySelector('#search-form__nb-places').value;
        const offer_date = document.querySelector('#search-form__offer-date').value;
        const skills = document.querySelector('#search-form__skills').value;
        const duration = (document.querySelector('#search-form__duration').value == 0) ? '' : document.querySelector('#search-form__duration').value;
        const salary = (document.querySelector('#search-form__salary').value == 0) ? '' : document.querySelector('#search-form__salary').value;

        //get domain url
        url = window.location.origin + '/api/search/offers';
        current_url = window.location.href.split('?')[0];
        //create a tab with all params name and variables and use a foreach to add them to the url
        params_value = [internship, company, city, nb_places, offer_date, skills, duration, salary];
        params_name = ['internship_name', 'company_name', 'city_name', 'nb_places', 'offer_date', 'skills', 'duration', 'salary'];
      }
      let params = {};
      let url_params = '';
      let i = 0;
      //check with ternary operator if the param is the first one or not
      params_value.forEach(param => {
        if (param !== '') {
          url_params += (url_params.indexOf('?') > -1) ? '&' + params_name[i] + '=' + param : '?' + params_name[i] + '=' + param;
          params[params_name[i]] = param;
        }
        i++;
      });

      url += url_params;
      current_url += url_params;

      //replace the current url with the new one
      window.history.replaceState({}, '', current_url);

      $.ajax({
          url: url,
          data: params,
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            console.log(data);
            // delete all the previous results
            document.querySelector('#result').innerHTML = '';
            //check if there is no result
            if (data.length === 0) {
              document.querySelector('#result').innerHTML = '<h3 class="no-result">Aucun résultat</h3>';
            }
            if (type == 'company') {
              // create a new div for each result
              data.forEach(result => {
                // if result.offers > 1 then "offres" else "offre"
                let offers = (result.offers > 1) ? 's' : '';
                // add the result in #company-result
                document.querySelector('#result').innerHTML += `
                <div class="card-company card-background">
                <a href="#" class="card-link"><span></span></a>
                <div class="card-company__content">
                        <img src="${result.company_logo}" alt="${result.company_name} logo" class="card-company__content__img">
                    <div class="card-company__content__info">
                        <h4 class="card-company__content__info__title">${result.company_name}</h4>
                        <div class="text-and-svg">
                            <svg><use href="/img/sprite.svg#building"></use></svg>
                            <p class="card-company__content__sector">${result.sector_name}</p>
                        </div>
                        <div class="text-and-svg">
                            <svg><use href="/img/sprite.svg#map"></use></svg>
                            <p class="card-company__content__city">${result.city}</p>
                        </div>
                    </div>
                </div>
                <p class="card-company__offer">${result.offers} offre${offers}</p>
                </div>
                `;
              });
            }
            else if (type == 'offer') {
              // create a new div for each result
              let count = 0;
              data.forEach(result => {
                document.querySelector('#result').innerHTML += `
                <div class="card-company card-background">
                  <span data-id="${count}" class="card-link card-preview"> </span>
                  <div class="card-company__content">
                      <img src="/img/company/${result.company_name}.webp" alt="${result.company_name} logo" class="card-company__content__img">
                      <div class="card-company__content__info">
                          <h4 class="card-company__content__info__job">${result.internship_name}</h4>
                          <h5 class="card-company__content__info__title">${result.company_name}</h5>
                          <p class="card-company__content__city">${result.city_name}</p>
                          <p class="small-text">${result.offer_date}</p>
                      </div>
                  </div>
                  <a href="##" class="card-bookmark">
                    <svg><use href="/img/sprite.svg#bookmark_fill"></use></svg>
                  </a>
                </div>
                `;
                count++;
              });
              //call the function to add the event listener on the card-link
              displayPreviewOffer();
              offers_json = data;
            }
          },
          error: function (data) {
            //pass
          }
      });
  });
}