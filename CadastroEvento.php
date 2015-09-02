<?php

require_once 'smarty.php';
require './actions/aEvt_Evento.php';

$evento = new aEvt_Evento();

if (isset($_POST['Cadastrar'])) {
    $evento->setDSC_Nome($_POST['DSC_Nome']);
    $evento->setDSC_Presidente($_POST['DSC_Presidente']);
    $evento->setDT_Inicio($_POST['DT_Inicio']);
    $evento->setDT_Fim($_POST['DT_Fim']);
    $evento->setCOD_CNPJ_Promotora($_POST['COD_CNPJ_Promotora']);
    $evento->setDSC_Nome_Promotora($_POST['DSC_Nome_Promotora']);
    $evento->setDSC_Presidente_Promotora($_POST['DSC_Presidente_Promotora']);
    $evento->setDSC_Endereco_Promotora($_POST['DSC_Endereco_Promotora']);
    $evento->setNUM_CEP_Promotora($_POST['NUM_CEP_Promotora']);
    $evento->setDSC_Cidade_Promotora($_POST['DSC_Cidade_Promotora']);
    $evento->setNUM_Fone_Promotora($_POST['NUM_Fone_Promotora']);
    $evento->setNUM_FAX_Promotora($_POST['NUM_FAX_Promotora']);
    $evento->setDSC_EMAIL_Promotora($_POST['DSC_EMAIL_Promotora']);
    $evento->setQTD_CargaHorariaMinima($_POST['QTD_CargaHorariaMinima']);
    $evento->setID_BSC_Local_Evento($_POST['ID_BSC_Local_Evento']);
    $evento->setCOD_Tipo_Estado_promotora($_POST['COD_Tipo_Estado_promotora']);
    $evento->insert();
    echo "Evento inserido com sucesso!";
} else {
    echo "Não foi possível inserir Evento!";
}

$smarty->display('./View/EventoInsert.html');