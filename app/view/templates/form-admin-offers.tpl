<form method="post" class="admin-form card-background" id="myForm">
    <div class="admin-form__element">
        <label for="internship_name">Nom du stage</label>
        <input type="text" placeholder="Nom du stage..." value="{if isset($offer[0]->internship_name)}{$offer[0]->internship_name}{/if}" name="internship_name" id="internship_name" pattern="[A-Za-zÀ-ÿ -._0-9]+" required>
    </div>
    <div class="admin-form__element">
        <label for="id_company">Nom de l'entreprise</label>
        <select name="id_company" id="id_company">
        {foreach $companies as $company}
            {if isset($offer[0]->company_name)}
                {if $company->company_name == $offer[0]->company_name}
                    <option value="{$company->id_company}" selected>{$offer[0]->company_name}</option>
                {else}
                    <option value="{$company->id_company}">{$company->company_name}</option>
                {/if}
            {else}
                <option value="{$company->id_company}">{$company->company_name}</option>
            {/if}
        {/foreach}
    </select>
    </div>
    <div class="admin-form__element">
        <label for="city_name">Lieu du stage</label>
        <input type="text" placeholder="Lieu du stage..." value="{if isset($offer[0]->city_name)}{$offer[0]->city_name}{/if}" name="city_name" id="city_name" pattern="[A-Za-zÀ-ÿ _-]+" required>
    </div>
    <div class="admin-form__element">
        <label for="nb_places">Nombre de place</label>
        <input type="number" placeholder="Nombre de place..." value="{if isset($offer[0]->places_students)}{$offer[0]->places_students}{/if}" name="nb_places" id="nb_places" pattern="[0-9]+" required>
    </div>
    <div class="admin-form__element">
        <label for="skills">Compétence</label>
        <select name="skills[]" id="skills" multiple>
            {foreach $skills as $skill}
                {if isset($offer_skills)}
                    {assign var="is_selected" value=0}
                    {foreach $offer_skills as $offer_skill}
                        {if $skill->id_skill == $offer_skill->id_skill}
                            <option value="{$skill->id_skill}" selected>{$skill->skill_name}</option>
                            {assign var="is_selected" value=1}
                        {/if}
                    {/foreach}
                    {if $is_selected == 0}
                        <option value="{$skill->id_skill}">{$skill->skill_name}</option>
                    {/if}
                {else}
                    <option value="{$skill->id_skill}">{$skill->skill_name}</option>
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="duration">Durée (en semaines)</label>
        <input type="number" placeholder="Durée..." value="{if isset($offer[0]->duration)}{$offer[0]->duration}{/if}" name="duration" id="duration" pattern="[0-9]+" required>
    </div>
    <div class="admin-form__element">
        <label for="salary">Salaire (en €)</label>
        <input type="number" placeholder="Salaire..." value="{if isset($offer[0]->salary)}{$offer[0]->salary}{/if}" name="salary" id="salary" pattern="[0-9]+" required>
    </div>
    <div class="admin-form__element">
        <label for="concern">Concerne</label>
        <select name="concern" id="concern">
            {foreach $promotions as $promotion}
                {if isset($concern)}
                    {if $promotion->id_promotion == $concern->id_promotion}
                        <option value="{$promotion->id_promotion}" selected>{$promotion->promotion_name}</option>
                    {else}
                        <option value="{$promotion->id_promotion}">{$promotion->promotion_name}</option>
                    {/if}
                {else}
                <option value="{$promotion->id_promotion}">{$promotion->promotion_name}</option>
                {/if}
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description..." id="description" cols="30" rows="10">{if isset($offer[0]->description)}{$offer[0]->description}{/if}</textarea>
    </div>
    <input type="submit" value="{if isset($offer[0]->id_internship)}Modifier{else}Créer{/if}" class="btn btn--primary center-btn">
</form>

{if isset($offer[0]->id_internship)}
    <form method="post" action="/admin/offer-{$offer[0]->id_internship}/delete" class="admin-form card-background">
        <h2 class="center-title important-title">Supprimer l'offre</h2>
        <input type="submit" value="Supprimer" class="btn btn--secondary center-btn" onclick="confirm('Êtes-vous sûr de vouloir supprimer cette offre?')">
    </form>
{/if}