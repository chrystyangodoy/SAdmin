<?php 

// vamos incluir o arquivo para impressão do código de barras desenvolvido pelo indiano Raj Trivedi.
require_once('barcode.inc.php');

//vamos precisar alimentar o boleto com algumas informações, isso pode vir de um  banco de dados, de um webservice, via post ou get...Cabe a você escolher, neste caso
// vem de um formulário via post:

$numeroNota 		    = $_POST['Numero'];
$nossoNumero			= $_POST['NossoNumero'];
$NomeCobranca 			= $_POST['NomeCobranca'];
$linhaDigitavel 		= $_POST['LinhaDigitavelBoleto'];//Implementar externo...
$CodigoCobranca 		= $_POST['CodigoCobranca'];
$dataVencimento 		= $_POST['DataVencimento'];
$numeroDocumento 		= $numeroNota.'-'.$_POST['Parcela'];
$dataProcessamento 		= $_POST['DataEmissao'];
$valorDocumento 		= $_POST['Valor'];
$NomeFantasia 			= $_POST['NomeFantasia'];
$RazaoSocial			= $_POST['RazaoSocial'];
$Endereco  				= $_POST['Endereco'] ;
$Municipio 				= $_POST['Municipio']  ;
$UF 					= $_POST['UF']  ;
$Codigo                 = $_POST['Codigo']  ;
$CpfCnpj 				= $_POST['CpfCnpj']  ;
$CEP					= $_POST['CEP']  ;
$codigoBarras 			= $_POST['CodigoBarrasBoleto']  ;

/*Essas informações de cobrança são pertinentes a um sistema de cobrança específico, que ja emite dados como linha digitável
 e retorna informações da nota fiscal, nosso numero, que são informações da empresa que esta apta a receber pagamentos via boleto bancário
 , isto é , ela esta habilitada pelo  banco que é cliente a receber pagamentos via boleto  */

// corrigindo o campo data para o formato dia/mês/ano pois nesse caso a data vem no padrão americano.
$dataVencimento = date('d/m/Y', strtotime($dataVencimento));
$dataProcessamento = date('d/m/Y', strtotime($dataProcessamento));

//Chamando a funçao que gera código de barras parametro 1 = gera arquivo, 0 = exibe na tela, o 4º e 5º parametro são o tamanho do código de barras em pixels(largura e altura))

new barCodeGenrator($codigoBarras,1,$numeroNota.'codigo_de_barras.gif', 434.645669291, 56.692913386, false); 

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="AUTOR" content="D2th3" />
<title>Boleto  </title>

<style type="text/css">
#boleto_parceiro {
	height: 85px;
	width: 666px;
	font-family: Arial, Helvetica, sans-serif;
	margin-bottom: 15px;
	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #000000;
}
.am {
	font-size: 9px;
	color: #333333;
	height: 10px;
	font-weight: bold;
	margin-bottom: 2px;
	text-align: center;
	width: 320px;
	border-top-width: 1px;
	border-right-width: 2px;
	border-left-width: 2px;
	border-top-style: solid;
	border-right-style: solid;
	border-left-style: solid;
	border-top-color: #000000;
	border-right-color: #000000;
	border-left-color: #000000;
}
#boleto{
	height: 416px;
	width: 666px;
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}

#tb_logo {
	height: 40px;
	width: 666px;
	border-bottom-width: 2px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
#tb_logo #td_banco {
	height: 22px;
	width: 53px;
	border-right-width: 2px;
	border-left-width: 2px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #000000;
	border-left-color: #000000;
	font-size: 15px;
	font-weight: bold;
	text-align: center;
}
.ld {font: bold 15px Arial; color: #000000}
.td_7_sb {
	height: 26px;
	width: 7px;
}
.td_7_cb {
	width: 7px;
	border-left-width: 1px;
	border-left-style: solid;
	border-left-color: #000000;
	height: 26px;
}
.td_2 {
	width: 2px;
}
.tabelas td{
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
.direito {
	width: 178px;
}
.titulo {
	font-size: 7px;
	color: #333333;
	height: 10px;
	font-weight: bold;
	margin-bottom: 2px;
}
.var {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	height: 13px;
}
.direito .var{
	text-align: right;
}
</style>
</head>

<body>
<div id="boleto_parceiro">

  <table style="width:666px; height:28px; border-bottom:solid; border-bottom-color:#000000; border-bottom-width:2px; border-top:solid; border-top-color:#000000; border-top-width:2px; margin-bottom: 5px;" border="0" cellspacing="0" cellpadding="0">
    
  <tr>
    <td class="td_7_sb">&nbsp;</td>
    <td><div class="titulo">NOSSO N&Uacute;MERO</div>
    <!-- Aqui imprimimimos o campo nosso numero que é informado pelo banco que a empresa é correntista-->
      <div class="var"><?php echo $nossoNumero; ?></div></td>
    <td class="td_7_cb">&nbsp;</td>
    <td><div class="titulo">ESP&Eacute;CIE.</div>
      <div class="var">R$</div></td>
    <td class="td_7_cb">&nbsp;</td>
    <td><div class="titulo">QUANTIDADE</div>
      <div class="var">&nbsp;</div></td>
    <td class="td_7_cb">&nbsp;</td>
    <td><div class="titulo">VALOR DOCUMENTO</div>
      <div class="var"></div></td>
    <td class="td_7_cb">&nbsp;</td>
    <td><div class="titulo">ESP&Eacute;CIE DOC.</div>
      <div class="var">DM</div></td>
    <td class="td_7_cb">&nbsp;</td>
    <td><div class="titulo">AG&Ecirc;NCIA / C&Oacute;DIGO DO CEDENTE</div>
     <!-- Aqui imprimimimos o numero da conta bancária de acordo com o banco que recebemos como cobrança-->
      <div class="var" style="text-align:right"><?php if($NomeCobranca == 'BANCO BRADESCO'){
			echo '1234-5/ 112345-0';
				}
			    if($NomeCobranca == 'BANCO SAFRA'){
				echo '02000/ 0123';
				}
				if($NomeCobranca == 'BANCO ITAÚ'){
				echo '2938 / 0000';
				}
				if($NomeCobranca == 'BANCO DO BRASIL'){
				 echo '3222-0 / 00001';
				}
				if($NomeCobranca == '033'){
				 echo '140 / 0002';
				 }
				 if($NomeCobranca == '399'){
				 echo '0198/ 0003';
				 }
				 
	  ?></div></td>
    <td class="td_2">&nbsp;</td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <td><div class="titulo">SACADOR / AVALISTA</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_7_sb">&nbsp;</td>
      <td valign="top" style="width:320px;"><div class="am">AUTENTICA&Ccedil;&Atilde;O 
		  MEC&Acirc;NICA</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
  </table>
</div>
<div id="boleto">
  <table border="0" cellpadding="0" cellspacing="0" id="tb_logo">
    <tr>
      <td rowspan="2" valign="bottom" style="width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
	  <strong>&nbsp;<?php echo str_replace("BANCO","",$NomeCobranca);  ?></strong></td>
      <td align="center" valign="bottom" style="font-size: 7px; border:none;">
	  </td>
      <td rowspan="2" align="right" valign="bottom" style="width:6px;"></td>
      <td rowspan="2" align="right" valign="bottom" style="font-size: 15px; font-weight:bold; width:445px;"><span class="ld">
<!-- Aqui imprimimos a linha digitavel que pode ser calculada,neste caso é informada via post -->	
  <?php echo $linhaDigitavel ; ?></span></td>
      <td rowspan="2" align="right" valign="bottom" style="width:2px;"></td>
    </tr>
    <tr>
    <!-- Aqui imprimimos o código de cobrança -->
      <td id="td_banco"><?PHP echo $CodigoCobranca ;?></td>
    </tr>
  </table>
  <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb" style="height: 27px"></td>
      <td style="width: 468px; height: 27px;"><div class="titulo">LOCAL DO 
		  PAGAMENTO</div>
      <div class="var"><strong>PAG&Aacute;VEL EM QUALQUER BANCO AT&Eacute; O VENCTO, AP&Oacute;S SOMENTE SAFRA</strong></div></td>
      <td class="td_7_cb" style="height: 27px"></td>
      <td class="direito" style="height: 27px"><div class="titulo">VENCIMENTO</div>
      <!-- Aqui imprimimos a data de vencimento do boleto -->
        <div class="var"><?php echo $dataVencimento ;?></div></td>
      <td class="td_2" style="height: 27px"></td>
    </tr>
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <td><div class="titulo">CEDENTE</div>
      <div class="var">COML XYZ DAS QUANTAS ATAC DISTR LTDA</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">AG&Ecirc;NCIA / C&Oacute;DIGO DO CEDENTE</div>
      <div class="var"><?php if($NomeCobranca == 'BANCO BRADESCO'){
			echo '1234-5/ 112345-0';
				}
			    if($NomeCobranca == 'BANCO SAFRA'){
				echo '02000/ 0123';
				}
				if($NomeCobranca == 'BANCO ITAÚ'){
				echo '2938 / 0000';
				}
				if($NomeCobranca == 'BANCO DO BRASIL'){
				 echo '3222-0 / 00001';
				}
				if($NomeCobranca == '033'){
				 echo '140 / 0002';
				 }
				 if($NomeCobranca == '399'){
				 echo '0198/ 0003';
				 }
				 
	  ?></div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <td style="width:103px;"><div class="titulo">DATA DOCUMENTO</div>
      <!-- Aqui imprimimos a data atual em que o boleto é emitido pelo cliente -->
        <div class="var"><?php echo date('d/m/Y');?></div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:133px;"><div class="titulo">N&Uacute;MERO DOCUMENTO</div>
      <div class="var"><?php echo $numeroDocumento; ?></div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:62px;"><div class="titulo">ESP&Eacute;CIE DOC.</div>
      <div class="var">DM</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:34px;"><div class="titulo">ACEITE</div>
      <div class="var">SIM</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:103px;"><div class="titulo">DATA PROCESSAMENTO</div>
      <!-- Aqui imprimimos a data de processamento, uma informação vinda via post  -->
      <div class="var"><?php echo $dataProcessamento; ?></div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">NOSSO N&Uacute;MERO</div>
      <div class="var">/ <?php echo $nossoNumero; ?></div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
  </table>
  <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <td style="width:118px;"><div class="titulo">USO BANCO</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_7_cb" style="width: 6px">&nbsp;</td>
      <td style="width:55px;"><div class="titulo">CARTEIRA</div>
      <div class="var">02</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:55px;"><div class="titulo">ESP&Eacute;CIE</div>
      <div class="var">R$</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:104px;"><div class="titulo">QUANTIDADE</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td style="width:103px;"><div class="titulo">Valor</div>
      <div class="var"></div></td>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">VALOR DO DOCUMENTO</div>
      <!-- Aqui imprimimos o valor do documento via post-->
      <div class="var"><?php echo $valorDocumento ; ?></div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
  </table>
  <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="5" class="td_7_sb">&nbsp;</td>
      <td rowspan="5" valign="top"><div class="titulo" style="margin-bottom:18px;">
		  Instruç&otilde;es (texto de responsabilidade do Cedente)</div>
        <div class="var"><strong>JUROS POR DIA DE ATRASO: R$3,10</strong><br />
        	<strong>SER&Aacute; PROTESTADO AP&Oacute;S 5 DIAS DO VENCIMENTO</strong><BR/>
        	<strong>-->ATEN&Ccedil;&Atilde;O: N&Atilde;O PAGUE AO REPRESENTANTE<--</strong><br/>
        	<strong>D&Uacute;VIDAS LIGUE:(11)1234-4655 DPTO COBRAN&Ccedil;A</strong><BR/>
        	<strong>EMAIL: cobranca@comercialxyz.com.br</strong><br/>
        	<strong>Este boleto representa duplicata cedida fiduciariamente ao <?php echo $NomeCobranca ; ?>, ficando</strong><br/>
        	<strong>vedado o pagamento de qualquer outra forma que n&atilde;o atrav&eacute;s do presente boleto.</strong></div>
      </td>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">(-) DESCONTO / ABATIMENTO</div>
      <div class="var">0,00</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
    <tr>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">(-) OUTRAS DEDU&Ccedil;&Otilde;ES</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
    <tr>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">(+) MULTA / MORA</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
    <tr>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">(+) OUTROS ACR&Eacute;SCIMOS</div>
      <div class="var">0,00</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
    <tr>
      <td class="td_7_cb">&nbsp;</td>
      <td class="direito"><div class="titulo">(=) VALOR COBRADO</div>
      <div class="var">&nbsp;</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
  </table>
  <table class="tabelas" style="width:666px; height:65px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <td valign="top"><div class="titulo">SACADO</div>
      <!-- agora vamos imprimir as informações do Sacado, quem vai pagar o boleto -->
        <div class="var" style="margin-bottom:5px; height:auto"><?php echo $RazaoSocial; ?><br />
        	<?php echo utf8_encode($Endereco); ?><br />
        	<?php echo utf8_encode($Municipio); ?>/<?php echo $UF ;?> - CEP: <?PHP echo $CEP ;  ?></div>
        <div class="titulo">SACADOR / AVALISTA</div></td>
      <td class="td_7_sb">&nbsp;</td>
      <td class="direito" valign="top"><div class="titulo">CPF / CNPJ</div>
        <div class="var" style="text-align:left;"><?php echo $Codigo ; ?> <br/><?php echo $CpfCnpj ?></div></td>
      <td class="td_2"></td>
    </tr>
  </table>
  <table style="width:666px; border-top:solid; border-top-width:2px; border-top-color:#000000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb">&nbsp;</td>
      <!-- agora iremos imprimir a imagem do codigo de barras do boleto gerada pela função barCodeGenrator na linha 38-->
      <td style="width: 417px; height:62px;"><?php echo '<img src='.$numeroNota.'codigo_de_barras.gif >'?></td>
      <td class="td_7_sb">&nbsp;</td>
      <td valign="top"><div class="titulo" style="text-align:left;">AUTENTICA&Ccedil;&Atilde;O 
		  MEC&Acirc;NICA/ FICHA DE COMPENSA&Ccedil;&Atilde;O</div></td>
      <td class="td_2">&nbsp;</td>
    </tr>
  </table>
  <br/>
  
</div>
<div>
 <br/>
	
	
</div>
</body>
</html>