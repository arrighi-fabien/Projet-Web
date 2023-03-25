{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            {if $current_page == "admin_offers"}
                {include file="form-search-offers.tpl" skills=$skills}
            {else if $current_page == "admin_companies"}
                {include file="form-search-companies.tpl" sectors=$sectors}
            {else if $current_page == "admin_users"}
                {include file="form-search-users.tpl" centers=$centers promotions=$promotions}
            {/if}
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background">
            <h2 class="center-title important-title">Résultats</h2>
            <a href="/admin/offer/add" class="link-effect">Ajouter une offre</a>
            <div class="best-section__content best-section__content--col-1 card-display" id="result">
                {$count = 0}
                {foreach $results as $result}
                    {if $current_page == "admin_offers"}
                        {include file="offer-card.tpl" offer_card=$result}
                    {else if $current_page == "admin_companies"}
                        {include file="company-card.tpl" company_card=$result}
                    {else if $current_page == "admin_users"}
                        {include file="user-card.tpl" user_card=$result}
                    {/if}
                    {assign var="count" value=$count+1}
                {/foreach}
            </div>
            <div class="card-display__pagination">
                <img src="/img/fade.webp" alt="" class="fade-scroll">
                <p>1234</p>
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}