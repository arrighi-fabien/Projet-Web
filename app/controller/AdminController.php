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
            $nb_page = isset($_GET['page']) ? $_GET['page'] : 1;
            if ($current_page == 'admin_offers') {
                $search_offers = new OfferModel();
                $internship_name = isset($_GET['internship_name']) ? $_GET['internship_name'] : null;
                $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
                $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
                $nb_places = isset($_GET['nb_places']) ? $_GET['nb_places'] : null;
                $offer_date = isset($_GET['offer_date']) ? $_GET['offer_date'] : null;
                $skills = isset($_GET['skills']) ? $_GET['skills'] : null;
                $duration = isset($_GET['duration']) ? $_GET['duration'] : null;
                $salary = isset($_GET['salary']) ? $_GET['salary'] : null;
                $results = $search_offers->searchOffers($this->LIMIT_REQUEST, $nb_page, $internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
                $max_page = $search_offers->searchOffersMaxPage($internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
                $skills = $search_offers->getSkills();
                $search_mode = 'offer';
            }
            else if ($current_page == 'admin_companies') {
                $search_companies = new CompanyModel();
                $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
                $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
                $sector_name = isset($_GET['sector_name']) ? $_GET['sector_name'] : null;
                $student_accepted = isset($_GET['student_accepted']) ? $_GET['student_accepted'] : null;
                $rate = isset($_GET['rate']) ? $_GET['rate'] : null;
                $trust = isset($_GET['trust']) ? $_GET['trust'] : null;
                $is_visible = isset($_GET['is_visible']) ? $_GET['is_visible'] : 1;
                $results = $search_companies->searchCompanies($this->LIMIT_REQUEST, $nb_page, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
                $max_page = $search_companies->searchCompaniesMaxPage($company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
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