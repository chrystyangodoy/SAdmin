<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
require_once ('./config/configs.php');
$config = new configs();
require_once './actions/aTb_Tipo_Forma_Pagamento.php';
$FormaPagto = new aTb_Tipo_Forma_Pagamento();


if (isset($_POST['Cadastrar'])) {
    $idUnico = $config->idUnico();
    $FormaPagto->setCOD_Tipo_Forma_Pagamento($idUnico);
    $FormaPagto->setDSC_Nome($_POST['DSC_Nome']);
    $FormaPagto->setDSC_Descricao($_POST['DSC_Descricao']);
    if ($_POST['Nro_Parcelas'] == 0) {
        $FormaPagto->setNro_Parcelas(1);
    } else {
        $FormaPagto->setNro_Parcelas($_POST['Nro_Parcelas']);
    }
    $FormaPagto->setNro_Parcelas($_POST['Nro_Parcelas']);
    $FormaPagto->setDias_Vencimento($_POST['Dias_Vencimento']);
    $FormaPagto->insert();
    $FeedbackMessage->setMsg("Forma de Pagamento inserida com sucesso!");
    header('location:TbFormaPagtoList.php');
}
$smarty->assign("Titulo", " - Inserir Forma de Pagamento.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/TbFormaPagtoInsert.html');

