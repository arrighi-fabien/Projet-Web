{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

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
                <label for="myRange">Range</label>
                <input name="ok1" type="range" min="0" max="100" value="50" id="myRange">
                <label for="myRange2">Range2</label>
                <input name="ok2" type="range" min="0" max="100" value="50" id="myRange2">
            </div>
            <input type="button" value="Reset" class="btn btn--secondary">
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display">
                    {foreach $offers as $offer}
                        {include file="offer-card.tpl" offer_card=$offer}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.png" alt="" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
            <div class="offer-description">
                <h1 class="important-title">{$offer_detail->internship_name}</h1>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close">
                <div class="offer-description__company">
                    <p>{$offer_detail->company_name}</p>
                    <p>{$offer_detail->city_name}</p>
                    <p>{$offer_detail->offer_date}</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#calendar"></use></svg>
                        <p class="card-company__content__sector">{$offer_detail->duration} semaine{if $offer_detail->duration > 1}s{/if}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#money"></use></svg>
                        <p class="card-company__content__sector">{$offer_detail->salary}€ / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#checklist"></use></svg>
                        <p class="card-company__content__sector">{$offer_detail->skills}</p>
                    </div>
                </div>
                <p>{$offer_detail->description}</p>
            </div>
        </div>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}