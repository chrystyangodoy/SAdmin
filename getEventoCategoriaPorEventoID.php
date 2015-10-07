<?php

$ID_EVT_Evento = $_REQUEST['ID_EVT_Evento'];
require_once './actions/aEvt_Evento_Categoria.php';

$EventoCategoria = new aEvt_Evento_Categoria();

$arr = $EventoCategoria->selectCategoriasDoEvento($ID_EVT_Evento);

echo json_encode($arr);
