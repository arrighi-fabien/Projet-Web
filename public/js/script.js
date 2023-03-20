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

if (document.querySelector('.card-preview')) {
    document.querySelectorAll('.card-preview').forEach((card) => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            document.querySelector('#offer-description__title').innerHTML = offers[id].internship_name;
            document.querySelector('#offer-description__company').innerHTML = offers[id].company_name;
            document.querySelector('#offer-description__city').innerHTML = offers[id].city_name;
            document.querySelector('#offer-description__date').innerHTML = offers[id].offer_date;
            document.querySelector('#offer-description__duration').innerHTML = offers[id].duration + ' semaine' + (offers[id].duration > 1 ? 's' : '');
            document.querySelector('#offer-description__salary').innerHTML = offers[id].salary + ' € / mois';
            document.querySelector('#offer-description__skills').innerHTML = offers[id].skills;
            document.querySelector('#offer-description__description').innerHTML = offers[id].description;

            //change href of title
            document.querySelector('#offer-description__title').href = '/offer-' + offers[id].id_internship;
        });
    });
}