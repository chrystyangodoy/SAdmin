<?php

require_once './config/eMail.php';

$eMail = new eMail();

$eMail->enviarEMail("chrystyangodoy@gmail.com", "Chrystyan", "Teste", "\o/");
//$eMail->sendEmail('victorhugolgr@gmail.com', 'victorhugolgr@gmail.com', 'teste', 'teste no corpo');

