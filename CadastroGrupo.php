<?php

require_once 'smarty.php';
require ('./actions/aGrupoUsuario.php');

$grupo = new aGrupoUsuario();

if (isset($_POST['Cadastrar'])) {
    $grupo->setDSC_Nome($_POST['DSC_Nome']);
    $grupo->setDSC_Descricao($_POST['DSC_Descricao']);

    if ($grupo->insert()) {
        echo "Usuário inserido com sucesso!";
    } else {
        echo "Não foi possível inserir usuário!";
    }
}

$smarty->display('./View/GrupoInsert.html');
