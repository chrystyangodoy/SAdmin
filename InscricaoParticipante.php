<?php

session_start();

if (isset($_GET['ID_Evento_Categoria']) and isset($_GET['ID_EVT_Evento'])) {
    $_SESSION['ID_Evento_Categoria'] = $_GET['ID_Evento_Categoria'];
    $_SESSION['ID_Evento'] = $_GET['ID_EVT_Evento'];

    header("Location: ParticipanteInsert.php");
    die();
} else {
    header("Location: Index.php");
}