<?php

class ApplyController {

    public function __construct($id) {
        $apply_model = new ApplyModel();
        $auth = new AuthModel();
        $is_logged = $auth->isLogged();
        if (!$is_logged) {
            header('Location: /login');
            exit();
        }
        if ($_FILES) {
            $offer_model = new OfferModel();
            $company_model = new CompanyModel();
            $auth_model = new AuthModel();
            $first_name = Session::getInstance()->read('user')->first_name;
            $last_name = Session::getInstance()->read('user')->last_name;
            $email_to = $company_model->getCompanyMailInternship($id)->email;
            $offer_name = $offer_model->getOfferDetails($id);
            if ($offer_name) {
                $offer_name = $offer_name[0]->internship_name;
            }

            $cv_path = UploadModel::uploadPdf("CV", $_FILES['cv'], $last_name, $first_name);
            if (!$cv_path) {
                $errors = "Le fichier CV n'est pas au bon format";
                $page = "apply";
                require_once '../app/view/view.php';
                exit();
            }
            $motivation_letter_path = UploadModel::uploadPdf("MV", $_FILES['motivation_letter'], $last_name, $first_name);
            if (!$motivation_letter_path) {
                $errors = "Le fichier lettre de motivation n'est pas au bon format";
                $page = "apply";
                require_once '../app/view/view.php';
                exit();
            }
            if ($apply_model->sendMail($email_to, $cv_path, $motivation_letter_path, $offer_name)) {
                $auth_model->addCandidate($id, Session::getInstance()->read('user')->id_user);
                $success = "Votre candidature a bien été envoyée";
                $page = "apply";
                require_once '../app/view/view.php';
                exit();
            }
            else {
                $errors = "Une erreur est survenue lors de l'envoi de votre candidature";
                $page = "apply";
                require_once '../app/view/view.php';
                exit();
            }
        }

        $page = "apply";
        require_once '../app/view/view.php';
    }
}
