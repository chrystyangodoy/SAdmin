<?php

include './corp/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->template_dir = "smarty/ADM";
$smarty->compile_dir = "smarty/ADM_c";
$smarty->config_dir = "smarty/configs";
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;