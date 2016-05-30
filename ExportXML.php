<?php
//mysql_connect('localhost', 'root', '') or die ('Erro ao conectar');
//mysql_select_db('SIGA_web') or die ('Erro ao conectar com o banco de dados');

require_once './actions/aEvt_Evento.php';

$EventoID = $_GET['eventoid'];

$evento = new aEvt_Evento();

$evento->setID_EVT($EventoID);

$Listars = $evento->load();

$xml = "<?xml version='1.0' encoding='UTF-8'?>n";//cabeçalho do arquivo
       $xml .= "<SIGAWEB> n";
       foreach ($Listars as $rs){
       //while($rs){
           $xml .= "t<Evento>n";
           $xml .= "tt<nomeEvento>$rs->nomeEvento</nomeEvento>n";
           $xml .= "t</Evento>n";
       }
       $xml .= "</SIGAWEB>";
       $ponteiro = fopen('backup.xml', 'w'); //cria um arquivo com o nome backup.xml
       fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml
       $ponteiro = fclose($ponteiro); //fecha o arquivo
?>