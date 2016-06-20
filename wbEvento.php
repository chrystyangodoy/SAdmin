<?php
session_start();
include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

require_once './actions/aEvt_Evento.php';
$evento = new aEvt_Evento();

$cod_IDEvt = '335b38c5779a99886a31b2179ef87a8d';

$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();

$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->assign("lista", $evento->wbEvento($cod_IDEvt));

$smarty->display('./WebBlocks/Evento.html');