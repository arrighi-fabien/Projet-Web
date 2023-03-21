<?php

require_once '../vendor/autoload.php';
require_once '../app/autoloader.php';

Session::getInstance();

$router = new AltoRouter();

$router->map('GET', '/', 'HomepageController', 'home');
$router->map('GET', '/search/companies', 'SearchController', 'search_companies');
$router->map('GET', '/search/offers', 'SearchController', 'search_offers');
$router->map('GET', '/company-[i:id]', 'CompanyController', 'company');
$router->map('GET', '/offer-[i:id]', 'OfferController', 'offer');
$router->map('GET', '/login', 'AuthController', 'login_page');
$router->map('POST', '/login/connect', 'AuthController', 'login');
$router->map('GET', '/dashboard', 'AuthController', 'dashboard');
$router->map('GET', '/api/search/companies', 'SearchController', 'api_companies');
$router->map('GET', '/api/search/offers', 'SearchController', 'api_offers');
$router->map('POST', '/api/wishlist', 'AuthController', 'api_wishlist');
$router->map('GET', '/error-[*:error_type]', 'ErrorController', 'error');

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
    else if (substr($match['target'], 0, 4) == 'Auth') {
        $controler = new $match['target']($current_page);
    }
    else {
        $controler = new $match['target']();
    }
}
else {
	header("Location: {$router->generate('error', ['error_type' => '404'])}");
}
