<?php
session_start();
include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();



require_once './actions/aEvt_Evento.php';





$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();



$smarty->assign("msg", $msg);
$smarty->assign("type", $type);




$smarty->display('./portal/acompanhamento.html');