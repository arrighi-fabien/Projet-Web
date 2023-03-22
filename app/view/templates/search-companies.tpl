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
                    {if $page != 2}
                        <a href="{$url}page=1" class="frist">1<</a>
                        <p>...</p>
                    {/if}
                    {if $page > 1}
                        <a href="{$url}page={$page-1}" class="previous">{$page-1}</a>
                        <p>...</p>
                    {/if}
                    <p>></p>
                    <a href="{$url}page={$page}" class="current">{$page}</a>
                    <p><</p>
                    {if $page < $max_page}
                        <p>...</p>
                        <a href="{$url}page={$page+1}" class="next">{$page+1}</a>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}