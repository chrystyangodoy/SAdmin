<?php

require_once './smarty.php';
$msg = "";
$type = "";
require ('./actions/aBsc_Local_Evento.php');
$localEvento = new aBsc_Local_Evento();
if (isset($_GET['del'])) {
    $localEvento->setID_Local($_GET['del']);
    $localEvento->delete();
}

$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->display('./View/LocalEventoList.html');
