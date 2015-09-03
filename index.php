<?php
include 'smarty.php';
session_start();
require_once './actions/aUsuario.php';
$usuario = new aUsuario();

$msg = "";

if (isset($_POST['Login'])) {
    
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
    
    if ($usuario->login($Username, $Password)) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
        
        $smarty->display('./View/Administracao.html');
    } else {
        unset($_SESSION['Username']);
        unset($_SESSION['Password']);
        $msg = "Usuário ou Senha incorretos!";
        $smarty->assign("msglogado", $msg);
        header('location:index.php');
        session_destroy();
    }
} else {
        $smarty->display('./View/login.html');
}