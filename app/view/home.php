<?php

$smarty->assign('best_companies', $best_companies);
$smarty->assign('latest_offers', $latest_offers);

$smarty->display('homepage.tpl');
