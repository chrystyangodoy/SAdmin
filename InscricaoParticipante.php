<?php

if (isset($_GET['ID_Evento_Categoria']) and isset($_GET['ID_EVT_Evento'])) {
    $_SESSION['ID_Evento_Categoria'] = $_GET['ID_Evento_Categoria'];
    $_SESSION['ID_Evento'] = $_GET['ID_EVT_Evento'];

    if ($_SESSION['ID_Usuario'] != null || $_SESSION['ID_Usuario'] != 0) {//logado
        
    } else {//não logado
        header("Location: ParticipanteInsert.php");
        die();
    }
}

