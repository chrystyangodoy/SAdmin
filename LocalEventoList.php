<?php

session_start();
include_once './config/ValidaSessao.php';

require_once './smarty.php';
require ('./actions/aBsc_Local_Evento.php');
$localEvento = new aBsc_Local_Evento();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del'])) {
    $localEvento->setID_Local($_GET['del']);
    $localEvento->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("lista", $localEvento->selectInner());
$smarty->display('./View/LocalEventoList.html');
