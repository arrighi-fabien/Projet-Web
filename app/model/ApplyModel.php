<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ApplyModel extends Database {

    public function sendMail(string $email, string $cv, string $motivation_letter, string $offer_name) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'stageduzero.local';
            $mail->SMTPAuth = false;
            $mail->Port = 1025;

            // utf-8
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom('contact@stageduzero.local');
            $mail->addAddress($email);

            //Attachments
            $mail->addAttachment($cv);
            $mail->addAttachment($motivation_letter);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Candidature';
            $mail->Body = 'Un étudiant a postulé à votre offre de stage : <strong>'.$offer_name.'</strong>.';
            $mail->AltBody = 'Un étudiant a postulé à votre offre de stage : '.$offer_name.'.';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
