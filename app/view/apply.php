<?php

$smarty->assign('errors', $errors ?? null);
$smarty->assign('success', $success ?? null);

$smarty->display('apply.tpl');
