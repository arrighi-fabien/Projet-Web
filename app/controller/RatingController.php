<?php

class RatingController {

    public function __construct() {
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $id_company = isset($_POST['id_company']) ? $_POST['id_company'] : null;
        if($rate != null && $id_company != null) {
            $auth_model = new AuthModel();
            $is_logged = $auth_model->isLogged();
            if ($is_logged) {
                $id_user = Session::getInstance()->read('user')->id_user;
                $auth_model->addRate($id_company, $id_user, $rate);
                $json = json_encode(array('status' => 'success'));
            } else {
                $json = json_encode(array('status' => 'not_logged_in'));
            }
        }
        else {
            $json = json_encode(array('status' => 'error', 'rate' => $rate, 'id_company' => $id_company));
        }
        header('Content-Type: application/json');
        echo $json;
    }
}