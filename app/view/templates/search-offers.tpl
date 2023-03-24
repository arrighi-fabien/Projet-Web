{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section search-section--offer m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            <form id="search-form">
                <div class="search-bar__input">
                    <input type="text" placeholder="Rechercher par nom..." id="search-form__name">
                    <input type="text" placeholder="Rechercher par entreprise..." id="search-form__company">
                    <input type="text" placeholder="Rechercher par lieu..." id="search-form__city">
                    <input type="text" placeholder="Nombre de place..." id="search-form__nb-places">
                    <select id="search-form__offer-date">
                        <option value="">Date de l'offre</option>
                    </select>
                    <select id="search-form__skills">
                        <option value="">Compétences</option>
                    </select>
                    <label for="search-form__duration">Durée</label>
                    <input name="duration" type="range" min="0" max="100" value="0" id="search-form__duration">
                    <label for="search-form__salary">Rémunération</label>
                    <input name="salary" type="range" min="0" max="100" value="0" id="search-form__salary">
                </div>
                <input type="reset" value="Reset" class="btn btn--secondary">
                <script src="/js/api.js"></script>
                <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="offer">
            </form>
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display" id="result">
                    {$count = 0}
                    {foreach $offers as $offer}
                        {include file="offer-card.tpl" offer_card=$offer current_page='search_offers' count=$count}
                        {assign var="count" value=$count+1}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.png" alt="" class="fade-scroll">
                    <div class="btn__pagination">
                        {if $nb_page <= 2}
                            <button style="display: none;" class="btn btn--secondary btn--pagination btn--pagination--first" onClick=paginationOffer(".btn--pagination--first") data-pagination-page=1 data-pagination-max={$max_page}>1</button>
                            <button style="display: none;" class="btn--secondary btn--pagination--first--separator" disable>...</button>
                        {else}
                            <button style="display: inline-block;" class="btn btn--secondary btn--pagination btn--pagination--first" onClick=paginationOffer(".btn--pagination--first") data-pagination-page=1 data-pagination-max={$max_page}>1</button>
                            <button style="display: inline-block;" class="btn--secondary btn--pagination--first--separator" disable>...</button>
                        {/if}
                        {if $nb_page <= 1}
                            <button style="display: none;" class="btn btn--secondary btn--pagination btn--pagination--previous" onClick=paginationOffer(".btn--pagination--previous") data-pagination-page={$nb_page-1} data-pagination-max={$max_page}>{$nb_page-1}</button>
                        {else}
                            <button style="display: inline-block;" class="btn btn--secondary btn--pagination btn--pagination--previous" onClick=paginationOffer(".btn--pagination--previous") data-pagination-page={$nb_page-1} data-pagination-max={$max_page}>{$nb_page-1}</button>
                        {/if}
                        <button class="btn btn--primary btn--pagination btn--pagination--current" disable>{$nb_page}</button>
                        {if $nb_page >= $max_page}
                            <button style="display: none;" id="btn-pagination_next" class="btn btn--secondary btn--pagination btn--pagination--next" onClick=paginationOffer(".btn--pagination--next") data-pagination-page={$nb_page+1} data-pagination-max={$max_page}>{$nb_page+1}</button>
                        {else}
                            <button style="display: inline-block;" id="btn-pagination_next" class="btn btn--secondary btn--pagination btn--pagination--next" onClick=paginationOffer(".btn--pagination--next") data-pagination-page={$nb_page+1} data-pagination-max={$max_page}>{$nb_page+1}</button>
                        {/if}
                        {if $nb_page >= $max_page-1}
                            <button style="display: none;" class="btn--secondary btn--pagination--last--separator" disable>...</button>
                            <button style="display: none;" id="btn-pagination_last" class="btn btn--secondary btn--pagination btn--pagination--last" onClick=paginationOffer(".btn--pagination--last") data-pagination-page={$max_page} data-pagination-max={$max_page}>{$max_page}</button>
                        {else}
                            <button style="display: inline-block;" class="btn--secondary btn--pagination--last--separator" disable>...</button>
                            <button style="display: inline-block;" id="btn-pagination_last" class="btn btn--secondary btn--pagination btn--pagination--last" onClick=paginationOffer(".btn--pagination--last") data-pagination-page={$max_page} data-pagination-max={$max_page}>{$max_page}</button>
                        {/if}
                    </div>
                </div>
            </div>
            <div class="offer-description">
                <script>
                    var offers_json = {$offers_json};
                </script>
                <h1><a href="/offer-{$offers[0]->id_internship}" id="offer-description__title" class="important-title">{$offers[0]->internship_name}</a></h1>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close">
                <div class="offer-description__company">
                    <p id="offer-description__company"><a href="/company-{$offers[0]->id_company}">{$offers[0]->company_name}</a></p>
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

{include file="footer.tpl"}