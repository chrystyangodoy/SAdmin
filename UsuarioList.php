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
    
    if ($user->delete()) {
        echo "Registro excluído com sucesso!";
    } else {
        echo("Erro na excluído!");
    }
}

$smarty->assign("lista", $user->selectInnerGrupo());

$smarty->display('./View/UsuarioList.html');