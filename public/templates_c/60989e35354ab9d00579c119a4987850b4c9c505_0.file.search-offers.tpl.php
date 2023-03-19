<?php
/* Smarty version 4.3.0, created on 2023-03-18 19:15:11
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\search-offers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64160dbf09a3d2_35084379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60989e35354ab9d00579c119a4987850b4c9c505' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\search-offers.tpl',
      1 => 1679166905,
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
function content_64160dbf09a3d2_35084379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section search-section--offer m-5-0">
        <div class="card-background search-bar search-bar--offer p-1">
            <div class="search-bar__input">
                <input type="text" placeholder="Rechercher par nom...">
                <input type="text" placeholder="Rechercher par entreprise...">
                <input type="text" placeholder="Rechercher par lieu...">
                <input type="text" placeholder="Nombre de place...">
                <select>
                    <option value="">Date de l'offre</option>
                </select>
                <select>
                    <option value="">Compétences</option>
                </select>
                <label for="myRange">Range</label>
                <input name="ok1" type="range" min="0" max="100" value="50" id="myRange">
                <label for="myRange2">Range2</label>
                <input name="ok2" type="range" min="0" max="100" value="50" id="myRange2">
            </div>
            <input type="button" value="Reset" class="btn btn--secondary">
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div class="card-background offer-preview">
            <div class="card-background">
                <div class="best-section__content best-section__content--col-1 card-display">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender("file:offer-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('offer_card'=>$_smarty_tpl->tpl_vars['offer']->value), 0, true);
?>
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
                <h1 class="important-title"><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->internship_name;?>
</h1>
                <input type="button" value="Postuler" class="btn btn--primary apply-btn">
                <input type="button" value="Fermer" class="btn btn--secondary offer-preview-close">
                <div class="offer-description__company">
                    <p><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->company_name;?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->city_name;?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->offer_date;?>
</p>
                </div>
                <div class="offer-description__detail">
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#calendar"></use></svg>
                        <p class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->duration;?>
 semaine<?php if ($_smarty_tpl->tpl_vars['offer_detail']->value->duration > 1) {?>s<?php }?></p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#money"></use></svg>
                        <p class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->salary;?>
€ / mois</p>
                    </div>
                    <div class="text-and-svg">
                        <svg><use href="/img/sprite.svg#checklist"></use></svg>
                        <p class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->skills;?>
</p>
                    </div>
                </div>
                <p><?php echo $_smarty_tpl->tpl_vars['offer_detail']->value->description;?>
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
