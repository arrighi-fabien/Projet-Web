<?php
/* Smarty version 4.3.0, created on 2023-03-18 00:07:30
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641500c28fc844_96140574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7db20b87c2f8172c9214703964fda172c9b40ff' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\homepage.tpl',
      1 => 1679098045,
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
function content_641500c28fc844_96140574 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <img src="/img/background1.webp" alt="" class="background-form background-form--1">
    <img src="/img/background2.webp" alt="" class="background-form background-form--2">
    <div class="hero-banner">
        <img src="/img/logo.webp" alt="Logo" class="hero-banner__img">
        <h1 class="hero-banner__content">Trouvez le stage qui vous correspond en toute simplicité</h1>
    </div>

    <div class="text-presentation">
        <p>
            Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan,
            risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus
            nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
            Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis
            arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh. Mauris sit amet magna non ligula
            vestibulum eleifend. Nulla varius volutpat turpis sed lacinia. Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis nisi.
            Proin vitae facilisis nisi, ac posuere leo. Nam pulvinar blandit velit, id condimentum diam faucibus at. Aliquam lacus nisi, sollicitudin at nisi nec, fermentum congue felis.
            Quisque mauris dolor, fringilla sed tincidunt ac, finibus non odio. Sed vitae mauris nec ante pretium finibus. Donec nisl neque, pharetra ac elit eu, faucibus aliquam
            ligula. Nullam dictum, tellus tincidunt tempor laoreet, nibh elit sollicitudin felis, eget feugiat sapien diam nec nisl. Aenean gravida turpis nisi, consequat dictum risus
            dapibus a. Duis felis ante, varius in neque eu, tempor suscipit sem. Maecenas ullamcorper gravida sem sit amet cursus. Etiam pulvinar purus vitae justo pharetra
            consequat. Mauris id mi ut arcu feugiat maximus. Mauris consequat tellus id tempus aliquet.
        </p>
    </div>
    <div class="best-section m-5-0">
        <h2 class="important-title center-title">Meilleures entreprises</h2>
        <div class="best-section__content">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['best_companies']->value, 'best_company');
$_smarty_tpl->tpl_vars['best_company']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['best_company']->value) {
$_smarty_tpl->tpl_vars['best_company']->do_else = false;
?>
                <div class="card-company card-background">
                    <a href="#" class="card-link"><span></span></a>
                    <div class="card-company__content">
                        <?php if ($_smarty_tpl->tpl_vars['best_company']->value->picture) {?>
                            <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['best_company']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['best_company']->value->company_name;?>
 logo" class="card-company__content__img">
                        <?php } else { ?>
                            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                        <?php }?>
                        <div class="card-company__content__info">
                            <h4 class="card-company__content__info__title"><?php echo $_smarty_tpl->tpl_vars['best_company']->value->company_name;?>
</h4>
                            <div class="text-and-svg">
                                <svg><use href="/img/sprite.svg#building"></use></svg>
                                <p class="card-company__content__sector"><?php echo $_smarty_tpl->tpl_vars['best_company']->value->sector_name;?>
</p>
                            </div>
                            <div class="text-and-svg">
                                <svg><use href="/img/sprite.svg#map"></use></svg>
                                <p class="card-company__content__city"><?php echo $_smarty_tpl->tpl_vars['best_company']->value->city;?>
</p>
                            </div>
                        </div>
                    </div>
                    <p class="card-company__offer"><?php echo $_smarty_tpl->tpl_vars['best_company']->value->offers;?>
 offre<?php if ($_smarty_tpl->tpl_vars['best_company']->value->offers > 1) {?>s<?php }?></p>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <div class="best-section m-5-0">
        <h2 class="important-title center-title">Dernières offres</h2>
        <div class="best-section__content">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latest_offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                <div class="card-company card-background">
                    <a href="#" class="card-link"><span></span></a>
                    <div class="card-company__content">
                        <?php if ($_smarty_tpl->tpl_vars['offer']->value->picture) {?>
                            <img src="/img/company/<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
.webp" alt="<?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
 logo" class="card-company__content__img">
                        <?php } else { ?>
                            <img src="/img/company/default.webp" alt="Default logo" class="card-company__content__img">
                        <?php }?>
                        <div class="card-company__content__info">
                            <h4 class="card-company__content__info__job"><?php echo $_smarty_tpl->tpl_vars['offer']->value->internship_name;?>
</h4>
                            <h5 class="card-company__content__info__title"><?php echo $_smarty_tpl->tpl_vars['offer']->value->company_name;?>
</h5>
                            <p class="card-company__content__city"><?php echo $_smarty_tpl->tpl_vars['offer']->value->city_name;?>
</p>
                            <p class="small-text"><?php echo $_smarty_tpl->tpl_vars['offer']->value->offer_date;?>
</p>
                        </div>
                    </div>
                    <a href="##" class="card-bookmark">
                        <svg><use href="/img/sprite.svg#bookmark"></use></svg>
                    </a>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</main>

<?php if ($_smarty_tpl->tpl_vars['user']->value == null) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
