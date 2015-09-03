<?php

require_once 'smarty.php';

require ('./actions/aBsc_Empresa.php');
$emp = new aBsc_Empresa();
$emp->setID_Empresa(2);
$emp->load();

$regEmpresa = array('COD_CNPJ' => $emp->getCOD_CNPJ(), 'DSC_RazaoSocial' => $emp->getDSC_RazaoSocial(), 'DSC_Endereco' => $emp->getDSC_Endereco(), 'DSC_Bairro' => $emp->getDSC_Bairro(), 'DSC_Cidade' => $emp->getDSC_Cidade(), 'NUM_CEP' => $emp->getNUM_CEP(), 'NUM_InscricaoEstadual' => $emp->getNUM_InscricaoEstadual(), 'NUM_Fone' => $emp->getNUM_Fone(), 'NUM_FAX' => $emp->getNUM_FAX(), 'DSC_EMAIL' => $emp->getDSC_EMAIL(), 'COD_TipoEstado' => $emp->getCOD_TipoEstado());

foreach ($regEmpresa as $value) {
    echo "$value -<br>";
}

