<form class="admin-form card-background">
    <div class="admin-form__element">
        <label for="company_name">Nom de l'entreprise</label>
        <input type="text" placeholder="Rechercher par nom..." name="company_name" id="company_name">
    </div>
    <div class="admin-form__element">
        <label for="city_name">Localité</label>
        <input type="text" placeholder="Localité" name="city_name" id="city_name">
    </div>
    <div class="admin-form__element">
        <label for="sector_name">Secteur</label>
        <select name="sector_name" id="sector_name">
            <option value="">Secteur</option>
            {foreach $sectors as $sector}
                <option value="{$sector->sector_name}">{$sector->sector_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="student_accepted">Nombre d'étudiant déjà accepté</label>
        <input type="text" placeholder="Nombre d'étudiant déjà accepté..." name="student_accepted" id="student_accepted">
    </div>
    <input type="submit" value="Rechercher" class="btn btn--primary center-btn">
</form>