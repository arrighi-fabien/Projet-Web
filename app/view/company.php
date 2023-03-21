<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('company', $company);
$smarty->assign('company_offers', $company_offers);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('company.tpl');
