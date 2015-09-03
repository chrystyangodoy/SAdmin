<?php

require_once 'smarty.php';

require ('./actions/aBsc_Participante.php');
require_once './actions/aBsc_Empresa.php';
$partic = new aBsc_Participante();
$emp = new aBsc_Empresa();

if (isset($_POST['Cadastrar'])) {
    $partic->setCOD_CPF($_POST['COD_CPF']);
    $partic->setCOD_RG($_POST['COD_RG']);
    $partic->setDSC_Nome($_POST['DSC_Nome']);
    $partic->setDSC_Endereco($_POST['DSC_Endereco']);
    $partic->setDSC_Bairro($_POST['DSC_Bairro']);
    $partic->setDSC_Cidade($_POST['DSC_Cidade']);
    $partic->setNUM_CEP($_POST['NUM_CEP']);
    $partic->setNUM_Fone($_POST['NUM_Fone']);
    $partic->setNUM_Celular($_POST['NUM_Celular']);
    $partic->setNUM_FAX($_POST['NUM_FAX']);
    $partic->setDSC_Profissao_Especialidade($_POST['DSC_Profissao_Especialidade']);
    $partic->setDSC_Email($_POST['DSC_Email']);
    $partic->setNUM_Registro($_POST['NUM_Registro']);
    $partic->setCOD_Tipo_Estado($_POST['COD_Tipo_Estado']);
    $partic->setID_BSC_Empresa($_POST['ID_BSC_Empresa']);
    $partic->setID_BSC_Profissao($_POST['ID_BSC_Profissao']);
    $partic->insert();
    echo "Participante inserido com sucesso!";
} else {
    echo "Não foi possível inserir participante!";
}
$smarty -> assign("listEmp",$emp->select());

$smarty->display('./View/ParticipanteInsert.html');
