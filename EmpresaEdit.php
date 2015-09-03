<?php

require_once 'smarty.php';

require ('./actions/aBsc_Empresa.php');
$emp = new aBsc_Empresa();
$emp->setID_Empresa($_GET['alt']);
$emp->load();

$regEmpresa = array('COD_CNPJ' => $emp->getCOD_CNPJ(), 'DSC_RazaoSocial' => $emp->getDSC_RazaoSocial(), 'DSC_Endereco' => $emp->getDSC_Endereco(), 'DSC_Bairro' => $emp->getDSC_Bairro(), 'DSC_Cidade' => $emp->getDSC_Cidade(), 'NUM_CEP' => $emp->getNUM_CEP(), 'NUM_InscricaoEstadual' => $emp->getNUM_InscricaoEstadual(), 'NUM_Fone' => $emp->getNUM_Fone(), 'NUM_FAX' => $emp->getNUM_FAX(), 'DSC_EMAIL' => $emp->getDSC_EMAIL(), 'COD_TipoEstado' => $emp->getCOD_TipoEstado());

$smarty->assign('regEmp', $regEmpresa);

if (isset($_POST['Salvar'])) {
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
    echo "Empresa inseridas com sucesso!";
}

$smarty->display('./View/EmpresaEdit.html');