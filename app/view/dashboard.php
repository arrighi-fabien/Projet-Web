<?php

$smarty->assign('wishlist', $wishlist);
$smarty->assign('candidatures', $candidatures);
$smarty->assign('is_student', $is_student);

$smarty->display('dashboard.tpl');
