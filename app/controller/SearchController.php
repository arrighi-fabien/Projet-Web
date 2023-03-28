<?php

class SearchController {

    private $method;
    private $element;
    private $LIMIT_REQUEST = 10;

    public function __construct($method, $element) {
        $this->method = $method;
        $this->element = $element;
        if ($this->element == 'offers') {
            $this->searchOffers();
        }
        else if ($this->element == 'companies') {
            $this->searchCompanies();
        }
    }

    private function searchOffers() {
        $search_model = new OfferModel();
        $internship_name = filter_input(INPUT_GET, 'internship_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $company_name = filter_input(INPUT_GET, 'company_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $city_name = filter_input(INPUT_GET, 'city_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $nb_places = filter_input(INPUT_GET, 'nb_places', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

        // TODO : Implement date filter
        $offer_date = isset($_GET['offer_date']) ? $_GET['offer_date'] : null;

        $skills = filter_input(INPUT_GET, 'skills', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $duration = filter_input(INPUT_GET, 'duration', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        $salary = filter_input(INPUT_GET, 'salary', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        
        $nb_page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if($nb_page == null) {
            $nb_page = 1;
        }
        $offers = $search_model->searchOffers($this->LIMIT_REQUEST, $nb_page, $internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
        $max_page = $search_model->searchOffersMaxPage($internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
        $max_page = ceil($max_page->max_page / $this->LIMIT_REQUEST);
        //$offers = AppModel::summarize($offers, 40, 'internship_name');
        $skills = $search_model->getSkills();
        $offers_json = json_encode($offers);
        if ($this->method == 'search') {
            $page = 'search-offers';
            require_once '../app/view/view.php';
        }
        else if ($this->method == 'api') {
            //add $max_page to the offers array to send it to the client
            $offers[] = $max_page;
            $offers_json = json_encode($offers);
            header('Content-Type: application/json');
            echo $offers_json;
        }
    }

    private function searchCompanies() {
        $search_model = new CompanyModel();
        $company_name = filter_input(INPUT_GET, 'company_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $city_name = filter_input(INPUT_GET, 'city_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $sector_name = filter_input(INPUT_GET, 'sector_name', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
        $student_accepted = filter_input(INPUT_GET, 'student_accepted', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        $rate = filter_input(INPUT_GET, 'rate', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        $trust = filter_input(INPUT_GET, 'trust', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        
        $nb_page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if($nb_page == null) {
            $nb_page = 1;
        }
        $is_visible = 1;
        if ($this->method == 'api') {
            $is_visible = filter_input(INPUT_GET, 'is_visible', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if($is_visible == null) {
                $is_visible = 1;
            }
        }
        if ($this->method != 'api' && isset($_SESSION['user']) && ($_SESSION['user']->is_admin == 1 || $_SESSION['user']->is_pilot == 1)) {
            $is_visible = filter_input(INPUT_GET, 'is_visible', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if($is_visible == null) {
                $is_visible = 1;
            }
        }
        $companies = $search_model->searchCompanies($this->LIMIT_REQUEST, $nb_page, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
        $max_page = $search_model->searchCompaniesMaxPage($company_name, $city_name, $sector_name, $student_accepted, $rate, $trust, $is_visible);
        $max_page = ceil($max_page->max_page / $this->LIMIT_REQUEST);
        if ($this->method == 'search') {
            $sectors = $search_model->getSectors();
            $page = 'search-companies';
            require_once '../app/view/view.php';
        }
        else if ($this->method == 'api') {
            header('Content-Type: application/json');
            $companies = json_decode(json_encode($companies), true);
            // foreach company check if the company has a logo
            foreach ($companies as $key => $company) {
                // string to lower case and delete all spaces
                $img_name = strtolower(str_replace(' ', '', $company['company_name']));
                if (file_exists("img/company/{$img_name}.webp")) {
                    $companies[$key]['company_logo'] = "/img/company/{$img_name}.webp";
                }
                else {
                    $companies[$key]['company_logo'] = "/img/company/default.webp";
                }
            }
            $companies[] = $max_page;
            $companies_json = json_encode($companies);
            echo $companies_json;
        }
    }
}
