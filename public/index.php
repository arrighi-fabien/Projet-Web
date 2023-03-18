<?php

require_once '../vendor/autoload.php';
require_once '../app/autoloader.php';

$router = new AltoRouter();

$router -> map('GET', '/', 'HomepageController', 'home');


$match = $router -> match();

if ($match != null) {
    $current_page = $match['name'];
    $params = $match['params'];
    require "../app/controller/{$match['target']}.php";
    $controler = new $match['target']();
}
else {
	echo '404';
}
