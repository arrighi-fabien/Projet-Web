<?php

class TrustingController {

    public function __construct() {
        $checked = isset($_POST['checked']) ? $_POST['checked'] : null;
        $id_company = filter_input(INPUT_POST, 'id_company', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if($checked != null && $id_company != null) {
            $auth_model = new AuthModel();
            $is_logged = $auth_model->isLogged();
            if ($is_logged) {
                $id_user = Session::getInstance()->read('user')->id_user;
                if($checked == 'true') {
                    $auth_model->addTrust($id_company, $id_user);
                } else {
                    $auth_model->removeTrust($id_company, $id_user);
                }
                $json = json_encode(array('status' => 'success'));
            } else {
                $json = json_encode(array('status' => 'not_logged_in'));
            }
        }
        else {
            $json = json_encode(array('status' => 'error', 'checked' => $checked, 'id_company' => $id_company));
        }
        header('Content-Type: application/json');
        echo $json;
    }
}