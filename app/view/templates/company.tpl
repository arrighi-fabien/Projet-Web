{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="detail-header">
    <img src="/img/company/{$company->company_name}.webp" alt="logo" class="detail-header__logo">
    <h2 class="detail-header__title">{$company->company_name}</h2>
    <div class="detail-header__description">
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#map"></use></svg>
            <p>{$company->city}</p>
        </div>
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#building"></use></svg>
            <p>{$company->sector_name}</p>
        </div>
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#user-check"></use></svg>
            <p>2 pilotes valident cette entreprise</p>
        </div>
        <p>Note</p>
    </div>
</div>
<div class="detail-description">
    <div class="card-background detail-description__info p-2">
        <h2 class="important-title center-title">L'entreprise</h2>
        <p>{$company->company_description}</p>
    </div>
    <div class="card-background detail-description__text p-2-0">
        <h2 class="important-title center-title">Leurs offres</h2>
        <div class="best-section__content best-section__content--col-1 card-display">
        {foreach $company_offers as $company_offer}
            {include file="offer-card.tpl" offer_card=$company_offer}
        {/foreach}
        </div>
        <div class="card-display__pagination">
            <a href="search/offers?company_name={$company->company_name}">Voir plus</a>
        </div>
    </div>
</div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}