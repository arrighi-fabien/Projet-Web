<?php

class SearchController {

    public function __construct($method, $page) {
        $LIMIT_REQUEST = 10;
        $nb_page = isset($_GET['page']) ? $_GET['page'] : 1;
        //verify if $page is a number and if not, set it to 1
        if (!is_numeric($nb_page)) {
            $nb_page = 1;
        } else if ($nb_page < 1) { // verify if the page number is valid (not negative) and if not, set it to 1
            $nb_page = 1;
        }
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
            $offers = $search_model->searchOffers($LIMIT_REQUEST, $nb_page, $internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
            $max_page = $search_model->searchOffersMaxPage($internship_name, $company_name, $city_name, $nb_places, $offer_date, $skills, $duration, $salary);
            $max_page = ceil($max_page->max_page / $LIMIT_REQUEST);
            //$offers = AppModel::summarize($offers, 40, 'internship_name');
            $skills = $search_model->getSkills();
            $offers_json = json_encode($offers);
            if ($method == 'search') {
                $offers_json = json_encode($offers);
                $page = 'search-offers';
                require_once '../app/view/view.php';
            }
            else if ($method == 'api') {
                //add $max_page to the offers array to send it to the client
                $offers[] = $max_page;
                $offers_json = json_encode($offers);
                
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
            $companies = $search_model->searchCompanies($LIMIT_REQUEST, $nb_page, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust);
            $max_page = $search_model->searchCompaniesMaxPage($company_name, $city_name, $sector_name, $student_accepted, $rate, $trust);
            $max_page = ceil($max_page->max_page / $LIMIT_REQUEST);
            //$max_page = ceil(18 / $LIMIT_REQUEST);
            if ($method == 'search') {
                $sectors = $search_model->getSectors();
                $page = 'search-companies';
                require_once '../app/view/view.php';
            }
            else if ($method == 'api') {
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
}
