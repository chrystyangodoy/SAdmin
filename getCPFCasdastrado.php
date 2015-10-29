<?php

if (isset($_REQUEST["cpf"])) {
    require ('./actions/aBsc_Participante.php');
    require_once './config/configs.php';
    $partic = new aBsc_Participante();
    $config = new configs();
    $cpf = $config->limpaCPF($_REQUEST["cpf"]);

    if ($partic->selectNotExistsCPF($cpf)) {
        echo '1';
    } else {
        echo '0';
    }
}