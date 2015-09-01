<?php
require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

$lista = $user->select();

$smarty -> assign("lista",$lista); 
//$smarty->display('./Login/login.html');

$smarty->display('./View/usuario.html');