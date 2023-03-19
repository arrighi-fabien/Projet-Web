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
                    {$count = 0}
                    {foreach $offers as $offer}
                        {include file="offer-card.tpl" offer_card=$offer current_page=$current_page count=$count}
                        {assign var="count" value=$count+1}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.png" alt="" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
            <div class="offer-description">
                <script>
                    var offers = {$offers_json};
                </script>
                <h1><a href="/offer-{$offers[0]->id_internship}" id="offer-description__title" class="important-title">{$offers[0]->internship_name}</a></h1>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close">
                <div class="offer-description__company">
                    <p id="offer-description__company">{$offers[0]->company_name}</p>
                    <p id="offer-description__city">{$offers[0]->city_name}</p>
                    <p id="offer-description__date">{$offers[0]->offer_date}</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#calendar"></use></svg>
                        <p id="offer-description__duration" class="card-company__content__sector">{$offers[0]->duration} semaine{if $offers[0]->duration > 1}s{/if}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#money"></use></svg>
                        <p id="offer-description__salary" class="card-company__content__sector">{$offers[0]->salary} € / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#checklist"></use></svg>
                        <p id="offer-description__skills" class="card-company__content__sector">{$offers[0]->skills}</p>
                    </div>
                </div>
                <p id="offer-description__description">{$offers[0]->description}</p>
            </div>
        </div>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}