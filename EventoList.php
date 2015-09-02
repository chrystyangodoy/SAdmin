<?php
require_once 'smarty.php';
require_once './actions/aEvt_Evento.php';
$evento = new aEvt_Evento();


if (isset($_GET['del'])) {
    $evento->setID_EVT($_GET['del']);
    $evento->delete();
}

$smarty->assign("lista",$evento->select());

$smarty->display('./View/EventoList.html');