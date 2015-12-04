<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

require ('./actions/aUsuario.php');
require ('./actions/aGrupoUsuario.php');

$grupo = new aGrupoUsuario();
$user= new aUsuario();

$codUsuario = $_GET['alt'];

$user->setID_Usuario($codUsuario);
$user->load();

if(isset($_POST['Salvar'])){
    $user->setID_Usuario($codUsuario);
    $user->setDSC_Login($_POST['DSC_Login']);
    $user->setDSC_Senha($_POST['DSC_Senha']);
    $user->setDTM_Inicio($_POST['DTM_Inicio']);
    $user->setDTM_Fim($_POST['DTM_Fim']);
    $user->setID_SEG_Grupo($_POST['ID_SEG_Grupo']);
    $user->update();
    $FeedbackMessage->setMsg("Usuário atualizado com sucesso!");
    header("Location: UsuarioList.php");
}
$smarty->assign("Titulo", " - Edição do Usuários.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Usuario",$user->getID_Usuario());
$smarty->assign("DSC_Login",$user->getDSC_Login());
$smarty->assign("DSC_Senha",$user->getDSC_Senha());
$smarty->assign("DTM_Inicio",$user->getDTM_Inicio(true));
$smarty->assign("DTM_Fim",$user->getDTM_Fim(true));
$smarty -> assign("listGrupo",$grupo->select());
$smarty->assign("ID_SEG_Grupo",$user->getID_SEG_Grupo());

$smarty->display('./View/UsuarioEdit.html');