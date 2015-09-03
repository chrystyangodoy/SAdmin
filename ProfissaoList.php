<?php
require_once 'smarty.php';
require_once './actions/aBsc_Profissao.php';
$prof = new aBsc_Profissao();


if (isset($_GET['del'])) {
    $prof->setID_Profissao($_GET['del']);
    $prof->delete();
}

$smarty->assign("lista",$prof->select());

$smarty->display('./View/ProfissaoList.html');