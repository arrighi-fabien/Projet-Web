const nav_menu = document.querySelector('.header__menu');
const nav_link = document.querySelector('.header__nav');
const nav__account = document.querySelector('.header__account');
nav_menu.addEventListener('click', () => {
    nav_menu.classList.toggle('header__menu--active');
    document.body.classList.toggle('no-scroll');
    nav_link.classList.toggle('header__nav--open');
    nav__account.classList.toggle('header__account--open');
});

if (document.querySelector('.card-company')) {
    document.querySelectorAll('.card-company').forEach((card) => {
        card.addEventListener('click', () => {
            document.querySelector('.offer-description').classList.toggle('offer-description--active');
        });
    });
}

function closeOfferPreview() {
    document.querySelector('.offer-description').scrollTop = 0;
    document.querySelector('.offer-description').classList.toggle('offer-description--active');
}

function showFilters() {
    document.querySelector('.search-bar').classList.toggle('search-bar--active');
    if (document.querySelector('.filter-btn').value == 'Afficher les filtres') {
        document.querySelector('.filter-btn').value = 'Fermer les filtres';
    }
    else {
        document.querySelector('.filter-btn').value = 'Afficher les filtres';
    }
    window.scrollTo(0, 0);
}

function displayPreviewOffer() {
    document.querySelectorAll('.card-preview').forEach((card) => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            document.querySelector('#offer-description__title').innerHTML = offers_json[id].internship_name;
            // Put the company name in link
            document.querySelector('#offer-description__company').innerHTML = `<a href="/company-${offers_json[id].id_company}">${offers_json[id].company_name}</a>`;
            document.querySelector('#offer-description__city').innerHTML = offers_json[id].city_name;
            document.querySelector('#offer-description__date').innerHTML = offers_json[id].offer_date;
            document.querySelector('#offer-description__duration').innerHTML = offers_json[id].duration + ' semaine' + (offers_json[id].duration > 1 ? 's' : '');
            document.querySelector('#offer-description__salary').innerHTML = offers_json[id].salary + ' € / mois';
            document.querySelector('#offer-description__skills').innerHTML = offers_json[id].skills;
            document.querySelector('#offer-description__places').innerHTML = offers_json[id].places_students + ' place' + (offers_json[id].places_students > 1 ? 's' : '') + ' disponible' + (offers_json[id].places_students > 1 ? 's' : '');
            document.querySelector('#offer-description__description').innerHTML = offers_json[id].description;
            document.querySelector('#apply-btn').setAttribute('href', '/offer-' + offers_json[id].id_internship + '/apply');
            document.querySelector('#offer-description__concern').innerHTML = offers_json[id].promotion_name;

            // Change href of title
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

if (document.querySelector('.rating')) {
    const stars = document.querySelectorAll('.star');
    $already_rate = false;
    stars.forEach(function (star) {
        star.addEventListener('click', setRating);
        if (star.classList.contains('rated')) {
            $already_rate = true;
        }
    });
    if ($already_rate == false) {
        stars.forEach(function (star) {
            star.addEventListener('mouseover', hoverRating);
            star.addEventListener('mouseout', resetRating);
        }
        );
    }

    function setRating(ev) {
        const stars = document.querySelectorAll(".star");
        const rate = ev.currentTarget.getAttribute("data-value");
        stars.forEach((star) => {
            if (star.getAttribute("data-value") <= rate) {
                star.classList.add("rated");
            } else {
                star.classList.remove("rated");
            }
        });
        stars.forEach((star) => {
            star.removeEventListener('mouseover', hoverRating);
            star.removeEventListener('mouseout', resetRating);
        });
        const id_company = window.location.href.split('-')[1];
        url = window.location.origin + "/api/rating";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                rate: rate,
                id_company: id_company
            },
            dataType: "json",
            success: function (data) {
                if (data["status"] == "not_logged_in") {
                    window.location.href = window.location.origin + "/login";
                }
            },
            error: function () {
                stars.forEach(function (star) {
                    star.classList.remove('rated');
                });
                star.removeEventListener('click', setRating);
            }
        });
    }

    function hoverRating(event) {
        const hoverValue = event.currentTarget.dataset.value;
        stars.forEach(function (star) {
            if (star.dataset.value <= hoverValue) {
                star.classList.add('rated');
            } else {
                star.classList.remove('rated');
            }
        });
    }

    function resetRating() {
        stars.forEach(function (star) {
            star.classList.remove('rated');
        });
    }
}

if (document.querySelector('#trust')) {
    trust_checkboxe = document.querySelector('#trust');
    trust_checkboxe.addEventListener('click', function () {
        if (trust_checkboxe.checked) {
            checked = true;
        }
        else {
            checked = false;
        }
        const id_company = window.location.href.split('-')[1];
        url = window.location.origin + "/api/trusting";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                checked: checked,
                id_company: id_company
            },
            dataType: "json",
            success: function (data) {
                if (data["status"] == "not_logged_in") {
                    window.location.href = window.location.origin + "/login";
                }
            },
            error: function (data) {
                console.log('error');
                trust_checkboxe.checked = !checked;
            }
        });
    });
}