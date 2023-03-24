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
$router->map('POST', '/admin/offers/add', 'AdminController', 'admin_offers_add');
$router->map('POST', '/admin/offers/[i:id]', 'AdminController', 'admin_offers_edit');
$router->map('POST', '/admin/offers/[i:id]/delete', 'AdminController', 'admin_offers_delete');
$router->map('GET', '/admin/companies', 'AdminController', 'admin_companies');
$router->map('POST', '/admin/companies/add', 'AdminController', 'admin_companies_add');
$router->map('POST', '/admin/companies/[i:id]', 'AdminController', 'admin_companies_edit');
$router->map('POST', '/admin/companies/[i:id]/delete', 'AdminController', 'admin_companies_delete');
$router->map('GET', '/admin/users', 'AdminController', 'admin_users');
$router->map('POST', '/admin/users/add', 'AdminController', 'admin_users_add');
$router->map('POST', '/admin/users/[i:id]', 'AdminController', 'admin_users_edit');
$router->map('POST', '/admin/users/[i:id]/delete', 'AdminController', 'admin_users_delete');
// API
$router->map('GET', '/api/search/companies', 'SearchController', 'api_companies');
$router->map('GET', '/api/search/offers', 'SearchController', 'api_offers');
$router->map('POST', '/api/wishlist', 'AuthController', 'api_wishlist');
$router->map('GET', '/api/search/users', 'AdminController', 'api_users');
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
    else {
        $controler = new $match['target']();
    }
}
else {
	header("Location: {$router->generate('error', ['error_type' => '404'])}");
}
