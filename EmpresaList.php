<?php

require_once 'smarty.php';
require_once './actions/aBsc_Empresa.php';
require_once './config/FeedbackMessage.php';
session_start();
$empresa = new aBsc_Empresa();
$FeedbackMessage = new FeedbackMessage();

if (isset($_GET['del']))
{
    $empresa->setID_EVT($_GET['del']);
    $empresa->delete();
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("lista", $empresa->select());
$smarty->display('./View/EmpresaList.html');

