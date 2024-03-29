<?php

class ContentController {

    private $element;
    private $action;
    private $id;

    public function __construct($element, $action, $id = null) {
        $this->element = $element;
        $this->action = $action;
        $this->id = $id;
        $auth = new AuthModel();
        $is_logged = $auth->isLogged();
        if (!$is_logged) {
            header('Location: /login');
            exit();
        }
        if ($this->element == 'offers') {
            $this->offers();
        }
        else if ($this->element == 'companies') {
            $this->companies();
        }
        else if ($this->element == 'users') {
            $this->users();
        }
    }

    private function offers() {
        $offer_model = new OfferModel();
        if (isset($_POST) && !empty($_POST)) {
            $internship_name = htmlspecialchars($_POST['internship_name']);
            $id_company = htmlspecialchars($_POST['id_company']);
            $city_name = htmlspecialchars($_POST['city_name']);
            $description = htmlspecialchars($_POST['description']);
            $duration = htmlspecialchars($_POST['duration']);
            $salary = htmlspecialchars($_POST['salary']);
            $nb_places = htmlspecialchars($_POST['nb_places']);
            $concern = htmlspecialchars($_POST['concern']);
            foreach ($_POST['skills'] as $skill) {
                $skills[] = htmlspecialchars($skill);
            }
            if ($this->action == 'add') {
                $offer_model->addOffer($internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills, $concern);
                header('Location: /admin/offers');
                exit();
            }
            else if ($this->action == 'edit') {
                $offer_model->updateOffer($this->id, $internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills, $concern);
                header('Location: /admin/offers');
                exit();
            }
        }
        if ($this->action == 'delete') {
            $offer_model->deleteOffer($this->id);
            header('Location: /admin/offers');
            exit();
        }
        else if ($this->action == 'edit') {
            $result = $offer_model->getOfferDetails($this->id);
            if ($result != null) {
                $offer_skills = $offer_model->getOfferSkills($this->id);
            }
        }
        $company_model = new CompanyModel();
        $auth_model = new AuthModel();
        $promotions = $auth_model->getPromotions();
        $companies = $company_model->getCompanies();
        $skills = $offer_model->getSkills();
        $content_type = 'offer';
        $page = 'admin-modification-page';
        require_once '../app/view/view.php';
    }

    private function companies() {
        $company_model = new CompanyModel();
        if (isset($_POST) && !empty($_POST)) {
            $company_name = htmlspecialchars($_POST['company_name']);
            $email = htmlspecialchars($_POST['email']);
            $is_visible = htmlspecialchars($_POST['is_visible']);
            $city_name = htmlspecialchars($_POST['city_name']);
            $id_sector = htmlspecialchars($_POST['id_sector']);
            $student_accepted = htmlspecialchars($_POST['student_accepted']);
            $description = htmlspecialchars($_POST['description']);
            if (isset($_FILES)) {
                UploadModel::uploadImgCompany($_FILES['img'], $company_name);
            }
            if ($this->action == 'add') {
                $company_model->addCompany($company_name, $email, $is_visible, $city_name, $id_sector, $student_accepted, $description);
                header('Location: /admin/companies');
                exit();
            }
            else if ($this->action == 'edit') {
                $company_model->updateCompany($this->id, $company_name, $email, $is_visible, $city_name, $id_sector, $student_accepted, $description);
                header('Location: /admin/companies');
                exit();
            }
        }
        if ($this->action == 'edit') {
            $result = $company_model->getCompanyDetails($this->id);
            if ($result != null) {
                $company_sector = $company_model->getSectors($this->id);
            }
        }
        $company_model = new CompanyModel();
        $sectors = $company_model->getSectors();
        $content_type = 'company';
        $page = 'admin-modification-page';
        require_once '../app/view/view.php';
    }

    private function users() {
        $user_model = new AuthModel();
        if (isset($_POST) && !empty($_POST)) {
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'] != '' ? $_POST['password'] : null;
            $is_admin = htmlspecialchars($_POST['is_admin']);
            $is_pilot = htmlspecialchars($_POST['is_pilot']);
            $id_center = htmlspecialchars($_POST['id_center']);
            $id_promotion = htmlspecialchars($_POST['id_promotion']);
            if ($this->action == 'add') {
                $user_model->addUser($first_name, $last_name, $email, $password, $is_admin, $is_pilot, $id_center, $id_promotion);
                header('Location: /admin/users');
                exit();
            }
            else if ($this->action == 'edit') {
                $id_user = Session::getInstance()->read('user')->id_user;
                $auth = new AuthModel();
                if($auth->userIsPilot($id_user) && $auth->userIsPilot($this->id)){
                    header("Location: /admin/users");
                    exit();
                }

                $user_model->updateUser($this->id, $first_name, $last_name, $email, $password, $is_admin, $is_pilot, $id_center, $id_promotion);
                header('Location: /admin/users');
                exit();
            }
        }
        if ($this->action == 'delete') {
            $user_model->deleteUser($this->id);
            header('Location: /admin/users');
            exit();
        }
        else if ($this->action == 'edit') {
            $id_user = Session::getInstance()->read('user')->id_user;
                $auth = new AuthModel();
                if($auth->userIsPilot($id_user) && $auth->userIsPilot($this->id)){
                    header("Location: /admin/users");
                    exit();
                }
            $result = $user_model->getUserDetails($this->id);
        }
        $centers = $user_model->getCenters();
        $promotions = $user_model->getPromotions();
        $content_type = 'user';
        // TODO VERIF if user has perm
        $is_admin = false;
        
        $page = 'admin-modification-page';
        require_once '../app/view/view.php';
    }
}
