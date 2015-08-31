<?php
//require 'config/configs.php';
//
//$da = new configs();
//
//echo($da->dateToBR("2015-09-01"));
//echo("</br>");
//echo($da->dateToUS("01-09-2015"));


require_once 'db/dbConnection.php';

$co = new dbConnection();

$co->RunQuery()
