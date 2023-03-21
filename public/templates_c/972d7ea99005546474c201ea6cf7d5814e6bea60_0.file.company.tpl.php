<?php
/* Smarty version 4.3.0, created on 2023-03-21 01:04:55
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\company.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641902b70de514_13030375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '972d7ea99005546474c201ea6cf7d5814e6bea60' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\company.tpl',
      1 => 1679360694,
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
function content_641902b70de514_13030375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="detail-header">
    <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['company']->value->company_name;?>
.webp" alt="logo" class="detail-header__logo">
    <h2 class="detail-header__title"><?php echo $_smarty_tpl->tpl_vars['company']->value->company_name;?>
</h2>
    <div class="detail-header__description">
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#map"></use></svg>
            <p><?php echo $_smarty_tpl->tpl_vars['company']->value->city;?>
</p>
        </div>
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#building"></use></svg>
            <p><?php echo $_smarty_tpl->tpl_vars['company']->value->sector_name;?>
</p>
        </div>
        <div class="text-and-svg">
            <svg><use href="/img/sprite.svg#user-check"></use></svg>
            <p>2 pilotes valident cette entreprise</p>
        </div>
        <p>Note</p>
    </div>
</div>
<div class="detail-description">
    <div class="card-background detail-description__info p-2">
        <h2 class="important-title center-title">L'entreprise</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['company']->value->company_description;?>
</p>
    </div>
    <div class="card-background detail-description__text p-2-0">
        <h2 class="important-title center-title">Leurs offres</h2>
        <div class="best-section__content best-section__content--col-1 card-display">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['company_offers']->value, 'company_offer');
$_smarty_tpl->tpl_vars['company_offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['company_offer']->value) {
$_smarty_tpl->tpl_vars['company_offer']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender("file:offer-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('offer_card'=>$_smarty_tpl->tpl_vars['company_offer']->value), 0, true);
?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="card-display__pagination">
            <a href="search/offers?company_name=<?php echo $_smarty_tpl->tpl_vars['company']->value->company_name;?>
">Voir plus</a>
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
