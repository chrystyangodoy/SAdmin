<?php
require_once './actions/aUsuario.php';
$user = new aUsuario();
$idLastUser = $user->LoadIDCPF("52863298291");

//print $idLastUser ;