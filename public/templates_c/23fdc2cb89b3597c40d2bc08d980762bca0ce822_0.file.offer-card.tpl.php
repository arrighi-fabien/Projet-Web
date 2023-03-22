<?php
/* Smarty version 4.3.0, created on 2023-03-21 13:25:31
  from 'C:\www\Projet-Web\app\view\templates\offer-card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419b04ba2d538_62190150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23fdc2cb89b3597c40d2bc08d980762bca0ce822' => 
    array (
      0 => 'C:\\www\\Projet-Web\\app\\view\\templates\\offer-card.tpl',
      1 => 1679389689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6419b04ba2d538_62190150 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-company card-background">
    <?php if ((isset($_smarty_tpl->tpl_vars['current_page']->value)) && $_smarty_tpl->tpl_vars['current_page']->value == "search_offers") {?>
        <span data-id="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="card-link card-preview"> </span>
    <?php } else { ?>
        <a href="/offer-<?php echo $_smarty_tpl->tpl_vars['offer_card']->value->id_internship;?>
" class="card-link"><span></span></a>
    <?php }?>
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
