<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/atb_Tipo_Estado.php';
$tpEstado = new atb_Tipo_Estado();

$FeedbackMessage = new FeedbackMessage();

if(isset($_GET['del'])){
    $tpEstado->setCOD_TIPOEstado($_GET['del']);
    $tpEstado->delete();
    header('location:TipoEstadoList.php');
}

$smarty->assign("Titulo", " - Lista de Estados.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("lista",$tpEstado->select());
$smarty->display('./View/TipoEstadoList.html');