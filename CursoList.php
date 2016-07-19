<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aEvt_Curso.php';
$curso = new aEvt_Curso();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $curso->setID_Curso($_GET['del']);
    $curso->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$curso->select());
$smarty->assign("Titulo", " - Lista de Cursos.");
$smarty->display('./View/CursoList.html');