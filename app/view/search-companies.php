<?php

$smarty->assign('companies', $companies);
$smarty->assign('sectors', $sectors);
$smarty->assign('page', $page);
$smarty->assign('max_page', 10);

$smarty->display('search-companies.tpl');
