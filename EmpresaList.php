<?php
require_once 'smarty.php';
require_once './actions/aBsc_Empresa.php';
$empresa = new aBsc_Empresa();


if (isset($_GET['del'])) {
    $empresa->setID_EVT($_GET['del']);
    $empresa->delete();
}

$smarty->assign("lista",$empresa->select());

$smarty->display('./View/EmpresaList.html');