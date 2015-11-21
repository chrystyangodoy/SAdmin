<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();


require './actions/aGrupoUsuario.php';
$grupo = new aGrupoUsuario();

$codGrupo = $_GET['alt'];
$grupo->setID_Grupo($codGrupo);
$grupo->load();

if (isset($_POST['Salvar']))
{
    $grupo->setID_Grupo($codGrupo);
    $grupo->setDSC_Nome($_POST['DSC_Nome']);
    $grupo->setDSC_Descricao($_POST['DSC_Descricao']);
    $grupo->update();
    $FeedbackMessage->setMsg("Estado atualizado com sucesso!");
    header("Location: GrupoList.php");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Grupo", $grupo->getID_Grupo());
$smarty->assign("DSC_Nome", $grupo->getDSC_Nome());
$smarty->assign("DSC_Descricao", $grupo->getDSC_Descricao());

$smarty->display('./View/GrupoEdit.html');
