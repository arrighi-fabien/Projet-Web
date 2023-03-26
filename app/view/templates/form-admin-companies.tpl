<form method="post" class="admin-form card-background">
    <div class="admin-form__element">
        <label for="company_name">Nom de l'entreprise</label>
        <input type="text" placeholder="Nom de l'entreprise..." name="company_name" id="company_name">
    </div>
    <div class="admin-form__element">
        <label for="description">Email</label>
        <input type="email" placeholder="Email..." name="email" id="description"></input>
    </div>
    <div class="admin-form__element">
        <label for="is_visible">Est visible</label>
        <select name="is_visible" id="is_visible">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div class="admin-form__element">
        <label for="city_name">Localité (si plusieurs ville, séparer par une virgule)</label>
        <input type="text" placeholder="Localité..." name="city_name" id="city_name">
    </div>
    <div class="admin-form__element">
        <label for="id_sector">Secteur</label>
        <select name="id_sector" id="id_sector">
            <option value="">Secteur</option>
            {foreach $sectors as $sector}
                <option value="{$sector->id_sector}">{$sector->sector_name}</option>
            {/foreach}
        </select>
    </div>
    <div class="admin-form__element">
        <label for="student_accepted">Nombre d'étudiant déjà accepté</label>
        <input type="text" placeholder="Nombre d'étudiant déjà accepté..." name="student_accepted" id="student_accepted">
    </div>
    <div class="admin-form__element">
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description..." id="description" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="Créer" class="btn btn--primary center-btn">
</form>