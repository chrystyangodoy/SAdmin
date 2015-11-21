<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

require ('./actions/aTbTipoParticipacao.php');
$TpPart = new aTbTipoParticipacao();
$codTpParticipacao = $_GET['alt'];
$TpPart ->setCOD_Tipo_Participacao($codTpParticipacao);
$TpPart ->load();


if(isset($_POST['Salvar'])){
    $TpPart ->setCOD_Tipo_Participacao($codTpParticipacao);
    $TpPart->setDSC_Nome($_POST['DSC_Nome']);
    $TpPart->setDSC_Descricao($_POST['DSC_Descricao']);
    $TpPart->update();
    $FeedbackMessage->setMsg("Usuário atualizado com sucesso!");
    header("Location: UsuarioList.php");
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("COD_Tipo_Participacao",$user->getCOD_Tipo_Participacao());
$smarty->assign("DSC_Nome",$user->getDSC_Nome());
$smarty->assign("DSC_Descricao",$user->getDSC_Descricao());

$smarty->display('./View/TbTipoParticipacaoEdit.html');

