<?php
    
    $teste = '1';

    if(isset($_REQUEST["cpf"]) && $_REQUEST["ID_Evento"]){
    require ('./actions/aEvt_Evento_Participante.php');
    require_once './config/configs.php';
    $evtPart = new aEvt_Evento_Participante();
    $config = new configs();
    $cpf = $config->limpaCPF($_REQUEST["cpf"]);
    $ID_Evento = $_REQUEST["ID_Evento"];
    
    if($evtPart->selectNotExistsEvtCPF($ID_Evento, $cpf)){
        echo '1';
    }else{
        echo '0';
    }
}
