<?php

require_once './aUsuarios.php';

$usuario = new aUsuarios();

if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    echo 'Login' + $_POST['Username'];
    echo 'Login' + $Password;
    if ($usuario->login($Username, $Password)) {
        header('location:../admin.php');
        echo 'Login Efetuado com sucesso!';
        
    } else {
        header('location:../index.php');
        echo 'Usuário ou Senha incorretos!';
    }
    
}

