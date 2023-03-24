<form id="search-form">
    <div class="search-bar__input">
        <input type="text" placeholder="Rechercher par nom..." name="company_name">
        <input type="text" placeholder="Rechercher par lieu..." name="city_name">
        <select name="sector_name">
            <option value="">Secteur</option>
            {foreach $sectors as $sector}
                <option value="{$sector->sector_name}">{$sector->sector_name}</option>
            {/foreach}
        </select>
        <input type="text" placeholder="Nombre d'étudiant déjà accepté..." name="student_accepted">
        <input type="text" placeholder="Note" name="rate">
        <select name="trust">
            <option value="">Confiance pilote</option>
            <option value="1">Oui</option>
            <option value="">Non</option>
        </select>
    </div>
    <input type="reset" value="Reset" class="btn btn--secondary">
    <script src="/js/api.js"></script>
    <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="company">
</form>