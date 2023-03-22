<?php

class HomepageController {

    public function __construct() {
        $company = new CompanyModel();
        $best_companies = $company->getBestCompanies();
        $best_companies = AppModel::summarize($best_companies, 40, 'city', ',');

        $offer = new OfferModel();
        $latest_offers = $offer->getLatestOffers();
        //$latest_offers = AppModel::summarize($latest_offers, 40, 'internship_name');
        $latest_offers = AppModel::getEllapsedTime($latest_offers, 'offer_date');

        $page = 'home';
        require_once '../app/view/view.php';
    }
}
