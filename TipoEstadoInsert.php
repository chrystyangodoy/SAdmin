<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require ('./actions/atb_Tipo_Estado.php');
require_once ('./config/configs.php');

$tpEstado = new atb_Tipo_Estado();
$config = new configs();

if (isset($_POST['Cadastrar']))
{
    $idUnico = $config->idUnico();

    $tpEstado->setCOD_TIPOEstado($idUnico);
    $tpEstado->setDSC_Nome($_POST['DSC_Nome']);
    $tpEstado->setDSC_Descricao($_POST['DSC_Descricao']);
    $tpEstado->insert();

    $FeedbackMessage->setMsg("Estado inserido com sucesso!");
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/TipoEstadoInsert.html');