<?php

$smarty->assign('company', $company);
$smarty->assign('company_offers', $company_offers);
$smarty->assign('company_ratings', $company_ratings->evaluation);

$smarty->display('company.tpl');
