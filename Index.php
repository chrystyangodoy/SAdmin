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
if ($usuario->getID_Usuario() == null || $usuario->getID_Usuario() == 0)
{
    $msg = $FeedbackMessage->getMsg();
    $type = $FeedbackMessage->getType();
    
    $smarty->assign("dscUser", $_SESSION['DSC_Login']);

    $smarty->assign("msg", $msg);
    $smarty->assign("type", $type);
    $smarty->assign("lista", $evento->SelectEventoEmdia());
    $smarty->display('./portal/Index.html');
}