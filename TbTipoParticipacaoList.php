<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aTbTipoParticipacao.php';
$TpPart = new aTbTipoParticipacao();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if(isset($_GET['exc'])){
    $TpPart->setCOD_Tipo_Participacao($_GET['exc']);
    $TpPart->delete();
    header('location:TbTipoParticipacaoList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty -> assign("lista",$TpPart->select());
$smarty->display('./View/TbTipoParticipacaoList.html');
