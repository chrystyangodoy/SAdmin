<?php
require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

//$smarty -> assign("lista",$user->select()); 
$smarty -> assign("lista",$user->selectInnerGrupo());
//$smarty->display('./Login/login.html');

$smarty->display('./View/usuario.html');