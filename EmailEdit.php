<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aConfig_Email.php';
require_once './config/FeedbackMessage.php';

$FeedbackMessage = new FeedbackMessage();

$ConfigEmail = new aConfig_Email();

$ID_Email = $_GET['alt'];
$ConfigEmail->setID_Email($ID_Email);
$ConfigEmail->load();

if (isset($_POST['Salvar']))
{
    $ConfigEmail->setsmtp($_POST['smtp']);
    $ConfigEmail->setport($_POST['Port']);
    $ConfigEmail->setremetente($_POST['remetente']);
    $ConfigEmail->setassunto($_POST['assunto']);
    $ConfigEmail->setmensagem($_POST['mensagem']);
    $ConfigEmail->setuserName($_POST['userName']);
    $ConfigEmail->setPassword($_POST['Password']);

    $ConfigEmail->update();

    $FeedbackMessage->setMsg("Configuração de Email atualizada com sucesso!");
    header("Location: EmailList.php");
    die();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Email", $ConfigEmail->getID_Email());
$smarty->assign("smtp", $ConfigEmail->getsmtp());
$smarty->assign("Port", $ConfigEmail->getport());
$smarty->assign("remetente",$ConfigEmail->getremetente());
$smarty->assign("assunto", $ConfigEmail->getassunto());
$smarty->assign("mensagem", $ConfigEmail->getmensagem());
$smarty->assign("userName", $ConfigEmail->getuserName());
$smarty->assign("Password", $ConfigEmail->getPassword());

$smarty->assign("Titulo", " - Editar Configuração de Email.");
$smarty->display('./View/EmailEdit.html');
