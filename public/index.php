<?php

require_once '../vendor/autoload.php';
require_once '../app/autoloader.php';

$router = new AltoRouter();

$router->map('GET', '/', 'HomepageController', 'home');
$router->map('GET', '/search/companies', 'SearchController', 'search_companies');
$router->map('GET', '/search/companies?[*:params]', 'SearchController', 'search_companies2');
$router->map('GET', '/search/offers', 'SearchController', 'search_offers');
$router->map('GET', '/offer-[i:id]', 'OfferController', 'offer');
$router->map('GET|POST', '/api/search', 'SearchController', 'api_companies');
$router->map('GET', '/error-[*:error_type]', 'ErrorController', 'error');

$match = $router->match();

if ($match != null) {
    $current_page = $match['name'];
    $params = $match['params'];

    if ($current_page === 'error') {
        $controler = new $match['target']($params['error_type']);
    }
    else if (substr($match['target'], 0, 6) == 'Search') {
        $controler = new $match['target']($current_page);
    }
    else if (substr($match['target'], 0, 5) == 'Offer') {
        $controler = new $match['target']($params['id']);
    }
    else {
        $controler = new $match['target']();
    }
}
else {
	header("Location: {$router->generate('error', ['error_type' => '404'])}");
}
