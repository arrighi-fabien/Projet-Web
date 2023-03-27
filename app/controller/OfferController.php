<?php

class OfferController {

    public function __construct($id) {
        $offer_model = new OfferModel();
        $company_model = new CompanyModel();
        $company_id = $company_model->getCompanyIdIntership($id)->id_company;
        $offer = $offer_model->getOfferDetails($id);
        $company_ratings = $company_model->getRate($company_id);
        $trust = $company_model->getTrust($company_id);
        $page = 'offer';
        require_once '../app/view/view.php';
    }
}