<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('error_type', $error_type);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('error.tpl');