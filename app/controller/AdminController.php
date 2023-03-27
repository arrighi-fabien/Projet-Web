<?php

class AdminController {
    private $LIMIT_REQUEST = 10;

    public function __construct($current_page) {
        $auth = new AuthModel();
        $is_logged = $auth->isLogged();
        if (!$is_logged) {
            header('Location: /login');
            exit();
        }
        else {
            $nb_page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if($nb_page == null) {
                $nb_page = 1;
            }
            if ($current_page == 'admin_offers') {
                $search_offers = new OfferModel();
                $internship_name = filter_input(INPUT_GET, 'internship_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $company_name = filter_input(INPUT_GET, 'company_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $city_name = filter_input(INPUT_GET, 'city_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $nb_places = filter_input(INPUT_GET, 'nb_places', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

                // TODO : Implement date filter
                $offer_date = isset($_GET['offer_date']) ? $_GET['offer_date'] : null;

                $skills = filter_input(INPUT_GET, 'skills', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $duration = filter_input(INPUT_GET, 'duration', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $salary = filter_input(INPUT_GET, 'salary', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $results = $search_offers->searchOffers($this->LIMIT_REQUEST, $nb_page, $internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
                $max_page = $search_offers->searchOffersMaxPage($internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
                $skills = $search_offers->getSkills();
                $search_mode = 'offer';
            }
            else if ($current_page == 'admin_companies') {
                $search_companies = new CompanyModel();
                $company_name = filter_input(INPUT_GET, 'company_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $city_name = filter_input(INPUT_GET, 'city_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $sector_name = filter_input(INPUT_GET, 'sector_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $student_accepted = filter_input(INPUT_GET, 'student_accepted', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $rate = filter_input(INPUT_GET, 'rate', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $trust = filter_input(INPUT_GET, 'trust', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $is_visible = filter_input(INPUT_GET, 'is_visible', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                if($is_visible == null) {
                    $is_visible = 1;
                }
                $results = $search_companies->searchCompanies($this->LIMIT_REQUEST, $nb_page, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
                $max_page = $search_companies->searchCompaniesMaxPage($company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
                $sectors = $search_companies->getSectors();
                $search_mode = 'company';
            }
            else if (substr($current_page, -5) == 'users') {
                $search_users = new AuthModel();
                $last_name = filter_input(INPUT_GET, 'last_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $center_name = filter_input(INPUT_GET, 'center_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $promotion_name = filter_input(INPUT_GET, 'promotion_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
                $is_admin = filter_input(INPUT_GET, 'is_admin', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $is_pilot = filter_input(INPUT_GET, 'is_pilot', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                $results = $search_users->searchUsers($this->LIMIT_REQUEST, $nb_page, $last_name, $first_name, $promotion_name, $center_name, $is_admin, $is_pilot);
                $max_page = $search_users->searchUsersMaxPage($last_name, $first_name, $promotion_name, $center_name, $is_admin, $is_pilot);
                if (substr($current_page, 0, 5) == 'admin') {
                    $centers = $search_users->getCenters();
                    $promotions = $search_users->getPromotions();
                    $search_mode = 'user';
                }
                else if (substr($current_page, 0, 3) == 'api') {
                    header('Content-Type: application/json');
                    $results[] = 1;
                    $users_json = json_encode($results);
                    echo $users_json;
                    exit();
                }
            }
            $max_page = ceil($max_page->max_page / $this->LIMIT_REQUEST);
            $page = "admin-page";
            require_once '../app/view/view.php';
        }
    }
}