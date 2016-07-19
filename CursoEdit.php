<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aEvt_Curso.php';
$curso = new aEvt_Curso();
require_once './actions/aEvt_Evento.php';
$Evento = new aEvt_Evento();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

$config = new configs();

$ID_Curso = $_GET['alt'];
$curso->setID_Curso($ID_Curso);
$curso->load();

if (isset($_POST['Salvar']))
{
    $curso->setID_Curso($idUnico);
    $curso->setCurso($_POST['Curso']);
    $curso->setTitulo($_POST['Titulo']);
    $curso->setData_Hora($_POST['Data_Hora']);
    $curso->setID_EVT($_POST['ID_EVT']);
    $curso->update();

    $FeedbackMessage->setMsg("Curso atualizado com sucesso!");
    header("Location: CursoList.php");
    die();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("ListaEvt",$Evento->select());
$smarty->assign("ID_Curso", $curso->getID_Curso());
$smarty->assign("Curso",$curso->getCurso());
$smarty->assign("Titulo", $curso->getTitulo());
$smarty->assign("Data_Hota", $curso->setData_Hora());
$smarty->assign("ID_EVT", $curso->setID_EVT());
$smarty->assign("Titulo", " - Editar Curso.");
$smarty->display('./View/CursoEdit.html');
