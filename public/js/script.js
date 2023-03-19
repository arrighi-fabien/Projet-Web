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

if (document.querySelector('.card-company')) {
    document.querySelector('.card-company').addEventListener('click', () => {
        document.querySelector('.offer-description').classList.toggle('offer-description--active');
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