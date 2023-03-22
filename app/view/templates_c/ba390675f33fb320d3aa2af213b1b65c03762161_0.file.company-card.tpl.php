<?php
/* Smarty version 4.3.0, created on 2023-03-22 13:32:15
  from 'C:\www\Projet-Web\app\view\templates\company-card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641af54f78aeb5_15953030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba390675f33fb320d3aa2af213b1b65c03762161' => 
    array (
      0 => 'C:\\www\\Projet-Web\\app\\view\\templates\\company-card.tpl',
      1 => 1679486683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641af54f78aeb5_15953030 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-company card-background">
    <a href="/company-<?php echo $_smarty_tpl->tpl_vars['company_card']->value->id_company;?>
" class="card-link"><span></span></a>
    <div class="card-company__content">
        <?php if (file_exists("img/company/".((string)$_smarty_tpl->tpl_vars['company_card']->value->company_name).".webp")) {?>
            <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['company_card']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['company_card']->value->company_name;?>
 logo" class="card-company__content__img">
        <?php } else { ?>
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        <?php }?>
        <div class="card-company__content__info">
            <h4 class="card-company__content__info__title"><?php echo $_smarty_tpl->tpl_vars['company_card']->value->company_name;?>
</h4>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#building"></use></svg>
                <p class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['company_card']->value->sector_name;?>
</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#map"></use></svg>
                <p class="card-company__content__city"><?php echo $_smarty_tpl->tpl_vars['company_card']->value->city;?>
</p>
            </div>
        </div>
    </div>
    <p class="card-company__offer"><?php echo $_smarty_tpl->tpl_vars['company_card']->value->offers;?>
 offre<?php if ($_smarty_tpl->tpl_vars['company_card']->value->offers > 1) {?>s<?php }?></p>
</div><?php }
}
