<?php

$smarty->assign('results', $results);
$smarty->assign('current_page', $current_page);
$smarty->assign('search_mode', $search_mode);
$smarty->assign('sectors', $sectors ?? null);
$smarty->assign('skills', $skills ?? null);
$smarty->assign('centers', $centers ?? null);
$smarty->assign('promotions', $promotions ?? null);

$smarty->display('admin-page.tpl');