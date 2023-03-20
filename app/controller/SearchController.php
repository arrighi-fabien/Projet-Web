<?php

class SearchController {

    public function __construct($current_page) {
        if ($current_page == 'search_offers') {
            $search_model = new OfferModel();
            $offers = $search_model->searchOffers(20, 1);
            //$offers = AppModel::summarize($offers, 40, 'internship_name');
            $offers = AppModel::getEllapsedTime($offers, 'offer_date');
            $offers_json = json_encode($offers);
            require '../app/view/search-offers.php';
        }
        else {
            $search_model = new CompanyModel();
            $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : null;
            $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : null;
            $sector_name = isset($_GET['sector_name']) ? $_GET['sector_name'] : null;
            $student_accepted = isset($_GET['student_accepted']) ? $_GET['student_accepted'] : null;
            $rate = isset($_GET['rate']) ? $_GET['rate'] : null;
            $trust = isset($_GET['trust']) ? $_GET['trust'] : null;
            $companies = $search_model->searchCompanies(16, 1, $company_name, $city_name, $sector_name, $student_accepted, $rate, $trust);
            if ($current_page == 'search_companies' || $current_page == 'search_companies2') {
                $sectors = $search_model->getSectors();
                require '../app/view/search-companies.php';
            }
            else if ($current_page == 'api_companies') {
                header('Content-Type: application/json');
                //convert to array
                $companies = json_decode(json_encode($companies), true);
                // foreach company check if the company has a logo
                foreach ($companies as $key => $company) {
                    if (file_exists("img/company/{$company['company_name']}.webp")) {
                        // add the logo to the company
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
