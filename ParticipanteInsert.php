<?php

require_once 'smarty.php';

require ('./actions/aBsc_Participante.php');
require_once './actions/aBsc_Empresa.php';
require_once './actions/aBsc_Profissao.php';
require_once './actions/aUsuario.php';
$partic = new aBsc_Participante();
$emp = new aBsc_Empresa();
$prof = new aBsc_Profissao();


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
if (isset($_GET['Cadastre-se'])) {   
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
    
    
    $usu = new aUsuario();
    
    $data = new DateTime();
    $datafim = new DateTime();
    $datafim -> modify("+7 day");
    
    $user->setDSC_Login($_POST['COD_CPF']);
    $user->setDSC_Senha($_POST['DSC_Senha']);
    $user->setDTM_Inicio($data);
    $user->setDTM_Fim($datafim);
    $user->setID_SEG_Grupo(99);
    $user->insert();
}

$smarty -> assign("listEmp",$emp->select());
$smarty -> assign("listProf",$prof->select());

$smarty->display('./View/ParticipanteInsert.html');
