{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <h1 class="important-title important-title--big center-title m-2-0">Rechercher une offre</h1>
    <div class="search-section search-section--offer m-2-0">
        <div class="card-background search-bar search-bar--offer p-1">
            {include file="form-search-offers.tpl"}
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn" onclick="showFilters()">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display" id="result">
                    {$count = 0}
                    {foreach $offers as $offer}
                        {include file="offer-card.tpl" offer_card=$offer current_page='search_offers'}
                        {assign var="count" value=$count+1}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.webp" alt="" class="fade-scroll">
                    {include file="pagination.tpl"}
                </div>
            </div>
            <div class="offer-description">
                <script>
                    var offers_json = {$offers_json};
                </script>
                <h2><a href="/offer-{$offers[0]->id_internship}" id="offer-description__title" class="important-title">{$offers[0]->internship_name}</a></h2>
                <a href="/offer-{$offers[0]->id_internship}/apply" id="apply-btn"><input type="button" value="Postuler" class="btn btn--primary apply-btn"></a>
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close" onclick="closeOfferPreview()">
                <div class="offer-description__company">
                    <p id="offer-description__company"><a href="/company-{$offers[0]->id_company}">{$offers[0]->company_name}</a></p>
                    <p id="offer-description__city">{$offers[0]->city_name}</p>
                    <p id="offer-description__date">{$offers[0]->offer_date}</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#calendar"></use></svg>
                        <p id="offer-description__duration">{$offers[0]->duration} semaine{if $offers[0]->duration > 1}s{/if}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#money"></use></svg>
                        <p id="offer-description__salary">{$offers[0]->salary} € / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#checklist"></use></svg>
                        <p id="offer-description__skills">{$offers[0]->skills}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#number"></use></svg>
                        <p id="offer-description__places">{$offers[0]->places_students} place{if $offers[0]->places_students > 1}s{/if} disponible{if $offers[0]->places_students > 1}s{/if}</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#info"></use></svg>
                        <p id="offer-description__concern">{$offers[0]->promotion_name}</p>
                    </div>
                </div>
                <p id="offer-description__description">{$offers[0]->description}</p>
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}