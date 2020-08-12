<?php

namespace Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    
    private $mail = \stdClass::Class;
    
    public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug; //2;                                         
        $this->mail->isSMTP();                                            
        $this->mail->Host       = $host; //'mail.abrigoidosossvp.org';
        $this->mail->SMTPAuth   = true;                                   
        $this->mail->Username   = $user; //'contato@abrigoidosossvp.org';
        $this->mail->Password   = $pass; //'$C0nt@t0$';
        $this->mail->SMTPSecure = $smtpSecure; //'ssl';
        $this->mail->Port       = $port; //465; 
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);
        //$this->mail->setFrom('contato@abrigoidosossvp.org', 'Equipe Abrigo');
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

