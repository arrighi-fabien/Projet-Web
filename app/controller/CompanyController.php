<?php

class CompanyController {

    public function __construct($id) {
        $company_model = new CompanyModel();
        $company = $company_model->getCompanyDetails($id);
        $company_ratings = $company_model->getRate($id);
        $trust = $company_model->getTrust($id);
        $auth_model = new AuthModel();
        $is_logged = $auth_model->isLogged();
        if($is_logged) {
            $id_user = Session::getInstance()->read('user')->id_user;
            //todo verify user permission
            if($auth_model->getUserNumberPrivilege($id_user) >= 2){
                $user_trust = $company_model->getUserTrust($id, $id_user)->result;
            } else {
                $user_trust = -1;
            }
            $evaluation = $company_model->getUserRate($id, $id_user)->evaluation;
            $rated = ["","","","",""];
            for($i = 0; $i < $evaluation; $i++) {
                $rated[$i] = "rated";
            }
        } else {
            $user_trust = -1;
            $rated = ["","","","",""];
        }
        $offer_model = new OfferModel();
        $company_offers = $offer_model->searchOffers(10, 1, null, $company->company_name);
        $page = 'company';
        require_once '../app/view/view.php';
    }
}