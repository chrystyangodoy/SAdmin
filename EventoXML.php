<?php

require_once './actions/aEvt_Evento.php';

$EventoID = $_GET['eventoid'];

$evento = new aEvt_Evento();

$evento->setID_EVT($EventoID);

$evento->load();

#versao do encoding xml
$dom = new DOMDocument("1.0", "windows-1252");
#retirar os espacos em branco
$dom->preserveWhiteSpace = false;
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
$root->appendChild($participantes);
$root->appendChild($boletos);



$listaDadosParticipante = $evento->SelectXML($EventoID);

foreach ($listaDadosParticipante as $dadosParticipante){
    $ParticipanteTO = $dom->createElement("ParticipanteTO");
    
    $cpf = $dom->createElement("cpf",$dadosParticipante['COD_CPF']);
    $nomeCompleto = $dom->createElement("nomeCompleto",$dadosParticipante['NOME_COMPLETO']);
    $nomeCracha = $dom->createElement("nomeCracha",$dadosParticipante['nomeCracha']);
    $email = $dom->createElement("email",$dadosParticipante['DSC_EMAIL']);
    
    
}




$dom->appendChild($root);

# Para salvar o arquivo, descomente a linha

$dom->save( "evento.xml");
//        #cabeçalho da página
//
//header("Content-Type: text/xml");
////
////        # imprime o xml na tela
////
//print $dom->saveXML();

