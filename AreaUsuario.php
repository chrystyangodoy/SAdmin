<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';

$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Evento_Participante.php';
$evtPart = new aEvt_Evento_Participante();
$idUser = $_SESSION['ID_Usuario'];

$lista = $evtPart->SelectEvtPartc($idUser);

//$_SESSION['Evento'] = $lista;

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
//$smarty->assign("dscUser", $idUser);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista", $lista);

$smarty->display('./View/AreaUsuario.html');
//$smarty->display('./View_Participante/AreaParticipante.html');

//----------------------------------------------------------
