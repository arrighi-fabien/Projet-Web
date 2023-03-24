<?php

$smarty->assign('content_type', $content_type);
$smarty->assign('result', $result ?? null);
$smarty->assign('skills', $skills ?? null);
$smarty->assign('sectors', $sectors ?? null);

$smarty->display('admin-modification-page.tpl');
