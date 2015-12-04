<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aGrupoUsuario.php';
$grupo = new aGrupoUsuario();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $grupo->setID_Grupo($_GET['del']);
    $grupo->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$grupo->select());

$smarty->assign("Titulo", " - Lista de Grupos.");
$smarty->display('./View/GrupoList.html');