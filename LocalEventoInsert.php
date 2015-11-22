<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aBsc_Local_Evento.php';
require_once './actions/atb_Tipo_Estado.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();




$localevento = new aBsc_Local_Evento();
$tipoestado = new atb_Tipo_Estado();
$config = new configs();

if (isset($_POST['Cadastrar']))
{
    $idUnico = $config->idUnico();

    $localevento->setID_Local($idUnico);
    $localevento->setDSC_Nome($_POST['DSC_Nome']);
    $localevento->setDSC_Endereco($_POST['DSC_Endereco']);
    $localevento->setDSC_Bairro($_POST['DSC_Bairro']);
    $localevento->setDSC_Cidade($_POST['DSC_Cidade']);
    $localevento->setNUM_CEO($_POST['NUM_CEO']);
    $localevento->setNUM_Fone($_POST['NUM_Fone']);
    $localevento->setNUM_FAX($_POST['NUM_FAX']);
    $localevento->setDSC_EMAIL($_POST['DSC_EMAIL']);
    $localevento->setDSC_Nome_Contato($_POST['DSC_Nome_Contato']);
    $localevento->setCOD_TIPOEstado($_POST['COD_TIPOEstado']);
    $localevento->insert();

    $FeedbackMessage->setMsg("Evento inserido com sucesso!");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("listTpUF", $tipoestado->select());
$smarty->display('./View/LocalEventoInsert.html');
