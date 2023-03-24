{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar p-1">
            <form id="search-form">
                <div class="search-bar__input">
                    <input type="text" placeholder="Rechercher par nom..." id="search-form__name">
                    <input type="text" placeholder="Rechercher par lieu..." id="search-form__city">
                    <select id="search-form__sector">
                        <option value="">Secteur</option>
                        {foreach $sectors as $sector}
                            <option value="{$sector->sector_name}">{$sector->sector_name}</option>
                        {/foreach}
                    </select>
                    <input type="text" placeholder="Nombre d'étudiant déjà accepté..." id="search-form__nb-students">
                    <input type="text" placeholder="Note" id="search-form__rate">
                    <select id="search-form__confidence">
                        <option value="">Confiance pilote</option>
                        <option value="1">Oui</option>
                        <option value="">Non</option>
                    </select>
                </div>
                <input type="reset" value="Reset" class="btn btn--secondary">
                <script src="/js/api.js"></script>
                <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="company">
            </form>
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div>
            <div class="card-background">
                <div class="best-section__content card-display" id="result">
                    {foreach $companies as $company}
                        {include file="company-card.tpl" company_card=$company}
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
        </div>
    </div>
</main>

{include file="footer.tpl"}