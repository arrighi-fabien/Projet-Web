<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('offers', $offers);
$smarty->assign('offer_detail', $offer_detail);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('search-offers.tpl');
