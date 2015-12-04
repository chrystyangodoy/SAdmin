<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once ('./config/configs.php');
require ('./actions/aEvt_Evento_Categoria.php');
require_once './actions/aEvt_Evento.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
$eventoCategoria = new aEvt_Evento_Categoria();
$evento = new aEvt_Evento();

$config = new configs();

if (isset($_POST['Cadastrar'])) {
    $idUnico = $config->idUnico();
    
    $eventoCategoria->setID_Evento_Categoria($idUnico);
    $eventoCategoria->setDSC_Nome($_POST['DSC_Nome']);
    $eventoCategoria->setVLR_Inscricao($_POST['VLR_Inscricao']);
    $eventoCategoria->setDT_Inicio_Valor($_POST['DT_Inicio_Valor']);
    $eventoCategoria->setDT_Fim_Valor($_POST['DT_Fim_Valor']);
    $eventoCategoria->setID_EVT_Evento($_POST['ID_EVT_Evento']);
    
    $eventoCategoria->insert();
    
    $FeedbackMessage->setMsg("Evento inserido com sucesso!");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty -> assign("listEvento",$evento->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Categoria do Evento.");
$smarty->display('./View/EventoCategoriaInsert.html');
