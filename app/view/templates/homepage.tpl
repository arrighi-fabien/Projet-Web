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
                {include file="company-card.tpl" company_card=$best_company}
            {/foreach}
        </div>
    </div>
    <div class="best-section m-5-0">
        <h2 class="important-title center-title">Dernières offres</h2>
        <div class="best-section__content">
            {foreach $latest_offers as $offer}
                {include file="offer-card.tpl" offer_card=$offer}
            {/foreach}
        </div>
    </div>
</main>

{if $user == null}
    {include file="login.tpl"}
{/if}

{include file="footer.tpl"}