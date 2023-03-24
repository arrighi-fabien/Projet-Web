<?php

class RatingController {

    public function __construct() {
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $rate = isset($_POST['id_company']) ? $_POST['id_company'] : null;
        $rate = isset($_POST['id_user']) ? $_POST['id_user'] : null;
        if($rate != null && $id_company != null && $id_user != null) {
            $search_model = new CompanyModel();
            $search_model->setRating($rate, $id_company, $id_user);
            $json = json_decode("{'status': 'success'}");
        }
        else {
            $json = json_decode("{'status': 'error'}");
        }
        var_dump($json);
        header('Content-Type: application/json');
        echo $json;
    }
}