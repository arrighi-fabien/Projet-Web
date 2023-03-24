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
            else if ($current_page == 'admin_users') {

            }
            $page = "admin-page";
            require_once '../app/view/view.php';
        }
    }
}