<?php

require_once 'smarty.php';

require ('./actions/aBsc_Empresa.php');
$empresa = new aBsc_Empresa();
$empresa->setID_Empresa($_GET['edit']);
$empresa->load();

$regEmpresa = array('COD_CNPJ' => $empresa->getCOD_CNPJ(),
 'DSC_RazaoSocial' => $empresa->getDSC_RazaoSocial(),
 'DSC_Endereco'=>$empresa->getDSC_Endereco(),
 'DSC_Bairro'=>$empresa->getDSC_Bairro(),
 'DSC_Cidade'=>$empresa->getDSC_Cidade(),
 'NUM_CEP'=>$empresa->getNUM_CEP(),
 'NUM_InscricaoEstadual'=>$empresa->getNUM_InscricaoEstadual(),
 'NUM_Fone'=>$empresa->getNUM_Fone(),
 'NUM_FAX'=>$empresa->getNUM_FAX(),
 'DSC_EMAIL'=>$empresa->getDSC_EMAIL(),
 'COD_TipoEstado'=>$empresa->COD_TipoEstado());

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


$smarty->assign('regEmp',$regEmpresa);

$smarty->display('./View/EmpresaEdit.html');
