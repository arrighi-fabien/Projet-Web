{include file="header.tpl"}
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="hero-banner">
        <img src="/img/logo.webp" alt="Logo" class="hero-banner__img">
        <h1 class="hero-banner__content">Trouvez le stage qui vous correspond en toute simplicité</h1>
    </div>

    <div class="text-presentation">
        <p>Bienvenue sur notre site dédié à la recherche de stage pour les étudiants du CESI Nice ! Nous sommes une plateforme qui facilite la recherche de stage pour les étudiants en quête d'opportunités professionnelles. Notre objectif est de connecter les étudiants de CESI Nice avec les entreprises qui cherchent à recruter de nouveaux talents. Nous comprenons que la recherche de stage peut être un processus stressant et fastidieux, c'est pourquoi nous sommes là pour vous aider à trouver le stage qui convient à vos besoins et à vos objectifs professionnels. Sur notre site, vous trouverez des offres de stage de différentes entreprises dans différents secteurs, ainsi que des conseils pour réussir votre recherche de stage et maximiser votre expérience professionnelle. Rejoignez notre communauté aujourd'hui pour accéder à des opportunités de stage incroyables !</p>
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