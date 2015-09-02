<?php
require_once 'smarty.php';
require_once './actions/aTbTipoParticipacao.php';
$TpPart = new aTbTipoParticipacao();

if(isset($_GET['del'])){
    $TpPart->setCOD_Tipo_Participacao($_GET['del']);
    $TpPart->delete();
}

$smarty -> assign("lista",$TpPart->select());

$smarty->display('./View/TbTipoParticipacaoList.html');
