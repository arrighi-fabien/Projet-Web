<form id="search-form">
    <div class="search-bar__input">
        <input type="text" placeholder="Rechercher par nom..." name="last_name">
        <input type="text" placeholder="Rechercher par prénom..." name="first_name">
        <select name="center_name">
            <option value="">Centre</option>
            {foreach $centers as $center}
                <option value="{$center->center_name}">{$center->center_name}</option>
            {/foreach}
        </select>
        <select name="promotion_name">
            <option value="">Promotion</option>
            {foreach $promotions as $promotion}
                <option value="{$promotion->promotion_name}">{$promotion->promotion_name}</option>
            {/foreach}
        </select>
        <select name="is_admin">
            <option value="">Est un admin</option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <select name="is_pilot">
            <option value="">Est un pilote</option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <input type="reset" value="Reset" class="btn btn--secondary">
    <script src="/js/api.js"></script>
    <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="user">
</form>