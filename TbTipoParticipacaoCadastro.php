<?php
require_once 'smarty.php';

require ('./actions/aTbTipoParticipacao.php');
$TpPart = new aTbTipoParticipacao();


if(isset($_POST['Cadastrar'])){
    $TpPart->setDSC_Nome($_POST['DSC_Nome']);
    $TpPart->setDSC_Descricao($_POST['DSC_Descricao']);
    $TpPart->insert();
    header('location:TbTipoParticipacaoList.php');
    echo "Tipo Participação inserido com sucesso!";
}else {
    echo "Não foi possível inserir Tipo Participação!";
}


$smarty->display('./View/TbTipoParticipacaoInsert.html');

