<?php
require_once 'smarty.php';

require_once './actions/aUsuario.php';
require_once './actions/aGrupoUsuario.php';
$user = new aUsuario();
$grupo = new aGrupoUsuario();

if(isset($_GET['del'])){
    $user->setID_Usuario($_GET['del']);
    $user->delete();
}
$smarty -> assign("listGrupo",$grupo->select());

$smarty->display('./View/UsuarioInsert.html');