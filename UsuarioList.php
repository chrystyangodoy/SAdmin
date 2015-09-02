<?php

//if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
//    unset($_SESSION['login']); 
//    unset($_SESSION['senha']); 
//    header('location:index.php'); } $logado = $_SESSION['login'];

require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

if (isset($_GET['del'])) {
    $user->setID_Usuario($_GET['del']);
    $user->delete();

}

$smarty->assign("lista", $user->selectInnerGrupo());

$smarty->display('./View/UsuarioList.html');