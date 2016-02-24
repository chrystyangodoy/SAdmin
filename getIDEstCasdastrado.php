<?php

if (isset($_REQUEST["Id_Estrangeiro"])) {
    require ('./actions/aBsc_Participante.php');
    $partic = new aBsc_Participante();
    $Id_Estrangeiro = $_REQUEST["Id_Estrangeiro"];

    if ($partic->selectNotExistsId_Estrangeiro($Id_Estrangeiro)) {
        echo '1';
    } else {
        echo '0';
    }
}