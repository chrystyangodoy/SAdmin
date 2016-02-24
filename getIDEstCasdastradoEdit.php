<?php

    if(isset($_REQUEST["Id_Estrangeiro"])){
    require ('./actions/aBsc_Participante.php');
    $partic = new aBsc_Participante();
    $Id_Estrangeiro = $_REQUEST["Id_Estrangeiro"];
    $ID_Participante = $_REQUEST["ID_Participante"];
    
    if($partic->selectNotExistsId_EstrangeiroEdit($Id_Estrangeiro,$ID_Participante)){
        echo '1';
    }else{
        echo '0';
    }
}
