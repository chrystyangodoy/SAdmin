<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aEvt_Evento.php';
require_once './actions/aBsc_Local_Evento.php';
require_once './actions/atb_Tipo_Estado.php';
require_once './actions/aBsc_Banco.php';
require_once './actions/aBsc_Empresa.php';
require_once './config/FeedbackMessage.php';


$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();
$localevento = new aBsc_Local_Evento();
$tipoestado = new atb_Tipo_Estado();
$banco = new aBsc_Banco();
$empresa = new aBsc_Empresa();
$config = new configs();

$ID_EVT = $_GET['ID_EVT'];

$evento->setID_EVT($ID_EVT);

$evento->load();

if (isset($_POST['Cadastrar']) && isset($_GET['ID_EVT'])) {
    $evento->setID_EVT($_GET['ID_EVT']);
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
    $evento->setisPromotora($_POST['isPromotora']);
    $evento->setID_Banco($_POST['ID_Banco']);
    $evento->setID_Empresa($_POST['ID_Empresa']);
    $evento->update();
    
    $FeedbackMessage->setMsg("Evento atualizado com sucesso!");
    header("Location: EventoList.php");
    die();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty -> assign("listLocal",$localevento->select());
$smarty -> assign("listTpUF",$tipoestado->select());
$smarty->assign("listBanco", $banco->select());
$smarty->assign("listEmpresa", $empresa->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

//$ID_EVT = $evento->getID_EVT();
//$DSC_Nome = $evento->getDSC_Nome();

$smarty->assign("ID_EVT", $evento->getID_EVT());
$smarty->assign("DSC_Nome", $evento->getDSC_Nome());
$smarty->assign("DSC_Presidente", $evento->getDSC_Presidente());
$smarty->assign("DT_Inicio",$evento->dateToBR($evento->getDT_Inicio()));
$smarty->assign("DT_Fim", $evento->dateToBR($evento->getDT_Fim()));
$smarty->assign("COD_CNPJ_Promotora", $evento->getCOD_CNPJ_Promotora());
$smarty->assign("DSC_Nome_Promotora", $evento->getDSC_Nome_Promotora());
$smarty->assign("DSC_Presidente_Promotora", $evento->getDSC_Presidente_Promotora());
$smarty->assign("DSC_Endereco_Promotora", $evento->getDSC_Endereco_Promotora());
$smarty->assign("NUM_CEP_Promotora", $evento->getNUM_CEP_Promotora());
$smarty->assign("DSC_Cidade_Promotora", $evento->getDSC_Cidade_Promotora());
$smarty->assign("NUM_Fone_Promotora", $evento->getNUM_Fone_Promotora());
$smarty->assign("NUM_FAX_Promotora", $evento->getNUM_FAX_Promotora());
$smarty->assign("DSC_EMAIL_Promotora", $evento->getDSC_EMAIL_Promotora());
$smarty->assign("QTD_CargaHorariaMinima", $evento->getQTD_CargaHorariaMinima());
$smarty->assign("ID_BSC_Local_Evento", $evento->getID_BSC_Local_Evento());
$smarty->assign("COD_Tipo_Estado_promotora", $evento->getCOD_Tipo_Estado_promotora());
$smarty->assign("isPromotora", $evento->getisPromotora());
$smarty->assign("ID_Banco", $evento->getID_Banco());
$smarty->assign("ID_Empresa", $evento->getID_Empresa());

$smarty->display('./View/EventoEdit.html');
