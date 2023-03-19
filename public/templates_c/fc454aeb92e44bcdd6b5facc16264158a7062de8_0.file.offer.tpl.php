<?php
/* Smarty version 4.3.0, created on 2023-03-19 10:56:40
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\offer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6416ea683508b8_45740982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc454aeb92e44bcdd6b5facc16264158a7062de8' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\offer.tpl',
      1 => 1679223399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:login.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6416ea683508b8_45740982 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="detail-header">
        <?php if (file_exists("img/company/".((string)$_smarty_tpl->tpl_vars['offer']->value->company_name).".webp")) {?>
            <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
 logo" class="card-company__content__img">
        <?php } else { ?>
            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
        <?php }?>
        <h3 class="detail-header__company"><?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
</h3>
        <h2 class="detail-header__title"><?php echo $_smarty_tpl->tpl_vars['offer']->value->internship_name;?>
</h2>
        <div class="detail-header__description">
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#clock"></use></svg>
                <p>Il y a 15 heures</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#map"></use></svg>
                <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->city_name;?>
</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#calendar"></use></svg>
                <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->duration;?>
 semaine<?php if ($_smarty_tpl->tpl_vars['offer']->value->duration > 1) {?>s<?php }?></p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#money"></use></svg>
                <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->salary;?>
€ / mois</p>
            </div>
            <div class="text-and-svg">
                <svg><use href="/img/sprite.svg#checklist"></use></svg>
                <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->skills;?>
</p>
            </div>
        </div>
    </div>
    <div class="detail-description">
        <div class="card-background detail-description__info p-2">
            <div>
                <?php if (file_exists("img/company/".((string)$_smarty_tpl->tpl_vars['offer']->value->company_name).".webp")) {?>
                    <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
 logo" class="card-company__content__img">
                <?php } else { ?>
                    <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                <?php }?>
                <h3 class="detail-header__company"><?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
</h3>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#building"></use></svg>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->sector_name;?>
</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#user-check"></use></svg>
                    <p>Votre pilote valide cette entreprise</p>
                </div>
                <p>Note</p>
            </div>
            <div class="detail-description__info__offer m-2-0">
                <h3><?php echo $_smarty_tpl->tpl_vars['offer']->value->internship_name;?>
</h3>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#clock"></use></svg>
                    <p>Il y a 15 heures</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#map"></use></svg>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->city_name;?>
</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#calendar"></use></svg>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->duration;?>
 semaine<?php if ($_smarty_tpl->tpl_vars['offer']->value->duration > 1) {?>s<?php }?></p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#money"></use></svg>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->salary;?>
€ / mois</p>
                </div>
                <div class="text-and-svg m-1-0">
                    <svg><use href="/img/sprite.svg#checklist"></use></svg>
                    <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->skills;?>
</p>
                </div>
            </div>
            <input type="button" value="Postuler" class="btn btn--primary apply-btn">
        </div>
        <div class="card-background detail-description__text p-2">
            <p><?php echo $_smarty_tpl->tpl_vars['offer']->value->description;?>
</p>
        </div>
    </div>
</main>

<?php if ($_smarty_tpl->tpl_vars['user']->value == null) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}