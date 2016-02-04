<?php

$ID_BSC_Participante = $_REQUEST['ID_BSC_Participante'];
require_once './actions/aEvt_Pagamento.php';
$Pagto = new aEvt_Pagamento();

$arr = $Pagto->selectInnerPagtoPartic($ID_BSC_Participante);

echo json_encode($arr);
