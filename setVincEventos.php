<?php
session_start();
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once './actions/aevento_condpagamento.php';

$LinkEvt_CPgto = new aevento_condpagamento();

$ID_EVT = $_REQUEST['ID_EVT'];
$Cod_FPgto = $_REQUEST['CodFPgto'];
if($ID_EVT!="" and $Cod_FPgto!=""){
$LinkEvt_CPgto->setCod_TipoPagamento($Cod_FPgto);
$LinkEvt_CPgto->setID($ID_EVT);
$LinkEvt_CPgto->insert();

header('location:TbFormaPagtoList.php');
}

