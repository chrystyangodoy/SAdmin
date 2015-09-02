<?php
require_once 'smarty.php';
require_once './actions/aUsuario.php';
$TpPart = new aUsuario();

if(isset($_GET['del'])){
    $TpPart->setID_Usuario($_GET['del']);
    $TpPart->delete();
}

$smarty -> assign("lista",$TpPart->selectInnerGrupo());

$smarty->display('./View/UsuarioList.html');