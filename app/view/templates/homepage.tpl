{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="hero-banner">
        <img src="/img/logo.webp" alt="Logo" class="hero-banner__img">
        <h1 class="hero-banner__content">Trouvez le stage qui vous correspond en toute simplicité</h1>
    </div>

    <div class="text-presentation">
        <p>
            Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan,
            risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus
            nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
            Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis
            arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh. Mauris sit amet magna non ligula
            vestibulum eleifend. Nulla varius volutpat turpis sed lacinia. Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis nisi.
            Proin vitae facilisis nisi, ac posuere leo. Nam pulvinar blandit velit, id condimentum diam faucibus at. Aliquam lacus nisi, sollicitudin at nisi nec, fermentum congue felis.
            Quisque mauris dolor, fringilla sed tincidunt ac, finibus non odio. Sed vitae mauris nec ante pretium finibus. Donec nisl neque, pharetra ac elit eu, faucibus aliquam
            ligula. Nullam dictum, tellus tincidunt tempor laoreet, nibh elit sollicitudin felis, eget feugiat sapien diam nec nisl. Aenean gravida turpis nisi, consequat dictum risus
            dapibus a. Duis felis ante, varius in neque eu, tempor suscipit sem. Maecenas ullamcorper gravida sem sit amet cursus. Etiam pulvinar purus vitae justo pharetra
            consequat. Mauris id mi ut arcu feugiat maximus. Mauris consequat tellus id tempus aliquet.
        </p>
    </div>
    <div class="best-section m-5-0">
        <h2 class="important-title center-title">Meilleures entreprises</h2>
        <div class="best-section__content">
            {foreach $best_companies as $best_company}
                <div class="card-company card-background">
                    <a href="#" class="card-link"><span></span></a>
                    <div class="card-company__content">
                        {if $best_company->picture}
                            <img src="/img/company/{$best_company->company_name}.webp" alt="{$best_company->company_name} logo" class="card-company__content__img">
                        {else}
                            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                        {/if}
                        <div class="card-company__content__info">
                            <h4 class="card-company__content__info__title">{$best_company->company_name}</h4>
                            <div class="text-and-svg">
                                <svg><use href="/img/sprite.svg#building"></use></svg>
                                <p class="card-company__content__sector">{$best_company->sector_name}</p>
                            </div>
                            <div class="text-and-svg">
                                <svg><use href="/img/sprite.svg#map"></use></svg>
                                <p class="card-company__content__city">{$best_company->city}</p>
                            </div>
                        </div>
                    </div>
                    <p class="card-company__offer">{$best_company->offers} offre{if $best_company->offers > 1}s{/if}</p>
                </div>
            {/foreach}
        </div>
    </div>
    <div class="best-section m-5-0">
        <h2 class="important-title center-title">Dernières offres</h2>
        <div class="best-section__content">
            {foreach $latest_offers as $offer}
                <div class="card-company card-background">
                    <a href="#" class="card-link"><span></span></a>
                    <div class="card-company__content">
                        {if $offer->picture}
                            <img src="/img/company/{$offer->company_name}.webp" alt="{$offer->company_name} logo" class="card-company__content__img">
                        {else}
                            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                        {/if}
                        <div class="card-company__content__info">
                            <h4 class="card-company__content__info__job">{$offer->internship_name}</h4>
                            <h5 class="card-company__content__info__title">{$offer->company_name}</h5>
                            <p class="card-company__content__city">{$offer->city_name}</p>
                            <p class="small-text">{$offer->offer_date}</p>
                        </div>
                    </div>
                    <a href="##" class="card-bookmark">
                        <svg><use href="/img/sprite.svg#bookmark"></use></svg>
                    </a>
                </div>
            {/foreach}
        </div>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}