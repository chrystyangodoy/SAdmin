<?php

if (!(isset($_GET['cpf']) and  (isset($_GET['ID_Evento'])))) {
    header("Location: Index.php");
    die();
}
session_start();
include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './config/FeedbackMessage.php';

require_once './actions/aEvt_Pagamento.php';

require_once './actions/aEvt_Evento.php';
require_once './actions/aEvt_Evento_Categoria.php';

$ID_Evento = $_GET['ID_Evento'];

if (isset($_REQUEST['ID_Evento_Categoria']) and isset($_REQUEST['CPF_Participante'])) {

    $ID_Categoria = $_REQUEST['ID_Evento_Categoria'];


    $_SESSION['CPF_Participante'] = $_REQUEST['CPF_Participante'];
    $_SESSION['ID_Evento'] = $_REQUEST['ID_EVT_Evento'];

    $pagamento = new aEvt_Pagamento();
    $pagamento->selectInner($_SESSION['ID_Evento'], $_SESSION['CPF_Participante']);

    $pagamento->geraInfoPagamento();
}


$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();

$smarty->assign("Titulo", " - Acompanhamento Inscrições.");
$smarty->assign("msg", $msg);
$smarty->assign("type", $type);


$smarty->display('./View/ParticipanteAcompanhamento.html');
