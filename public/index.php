<?php

require_once '../vendor/autoload.php';
require_once '../app/autoloader.php';

Session::getInstance();

$router = new AltoRouter();

$router->map('GET', '/', 'HomepageController', 'home');
// Search pages
$router->map('GET', '/search/companies', 'SearchController', 'search_companies');
$router->map('GET', '/search/offers', 'SearchController', 'search_offers');
// Details pages
$router->map('GET', '/company-[i:id]', 'CompanyController', 'company');
$router->map('GET', '/offer-[i:id]', 'OfferController', 'offer');
// Account pages
$router->map('GET', '/login', 'AuthController', 'login_page');
$router->map('POST', '/login/connect', 'AuthController', 'login');
$router->map('GET', '/logout', 'AuthController', 'logout');
$router->map('GET', '/dashboard', 'AuthController', 'dashboard');
// Admin pages
$router->map('GET', '/admin/offers', 'AdminController', 'admin_offers');
$router->map('GET|POST', '/admin/offer/add', 'ContentController', 'offers_add');
$router->map('GET|POST', '/admin/offer-[i:id]', 'ContentController', 'offers_edit');
$router->map('POST', '/admin/offer-[i:id]/delete', 'ContentController', 'offers_delete');
$router->map('GET', '/admin/companies', 'AdminController', 'admin_companies');
$router->map('GET|POST', '/admin/company/add', 'ContentController', 'companies_add');
$router->map('GET|POST', '/admin/company-[i:id]', 'ContentController', 'companies_edit');
$router->map('GET', '/admin/users', 'AdminController', 'admin_users');
$router->map('GET|POST', '/admin/user/add', 'ContentController', 'users_add');
$router->map('GET|POST', '/admin/user-[i:id]', 'ContentController', 'users_edit');
$router->map('POST', '/admin/user-[i:id]/delete', 'ContentController', 'users_delete');
// API
$router->map('GET', '/api/search/companies', 'SearchController', 'api_companies');
$router->map('GET', '/api/search/offers', 'SearchController', 'api_offers');
$router->map('POST', '/api/wishlist', 'AuthController', 'api_wishlist');
$router->map('GET', '/api/search/users', 'AdminController', 'api_users');
$router->map('POST', '/api/rating', 'RatingController', 'api_rating');
// Error page
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
    else if (substr($match['target'], 0, 5) == 'Offer' || substr($match['target'], 0, 7) == 'Company') {
        $controler = new $match['target']($params['id']);
    }
    else if (substr($match['target'], 0, 4) == 'Auth' || substr($match['target'], 0, 5) == 'Admin') {
        $controler = new $match['target']($current_page);
    }
    else if (substr($match['target'], 0, 7) == 'Content') {
        $action = explode('_', $current_page);
        $controler = new $match['target']($action[0], $action[1], $params['id'] ?? null);
    }
    else {
        $controler = new $match['target']();
    }
}
else {
	header("Location: {$router->generate('error', ['error_type' => '404'])}");
}
