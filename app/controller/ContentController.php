<?php

class ContentController {

    private $element;
    private $action;
    private $id;

    public function __construct($element, $action, $id = null) {
        $this->element = $element;
        $this->action = $action;
        $this->id = $id;
        if ($this->action == 'add') {
            $this->add();
        }
        else if ($this->action == 'edit') {
            $this->edit();
        }
        else if ($this->action == 'delete') {
            $this->delete();
        }
    }

    public function add() {
        if ($this->element == 'offers') {
            $content_type = 'offer';
        }
        else if ($this->element == 'companies') {
            $content_type = 'company';
        }
        else if ($this->element == 'users') {
            $content_type = 'user';
        }
        $page = 'admin-modification-page';
        require_once '../app/view/view.php';
    }

    public function edit() {
        if ($this->element == 'offers') {
            $offer_model = new OfferModel();
            $result = $offer_model->getOfferDetails($this->id);
            $offer_skills = $offer_model->getOfferSkills($this->id);
            $result['skills'] = $offer_skills;
            $skills = $offer_model->getSkills();
            $content_type = 'offer';
        }
        else if ($this->element == 'companies') {
            $company_model = new CompanyModel();
            $result = $company_model->getCompanyDetails($this->id);
            $sectors = $company_model->getSectors();
            $content_type = 'company';
        }
        else if ($this->element == 'users') {
            
        }
        $page = 'admin-modification-page';
        require_once '../app/view/view.php';
    }

    public function delete() {
        if ($this->element == 'offers') {
            $offer_model = new OfferModel();
            $offer_model->deleteOffer($this->id);
            header('Location: /admin/offers');
        }
        else if ($this->element == 'users') {
            $user_model = new AuthModel();
            $user_model->deleteUser($this->id);
            header('Location: /admin/users');
        }
    }
}
