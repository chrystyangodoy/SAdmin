<?php
require_once 'smarty.php';
require_once './actions/aTbTipoParticipacao.php';
$TpPart = new aTbTipoParticipacao();

if(isset($_GET['exc'])){
    $TpPart->setCOD_Tipo_Participacao($_GET['exc']);
    $TpPart->delete();
    header('location:TbTipoParticipacaoList.php');
}

$smarty -> assign("lista",$TpPart->select());

$smarty->display('./View/TbTipoParticipacaoList.html');
