<?php
require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

if(isset($_GET['del'])){
    $user->setID_Usuario($_GET['del']);
    $user->delete();
}

$smarty -> assign("lista",$user->selectInnerGrupo());

$smarty->display('./View/UsuarioList.html');