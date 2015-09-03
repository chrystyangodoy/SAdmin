<?php

require_once 'smarty.php';

require ('./actions/aBsc_Empresa.php');
$emp = new aBsc_Empresa();
$emp->setID_Empresa($_GET['alt']);
$emp->load();

$regEmpresa = array('COD_CNPJ' => $emp->getCOD_CNPJ(), 'DSC_RazaoSocial' => $emp->getDSC_RazaoSocial(), 'DSC_Endereco' => $emp->getDSC_Endereco(), 'DSC_Bairro' => $emp->getDSC_Bairro(), 'DSC_Cidade' => $emp->getDSC_Cidade(), 'NUM_CEP' => $emp->getNUM_CEP(), 'NUM_InscricaoEstadual' => $emp->getNUM_InscricaoEstadual(), 'NUM_Fone' => $emp->getNUM_Fone(), 'NUM_FAX' => $emp->getNUM_FAX(), 'DSC_EMAIL' => $emp->getDSC_EMAIL(), 'COD_TipoEstado' => $emp->getCOD_TipoEstado());

$smarty->assign('regEmp', $regEmpresa);

if (isset($_POST['Salvar'])) {
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
    $empresa->update();
    echo "Empresa inseridas com sucesso!";
}

$smarty->display('./View/EmpresaEdit.html');