<?php
/* Smarty version 4.3.0, created on 2023-03-21 21:59:43
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\offer-card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641a28cfcfc4b9_12537247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9e830465a946df8c61964ef8a5bf6eb3024d3ad' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\offer-card.tpl',
      1 => 1679434120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641a28cfcfc4b9_12537247 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->wishlist_id, 'id');
$_smarty_tpl->tpl_vars['id']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value) {
$_smarty_tpl->tpl_vars['id']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['offer_card']->value->id_internship) {?>
                <svg class="card-bookmark" data-offer="<?php echo $_smarty_tpl->tpl_vars['offer_card']->value->id_internship;?>
-1"><use href="/img/sprite.svg#bookmark"></use></svg>
                <?php break 1;?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['id']->value == end($_smarty_tpl->tpl_vars['user']->value->wishlist_id)) {?>
                <svg class="card-bookmark" data-offer="<?php echo $_smarty_tpl->tpl_vars['offer_card']->value->id_internship;?>
-0"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <svg class="card-bookmark"><use href="/img/sprite.svg#bookmark_stroke"></use></svg>
    <?php }?>
</div><?php }
}
