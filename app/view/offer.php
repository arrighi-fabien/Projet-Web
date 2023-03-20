<?php

$smarty = new Smarty();
$smarty->template_dir = '../app/view/templates';

$smarty->assign('offer', $offer);
$smarty->assign('user', $_SESSION['user'] ?? null);

$smarty->display('offer.tpl');
