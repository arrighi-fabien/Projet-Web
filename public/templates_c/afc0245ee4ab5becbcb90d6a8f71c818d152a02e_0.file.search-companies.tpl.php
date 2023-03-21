<?php
/* Smarty version 4.3.0, created on 2023-03-21 17:27:42
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\search-companies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419e90e116bf2_70652504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afc0245ee4ab5becbcb90d6a8f71c818d152a02e' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\search-companies.tpl',
      1 => 1679407149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:company-card.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6419e90e116bf2_70652504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">

    <div class="search-section m-5-0">
        <div class="card-background search-bar p-1">
            <form id="search-form">
                <div class="search-bar__input">
                    <input type="text" placeholder="Rechercher par nom..." id="search-form__name">
                    <input type="text" placeholder="Rechercher par lieu..." id="search-form__city">
                    <select id="search-form__sector">
                        <option value="">Secteur</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectors']->value, 'sector');
$_smarty_tpl->tpl_vars['sector']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sector']->value) {
$_smarty_tpl->tpl_vars['sector']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['sector']->value->sector_name;?>
"><?php echo $_smarty_tpl->tpl_vars['sector']->value->sector_name;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                    <input type="text" placeholder="Nombre d'étudiant déjà accepté..." id="search-form__nb-students">
                    <input type="text" placeholder="Note" id="search-form__rate">
                    <select id="search-form__confidence">
                        <option value="">Confiance pilote</option>
                        <option value="1">Oui</option>
                        <option value="">Non</option>
                    </select>
                </div>
                <input type="reset" value="Reset" class="btn btn--secondary">
                <?php echo '<script'; ?>
 src="/js/api.js"><?php echo '</script'; ?>
>
                <input type="submit" value="Rechercher" class="btn btn--primary" id="btn-search" data-btn="company">
            </form>
        </div>
        <input type="button" value="Afficher les filtres" class="btn btn--secondary filter-btn">
        <div>
            <div class="card-background">
                <div class="best-section__content card-display" id="result">
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

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
