<?php

class AdminController {

    public function __construct($current_page) {
        $auth = new AuthModel();
        $is_logged = $auth->isLogged();
        if (!$is_logged) {
            header('Location: /login');
            exit();
        }
        else {
            
            if ($current_page == 'admin_offers') {
                $search_offers = new OfferModel();
                $results = $search_offers->searchOffers(10, 1);
                $skills = $search_offers->getSkills();
                $search_mode = 'offer';
            }
            else if ($current_page == 'admin_companies') {
                $search_companies = new CompanyModel();
                $results = $search_companies->searchCompanies(10, 1);
                $sectors = $search_companies->getSectors();
                $search_mode = 'company';
            }
            else if (substr($current_page, -5) == 'users') {
                $search_users = new AuthModel();
                $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : null;
                $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : null;
                $center_name = isset($_GET['center_name']) ? $_GET['center_name'] : null;
                $promotion_name = isset($_GET['promotion_name']) ? $_GET['promotion_name'] : null;
                $is_admin = isset($_GET['is_admin']) ? $_GET['is_admin'] : null;
                $is_pilot = isset($_GET['is_pilot']) ? $_GET['is_pilot'] : null;
                $results = $search_users->searchUsers(5, 1, $last_name, $first_name, $promotion_name, $center_name, $is_admin, $is_pilot);
                if (substr($current_page, 0, 5) == 'admin') {
                    $centers = $search_users->getCenters();
                    $promotions = $search_users->getPromotions();
                    $search_mode = 'user';
                }
                else if (substr($current_page, 0, 3) == 'api') {
                    header('Content-Type: application/json');
                    $users_json = json_encode($results);
                    echo $users_json;
                    exit();
                }
            }
            $page = "admin-page";
            require_once '../app/view/view.php';
        }
    }
}