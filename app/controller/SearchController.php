<?php

class SearchController {

    public function __construct($current_page) {
        if ($current_page == 'search_companies') {
            $search_model = new CompanyModel();
            $companies = $search_model->searchCompanies(20, 1);
            require '../app/view/search-companies.php';
        }
        else if ($current_page == 'search_offers') {
            $search_model = new OfferModel();
            $offers = $search_model->searchOffers(20, 1);
            //$offers = AppModel::summarize($offers, 40, 'internship_name');
            $offers = AppModel::getEllapsedTime($offers, 'offer_date');
            $offers_json = json_encode($offers);
            require '../app/view/search-offers.php';
        }
        else {
            header('Location: /error-404');
            exit();
        }
    }
}
