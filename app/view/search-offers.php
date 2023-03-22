<?php

if (empty($offers)) {
    header('Location: /search/offers');
    exit();
}

$smarty->assign('offers', $offers);
$smarty->assign('offers_json', $offers_json);

$smarty->assign('nb_page', $nb_page);
$smarty->assign('max_page', $max_page);
//get current url with all parameters
$smarty->assign('url1', $_SERVER['REQUEST_URI']);


// remove page number from url
$url = preg_replace('/page=[0-9]+/', '', $_SERVER['REQUEST_URI']);
// add page number to url
if(strpos($url, '?') === false) {
    $url .= '?';
} else {
    // add & if the url doen't end with ? or &
    if (substr($url, -1) != '?' && substr($url, -1) != '&') {
        $url .= '&';
    }
}
$smarty->assign('url', $url);

$smarty->display('search-offers.tpl');
