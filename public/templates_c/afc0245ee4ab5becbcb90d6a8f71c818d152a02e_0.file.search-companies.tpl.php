<?php
/* Smarty version 4.3.0, created on 2023-03-18 15:56:38
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\search-companies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6415df36106ae2_38997498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afc0245ee4ab5becbcb90d6a8f71c818d152a02e' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\search-companies.tpl',
      1 => 1679154079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:company-card.tpl' => 1,
    'file:login.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6415df36106ae2_38997498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar p-1">
            <div class="search-bar__input">
                <input type="text" placeholder="Rechercher par nom...">
                <input type="text" placeholder="Rechercher par lieu...">
                <select>
                    <option value="">Secteur</option>
                </select>
                <input type="text" placeholder="Nombre d'étudiant...">
                <input type="text" placeholder="Note">
                <select>
                    <option value="">Confiance pilote</option>
                </select>
            </div>
            <input type="button" value="Reset" class="btn btn--secondary">
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div>
            <div class="card-background">
                <div class="best-section__content card-display">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
$_smarty_tpl->tpl_vars['company']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
$_smarty_tpl->tpl_vars['company']->do_else = false;
?>
                        <?php $_smarty_tpl->_subTemplateRender("file:company-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('company_card'=>$_smarty_tpl->tpl_vars['company']->value), 0, true);
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
        </div>
    </div>
</main>

<?php if ($_smarty_tpl->tpl_vars['user']->value == null) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
