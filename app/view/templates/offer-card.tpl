<div class="card-company card-background">
    <a href="#" class="card-link"><span></span></a>
    <div class="card-company__content">
        {if file_exists("img/company/{$offer_card->company_name}.webp")}
            <img src="/img/company/{$offer_card->company_name}.webp" alt="{$offer_card->company_name} logo" class="card-company__content__img">
        {else}
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        {/if}
        <div class="card-company__content__info">
            <h4 class="card-company__content__info__job">{$offer_card->internship_name}</h4>
            <h5 class="card-company__content__info__title">{$offer_card->company_name}</h5>
            <p class="card-company__content__city">{$offer_card->city_name}</p>
            <p class="small-text">{$offer_card->offer_date}</p>
        </div>
    </div>
    <a href="##" class="card-bookmark">
        {if $user != null}
            {if $offer_card->is_bookmarked}
                <svg><use href="/img/sprite.svg#bookmark_fill"></use></svg>
            {else}
                <svg><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
            {/if}
        {else}
            <svg><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
        {/if}
    </a>
</div>