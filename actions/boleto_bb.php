<?php

// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +--------------------------------------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>              		             				|
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rogério Dias Pereira|
// +--------------------------------------------------------------------------------------------------------+
// +--------------------------------------------------------------------------------------------------------+
// | Captura de informações para geração do boleto                                                          |
// | require_once das actions necessárias  
require_once './actions/aBsc_Banco.php';
$Banco = new aBsc_Banco();
require_once './actions/aEvt_Pagamento.php';
$Pagamento = new aEvt_Pagamento();

require_once './actions/aEvt_Evento_Participante.php';
$DadosEvento = new aEvt_Evento_Participante();

$ID_Evt_Partic = $_SESSION['ID_Evt_Part'];
//$ID_Evt_Partic = '1788cc65c6afe3c2d8bb2023353a390c';
$DadosEvento->setID_EVT_Evento_Pariticipante($ID_Evt_Partic);
$DadosEvento->load();

$Banco->setID('1');
$Banco->load();

$Pagamento->setID_EVT_Evento($ID_Evt_Partic);
$Pagamento->loadIDEvento();

$DadosEvento->SelectInfoBoleto($ID_Evt_Partic);
require_once ('./actions/aBsc_Participante.php');
$partic = new aBsc_Participante();
require_once ('./actions/aEvt_evento.php');
$Evento = new aEvt_Evento();
$Evento->setID_EVT($DadosEvento->getID_EVT_Evento());
$Evento->load();
require_once ('./actions/absc_local_evento.php');
$LocalEvento = new absc_local_evento();
$LocalEvento->setID_Local($Evento->getID_BSC_Local_Evento());
$LocalEvento->load();
// +--------------------------------------------------------------------------------------------------------+
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$data_emissão = date("d/m/Y", strtotime("now"));
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
//$valor_cobrado = $Pagamento->getVLR_Transacao(); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
//Informação capturada a partir do evento participante
$valor_cobrado = $DadosEvento->getVLR_Total_Inscricao(); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');
$nosso_numero = $Banco->getnumero_documento(); // Usaremos o mesmo campo para Nosso número e Número de Documento pois sempre serão números sequênciais.


$dadosboleto["nosso_numero"] = $nosso_numero;
$dadosboleto["numero_documento"] = $nosso_numero; // Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = $data_emissão; // Data de emissão do Boleto
$dadosboleto["data_processamento"] = $data_emissão; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "Nome do seu Cliente";
$dadosboleto["endereco1"] = "Endereço do seu Cliente";
$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento em qualquer Agência Banco do Brasil";
$dadosboleto["demonstrativo2"] = "Referênte a inscrição no evento <br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "";
//$dadosboleto["demonstrativo2"] = "Referênte a inscrição no evento <br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
//$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
//
// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Não receber após o vencimento";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";
//$dadosboleto["instrucoes2"] = "- Não receber após o vencimento";
//$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
//$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - BANCO DO BRASIL
$dadosboleto["agencia"] = "9999"; // Num da agencia, sem digito
$dadosboleto["conta"] = "99999";  // Num da conta, sem digito
// DADOS PERSONALIZADOS - BANCO DO BRASIL
$dadosboleto["convenio"] = "7777777";  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
$dadosboleto["contrato"] = "999999"; // Num do seu contrato
$dadosboleto["carteira"] = "18";
$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)
// TIPO DO BOLETO
$dadosboleto["formatacao_convenio"] = "7"; // REGRA: 8 p/ Convênio c/ 8 digitos, 7 p/ Convênio c/ 7 d�gitos, ou 6 se Convênio c/ 6 dígitos
$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos

/*
  #################################################
  DESENVOLVIDO PARA CARTEIRA 18

  - Carteira 18 com Convenio de 8 digitos
  Nosso número: pode ser até 9 digitos

  - Carteira 18 com Convenio de 7 dígitos
  Nosso número: pode ser até 10 dígitos

  - Carteira 18 com Convenio de 6 digitos
  Nosso número:
  de 1 a 99999 para opção de até 5 dígitos
  de 1 a 99999999999999999 para opção de até 17 dígitos

  #################################################
 */

$NomeEmpresa = $Evento->getDSC_Nome_Promotora();
$cnpjEmpresa = $Evento->getCOD_CNPJ_Promotora();

$Endereço =  $LocalEvento->getDSC_Nome()." - ".$LocalEvento->getDSC_Endereco()." - ".$LocalEvento->getDSC_Bairro()." Telefone: ".$LocalEvento->getNUM_Fone();
$CidadeEstado = $LocalEvento->getDSC_Cidade();
// SEUS DADOS
$dadosboleto["identificacao"] = $NomeEmpresa;
$dadosboleto["cpf_cnpj"] = $cnpjEmpresa; //Colocar o CNPJ da Empresa
$dadosboleto["endereco"] = $Endereço;
$dadosboleto["cidade_uf"] = $CidadeEstado;
$dadosboleto["cedente"] = $NomeEmpresa;

// NÃO ALTERAR!
include("include/funcoes_bb.php");
include("include/layout_bb.php");
