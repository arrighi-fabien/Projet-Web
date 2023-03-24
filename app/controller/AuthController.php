<?php

class AuthController {

    public function __construct($current_page) {
        if ($current_page == 'api_wishlist') {
            $id_offer = filter_input(INPUT_POST, 'id_offer', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            $action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if ($id_offer !== null && $action !== null) {
                if ($action == 0) {
                    $auth = new AuthModel();
                    $auth->addWishlist($id_offer);
                    header('Content-Type: application/text');
                    echo "success";
                }
                else if ($action == 1) {
                    $auth = new AuthModel();
                    $auth->removeWishlist($id_offer);
                    header('Content-Type: application/text');
                    echo "success";
                }
                else {
                    header('Content-Type: application/text');
                    echo "error";
                }
            }
            else {
                header('Content-Type: application/text');
                echo "error";
            }
        }
        else if ($current_page == 'logout') {
            $auth = new AuthModel();
            $auth->logout();
            header("Location: /login");
            exit();
        }
        else {
            if (Session::getInstance()->read('user') == null) {
                $auth = new AuthModel();
                if ($auth->reconnectFromCookie()) {
                    $auth->getWishlistId();
                    $wishlist = $auth->getWishlist();
                    header("Location: /dashboard");
                    exit();
                }
                if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE) && isset($_POST['password']) && !empty($_POST['password'])) {
                    if ($auth->login($_POST['email'], $_POST['password'], isset($_POST['remember']))) {
                        $auth->getWishlistId();
                        $wishlist = $auth->getWishlist();
                        header("Location: /dashboard");
                        exit();
                    }
                    else {
                        $errors = "Email ou mot de passe incorrect";
                        $page = 'login';
                        require_once '../app/view/view.php';
                    }
                }
                else if ($current_page == 'dashboard' || $current_page == 'login') {
                    header("Location: /login");
                    exit();
                }
                else {
                    $page = 'login';
                    require_once '../app/view/view.php';
                }
            }
            else {
                if ($current_page == 'login_page') {
                    header("Location: /dashboard");
                    exit();
                }
                $auth = new AuthModel();
                $auth->getWishlistId();
                $wishlist = $auth->getWishlist();
                $candidatures = $auth->getCandidatures();
                $page = 'dashboard';
                require_once '../app/view/view.php';
            }
        }
    }
}
