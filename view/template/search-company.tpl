{include file="header.tpl"}
<main>
    <img src="src/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="src/img/background2.webp" alt="" class="background-form background-form--2">

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
                        <div class="card-company card-background">
                            <a href="#" class="card-link"><span></span></a>
                            <div class="card-company__content">
                                <img src="{$company->logo}" alt="{$company->name} logo" class="card-company__content__img">
                                <div class="card-company__content__info">
                                    <h4 class="card-company__content__info__title">{$company->name}</h4>
                                    <div class="text-and-svg">
                                        <svg><use href="src/img/sprite.svg#building"></use></svg>
                                        <p class="card-company__content__sector">{$company->sector}</p>
                                    </div>
                                    <div class="text-and-svg">
                                        <svg><use href="src/img/sprite.svg#map"></use></svg>
                                        <p class="card-company__content__city">{$company->city}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="card-company__offer">{$company->offers} offres</p>
                        </div>
                    {/foreach}
                </div>
                <div class="card-display__pagination">
                    <img src="src/img/fade.png" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
        </div>
    </div>
</main>

{if $user == null}
    {extends file="login.tpl"}
{/if}

{include file="footer.tpl"}