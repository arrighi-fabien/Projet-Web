<?php

class ErrorController {

    public function __construct($error_type) {

        if ($error_type == '404') {
            $error_type = "La page que vous cherchez n'existe pas";
        }
        else if ($error_type == 'database-connection') {
            $error_type = "Veillez nous excuser, une erreur est survenue lors de la connexion à la base de données";
        }
        else {
            $error_type = "Une erreur est survenue";
        }

        require '../app/view/error.php';
    }
}
