<?php

require_once './config/eMail.php';

$eMail = new eMail();

$eMail->enviarEMail("victorhugolgr@gmail.com", "victor", "teste", "\o/");
//$eMail->sendEmail('victorhugolgr@gmail.com', 'victorhugolgr@gmail.com', 'teste', 'teste no corpo');

