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


$dom->appendChild($root);

# Para salvar o arquivo, descomente a linha

//$dom->save( "evento.xml");
        #cabeçalho da página

header("Content-Type: text/xml");
//
//        # imprime o xml na tela
//
print $dom->saveXML();

