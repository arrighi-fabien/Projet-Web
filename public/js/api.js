if (document.querySelector('#search-form')) {
  document.querySelector('#search-form').addEventListener('submit', (event) => {
      event.preventDefault();
      const company = document.querySelector('#search-form__name').value;
      const city = document.querySelector('#search-form__city').value;
      const sector = document.querySelector('#search-form__sector').value;
      const nb_students = document.querySelector('#search-form__nb-students').value;
      const rate = document.querySelector('#search-form__rate').value;
      const trust = document.querySelector('#search-form__confidence').value;
      //get domain url
      let url = window.location.origin + '/api/search';
      let current_url = window.location.href.split('?')[0];

      //create a tab with all params name and variables and use a foreach to add them to the url
      let params_value = [company, city, sector, nb_students, rate, trust];
      let params_name = ['company_name', 'city_name', 'sector_name', 'student_accepted', 'rate', 'trust'];
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
      console.log(url);
      console.log(params);

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
            document.querySelector('#company-result').innerHTML = '';
            //check if there is no result
            if (data.length === 0) {
              document.querySelector('#company-result').innerHTML = '<h3 class="no-result">Aucun résultat</h3>';
            }
            // create a new div for each result
            data.forEach(result => {
              // if result.offers > 1 then "offres" else "offre"
              let offers = (result.offers > 1) ? 's' : '';
              // add the result in #company-result
              document.querySelector('#company-result').innerHTML += `
              <div class="card-company card-background" id="company-">
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
          },
          error: function (data) {
            //pass
          }
      });
  });
}