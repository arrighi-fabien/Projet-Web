<?php

class OfferController {

    public function __construct($id) {
        $offer_model = new OfferModel();
        $offer = $offer_model->getOfferDetails($id);
        //put offer in an array to use the summarize function
        $offer = AppModel::getEllapsedTime([$offer], 'offer_date');
        $page = 'offer';
        require_once '../app/view/view.php';
    }
}