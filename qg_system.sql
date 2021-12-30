-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Dez-2021 às 21:40
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `qg_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmados`
--

CREATE TABLE `confirmados` (
  `id` int(11) NOT NULL,
  `re` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `journey` varchar(30) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos`
--

CREATE TABLE `postos` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `qtd_vigilantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postos`
--

INSERT INTO `postos` (`id`, `department`, `qtd_vigilantes`) VALUES
(1, 'PORTARIA 1', 2),
(2, 'PORTARIA 2', 2),
(3, 'PORTARIA 3', 1),
(4, 'ODONTOLOGIA', 1),
(5, 'FARMACIA ADM', 1),
(6, 'FARMACIA M', 1),
(7, 'FARMACIA R', 1),
(8, 'FARMACIA S', 1),
(9, 'FILOSOFIA', 1),
(10, 'QUIMICA', 3),
(11, 'ESCOLINHA', 1),
(12, 'NOVA ECA', 1),
(13, 'TULHA', 1),
(14, 'ZOOLOGIA', 1),
(15, 'DIREITO', 2),
(16, 'ENFERMAGEM', 3),
(17, 'EDUC. FISICA', 1),
(18, 'CIRURGIA EXPERIMENTAL', 1),
(19, 'PREDIO CENTRAL', 1),
(20, 'VIROLOGIA', 1),
(21, 'PATOLOGIA', 1),
(22, 'FEA', 2),
(23, 'CASA DA FEA', 1),
(24, 'GENETICA A', 1),
(25, 'GENETICA C', 1),
(26, 'TEATRO', 0),
(27, 'CASA DOS BAMBUS', 0),
(28, 'SAUDE MENTAL', 0),
(29, 'RESTAURANTE', 0),
(30, 'VILA ESTUDANTIL', 0),
(31, 'NUCLEO 01', 0),
(32, 'NUCLEO 03', 0),
(33, 'NUCLEO 05', 0),
(34, 'NUCLEO 06', 0),
(35, 'NUCLEO VILA LOBATO', 0),
(36, 'CUIABA', 0),
(37, 'ECEU', 0),
(40, 'ODONTOLOGIA/ P1/ P2', 0),
(42, 'PATOLOGIA/ ZOOLOGIA', 0),
(43, 'FEA/ CIR. EXPERIMENTAL', 0),
(44, 'P3/ CASA DA FEA/ ED. FISICA', 0),
(46, 'FARMACIA S/ M/ R', 0),
(47, 'TULHA/ PATOLOGIA/ ESCOLINHA', 0),
(49, 'QUIMICA/ PREDIO CENTRAL', 0),
(50, 'FILOSOFIA/ GENETICA A/ GENETICA C', 0),
(52, 'NUCLEO 1/ 3/ 5/ 6', 0),
(53, 'VILA LOBATO/ ECEU/ SAUDE MENTAL', 0),
(54, 'RESTAURANTE/ VILA. ESTUDANTIL', 0),
(55, 'QUADRA/ TEATRO/ CEFER', 0),
(56, 'DIREITO/ ENFERMAGEM', 0),
(57, 'EDUC. FISICA/ CASA DOS BAMBUS/ PISCINA', 0),
(58, 'SAUDE MENTAL/ FILOSOFIA/ VIROLOGIA', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `re` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `journey` varchar(30) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `re`, `perfil`, `name`, `department`, `journey`, `login`, `password`, `confirmado`, `token`) VALUES
(1, 1111, 'admin', 'RAFAEL CARVALHO', 'ADM', '', 'carvalho', '1234', 0, '2d46ed25a17469f2e915b85bdbc4e484'),
(2, 1112, 'comum', 'FERNANDO JOAQUIM', 'FARMACIA S/ M/ R', '19:00 AS 23:00', 'fernando', '1234', 1, 'dda56a09878061e20b8a0e280eff1515'),
(3, 1113, 'comum', 'RAMON DA SILVA', 'PATOLOGIA/ ZOOLOGIA', '19:00 AS 23:00', 'ramon', '1234', 1, '5500bbcf39f86475ca09d7bfdfdeceda'),
(4, 1114, 'comum', 'EVANDRO LUCAS DA SILVA', 'QUIMICA/ PREDIO CENTRAL', '19:00 AS 23:00', 'evandro', '1234', 0, 'c30cd3dccf9af20379a519f45b9e239e'),
(5, 1115, 'comum', 'JANTISTA DA USP', 'FEA/ CIR. EXPERIMENTAL', '19:00 AS 23:00', 'jantista', '1234', 0, '0ad0a9c35800e9cae6b0bceac43c3685'),
(7, 6661, 'comum', 'CRISTIANO ARAUJO', 'TULHA/ PATOLOGIA/ ESCOLINHA', '19:00 AS 23:00', 'cristiano', '1234', 0, '7d39e0e72c717ca5244232ad25bbe178'),
(8, 7779, 'comum', 'WALDEMAR CUSTODIO PEREIRA', 'FILOSOFIA/ GENETICA A/ GENETICA C', '19:00 AS 23:00', 'waldemar', '1234', 0, '3619f20910446597a9b59b16cb6a935a'),
(9, 9999, 'comum', 'RICARDO THOMPSON DE SOUZA', 'ODONTOLOGIA/ P1/ P2', '19:00 AS 23:00', 'ricardo', '1234', 1, '5279828c19170de3276a0054e313fab1'),
(10, 9876, 'comum', 'RODRIGO ANDREOLI', 'P3/ CASA DA FEA/ ED. FISICA', '19:00 AS 23:00', 'rodrigo', '1234', 0, '092bb920ab4a257d9753f1801f7be314'),
(11, 6555, 'comum', 'PEDRO PAULO DA SILVA', 'FARMACIA S/ M/ R', '10:00 AS 14:00', 'pedro', '1234', 0, '5451c72b2889f02e1daa9898e94132fa'),
(12, 5509, 'comum', 'ALMOCISTA DA USP', 'PATOLOGIA/ ZOOLOGIA', '10:00 AS 14:00', 'almocista', '1234', 0, 'd5037cc1e450266a6952c45c81fb7221'),
(13, 1132, 'comum', 'FERDINANDO GONCALVES', 'QUIMICA/ PREDIO CENTRAL', '10:00 AS 14:00', 'ferdinando', '1234', 0, '0a50c4045f6ef8a6904a6dd0b14c15fb'),
(14, 7007, 'comum', 'LUCIANO DOS SANTOS', 'DIREITO', '18:00 AS 06:00', 'luciano', '1234', 1, '6c3baa63c180f826f6fb2a029be40a5a'),
(15, 2356, 'comum', 'EDILSON MACEDO', 'DIREITO', '18:00 AS 06:00', 'edilson', '1234', 0, 'cf04e487a3a497e731160ed955f3ca69'),
(16, 5390, 'comum', 'THIAGO FERREIRA', 'QUIMICA', '18:00 AS 06:00', 'thiago', '1234', 1, '94c59d525dda3dc31f64dd755b9d73c1'),
(17, 6461, 'comum', 'RAFAEL CARVALHO', 'QUIMICA', '18:00 AS 06:00', 'rafael', '1234', 0, '29b7e50e6d805d7b379961b652a6a468'),
(18, 4320, 'comum', 'OSVALDO GUIMARAES', 'QUIMICA', '18:00 AS 06:00', 'osvaldo', '1234', 1, '3d5c2712f9a27fc2ecc82b040d40fb14'),
(19, 6888, 'comum', 'AGNALDO PETERSON', 'PORTARIA 1', '18:00 AS 06:00', 'agnaldo', '1234', 0, ''),
(20, 8909, 'comum', 'JULIANO BUENO', 'PORTARIA 2', '18:00 AS 06:00', 'juliano', '1234', 0, ''),
(21, 5727, 'comum', 'ANDRE FELIPE ', 'FEA', '18:00 AS 06:00', 'andre', '1234', 0, ''),
(22, 3243, 'comum', 'ARNALDO ANTONIO', 'ENFERMAGEM', '18:00 AS 06:00', 'arnaldo', '1234', 0, 'e710e7e37e779d1f98be43108605f717'),
(23, 1724, 'comum', 'PAULO FONSECA', 'GENETICA A', '18:00 AS 06:00', 'paulo', '1234', 0, '6e7eb08649d6f97a78f6466515043bbe'),
(24, 4632, 'comum', 'JOSE ADAILTON', 'FEA/ CIR. EXPERIMENTAL', '10:00 AS 14:00', 'jose', '1234', 0, '6a44a4db9a2bf5d70c1869b1b1e2eeef'),
(25, 4590, 'comum', 'JONATAS RODRIGUES', 'PORTARIA 3', '18:00 AS 06:00', 'jonatas', '1234', 0, '2898ab6d658e693a3c56ab28a4f07ef8'),
(26, 7767, 'comum', 'MARCELO ESCOLANO', 'CIRURGIA EXPERIMENTAL', '18:00 AS 06:00', 'marcelo', '1234', 1, 'e0616d76f7075906c02db136f6789cfe'),
(27, 6390, 'comum', 'EMERSON OLIVEIRA', 'CASA DA FEA', '18:00 AS 06:00', 'emerson', '1234', 1, '35a16c19ee9e8773f64f4c17a855b2c6'),
(28, 4190, 'comum', 'RICARDO DA SILVA', 'ODONTOLOGIA', '18:00 AS 06:00', 'ricardo', '1234', 0, ''),
(29, 2112, 'comum', 'DONIZETE ANTONIO', 'NUCLEO 1/ 3/ 5/ 6', '19:00 AS 23:00', 'donizete', '1234', 0, ''),
(30, 6721, 'comum', 'LUIS CARLOS TREVISAN', 'VILA LOBATO/ ECEU/ SAUDE MENTAL', '19:00 AS 23:00', 'luis', '1234', 0, ''),
(31, 5565, 'comum', 'CICERO GOMES DA COSTA', 'RESTAURANTE/ VILA. ESTUDANTIL', '19:00 AS 23:00', 'cicero', '1234', 0, ''),
(32, 1235, 'comum', 'OSMAR MARIA DE SOUZA', 'QUADRA/ TEATRO/ CEFER', '19:00 AS 23:00', 'osmar', '1234', 0, ''),
(33, 9182, 'comum', 'RENATO VASCONCELOS', 'DIREITO/ ENFERMAGEM', '19:00 AS 23:00', 'renato', '1234', 0, ''),
(34, 9124, 'comum', 'MARCOS BOPE', 'EDUC. FISICA/ CASA DOS BAMBUS/ PISCINA', '19:00 AS 23:00', 'marcos', '1234', 0, '054bad580ef97ab8de4706b51d07d31e'),
(35, 4422, 'comum', 'EDER VILA NOVA', 'SAUDE MENTAL/ FILOSOFIA/ VIROLOGIA', '19:00 AS 23:00', 'eder', '1234', 0, ''),
(36, 2524, 'comum', 'ALINE MOREIRA', 'TULHA/ PATOLOGIA/ ESCOLINHA', '10:00 AS 14:00', 'aline', '1234', 0, ''),
(37, 5890, 'comum', 'FERNANDA ANTONELLA', 'FILOSOFIA/ GENETICA A/ GENETICA C', '10:00 AS 14:00', 'fernanda', '1234', 0, '83680dc6f7e94518122ff359cc9687f0'),
(38, 3324, 'comum', 'JULIANA REZENDE', 'ODONTOLOGIA/ P1/ P2', '10:00 AS 14:00', 'juliana', '1234', 0, ''),
(39, 6632, 'comum', 'WESLEY DE SOUZA', 'NUCLEO 1/ 3/ 5/ 6', '10:00 AS 14:00', 'wesley', '1234', 0, ''),
(40, 5595, 'comum', 'FABIO FERREIRA', 'P3/ CASA DA FEA/ ED. FISICA', '10:00 AS 14:00', 'fabio', '1234', 0, 'dda05489b6eed4d7c0740bb289bb01fd'),
(41, 1010, 'admin', 'ADMIN', 'base', '', 'admin', '1234', 0, '994af79f3c747cb777c9826650124d5c'),
(42, 4532, 'comum', 'CARLOS ALBERTO DA SILVA', 'PORTARIA 1', '18:00 AS 06:00', 'carlos', '1234', 0, ''),
(43, 9911, 'comum', 'GIOVANI PEREIRA', 'PORTARIA 2', '18:00 AS 00:00', 'giovani', '1234', 1, '1c594a3acfafde4d415236d0d5fc1941'),
(44, 1212, 'comum', 'JEFERSON SCRATZ', 'ENFERMAGEM', '18:00 AS 06:00', 'jeferson', '1234', 0, ''),
(45, 4620, 'comum', 'EVERTON', 'ENFERMAGEM', '18:00 AS 06:00', 'everton', '1234', 0, ''),
(46, 2236, 'comum', 'VINICIUS DE SOUZA', 'FEA', '18:00 AS 06:00', 'vinicius', '1234', 0, ''),
(47, 2566, 'comum', 'ALCIR BENEDITO', 'VIROLOGIA', '18:00 AS 06:00', 'alcir', '1234', 0, ''),
(48, 1789, 'comum', 'RAIMUNDO LABATE', 'PREDIO CENTRAL', '18:00 AS 06:00', 'raimundo', '1234', 0, ''),
(49, 3326, 'comum', 'RUBENS CAVALCANTI', 'GENETICA C', '18:00 AS 06:00', 'rubens', '1234', 0, ''),
(50, 5510, 'comum', 'WILSON MOREIRA', 'FARMACIA ADM', '18:00 AS 06:00', 'wilson', '1234', 0, ''),
(51, 7891, 'comum', 'MARCIO JOVINO', 'FARMACIA M', '18:00 AS 06:00', 'marcio', '1234', 0, ''),
(52, 4563, 'comum', 'JOAO SANTOS LIMA', 'FARMACIA R', '18:00 AS 06:00', 'joao', '1234', 0, ''),
(53, 3139, 'comum', 'MICHEL DE PADUA', 'FARMACIA S', '18:00 AS 06:00', 'michel', '1234', 0, ''),
(54, 5888, 'comum', 'CAIO HENRIQUE', 'FILOSOFIA', '10:00 AS 22:00', 'caio', '1234', 0, ''),
(55, 2239, 'comum', 'JORGE PRADO', 'ESCOLINHA', '18:00 AS 06:00', 'jorge', '1234', 0, ''),
(56, 3277, 'comum', 'SEBASTIAO ANTUNES', 'NOVA ECA', '18:00 AS 06:00', 'sebastiao', '1234', 0, ''),
(57, 3315, 'comum', 'JULIO MESQUITA', 'TULHA', '18:00 AS 06:00', 'julio', '1234', 0, ''),
(58, 6698, 'comum', 'MICHAEL JACKSON', 'ZOOLOGIA', '18:00 AS 06:00', 'michael', '1234', 0, ''),
(59, 8828, 'comum', 'CLAUDINEI LIMA', 'EDUC. FISICA', '18:00 AS 06:00', 'claudinei', '1234', 0, ''),
(60, 1448, 'comum', 'IRAMAR DOS SANTOS ', 'PATOLOGIA', '18:00 AS 06:00', 'iramar', '1234', 0, '15274ccd3e4ff12cda894c7b7d163075'),
(61, 4090, 'comum', 'NIVALDO DE MORAIS', 'TEATRO', '18:00 AS 06:00', 'nivaldo', '1234', 0, ''),
(62, 5615, 'comum', 'WILLIAM ALMEIDA ', 'CASA DOS BAMBUS', '18:00 AS 06:00', 'william', '1234', 0, ''),
(63, 2996, 'comum', 'ADRIANO BORGES', 'SAUDE MENTAL', '18:00 AS 06:00', 'adriano', '1234', 0, ''),
(64, 7332, 'comum', 'RONEI CARDOSO', 'RESTAURANTE', '18:00 AS 06:00', 'ronei', '1234', 0, ''),
(65, 5729, 'comum', 'LEONARDO FARIA', 'RESTAURANTE', '18:00 AS 06:00', 'leonardo', '1234', 0, ''),
(66, 4826, 'comum', 'LEANDRO GONCALVES', 'VILA ESTUDANTIL', '18:00 AS 06:00', 'leandro', '1234', 0, ''),
(67, 4397, 'comum', 'RONALDO TEIXEIRA', 'VILA ESTUDANTIL', '18:00 AS 06:00', 'ronaldo', '1234', 0, ''),
(68, 6370, 'comum', 'ALAN FERNANDES', 'NUCLEO 01', '18:00 AS 06:00', 'alan', '1234', 0, ''),
(69, 4083, 'comum', 'MANASSES SANTANA', 'NUCLEO 03', '18:00 AS 06:00', 'manasses', '1234', 0, ''),
(70, 2217, 'comum', 'ALTAIR MENDES FILHO', 'NUCLEO 05', '18:00 AS 06:00', 'altair', '1234', 0, ''),
(71, 6213, 'comum', 'JEAN CORREIA', 'NUCLEO 06', '18:00 AS 06:00', 'jean', '1234', 0, ''),
(72, 1101, 'comum', 'GREGORIO ARAUJO', 'NUCLEO VILA LOBATO', '18:00 AS 06:00', 'gregorio', '1234', 0, ''),
(73, 4142, 'comum', 'HELENO JUSTINO MENDES', 'CUIABA', '18:00 AS 06:00', 'heleno', '1234', 0, ''),
(74, 4154, 'comum', 'LAERCE COLLEMAN', 'ECEU', '18:00 AS 06:00', 'laerce', '1234', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `confirmados`
--
ALTER TABLE `confirmados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postos`
--
ALTER TABLE `postos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `confirmados`
--
ALTER TABLE `confirmados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `postos`
--
ALTER TABLE `postos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
