<?php

include 'smarty.php';
session_start();
require_once './actions/aUsuario.php';
require_once './config/FeedbackMessage.php';
$usuario = new aUsuario();
$FeedbackMessage = new FeedbackMessage();

if (isset($_POST['btnLogin'])){
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
    $usuario->login($Username, $Password);

    if ($usuario->getID_Usuario() != null || $usuario->getID_Usuario() != 0){
        $_SESSION['ID_Usuario'] = $usuario->getID_Usuario();
        $_SESSION['DSC_Login'] = $usuario->getDSC_Login();
        $FeedbackMessage->setMsg("Bem Vindo, " . $_SESSION['DSC_Login']);

        if ($Username == "admin" || $usuario->getID_SEG_Grupo()<>99)
        {
            header("Location: AreaAdmin.php");
        }
        else
        {

            if ($_SESSION['id_Evento'] != NULL || $_SESSION['id_Evento'] != 0)
            {
                require_once './actions/aEvt_Evento_Participante.php';
                $evtPart = new aEvt_Evento_Participante();

                if ($evtPart->selectNotExistsEvt($_SESSION['id_Evento'], $_SESSION['ID_Usuario']))
                {
                    $evtPart->insertPart($_SESSION['id_Evento'], $_SESSION['ID_Usuario']);
                    $_SESSION['id_Evento']=null;
                    header("Location: Index.php");
                }
                else
                {
                    $FeedbackMessage->setMsg("Você já está inscrito neste evento!");
                    $FeedbackMessage->setType("error");
                }
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
    $smarty->display('./View/Login.html');
}