<?php

session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Curso.php';
$Cursos = new aEvt_Curso();

$idUser = $_SESSION['ID_Usuario'];
$ID_EVT = $_REQUEST['ID_EVT'];

//if ($_REQUEST['ID_CURSO'] == "x") {
//    $ID_CURSO = $_REQUEST['ID_CURSO'];
//    $Cursos->setStatus($Status);
//    $Cursos->update();
//}
$Cursos->setID_EVT($ID_EVT);
require_once './actions/aBsc_Participante.php';
$Partic = new aBsc_Participante();
$id_Participante = $Partic->getIDParticipantePeloIDUsuario($idUser);
$arr = $Cursos->selectID_EVT($id_Participante);
echo json_encode($arr);
