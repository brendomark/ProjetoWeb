-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2020 às 17:24
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estadocivil`
--

CREATE TABLE `estadocivil` (
  `id` varchar(1) NOT NULL,
  `descricao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `estadocivil`
--

INSERT INTO `estadocivil` (`id`, `descricao`) VALUES
('C', 'Casado'),
('D', 'Desquitado'),
('E', 'União Está'),
('I', 'Divorciado'),
('O', 'Outros'),
('P', 'Separado'),
('S', 'Solteiro'),
('V', 'Viúvo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id_estado` smallint(5) UNSIGNED NOT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(19) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `uf`, `estado`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espirito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RN', 'Rio Grande do Norte'),
(20, 'RS', 'Rio Grande do Sul'),
(21, 'RJ', 'Rio de Janeiro'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `dtnasc` date NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `naturalidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estadocivil` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `sobrenome`, `cpf`, `rg`, `dtnasc`, `estado`, `naturalidade`, `estadocivil`) VALUES
(21, 'BRENDO', 'OLIVEIRA', '121.321.519-54', '123456', '1996-11-09', 'RJ', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pcodnacao`
--

CREATE TABLE `pcodnacao` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `pcodnacao`
--

INSERT INTO `pcodnacao` (`codigo`, `nacao`, `descricao`) VALUES
(0, 'Colômbia', ''),
(10, 'Brasileira', ''),
(20, 'Naturalizado Brasileiro', ''),
(21, 'Argentina', ''),
(22, 'Boliviana', ''),
(23, 'Chilena', ''),
(24, 'Paraguaia', ''),
(25, 'Uruguaia', ''),
(27, 'Equador', ''),
(28, 'Antígua E. Dep. Barbuda', ''),
(29, 'Antilhas Holandesas', ''),
(30, 'Alemã', ''),
(31, 'Belga', ''),
(32, 'Britânica', ''),
(33, 'Aruba', ''),
(34, 'Canadense', ''),
(35, 'Espanhola', ''),
(36, 'Norte-Americana', ''),
(37, 'Francesa', ''),
(38, 'Suiça', ''),
(39, 'Italiana', ''),
(40, 'Comunidade Das Bahamas', ''),
(41, 'Japonesa', ''),
(42, 'Chinesa', ''),
(43, 'Coreana', ''),
(44, 'Barbados', ''),
(45, 'Portuguesa', ''),
(46, 'Belize', ''),
(47, 'Ilhas Turks E Caicos', ''),
(48, 'Lat. Americana', ''),
(49, 'Asiática (Exc.Jap.)', ''),
(50, 'Outros', ''),
(51, 'Costa Rica', ''),
(52, 'Cuba', ''),
(53, 'Curaçao', ''),
(54, 'Comunidade Dominicana', ''),
(55, 'República Dominicana', ''),
(56, 'República De El Salvador', ''),
(57, 'Estados Assoc. Das Antilhas', ''),
(58, 'Ilhas Falklands', ''),
(59, 'Granada', ''),
(60, 'Ilhas Guadalupe', ''),
(61, 'Guatemala', ''),
(62, 'República Do Haiti', ''),
(63, 'Honduras Britânicas', ''),
(64, 'Honduras', ''),
(65, 'Ilhas Serranas', ''),
(66, 'Jamaica', ''),
(67, 'Ilhas Malvinas', ''),
(68, 'Martinica', ''),
(69, 'Ilha Milhos', ''),
(70, 'Monte Serrat137 Montenegro', ''),
(71, 'Nicarágua', ''),
(72, 'Panamá', ''),
(73, 'Panamá – Zona Do Canal', ''),
(74, 'Porto Rico', ''),
(75, 'Quitasueno', ''),
(76, 'Roncador', ''),
(77, 'Santa Lúcia', ''),
(78, 'São Cristóvão', ''),
(79, 'São Vicente', ''),
(80, 'Ilhas Turca', ''),
(81, 'Ilhas Virgens Britânicas', ''),
(82, 'Ilhas Virgens Americanas', ''),
(83, 'Bermudas', ''),
(84, 'Groenlândia', ''),
(85, 'México', ''),
(87, 'Guiana Francesa', ''),
(88, 'República Guiana', ''),
(89, 'Peru', ''),
(90, 'Suriname', ''),
(91, 'Trinidad E Tobago', ''),
(92, 'Venezuela', ''),
(93, 'Albânia', ''),
(94, 'Andorra', ''),
(95, 'Áustria', ''),
(96, 'Bulgária', ''),
(97, 'Chipre', ''),
(98, 'Dinamarca', ''),
(99, 'Eire', ''),
(100, 'Escócia', ''),
(101, 'Ilhas Faroes', ''),
(102, 'Finlândia', ''),
(103, 'Gibraltar', ''),
(104, 'Grécia', ''),
(105, 'Holanda', ''),
(106, 'Hungria', ''),
(107, 'Ilhas Baleares', ''),
(108, 'Ilhas Cosmoledo (Lomores)', ''),
(109, 'Ilhas Do Canal', ''),
(110, 'Inglaterra', ''),
(111, 'Irlanda Do Norte', ''),
(112, 'Irlanda', ''),
(113, 'Islândia', ''),
(114, 'Iugoslávia', ''),
(115, 'Liechtenstein', ''),
(116, 'Luxemburgo', ''),
(117, 'Ilhas De Man', ''),
(118, 'Mônaco', ''),
(119, 'Noruega', ''),
(120, 'República De Malta', ''),
(121, 'País De Gales', ''),
(122, 'Países Baixos', ''),
(123, 'Polônia', ''),
(124, 'Romênia', ''),
(125, 'San Marino', ''),
(126, 'Suécia', ''),
(127, 'Svalbard E Jan Mayer,Is', ''),
(128, 'Tchecoslováquia', ''),
(129, 'Estado Da Cidade Do Vaticano', ''),
(130, 'Croácia', ''),
(131, 'Sérvia', ''),
(132, 'Eslovênia', ''),
(133, 'República Da Macedônia', ''),
(134, 'Bósnia Herzegovina', ''),
(135, 'República Tcheca', ''),
(136, 'Eslováquia', ''),
(138, 'Azerbaijão', ''),
(139, 'Bashkista', ''),
(140, 'República Da Bielorrússia', ''),
(141, 'Buryat', ''),
(142, 'Carelia', ''),
(143, 'Cazaquistão', ''),
(144, 'Chechen Ingusth', ''),
(145, 'Chuvash', ''),
(146, 'Dagesta', ''),
(147, 'Estônia', ''),
(148, 'Geórgia', ''),
(149, 'Gorno Altai', ''),
(150, 'Kabardino Balkar', ''),
(151, 'Kalmir', ''),
(152, 'Karachaevocherkess', ''),
(153, 'Khakass', ''),
(154, 'Komi', ''),
(155, 'Letônia', ''),
(156, 'Lituânia', ''),
(157, 'Mari', ''),
(158, 'Moldávia', ''),
(159, 'Ossetia Setentrional', ''),
(160, 'Quirguistão', ''),
(161, 'Tadjiquistão', ''),
(162, 'Tartaria', ''),
(163, 'Turcomenistão', ''),
(164, 'Tuvin', ''),
(165, 'Ucrânia', ''),
(166, 'Udmurt', ''),
(167, 'União Soviética', ''),
(168, 'Uzbequistão', ''),
(169, 'Yakut', ''),
(170, 'Abissínia', ''),
(171, 'Açores', ''),
(172, 'Afar Frances', ''),
(173, 'República Da África Do Sul', ''),
(174, 'Alto Volta', ''),
(175, 'Angola', ''),
(176, 'Argélia', ''),
(177, 'Bechuanalândia', ''),
(178, 'Benin', ''),
(179, 'Botsuana', ''),
(180, 'Burundi', ''),
(181, 'Camarões', ''),
(182, 'Ceuta E Melilla', ''),
(183, 'Chade', ''),
(184, 'Ilhas Comores', ''),
(185, 'Congo', ''),
(186, 'Costa Do Marfim', ''),
(187, 'Daomé', ''),
(188, 'Djibuti', ''),
(189, 'República Árabe Do Egito', ''),
(190, 'Etiópia', ''),
(191, 'República Do Gabão', ''),
(192, 'Gâmbia', ''),
(193, 'Gana', ''),
(194, 'Gaza', ''),
(195, 'Guiné', ''),
(196, 'Guiné Equatorial', ''),
(197, 'Ifni', ''),
(198, 'Ascensão E Tristão Da Cunha,Is', ''),
(199, 'Ilhas Canárias', ''),
(200, 'Lesoto', ''),
(201, 'Libéria', ''),
(202, 'Líbia', ''),
(203, 'Madeira', ''),
(204, 'Malawi', ''),
(205, 'Madagascar', ''),
(206, 'Mali ', ''),
(207, 'Marrocos', ''),
(208, 'Maurício', ''),
(209, 'Mauritânia', ''),
(210, 'Moçambique', ''),
(211, 'Nguane', ''),
(212, 'República Do Níger', ''),
(213, 'Nigéria', ''),
(214, 'Papua Nova Guiné', ''),
(215, 'Praças Norte Africanas', ''),
(216, 'Protetor Do Sudoeste Africano', ''),
(217, 'Quênia', ''),
(218, 'República Centro Africana', ''),
(219, 'Reunião', ''),
(220, 'Rodésia (Zimbábwe)', ''),
(221, 'Ruanda', ''),
(222, 'Saara Espanhol', ''),
(223, 'Santa Helena', ''),
(224, 'São Tomé E Príncipe', ''),
(225, 'Seychelles', ''),
(226, 'Serra Leoa', ''),
(227, 'Somália, República', ''),
(228, 'Suazilândia', ''),
(229, 'Sudão', ''),
(230, 'Tanganica', ''),
(231, 'Territ. Britânico Do Oceano Índico', ''),
(232, 'Transkei', ''),
(233, 'Togo', ''),
(234, 'Tunísia', ''),
(235, 'Uganda', ''),
(236, 'Zaire', ''),
(237, 'Zâmbia', ''),
(238, 'Burkina Fasso', ''),
(239, 'Zimbábwe', ''),
(240, 'Namíbia', ''),
(241, 'Afeganistão', ''),
(242, 'Arábia Saudita', ''),
(243, 'Bahrein', ''),
(244, 'Birmânia', ''),
(245, 'Brunei', ''),
(246, 'Bhutan', ''),
(247, 'Catar', ''),
(248, 'Ceilão', ''),
(249, 'China (Taiwan)', ''),
(250, 'Coveite', ''),
(251, 'Emirados Árabes Unidos', ''),
(252, 'Filipinas', ''),
(253, 'Hong-Kong', ''),
(254, 'Iemen', ''),
(255, 'Índia', ''),
(256, 'Indonésia', ''),
(257, 'Irã', ''),
(258, 'Iraque', ''),
(259, 'Israel', ''),
(260, 'Jordânia', ''),
(261, 'Kmer/Camboja', ''),
(262, 'Kuwait', ''),
(263, 'Laos', ''),
(264, 'Líbano', ''),
(265, 'Macau', ''),
(266, 'Malásia', ''),
(267, 'Maldivas,Is', ''),
(268, 'Mascate', ''),
(269, 'Mongólia', ''),
(270, 'Nepal', ''),
(271, 'Oman', ''),
(272, 'Palestina', ''),
(273, 'Paquistão', ''),
(274, 'Ruiquiu,Is', ''),
(275, 'Cingapura', ''),
(276, 'Sequin', ''),
(277, 'Síria', ''),
(278, 'Sri-Lanka086 St. Pierre Et Miquelon', ''),
(279, 'Tailândia', ''),
(280, 'Trégua, Estado', ''),
(281, 'Turquia', ''),
(282, 'Vietnã Do Norte', ''),
(283, 'Vietnã Do Sul', ''),
(284, 'Mianma', ''),
(285, 'Arquipélago Manahiki', ''),
(286, 'Arquipélago Midway', ''),
(287, 'Ashmore E Cartier', ''),
(288, 'Austrália', ''),
(289, 'Arquipélago De Bismark', ''),
(290, 'Ilhas Cook', ''),
(291, 'República De Fiji', ''),
(292, 'Guam', ''),
(293, 'Ilhas Baker', ''),
(294, 'Ilhas Cantão E Enderburg', ''),
(295, 'Ilhas Carolinas', ''),
(296, 'Ilhas Do Pacífico', ''),
(297, 'Ilhas Christmas', ''),
(298, 'Ilhas Gilbert', ''),
(299, 'Ilhas Howland E Jarvis', ''),
(300, 'Ilha Johnston E Sand', ''),
(301, 'Ilhas Kingman Reef', ''),
(302, 'Ilhas Macquaire', ''),
(303, 'Ilhas Marianas', ''),
(304, 'Ilhas Marshall', ''),
(305, 'Ilhas Macdonal E Heard', ''),
(306, 'Ilhas Niue', ''),
(307, 'Ilhas Norfolk', ''),
(308, 'Ilhas Palau', ''),
(309, 'Ilhas Salommo', ''),
(310, 'Ilhas Tokelau', ''),
(311, 'Ilhas Wake', ''),
(312, 'Kalimatan', ''),
(313, 'Ilhas Linha', ''),
(314, 'Nauru', ''),
(315, 'Ilhas Nova Caledônia', ''),
(316, 'Nova Guiné', ''),
(317, 'Nova Zelândia', ''),
(318, 'Ilhas Novas Hebridas', ''),
(319, 'Território De Papua', ''),
(320, 'Ilhas Páscoa', ''),
(321, 'Ilhas Pitcairin', ''),
(322, 'Polinésia Francesa', ''),
(323, 'Sabah', ''),
(324, 'Samoa Americana', ''),
(325, 'Samoa Ocidental', ''),
(326, 'Ilhas Santa Cruz', ''),
(327, 'Sarawak', ''),
(328, 'Território De Cocos', ''),
(329, 'Timor', ''),
(330, 'Tonga', ''),
(331, 'Tuvalu', ''),
(332, 'Ilhas Wallis E Futuna', ''),
(333, 'Antártico Britânico, Território', ''),
(334, 'Antártica Francesa', ''),
(335, 'Terr. Antártico Da Austrália', ''),
(336, 'Antártico Chileno', ''),
(337, 'Antártico Argentino', ''),
(338, 'Antártico Noruegues', ''),
(339, 'Apatrida', ''),
(340, 'Dependência De Ross', ''),
(341, 'Terras Austrais', ''),
(342, 'Bangladesh', ''),
(343, 'Cabo Verde', ''),
(344, 'Guiné Bissau', ''),
(345, 'Iemen Do Sul', ''),
(346, 'Kara Kalpak', ''),
(347, 'Armênia', ''),
(348, 'Rússia', ''),
(349, 'Senegal', ''),
(350, 'Tanzânia', ''),
(351, 'Abu Dhabi', ''),
(352, 'AlboranPerejil,Ilhas', ''),
(353, 'Anguilla', ''),
(354, 'Butao', ''),
(355, 'Cachemira', ''),
(356, 'Cayman, Ilhas', ''),
(357, 'Congo, Republica Democratica Do', ''),
(358, 'Coreia (DO Norte), Rep.Pop.Democratica', ''),
(359, 'Dirce', ''),
(360, 'Dubai ', ''),
(361, 'Eritreia', ''),
(362, 'Fezzan ', ''),
(363, 'Fretado P/Brasil', ''),
(364, 'Int.Z.F.Manaus', ''),
(365, 'Jammu ', ''),
(366, 'Jersey, Ilha Do Canal', ''),
(367, 'Kiribati', ''),
(368, 'Lebuan,Ilhas', ''),
(369, 'Moldavia, Republica Da', ''),
(370, 'Niger', ''),
(371, 'Pacifico,Ilhas Do (TERRITORIO Em Fideicomisso Dos ', ''),
(372, 'Reino Unido', ''),
(373, 'Saint Kitts E Nevis', ''),
(374, 'Sikkim', ''),
(375, 'Territorio da Alta Comissao do Pacifico Ocidental', ''),
(376, 'Vanuatu', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pfunc`
--

CREATE TABLE `pfunc` (
  `CODCOLIGADA` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTNASC` date DEFAULT NULL,
  `NATURALIDADE` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NACIONALIDADE` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADOCIVIL` varchar(2) DEFAULT NULL,
  `SEXO` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `GRAUINSTRUCAO` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `RACA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMEPAI` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMEMAE` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELULAR` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RG` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTEMISSAORG` date DEFAULT NULL,
  `ORGAORG` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADORG` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TITULO` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZONA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `SECAO` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTEMISSAOTITULO` date DEFAULT NULL,
  `ESTADOTITULO` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMEROCARTEIRA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `SERIECARTEIRA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTEMISSAOCTPS` date DEFAULT NULL,
  `ESTADOCTPS` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALISTAMENTO` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CATEGORIAMILITAR` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PIS` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CEP` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `LAGRADOURO` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `COMPLEMENTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAIRRO` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `MUNICIPIO` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `BANCO` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `AGENCIA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DAGENCIA` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTA` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DCONTA` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pfunc`
--

INSERT INTO `pfunc` (`CODCOLIGADA`, `ID`, `NOME`, `DTNASC`, `NATURALIDADE`, `NACIONALIDADE`, `ESTADOCIVIL`, `SEXO`, `GRAUINSTRUCAO`, `RACA`, `NOMEPAI`, `NOMEMAE`, `EMAIL`, `TELEFONE`, `CELULAR`, `CPF`, `RG`, `DTEMISSAORG`, `ORGAORG`, `ESTADORG`, `TITULO`, `ZONA`, `SECAO`, `DTEMISSAOTITULO`, `ESTADOTITULO`, `NUMEROCARTEIRA`, `SERIECARTEIRA`, `DTEMISSAOCTPS`, `ESTADOCTPS`, `ALISTAMENTO`, `CATEGORIAMILITAR`, `PIS`, `CEP`, `LAGRADOURO`, `NUMERO`, `COMPLEMENTO`, `BAIRRO`, `MUNICIPIO`, `ESTADO`, `BANCO`, `AGENCIA`, `DAGENCIA`, `CONTA`, `DCONTA`) VALUES
(NULL, 5, 'BRENDO', '1996-11-09', 'RIO DE JANEIRO', '337', 'D', '2', '2', '1', 'ELIEZER', 'ROSANI', 'brendo@brendo', '21 3404-5187', '21 99452-7784', '13798698708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 6, 'JOHN', '2000-01-01', 'RIO DE JANEIRO', '175', 'C', '1', '2', '2', 'DSFGDSAFSADF', 'SADFSADFSAFSDAF', 'contato@qualityrhrio.com.br', '21 3404-5187', '21 99452-7784', '0536659574', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nivelacesso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `nome`, `senha`, `email`, `nivelacesso`) VALUES
(5, '13798698708', 'BRENDO', '12345', 'brendo_mark@hotmail.com', 0),
(6, '0536659574', 'JOHN', '12345', 'contato@qualityrhrio.com.br', 0),
(8, '11111111111', 'admin', 'admin', 'admin@admin.com', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pcodnacao`
--
ALTER TABLE `pcodnacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `pfunc`
--
ALTER TABLE `pfunc`
  ADD PRIMARY KEY (`ID`,`CPF`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`cpf`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
