<?php
require_once 'smarty.php';
require_once ('./config/configs.php');
session_start();
require ('./actions/aUsuario.php');
require ('./actions/aGrupoUsuario.php');

$config = new configs();

$grupo = new aGrupoUsuario();
$user= new aUsuario();


if(isset($_POST['Cadastrar'])){
    $idUnico = $config->idUnico();
    $user->setID_Usuario($idUnico);
    
    $user->setDSC_Login($_POST['DSC_Login']);
    $user->setDSC_Senha($_POST['DSC_Senha']);
    $user->setDTM_Inicio($_POST['DTM_Inicio']);
    $user->setDTM_Fim($_POST['DTM_Fim']);
    $user->setID_SEG_Grupo($_POST['ID_SEG_Grupo']);
    $user->insert();
    echo "Usuário inserido com sucesso!";
}else {
    echo "Não foi possível inserir usuário!";
}
$smarty -> assign("listGrupo",$grupo->select());

$smarty->display('./View/UsuarioInsert.html');
