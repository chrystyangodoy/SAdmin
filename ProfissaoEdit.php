<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();


require ('./actions/aBsc_Profissao.php');
$prof = new aBsc_Profissao();
$codProfissao = $_GET['alt'];
$prof->setID_Profissao($codProfissao);
$prof->load();

if (isset($_POST['Salvar']))
{
    $prof->setID_Profissao($codProfissao);
    $prof->setDSC_Nome($_POST['DSC_Nome']);
    $prof->setDSC_Descricao($_POST['DSC_Descricao']);
    $prof->update();
    $FeedbackMessage->setMsg("Estado atualizado com sucesso!");
    header("Location: ProfissaoList.php");
}
$smarty->assign("Titulo", " - Editar Profissão.");
$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->assign("ID_Profissao", $prof->getID_Profissao());
$smarty->assign("DSC_Nome", $prof->getDSC_Nome());
$smarty->assign("DSC_Descricao", $prof->getDSC_Descricao());

$smarty->display('./View/ProfissaoEdit.html');
