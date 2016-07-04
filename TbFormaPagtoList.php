<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './actions/aTb_Tipo_Forma_Pagamento.php';
$FormaPagto = new aTb_Tipo_Forma_Pagamento();

require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if(isset($_GET['exc'])){
    $FormaPagto->setCOD_Tipo_Forma_Pagamento($_GET['exc']);
    $FormaPagto->delete();
    header('location:TbFormaPagtoList.php');
}
$smarty->assign("Titulo", " - Lista de Formas de Pagamento.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty -> assign("lista",$FormaPagto->select());
$smarty->display('./View/TbFormaPagtoList.html');
