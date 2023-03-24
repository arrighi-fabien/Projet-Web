<div class="card-company card-background">
    <a href="/admin/user-{$user_card->id_user}" class="card-link"></a>
    <div class="card-company__content">
        <img src="/img/user.webp" alt="Default logo" class="card-company__content__img">
        <div class="card-company__content__info">
            <h4 class="card-company__content__info__title">{$user_card->last_name} {$user_card->first_name}</h4>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#building"></use></svg>
                <p class="card-company__content__sector">{$user_card->promotion_name}</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#map"></use></svg>
                <p class="card-company__content__city">{$user_card->center_name}</p>
            </div>
        </div>
    </div>
</div>