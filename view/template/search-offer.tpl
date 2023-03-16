{include file="header.tpl"}

<main>
    <img src="src/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="src/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section search-section--offer m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            <div class="search-bar__input">
                <input type="text" placeholder="Rechercher par nom...">
                <input type="text" placeholder="Rechercher par entreprise...">
                <input type="text" placeholder="Rechercher par lieu...">
                <input type="text" placeholder="Nombre de place...">
                <select>
                    <option value="">Date de l'offre</option>
                </select>
                <select>
                    <option value="">Compétences</option>
                </select>
                <input type="range" min="0" max="100" value="50" class="slider" id="myRange">
                <input type="range" min="0" max="100" value="50" class="slider" id="myRange">
            </div>
            <input type="button" value="Reset" class="btn btn--secondary">
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display">
                    {foreach $offers as $offer}
                        <div class="card-company card-background">
                            <a href="#" class="card-link"><span></span></a>
                            <div class="card-company__content">
                                <img src="src/img/thales.png" alt="thales logo" class="card-company__content__img">
                                <div class="card-company__content__info">
                                    <h4 class="card-company__content__info__job">{$offer->name}</h4>
                                    <h5 class="card-company__content__info__title">{$offer->company}</h5>
                                    <p class="card-company__content__city">{$offer->location}</p>
                                    <p class="small-text">{$offer->post_date}</p>
                                </div>
                            </div>
                            <a href="##"  class="card-bookmark"class="card-bookmark">
                                <svg><use href="src/img/sprite.svg#bookmark"></use></svg>
                            </a>
                        </div>
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="src/img/fade.png" alt="" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
            <div class="offer-description">
                <h1 class="important-title">{$offer_preview->name}</h1>
                <div class="offer-description__company">
                    <p>{$offer_preview->company}</p>
                    <p>{$offer_preview->location}</p>
                    <p>{$offer_preview->post_date}</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="src/img/sprite.svg#calendar"></use></svg>
                        <p class="card-company__content__sector">{$offer_preview->duration}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="src/img/sprite.svg#money"></use></svg>
                        <p class="card-company__content__sector">{$offer_preview->salary} / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="src/img/sprite.svg#checklist"></use></svg>
                        <p class="card-company__content__sector">{$offer_preview->skill}</p>
                    </div>
                </div>
                <p>{$offer_preview->description}</p>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
            </div>
        </div>
    </div>
</main>

{if $user == null}
    {extends file="login.tpl"}
{/if}

{include file="footer.tpl"}