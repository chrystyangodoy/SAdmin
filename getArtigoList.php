<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aTb_submissao_doctos.php';
$Artigo = new aTb_submissao_doctos();

$FeedbackMessage = new FeedbackMessage();
$idUser = $_SESSION['ID_Usuario'];
$ID_EVT = $_GET['ID_EVT'];

$where = "AND ID_Usuario='".$idUser."' AND ID_EVT='".$ID_EVT."'";
$arr = $Artigo->selectList($where);
$newArr = array();
$newArr2 = array();

$parecer = array(
    1=>'<span class="label label-warning">Em análise</span>',
    2=>'<span class="label label-success">Aprovado</span>',
    3=>'<span class="label label-danger">Reprovado</span>'
);

foreach ($arr as $key => $value) {
    $value["Data_Envio"] = date('d/m/Y', strtotime($value["Data_Envio"]));
    $value["Parecer"] = $parecer[$value["Parecer"]];
    $newArr[]= array_values($value);
}

$newArr2['data']=$newArr;
echo json_encode($newArr2);



