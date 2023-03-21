<?php

class OfferController {

    public function __construct($id) {
        $offer_model = new OfferModel();
        $offer = $offer_model->getOfferDetails($id);
        //put offer in an array to use the summarize function
        $offer = AppModel::getEllapsedTime([$offer], 'offer_date');
        require '../app/view/offer.php';
    }
}