<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aConfig_Email.php';
$ConfigEmail = new aConfig_Email();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $ConfigEmail->setID_Email($_GET['del']);
    $ConfigEmail->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$ConfigEmail->select());
$smarty->assign("Titulo", " - Lista de Configuração de Email.");
$smarty->display('./View/EmailList.html');