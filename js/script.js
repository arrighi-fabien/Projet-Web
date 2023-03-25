const nav_menu = document.querySelector('.header__menu');
const nav_link = document.querySelector('.header__nav');
const nav__account = document.querySelector('.header__account');
nav_menu.addEventListener('click', () => {
    nav_menu.classList.toggle('header__menu--active');
    document.body.classList.toggle('no-scroll');
    nav_link.classList.toggle('header__nav--open');
    nav__account.classList.toggle('header__account--open');
});

if (document.querySelector('.popup-form__close')) {
    document.querySelector('.popup-form__close').addEventListener('click', () => {
        document.querySelector('.popup-background').classList.toggle('popup-background--active');
        setTimeout(() => {
            document.querySelector('.popup-form').classList.toggle('hidden');
        }, 500);
    });
}

if (document.querySelector('.header__account')) {
    document.querySelector('.header__account').addEventListener('click', () => {
        document.querySelector('.popup-form').classList.toggle('hidden');
        document.querySelector('.popup-background').classList.toggle('popup-background--active');
    });
}

if (document.querySelector('.apply-btn')) {
    document.querySelector('.apply-btn').addEventListener('click', () => {
        document.querySelector('.popup-form').classList.toggle('hidden');
        document.querySelector('.popup-background').classList.toggle('popup-background--active');
    });
}

if (document.querySelector('.card-company')) {
    document.querySelectorAll('.card-company').forEach((card) => {
        card.addEventListener('click', () => {
            document.querySelector('.offer-description').classList.toggle('offer-description--active');
        });
    });
}

if (document.querySelector('.offer-preview-close')) {
    document.querySelector('.offer-preview-close').addEventListener('click', () => {
        document.querySelector('.offer-description').scrollTop = 0;
        document.querySelector('.offer-description').classList.toggle('offer-description--active');
    });
}

if (document.querySelector('.filter-btn')) {
    document.querySelector('.filter-btn').addEventListener('click', () => {
        document.querySelector('.search-bar').classList.toggle('search-bar--active');
        if (document.querySelector('.filter-btn').value == 'Afficher les filtres') {
            document.querySelector('.filter-btn').value = 'Fermer les filtres';
        }
        else {
            document.querySelector('.filter-btn').value = 'Afficher les filtres';
        }
        window.scrollTo(0, 0);
    });
}



function displayPreviewOffer() {
    document.querySelectorAll('.card-preview').forEach((card) => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            document.querySelector('#offer-description__title').innerHTML = offers_json[id].internship_name;
            // put the company name in link
            document.querySelector('#offer-description__company').innerHTML = `<a href="/company-${offers_json[id].id_company}">${offers_json[id].company_name}</a>`;
            document.querySelector('#offer-description__city').innerHTML = offers_json[id].city_name;
            document.querySelector('#offer-description__date').innerHTML = offers_json[id].offer_date;
            document.querySelector('#offer-description__duration').innerHTML = offers_json[id].duration + ' semaine' + (offers_json[id].duration > 1 ? 's' : '');
            document.querySelector('#offer-description__salary').innerHTML = offers_json[id].salary + ' € / mois';
            document.querySelector('#offer-description__skills').innerHTML = offers_json[id].skills;
            document.querySelector('#offer-description__description').innerHTML = offers_json[id].description;

            //change href of title
            document.querySelector('#offer-description__title').href = '/offer-' + offers_json[id].id_internship;
        });
    });
}

if (document.querySelector('.card-preview')) {
    displayPreviewOffer();
}

if (document.querySelector('.card-bookmark')) {
    document.querySelectorAll('.card-bookmark').forEach((card) => {
        card.addEventListener('click', () => {
            const info = card.getAttribute('data-offer');
            const id_offer = info.split('-')[0];
            const action = info.split('-')[1];
            $.ajax({
                url: '/api/wishlist',
                type: 'POST',
                data: {
                    id_offer: id_offer,
                    action: action
                },
                dataType: 'text',
                success: function (data) {
                    console.log(data);
                    if (data == 'success') {
                        if (action == 0) {
                            card.setAttribute('data-offer', id_offer + '-1');
                            card.innerHTML = '<use href="/img/sprite.svg#bookmark"></use>';
                        }
                        else if (action == 1) {
                            card.setAttribute('data-offer', id_offer + '-0');
                            card.innerHTML = '<use href="/img/sprite.svg#bookmark_stroke"></use>';
                        }
                    }
                }
            });
        });
    });
}