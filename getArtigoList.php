<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aTb_submissao_doctos.php';
$Artigo = new aTb_submissao_doctos();

$FeedbackMessage = new FeedbackMessage();
$idUser = $_SESSION['ID_Usuario'];
$ID_EvtPart = $_REQUEST['ID_EVT_Evento_Pariticipante'];

$arr = $Artigo->select();
echo json_encode($arr);