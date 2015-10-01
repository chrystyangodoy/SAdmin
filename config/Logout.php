<?php

session_start();
$_SESSION = array();
session_destroy();
include_once './config/ValidaSessao.php';
