<?php
require_once './actions/aEvt_Evento.php';
$EventoID = $_GET['eventoid'];
$evento = new aEvt_Evento();
$evento->setID_EVT($EventoID);
$evento->load();
$NomeEvt = $evento->getDSC_Nome();
#versao do encoding xml
$dom = new DOMDocument("1.0", "windows-1252");
//$dom = new DOMDocument("1.0", "ISO-8859-1");
#retirar os espacos em branco
$dom->preserveWhiteSpace = true;
#gerar o codigo
$dom->formatOutput = true;
#criando o nó principal (DadosCMATO)
$root = $dom->createElement("DadosCMATO");
#setanto nomes e atributos dos elementos xml (nós)
$nomeEvento = $dom->createElement("nomeEvento", $evento->getDSC_Nome());
date_default_timezone_set('America/Belem');
$dataAtual = date('d/m/Y h:i:s a', time());
$dataHoraGeracao = $dom->createElement("dataHoraGeracao", $dataAtual);
$participantes = $dom->createElement("participantes");
$boletos = $dom->createElement("boletos");
$root->appendChild($nomeEvento);
$root->appendChild($dataHoraGeracao);
$root->appendChild($nomeEvento);
//foreach para popular a tag participanteTO
$listaDadosParticipante = $evento->SelectXML($EventoID);
foreach ($listaDadosParticipante as $dadosParticipante){
    $ParticipanteTO = $dom->createElement("ParticipanteTO");
    
    $cpf = $dom->createElement("cpf",$dadosParticipante['COD_CPF']);
    $nomeCompleto = $dom->createElement("nomeCompleto",$dadosParticipante['NOME_COMPLETO']);
    $nomeCracha = $dom->createElement("nomeCracha",$dadosParticipante['nomeCracha']);
    $email = $dom->createElement("email",$dadosParticipante['DSC_EMAIL']);
    $telefone = $dom->createElement("telefone", $dadosParticipante['NUM_Fone']);
    $celular = $dom->createElement("celular", $dadosParticipante['NUM_Celular']);
    $endereco = $dom->createElement("endereco", $dadosParticipante['DSC_Endereco']);
    $bairro = $dom->createElement("bairro", $dadosParticipante['DSC_Bairro']);
    $cep = $dom->createElement("cep", $dadosParticipante['NUM_CEP']);
    $cidade = $dom->createElement("cidade", $dadosParticipante['DSC_Cidade']);
    $uf = $dom->createElement("uf", $dadosParticipante['UF']);
    $categoria = $dom->createElement("descCategoria", $dadosParticipante['categoria']);
    $profissao = $dom->createElement("profissao", $dadosParticipante['profissao']);
    $DSC_Profissao_Especialidade = $dom->createElement("especialidade", $dadosParticipante['DSC_Profissao_Especialidade']);
    $Conselho = $dom->createElement("conselho", '');
    $vlr_total = $dom->createElement("valorTotal", $dadosParticipante['VLR_Total']);
    
    $ParticipanteTO->appendChild($cpf);
    $ParticipanteTO->appendChild($nomeCompleto);
    $ParticipanteTO->appendChild($nomeCracha);
    $ParticipanteTO->appendChild($email);
    $ParticipanteTO->appendChild($telefone);
    $ParticipanteTO->appendChild($celular);
    $ParticipanteTO->appendChild($endereco);
    $ParticipanteTO->appendChild($bairro);
    $ParticipanteTO->appendChild($cep);
    $ParticipanteTO->appendChild($cidade);
    $ParticipanteTO->appendChild($uf);
    $ParticipanteTO->appendChild($categoria);
    $ParticipanteTO->appendChild($profissao);
    $ParticipanteTO->appendChild($DSC_Profissao_Especialidade);
    $ParticipanteTO->appendChild($Conselho);
    $ParticipanteTO->appendChild($vlr_total);
    
    
    $participantes->appendChild($ParticipanteTO);
    
}
$root->appendChild($participantes);
//foreach para popular a tag boletos
$listaDadosBoleto = $evento->SelectXMLBoelto($EventoID);
foreach ($listaDadosBoleto as $dadosBoleto) {
    $BoletoTO = $dom->createElement("BoletoTO");
    
    $tipoInscricao = $dom->createElement("tipoInscricao", 1);
    $codigoInscricaoSacado = $dom->createElement("codigoInscricaoSacado", 0);
    $nossoNumero = $dom->createElement("nossoNumero", 0);
    $numeroParcela = $dom->createElement("numeroParcela", $dadosBoleto['QTD_Parcelas']);
    $valor = $dom->createElement("valor", $dadosBoleto['VLR_Transacao']);
    $situacaoPagamento = $dom->createElement("situacaoPagamento", $dadosBoleto['situacao']);
    $dataEmissao = $dom->createElement("dataEmissao", $evento->dateTimeToBR($dadosBoleto['DT_Transacao']));
    $dataPagamento = $dom->createElement("dataPagamento", '00/00/0000');
    
}
$root->appendChild($boletos);
$dom->appendChild($root);
# Para salvar o arquivo, descomente a linha
//$dom->save( "./Arquivos_XML/evento_"+$NomeEvt+".xml");
$dom->save("./Arquivos_XML/"."Evento_".$NomeEvt.".xml");
        #cabeçalho da página
//header("Content-Type: text/xml");
//
//        # imprime o xml na tela
//
//print $dom->saveXML();