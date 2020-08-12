<?php
require __DIR__.'/../lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email(2, "mail.abrigoidosossvp.org", "contato@abrigoidosossvp.org", '$C0nt@t0$', "ssl", "465", "contato@abrigoidosossvp.org", "Equipe Abrigo" );
$novoEmail->sendMail("Assunto de teste", "<p>Esse é mais um email de <b>teste</b> do sistema de email.</p>", "lincoln.aurelio@gmail.com","Reply Nome","lincoln.aurelio@gmail.com", "Lincoln");

var_dump($novoEmail);






