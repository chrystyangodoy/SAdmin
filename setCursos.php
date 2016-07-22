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

$idUser = $_SESSION['ID_Usuario'];
$ID_Curso = $_GET['IDCurso'];
$DescCurso = $_GET['DescCurso'];

if ($_GET['IDCurso'] != NULL) {
    require_once './actions/aBsc_Participante.php';
    $Partic = new aBsc_Participante();
    $id_Participante = $Partic->getIDParticipantePeloIDUsuario($idUser);
    
    $idUnico = $config->idUnico();
    $CursosPartic->setID_EVT_Curso_Participante($idUnico);
    $CursosPartic->setDescricao($DescCurso);
    $CursosPartic->setID_Curso($ID_Curso);
    
    $CursosPartic->setID_Participante($id_Participante);
    $CursosPartic->insert();
    
    $FeedbackMessage->setMsg("Inscrição efetuada com sucesso!");
    header("Location: AreaUsuario.php");
}
