<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aTb_submissao_doctos.php';
$Artigo = new aTb_submissao_doctos();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $Artigo->setCOD_Submissao($_GET['del']);
    $Artigo->delete();
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista",$Artigo->select());

$smarty->assign("Titulo", " - Lista de Artigos.");
$smarty->display('./View/ArtigosList.html');