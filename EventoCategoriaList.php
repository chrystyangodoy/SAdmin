<?php

require_once './smarty.php';
require ('./actions/aEvt_Evento_Categoria.php');
$eventoCateg = new aEvt_Evento_Categoria();
session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $eventoCateg->setID_Evento_Categoria($_GET['del']);
    $eventoCateg->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("lista", $eventoCateg->selectInner());
$smarty->display('./View/EventoCategoriaList.html');
