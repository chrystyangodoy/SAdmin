<?php

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aEvt_Evento.php';
require_once './actions/aBsc_Local_Evento.php';
require_once './actions/atb_Tipo_Estado.php';
require_once './config/FeedbackMessage.php';

session_start();

$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();
$localevento = new aBsc_Local_Evento();
$tipoestado = new atb_Tipo_Estado();
$config = new configs();

if (isset($_POST['Cadastrar'])) {
    $idUnico = $config->idUnico();
    
    $evento->setID_EVT($idUnico);
    $evento->setDSC_Nome($_POST['DSC_Nome']);
    $evento->setDSC_Presidente($_POST['DSC_Presidente']);
    $evento->setDT_Inicio($_POST['DT_Inicio']);
    $evento->setDT_Fim($_POST['DT_Fim']);
    $evento->setCOD_CNPJ_Promotora($_POST['COD_CNPJ_Promotora']);
    $evento->setDSC_Nome_Promotora($_POST['DSC_Nome_Promotora']);
    $evento->setDSC_Presidente_Promotora($_POST['DSC_Presidente_Promotora']);
    $evento->setDSC_Endereco_Promotora($_POST['DSC_Endereco_Promotora']);
    $evento->setNUM_CEP_Promotora($_POST['NUM_CEP_Promotora']);
    $evento->setDSC_Cidade_Promotora($_POST['DSC_Cidade_Promotora']);
    $evento->setNUM_Fone_Promotora($_POST['NUM_Fone_Promotora']);
    $evento->setNUM_FAX_Promotora($_POST['NUM_FAX_Promotora']);
    $evento->setDSC_EMAIL_Promotora($_POST['DSC_EMAIL_Promotora']);
    $evento->setQTD_CargaHorariaMinima($_POST['QTD_CargaHorariaMinima']);
    $evento->setID_BSC_Local_Evento($_POST['ID_BSC_Local_Evento']);
    $evento->setCOD_Tipo_Estado_promotora($_POST['COD_Tipo_Estado_promotora']);
    $evento->insert();
    
    $FeedbackMessage->setMsg("Evento inserido com sucesso!");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty -> assign("listLocal",$localevento->select());
$smarty -> assign("listTpUF",$tipoestado->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/EventoInsert.html');
