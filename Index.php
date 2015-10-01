<?php

include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
session_start();

require_once './actions/aUsuario.php';
require_once './actions/aEvt_Evento.php';
$usuario = new aUsuario();
$evento = new aEvt_Evento();

if (isset($_POST['btn_inscricao'])) {
    $_SESSION['id_Evento'] = $_POST['btn_inscricao'];

    if ($_SESSION['ID_Usuario'] != null || $_SESSION['ID_Usuario'] != 0) {
        require_once './actions/aEvt_Evento_Participante.php';
        $evtPart = new aEvt_Evento_Participante();
        if ($evtPart->selectNotExistsEvt($_SESSION['id_Evento'], $_SESSION['ID_Usuario'])) {
            $evtPart->insertPart($_SESSION['id_Evento'], $_SESSION['ID_Usuario']);
        } else {
            $FeedbackMessage->setMsg("Você já está inscrito neste evento!");
            $FeedbackMessage->setType("error");
        }
        $id_User = $_SESSION['ID_Usuario'];
        require_once './actions/aEvt_Evento.php';
        $infoEvt = new aEvt_Evento();
        $ass = "Confirmação de Inscrição no Evento!";
        $mens = ("Sua inscrição no evento " . $infoEvt->getDSC_Nome() . " foi efetuada com sucesso!");
        require_once './config/eMail.php';
        $emailObj = new eMail();
        require_once ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        $partic->selectInfoEvt($id_User);

        $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $mens);
    } else {
        header("Location: Login.php");
        die();
    }
}

//--------------------------Variáveis para IF de Tela--------------------------------------------------------------

$isLogado = false;
$NomeUsuario = "";

if (isset($_SESSION['ID_Usuario'])) {
    $isLogado = true;
    if (isset($_SESSION['DSC_Login'])) {
        $NomeUsuario = $_SESSION['DSC_Login'];
    }
    
}

//-----------------------------------------------------------------------------------------------------------------

$msg = $FeedbackMessage->getMsg();
$type = $FeedbackMessage->getType();

$smarty->assign("isLogado", $isLogado);
$smarty->assign("NomeUsuario", $NomeUsuario);

$smarty->assign("msg", $msg);
$smarty->assign("type", $type);
$smarty->assign("lista", $evento->SelectEventoEmdia());
$smarty->display('./portal/Index.html');
