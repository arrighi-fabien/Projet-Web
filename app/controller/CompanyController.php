<?php

class CompanyController {

    public function __construct($id) {
        $company_model = new CompanyModel();
        $company = $company_model->getCompanyDetails($id);
        $offer_model = new OfferModel();
        $company_offers = $offer_model->searchOffers(10, 1, null, $company->company_name);
        $company_offers = AppModel::getEllapsedTime($company_offers, 'offer_date');
        $page = 'company';
        require_once '../app/view/view.php';
    }
}