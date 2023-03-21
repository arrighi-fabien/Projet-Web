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
        else {
            if (Session::getInstance()->read('user') == null) {
                if ($current_page == 'dashboard') {
                    header("Location: /login");
                    exit();
                }
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $auth = new AuthModel();
                    if ($auth->login($_POST['email'], $_POST['password'])) {
                        $auth->getWishlistId();
                        $wishlist = $auth->getWishlist();
                        header("Location: /dashboard");
                        exit();
                    }
                    else {
                        $error = "Email ou mot de passe incorrect";
                        $page = 'login';
                        require_once '../app/view/view.php';
                    }
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
                $wishlist = AppModel::getEllapsedTime($wishlist, 'offer_date');
                $candidatures = $auth->getCandidatures();
                $candidatures = AppModel::getEllapsedTime($candidatures, 'offer_date');
                $page = 'dashboard';
                require_once '../app/view/view.php';
            }
        }
    }
}
