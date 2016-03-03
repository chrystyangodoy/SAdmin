<?php
session_start();
$idUser = $_SESSION['ID_Usuario'];

$_SESSION['ID_Evt_Part'] = $_GET['ID_EVT_Evento_Pariticipante'];
//$ID_Evento = $_POST['$ID_Participante'];

include_once './actions/boleto_bb.php';