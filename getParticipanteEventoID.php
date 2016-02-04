<?php

$ID_EVT_Evento = $_REQUEST['ID_EVT_Evento'];
require_once './actions/aEvt_Pagamento.php';
$Pagto = new aEvt_Pagamento();

if (isset($_REQUEST['ID_Pagamento']) && isset($_REQUEST['COD_Tipo_Situacao_Pagamento']))
{
    $Pagto->setID_Pagamento($_REQUEST['ID_Pagamento']);
    $Pagto->setCOD_Tipo_Situacao_Pagamento($_REQUEST['COD_Tipo_Situacao_Pagamento']);
    $Pagto->update();
}


$arr = $Pagto->selectInnerPagto($ID_EVT_Evento);

echo json_encode($arr);
