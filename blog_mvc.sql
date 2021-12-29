-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Dez-2021 às 02:45
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog_mvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `post_title` varchar(100) NOT NULL DEFAULT '0',
  `post_subtitle` varchar(250) NOT NULL DEFAULT '0',
  `post_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `post_title`, `post_subtitle`, `post_description`) VALUES
(23, 1, '5Â° DimensÃ£o', 'A quinta dimensÃ£o Ã© um fator determinante para todas as realizaÃ§Ãµes', 'A prÃ¡tica cotidiana prova que a crescente influÃªncia da mÃ­dia facilita a criaÃ§Ã£o das novas proposiÃ§Ãµes.'),
(24, 1, 'ReuniÃµes diÃ¡rias', 'A importÃ¢ncia das reuniÃµes diÃ¡rias', 'Ã‰ claro que a competitividade nas transaÃ§Ãµes comerciais causa impacto indireto na reavaliaÃ§Ã£o dos procedimentos normalmente adotados.'),
(22, 1, 'Grupo master mind', 'Pessoas que trabalham em equipe tendem a resolver seus problemas com mais agilidade', 'Ainda assim, existem dÃºvidas a respeito de como a complexidade dos estudos efetuados apresenta tendÃªncias no sentido de aprovar a manutenÃ§Ã£o do retorno esperado a longo prazo.'),
(21, 1, 'Ambiente de desenvolvimento', 'Ambiente de desenvolvimento aumenta a produtividade dos profissionais quando bem elaborados', 'Desta maneira, o desafiador cenÃ¡rio globalizado representa uma abertura para a melhoria das direÃ§Ãµes preferenciais no sentido do progresso.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_images`
--

DROP TABLE IF EXISTS `posts_images`;
CREATE TABLE IF NOT EXISTS `posts_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts_images`
--

INSERT INTO `posts_images` (`id`, `id_post`, `url`) VALUES
(17, 23, '3005caae1bb83cb71b1bd17654210bb2.jpg'),
(18, 24, '7d06ad563a82014e579e87e73d09e073.jpg'),
(16, 22, '95c0f349ae9eed4df21598f5c092ea70.jpg'),
(15, 21, '98152e54a34cba6dd9de05de246a93a3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(120) NOT NULL DEFAULT '0',
  `password` varchar(250) NOT NULL DEFAULT '0',
  `type_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type_user`) VALUES
(1, 'Adm', 'admin@hotmail.com', 'aa1bf4646de67fd9086cf6c79007026c', 1),
(2, 'Jonas', 'jonas@hotmail.com', 'aa1bf4646de67fd9086cf6c79007026c', 2),
(3, 'joao', 'joao@hotmail.com', 'aa1bf4646de67fd9086cf6c79007026c', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
