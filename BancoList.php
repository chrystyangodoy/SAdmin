<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aBsc_Banco.php';
$banco = new aBsc_Banco();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $banco->setID($_GET['del']);
    $banco->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$banco->select());
$smarty->assign("Titulo", " - Listar Bancos.");
$smarty->display('./View/BancoList.html');