<?php
require_once './actions/aEvt_Pagamento.php';
$Pagto = new aEvt_Pagamento();

if (isset($_REQUEST['ID_Participante']) && isset($_REQUEST['COD_Tipo_Situacao_Pagamento']))
{
    $Pagto->setID_Participante($_REQUEST['ID_Participante']);
    $Pagto->setCOD_Tipo_Situacao_Pagamento($_REQUEST['COD_Tipo_Situacao_Pagamento']);
    $Pagto->updateStatusParticip();
}
echo 1;
