<?php

require_once 'smarty.php';

require ('./actions/aBsc_Empresa.php');
$empresa = new aBsc_Empresa();

if (isset($_POST['Cadastrar'])) {
    $Empresa->setCOD_CNPJ($_POST['COD_CNPJ']);
    $Empresa->setDSC_RazaoSocial($_POST['DSC_RazaoSocial']);
    $Empresa->setDSC_Endereco($_POST['DSC_Endereco']);
    $Empresa->setDSC_Bairro($_POST['DSC_Bairro']);
    $Empresa->setDSC_Cidade($_POST['DSC_Cidade']);
    $Empresa->setNUM_CEP($_POST['NUM_CEP']);
    $Empresa->setNUM_InscricaoEstadual($_POST['NUM_InscricaoEstadual']);
    $Empresa->setNUM_Fone($_POST['NUM_Fone']);
    $Empresa->setNUM_FAX($_POST['NUM_FAX']);
    $Empresa->setDSC_EMAIL($_POST['DSC_EMAIL']);
    $Empresa->setCOD_TipoEstado($_POST['COD_TipoEstado']);
    $empresa->insert();
    echo "Empresa inseridas com sucesso!";
} else {
    echo "Não foi possível inserir Empresa!";
}

$smarty->display('./View/EmpresaInsert.html');
