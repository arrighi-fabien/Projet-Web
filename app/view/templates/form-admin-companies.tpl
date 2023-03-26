<form method="post" class="admin-form card-background">
    <div class="admin-form__element">
        <label for="company_name">Nom de l'entreprise</label>
        <input type="text" placeholder="Nom de l'entreprise..." value="{if isset($company->company_name)}{$company->company_name}{/if}" name="company_name" id="company_name">
    </div>
    <div class="admin-form__element">
        <label for="email">Email</label>
        <input type="email" placeholder="Email..." value="{if isset($company->email)}{$company->email}{/if}" name="email" id="email"></input>
    </div>
    <div class="admin-form__element">
        <label for="is_visible">Est visible</label>
        <select name="is_visible" id="is_visible">
            <option value="1" {if isset($company->is_visible) && $company->is_visible === 1}selected{/if}>Oui</option>
            <option value="0" {if isset($company->is_visible) && $company->is_visible === 0}selected{/if}>Non</option>
        </select>
    </div>
    <div class="admin-form__element">
        <label for="city_name">Localité (si plusieurs ville, séparer par une virgule)</label>
        <input type="text" placeholder="Localité..." value="{if isset($company->city)}{$company->city}{/if}" name="city_name" id="city_name">
    </div>
    <div class="admin-form__element">
        <label for="id_sector">Secteur</label>
        <select name="id_sector" id="id_sector">
            <option value="">Secteur</option>
            {foreach $sectors as $sector}
                <option value="{$sector->id_sector}" {if isset($company->sector_name) && $company->sector_name === $sector->sector_name}selected{/if}>{$sector->sector_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="student_accepted">Nombre d'étudiant déjà accepté</label>
        <input type="text" placeholder="Nombre d'étudiant déjà accepté..." value="{if isset($company->nb_student_accepted)}{$company->nb_student_accepted}{/if}" name="student_accepted" id="student_accepted">
    </div>
    <div class="admin-form__element">
        <label for="email">Description</label>
        <textarea name="description" placeholder="Description..." id="description" cols="30" rows="10">{if isset($company->company_description)}{$company->company_description}{/if}</textarea>
    </div>
    <input type="submit" value="{if isset($company->id_company)}Modifier{else}Créer{/if}" class="btn btn--primary center-btn">
</form>