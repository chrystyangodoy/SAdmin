<?php
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Pagamento.php';
$Pagto = new aEvt_Pagamento();

if (isset($_REQUEST['ID_Pagamento']) && isset($_REQUEST['COD_Tipo_Situacao_Pagamento']))
{
    $Pagto->setID_Pagamento($_REQUEST['ID_Pagamento']);
    $Pagto->setCOD_Tipo_Situacao_Pagamento($_REQUEST['COD_Tipo_Situacao_Pagamento']);
    $Pagto->updateStatus();
    
    $IDEvento = $Pagto->getID_EVT_Evento();
    require_once './actions/aEvt_Evento_Participante.php';
    $EvtPartc = new aEvt_Evento_Participante();
    $EvtPartc->setID_EVT_Evento($IDEvento);
    $EvtPartc->load();
    
    require ('./actions/aBsc_Participante.php');
    $partic = new aBsc_Participante();
    
    require_once './config/eMail.php';
                $emailObj = new eMail();
                $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $msg);
                $msgFeedMessage = 'Confirmação de Pagamento enviada com sucesso.';
                $FeedbackMessage->setMsg($msgFeedMessage);
                die();
    
}
echo 1;
