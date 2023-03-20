<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('companies', $companies);
$smarty->assign('sectors', $sectors);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('search-companies.tpl');
