<?php

// | Captura de informações para geração do boleto                                                          |
// | require_once das actions necessárias  
require_once './actions/aEvt_Evento.php';
require_once './actions/aEvt_Evento_Participante.php';
require_once './actions/aBsc_Local_Evento.php';
require_once './actions/aBsc_Banco.php';
require_once './actions/aEvt_Pagamento.php';

$ID_Evt_Partic = $_SESSION['ID_Evt_Part'];
//$ID_Evt_Partic = 'd12341f3a8ad02ead64066d7dc11feba';
$ID_PagtoParcela = $_SESSION['ID_PagtoParc'];

$Evento = new aEvt_Evento();
$DadosEvento = new aEvt_Evento_Participante();
$LocalEvento = new absc_local_evento();
$Banco = new aBsc_Banco();
$Pagamento = new aEvt_Pagamento();
//==== GET DADOS DO EVENTO ==================
//==== Carga dos Dados do Evento ============
$DadosEvento->setID_EVT_Evento_Pariticipante($ID_Evt_Partic);
$DadosEvento->load();

$Evento->setID_EVT($DadosEvento->getID_EVT_Evento());
$Evento->load();

$CodBanco = $Evento->getID_Banco();
if ($CodBanco == 0 || $CodBanco == NULL) {
    $Banco->setID('1');
} else {
    $Banco->setID($CodBanco);
}
$Banco->load();

if ($ID_PagtoParcela <> 0 or $ID_PagtoParcela <> NULL) {
    $Pagamento->setID_Pagamento($ID_PagtoParcela);
    $Pagamento->loadIDPagto();
} else {
    $Pagamento->setID_EVT_Evento($ID_Evt_Partic);
    $Pagamento->loadIDEvento();
}

$DadosEvento->SelectInfoBoleto($ID_Evt_Partic);

$LocalEvento->setID_Local($Evento->getID_BSC_Local_Evento());
$LocalEvento->load();

require_once ('./actions/aBsc_Participante.php');
$Partic = new aBsc_Participante();
// +--------------------------------------------------------------------------------------------------------+
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 0.00;
$data_emissão = date("d/m/Y", strtotime("now"));
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
//Data de vencimento a partir da data do Fim do período de inscrição do Evento.
//$data_venc = $Evento->getDT_Fim();
$data_venc = $Pagamento->getDT_Transacao(False);
//$valor_cobrado = $Pagamento->getVLR_Transacao(); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
//Informação capturada a partir do evento participante
if ($ID_PagtoParcela <> 0 or $ID_PagtoParcela <> NULL) {
    $valor_cobrado = $Pagamento->getVLR_Transacao();
} else {
    $valor_cobrado = $DadosEvento->getVLR_Total_Inscricao();
}
// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

require_once ('./actions/aEvt_Pagamento_Boleto.php');
$evtPagtoBoleto = new aEvt_Pagamento_Boleto();

if ($ID_PagtoParcela <> 0 or $ID_PagtoParcela <> NULL) {
    $evtPagtoBoleto->setID_EVT_Pagamento($ID_PagtoParcela);
    $evtPagtoBoleto->loadEvtPagto();
    
    $nosso_numero = $evtPagtoBoleto->getNUM_Boleto();
} else {
    $nosso_numero = $Banco->getnumero_documento(); // Usaremos o mesmo campo para Nosso número e Número de Documento pois sempre serão números sequênciais.    
}
//PEDIDO ATUAL - 
$nroParcela = $Pagamento->getNUM_Parcelas();
//PEDIDO ATUAL - FINAL
$dadosboleto["nosso_numero"] = $nosso_numero;
$dadosboleto["numero_documento"] = $nosso_numero." / ".$nroParcela; // Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = $data_emissão; // Data de emissão do Boleto
$dadosboleto["data_processamento"] = $data_emissão; // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
// DADOS DO SEU CLIENTE
$IDParticipante = $DadosEvento->getID_BSC_Participante();
$Partic->setID_Participante($IDParticipante);
$Partic->load();

$dadosboleto["sacado"] = $Partic->getDSC_Nome();
$dadosboleto["endereco1"] = $Partic->getDSC_Endereco();
require_once ('./actions/atb_Tipo_Estado.php');
$Estado = new atb_Tipo_Estado();
$Estado->setCOD_TIPOEstado($Partic->getCOD_Tipo_Estado());
$dadosboleto["endereco2"] = $Partic->getDSC_Cidade() . " / " . $Estado->getDSC_Nome() . " - " . $Partic->getNUM_CEP();

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "- Pagamento em qualquer Agência Banco do Brasil";
$dadosboleto["demonstrativo2"] = "- Referênte a inscrição no evento <br>- Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
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
//$dadosboleto["valor_unitario"] = "";
$dadosboleto["valor_unitario"] = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');
$dadosboleto["aceite"] = "N";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";
// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - BANCO DO BRASIL
//$dadosboleto["agencia"] = "08788"; // Num da agencia, sem digito
$dadosboleto["agencia"] = $Banco->getAgencia();
$dadosboleto["agencia"] = str_replace("-", "", $Banco->getAgencia());
//$dadosboleto["conta"] = "26095";  // Num da conta, sem digito
$dadosboleto["conta"] = $Banco->getConta();
$dadosboleto["conta"] = str_replace("-", "", $Banco->getConta());
// DADOS PERSONALIZADOS - BANCO DO BRASIL
//$dadosboleto["convenio"] = "7777777";// Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
$dadosboleto["convenio"] = $Banco->getConvenio();
//$dadosboleto["contrato"] = "999999"; // Num do seu contrato
$dadosboleto["contrato"] = $Banco->getContrato();
//$dadosboleto["carteira"] = "18";
$dadosboleto["carteira"] = $Banco->getCarteira();
//$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)
$dadosboleto["variacao_carteira"] = $Banco->getVariacao_Carteira();
// TIPO DO BOLETO
$dadosboleto["formatacao_convenio"] = "7"; // REGRA: 8 p/ Convênio c/ 8 digitos, 7 p/ Convênio c/ 7 d�gitos, ou 6 se Convênio c/ 6 dígitos
$nro_dig_Convenio = strlen($Banco->getConvenio());
if ($nro_dig_Convenio == 8) {
    $dadosboleto["formatacao_convenio"] = "8";
}
if ($nro_dig_Convenio == 7) {
    $dadosboleto["formatacao_convenio"] = "7";
}
if ($nro_dig_Convenio <= 6) {
    $dadosboleto["formatacao_convenio"] = "6";
}

//$dadosboleto["formatacao_nosso_numero"] = "1"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos
$nro_dig_NossoNumero = strlen($Banco->getnumero_documento());

if ($nro_dig_NossoNumero <= 5) {
    $dadosboleto["formatacao_nosso_numero"] = 1;
} else {
    $dadosboleto["formatacao_nosso_numero"] = 2;
}

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

$IsPromotora = $Evento->getisPromotora();

if ($IsPromotora) {
    $NomeEvento = $Evento->getDSC_Nome();
    $NomeEmpresa = $Evento->getDSC_Nome_Promotora();
    $cnpjEmpresa = $Evento->getCOD_CNPJ_Promotora();
    $Endereço = $LocalEvento->getDSC_Nome() . " - " . $LocalEvento->getDSC_Endereco() . " - " . $LocalEvento->getDSC_Bairro() . " Telefone: " . $LocalEvento->getNUM_Fone();
    $CidadeEstado = $LocalEvento->getDSC_Cidade();
    $EndereçoEvento = $LocalEvento->getDSC_Nome() . " - " . $LocalEvento->getDSC_Endereco() . " - " . $LocalEvento->getDSC_Bairro() . " Telefone: " . $LocalEvento->getNUM_Fone();
    $CidadeEstadoEvento = $LocalEvento->getDSC_Cidade();
} else {
    $IDEmpresa = $Evento->getID_Empresa();
    $NomeEvento = $Evento->getDSC_Nome();

    require './actions/aBsc_Empresa.php';

    $Empresa = new aBsc_Empresa();
    $Empresa->setID_Empresa($IDEmpresa);
    $Empresa->load();

    $NomeEmpresa = $Empresa->getDSC_RazaoSocial();
    $cnpjEmpresa = $Empresa->getCOD_CNPJ();
    $EndereçoEvento = $LocalEvento->getDSC_Nome() . " - " . $LocalEvento->getDSC_Endereco() . " - " . $LocalEvento->getDSC_Bairro() . " Telefone: " . $LocalEvento->getNUM_Fone();
    $CidadeEstadoEvento = $LocalEvento->getDSC_Cidade();
}
$nroIncricao = $DadosEvento->getNum_Inscricao();
// SEUS DADOS
$dadosboleto["identificacao"] = $NomeEvento . " (" . $NomeEmpresa . ")";
$dadosboleto["cpf_cnpj"] = $cnpjEmpresa; //Colocar o CNPJ da Empresa
$dadosboleto["endereco"] = $EndereçoEvento;
$dadosboleto["cidade_uf"] = $CidadeEstadoEvento;
$dadosboleto["NomeEvento"] = $NomeEvento;
$dadosboleto["NroInscEvento"] = $nroIncricao;
$dadosboleto["cedente"] = $NomeEmpresa;

// NÃO ALTERAR!
include("include/funcoes_bb.php");
include("include/layout_bb.php");
