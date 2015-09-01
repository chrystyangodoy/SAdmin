<?php

include 'smarty.php';

if (isset($_POST['Login'])) {
    require_once './actions/aUsuario.php';

    $usuario = new aUsuario();

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    echo 'Login' + $_POST['Username'];
    echo 'Login' + $Password;
    if ($usuario->login($Username, $Password)) {
        
        
        header('location:Usuario.php');
        
        echo 'Login Efetuado com sucesso!';
    } else {
        header('location:index.php');
        echo 'Usuário ou Senha incorretos!';
    }
} else {

    $smarty->display('./View/login.html');
}

$smarty->display('./View/login.html');
