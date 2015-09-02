<?php
include 'smarty.php';

require_once './actions/aUsuario.php';
$usuario = new aUsuario();

session_start();

if (isset($_POST['Login'])) {
    
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    

    if ($usuario->login($Username, $Password)) {
        $_SESSION['login'] = $Username;
        $_SESSION['senha'] = $Password;
        $smarty->display('./View/Administracao.html');
        
        $smarty->assign("msglogado","Login Efetuado com sucesso!");
    } else {
        unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
        
        $smarty->assign("msglogado","Usuário ou Senha incorretos!");
        
        header('location:index.php');
    }
} else {
    
    $smarty->display('./View/login.html');
}