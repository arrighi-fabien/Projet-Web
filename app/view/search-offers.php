<?php

if (empty($offers)) {
    header('Location: /search/offers');
    exit();
}

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('offers', $offers);
$smarty->assign('offers_json', $offers_json);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('search-offers.tpl');
