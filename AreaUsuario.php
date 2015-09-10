<?php
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
session_start();
$FeedbackMessage = new FeedbackMessage();


$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/AreaUsuario.html');