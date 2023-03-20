<?php

class OfferController {

    public function __construct($id) {
        $offer_model = new OfferModel();
        $offer = $offer_model->getOfferDetails($id);
        require '../app/view/offer.php';
    }
}