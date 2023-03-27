<?php

$smarty->assign('content_type', $content_type);
$smarty->assign('result', $result ?? null);
$smarty->assign('skills', $skills ?? null);
$smarty->assign('offer_skills', $offer_skills ?? null);
$smarty->assign('companies', $companies ?? null);
$smarty->assign('sectors', $sectors ?? null);
$smarty->assign('centers', $centers ?? null);
$smarty->assign('promotions', $promotions ?? null);
$smarty->assign('is_admin', $is_admin ?? false);
$smarty->assign('promotions', $promotions ?? false);

$smarty->display('admin-modification-page.tpl');
