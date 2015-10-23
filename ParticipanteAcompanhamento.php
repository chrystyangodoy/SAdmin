<?php
session_start();
include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './config/FeedbackMessage.php';

require_once './actions/aEvt_Pagamento.php';

if (isset($_REQUEST['ID_Evento_Categoria']) and isset($_REQUEST['CPF_Participante'])) {
    $_SESSION['CPF_Participante'] = $_REQUEST['CPF_Participante'];
    $_SESSION['ID_Evento'] = $_REQUEST['ID_EVT_Evento'];

    $pagamento = new aEvt_Pagamento();
    $pagamento->selectInner($_SESSION['ID_Evento'], $_SESSION['CPF_Participante']);
    
    $pagamento->geraInfoPagamento();
}


$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();


$smarty->assign("msg", $msg);
$smarty->assign("type", $type);


$smarty->display('./portal/acompanhamento.html');
