<?php
require_once './config/configs.php';
$config = new configs();
$idUnico = $config->idUnico();

$arquivo_temp = $_FILES["dados_documento"]["tmp_name"];
$nome_arquivo = $_FILES["dados_documento"]["name"];

$arquivo = isset($_FILES["dados_documento"]) ? $_FILES["dados_documento"] : FALSE;

if ($arquivo) {
    $fp = fopen($arquivo_temp, "rb");
    $dados_documento = fread($fp, filesize($arquivo_temp));
    fclose($fp);

    $descricao = $dados['descricao_documento'];
    $dados = bin2hex($dados_documento);

    //$sql = "INSERT INTO documentos (nome_documento, descricao_documento, tamanho_documento, dados_documento)
    //        VALUES ('$nome_arquivo', '$descricao', '$tamanho_documento', '$dados')";
    $sql = "INSERT INTO tb_submissao_doctos (COD_Submissao, Nome_Docto, Assunto, Parecer,
              Data_Envio, Idioma_Documento, ID_Usuario, COD_Participante, ID_EVT) 
              VALUES ('$idUnico', '$nome_arquivo','$descricao', 'Parecer', '01-09-2016', 'Português', '52863298291', '', '2')";
    mysql_select_db($database, $con);
    $result = mysql_query($sql, $con) or die(mysql_error());
}
?>