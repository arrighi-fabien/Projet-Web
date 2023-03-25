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
            $offer_model = new OfferModel();
            if (isset($_POST) && !empty($_POST)) {
                $internship_name = htmlspecialchars($_POST['internship_name']);
                $id_company = htmlspecialchars($_POST['id_company']);
                $city_name = htmlspecialchars($_POST['city_name']);
                $description = htmlspecialchars($_POST['description']);
                $duration = htmlspecialchars($_POST['duration']);
                $salary = htmlspecialchars($_POST['salary']);
                $nb_places = htmlspecialchars($_POST['nb_places']);
                foreach ($_POST['skills'] as $skill) {
                    $skills[] = htmlspecialchars($skill);
                }
                $offer_model->addOffer($internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills);
                header('Location: /admin/offers');
                exit();
            }
            $company_model = new CompanyModel();
            $companies = $company_model->getCompanies();
            $skills = $offer_model->getSkills();
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
            if (isset($_POST) && !empty($_POST)) {
                // check all fields
                $internship_name = htmlspecialchars($_POST['internship_name']);
                $id_company = htmlspecialchars($_POST['id_company']);
                $city_name = htmlspecialchars($_POST['city_name']);
                $description = htmlspecialchars($_POST['description']);
                $duration = htmlspecialchars($_POST['duration']);
                $salary = htmlspecialchars($_POST['salary']);
                $nb_places = htmlspecialchars($_POST['nb_places']);
                foreach ($_POST['skills'] as $skill) {
                    $skills[] = htmlspecialchars($skill);
                }
                $offer_model->updateOffer($this->id, $internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills);
                header('Location: /admin/offers');
            }
            $result = $offer_model->getOfferDetails($this->id);
            if ($result != null) {
                $offer_skills = $offer_model->getOfferSkills($this->id);
                $skills = $offer_model->getSkills();
                $company_model = new CompanyModel();
                $companies = $company_model->getCompanies();
                $content_type = 'offer';
            }
            else {
                header('Location: /admin/offers');
            }
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
