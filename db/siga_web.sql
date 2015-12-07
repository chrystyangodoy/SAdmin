-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2015 às 17:35
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siga_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_banco`
--

CREATE TABLE IF NOT EXISTS `bsc_banco` (
  `ID` varchar(50) NOT NULL,
  `Dsc_Banco` varchar(60) NOT NULL,
  `Agencia` varchar(100) NOT NULL,
  `Conta` varchar(20) NOT NULL,
  `Cod_Banco` varchar(20) NOT NULL,
  `Convenio` varchar(30) NOT NULL,
  `Contrato` varchar(60) NOT NULL,
  `Carteira` varchar(60) NOT NULL,
  `Variacao_Carteira` varchar(60) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `COD_CNPJ_Promotora` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_empresa`
--

CREATE TABLE IF NOT EXISTS `bsc_empresa` (
  `ID_Empresa` int(11) NOT NULL,
  `COD_CNPJ` varchar(18) NOT NULL,
  `DSC_RazaoSocial` varchar(100) NOT NULL,
  `DSC_Endereco` varchar(120) NOT NULL,
  `DSC_Bairro` varchar(70) NOT NULL,
  `DSC_Cidade` varchar(70) NOT NULL,
  `NUM_CEP` char(8) NOT NULL,
  `NUM_InscricaoEstadual` varchar(15) NOT NULL,
  `NUM_Fone` varchar(10) NOT NULL,
  `NUM_FAX` varchar(10) NOT NULL,
  `DSC_EMAIL` varchar(100) NOT NULL,
  `COD_TipoEstado` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_local_evento`
--

CREATE TABLE IF NOT EXISTS `bsc_local_evento` (
  `ID_Local` varchar(50) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Endereco` varchar(100) NOT NULL,
  `DSC_Bairro` varchar(100) NOT NULL,
  `DSC_Cidade` varchar(100) NOT NULL,
  `NUM_CEO` char(8) NOT NULL,
  `NUM_Fone` varchar(10) NOT NULL,
  `NUM_FAX` varchar(10) NOT NULL,
  `DSC_EMAIL` varchar(100) NOT NULL,
  `DSC_Nome_Contato` varchar(100) NOT NULL,
  `COD_TIPOEstado` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_participante`
--

CREATE TABLE IF NOT EXISTS `bsc_participante` (
  `ID_Participante` varchar(50) NOT NULL,
  `COD_CPF` char(14) NOT NULL,
  `COD_RG` varchar(10) NOT NULL,
  `DSC_Nome` varchar(100) NOT NULL,
  `DSC_Endereco` varchar(300) NOT NULL,
  `DSC_Bairro` varchar(100) NOT NULL,
  `DSC_Cidade` varchar(70) NOT NULL,
  `NUM_CEP` varchar(12) NOT NULL,
  `NUM_Fone` varchar(20) NOT NULL,
  `NUM_Celular` varchar(20) NOT NULL,
  `NUM_FAX` varchar(10) NOT NULL,
  `DSC_Profissao_Especialidade` varchar(120) NOT NULL,
  `DSC_Email` varchar(120) NOT NULL,
  `NUM_Registro` varchar(20) NOT NULL,
  `COD_Tipo_Estado` varchar(50) NOT NULL,
  `ID_BSC_Empresa` int(11) NOT NULL,
  `ID_BSC_Profissao` int(11) NOT NULL,
  `ID_Usuario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_profissao`
--

CREATE TABLE IF NOT EXISTS `bsc_profissao` (
  `ID_Profissao` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_email`
--

CREATE TABLE IF NOT EXISTS `config_email` (
  `ID_Email` varchar(50) NOT NULL,
  `smtp` varchar(100) NOT NULL,
  `Port` varchar(6) NOT NULL DEFAULT '587',
  `remetente` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `isAtivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_ativ_complementar`
--

CREATE TABLE IF NOT EXISTS `evt_ativ_complementar` (
  `COD_ATIV_Complementar` int(11) NOT NULL,
  `DSC_Nome` varchar(150) NOT NULL,
  `DSC_Ministrantes` varchar(600) NOT NULL,
  `QTD_CargaHoraria` decimal(8,2) NOT NULL,
  `DT_Realizacao` date NOT NULL,
  `VLR_Inscricao` decimal(8,2) NOT NULL,
  `QTD_Vagas` int(11) NOT NULL,
  `COD_Tipo_Abordagem_Ativ_Comp` int(11) NOT NULL,
  `ID_BSC_Local_Evento` int(11) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_ativ_comp_categoria`
--

CREATE TABLE IF NOT EXISTS `evt_ativ_comp_categoria` (
  `COD_ATIV_Comp_Categoria` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `VLR_Inscricao` decimal(8,2) NOT NULL,
  `DT_Inicio_Valor` date NOT NULL,
  `DT_Fim_Valor` date NOT NULL,
  `ID_EVT_ATIV_Complementar` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_empenho`
--

CREATE TABLE IF NOT EXISTS `evt_empenho` (
  `ID_Empenho` int(11) NOT NULL,
  `COD_Empenho` varchar(15) NOT NULL,
  `VLR_Total` decimal(8,2) NOT NULL,
  `VLR_Saldo` decimal(8,2) NOT NULL,
  `DSC_Nome_Contato` varchar(70) NOT NULL,
  `DSC_FuncaoContato` varchar(70) NOT NULL,
  `DSC_Departamento_Contato` varchar(50) NOT NULL,
  `NUM_Tel_Contato` varchar(10) NOT NULL,
  `ID_BSC_Empresa` int(11) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_empenho_participante`
--

CREATE TABLE IF NOT EXISTS `evt_empenho_participante` (
  `ID_Empenho_Participante` int(11) NOT NULL,
  `COD_CPF` char(11) NOT NULL,
  `DSC_Nome` varchar(60) NOT NULL,
  `SIT_USUFRUI` char(1) NOT NULL,
  `VLR_Consumido` decimal(8,2) NOT NULL,
  `ID_EVT_Empenho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento`
--

CREATE TABLE IF NOT EXISTS `evt_evento` (
  `ID_EVT` varchar(50) NOT NULL,
  `DSC_Nome` varchar(100) NOT NULL,
  `DSC_Presidente` varchar(100) NOT NULL,
  `DT_Inicio` date NOT NULL,
  `DT_Fim` date NOT NULL,
  `COD_CNPJ_Promotora` char(14) NOT NULL,
  `DSC_Nome_Promotora` varchar(60) NOT NULL,
  `DSC_Presidente_Promotora` varchar(60) NOT NULL,
  `DSC_Endereco_Promotora` varchar(100) NOT NULL,
  `NUM_CEP_Promotora` char(8) NOT NULL,
  `DSC_Cidade_Promotora` varchar(30) NOT NULL,
  `NUM_Fone_Promotora` varchar(10) NOT NULL,
  `NUM_FAX_Promotora` varchar(10) NOT NULL,
  `DSC_EMAIL_Promotora` varchar(100) NOT NULL,
  `QTD_CargaHorariaMinima` decimal(8,2) NOT NULL,
  `ID_BSC_Local_Evento` varchar(50) NOT NULL,
  `COD_Tipo_Estado_promotora` varchar(50) NOT NULL,
  `isPromotora` tinyint(1) NOT NULL,
  `ID_Banco` varchar(50) NOT NULL,
  `ID_Empresa` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_apontamento`
--

CREATE TABLE IF NOT EXISTS `evt_evento_apontamento` (
  `COD_EventoApontamento` int(11) NOT NULL,
  `COD_BarrasCracha` varchar(13) NOT NULL,
  `DTM_Apontamento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COD_DTMApontamento` varchar(14) NOT NULL,
  `COD_Tipo_Apontamento` int(11) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL,
  `ID_EVT_Staging_LeitorOPN` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_apont_ativ_comp`
--

CREATE TABLE IF NOT EXISTS `evt_evento_apont_ativ_comp` (
  `ID_Evento_Apont_Ativ_Comp` int(11) NOT NULL,
  `COD_BarrasCracha` varchar(13) NOT NULL,
  `DTM_Apontamento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COD_DTMApontamento` varchar(14) NOT NULL,
  `COD_Tipo_Apontamento` int(11) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL,
  `ID_EVT_Ativ_Complementar` int(11) NOT NULL,
  `ID_EVT_Staging_LeitorOPN` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_categoria`
--

CREATE TABLE IF NOT EXISTS `evt_evento_categoria` (
  `ID_Evento_Categoria` varchar(50) NOT NULL,
  `DSC_Nome` varchar(150) NOT NULL,
  `VLR_Inscricao` decimal(8,2) NOT NULL,
  `DT_Inicio_Valor` date NOT NULL,
  `DT_Fim_Valor` date NOT NULL,
  `ID_EVT_Evento` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_grupo`
--

CREATE TABLE IF NOT EXISTS `evt_evento_grupo` (
  `ID_EVT_EventoGrupo` varchar(50) NOT NULL,
  `DSC_Nome` varchar(100) NOT NULL,
  `DSC_Nome_Resp` varchar(100) NOT NULL,
  `COD_CPF_Resp` char(11) NOT NULL,
  `DSC_Email_Resp` varchar(100) NOT NULL,
  `NUM_Tel_Resp` varchar(20) NOT NULL,
  `NUM_Celular_Resp` varchar(20) NOT NULL,
  `DSC_Endereco_Resp` varchar(100) NOT NULL,
  `DSC_Bairro` varchar(50) NOT NULL,
  `NUM_CEP_Resp` char(12) NOT NULL,
  `DSC_Cidade_Resp` varchar(70) NOT NULL,
  `COD_TipoEstado_Resp` int(11) NOT NULL,
  `SIT_EH_Parcelado` char(1) NOT NULL,
  `VLR_Total` decimal(8,2) NOT NULL,
  `VLR_Total_Inscricao` decimal(8,2) NOT NULL,
  `COD_Inscricao_APAE` int(11) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL,
  `ID_SEG_Detalhe_transacao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_participante`
--

CREATE TABLE IF NOT EXISTS `evt_evento_participante` (
  `ID_EVT_Evento_Pariticipante` varchar(50) NOT NULL,
  `DSC_Nome_Crachav` varchar(70) NOT NULL,
  `COD_Barras_Cracha` varchar(13) NOT NULL,
  `VLR_Total` decimal(8,2) NOT NULL,
  `VLR_Total_Inscricao` decimal(8,2) NOT NULL,
  `QTD_CargaHoraria_Realizada` decimal(8,2) NOT NULL,
  `COD_Nivel_Participante` smallint(6) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL,
  `ID_EVT_Categoria` varchar(50) NOT NULL,
  `ID_EVT_Evento` varchar(50) NOT NULL,
  `ID_BSC_Participante` varchar(50) NOT NULL,
  `ID_EVT_Participante_Pai` int(11) NOT NULL,
  `COD_Tipo_SIT_Certificado` int(11) NOT NULL,
  `DTM_Entrega_Certificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ID_SEG_DetalheTransacao` int(11) NOT NULL,
  `SIT_EH_Parcelado` char(1) NOT NULL,
  `ID_EVT_EventoGrupo` int(11) NOT NULL,
  `COD_TipoSituacao_Material` int(11) NOT NULL,
  `DTM_EntregaMaterial` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `COD_InscricaoExterno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento` (
  `ID_Pagamento` varchar(50) NOT NULL,
  `DT_Transacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DT_Pagamento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `VLR_Transacao` decimal(8,2) NOT NULL,
  `VR_Pago` decimal(8,2) NOT NULL,
  `NUM_Recibo` varchar(10) NOT NULL,
  `COD_TipoFormaPagamento` int(11) NOT NULL,
  `COD_TipoOrigemInscricao` int(11) NOT NULL,
  `ID_EVT_Evento` varchar(50) NOT NULL,
  `ID_EVT_Pagamento_Pai` varchar(50) NOT NULL,
  `COD_Tipo_Situacao_Pagamento` int(11) NOT NULL,
  `QTD_Parcelas` int(11) NOT NULL,
  `NUM_Parcelas` int(11) NOT NULL,
  `QTD_Parcelas_Pagas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_boleto`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_boleto` (
  `ID_Pagamento_Boleto` int(11) NOT NULL,
  `NUM_Boleto` varchar(30) NOT NULL,
  `COD_Barras_Boleto` varchar(50) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_cartao`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_cartao` (
  `ID_Pagamento_Cartao` int(11) NOT NULL,
  `NUM_Cartao` varchar(15) NOT NULL,
  `DSC_TipoCartao` varchar(20) NOT NULL,
  `DSC_Responsavel` varchar(100) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_cheque`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_cheque` (
  `ID_Pagamento_Cheque` int(11) NOT NULL,
  `COD_Cheque` varchar(12) NOT NULL,
  `COD_Agencia` varchar(10) NOT NULL,
  `DSC_Banco` varchar(50) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_cortesia`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_cortesia` (
  `ID_Pagamento_Cortesia` int(11) NOT NULL,
  `ID_BSC_Empresa` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_deposito`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_deposito` (
  `ID_Pagamento_Deposito` int(11) NOT NULL,
  `NUM_Deposito` varchar(20) NOT NULL,
  `DT_Deposito` date NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_empenho`
--

CREATE TABLE IF NOT EXISTS `evt_pagamento_empenho` (
  `ID_Pagamento_Empenho` int(11) NOT NULL,
  `ID_EVT_Empenho` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_participacao`
--

CREATE TABLE IF NOT EXISTS `evt_participacao` (
  `ID_EVT_Participacao` int(11) NOT NULL,
  `COD_TIPO_Participacao` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL,
  `ID_EVT_ATIV_Complementar` int(11) NOT NULL,
  `ID_EVT_Evento_Participante` int(11) NOT NULL,
  `QTD_CargaHorariaRealizada` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_staging_leitor_opn`
--

CREATE TABLE IF NOT EXISTS `evt_staging_leitor_opn` (
  `ID_StagingLeitorOPN` int(11) NOT NULL,
  `COD_Dispositivo_Leitura` int(11) NOT NULL,
  `COD_Barras_Cracha` varchar(13) NOT NULL,
  `COD_Tempo_Apontamento` varchar(21) NOT NULL,
  `COD_Tempo_Apontamento_TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SIT_Processado` char(1) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL,
  `COD_Tipo_Coleta_Dados` int(11) NOT NULL,
  `ID_EVT_Ativ_Complementar` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_sub_evento`
--

CREATE TABLE IF NOT EXISTS `evt_sub_evento` (
  `ID_SUB_Evento` int(11) NOT NULL,
  `DSC_Titulo` varchar(100) NOT NULL,
  `DT_Inicio` date NOT NULL,
  `DT_Fim` date NOT NULL,
  `VRL_Inscricao` decimal(8,2) NOT NULL,
  `ID_EVT_Evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_detalhe_transacao`
--

CREATE TABLE IF NOT EXISTS `seg_detalhe_transacao` (
  `ID_Detalhe_Transacao` int(11) NOT NULL,
  `COD_TIPO_Origem_Transacao` int(11) NOT NULL,
  `COD_Tipo_Sistema_Transacao` int(11) NOT NULL,
  `DTM_Transacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ID_SEG_Usuario` int(11) NOT NULL,
  `DSC_Login_Transacao` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_grupo`
--

CREATE TABLE IF NOT EXISTS `seg_grupo` (
  `ID_Grupo` int(11) NOT NULL,
  `DSC_Nome` varchar(20) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `ID_Usuario` varchar(50) NOT NULL,
  `DSC_Login` varchar(50) NOT NULL,
  `DSC_Senha` varchar(150) NOT NULL,
  `DTM_Inicio` date NOT NULL,
  `DTM_Fim` date NOT NULL,
  `ID_SEG_Grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_abordagem_ativ_comp`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_abordagem_ativ_comp` (
  `COD_Tipo_Abordagem_Ativ_Comp` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_apontamento`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_apontamento` (
  `COD_TipoApontamento` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_coleta_dados`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_coleta_dados` (
  `COD_Tipo_Coleta_Dados` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_estado`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_estado` (
  `COD_TIPOEstado` varchar(50) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_forma_pagamento`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_forma_pagamento` (
  `COD_Tipo_Forma_Pagamento` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_origem_inscricao`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_origem_inscricao` (
  `COD_Tipo_Origem_Inscricao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_origem_transacao`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_origem_transacao` (
  `COD_Tipo_Origem_Transacao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_participacao`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_participacao` (
  `COD_Tipo_Participacao` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_sistema_transacao`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_sistema_transacao` (
  `COD_Tipo_Sistema_Transacao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_certificado`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_situacao_certificado` (
  `COD_Tipo_Situacao_Certificado` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_material`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_situacao_material` (
  `COD_Tipo_Situacao_Material` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_pagamento`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_situacao_pagamento` (
  `COD_Tipo_Situacao_Pagamento` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bsc_banco`
--
ALTER TABLE `bsc_banco`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bsc_empresa`
--
ALTER TABLE `bsc_empresa`
  ADD PRIMARY KEY (`ID_Empresa`);

--
-- Indexes for table `bsc_local_evento`
--
ALTER TABLE `bsc_local_evento`
  ADD PRIMARY KEY (`ID_Local`);

--
-- Indexes for table `bsc_participante`
--
ALTER TABLE `bsc_participante`
  ADD PRIMARY KEY (`ID_Participante`);

--
-- Indexes for table `bsc_profissao`
--
ALTER TABLE `bsc_profissao`
  ADD PRIMARY KEY (`ID_Profissao`);

--
-- Indexes for table `config_email`
--
ALTER TABLE `config_email`
  ADD PRIMARY KEY (`ID_Email`);

--
-- Indexes for table `evt_ativ_complementar`
--
ALTER TABLE `evt_ativ_complementar`
  ADD PRIMARY KEY (`COD_ATIV_Complementar`);

--
-- Indexes for table `evt_ativ_comp_categoria`
--
ALTER TABLE `evt_ativ_comp_categoria`
  ADD PRIMARY KEY (`COD_ATIV_Comp_Categoria`);

--
-- Indexes for table `evt_empenho`
--
ALTER TABLE `evt_empenho`
  ADD PRIMARY KEY (`ID_Empenho`);

--
-- Indexes for table `evt_empenho_participante`
--
ALTER TABLE `evt_empenho_participante`
  ADD PRIMARY KEY (`ID_Empenho_Participante`);

--
-- Indexes for table `evt_evento`
--
ALTER TABLE `evt_evento`
  ADD PRIMARY KEY (`ID_EVT`);

--
-- Indexes for table `evt_evento_apontamento`
--
ALTER TABLE `evt_evento_apontamento`
  ADD PRIMARY KEY (`COD_EventoApontamento`);

--
-- Indexes for table `evt_evento_apont_ativ_comp`
--
ALTER TABLE `evt_evento_apont_ativ_comp`
  ADD PRIMARY KEY (`ID_Evento_Apont_Ativ_Comp`);

--
-- Indexes for table `evt_evento_categoria`
--
ALTER TABLE `evt_evento_categoria`
  ADD PRIMARY KEY (`ID_Evento_Categoria`);

--
-- Indexes for table `evt_evento_grupo`
--
ALTER TABLE `evt_evento_grupo`
  ADD PRIMARY KEY (`ID_EVT_EventoGrupo`);

--
-- Indexes for table `evt_evento_participante`
--
ALTER TABLE `evt_evento_participante`
  ADD PRIMARY KEY (`ID_EVT_Evento_Pariticipante`);

--
-- Indexes for table `evt_pagamento`
--
ALTER TABLE `evt_pagamento`
  ADD PRIMARY KEY (`ID_Pagamento`);

--
-- Indexes for table `evt_pagamento_boleto`
--
ALTER TABLE `evt_pagamento_boleto`
  ADD PRIMARY KEY (`ID_Pagamento_Boleto`);

--
-- Indexes for table `evt_pagamento_cartao`
--
ALTER TABLE `evt_pagamento_cartao`
  ADD PRIMARY KEY (`ID_Pagamento_Cartao`);

--
-- Indexes for table `evt_pagamento_cheque`
--
ALTER TABLE `evt_pagamento_cheque`
  ADD PRIMARY KEY (`ID_Pagamento_Cheque`);

--
-- Indexes for table `evt_pagamento_cortesia`
--
ALTER TABLE `evt_pagamento_cortesia`
  ADD PRIMARY KEY (`ID_Pagamento_Cortesia`);

--
-- Indexes for table `evt_pagamento_deposito`
--
ALTER TABLE `evt_pagamento_deposito`
  ADD PRIMARY KEY (`ID_Pagamento_Deposito`);

--
-- Indexes for table `evt_pagamento_empenho`
--
ALTER TABLE `evt_pagamento_empenho`
  ADD PRIMARY KEY (`ID_Pagamento_Empenho`);

--
-- Indexes for table `evt_participacao`
--
ALTER TABLE `evt_participacao`
  ADD PRIMARY KEY (`ID_EVT_Participacao`);

--
-- Indexes for table `evt_staging_leitor_opn`
--
ALTER TABLE `evt_staging_leitor_opn`
  ADD PRIMARY KEY (`ID_StagingLeitorOPN`);

--
-- Indexes for table `evt_sub_evento`
--
ALTER TABLE `evt_sub_evento`
  ADD PRIMARY KEY (`ID_SUB_Evento`);

--
-- Indexes for table `seg_detalhe_transacao`
--
ALTER TABLE `seg_detalhe_transacao`
  ADD PRIMARY KEY (`ID_Detalhe_Transacao`);

--
-- Indexes for table `seg_grupo`
--
ALTER TABLE `seg_grupo`
  ADD PRIMARY KEY (`ID_Grupo`);

--
-- Indexes for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indexes for table `tb_tipo_abordagem_ativ_comp`
--
ALTER TABLE `tb_tipo_abordagem_ativ_comp`
  ADD PRIMARY KEY (`COD_Tipo_Abordagem_Ativ_Comp`);

--
-- Indexes for table `tb_tipo_apontamento`
--
ALTER TABLE `tb_tipo_apontamento`
  ADD PRIMARY KEY (`COD_TipoApontamento`);

--
-- Indexes for table `tb_tipo_coleta_dados`
--
ALTER TABLE `tb_tipo_coleta_dados`
  ADD PRIMARY KEY (`COD_Tipo_Coleta_Dados`);

--
-- Indexes for table `tb_tipo_estado`
--
ALTER TABLE `tb_tipo_estado`
  ADD PRIMARY KEY (`COD_TIPOEstado`);

--
-- Indexes for table `tb_tipo_forma_pagamento`
--
ALTER TABLE `tb_tipo_forma_pagamento`
  ADD PRIMARY KEY (`COD_Tipo_Forma_Pagamento`);

--
-- Indexes for table `tb_tipo_origem_inscricao`
--
ALTER TABLE `tb_tipo_origem_inscricao`
  ADD PRIMARY KEY (`COD_Tipo_Origem_Inscricao`);

--
-- Indexes for table `tb_tipo_origem_transacao`
--
ALTER TABLE `tb_tipo_origem_transacao`
  ADD PRIMARY KEY (`COD_Tipo_Origem_Transacao`);

--
-- Indexes for table `tb_tipo_participacao`
--
ALTER TABLE `tb_tipo_participacao`
  ADD PRIMARY KEY (`COD_Tipo_Participacao`);

--
-- Indexes for table `tb_tipo_sistema_transacao`
--
ALTER TABLE `tb_tipo_sistema_transacao`
  ADD PRIMARY KEY (`COD_Tipo_Sistema_Transacao`);

--
-- Indexes for table `tb_tipo_situacao_certificado`
--
ALTER TABLE `tb_tipo_situacao_certificado`
  ADD PRIMARY KEY (`COD_Tipo_Situacao_Certificado`);

--
-- Indexes for table `tb_tipo_situacao_material`
--
ALTER TABLE `tb_tipo_situacao_material`
  ADD PRIMARY KEY (`COD_Tipo_Situacao_Material`);

--
-- Indexes for table `tb_tipo_situacao_pagamento`
--
ALTER TABLE `tb_tipo_situacao_pagamento`
  ADD PRIMARY KEY (`COD_Tipo_Situacao_Pagamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bsc_banco`
--
ALTER TABLE `bsc_banco`;
--
-- AUTO_INCREMENT for table `bsc_empresa`
--
ALTER TABLE `bsc_empresa`
  MODIFY `ID_Empresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bsc_profissao`
--
ALTER TABLE `bsc_profissao`
  MODIFY `ID_Profissao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_ativ_complementar`
--
ALTER TABLE `evt_ativ_complementar`
  MODIFY `COD_ATIV_Complementar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_ativ_comp_categoria`
--
ALTER TABLE `evt_ativ_comp_categoria`
  MODIFY `COD_ATIV_Comp_Categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_empenho`
--
ALTER TABLE `evt_empenho`
  MODIFY `ID_Empenho` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_empenho_participante`
--
ALTER TABLE `evt_empenho_participante`
  MODIFY `ID_Empenho_Participante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_evento_apontamento`
--
ALTER TABLE `evt_evento_apontamento`
  MODIFY `COD_EventoApontamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_evento_apont_ativ_comp`
--
ALTER TABLE `evt_evento_apont_ativ_comp`
  MODIFY `ID_Evento_Apont_Ativ_Comp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_boleto`
--
ALTER TABLE `evt_pagamento_boleto`
  MODIFY `ID_Pagamento_Boleto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_cartao`
--
ALTER TABLE `evt_pagamento_cartao`
  MODIFY `ID_Pagamento_Cartao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_cheque`
--
ALTER TABLE `evt_pagamento_cheque`
  MODIFY `ID_Pagamento_Cheque` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_cortesia`
--
ALTER TABLE `evt_pagamento_cortesia`
  MODIFY `ID_Pagamento_Cortesia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_deposito`
--
ALTER TABLE `evt_pagamento_deposito`
  MODIFY `ID_Pagamento_Deposito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_pagamento_empenho`
--
ALTER TABLE `evt_pagamento_empenho`
  MODIFY `ID_Pagamento_Empenho` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_participacao`
--
ALTER TABLE `evt_participacao`
  MODIFY `ID_EVT_Participacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_staging_leitor_opn`
--
ALTER TABLE `evt_staging_leitor_opn`
  MODIFY `ID_StagingLeitorOPN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evt_sub_evento`
--
ALTER TABLE `evt_sub_evento`
  MODIFY `ID_SUB_Evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seg_detalhe_transacao`
--
ALTER TABLE `seg_detalhe_transacao`
  MODIFY `ID_Detalhe_Transacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seg_grupo`
--
ALTER TABLE `seg_grupo`
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_abordagem_ativ_comp`
--
ALTER TABLE `tb_tipo_abordagem_ativ_comp`
  MODIFY `COD_Tipo_Abordagem_Ativ_Comp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_apontamento`
--
ALTER TABLE `tb_tipo_apontamento`
  MODIFY `COD_TipoApontamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_coleta_dados`
--
ALTER TABLE `tb_tipo_coleta_dados`
  MODIFY `COD_Tipo_Coleta_Dados` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_forma_pagamento`
--
ALTER TABLE `tb_tipo_forma_pagamento`
  MODIFY `COD_Tipo_Forma_Pagamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_origem_inscricao`
--
ALTER TABLE `tb_tipo_origem_inscricao`
  MODIFY `COD_Tipo_Origem_Inscricao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_origem_transacao`
--
ALTER TABLE `tb_tipo_origem_transacao`
  MODIFY `COD_Tipo_Origem_Transacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_participacao`
--
ALTER TABLE `tb_tipo_participacao`
  MODIFY `COD_Tipo_Participacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_sistema_transacao`
--
ALTER TABLE `tb_tipo_sistema_transacao`
  MODIFY `COD_Tipo_Sistema_Transacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_situacao_certificado`
--
ALTER TABLE `tb_tipo_situacao_certificado`
  MODIFY `COD_Tipo_Situacao_Certificado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_situacao_material`
--
ALTER TABLE `tb_tipo_situacao_material`
  MODIFY `COD_Tipo_Situacao_Material` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipo_situacao_pagamento`
--
ALTER TABLE `tb_tipo_situacao_pagamento`
  MODIFY `COD_Tipo_Situacao_Pagamento` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
