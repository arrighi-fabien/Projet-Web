<?php

class SearchController {

    public function __construct($method, $page) {
        if ($page == 'offers') {
            $search_model = new OfferModel();
            $internship_name = isset($_GET['internship_name']) ? $_GET['internship_name'] : null;
            $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
            $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
            $nb_places = isset($_GET['nb_places']) ? $_GET['nb_places'] : null;
            $offer_date = isset($_GET['offer_date']) ? $_GET['offer_date'] : null;
            $skills = isset($_GET['skills']) ? $_GET['skills'] : null;
            $duration = isset($_GET['duration']) ? $_GET['duration'] : null;
            $salary = isset($_GET['salary']) ? $_GET['salary'] : null;
            $offers = $search_model->searchOffers(10, 1, $internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
            //$offers = AppModel::summarize($offers, 40, 'internship_name');
            $skills = $search_model->getSkills();
            $offers_json = json_encode($offers);
            if ($method == 'search') {
                $page = 'search-offers';
                require_once '../app/view/view.php';
            }
            else if ($method == 'api') {
                header('Content-Type: application/json');
                echo $offers_json;
            }
        }
        else {
            $search_model = new CompanyModel();
            $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
            $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
            $sector_name = isset($_GET['sector_name']) ? $_GET['sector_name'] : null;
            $student_accepted = isset($_GET['student_accepted']) ? $_GET['student_accepted'] : null;
            $rate = isset($_GET['rate']) ? $_GET['rate'] : null;
            $trust = isset($_GET['trust']) ? $_GET['trust'] : null;
            $companies = $search_model->searchCompanies(10, 1, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust);
            if ($method == 'search') {
                $sectors = $search_model->getSectors();
                $page = 'search-companies';
                require_once '../app/view/view.php';
            }
            else if ($method == 'api') {
                header('Content-Type: application/json');
                // convert to array
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
                $companies_json = json_encode($companies);
                echo $companies_json;
            }
        }
    }
}
