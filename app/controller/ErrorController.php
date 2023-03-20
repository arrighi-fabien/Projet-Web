<?php

class ErrorController {

    public function __construct($error_type) {

        if ($error_type == '404') {
            $error_type = "La page que vous cherchez n'existe pas";
        }
        else if ($error_type == 'database-connection') {
            $error_type = "Veillez nous excuser, une erreur est survenue lors de la connexion à la base de données";
        }
        else if ($error_type == 'internet') {
            $error_type = "Veuillez nous excuser, une erreur est survenue lors de la connexion à internet";
        }
        else {
            header('Location: error-404');
        }

        require '../app/view/error.php';
    }
}
