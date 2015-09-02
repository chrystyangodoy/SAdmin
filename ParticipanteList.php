<?php
require_once 'smarty.php';
require_once './actions/aBsc_Participante.php';
$partic = new aBsc_Participante();


if (isset($_GET['del'])) {
    $partic->setID_Grupo($_GET['del']);
    $partic->delete();
}

$smarty->assign("lista",$partic->select());

$smarty->display('./View/ParticipanteList.html');