<form id="search-form">
    <div class="search-bar__input">
        <input type="text" placeholder="Rechercher par nom..." name="internship_name">
        <input type="text" placeholder="Rechercher par entreprise..." name="company_name">
        <input type="text" placeholder="Rechercher par lieu..." name="city_name">
        <input type="text" placeholder="Nombre de place..." name="nb_places">
        <select name="offer_date">
            <option value="">Date de l'offre</option>
        </select>
        <select name="skills">
            <option value="">Compétences</option>
            {foreach $skills as $skill}
                <option value="{$skill->skill_name}">{$skill->skill_name}</option>
            {/foreach}
        </select>
        <label for="duration">Durée</label>
        <input type="range" min="0" max="100" name="duration" value="0" id="duration">
        <label for="salary">Rémunération</label>
        <input type="range" min="0" max="100" name="salary" value="0" id="salary">
    </div>
    <div class="search-bar__btn">
        <input type="reset" value="Reset" class="btn btn--secondary">
        <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="offer">
    </div>
</form>