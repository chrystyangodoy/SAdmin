<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $user->setID_Usuario($_GET['del']);
    $user->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("lista", $user->selectInnerGrupo());
$smarty->display('./View/UsuarioList.html');