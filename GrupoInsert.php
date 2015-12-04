<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require ('./actions/aGrupoUsuario.php');

$grupo = new aGrupoUsuario();

if (isset($_POST['Cadastrar'])) {
    $grupo->setDSC_Nome($_POST['DSC_Nome']);
    $grupo->setDSC_Descricao($_POST['DSC_Descricao']);

    $grupo->insert();
    $FeedbackMessage->setMsg("Grupo inserido com sucesso!");
    header('location:GrupoList.php');
    
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("Titulo", " - Inserir Grupo.");
$smarty->display('./View/GrupoInsert.html');
