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


$ID_Local = $_GET['ID_Local'];

$localevento->setID_Local($ID_Local);
$localevento->load();

if (isset($_POST['Cadastrar']))
{
    $localevento->setID_Local($ID_Local);
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
    $localevento->update();

    $FeedbackMessage->setMsg("Local Evento atualizado com sucesso!");
    
    header("Location: LocalEventoList.php");
    die();
}


$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Local", $localevento->getID_Local());
$smarty->assign("DSC_Nome", $localevento->getDSC_Nome());
$smarty->assign("DSC_Endereco", $localevento->getDSC_Endereco());
$smarty->assign("DSC_Bairro", $localevento->getDSC_Bairro());
$smarty->assign("DSC_Cidade", $localevento->getDSC_Cidade());
$smarty->assign("NUM_CEO", $localevento->getNUM_CEO());
$smarty->assign("NUM_Fone", $localevento->getNUM_Fone());
$smarty->assign("NUM_FAX", $localevento->getNUM_FAX());
$smarty->assign("DSC_EMAIL", $localevento->getDSC_EMAIL());
$smarty->assign("DSC_Nome_Contato", $localevento->getDSC_Nome_Contato());
$smarty->assign("COD_TIPOEstado", $localevento->getCOD_TIPOEstado());


$smarty->assign("Titulo", " - Editar Local do Evento.");
$smarty->assign("listTpUF", $tipoestado->select());
$smarty->display('./View/LocalEventoEdit.html');
