<?php
/* Smarty version 4.3.0, created on 2023-03-21 10:43:04
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64198a3824b448_56948663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7db20b87c2f8172c9214703964fda172c9b40ff' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\homepage.tpl',
      1 => 1679394944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:company-card.tpl' => 1,
    'file:offer-card.tpl' => 1,
    'file:login.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_64198a3824b448_56948663 (Smarty_Internal_Template $_smarty_tpl) {
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
        <p>Bienvenue sur notre site dédié à la recherche de stage pour les étudiants du CESI Nice ! Nous sommes une plateforme qui facilite la recherche de stage pour les étudiants en quête d'opportunités professionnelles. Notre objectif est de connecter les étudiants de CESI Nice avec les entreprises qui cherchent à recruter de nouveaux talents. Nous comprenons que la recherche de stage peut être un processus stressant et fastidieux, c'est pourquoi nous sommes là pour vous aider à trouver le stage qui convient à vos besoins et à vos objectifs professionnels. Sur notre site, vous trouverez des offres de stage de différentes entreprises dans différents secteurs, ainsi que des conseils pour réussir votre recherche de stage et maximiser votre expérience professionnelle. Rejoignez notre communauté aujourd'hui pour accéder à des opportunités de stage incroyables !</p>
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
                <?php $_smarty_tpl->_subTemplateRender("file:company-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('company_card'=>$_smarty_tpl->tpl_vars['best_company']->value), 0, true);
?>
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
                <?php $_smarty_tpl->_subTemplateRender("file:offer-card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('offer_card'=>$_smarty_tpl->tpl_vars['offer']->value), 0, true);
?>
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
