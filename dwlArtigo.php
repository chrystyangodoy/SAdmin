<?php
session_start();
include_once './config/ValidaSessao.php';
include_once './smarty.php';
require_once './config/FeedbackMessage.php';
require_once './actions/aTb_submissao_doctos.php';
$Artigo = new aTb_submissao_doctos();

$action = isset($_GET['action']) ? $_GET['action'] : null;
$ID_ART = isset($_GET['id_art']) ? $_GET['id_art'] : null;


$FeedbackMessage = new FeedbackMessage();
$idUser = $_SESSION['ID_Usuario'];

$where = "AND COD_Submissao='".$ID_ART."'";

if ($action == 'download' && $ID_ART != null) {
    $arr = $Artigo->select($where);
    header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
    header("Content-Disposition: inline; filename=".$arr[0]["Nome_Docto"]);
    echo $arr[0]["Documento"];
    
}elseif ($action == 'aprovado' && $ID_ART != null) {
    $whereId = "WHERE COD_Submissao='".$ID_ART."'";
    $Artigo->updateAprovado($whereId);
    header("location:ArtigoList.php");
    
}elseif ($action == 'reprovado' && $ID_ART != null) {
    $whereId = "WHERE COD_Submissao='".$ID_ART."'";
    $Artigo->updateReprovado($whereId);
    header("location:ArtigoList.php");
}
elseif ($action == 'analise' && $ID_ART != null) {
    $whereId = "WHERE COD_Submissao='".$ID_ART."'";
    $Artigo->updateAnalise($whereId);
    header("location:ArtigoList.php");
}




//echo json_encode($arr);

//var_dump($_SESSION);