<?php

session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Curso.php';
$Cursos = new aEvt_Curso();

$idUser = $_SESSION['ID_Usuario'];
$id_Participante = $_REQUEST['ID_Participante'];
$ID_EVT = $_REQUEST['ID_EVT'];

$Cursos->setID_EVT($ID_EVT);
$arr = $Cursos->selectCursosPartic($id_Participante);
echo json_encode($arr);