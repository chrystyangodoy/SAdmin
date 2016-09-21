<?php
session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_POST['Enviar'])) {
    //$ID_EVT = $_REQUEST['ID_EVT_Evento_Pariticipante'];
    
    require_once './config/configs.php';
    $config = new configs();
    $idUnico = $config->idUnico();
    
    require_once './actions/aTb_submissao_doctos.php';
    $subDoctos = new aTb_submissao_doctos();

    $arquivo_temp = $_FILES["dados_documento"]["tmp_name"];
    $nome_arquivo = $_FILES["dados_documento"]["name"];

    $arquivo = isset($_FILES["dados_documento"]) ? $_FILES["dados_documento"] : FALSE;

    if ($arquivo) {
        $fp = fopen($arquivo_temp, "rb");
        $dados_documento = fread($fp, filesize($arquivo_temp));
        fclose($fp);

        $descricao = $nome_arquivo;
        $dados = bin2hex($dados_documento);

        $subDoctos->setCOD_Submissao($idUnico);
        $subDoctos->setNome_Docto($nome_arquivo);
        $subDoctos->setAssunto($descricao);
        $subDoctos->setParecer('');
        $subDoctos->setDocumento($dados);
        $subDoctos->setData_Envio(date("Y/m/d"));
        $subDoctos->setIdioma_Documento('');
        $subDoctos->setID_Usuario('');
        $subDoctos->setCOD_Participante('');
        $subDoctos->setID_EVT('$ID_EVT');
        $subDoctos->insert();
        $codInsercao = $subDoctos->getCOD_Submissao();
    }
    if ($codInsercao != 0 or $codInsercao != NULL) {
        $FeedbackMessage->setMsg("Artigo enviado com sucesso!");
        //header('location:AreaUsuario.php');
        
    }
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
//$smarty->assign("lista",$Artigo->select());

$smarty->assign("Titulo", " - Submeter de Artigo.");
$smarty->display('./View/ArtInsPopUp.html');
