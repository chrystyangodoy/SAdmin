<?php

require_once 'smarty.php';
require_once './actions/aBsc_Empresa.php';
$empresa = new aBsc_Empresa();


if (isset($_GET['del'])) {
    $empresa->setID_EVT($_GET['del']);
    $empresa->delete();
}
if (isset($_GET['alt'])) {
    $smarty->display('EmpresaEdit.php');
} else {
    $smarty->assign("lista", $empresa->select());

    $smarty->display('./View/EmpresaList.html');
}

