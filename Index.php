<?php

include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
session_start();


require_once './actions/aEvt_Evento.php';

$evento = new aEvt_Evento();



$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();



$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->assign("lista", $evento->SelectEventoEmdia());



$smarty->display('./portal/Index.html');