{include file="header.tpl"}

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            {if $current_page == "admin_offers"}
                {include file="form-search-offers.tpl"}
            {else if $current_page == "admin_companies"}
                {include file="form-search-companies.tpl" admin_page=true}
            {else if $current_page == "admin_users"}
                {include file="form-search-users.tpl"}
            {/if}
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn" onclick="showFilters()">
        <div class="card-background">
            <h2 class="center-title important-title">Résultats</h2>
            {if $current_page == "admin_offers"}
                <a href="/admin/offer/add" class="link-effect">Ajouter une offre</a>
            {else if $current_page == "admin_companies"}
                <a href="/admin/company/add" class="link-effect">Ajouter une entreprise</a>
            {else if $current_page == "admin_users"}
                <a href="/admin/user/add" class="link-effect">Ajouter un utilisateur</a>
            {/if}
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
                {include file="pagination.tpl"}
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}