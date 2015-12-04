<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aBsc_Banco.php';
$banco = new aBsc_Banco();
require_once './config/configs.php';
$config = new configs();

if (isset($_POST['Cadastrar'])) {
    $idUnico = $config->idUnico();
    $banco->setID($idUnico);
    $banco->setAgencia($_POST['Agencia']);
    $banco->setConta($_POST['Conta']);
    $banco->setCod_Banco($_POST['Cod_Banco']);
    $banco->setConvenio($_POST['Convenio']);
    $banco->setContrato($_POST['Contrato']);
    $banco->setCarteira($_POST['Carteira']);
    $banco->setVariacao_Carteira($_POST['Variacao_Carteira']);
    $banco->setnumero_documento($_POST['numero_documento']);
    $banco->setCOD_CNPJ_Promotora($_POST['COD_CNPJ_Promotora']);
    $banco->insert();
    $FeedbackMessage->setMsg("Banco inserido com sucesso!");
    header('location:BancoList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Banco.");
$smarty->display('./View/BancoInsert.html');
