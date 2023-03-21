<?php

$smarty = new Smarty();
$smarty->setTemplateDir('../app/view/templates');

$smarty->assign('user', $_SESSION['user'] ?? false);

include "../app/view/{$page}.php";