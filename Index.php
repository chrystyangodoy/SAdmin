<?php

include 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();
session_start();

require_once './actions/aUsuario.php';
require_once './actions/aEvt_Evento.php';
$usuario = new aUsuario();
$evento = new aEvt_Evento();

if (isset($_POST['btnLogin']))
{
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
    $usuario->login($Username, $Password);

    if ($usuario->getID_Usuario() != null || $usuario->getID_Usuario() != 0)
    {

        $_SESSION['ID_Usuario'] = $usuario->getID_Usuario();
        $_SESSION['DSC_Login'] = $usuario->getDSC_Login();
        $FeedbackMessage->setMsg("Bem Vindo, " . $_SESSION['DSC_Login']);

        if ($Username == "admin")
        {
            header("Location: AreaAdmin.php");
        }
        else
        {
            header("Location: AreaUsuario.php");
        }

        die();
    }
    else
    {
        unset($_SESSION['ID_Usuario']);
        unset($_SESSION['DSC_Login']);
        $FeedbackMessage->setMsg("Usuário ou Senha incorretos!");
        $FeedbackMessage->setType("error");
        session_destroy();
    }
}
else
{
    $FeedbackMessage->setMsg("Bem Vindo, Visitante!");
}

if (isset($_GET['idevt']))
{
    $idEvent = $_GET['idevt'];
    if ($_SESSION['ID_Usuario'] != null || $_SESSION['ID_Usuario'] != 0)
    {

        require_once './actions/aBsc_Participante.php';
        require_once './actions/aEvt_Evento_Participante.php';
        require_once ('./config/configs.php');

        $partic = new aBsc_Participante();
        $evtPart = new aEvt_Evento_Participante();
        $config = new configs();

        //Capturar informações do participante
        $partic->selectInfoEvt($_SESSION['ID_Usuario']);

        $evtPart->setID_EVT_Evento_Pariticipante($config->idUnico());
        $evtPart->setDSC_Nome_Crachav($partic->getDSC_Nome());
        $evtPart->setCOD_Barras_Cracha($partic->getCOD_CPF());
        $evtPart->setID_EVT_Evento($_GET['idevt']);
        $evtPart->setID_BSC_Participante($partic->getID_Participante());
        $evtPart->insert();

        $ass = "Confirmação de Inscrição no Evento!";
        $mens = ("Sua inscrição no evento ".$_GET['idevt']." foi efetuada com sucesso!");
        require_once './config/eMail.php';
        $emailObj = new eMail();

        $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $mens);
    }
    else
    {
        header("Location: Login.php?idevt=$idEvent");
    }
}
if ($usuario->getID_Usuario() == null || $usuario->getID_Usuario() == 0)
{
    $msg = $FeedbackMessage->getMsg();
    $type = $FeedbackMessage->getType();

    $smarty->assign("msg", $msg);
    $smarty->assign("type", $type);
    $smarty->assign("lista", $evento->SelectEventoEmdia());
    $smarty->display('./portal/Index.html');
}
