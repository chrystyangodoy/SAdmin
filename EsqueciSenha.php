<?php

include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
session_start();
if (isset($_POST['Recuperar']))
{
    require_once './actions/aUsuario.php';
    $usuario = new aUsuario();
    require_once ('./config/configs.php');
    $config = new configs();

    //$cpf = $config->limpaCPF($_POST['COD_CPF']);
    $cpf = $_POST['COD_CPF'];
    $config->validaCPF($cpf);

    $usuario->setDSC_Login($cpf);
    if ($usuario->updateSenha())
    {
        $FeedbackMessage->setMsg("Verifique seu email!");
        header("Location: Index.php");
        die();
    }
    else
    {
        $FeedbackMessage->setMsg("Usuário não encontrado!");
    }
}

$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();

$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->display('./portal/EsqueciSenha.html');
