<?php

$smarty->assign('wishlist', $wishlist);
$smarty->assign('candidatures', $candidatures);
$smarty->assign('is_student', $is_student);
$smarty->assign('nb_page' , 1);
$smarty->assign('max_page' , 1);

$smarty->display('dashboard.tpl');
