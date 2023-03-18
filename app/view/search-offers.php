<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('offers', $offers);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('search-offers.tpl');
