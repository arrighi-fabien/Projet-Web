<?php
/* Smarty version 4.3.0, created on 2023-03-18 16:04:08
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\offer-card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6415e0f8d33f98_25791037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9e830465a946df8c61964ef8a5bf6eb3024d3ad' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\offer-card.tpl',
      1 => 1679149594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6415e0f8d33f98_25791037 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-company card-background">
    <a href="#" class="card-link"><span></span></a>
    <div class="card-company__content">
        <?php if (file_exists("img/company/".((string)$_smarty_tpl->tpl_vars['offer_card']->value->company_name).".webp")) {?>
            <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['offer_card']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['offer_card']->value->company_name;?>
 logo" class="card-company__content__img">
        <?php } else { ?>
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        <?php }?>
        <div class="card-company__content__info">
            <h4 class="card-company__content__info__job"><?php echo $_smarty_tpl->tpl_vars['offer_card']->value->internship_name;?>
</h4>
            <h5 class="card-company__content__info__title"><?php echo $_smarty_tpl->tpl_vars['offer_card']->value->company_name;?>
</h5>
            <p class="card-company__content__city"><?php echo $_smarty_tpl->tpl_vars['offer_card']->value->city_name;?>
</p>
            <p class="small-text"><?php echo $_smarty_tpl->tpl_vars['offer_card']->value->offer_date;?>
</p>
        </div>
    </div>
    <a href="##" class="card-bookmark">
        <?php if ($_smarty_tpl->tpl_vars['user']->value != null) {?>
            <?php if ($_smarty_tpl->tpl_vars['offer_card']->value->is_bookmarked) {?>
                <svg><use href="/img/sprite.svg#bookmark_fill"></use></svg>
            <?php } else { ?>
                <svg><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
            <?php }?>
        <?php } else { ?>
            <svg><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
        <?php }?>
    </a>
</div><?php }
}
