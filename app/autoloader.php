<?php

spl_autoload_register('app_autoload');

function app_autoload($class) {
    // if the name of the class finish with "Controller", we are in the controller folder
    if (substr($class, -10) == 'Controller') {
        require dirname(__DIR__) . "/app/controller/$class.php";
    }
    else if (substr($class, -5) == 'Model') {
        require dirname(__DIR__) . "/app/model/$class.php";
    }
    else {
        require dirname(__DIR__) . "/core/$class.php";
    }
}
