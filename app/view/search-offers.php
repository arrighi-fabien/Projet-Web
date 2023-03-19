<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('offers', $offers);
$smarty->assign('current_page', $current_page);
$smarty->assign('offers_json', $offers_json);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('search-offers.tpl');
