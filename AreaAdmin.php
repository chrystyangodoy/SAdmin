<?php


include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';

session_start();

$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();

$lista = $evento->SelectEventoEmdia();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista", $lista);

$smarty->display('./View/AreaAdmin.html');
//----------------------------------------------------------