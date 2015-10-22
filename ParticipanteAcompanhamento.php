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
    
    require_once ('./config/configs.php');
    $config = new configs();   
    
    
    $pagamento->setCOD_TipoFormaPagamento(0);
    $pagamento->setCOD_TipoOrigemInscricao(0);
    $pagamento->setCOD_Tipo_Situacao_Pagamento(0);//set igual a zero para Situação Aberto.
    $pagamento->setDT_Pagamento('01-01-1980');
    $data_atual = date("Y/m/d", strtotime("now"));
    $pagamento->setDT_Transacao($data_atual);
    $id_Pagamento = $config->idUnico();
    //Set feito no metodo selectInner $pagamento->setID_EVT_Evento($ID_EVT_Evento);
    $pagamento->setID_EVT_Pagamento_Pai(0);
    $pagamento->setID_Pagamento($id_Pagamento);
    $pagamento->setNUM_Parcelas(0);
    $pagamento->setNUM_Recibo(0);
    $pagamento->setQTD_Parcelas(1);//Apenas pagamento a vista, parcelamento não implementado
    $pagamento->setQTD_Parcelas_Pagas(0);
    //Set feito no metodo selectInner $pagamento->setVLR_Transacao($VLR_Transacao);
    $pagamento->setVR_Pago(0);
    $pagamento->insert();
    
}


$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();


$smarty->assign("msg", $msg);
$smarty->assign("type", $type);


$smarty->display('./portal/acompanhamento.html');
