<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require './actions/aUsuario.php';
require './actions/aGrupoUsuario.php';

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
    $FeedbackMessage->setMsg("Usuário inserido com sucesso!");
    header('location:UsuarioList.php');
}
$smarty->assign("Titulo", " - Inserir Usuários.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty -> assign("listGrupo",$grupo->select());

$smarty->display('./View/UsuarioInsert.html');
