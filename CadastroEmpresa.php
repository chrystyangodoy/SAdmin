<?php

require_once 'smarty.php';

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
    echo "Empresa inseridas com sucesso!";
} else {
    echo "Não foi possível inserir Empresa!";
}

$smarty->display('./View/EmpresaInsert.html');
