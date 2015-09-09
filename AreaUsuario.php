<?php
include_once './smarty.php';
require_once './config/FeedbackMessage.php';

$FeedbackMessage = new FeedbackMessage();

$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());

$smarty->display('./View/AreaUsuario.html');