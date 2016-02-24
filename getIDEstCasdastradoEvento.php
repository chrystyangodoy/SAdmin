<?php

if (isset($_REQUEST["Id_Estrangeiro"]) && isset($_REQUEST["eventoID"])) {
    require ('./actions/aEvt_Evento_Participante.php');
    $evPartc = new aEvt_Evento_Participante();
    $Id_Estrangeiro = $_REQUEST["Id_Estrangeiro"];

    if ($evPartc->selectNotExistsEvtId_Estrangeiro($_REQUEST["eventoID"], $_REQUEST["Id_Estrangeiro"])) {
        echo '1';
    } else {
        echo '0';
    }
}