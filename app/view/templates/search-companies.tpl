{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar p-1">
            {include file="form-search-companies.tpl"}
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn" onclick="showFilters()">
        <div>
            <div class="card-background">
                <div class="best-section__content card-display" id="result">
                    {foreach $companies as $company}
                        {include file="company-card.tpl" company_card=$company}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.webp" alt="" class="fade-scroll">
                    {include file="pagination.tpl"}
                </div>
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}