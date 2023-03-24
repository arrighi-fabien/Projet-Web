<form class="admin-form card-background">
    <div class="admin-form__element">
        <label for="internship_name">Nom du stage</label>
        <input type="text" placeholder="Nom du stage..." value="{$offer[0]->internship_name}" name="internship_name" id="internship_name">
    </div>
    <div class="admin-form__element">
        <label for="company_name">Nom de l'entreprise</label>
        <input type="text" placeholder="Nom de l'entreprise..." value="{$offer[0]->company_name}" name="company_name" id="company_name">
    </div>
    <div class="admin-form__element">
        <label for="city_name">Lieu du stage</label>
        <input type="text" placeholder="Lieu du stage..." value="{$offer[0]->city_name}" name="city_name" id="city_name">
    </div>
    <div class="admin-form__element">
        <label for="nb_places">Nombre de place</label>
        <input type="text" placeholder="Nombre de place..." value="{$offer[0]->places_students}" name="nb_places" id="nb_places">
    </div>
    <div class="admin-form__element">
        <label for="skills">Compétence</label>
        <select name="skills" id="skills">
            <option value="">Compétence</option>
            {foreach $skills as $skill}
                <option value="{$skill->skill_name}">{$skill->skill_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="duration">Durée (en semaines)</label>
        <input type="text" placeholder="Durée..." value="{$offer[0]->duration}" name="duration" id="duration">
    </div>
    <div class="admin-form__element">
        <label for="salary">Salaire (en €)</label>
        <input type="text" placeholder="Salaire..." value="{$offer[0]->salary}" name="salary" id="salary">
    </div>
    <input type="submit" value="Modifier" class="btn btn--primary center-btn">
</form>
<form method="post" action="/admin/offer-{$offer[0]->id_internship}/delete" class="admin-form card-background">
    <h2 class="center-title important-title">Supprimer l'offre</h2>
    <input type="submit" value="Supprimer" class="btn btn--secondary center-btn" onclick="confirm('Êtes-vous sûr de vouloir supprimer cette offre?')">
</form>