<?php 
    require 'vendor/autoload.php';

    class SendEmail{
        public static function enviaEmail($to, $subject, $content){
            $key = "defini9da cuando tenga sendGrid de heroku :'(";
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("leal.aburto.m@gmail.com", "Miguel Leal Aburto");
            $email->setSubject($subject);
            $email->addTo($to);
            //$email->addContent("text/plain", $content);
            $sendgrid = new \SendGrid($key);
            try {
                $response = $sendgrid->send($email);
                return $response;
            } catch (Exception $th) {
                echo 'Fallo envio de email con exception: '.$e->getMessage()."\n";
                return false;
            }
        }
    }
?>
