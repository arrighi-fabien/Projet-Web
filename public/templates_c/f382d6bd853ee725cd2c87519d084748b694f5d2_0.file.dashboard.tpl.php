<?php
/* Smarty version 4.3.0, created on 2023-03-22 00:29:28
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641a4be8e83303_96820141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f382d6bd853ee725cd2c87519d084748b694f5d2' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\dashboard.tpl',
      1 => 1679444967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:offer-card.tpl' => 2,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_641a4be8e83303_96820141 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="m-5-0">
    <a href="/logout" class="btn btn--secondary">Déconnexion</a>
    <div class="best-section__content">
        <div class="card-background personal-info p-2">
            <h2 class="center-title important-title">Informations</h2>
            <div class="personal-info__line">
                <div class="personal-info__element">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->last_name;?>
" disabled>
                </div>
                <div class="personal-info__element">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->first_name;?>
" disabled>
                </div>
            </div>
            <div class="personal-info__element">
                <label for="email">Email :</label>
                <input type="text" id="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" disabled>
            </div>
            <div class="personal-info__line">
                <div class="personal-info__element">
                    <label for="promotion">Promotion :</label>
                    <input type="text" id="promotion" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->promotion_name;?>
" disabled>
                </div>
                <div class="personal-info__element">
                    <label for="center">Centre :</label>
                    <input type="text" id="center" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->center_name;?>
" disabled>
                </div>
            </div>
        </div>
        <div class="card-background p-2-0">
            <h2 class="center-title important-title">Candidature</h2>
            <div class="best-section__content best-section__content--col-1 card-display">
                <?php if ($_smarty_tpl->tpl_vars['candidatures']->value == null) {?>
                        <h2 class="center-title">Vous n'avez pas encore candidaté à une offre</h2>
                    </div>
                <?php } else { ?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['candidatures']->value, 'offer');
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
                <?php }?>
        </div>
    </div>
    <div class="card-background m-5-auto p-2-0">
        <h2 class="center-title important-title">Wishlist</h2>
        <div class="best-section__content card-display">
        <?php if ($_smarty_tpl->tpl_vars['wishlist']->value == null) {?>
            <h2 class="center-title">Vous n'avez pas encore d'offre dans votre wishlist</h2>
        </div>
        <?php } else { ?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlist']->value, 'offer');
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
        <?php }?>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
