<?php

$smarty = new Smarty();

$smarty->template_dir = '../app/view/templates';

$smarty->assign('best_companies', $best_companies);
$smarty->assign('latest_offers', $latest_offers);
$smarty->assign('user', isset($_SESSION['user']) ? $_SESSION['user'] : '');

$smarty->display('homepage.tpl');
