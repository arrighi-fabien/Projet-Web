<div class="card-company card-background">
    {if isset($current_page) && $current_page == "search_offers"}
        <span data-id="{$count}" class="card-link card-preview"> </span>
    {else}
        <a href="/offer-{$offer_card->id_internship}" class="card-link"><span></span></a>
    {/if}
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
    {if $user}
        {foreach $user->wishlist_id as $id}
            {if $id == $offer_card->id_internship}
                <svg class="card-bookmark" data-offer="{$offer_card->id_internship}-1"><use href="/img/sprite.svg#bookmark"></use></svg>
                {break}
            {/if}
            {if $id == end($user->wishlist_id)}
                <svg class="card-bookmark" data-offer="{$offer_card->id_internship}-0"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
            {/if}
        {/foreach}
    {else}
        <svg class="card-bookmark"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
    {/if}
</div>