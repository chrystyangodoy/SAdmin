<?php
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';

session_start();

$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();


if (isset($_GET['del'])) {
    $evento->setID_EVT($_GET['del']);
    $evento->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$evento->select());

$smarty->display('./View/EventoList.html');