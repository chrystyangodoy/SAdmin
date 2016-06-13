<?php
session_start();
require_once 'smarty.php';
include_once './config/ValidaSessao.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aEvt_Ativ_Complementar.php';

$atvComp = new aEvt_Ativ_Complementar();
$FeedbackMessage = new FeedbackMessage();

$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("listAtv",$atvComp->select());
$smarty->assign("Titulo", " - Lista de Atividade Complementar.");

$smarty->display('./View/AtvComp_List.html');