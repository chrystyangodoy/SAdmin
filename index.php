<?php
include 'smarty.php';
session_start();
require_once './actions/aUsuario.php';
$usuario = new aUsuario();

$msg = "";

if (isset($_POST['Login'])) {
    
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    if ($usuario->login($Username, $Password)) {
        $_SESSION['login'] = $Username;
        $_SESSION['senha'] = $Password;
        $smarty->display('./View/Administracao.html');
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        $msg = "Usuário ou Senha incorretos!";
        $smarty->assign("msglogado", $msg);
        header('location:index.php');
        session_destroy();
    }
} else {
        $smarty->display('./View/login.html');
}