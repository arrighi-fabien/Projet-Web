<?php

$smarty->assign('companies', $companies);
$smarty->assign('sectors', $sectors);

$smarty->display('search-companies.tpl');
