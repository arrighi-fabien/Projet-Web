{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar p-1">
            <div class="search-bar__input">
                <input type="text" placeholder="Rechercher par nom...">
                <input type="text" placeholder="Rechercher par lieu...">
                <select>
                    <option value="">Secteur</option>
                </select>
                <input type="text" placeholder="Nombre d'étudiant...">
                <input type="text" placeholder="Note">
                <select>
                    <option value="">Confiance pilote</option>
                </select>
            </div>
            <input type="button" value="Reset" class="btn btn--secondary">
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div>
            <div class="card-background">
                <div class="best-section__content card-display">
                    {foreach $companies as $company}
                        {include file="company-card.tpl" company_card=$company}
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.png" alt="" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
        </div>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}