<?php

if (isset($_REQUEST['COD_CPF'])) {
    include_once './actions/aBsc_Participante.php';
    include_once './config/configs.php';
    $participante = new aBsc_Participante();
    $config = new configs();

    $cpf = $_REQUEST['COD_CPF'];
    $cpf = $config->limpaCPF($cpf);

    $participante->setCOD_CPF($cpf);
    $arr = $participante->selectParticPorCPF($cpf);

    $json = json_encode($arr);

    if ($json == "[]") {
        echo '[{"ID_Participante":""}]';
    } else {
        echo $json;
    }
}