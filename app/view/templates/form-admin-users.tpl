<form method="post" class="admin-form card-background">
    <div class="admin-form__element">
        <label for="last_name">Nom</label>
        <input type="text" placeholder="Nom de l'utilisateur..." value="{if isset($user_card->last_name)}{$user_card->last_name}{/if}" name="last_name" id="last_name" pattern="[A-Za-zÀ-ÿ -]+" required>
    </div>
    <div class="admin-form__element">
        <label for="first_name">Prénom</label>
        <input type="text" placeholder="Prénom de l'utilisateur..." value="{if isset($user_card->first_name)}{$user_card->first_name}{/if}" name="first_name" id="first_name" pattern="[A-Za-zÀ-ÿ -]+" required>
    </div>
    <div class="admin-form__element">
        <label for="email">Email</label>
        <input type="email" placeholder="Email..." value="{if isset($user_card->email)}{$user_card->email}{/if}" name="email" id="email" pattern="[A-Za-z -@.]+" required></input>
    </div>
    <div class="admin-form__element">
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe..." value="" name="password" id="password" {if !isset($user_card->id_user)}required{/if}></input>
    </div>
    <div class="admin-form__element">
        <select name="id_center" id="id_center" required>
            {foreach $centers as $center}
                <option value="{$center->id_center}" {if isset($user_card->id_center) && $user_card->id_center === $center->id_center}selected{/if}>{$center->center_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <select name="id_promotion" id="id_promotion" required>
            {foreach $promotions as $promotion}
                <option value="{$promotion->id_promotion}" {if isset($user_card->id_promotion) && $user_card->id_promotion === $promotion->id_promotion}selected{/if}>{$promotion->promotion_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="is_admin">Est admin</label>
        <select name="is_admin" id="is_admin" required>
            <option value="0" {if isset($user_card->is_admin) && $user_card->is_admin === 0}selected{/if}>Non</option>
            {if $is_admin}
                <option value="1" {if isset($user_card->is_admin) && $user_card->is_admin === 1}selected{/if}>Oui</option>
            {/if}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="is_pilot">Est pilote</label>
        <select name="is_pilot" id="is_pilot" required>
            <option value="0" {if isset($user_card->is_pilot) && $user_card->is_pilot === 0}selected{/if}>Non</option>
            {if $is_admin}
                <option value="1" {if isset($user_card->is_pilot) && $user_card->is_pilot === 1}selected{/if}>Oui</option>
            {/if}
        </select>
    </div>
    <input type="submit" value="{if isset($user_card->id_user)}Modifier{else}Créer{/if}" class="btn btn--primary center-btn">
</form>

{if isset($user_card->id_user)}
    <form method="post" action="/admin/user-{$user_card->id_user}/delete" class="admin-form card-background">
        <h2 class="center-title important-title">Supprimer l'utilisateur</h2>
        <input type="submit" value="Supprimer" class="btn btn--secondary center-btn" onclick="confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">
    </form>
{/if}