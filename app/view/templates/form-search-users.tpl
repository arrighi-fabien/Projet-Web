<form id="search-form">
    <div class="search-bar__input">
        <label for="last_name">Nom :</label>
        <input type="text" placeholder="Rechercher par nom..." name="last_name" id="last_name">
        <label for="first_name">Prénom :</label>
        <input type="text" placeholder="Rechercher par prénom..." name="first_name" id="first_name">
        <label for="center_name">Centre :</label>
        <select name="center_name" id="center_name">
            <option value="">Centre</option>
            {foreach $centers as $center}
                <option value="{$center->center_name}">{$center->center_name}</option>
            {/foreach}
        </select>
        <label for="promotion_name">Promotion :</label>
        <select name="promotion_name" id="promotion_name">
            <option value="">Promotion</option>
            {foreach $promotions as $promotion}
                <option value="{$promotion->promotion_name}">{$promotion->promotion_name}</option>
            {/foreach}
        </select>
        <label for="is_admin">Est un admin :</label>
        <select name="is_admin" id="is_admin">
            <option value="">Choix</option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <label for="is_pilot">Est un pilote :</label>
        <select name="is_pilot" id="is_pilot">
            <option value="">Choix</option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <input type="reset" value="Reset" class="btn btn--secondary">
    <script src="/js/api.js"></script>
    <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="user">
</form>