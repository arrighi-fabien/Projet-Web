<?php

$smarty->assign('errors', $errors ?? null);

$smarty->display('login.tpl');
