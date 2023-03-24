<div class="card-company card-background">
    <a href="/company-{$company_card->id_company}" class="card-link"></a>
    <div class="card-company__content">
        {if file_exists("img/company/{$company_card->company_name}.webp")}
            <img src="/img/company/{$company_card->company_name}.webp" alt="{$company_card->company_name} logo" class="card-company__content__img">
        {else}
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        {/if}
        <div class="card-company__content__info">
            <h4 class="card-company__content__info__title">{$company_card->company_name}</h4>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#building"></use></svg>
                <p class="card-company__content__sector">{$company_card->sector_name}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#map"></use></svg>
                <p class="card-company__content__city">{$company_card->city}</p>
            </div>
        </div>
    </div>
    <p class="card-company__offer">{$company_card->offers} offre{if $company_card->offers > 1}s{/if}</p>
</div>