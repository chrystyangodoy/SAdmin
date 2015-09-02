<?php
require_once 'smarty.php';

require ('./actions/aUsuario.php');
require ('./actions/aGrupoUsuario.php');
$grupo = new aGrupoUsuario();

$user = new aUsuario();


if(isset($_GET['del'])){
    $user->setID_Usuario($_GET['del']);
    $user->delete();
}
//$smarty -> assign("listGrupo",$grupo->select());

$smarty->display('./View/UsuarioInsert.html');