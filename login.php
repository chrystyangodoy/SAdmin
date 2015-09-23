<?php

include 'smarty.php';
session_start();
require_once './actions/aUsuario.php';
require_once './config/FeedbackMessage.php';
$usuario = new aUsuario();
$FeedbackMessage = new FeedbackMessage();

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

            if ($_SESSION['id_Evento'] != NULL || $_SESSION['id_Evento'] != 0)
            {
                require_once './actions/aEvt_Evento_Participante.php';
                $evtPart = new aEvt_Evento_Participante();
                $evtPart->insertPart($_SESSION['id_Evento'], $_SESSION['ID_Usuario']);
                header("Location: Index.php");
            }
            else
            {
                header("Location: AreaUsuario.php");
            }
        }

        die();
    }
    else
    {
        unset($_SESSION['Username']);
        unset($_SESSION['Password']);
        $FeedbackMessage->setMsg("Usuário ou Senha incorretos!");
        $FeedbackMessage->setType("error");
        session_destroy();
    }
}
else
{
    $FeedbackMessage->setMsg("Bem Vindo, Visitante!");
}

if ($usuario->getID_Usuario() == null || $usuario->getID_Usuario() == 0)
{
    $msg = $FeedbackMessage->getMsg();
    $type = $FeedbackMessage->getType();

    $smarty->assign("msg", $msg);
    $smarty->assign("type", $type);
    $smarty->display('./View/login.html');
}