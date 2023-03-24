{include file="header.tpl"}

<main class="m-5-0">
    <a href="/logout" class="btn btn--secondary">Déconnexion</a>
    <a href="/admin/offers" class="btn btn--secondary">Offers</a>
    <a href="/admin/companies" class="btn btn--secondary">Companies</a>
    <a href="/admin/users" class="btn btn--secondary">Users</a>
    <div class="best-section__content">
        <div class="card-background personal-info p-2">
            <h2 class="center-title important-title">Informations</h2>
            <div class="personal-info__line">
                <div class="personal-info__element">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" value="{$user->last_name}" disabled>
                </div>
                <div class="personal-info__element">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" value="{$user->first_name}" disabled>
                </div>
            </div>
            <div class="personal-info__element">
                <label for="email">Email :</label>
                <input type="text" id="email" value="{$user->email}" disabled>
            </div>
            <div class="personal-info__line">
                <div class="personal-info__element">
                    <label for="promotion">Promotion :</label>
                    <input type="text" id="promotion" value="{$user->promotion_name}" disabled>
                </div>
                <div class="personal-info__element">
                    <label for="center">Centre :</label>
                    <input type="text" id="center" value="{$user->center_name}" disabled>
                </div>
            </div>
        </div>
        <div class="card-background p-2-0">
            <h2 class="center-title important-title">Candidature</h2>
            <div class="best-section__content best-section__content--col-1 card-display">
                {if $candidatures == null}
                        <h2 class="center-title">Vous n'avez pas encore candidaté à une offre</h2>
                    </div>
                {else}
                    {foreach $candidatures as $offer}
                        {include file="offer-card.tpl" offer_card=$offer}
                    {/foreach}
                    </div>
                    <div class="card-display__pagination">
                        <img src="/img/fade.webp" alt="" class="fade-scroll">
                        <p>1234</p>
                    </div>
                {/if}
        </div>
    </div>
    <div class="card-background m-5-auto p-2-0">
        <h2 class="center-title important-title">Wishlist</h2>
        <div class="best-section__content card-display">
        {if $wishlist == null}
            <h2 class="center-title">Vous n'avez pas encore d'offre dans votre wishlist</h2>
        </div>
        {else}
            {foreach $wishlist as $offer}
                {include file="offer-card.tpl" offer_card=$offer}
            {/foreach}
            </div>
            <div class="card-display__pagination">
                <img src="/img/fade.webp" alt="" class="fade-scroll">
                <p>1234</p>
            </div>
        {/if}
    </div>
</main>

{include file="footer.tpl"}