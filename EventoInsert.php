<?php

session_start();
include_once './config/ValidaSessao.php';

require_once 'smarty.php';
require_once ('./config/configs.php');
require_once './actions/aEvt_Evento.php';
require_once './actions/aBsc_Local_Evento.php';
require_once './actions/atb_Tipo_Estado.php';
require_once './actions/aBsc_Banco.php';
require_once './config/FeedbackMessage.php';


$FeedbackMessage = new FeedbackMessage();

$evento = new aEvt_Evento();
$localevento = new aBsc_Local_Evento();
$tipoestado = new atb_Tipo_Estado();
$banco = new aBsc_Banco();

$config = new configs();

if (isset($_POST['Cadastrar']))
{
    $idUnico = $config->idUnico();

    $evento->setID_EVT($idUnico);
    $evento->setDSC_Nome($_POST['DSC_Nome']);
    $evento->setDSC_Presidente($_POST['DSC_Presidente']);
    $evento->setDT_Inicio($_POST['DT_Inicio']);
    $evento->setDT_Fim($_POST['DT_Fim']);
    $evento->setCOD_CNPJ_Promotora($_POST['COD_CNPJ_Promotora']);
    $evento->setDSC_Nome_Promotora($_POST['DSC_Nome_Promotora']);
    $evento->setDSC_Presidente_Promotora($_POST['DSC_Presidente_Promotora']);
    $evento->setDSC_Endereco_Promotora($_POST['DSC_Endereco_Promotora']);
    $evento->setNUM_CEP_Promotora($_POST['NUM_CEP_Promotora']);
    $evento->setDSC_Cidade_Promotora($_POST['DSC_Cidade_Promotora']);
    $evento->setNUM_Fone_Promotora($_POST['NUM_Fone_Promotora']);
    $evento->setNUM_FAX_Promotora($_POST['NUM_FAX_Promotora']);
    $evento->setDSC_EMAIL_Promotora($_POST['DSC_EMAIL_Promotora']);
    $evento->setQTD_CargaHorariaMinima($_POST['QTD_CargaHorariaMinima']);
    $evento->setID_BSC_Local_Evento($_POST['ID_BSC_Local_Evento']);
    $evento->setCOD_Tipo_Estado_promotora($_POST['COD_Tipo_Estado_promotora']);
    $evento->setisPromotora($_POST['isPromotora']);
    $evento->setID_Banco($_POST['ID_Banco']);
    $evento->setID_Empresa($_POST['ID_Empresa']);

    if (isset($_FILES['Logo_Evento']['name']) && $_FILES["Logo_Evento"]["error"] == 0)
    {
        $FeedbackMessage->setMsg("Você enviou o arquivo: <strong>" . $_FILES['Logo_Evento']['name'] . "</strong><br />");
        //echo "Você enviou o arquivo: <strong>" . $_FILES['Logo_Evento']['name'] . "</strong><br />";
        $FeedbackMessage->setMsg("Este arquivo é do tipo: <strong>" . $_FILES['Logo_Evento']['type'] . "</strong><br />");
        //echo "Este arquivo é do tipo: <strong>" . $_FILES['Logo_Evento']['type'] . "</strong><br />";
        $FeedbackMessage->setMsg("Temporáriamente foi salvo em: <strong>" . $_FILES['Logo_Evento']['tmp_name'] . "</strong><br />");
        //echo "Temporáriamente foi salvo em: <strong>" . $_FILES['Logo_Evento']['tmp_name'] . "</strong><br />";
        $FeedbackMessage->setMsg("Seu tamanho é: <strong>" . $_FILES['Logo_Evento']['size'] . "</strong> Bytes<br /><br />");
        //echo "Seu tamanho é: <strong>" . $_FILES['Logo_Evento']['size'] . "</strong> Bytes<br /><br />";

        $arquivo_tmp = $_FILES['Logo_Evento']['tmp_name'];
        $nome = $_FILES['Logo_Evento']['name'];
        // Pega a extensao
        $extensao = strrchr($nome, '.');
        // Converte a extensao para mimusculo
        $extensao = strtolower($extensao);
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfilero as extesões permitidas e separo por ';'
        // Isso server apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao))
        {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            $novoNome = md5(microtime()) . $extensao;
            // Concatena a pasta com o nome
            $destino = 'imgEvento/' . $novoNome;
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino))
            {
                $FeedbackMessage->setMsg("Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br/>");
                //echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
                //echo "<img src=" . $destino . "/>";
            }
            else
                $FeedbackMessage->setMsg("Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.");
        }
        else
            $FeedbackMessage->setMsg("Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png.");
    }
    else
    {
        $FeedbackMessage->setMsg("Você não enviou nenhum arquivo!");
    }
    //$evento->setLogo_Evento($_POST['Logo_Evento']);
    $evento->setLogo_Evento($destino);
    $evento->insert();

    $FeedbackMessage->setMsg("Evento inserido com sucesso!");
    header('location:EventoList.php');
}

$smarty->assign("dscUser", $_SESSION['DSC_Login']);
$smarty->assign("listLocal", $localevento->select());
$smarty->assign("listTpUF", $tipoestado->select());
$smarty->assign("listBanco", $banco->select());
$smarty->assign("msg", $FeedbackMessage->getMsg());
$smarty->assign("type", $FeedbackMessage->getType());
$smarty->assign("Titulo", " - Inserir Evento.");
$smarty->display('./View/EventoInsert.html');
