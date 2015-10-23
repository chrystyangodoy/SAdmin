-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2015 às 21:01
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
CREATE DATABASE IF NOT EXISTS `siga_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siga_web`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_banco`
--

DROP TABLE IF EXISTS `bsc_banco`;
CREATE TABLE IF NOT EXISTS `bsc_banco` (
  `ID` int(11) NOT NULL,
  `Agencia` varchar(100) NOT NULL,
  `Conta` varchar(20) NOT NULL,
  `Cod_Banco` varchar(20) NOT NULL,
  `Convenio` varchar(30) NOT NULL,
  `Contrato` varchar(60) NOT NULL,
  `Carteira` varchar(60) NOT NULL,
  `Variacao_Carteira` varchar(60) NOT NULL,
  `ID_Evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_empresa`
--

DROP TABLE IF EXISTS `bsc_empresa`;
CREATE TABLE IF NOT EXISTS `bsc_empresa` (
  `ID_Empresa` int(11) NOT NULL,
  `COD_CNPJ` varchar(14) NOT NULL,
  `DSC_RazaoSocial` varchar(100) NOT NULL,
  `DSC_Endereco` varchar(120) NOT NULL,
  `DSC_Bairro` varchar(70) NOT NULL,
  `DSC_Cidade` varchar(70) NOT NULL,
  `NUM_CEP` char(8) NOT NULL,
  `NUM_InscricaoEstadual` varchar(15) NOT NULL,
  `NUM_Fone` varchar(10) NOT NULL,
  `NUM_FAX` varchar(10) NOT NULL,
  `DSC_EMAIL` varchar(100) NOT NULL,
  `COD_TipoEstado` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_empresa`
--

INSERT INTO `bsc_empresa` (`ID_Empresa`, `COD_CNPJ`, `DSC_RazaoSocial`, `DSC_Endereco`, `DSC_Bairro`, `DSC_Cidade`, `NUM_CEP`, `NUM_InscricaoEstadual`, `NUM_Fone`, `NUM_FAX`, `DSC_EMAIL`, `COD_TipoEstado`) VALUES
(1, '63.415.021/000', 'Empresa Teste 01', 'Qualquer rua', 'Qualquer bairro', 'Qualquer Cidade', '', '', '', '', '', 0),
(2, '35.887.541/000', 'Empresa Teste 02', 'Qualquer rua', 'Qualquer bairro', 'Qualquer Cidade', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_local_evento`
--

DROP TABLE IF EXISTS `bsc_local_evento`;
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

--
-- Extraindo dados da tabela `bsc_local_evento`
--

INSERT INTO `bsc_local_evento` (`ID_Local`, `DSC_Nome`, `DSC_Endereco`, `DSC_Bairro`, `DSC_Cidade`, `NUM_CEO`, `NUM_Fone`, `NUM_FAX`, `DSC_EMAIL`, `DSC_Nome_Contato`, `COD_TIPOEstado`) VALUES
('a26ce4d7dc4e91404bf315299fb78cda', 'Local Evento ', 'Endereco Evento', 'Fátima', 'Belém', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_participante`
--

DROP TABLE IF EXISTS `bsc_participante`;
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
  `COD_Tipo_Estado` int(11) NOT NULL,
  `ID_BSC_Empresa` int(11) NOT NULL,
  `ID_BSC_Profissao` int(11) NOT NULL,
  `ID_Usuario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_participante`
--

INSERT INTO `bsc_participante` (`ID_Participante`, `COD_CPF`, `COD_RG`, `DSC_Nome`, `DSC_Endereco`, `DSC_Bairro`, `DSC_Cidade`, `NUM_CEP`, `NUM_Fone`, `NUM_Celular`, `NUM_FAX`, `DSC_Profissao_Especialidade`, `DSC_Email`, `NUM_Registro`, `COD_Tipo_Estado`, `ID_BSC_Empresa`, `ID_BSC_Profissao`, `ID_Usuario`) VALUES
('528c234df006558ae470fa0ccabe7892', '18044943722', '23.492.766', 'Participante 01', 'Rua SÃ£o Domingos', 'Terra Firme', 'BelÃ©m', '66.077-650', '', '', '', '', 'chrystyangodoy@gmail.com', '', 0, 1, 1, 'ed7e78d24a6c1d6a66ff8a0afb018299'),
('b6573e570fbd1850156780e7182197ad', '52863298291', '4387870', 'Participante 02', 'Rua Domingos Marreiros', 'Umarizal', 'BelÃ©m', '66.060-160', '', '', '', '', 'chrystyangodoy@gmail.com', '', 0, 1, 1, 'af6eb1a4bf6cfc13c5b0c86f606a2d34'),
('a208d2644724d251d5421e85758e9376', '52863298291', '4387870', 'Chrystyan', 'Rua Domingos Marreiros', 'Umarizal', 'BelÃ©m', '66.060-160', '', '', '', '', 'chrystyangodoy@gmail.com', '', 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_profissao`
--

DROP TABLE IF EXISTS `bsc_profissao`;
CREATE TABLE IF NOT EXISTS `bsc_profissao` (
  `ID_Profissao` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_profissao`
--

INSERT INTO `bsc_profissao` (`ID_Profissao`, `DSC_Nome`, `DSC_Descricao`) VALUES
(1, 'Programador', 'Profissional de InformÃ¡tica'),
(2, 'WebDesigner', 'Profissional de InformÃ¡tica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_ativ_complementar`
--

DROP TABLE IF EXISTS `evt_ativ_complementar`;
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

DROP TABLE IF EXISTS `evt_ativ_comp_categoria`;
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

DROP TABLE IF EXISTS `evt_empenho`;
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

DROP TABLE IF EXISTS `evt_empenho_participante`;
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

DROP TABLE IF EXISTS `evt_evento`;
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
  `COD_Tipo_Estado_promotora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evt_evento`
--

INSERT INTO `evt_evento` (`ID_EVT`, `DSC_Nome`, `DSC_Presidente`, `DT_Inicio`, `DT_Fim`, `COD_CNPJ_Promotora`, `DSC_Nome_Promotora`, `DSC_Presidente_Promotora`, `DSC_Endereco_Promotora`, `NUM_CEP_Promotora`, `DSC_Cidade_Promotora`, `NUM_Fone_Promotora`, `NUM_FAX_Promotora`, `DSC_EMAIL_Promotora`, `QTD_CargaHorariaMinima`, `ID_BSC_Local_Evento`, `COD_Tipo_Estado_promotora`) VALUES
('528c234df006558ae470fa0ccabe7892', 'Evento 001', 'Presidente Evento', '2015-01-01', '2015-12-31', '101001001/0000', 'Nome da Promotora', 'Presidente Promotora', 'Domingos Marreiros', '66060160', 'BelÃ©m', '91 4006979', '91 4006979', 'promotora@prom.com.br', '0.00', 'a26ce4d7dc4e91404bf315299fb78cda', 'bbb95aac9ba83705cdad5e9e119ef9c3'),
('528c234df006558ae470fa0ccabe7893', 'Evento 002', 'Presidente Evento 2', '2015-01-01', '2015-12-31', '101001001/0000', '', '', '', '', '', '', '', '', '0.00', '0', '0'),
('528c234df006558ae470fa0ccabe7894', 'Evento 003', 'Presidente Evento 3', '2015-01-01', '2015-12-31', '101001001/0000', '', '', '', '', '', '', '', '', '0.00', '0', '0'),
('528c234df006558ae470fa0ccabe7895', 'Evento 004', 'Presidente Evento 4', '2015-01-01', '2015-12-31', '101001001/0000', '', '', '', '', '', '', '', '', '0.00', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_apontamento`
--

DROP TABLE IF EXISTS `evt_evento_apontamento`;
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

DROP TABLE IF EXISTS `evt_evento_apont_ativ_comp`;
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

DROP TABLE IF EXISTS `evt_evento_categoria`;
CREATE TABLE IF NOT EXISTS `evt_evento_categoria` (
  `ID_Evento_Categoria` varchar(50) NOT NULL,
  `DSC_Nome` varchar(150) NOT NULL,
  `VLR_Inscricao` decimal(8,2) NOT NULL,
  `DT_Inicio_Valor` date NOT NULL,
  `DT_Fim_Valor` date NOT NULL,
  `ID_EVT_Evento` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evt_evento_categoria`
--

INSERT INTO `evt_evento_categoria` (`ID_Evento_Categoria`, `DSC_Nome`, `VLR_Inscricao`, `DT_Inicio_Valor`, `DT_Fim_Valor`, `ID_EVT_Evento`) VALUES
('528c234df006558ae470fa0ccabe7892', 'Categoria 01', '100.00', '2015-01-01', '2015-12-31', '528c234df006558ae470fa0ccabe7892'),
('454a5f785a4b175974cf43890ab38b09', 'Categoria 03', '200.00', '2016-09-01', '2016-01-01', '528c234df006558ae470fa0ccabe7892');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_evento_grupo`
--

DROP TABLE IF EXISTS `evt_evento_grupo`;
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

DROP TABLE IF EXISTS `evt_evento_participante`;
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

--
-- Extraindo dados da tabela `evt_evento_participante`
--

INSERT INTO `evt_evento_participante` (`ID_EVT_Evento_Pariticipante`, `DSC_Nome_Crachav`, `COD_Barras_Cracha`, `VLR_Total`, `VLR_Total_Inscricao`, `QTD_CargaHoraria_Realizada`, `COD_Nivel_Participante`, `ID_EVT_Pagamento`, `ID_EVT_Categoria`, `ID_EVT_Evento`, `ID_BSC_Participante`, `ID_EVT_Participante_Pai`, `COD_Tipo_SIT_Certificado`, `DTM_Entrega_Certificado`, `ID_SEG_DetalheTransacao`, `SIT_EH_Parcelado`, `ID_EVT_EventoGrupo`, `COD_TipoSituacao_Material`, `DTM_EntregaMaterial`, `COD_InscricaoExterno`) VALUES
('7a1ad2470ac8dee70c032fd650a0b6fb', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('27b85957d1e329559ce72209aa18096c', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('5a272c0c279697791bb8e5359673d8ce', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('ab629e668ae65ed2fbf2f252290c3d40', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('8a818743922ad932d25df641d9eeb054', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('257d1c211346afed550c8888d2c6a952', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('baa7cbfe16005c3859836a0ba8b13d96', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('dbff6abf658add753a0a19fbd1735fbe', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('720d31eac852a74d04a4664994ac7c2e', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('22a6fbd43fb9a6c23a2127af96155f34', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('b67ceab2aa93dc610521915cd4ee29f5', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('9bab7694ec3cd0cf3d5064805aaeeeb8', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('e54c1c709c170a4833c17c4148139515', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('d6450e40c541c0c224e215b208119e4b', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('ba36b3e601f876ae1835fce72b8da42b', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('ebc9a193b3d434e059e3e712d1cf9de3', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('359d72c6098466bd4f6490f47a609831', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('12c030cedc407f2c3d211d65c478c0ee', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('2a17deb8fafd2b890a8b95d76f9377bf', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('87202021f81c0659241c422ce4dfc9b1', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('f922aa144916241f14a3bca40bc154d3', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('0583b61a2d10d9ff87af0bd762564a2a', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('f8790b585a49faeef810a214d3b7dc0e', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('da5f6e67c57914c1e1d1b23ae6b131ec', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('6c8774ae7d14b7417c1204d8f3c8fce3', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('164c3e3c5ae94ae81f1ad6d7537af8c5', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('97c8f70fee99583b1467fd05ca670c2c', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('60f8d30c345633da4af3c4588e752315', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7895', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('ea91632cdecb3615821553eecda4394a', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('329ad3b9258ce8d660c2ac17e2e75f6e', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('fd6b129103cec796624a0a3a138f0696', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('fd059949420a01733297f3a265e75afa', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('9dc48795f0a0848a60ca67a376675650', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('ce2cf2c1495b2293862a0ec1da3b8887', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('df89b2cdceb1ce09473aa3482761a98d', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('78277af216fe04d395a9896ad4781f69', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('749b9ff6de19fec98eec598c072c0ea6', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('2df88d29640bf3254dfb419b8074fb94', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('e6a4c999933931126cf27be63795558f', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('0ec6bb845cd8a851b107b82c60296d42', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('cb93202cb469171d0ce3d5c2c416e132', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('0e7990951308b36369626d8b33b91846', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('bbc54ec43e5beb600e8de6e9ba9ea2b2', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('bf7c714f8e68ef6395672aa68eb2584e', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('5d58d4257a4f074e2f8b9ed4418b9490', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('96dc3955835c5da54aedb5fbde80f881', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('bdbc89aa5fb4901ab31e8c07941f4c83', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('7d704ead2d6365d24480c3181ae3332c', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('7a36bafc6ea85a98821079c580880adf', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('014546b885f48f0daf918d4198e9ae74', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7894', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('dec57290083f51e5d74f03367c98c037', 'Participante 01', '18044943722', '0.00', '0.00', '0.00', 0, 0, '0', '528c234df006558ae470fa0ccabe7893', '528c234df006558ae470fa0ccabe7892', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0),
('d4f1da2300aa1d7e945ff20527c317c1', 'Chrystyan', '52863298291', '0.00', '0.00', '0.00', 0, 0, '528c234df006558ae470fa0ccabe7892', '528c234df006558ae470fa0ccabe7892', 'a208d2644724d251d5421e85758e9376', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento`
--

DROP TABLE IF EXISTS `evt_pagamento`;
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

DROP TABLE IF EXISTS `evt_pagamento_boleto`;
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

DROP TABLE IF EXISTS `evt_pagamento_cartao`;
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

DROP TABLE IF EXISTS `evt_pagamento_cheque`;
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

DROP TABLE IF EXISTS `evt_pagamento_cortesia`;
CREATE TABLE IF NOT EXISTS `evt_pagamento_cortesia` (
  `ID_Pagamento_Cortesia` int(11) NOT NULL,
  `ID_BSC_Empresa` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_pagamento_deposito`
--

DROP TABLE IF EXISTS `evt_pagamento_deposito`;
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

DROP TABLE IF EXISTS `evt_pagamento_empenho`;
CREATE TABLE IF NOT EXISTS `evt_pagamento_empenho` (
  `ID_Pagamento_Empenho` int(11) NOT NULL,
  `ID_EVT_Empenho` int(11) NOT NULL,
  `ID_EVT_Pagamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evt_participacao`
--

DROP TABLE IF EXISTS `evt_participacao`;
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

DROP TABLE IF EXISTS `evt_staging_leitor_opn`;
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

DROP TABLE IF EXISTS `evt_sub_evento`;
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

DROP TABLE IF EXISTS `seg_detalhe_transacao`;
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

DROP TABLE IF EXISTS `seg_grupo`;
CREATE TABLE IF NOT EXISTS `seg_grupo` (
  `ID_Grupo` int(11) NOT NULL,
  `DSC_Nome` varchar(20) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_grupo`
--

INSERT INTO `seg_grupo` (`ID_Grupo`, `DSC_Nome`, `DSC_Descricao`) VALUES
(1, 'GP-Participante', 'Grupo de Participante'),
(3, 'Desenvolvedores', 'Grupo de Desenvolvedores PHP'),
(4, 'WebDesigners', 'Grupo de WebDesigners');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

DROP TABLE IF EXISTS `seg_usuario`;
CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `ID_Usuario` varchar(50) NOT NULL,
  `DSC_Login` varchar(50) NOT NULL,
  `DSC_Senha` varchar(150) NOT NULL,
  `DTM_Inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DTM_Fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ID_SEG_Grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`ID_Usuario`, `DSC_Login`, `DSC_Senha`, `DTM_Inicio`, `DTM_Fim`, `ID_SEG_Grupo`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-09-04 17:12:34', '0000-00-00 00:00:00', 1),
('ed7e78d24a6c1d6a66ff8a0afb018299', '18044943722', '202cb962ac59075b964b07152d234b70', '2015-09-15 13:51:21', '2015-09-20 03:00:00', 99),
('0e7c795ef217fc9c992315322b7c947f', '52863298291', 'a1d81f0ac7ef931d761805a7cfde26dd', '2015-09-24 03:00:00', '2015-10-01 03:00:00', 99),
('af6eb1a4bf6cfc13c5b0c86f606a2d34', '52863298291', '1af7be944f304767217be1c441fd6ddc', '2015-09-24 03:00:00', '2015-10-01 03:00:00', 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_abordagem_ativ_comp`
--

DROP TABLE IF EXISTS `tb_tipo_abordagem_ativ_comp`;
CREATE TABLE IF NOT EXISTS `tb_tipo_abordagem_ativ_comp` (
  `COD_Tipo_Abordagem_Ativ_Comp` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_apontamento`
--

DROP TABLE IF EXISTS `tb_tipo_apontamento`;
CREATE TABLE IF NOT EXISTS `tb_tipo_apontamento` (
  `COD_TipoApontamento` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_coleta_dados`
--

DROP TABLE IF EXISTS `tb_tipo_coleta_dados`;
CREATE TABLE IF NOT EXISTS `tb_tipo_coleta_dados` (
  `COD_Tipo_Coleta_Dados` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_estado`
--

DROP TABLE IF EXISTS `tb_tipo_estado`;
CREATE TABLE IF NOT EXISTS `tb_tipo_estado` (
  `COD_TIPOEstado` varchar(50) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_estado`
--

INSERT INTO `tb_tipo_estado` (`COD_TIPOEstado`, `DSC_Nome`, `DSC_Descricao`) VALUES
('528c234df006558ae470fa0ccabe7892', 'Nome Tipo Estado', 'Tipo Estado Descrição grande.'),
('bbb95aac9ba83705cdad5e9e119ef9c3', 'PA', 'ParÃ¡');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_forma_pagamento`
--

DROP TABLE IF EXISTS `tb_tipo_forma_pagamento`;
CREATE TABLE IF NOT EXISTS `tb_tipo_forma_pagamento` (
  `COD_Tipo_Forma_Pagamento` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_origem_inscricao`
--

DROP TABLE IF EXISTS `tb_tipo_origem_inscricao`;
CREATE TABLE IF NOT EXISTS `tb_tipo_origem_inscricao` (
  `COD_Tipo_Origem_Inscricao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_origem_transacao`
--

DROP TABLE IF EXISTS `tb_tipo_origem_transacao`;
CREATE TABLE IF NOT EXISTS `tb_tipo_origem_transacao` (
  `COD_Tipo_Origem_Transacao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_participacao`
--

DROP TABLE IF EXISTS `tb_tipo_participacao`;
CREATE TABLE IF NOT EXISTS `tb_tipo_participacao` (
  `COD_Tipo_Participacao` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_sistema_transacao`
--

DROP TABLE IF EXISTS `tb_tipo_sistema_transacao`;
CREATE TABLE IF NOT EXISTS `tb_tipo_sistema_transacao` (
  `COD_Tipo_Sistema_Transacao` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_certificado`
--

DROP TABLE IF EXISTS `tb_tipo_situacao_certificado`;
CREATE TABLE IF NOT EXISTS `tb_tipo_situacao_certificado` (
  `COD_Tipo_Situacao_Certificado` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_material`
--

DROP TABLE IF EXISTS `tb_tipo_situacao_material`;
CREATE TABLE IF NOT EXISTS `tb_tipo_situacao_material` (
  `COD_Tipo_Situacao_Material` int(11) NOT NULL,
  `DSC_Nome` varchar(50) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_situacao_pagamento`
--

DROP TABLE IF EXISTS `tb_tipo_situacao_pagamento`;
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
ALTER TABLE `bsc_banco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bsc_empresa`
--
ALTER TABLE `bsc_empresa`
  MODIFY `ID_Empresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bsc_profissao`
--
ALTER TABLE `bsc_profissao`
  MODIFY `ID_Profissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
