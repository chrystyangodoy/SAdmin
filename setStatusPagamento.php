<?php

session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Pagamento.php';
$EvtPagamento = new aEvt_Pagamento();
require_once './config/configs.php';
$config = new configs();

$idUser = $_SESSION['ID_Usuario'];
$IDPagamento = $_GET['ID_Pagamento'];
$SitPagto = $_GET['Confirm'];

if ($IDPagamento != NULL) {
    $EvtPagamento->setID_Pagamento($IDPagamento);
    $EvtPagamento->load();
    $QTDParcelas = $EvtPagamento->getQTD_Parcelas();
    $EvtPagamento->setCOD_Tipo_Situacao_Pagamento($SitPagto);
    $EvtPagamento->update();

    $CheckPagto = $EvtPagamento->ChecaPagtoEvento($IDPagamento);
    $IDPagtoPai = $EvtPagamento->getID_EVT_Pagamento_Pai();
    //usleep(5000000);
    if ($CheckPagto == 0) {
        $EvtPagamento->setID_Pagamento($IDPagtoPai);
        $EvtPagamento->load();
        $EvtPagamento->setCOD_Tipo_Situacao_Pagamento("2");
        $EvtPagamento->update();
    } else IF ($CheckPagto > 0 && $CheckPagto < $QTDParcelas) {
        $EvtPagamento->setID_Pagamento($IDPagtoPai);
        $EvtPagamento->load();
        $EvtPagamento->setCOD_Tipo_Situacao_Pagamento("1");
        $EvtPagamento->update();
    }
    if ($CheckPagto == $QTDParcelas) {
        $EvtPagamento->setID_Pagamento($IDPagtoPai);
        $EvtPagamento->load();
        $EvtPagamento->setCOD_Tipo_Situacao_Pagamento("0");
        $EvtPagamento->update();
    }

    if ($SitPagto == 1) {
        $FeedbackMessage->setMsg("Baixa efetuada com sucesso!");    
    } else if ($SitPagto == 2) {
        $FeedbackMessage->setMsg("Baixa Cortesia efetuada com sucesso!");
    } else {
        $FeedbackMessage->setMsg("Cancelamento Baixa efetuado!");
    }

    header('Location: ' . $_SESSION['url']);
    //header('Location: '.$_SERVER['REQUEST_URI']);
    //header("Location: ParticipanteList.php");
}
