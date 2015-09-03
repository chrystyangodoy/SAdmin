<?php

require_once 'smarty.php';

require ('./actions/aBsc_Profissao.php');
$prof = new aBsc_Profissao();

if (isset($_POST['Cadastrar'])) {
    $prof->setDSC_Nome($_POST['DSC_Nome']);
    $prof->setDSC_Descricao($_POST['DSC_Descricao']);
    $prof->insert();
    echo "Empresa inseridas com sucesso!";
} else {
    echo "Não foi possível inserir Empresa!";
}

$smarty->display('./View/EmpresaInsert.html');