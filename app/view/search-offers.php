<?php

if (empty($offers)) {
    header('Location: /search/offers');
    exit();
}

$smarty->assign('offers', $offers);
$smarty->assign('offers_json', $offers_json);

$smarty->display('search-offers.tpl');
