<?php

require_once './smarty.php';
require './actions/aEvt_Evento_Categoria.php';
require_once './actions/aEvt_Evento.php';
$eventoCateg = new aEvt_Evento_Categoria();
$evento = new aEvt_Evento();

session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

$eventoCateg->setID_Evento_Categoria($_GET['ID_Evento_Categoria']);
$eventoCateg->load();

if (isset($_POST['Salvar']))
{

    $eventoCateg->setID_Evento_Categoria($_GET['ID_Evento_Categoria']);
    $eventoCateg->setDSC_Nome($_POST['DSC_Nome']);
    $eventoCateg->setVLR_Inscricao($_POST['VLR_Inscricao']);
    $eventoCateg->setDT_Inicio_Valor($_POST['DT_Inicio_Valor']);
    $eventoCateg->setDT_Fim_Valor($_POST['DT_Fim_Valor']);
    $eventoCateg->setID_EVT_Evento($_POST['ID_EVT_Evento']);

    $eventoCateg->update();

    $FeedbackMessage->setMsg("Evento atualizado com sucesso!");
    header("Location: EventoCategoriaList.php");
}


$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Evento_Categoria", $eventoCateg->getID_Evento_Categoria());
$smarty->assign("DSC_Nome", $eventoCateg->getDSC_Nome());
$smarty->assign("VLR_Inscricao", $eventoCateg->getVLR_Inscricao());
$smarty->assign("DT_Inicio_Valor", $eventoCateg->getDT_Inicio_Valor());
$smarty->assign("DT_Fim_Valor", $eventoCateg->getDT_Fim_Valor());

$smarty->assign("ID_EVT_Evento", $eventoCateg->getID_EVT_Evento());
$smarty->assign("listEvento", $evento->select());

$smarty->display('./View/EventoCategoriaEdit.html');
