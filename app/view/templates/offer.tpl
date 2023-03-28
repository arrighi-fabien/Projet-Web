{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="detail-header">
        {if file_exists("img/company/{$offer->company_name|lower|replace:' ':''}.webp")}
            <img src="/img/company/{$offer->company_name|lower|replace:' ':''}.webp" alt="{$offer->company_name} logo" class="card-company__content__img">
        {else}
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        {/if}
        <h3 class="detail-header__company"><a href="/company-{$offer->id_company}">{$offer->company_name}</a></h3>
        {if $user}
            {foreach $user->wishlist_id as $id}
                {if $id == $offer->id_internship}
                    <svg class="card-bookmark" data-offer="{$offer->id_internship}-1"><use href="/img/sprite.svg#bookmark"></use></svg>
                    {break}
                {/if}
                {if $id == end($user->wishlist_id)}
                    <svg class="card-bookmark" data-offer="{$offer->id_internship}-0"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
                {/if}
            {/foreach}
        {else}
            <svg class="card-bookmark"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
        {/if}
        <h2 class="detail-header__title">{$offer->internship_name}</h2>
        <div class="detail-header__description">
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#clock"></use></svg>
                <p>{$offer->offer_date}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#map"></use></svg>
                <p>{$offer->city_name}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#calendar"></use></svg>
                <p>{$offer->duration} semaine{if $offer->duration > 1}s{/if}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#money"></use></svg>
                <p>{$offer->salary}€ / mois</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#checklist"></use></svg>
                <p>{$offer->skills}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#number"></use></svg>
                <p>{$offer->places_students} place{if $offer->places_students > 1}s{/if} disponible{if $offer->places_students > 1}s{/if}</p>
            </div>
        </div>
    </div>
    <div class="detail-description">
        <div class="card-background detail-description__info p-2">
            <div>
                {if file_exists("img/company/{$offer->company_name}.webp")}
                    <img src="/img/company/{$offer->company_name}.webp" alt="{$offer->company_name} logo" class="card-company__content__img">
                {else}
                    <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                {/if}
                <h3 class="detail-header__company">{$offer->company_name}</h3>
                <div class="text-and-svg ">
                    <svg><use href="/img/sprite.svg#building"></use></svg>
                    <p>{$offer->sector_name}</p>
                </div>
                <div class="text-and-svg m-1-0">
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
            <div class="detail-description__info__offer m-2-0">
                <h3>{$offer->internship_name}</h3>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#clock"></use></svg>
                    <p>{$offer->offer_date}</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#map"></use></svg>
                    <p>{$offer->city_name}</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#calendar"></use></svg>
                    <p>{$offer->duration} semaine{if $offer->duration > 1}s{/if}</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#money"></use></svg>
                    <p>{$offer->salary}€ / mois</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#checklist"></use></svg>
                    <p>{$offer->skills}</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#number"></use></svg>
                    <p>{$offer->places_students} place{if $offer->places_students > 1}s{/if} disponible{if $offer->places_students > 1}s{/if}</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#info"></use></svg>
                    <p id="offer-description__concern">{$offer->promotion_name}</p>
                </div>
            </div>
            <a href="/offer-{$offer->id_internship}/apply"><input type="button" value="Postuler" class="btn btn--primary apply-btn"></a>
        </div>
        <div class="card-background detail-description__text p-2">
            <p>{$offer->description}</p>
        </div>
    </div>
</main>

{include file="footer.tpl"}