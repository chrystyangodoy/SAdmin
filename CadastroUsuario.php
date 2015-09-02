<?php
require_once 'smarty.php';

require ('./actions/aUsuario.php');
require ('./actions/aGrupoUsuario.php');
$grupo = new aGrupoUsuario();
$TpPart = new aUsuario();


if(isset($_POST['Cadastrar'])){
    $TpPart->setDSC_Login($_POST['DSC_Login']);
    $TpPart->setDSC_Senha($_POST['DSC_Senha']);
    $TpPart->setDTM_Inicio($_POST['DTM_Inicio']);
    $TpPart->setDTM_Fim($_POST['DTM_Fim']);
    $TpPart->setID_SEG_Grupo($_POST['ID_SEG_Grupo']);
    $TpPart->insert();
    echo "Usuário inserido com sucesso!";
}else {
    echo "Não foi possível inserir usuário!";
}
$smarty -> assign("listGrupo",$grupo->select());

$smarty->display('./View/UsuarioInsert.html');