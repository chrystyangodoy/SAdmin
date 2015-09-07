<?php

include './corp/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->template_dir = "View";
$smarty->compile_dir = "templates_c";
$smarty->config_dir = 'configs';
$smarty->cache_dir = 'cache';
//$smarty->force_compile = true;
//$smarty->debugging = false;
//$smarty->caching = false;
//$smarty->cache_lifetime = 120;