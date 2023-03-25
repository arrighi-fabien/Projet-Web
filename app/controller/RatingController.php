<?php

class RatingController {

    public function __construct() {
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $id_company = isset($_POST['id_company']) ? $_POST['id_company'] : null;
        $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;
        if($rate != null && $id_company != null && $id_user != null) {
            $search_model = new CompanyModel();
            $search_model->setRate($id_company, $id_user, $rate);
            $json = json_encode(array('status' => 'success'));
        }
        else {
            $json = json_encode(array('status' => 'error'));
        }
        header('Content-Type: application/json');
        echo $json;
    }
}