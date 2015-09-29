<?php

require_once 'smarty.php';
session_start();
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require ('./actions/aBsc_Profissao.php');
$prof = new aBsc_Profissao();

if (isset($_POST['Cadastrar'])) {
    $prof->setDSC_Nome($_POST['DSC_Nome']);
    $prof->setDSC_Descricao($_POST['DSC_Descricao']);
    $prof->insert();
    $FeedbackMessage->setMsg("Profissão inserida com sucesso!");
    header('location:ProfissaoList.php');
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/ProfissaoInsert.html');