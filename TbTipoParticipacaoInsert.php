<?php
require_once 'smarty.php';
session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require ('./actions/aTbTipoParticipacao.php');
$TpPart = new aTbTipoParticipacao();


if(isset($_POST['Cadastrar'])){
    $TpPart->setDSC_Nome($_POST['DSC_Nome']);
    $TpPart->setDSC_Descricao($_POST['DSC_Descricao']);
    $TpPart->insert();
    $FeedbackMessage->setMsg("Tipo de Participação inserido com sucesso!");
    header('location:TbTipoParticipacaoList.php');
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/TbTipoParticipacaoInsert.html');

