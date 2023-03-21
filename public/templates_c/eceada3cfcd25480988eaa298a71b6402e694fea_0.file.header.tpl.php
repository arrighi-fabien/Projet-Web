<?php
/* Smarty version 4.3.0, created on 2023-03-21 12:15:19
  from 'C:\Users\fabar\Desktop\CESI\CPI A2\BLOC 4 Web\Projet\Projet-Web\app\view\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64199fd733d586_72068468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eceada3cfcd25480988eaa298a71b6402e694fea' => 
    array (
      0 => 'C:\\Users\\fabar\\Desktop\\CESI\\CPI A2\\BLOC 4 Web\\Projet\\Projet-Web\\app\\view\\templates\\header.tpl',
      1 => 1679395427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64199fd733d586_72068468 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="/css/style.css">
    <?php echo '<script'; ?>
 src="/js/script.js" defer><?php echo '</script'; ?>
>
    <link rel="manifest" href="/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php echo '<script'; ?>
>
        window.addEventListener('load', () => {
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/sw.js');
            }
        });
    <?php echo '</script'; ?>
>
    <meta name="theme-color" content="#317EFB"/>
    <link rel="apple-touch-icon" href="/img/logo-192.png">
    <link rel="icon" href="/img/logo-192.png">
    <meta name="description" content="Site de recherche de stage">
    <title>Stage du zero</title>
</head>
<body>
    <header class="header">
        <a href="/">
            <img src="/img/logo.webp" alt="logo" class="header__logo">
        </a>
        <nav class="header__nav">
            <ul>
                <li class="header__nav__item"><a href="/" class="link-effect">Accueil</a></li>
                <li class="header__nav__item"><a href="/search/companies" class="link-effect">Trouver une entreprise</a></li>
                <li class="header__nav__item"><a href="/search/offers" class="link-effect">Trouver un stage</a></li>
            </ul>
        </nav>
        <?php if ($_smarty_tpl->tpl_vars['user']->value == null) {?>
            <input type="button" value="Se connecter" class="header__account btn btn--primary">
        <?php } else { ?>
            <input type="button" value="Mon compte" class="header__account btn btn--primary">
        <?php }?>
        <div class="header__menu">
            <span class="header__menu__line--1"></span>
            <span class="header__menu__line--2"></span>
            <span class="header__menu__line--3"></span>
            <span class="header__menu__line--4"></span>
            <span class="header__menu__line--5"></span>
        </div>
    </header><?php }
}
