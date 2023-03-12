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