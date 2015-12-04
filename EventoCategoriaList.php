<?php

session_start();
include_once './config/ValidaSessao.php';
require_once './smarty.php';
require ('./actions/aEvt_Evento_Categoria.php');
$eventoCateg = new aEvt_Evento_Categoria();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $eventoCateg->setID_Evento_Categoria($_GET['del']);
    $eventoCateg->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$lista = $eventoCateg->selectInner();
$smarty->assign("Titulo", " - Lista de Categorias de Evento.");
$smarty->assign("lista", $lista);
$smarty->display('./View/EventoCategoriaList.html');
