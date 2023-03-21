<?php
/* Smarty version 4.3.0, created on 2023-03-21 12:17:54
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\search-offers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419a072ddf168_53262318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60989e35354ab9d00579c119a4987850b4c9c505' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\search-offers.tpl',
      1 => 1679395200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:offer-card.tpl' => 1,
    'file:login.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6419a072ddf168_53262318 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section search-section--offer m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            <form id="search-form">
                <div class="search-bar__input">
                    <input type="text" placeholder="Rechercher par nom..." id="search-form__name">
                    <input type="text" placeholder="Rechercher par entreprise..." id="search-form__company">
                    <input type="text" placeholder="Rechercher par lieu..." id="search-form__city">
                    <input type="text" placeholder="Nombre de place..." id="search-form__nb-places">
                    <select id="search-form__offer-date">
                        <option value="">Date de l'offre</option>
                    </select>
                    <select id="search-form__skills">
                        <option value="">Compétences</option>
                    </select>
                    <label for="search-form__duration">Durée</label>
                    <input name="duration" type="range" min="0" max="100" value="0" id="search-form__duration">
                    <label for="search-form__salary">Rémunération</label>
                    <input name="salary" type="range" min="0" max="100" value="0" id="search-form__salary">
                </div>
                <input type="reset" value="Reset" class="btn btn--secondary">
                <?php echo '<script'; ?>
 src="/js/api.js"><?php echo '</script'; ?>
>
                <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="offer">
            </form>
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display" id="result">
                    <?php $_smarty_tpl->_assignInScope('count', 0);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender("file:offer-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('offer_card'=>$_smarty_tpl->tpl_vars['offer']->value,'current_page'=>'search_offers','count'=>$_smarty_tpl->tpl_vars['count']->value), 0, true);
?>
                        <?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="card-display__pagination">
                    <img src="/img/fade.png" alt="" class="fade-scroll">
                    <p>1234</p>
                </div>
            </div>
            <div class="offer-description">
                <?php echo '<script'; ?>
>
                    var offers_json = <?php echo $_smarty_tpl->tpl_vars['offers_json']->value;?>
;
                <?php echo '</script'; ?>
>
                <h1><a href="/offer-<?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->id_internship;?>
" id="offer-description__title" class="important-title"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->internship_name;?>
</a></h1>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close">
                <div class="offer-description__company">
                    <p id="offer-description__company"><a href="/company-<?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->id_company;?>
"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->company_name;?>
</a></p>
                    <p id="offer-description__city"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->city_name;?>
</p>
                    <p id="offer-description__date"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->offer_date;?>
</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#calendar"></use></svg>
                        <p id="offer-description__duration" class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->duration;?>
 semaine<?php if ($_smarty_tpl->tpl_vars['offers']->value[0]->duration > 1) {?>s<?php }?></p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#money"></use></svg>
                        <p id="offer-description__salary" class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->salary;?>
 € / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#checklist"></use></svg>
                        <p id="offer-description__skills" class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->skills;?>
</p>
                    </div>
                </div>
                <p id="offer-description__description"><?php echo $_smarty_tpl->tpl_vars['offers']->value[0]->description;?>
</p>
            </div>
        </div>
    </div>
</main>

<?php if ($_smarty_tpl->tpl_vars['user']->value == null) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
