<?php
require_once 'smarty.php';
require_once './actions/aGrupoUsuario.php';
$grupo = new aGrupoUsuario();


if (isset($_GET['del'])) {
    $grupo->setID_Grupo($_GET['del']);
    $grupo->delete();
}

$smarty->assign("lista",$grupo->select());

$smarty->display('./View/GrupoList.html');