<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aConfig_Email.php';
$ConfigEmail = new aConfig_Email();
require_once './config/configs.php';
$config = new configs();

if (isset($_POST['Cadastrar'])) {
    $idUnico = $config->idUnico();
    $ConfigEmail->setID_Email($idUnico);
    $ConfigEmail->setsmtp($_POST['smtp']);
    $ConfigEmail->setremetente($_POST['remetente']);
    $ConfigEmail->setassunto($_POST['assunto']);
    $ConfigEmail->setmensagem($_POST['mensagem']);
    $ConfigEmail->setuserName($_POST['userName']);
    $ConfigEmail->setPassword($_POST['Password']);
    $ConfigEmail->insert();
    $FeedbackMessage->setMsg("Configuração de Email inserida com sucesso!");
    header('location:EmailList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Configuração de Email.");
$smarty->display('./View/EmailInsert.html');
