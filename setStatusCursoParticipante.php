<?php

session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Curso_Participante.php';
$CursosPartic = new aEvt_Curso_Participante();
require_once './config/configs.php';
$config = new configs();

$ConfInscCurso = Trim($_GET['Confirm']);

$IDCurso_Participante = $_GET['ID_EVT_Curso_Participante'];

IF ($_GET['ID_EVT_Curso_Participante']) {
    $CursosPartic->setID_EVT_Curso_Participante($IDCurso_Participante);
    $CursosPartic->load();
    $CursosPartic->setStatus($ConfInscCurso);
    $CursosPartic->update();
    if ($ConfInscCurso == 1) {
        $FeedbackMessage->setMsg("Inscrição Confirmada Sucesso!");
    } else {
        $FeedbackMessage->setType("Error");
        $FeedbackMessage->setMsg("Inscrição Cancelada Sucesso!");
    }
}

header("Location: ParticipanteEventoCursoList.php");
