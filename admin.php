<?php

include './corp/Smarty/libs/Smarty.class.php';
require_once 'aUsuarios.php';
echo 'Autenticando!!!';
$usuario = new aUsuarios();

$smarty = new Smarty();

$smarty->template_dir = "smarty/ADM";
$smarty->compile_dir = "smarty/ADM_c";
$smarty->config_dir = "smarty/configs";
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('./ADM/teste.php');