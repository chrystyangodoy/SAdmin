<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Curso.php';

$ListCurso = new aEvt_Curso();

$idUser = $_SESSION['ID_Usuario'];
$ID_EVT = $_REQUEST['ID_EVT'];
$ListCurso->setID_EVT($ID_EVT);

$arr = $ListCurso->selectCursoID_EVT();
echo json_encode($arr);
