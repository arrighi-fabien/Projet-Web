{include file="header.tpl" enable_api=true}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="detail-header">
    <img src="/img/company/{$company->company_name}.webp" alt="logo" class="detail-header__logo">
    <h1 class="detail-header__title">{$company->company_name}</h1>
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
            {if $trust <= 1}
                <p>{$trust} pilote valide cette entreprise</p>
            {else}
                <p>{$trust} pilotes valident cette entreprise</p>
            {/if}
        </div>
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#star"></use></svg>
            <p>{$company_ratings} / 5</p>
        </div>
    </div>
    <div class="detail-header__description detail-header__user">
        {include file="rate.tpl"}
        {if $user_trust == 1}
            <div class="text-and-svg">
                <input type="checkbox" id="trust" name="trust" checked>
                <label for="trust">Donner ma confiance</label>
                </div>
        {else if $user_trust == 0}
            <div class="text-and-svg">
                <input type="checkbox" id="trust" name="trust">
                <label for="trust">Donner ma confiance</label>
            </div>
        {/if}
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
            <a href="search/offers?company_name={$company->company_name}" class="link-effect">Voir plus</a>
        </div>
    </div>
</div>
</main>

{include file="footer.tpl"}