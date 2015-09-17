<?php
require_once 'smarty.php';
session_start();
require_once './config/FeedbackMessage.php';
require ('./actions/atb_Tipo_Estado.php');
require_once ('./config/configs.php');

$tpEstado = new atb_Tipo_Estado();
$config = new configs();
$FeedbackMessage = new FeedbackMessage();

if (isset($_POST['Cadastrar']))
{
    $idUnico = $config->idUnico();

    $tpEstado->setCOD_TIPOEstado($idUnico);
    $tpEstado->setDSC_Nome($_POST['DSC_Nome']);
    $tpEstado->setDSC_Descricao($_POST['DSC_Descricao']);
    $tpEstado->insert();

    $FeedbackMessage->setMsg("Evento inserido com sucesso!");
}



$FeedbackMessage = new FeedbackMessage();

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/TipoEstadoInsert.html');