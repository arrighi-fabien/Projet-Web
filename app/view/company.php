<?php

$smarty->assign('company', $company);
$smarty->assign('company_offers', $company_offers);
$smarty->assign('company_ratings', $company_ratings->evaluation);
$smarty->assign('rated', $rated);
$smarty->assign('trust', $trust->result);
$smarty->assign('user_trust', $user_trust);

$smarty->display('company.tpl');
