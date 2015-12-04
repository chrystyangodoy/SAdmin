<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aBsc_Participante.php';
$partic = new aBsc_Participante();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $partic->setID_Participante($_GET['del']);
    $partic->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$partic->select());
$smarty->assign("Titulo", " - Lista de Participantes.");
$smarty->display('./View/ParticipanteList.html');