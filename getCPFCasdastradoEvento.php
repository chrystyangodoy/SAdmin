<?php

if (isset($_REQUEST["cpf"]) && isset($_REQUEST["eventoID"])) {
    require ('./actions/aEvt_Evento_Participante.php');
    require_once './config/configs.php';
    $evPartc = new aEvt_Evento_Participante();
    $config = new configs();
    $cpf = $config->limpaCPF($_REQUEST["cpf"]);

    if ($evPartc->selectNotExistsEvtCPF($_REQUEST["eventoID"], $_REQUEST["cpf"])) {
        echo '1';
    } else {
        echo '0';
    }
}