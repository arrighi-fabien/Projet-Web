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
        {if isset($admin_page) && $admin_page == true}
            <select name="is_visible">
                <option value="">Visible</option>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        {/if}
    </div>
    <div class="search-bar__btn">
        <input type="reset" value="Reset" class="btn btn--secondary">
        <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="company">
    </div>
</form>