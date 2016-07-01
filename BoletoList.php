<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Evento.php';

$FeedbackMessage = new FeedbackMessage();
$idUser = $_SESSION['ID_Usuario'];
$ID_EvtPart = $_GET['ID_EVT_Evento_Pariticipante'];
$ID_PagtoPai = $_GET['ID_EVT_Pagamento_Pai'];

require_once './actions/aEvt_Evento_Participante.php';
$evtPart = new aEvt_Evento_Participante();

$lista = $evtPart->SelectEvtPartcParcelas($idUser,$ID_EvtPart,$ID_PagtoPai);

$smarty->assign("dscUser", $_SESSION['DSC_Login']);

$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista", $lista);

$smarty->display('./View/BoletoList.html');

