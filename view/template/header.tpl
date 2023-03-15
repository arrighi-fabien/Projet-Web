<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="src/css/style.css">
    <script src="src/js/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Stage du zero</title>
</head>
<body>
    <header class="header">
        <a href="index.html">
            <img src="src/img/logo.webp" alt="logo" class="header__logo">
        </a>
        <nav class="header__nav">
            <ul>
                <li class="header__nav__item"><a href="" class="link-effect">Accueil</a></li>
                <li class="header__nav__item"><a href="/search.html" class="link-effect">Trouver une entreprise</a></li>
                <li class="header__nav__item"><a href="#" class="link-effect">Trouver un stage</a></li>
            </ul>
        </nav>
        {if $user == null}
            <input type="button" value="Se connecter" class="header__account btn btn--primary">
        {else}
            <input type="button" value="Mon compte" class="header__account btn btn--primary">
        {/if}
        <div class="header__menu">
            <span class="header__menu__line--1"></span>
            <span class="header__menu__line--2"></span>
            <span class="header__menu__line--3"></span>
            <span class="header__menu__line--4"></span>
            <span class="header__menu__line--5"></span>
        </div>
    </header>