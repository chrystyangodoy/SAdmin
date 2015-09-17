<?php
require_once 'smarty.php';
require_once './actions/aBsc_Profissao.php';
$prof = new aBsc_Profissao();

session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $prof->setID_Profissao($_GET['del']);
    $prof->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("lista",$prof->select());
$smarty->display('./View/ProfissaoList.html');