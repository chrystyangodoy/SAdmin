<?php
session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

require_once './actions/aTb_Tipo_Forma_Pagamento.php';
$FormaPagto = new aTb_Tipo_Forma_Pagamento();
$codFormaPagto = $_GET['alt'];
$FormaPagto ->setCOD_Tipo_Forma_Pagamento($codFormaPagto);
$FormaPagto ->load();

if(isset($_POST['Salvar'])){ 
    $FormaPagto->setDSC_Nome($_POST['DSC_Nome']);
    $FormaPagto->setDSC_Descricao($_POST['DSC_Descricao']);
    $FormaPagto->setNro_Parcelas($_POST['Nro_Parcelas']);
    $FormaPagto->setDias_Vencimento($_POST['Dias_Vencimento']);
    $FormaPagto->update();
    $FeedbackMessage->setMsg("Forma de Pagamento atualizada com sucesso!");
    header("Location: TbFormaPagtoList.php");
}
$smarty->assign("Titulo", " - Editar da Forma de Pagamento.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("COD_Tipo_Forma_Pagamento",$FormaPagto->getCOD_Tipo_Forma_Pagamento());
$smarty->assign("DSC_Nome",$FormaPagto->getDSC_Nome());
$smarty->assign("DSC_Descricao",$FormaPagto->getDSC_Descricao());
$smarty->assign("Nro_Parcelas",$FormaPagto->getNro_Parcelas());
$smarty->assign("Dias_Vencimento",$FormaPagto->getDias_Vencimento());

$smarty->display('./View/TbFormaPagtoEdit.html');