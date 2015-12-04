<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

require ('./actions/aBsc_Empresa.php');
$emp = new aBsc_Empresa();
require_once './actions/atb_Tipo_Estado.php';
$tipoestado = new atb_Tipo_Estado();

$emp->setID_Empresa($_GET['alt']);
$emp->load();

if (isset($_POST['Salvar'])) {
    $emp->setID_Empresa($_GET['alt']);
    $emp->setCOD_CNPJ($_POST['COD_CNPJ']);
    $emp->setDSC_RazaoSocial($_POST['DSC_RazaoSocial']);
    $emp->setDSC_Endereco($_POST['DSC_Endereco']);
    $emp->setDSC_Bairro($_POST['DSC_Bairro']);
    $emp->setDSC_Cidade($_POST['DSC_Cidade']);
    $emp->setNUM_CEP($_POST['NUM_CEP']);
    $emp->setNUM_InscricaoEstadual($_POST['NUM_InscricaoEstadual']);
    $emp->setNUM_Fone($_POST['NUM_Fone']);
    $emp->setNUM_FAX($_POST['NUM_FAX']);
    $emp->setDSC_EMAIL($_POST['DSC_EMAIL']);
    $emp->setCOD_TipoEstado($_POST['COD_TipoEstado']);
    $emp->update();
    $FeedbackMessage->setMsg("Empresa atualizada com sucesso!");
    header("Location: EmpresaList.php");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty -> assign("listTpUF",$tipoestado->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Empresa",$emp->getID_Empresa());
$smarty->assign("COD_CNPJ",$emp->getCOD_CNPJ());
$smarty->assign("DSC_RazaoSocial",$emp->getDSC_RazaoSocial());
$smarty->assign("DSC_Endereco",$emp->getDSC_Endereco());
$smarty->assign("DSC_Bairro",$emp->getDSC_Bairro());
$smarty->assign("DSC_Cidade",$emp->getDSC_Cidade());
$smarty->assign("NUM_CEP",$emp->getNUM_CEP());
$smarty->assign("NUM_InscricaoEstadual",$emp->getNUM_InscricaoEstadual());
$smarty->assign("NUM_Fone",$emp->getNUM_Fone());
$smarty->assign("NUM_FAX",$emp->getNUM_FAX());
$smarty->assign("DSC_EMAIL",$emp->getDSC_EMAIL());
$smarty->assign("COD_TipoEstado",$emp->getCOD_TipoEstado());
$smarty->assign("Titulo", " - Editar Empresa.");
$smarty->display('./View/EmpresaEdit.html');