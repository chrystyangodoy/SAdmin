<?php
session_start();
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aEvt_Evento.php';

$ListEventos = new aEvt_Evento();

$Cod_FPgto = $_REQUEST['COD_Tipo_Forma_Pagamento'];
$arr = $ListEventos->CheckVincEventoPagto($Cod_FPgto);
echo json_encode($arr);
