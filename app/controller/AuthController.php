<?php

class AuthController {

    public function __construct() {
        if (isset($_POST['email']) || isset($_POST['password'])) {
            $user = new UserModel();
            $user->login($_POST['email'], $_POST['password']);
        }

        if (isset($_SESSION['user'])) {
            require '../app/view/dashboard.php';
        }
    }
}
