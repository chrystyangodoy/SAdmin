<?php
session_start();
include_once './config/ValidaSessao.php';
require_once 'smarty.php';
require_once './config/FeedbackMessage.php';
$FeedbackMessage = new FeedbackMessage();

if (isset($_POST['Enviar'])) {
    
    require_once './config/configs.php';
    $config = new configs();
    $idUnico = $config->idUnico();
    
    require_once './actions/aTb_submissao_doctos.php';
    $subDoctos = new aTb_submissao_doctos();
    
    $extensoes = array('pdf', 'doc', 'docx');
    
    $extensao = strtolower(end(explode('.', $_FILES["dados_documento"]["name"])));
    

    $arquivo_temp = $_FILES["dados_documento"]["tmp_name"];
    $nome_arquivo = $_FILES["dados_documento"]["name"];

    $arquivo = isset($_FILES["dados_documento"]) ? $_FILES["dados_documento"] : FALSE;

    if ($arquivo && in_array($extensao, $extensoes)) {
        $fp = fopen($arquivo_temp, "rb");
        $dados_documento = fread($fp, filesize($arquivo_temp));
        fclose($fp);

        $descricao = $nome_arquivo;
//        $dados = addslashes($dados_documento);
        $dados = mysql_real_escape_string($dados_documento);

        $subDoctos->setCOD_Submissao($idUnico);
        $subDoctos->setNome_Docto($nome_arquivo);
        $subDoctos->setAssunto($_POST['descricao']);
        $subDoctos->setParecer(1);
        $subDoctos->setDocumento($dados);
        $subDoctos->setData_Envio(date("Y-m-d"));
        $subDoctos->setIdioma_Documento('');
        $subDoctos->setID_Usuario($_SESSION["ID_Usuario"]);
        $subDoctos->setCOD_Participante('');
        $subDoctos->setID_EVT($_POST['ID_EVT']);
        $subDoctos->insert();
        $codInsercao = $subDoctos->getCOD_Submissao();
        
    }  else {
        echo json_encode(array('erro'=>'Extensão iválida!'));
    }
}


