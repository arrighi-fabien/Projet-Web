<?php

require_once '../vendor/autoload.php';
require_once '../app/autoloader.php';

$router = new AltoRouter();

$router->map('GET|POST', '/', 'HomepageController', 'home');
$router->map('GET|POST', '/search/companies', 'SearchController', 'search_companies');
$router->map('GET|POST', '/search/offers', 'SearchController', 'search_offers');
$router->map('GET|POST', '/company-[i:id]', 'CompanyController', 'company');
$router->map('GET|POST', '/offer-[i:id]', 'OfferController', 'offer');
$router->map('GET|POST', '/login', 'AuthController', 'login');
$router->map('GET|POST', '/api/search/companies', 'SearchController', 'api_companies');
$router->map('GET|POST', '/api/search/offers', 'SearchController', 'api_offers');
$router->map('GET|POST', '/error-[*:error_type]', 'ErrorController', 'error');

$match = $router->match();

if ($match != null) {
    $current_page = $match['name'];
    $params = $match['params'];

    if ($current_page === 'error') {
        $controler = new $match['target']($params['error_type']);
    }
    else if (substr($match['target'], 0, 6) == 'Search') {
        $action = explode('_', $current_page);
        $controler = new $match['target']($action[0], $action[1]);
    }
    else if (substr($match['target'], 0, 5) == 'Offer') {
        $controler = new $match['target']($params['id']);
    }
    else if (substr($match['target'], 0, 7) == 'Company') {
        $controler = new $match['target']($params['id']);
    }
    else {
        $controler = new $match['target']();
    }
}
else {
	header("Location: {$router->generate('error', ['error_type' => '404'])}");
}
