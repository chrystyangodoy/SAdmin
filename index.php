<?php

include 'smarty.php';

if (isset($_POST['Login'])) {
    require_once './actions/aUsuario.php';

    $usuario = new aUsuario();

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    
    if ($usuario->login($Username, $Password)) {
        
        $smarty->display('./View/Administracao.html');
        
        echo 'Login Efetuado com sucesso!';
    } else {
        echo 'Usuário ou Senha incorretos!';
      //  header('location:index.php');
    }
}else{

$smarty->display('./View/login.html');
}