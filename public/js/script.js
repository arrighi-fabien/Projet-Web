const nav_menu = document.querySelector('.header__menu');
const nav_link = document.querySelector('.header__nav');
const nav__account = document.querySelector('.header__account');
nav_menu.addEventListener('click', () => {
    nav_menu.classList.toggle('header__menu--active');
    document.body.classList.toggle('no-scroll');
    nav_link.classList.toggle('header__nav--open');
    nav__account.classList.toggle('header__account--open');
});

document.querySelector('.popup-form__close').addEventListener('click', () => {
    document.querySelector('.popup-background').classList.toggle('popup-background--active');
});


document.querySelector('.header__account').addEventListener('click', () => {
    document.querySelector('.popup-background').classList.toggle('popup-background--active');
});

document.querySelector('.card-company').addEventListener('click', () => {
    document.querySelector('.offer-description').classList.toggle('offer-description--active');
});

document.querySelector('.offer-preview-close').addEventListener('click', () => {
    //scroll to the top of the div
    document.querySelector('.offer-description').scrollTop = 0;
    document.querySelector('.offer-description').classList.toggle('offer-description--active');
});

document.querySelector('.filter-btn').addEventListener('click', () => {
    document.querySelector('.search-bar').classList.toggle('search-bar--active');
    //change value of button
    if (document.querySelector('.filter-btn').value == 'Afficher les filtres') {
        document.querySelector('.filter-btn').value = 'Fermer les filtres';
    }
    else {
        document.querySelector('.filter-btn').value = 'Afficher les filtres';
    }
    // keep to the top of the page
    window.scrollTo(0, 0);
});