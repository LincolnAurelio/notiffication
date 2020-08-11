<?php

namespace Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    
    private $mail = \stdClass::Class;
    
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                                         // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = 'mail.abrigoidosossvp.org';             // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = 'contato@abrigoidosossvp.org';          // SMTP username
        $this->mail->Password   = '$C0nt@t0$';                            // SMTP password
        $this->mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 465; 
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('contato@abrigoidosossvp.org', 'Equipe Abrigo');
        //$this->mail->SMTPAuth = false;
        //$this->mail->SMTPSecure = false;
    }


    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;
        
        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);
        
        try {
            $this->mail->send();
        } catch (Exception $ex) {
            echo "Erro ao enviar o email: {$this->mail->ErroInfo} {$ex->getMessage()}";
        }
    }
}

