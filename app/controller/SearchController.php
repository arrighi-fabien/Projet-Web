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
        $internship_name = isset($_GET['internship_name']) ? $_GET['internship_name'] : null;
        $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
        $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
        $nb_places = isset($_GET['nb_places']) ? $_GET['nb_places'] : null;
        $offer_date = isset($_GET['offer_date']) ? $_GET['offer_date'] : null;
        $skills = isset($_GET['skills']) ? $_GET['skills'] : null;
        $duration = isset($_GET['duration']) ? $_GET['duration'] : null;
        $salary = isset($_GET['salary']) ? $_GET['salary'] : null;
        $nb_page = isset($_GET['page']) ? $_GET['page'] : 1;
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
        $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
        $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
        $sector_name = isset($_GET['sector_name']) ? $_GET['sector_name'] : null;
        $student_accepted = isset($_GET['student_accepted']) ? $_GET['student_accepted'] : null;
        $rate = isset($_GET['rate']) ? $_GET['rate'] : null;
        $trust = isset($_GET['trust']) ? $_GET['trust'] : null;
        $nb_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $is_visible = 1;
        if ($this->method == 'api') {
            $is_visible = isset($_GET['is_visible']) ? $_GET['is_visible'] : 1;
        }
        if ($this->method != 'api' && isset($_SESSION['user']) && ($_SESSION['user']->is_admin == 1 || $_SESSION['user']->is_pilot == 1)) {
            $is_visible = isset($_GET['is_visible']) ? $_GET['is_visible'] : 1;
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
                if (file_exists("img/company/{$company['company_name']}.webp")) {
                    $companies[$key]['company_logo'] = "/img/company/{$company['company_name']}.webp";
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
