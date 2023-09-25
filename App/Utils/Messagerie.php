<?php
namespace App\Utils;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Messagerie{
    public static function sendEmail($destinataire, $objet, $contenu){
        require './env.php';
        $mail = new PHPMailer(true);
        try {
            $mail->setLanguage('fr');
            //Paramétre du serveur Messagerie
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $serveur_messagerie;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $login_messagerie;                     //SMTP username
            $mail->Password   = $password_messagerie;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $port_messagerie;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($login_messagerie, 'Mailer');
            $mail->addAddress($destinataire);     //Add a recipient
        
            //Content
            $mail->isHTML(true);
            $mail->Subject = $objet;
            $mail->Body    = $contenu;
            
            return $mail->send();

        } catch (\Exception $e) {
            die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
?>