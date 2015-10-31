<?php

$teste;

if (isset($_REQUEST['Username']) and isset($_REQUEST['Password'])) {
    require_once './actions/aUsuario.php';
    $login = $_REQUEST['Username'];
    $senha = $_REQUEST['Password'];

    $usuario = new aUsuario();
    $usuario->login($login, $senha);

    if ($usuario->getID_Usuario() != null || $usuario->getID_Usuario() != "") {
        require_once './actions/aBsc_Participante.php';


        $partic = new aBsc_Participante();
        $partic->selectInfoPartic($usuario->getID_Usuario());

        echo json_encode($partic->selectParticPorID());
    }
}
