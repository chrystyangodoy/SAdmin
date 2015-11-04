<?php
session_start();
$idUser = $_SESSION['ID_Usuario'];

//$ID_Evento = $_POST['$ID_Evento'];
//$ID_Evento = $_POST['$ID_Participante'];


include_once './actions/boleto_bb.php';
