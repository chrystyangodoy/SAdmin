<?php

session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Curso.php';
$curso = new aEvt_Curso();
require_once './actions/aEvt_Evento.php';
$Evento = new aEvt_Evento();
require_once './config/configs.php';
$config = new configs();

if (isset($_POST['Salvar'])) {
    $idUnico = $config->idUnico();
    $curso->setID_Curso($idUnico);
    $curso->setCurso($_POST['Curso']);
    $curso->setTituloCurso($_POST['TituloCurso']);
    $curso->setData_Hora($_POST['Data_Hora']);
    $curso->setID_EVT($_POST['ID_EVT']);
    $curso->insert();
    $FeedbackMessage->setMsg("Curso inserido com sucesso!");
    header('location:CursoList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("ListaEvt",$Evento->select());
$smarty->assign("Titulo", " - Inserir Curso.");
$smarty->display('./View/CursoInsert.html');
