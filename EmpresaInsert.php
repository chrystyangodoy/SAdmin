<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require ('./actions/aBsc_Empresa.php');
$empresa = new aBsc_Empresa();

if (isset($_POST['Cadastrar'])) {
    $empresa->setCOD_CNPJ($_POST['COD_CNPJ']);
    $empresa->setDSC_RazaoSocial($_POST['DSC_RazaoSocial']);
    $empresa->setDSC_Endereco($_POST['DSC_Endereco']);
    $empresa->setDSC_Bairro($_POST['DSC_Bairro']);
    $empresa->setDSC_Cidade($_POST['DSC_Cidade']);
    $empresa->setNUM_CEP($_POST['NUM_CEP']);
    $empresa->setNUM_InscricaoEstadual($_POST['NUM_InscricaoEstadual']);
    $empresa->setNUM_Fone($_POST['NUM_Fone']);
    $empresa->setNUM_FAX($_POST['NUM_FAX']);
    $empresa->setDSC_EMAIL($_POST['DSC_EMAIL']);
    $empresa->setCOD_TipoEstado($_POST['COD_TipoEstado']);
    $empresa->insert();
    $FeedbackMessage->setMsg("Empresa inserida com sucesso!");
    header('location:EmpresaList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Empresa.");
$smarty->display('./View/EmpresaInsert.html');