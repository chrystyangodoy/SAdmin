<?php
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/atb_Tipo_Estado.php';

session_start();

$FeedbackMessage = new FeedbackMessage();

$tpEstado = new atb_Tipo_Estado();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$tpEstado->select());

$smarty->display('./View/TipoEstadoList.html');