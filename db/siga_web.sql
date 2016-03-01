-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Mar-2016 às 20:47
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

DROP TABLE IF EXISTS `bsc_banco`;
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

--
-- Extraindo dados da tabela `bsc_banco`
--

INSERT INTO `bsc_banco` (`ID`, `Dsc_Banco`, `Agencia`, `Conta`, `Cod_Banco`, `Convenio`, `Contrato`, `Carteira`, `Variacao_Carteira`, `numero_documento`, `COD_CNPJ_Promotora`) VALUES
('3bdfa2bf001bc6731712ca143ae2b3c5', 'Banco do Brasil', '3372-4', '336981-9', '1', '1234', '233434', 'Boleto', '1', 9093, 10100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_empresa`
--

DROP TABLE IF EXISTS `bsc_empresa`;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_empresa`
--

INSERT INTO `bsc_empresa` (`ID_Empresa`, `COD_CNPJ`, `DSC_RazaoSocial`, `DSC_Endereco`, `DSC_Bairro`, `DSC_Cidade`, `NUM_CEP`, `NUM_InscricaoEstadual`, `NUM_Fone`, `NUM_FAX`, `DSC_EMAIL`, `COD_TipoEstado`) VALUES
(1, '59481422000179', 'Super PromoÃ§oes e Eventos', 'Rua Domingos Marreiros 1212', 'FÃ¡tima', 'BelÃ©m', '66.060-1', '3453432444', '9878978979', '', 'cleytonqcosta@gmail.com', 'ParÃ¡');

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
('31fa2c1f83dc17394e02c227f473cd7d', 'Hangar Centro de ConvenÃ§Ãµes da AmazÃ´nia', 'Avenida Dr. Freitas SN', 'FÃ¡tima', 'BelÃ©m', '45345435', '(91) 8874-', '(98) 7897-', 'cleytonqcosta@gmail.com', 'jio', '304736ff9a38778bb5e04560a51a4085');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_participante`
--

DROP TABLE IF EXISTS `bsc_participante`;
CREATE TABLE IF NOT EXISTS `bsc_participante` (
  `ID_Participante` varchar(50) NOT NULL,
  `COD_CPF` char(14) NOT NULL,
  `COD_RG` varchar(10) NOT NULL,
  `Id_Estrangeiro` varchar(50) NOT NULL,
  `Nome_Cracha` varchar(50) NOT NULL,
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
  `ID_Usuario` varchar(50) NOT NULL,
  `Cod_Participante` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_participante`
--

INSERT INTO `bsc_participante` (`ID_Participante`, `COD_CPF`, `COD_RG`, `Id_Estrangeiro`, `Nome_Cracha`, `DSC_Nome`, `DSC_Endereco`, `DSC_Bairro`, `DSC_Cidade`, `NUM_CEP`, `NUM_Fone`, `NUM_Celular`, `NUM_FAX`, `DSC_Profissao_Especialidade`, `DSC_Email`, `NUM_Registro`, `COD_Tipo_Estado`, `ID_BSC_Empresa`, `ID_BSC_Profissao`, `ID_Usuario`, `Cod_Participante`) VALUES
('bc24356261782a1db3f0306fd98826e0', '52863298291', '4387870', '', '', 'Chrystyan Godoy', 'Rua Domingos Marreiros', 'Umarizal', 'BelÃ©m', '66.060-160', '(91) 4006-9800', '', '', 'AdministraÃ§Ã£o', 'chrystyangodoy@gmail.com', '1234546789', '304736ff9a38778bb5e04560a51a4085', 1, 1, '88d6f6bf17fc5af881b08f0db97cb62e', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bsc_profissao`
--

DROP TABLE IF EXISTS `bsc_profissao`;
CREATE TABLE IF NOT EXISTS `bsc_profissao` (
  `ID_Profissao` int(11) NOT NULL,
  `DSC_Nome` varchar(70) NOT NULL,
  `DSC_Descricao` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bsc_profissao`
--

INSERT INTO `bsc_profissao` (`ID_Profissao`, `DSC_Nome`, `DSC_Descricao`) VALUES
(1, 'Estudante', 'Estudantes'),
(2, 'MÃ©dico', 'Cardiologista'),
(3, 'Analista de Sistemas', 'Programador de Sistemas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_email`
--

DROP TABLE IF EXISTS `config_email`;
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

--
-- Extraindo dados da tabela `config_email`
--

INSERT INTO `config_email` (`ID_Email`, `smtp`, `Port`, `remetente`, `assunto`, `mensagem`, `userName`, `Password`, `isAtivo`) VALUES
('c7cc5bdf9bdebc5618c610ed631435d6', 'smtp.atualpromocoes.com.br', '587', 'Administrador', 'Obrigado por realizar sua inscriÃ§Ã£o em nosso Evento', 'ApÃ³s realizar pagamento do boleto no link que segue aguarde email com confirmaÃ§Ã£o da inscriÃ§Ã£o', 'adm_sigaweb@atualpromocoes.com.br ', 'adm1234adm', 1);

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
  `COD_Tipo_Estado_promotora` varchar(50) NOT NULL,
  `isPromotora` tinyint(1) NOT NULL,
  `ID_Banco` varchar(50) NOT NULL,
  `ID_Empresa` varchar(50) NOT NULL,
  `Logo_Evento` varchar(500) NOT NULL COMMENT 'Logo ou Imagem do Evento',
  `Ctrl_Inscricao` varchar(20) NOT NULL,
  `Cod_Evento` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evt_evento`
--

INSERT INTO `evt_evento` (`ID_EVT`, `DSC_Nome`, `DSC_Presidente`, `DT_Inicio`, `DT_Fim`, `COD_CNPJ_Promotora`, `DSC_Nome_Promotora`, `DSC_Presidente_Promotora`, `DSC_Endereco_Promotora`, `NUM_CEP_Promotora`, `DSC_Cidade_Promotora`, `NUM_Fone_Promotora`, `NUM_FAX_Promotora`, `DSC_EMAIL_Promotora`, `QTD_CargaHorariaMinima`, `ID_BSC_Local_Evento`, `COD_Tipo_Estado_promotora`, `isPromotora`, `ID_Banco`, `ID_Empresa`, `Logo_Evento`, `Ctrl_Inscricao`, `Cod_Evento`) VALUES
('335b38c5779a99886a31b2179ef87a8d', 'Evento para teste de impressÃ£o de boleto', 'Bill Gates', '2016-01-01', '2016-03-20', '14.357.767/000', 'Microsoft LTDA', 'MARIANA DA SILVA', 'Domingos Marreiros', '66.060-1', 'BelÃ©m', '(91)4006-9', '(91)4006-9', 'EVENTO@EVENTO.COM.BR', '120.00', '31fa2c1f83dc17394e02c227f473cd7d', '304736ff9a38778bb5e04560a51a4085', 0, '3bdfa2bf001bc6731712ca143ae2b3c5', '', 'imgEvento/f19e56fb1868983b10575586553c1cf4.jpg', '0', ''),
('84181b14cb2ebe80b7912c31134dcdae', 'Evento 006', 'GODOY', '2016-01-01', '2016-03-20', '14.357.767/000', 'MARIA DA SILVA', 'MARIANA DA SILVA', 'Domingos Marreiros', '66.060-1', 'BelÃ©m', '(91)4006-9', '(91)4006-9', 'EVENTO@EVENTO.COM.BR', '100.00', '31fa2c1f83dc17394e02c227f473cd7d', '304736ff9a38778bb5e04560a51a4085', 0, '0', '0', 'imgEvento/95b761cb528c10bff1296627069a6adf.jpg', '0', ''),
('a4c6412111f139e460168051cf947ca9', 'Evento 003', 'Bill Gates', '2016-01-01', '2016-04-30', '14.357.767/000', 'Microsoft LTDA', 'Bill Gates', 'Domingos Marreiros', '66.060-1', 'BelÃ©m', '(91)4006-9', '(91)4006-9', 'promotora@prom.com.br', '100.00', '31fa2c1f83dc17394e02c227f473cd7d', '304736ff9a38778bb5e04560a51a4085', 0, '0', '', 'imgEvento/b893d2b2893c23ac615508db45ce8867.jpg', '', '201602293');

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
('c66b032b04fb91ae862f1450ddd2d7a4', 'Estudante', '50.00', '2015-12-01', '2016-12-30', 'd011ee02cea6eff6b59df5944a7abe26'),
('ceaedda02997a9da3953e3a74201b290', 'MÃ©dico', '300.00', '2015-12-01', '2016-12-30', 'd011ee02cea6eff6b59df5944a7abe26'),
('713711adb967a1492a1310b1b697ba6b', 'Profissional Associado', '250.00', '2015-12-01', '2016-12-30', 'd011ee02cea6eff6b59df5944a7abe26'),
('a4d7aa068dadcd89c32f5781e93f3dd6', 'Estudante', '70.00', '2016-01-01', '2016-01-15', 'd011ee02cea6eff6b59df5944a7abe26'),
('d7e0c61b21981a3c9d88226644a71947', 'Palestras', '100.00', '2016-01-01', '2016-03-20', '335b38c5779a99886a31b2179ef87a8d');

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
  `COD_InscricaoExterno` varchar(20) NOT NULL,
  `Num_Inscricao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evt_evento_participante`
--

INSERT INTO `evt_evento_participante` (`ID_EVT_Evento_Pariticipante`, `DSC_Nome_Crachav`, `COD_Barras_Cracha`, `VLR_Total`, `VLR_Total_Inscricao`, `QTD_CargaHoraria_Realizada`, `COD_Nivel_Participante`, `ID_EVT_Pagamento`, `ID_EVT_Categoria`, `ID_EVT_Evento`, `ID_BSC_Participante`, `ID_EVT_Participante_Pai`, `COD_Tipo_SIT_Certificado`, `DTM_Entrega_Certificado`, `ID_SEG_DetalheTransacao`, `SIT_EH_Parcelado`, `ID_EVT_EventoGrupo`, `COD_TipoSituacao_Material`, `DTM_EntregaMaterial`, `COD_InscricaoExterno`, `Num_Inscricao`) VALUES
('f9c94d5135594b4b761ad078e2914be5', 'Cleyton Carlos Queiroz Costa', '66129273215', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', 'f22b54f28abf053d4da5fa0c1fd61010', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('c3c64780366fc51e53e048a43ac859e8', 'Cleyton Carlos Queiroz Costa', '66129273215', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '8b9170dfbb995813227a6d459274c015', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('9365f2c9496e73446642814f1b163332', 'Chrystyan Godoy', '52863298291', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', 'bb62a69d87cc5f6ef7623de86a7e0d19', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('0504acd402eff3a9190e9b010ad70078', 'Renato AraÃºjo de Souza Filho', '83966853396', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '3d16762825fcdfd93b57610f871c2f6a', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('9e7f398e2a1b12dfc18a0e7597d56808', 'Douglas Wolff', '44145246608', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '0bf7877d73cee371879fe175c27429e5', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('1ea11a07340504d6a4afdf6280fa9e6b', 'Romero Silva Arcanjo', '57964859382', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '0f3fa5b8d881ce5d0b766c19c1674a8b', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('6c6139dbfbc4d2579fffa214a2f58acd', 'Jaqueline Arcanjo dos Santos', '25517954278', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', 'a87849d8ecc5a1483db7069ac86526a5', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('990132ff84ca1c2f3f70e8e1583da8ac', 'JoÃ£o De Souto.', '94671561808', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '073c3014efec8a731335fce156b89148', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('acf4c034f576a84f5a28ea020a381cd3', 'Jessica da Rocha', '67854535507', '50.00', '50.00', '0.00', 0, 0, 'c66b032b04fb91ae862f1450ddd2d7a4', 'd011ee02cea6eff6b59df5944a7abe26', '4fefe071d406e6b77963e577d530b267', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('56c993a1887370b5da372ab659e1c411', 'Cleyton Carlos Queiroz Costa', '18677538399', '300.00', '300.00', '0.00', 0, 0, 'ceaedda02997a9da3953e3a74201b290', 'd011ee02cea6eff6b59df5944a7abe26', '4d7be967c4ce2062ab1fc2d18132a24d', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('959fa3ef7630f8b48b52fbcc4fecec4b', 'Joao Paulo Souza', '75402629234', '300.00', '300.00', '0.00', 0, 0, 'ceaedda02997a9da3953e3a74201b290', 'd011ee02cea6eff6b59df5944a7abe26', '62f85622935ed4d47a06408fd0fa4ebc', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '0', '0'),
('0439620ee332ea7b954c54699c018136', '', '52863298291', '100.00', '100.00', '0.00', 0, 0, 'd7e0c61b21981a3c9d88226644a71947', '335b38c5779a99886a31b2179ef87a8d', 'bb62a69d87cc5f6ef7623de86a7e0d19', 0, 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', '1', '0');

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

--
-- Extraindo dados da tabela `evt_pagamento`
--

INSERT INTO `evt_pagamento` (`ID_Pagamento`, `DT_Transacao`, `DT_Pagamento`, `VLR_Transacao`, `VR_Pago`, `NUM_Recibo`, `COD_TipoFormaPagamento`, `COD_TipoOrigemInscricao`, `ID_EVT_Evento`, `ID_EVT_Pagamento_Pai`, `COD_Tipo_Situacao_Pagamento`, `QTD_Parcelas`, `NUM_Parcelas`, `QTD_Parcelas_Pagas`) VALUES
('f5f3d856497bc74e076685b00786a7b9', '2016-02-03 15:33:57', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, 'f9c94d5135594b4b761ad078e2914be5', '0', 1, 0, 0, 0),
('31df5b51bc7857c234018504a7d454ca', '2016-02-15 14:02:37', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, 'c3c64780366fc51e53e048a43ac859e8', '0', 0, 0, 0, 0),
('38a3965e4ff39c68a553adba9caa3481', '2016-02-15 14:02:48', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '9365f2c9496e73446642814f1b163332', '0', 2, 0, 0, 0),
('e9751fcabd5c676d6fb536d8144288ad', '2016-02-18 03:42:14', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '0504acd402eff3a9190e9b010ad70078', '0', 1, 0, 0, 0),
('ba89a2c0a16d4eb4e5907c8967e57b7b', '2016-02-15 14:02:29', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '9e7f398e2a1b12dfc18a0e7597d56808', '0', 0, 0, 0, 0),
('6e414809e3e589a3283f947dcdfd2006', '2016-02-03 15:32:08', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '1ea11a07340504d6a4afdf6280fa9e6b', '0', 0, 0, 0, 0),
('530d0d3d255dc9c77f1605f73fbfe2e7', '2016-02-03 15:32:05', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '6c6139dbfbc4d2579fffa214a2f58acd', '0', 0, 0, 0, 0),
('3bead11d7e73efd2786f98a3f333467a', '2016-02-15 14:01:05', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '990132ff84ca1c2f3f70e8e1583da8ac', '0', 1, 0, 0, 0),
('5a5c1b4fe7fdf84bfa60ad89cf1e657f', '2016-02-15 13:57:28', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, 'acf4c034f576a84f5a28ea020a381cd3', '0', 1, 0, 0, 0),
('5d98f37122a14358fb545e6e6ffeae04', '2016-02-15 15:33:50', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '56c993a1887370b5da372ab659e1c411', '0', 2, 0, 0, 0),
('ce72afef5ff8114c2bfd29b8ae99e2b5', '2016-02-15 14:02:25', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '959fa3ef7630f8b48b52fbcc4fecec4b', '0', 0, 0, 0, 0),
('46520049e85c3f30a12cdca5521f6931', '2016-02-24 03:00:00', '0000-00-00 00:00:00', '0.00', '0.00', '0', 0, 0, '0439620ee332ea7b954c54699c018136', '0', 1, 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_grupo`
--

INSERT INTO `seg_grupo` (`ID_Grupo`, `DSC_Nome`, `DSC_Descricao`) VALUES
(1, 'Administradores', 'Grupo de Administradores do Sistema'),
(99, 'Participantes de Eve', 'Grupo de Participantes de Eventos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

DROP TABLE IF EXISTS `seg_usuario`;
CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `ID_Usuario` varchar(50) NOT NULL,
  `DSC_Login` varchar(50) NOT NULL,
  `DSC_Senha` varchar(150) NOT NULL,
  `DTM_Inicio` date NOT NULL,
  `DTM_Fim` date NOT NULL,
  `ID_SEG_Grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`ID_Usuario`, `DSC_Login`, `DSC_Senha`, `DTM_Inicio`, `DTM_Fim`, `ID_SEG_Grupo`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-12-01', '2099-12-31', 0),
('88d6f6bf17fc5af881b08f0db97cb62e', '52863298291', 'c0b30ea9e7349c5f3edcbefeb478d518', '2016-03-01', '2016-03-08', 99);

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
('a4f3a8de36bdd5001e345c13718aca11', 'AC', 'Acre'),
('67547fa96b3d22d8982562efebf58952', 'AL', 'Alagoas'),
('6250b01c82a22e925135a2840f93b538', 'AM', 'Amazonas'),
('f7d824d3d4abbc3d5c056c91e9333f34', 'AP', 'AmapÃ¡'),
('b2e8a1b52dbbcd2bfd5d512d9427f5e1', 'BA', 'Bahia'),
('6dfbceb43a5f052e83ee5136131d965c', 'CE', 'CearÃ¡'),
('c6ce0dc588e058f72b92cacb19991d20', 'DF', 'Distrito Federal'),
('983d020cc165553b49de8663659ddba4', 'ES', 'Espirito Santo'),
('91024e0dfd116e5ccefa6a3d79bc8d50', 'GO', 'Goias'),
('1e2df70beaa4612752155ecc39a9efd2', 'MA', 'MaranhÃ£o'),
('36e561f31d651f417ba651534fb50cb5', 'MT', 'Mato Grosso'),
('f5f14377214c2006c71b72b40b6da0de', 'MS', 'Mato Grosso do Sul'),
('68fc0f4f690020a062a1e51139dd1de0', 'MG', 'Minas Gerais'),
('304736ff9a38778bb5e04560a51a4085', 'PA', 'ParÃ¡'),
('8b0f6670c366eafae1f273ba0c7b723b', 'PB', 'Paraiba'),
('fae7a484c19d516b1b2a5d50a1f1ec38', 'PR', 'ParanÃ¡'),
('e6398a281496ffd628166dcb18a4aea0', 'PE', 'Pernambuco'),
('4d62aeb6b56287df27dc720699992d6b', 'PI', 'PiauÃ­'),
('cc68c779aa3cf0db42522aee11ef366a', 'RJ', 'Rio de Janeiro'),
('ef1504b43aed1ac923065ba5d3853265', 'RN', 'Rio Grande do Norte'),
('499c97d19f3f1d192d94e9f2a95bb3bf', 'RS', 'Rio Grande do Sul'),
('38637a52f112b8303ddd97b2e49c3ed8', 'RO', 'RondÃ´nia'),
('73a03c3c3504d2179a593238d64ad2f1', 'RR', 'Roraima'),
('695ce19d8e4e9fa719ce4305ebc690af', 'SC', 'Santa Catarina'),
('08f34663e59b00509abf06e4a8d57bec', 'SP', 'SÃ£o Paulo'),
('5f4fa59f4a31fa1ea03c8319ad402ebf', 'SE', 'Sergipe'),
('d95fb31a097d5b2d49f5d075e7853e9a', 'TO', 'Tocantins');

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
-- AUTO_INCREMENT for table `bsc_empresa`
--
ALTER TABLE `bsc_empresa`
  MODIFY `ID_Empresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bsc_profissao`
--
ALTER TABLE `bsc_profissao`
  MODIFY `ID_Profissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
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
