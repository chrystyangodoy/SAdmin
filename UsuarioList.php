<?php
require_once 'smarty.php';
require_once './actions/aUsuario.php';
$user = new aUsuario();

if(isset($_GET['exc'])){
    $user->setID_Usuario($_GET['exc']);
    if($user->delete()){
        print("Registro excluído com sucesso!");
    }else{
        print("Erro na excluído!");
    }
        
}

$smarty -> assign("lista",$user->selectInnerGrupo());

$smarty->display('./View/UsuarioList.html');