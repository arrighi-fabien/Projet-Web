<?php

$smarty->assign('offer', $offer[0]);
$smarty->assign('company_ratings', $company_ratings->evaluation);
$smarty->assign('trust', $trust->result);

$smarty->display('offer.tpl');
