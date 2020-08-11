<?php
require __DIR__.'/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail("Assunto de teste", "<p>Esse é um email de <b>teste<b>.</p>", "lincoln.aurelio@gmail.com","Reply Nome","lincoln.aurelio@gmail.com", "Lincoln");

var_dump($novoEmail);






