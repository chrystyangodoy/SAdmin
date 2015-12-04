<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';


$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();


if (isset($_GET['del'])) {
    $evento->setID_EVT($_GET['del']);
    $evento->delete();
}

if(isset($_GET['eventoXML'])){
    $eventoID = $_GET['eventoXML'];
    $evento->geraXMLEvento($eventoID);
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$evento->select());
$smarty->assign("Titulo", " - Lista de Eventos.");
$smarty->display('./View/EventoList.html');