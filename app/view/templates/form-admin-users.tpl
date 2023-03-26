<form method="post" class="admin-form card-background">
    <div class="admin-form__element">
        <label for="last_name">Nom</label>
        <input type="text" placeholder="Nom de l'utilisateur..." value="{if isset($user->last_name)}{$user->last_name}{/if}" name="last_name" id="last_name">
    </div>
    <div class="admin-form__element">
        <label for="first_name">Prénom</label>
        <input type="text" placeholder="Prénom de l'utilisateur..." value="{if isset($user->first_name)}{$user->first_name}{/if}" name="first_name" id="first_name">
    </div>
    <div class="admin-form__element">
        <label for="email">Email</label>
        <input type="email" placeholder="Email..." value="{if isset($user->email)}{$user->email}{/if}" name="email" id="email"></input>
    </div>
    <div class="admin-form__element">
        <label for="is_admin">Est admin</label>
        <select name="is_admin" id="is_admin">
            <option value="1" {if isset($user->is_admin) && $user->is_admin === 1}selected{/if}>Oui</option>
            <option value="0" {if isset($user->is_admin) && $user->is_admin === 0}selected{/if}>Non</option>
        </select>
    </div>
    <div class="admin-form__element">
        <label for="is_pilot">Est pilote</label>
        <select name="is_pilot" id="is_pilot">
            <option value="1" {if isset($user->is_pilot) && $user->is_pilot === 1}selected{/if}>Oui</option>
            <option value="0" {if isset($user->is_pilot) && $user->is_pilot === 0}selected{/if}>Non</option>
        </select>
    </div>
    <input type="submit" value="{if isset($user->id_user)}Modifier{else}Créer{/if}" class="btn btn--primary center-btn">
</form>