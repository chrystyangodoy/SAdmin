<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();


require './actions/atb_Tipo_Estado.php';
$tpEstado = new atb_Tipo_Estado();
$codEstado = $_GET['alt'];

$tpEstado->setCOD_TIPOEstado($codEstado);

$tpEstado->load();

if (isset($_POST['Salvar']))
{
    $tpEstado->setCOD_TIPOEstado($codEstado);
    $tpEstado->setDSC_Nome($_POST['DSC_Nome']);
    $tpEstado->setDSC_Descricao($_POST['DSC_Descricao']);
    $tpEstado->update();

    $FeedbackMessage->setMsg("Estado atualizado com sucesso!");
    header("Location: TipoEstadoList.php");
}
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("COD_TIPOEstado", $tpEstado->getCOD_TIPOEstado());
$smarty->assign("DSC_Nome", $tpEstado->getDSC_Nome());
$smarty->assign("DSC_Descricao", $tpEstado->getDSC_Descricao());

$smarty->display('./View/TipoEstadoEdit.html');
