<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aBsc_Banco.php';
require_once './config/FeedbackMessage.php';


$FeedbackMessage = new FeedbackMessage();

$banco = new aBsc_Banco();
$config = new configs();

$ID_Banco = $_GET['alt'];
$banco->setID($ID_Banco);
$banco->load();

if (isset($_POST['Cadastrar']) && isset($_GET['ID']))
{
    $banco->setID($_POST['ID_Banco']);
    $banco->setAgencia($_POST['Agencia']);
    $banco->setConta($_POST['Conta']);
    $banco->setCod_Banco($_POST['Cod_Banco']);
    $banco->setConvenio($_POST['Convenio']);
    $banco->setContrato($_POST['Contrato']);
    $banco->setCarteira($_POST['Carteira']);
    $banco->setVariacao_Carteira($_POST['Variacao_Carteira']);
    $banco->setnumero_documento($_POST['numero_documento']);
    $banco->setCOD_CNPJ_Promotora($_POST['COD_CNPJ_Promotora']);

    $banco->update();

    $FeedbackMessage->setMsg("Evento atualizado com sucesso!");
    header("Location: BancoList.php");
    die();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID", $banco->getID());
$smarty->assign("Agencia", $banco->getAgencia());
$smarty->assign("Conta", $banco->getConta());
$smarty->assign("Cod_Banco", $banco->getCod_Banco());
$smarty->assign("Convenio", $banco->getConvenio());
$smarty->assign("Contrato", $banco->getContrato());
$smarty->assign("Carteira", $banco->getCarteira());
$smarty->assign("Variacao_Carteira", $banco->getVariacao_Carteira());
$smarty->assign("numero_documento", $banco->getnumero_documento());
$smarty->assign("COD_CNPJ_Promotora", $banco->getCOD_CNPJ_Promotora());

$smarty->display('./View/BancoEdit.html');
