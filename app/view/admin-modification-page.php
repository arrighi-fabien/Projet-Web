<?php

$smarty->assign('content_type', $content_type);
$smarty->assign('result', $result ?? null);
$smarty->assign('skills', $skills ?? null);
$smarty->assign('offer_skills', $offer_skills ?? null);
$smarty->assign('companies', $companies ?? null);
$smarty->assign('sectors', $sectors ?? null);

$smarty->display('admin-modification-page.tpl');
