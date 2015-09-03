<?php

require_once 'smarty.php';

require ('./actions/aBsc_Participante.php');
require_once './actions/aBsc_Empresa.php';
$partic = new aBsc_Participante();
$emp = new aBsc_Empresa();

if (isset($_POST['Cadastrar'])) {
    $partic->setDSC_Login($_POST['ID_Participante']);
    $partic->setDSC_Login($_POST['COD_CPF']);
    $partic->setDSC_Login($_POST['COD_RG']);
    $partic->setDSC_Login($_POST['DSC_Nome']);
    $partic->setDSC_Login($_POST['DSC_Endereco']);
    $partic->setDSC_Login($_POST['DSC_Bairro']);
    $partic->setDSC_Login($_POST['DSC_Cidade']);
    $partic->setDSC_Login($_POST['NUM_CEP']);
    $partic->setDSC_Login($_POST['NUM_Fone']);
    $partic->setDSC_Login($_POST['NUM_Celular']);
    $partic->setDSC_Login($_POST['NUM_FAX']);
    $partic->setDSC_Login($_POST['DSC_Profissao_Especialidade']);
    $partic->setDSC_Login($_POST['DSC_Email']);
    $partic->setDSC_Login($_POST['NUM_Registro']);
    $partic->setDSC_Login($_POST['COD_Tipo_Estado']);
    $partic->setDSC_Login($_POST['ID_BSC_Empresa']);
    $partic->setDSC_Login($_POST['ID_BSC_Profissao']);
    $partic->insert();
    echo "Participante inserido com sucesso!";
} else {
    echo "Não foi possível inserir participante!";
}
$smarty -> assign("listEmp",$emp->select());

$smarty->display('./View/ParticipanteInsert.html');
