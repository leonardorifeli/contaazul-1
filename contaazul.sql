-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2017 às 05:03
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contaazul`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_number` varchar(50) DEFAULT NULL,
  `address_complement` varchar(100) DEFAULT NULL,
  `address_neighborhood` varchar(100) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `address_uf` varchar(2) DEFAULT NULL,
  `address_state` varchar(50) DEFAULT NULL,
  `address_country` varchar(50) DEFAULT NULL,
  `address_zipcode` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT '3',
  `internal_observation` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `id_company`, `name`, `email`, `phone`, `address`, `address_number`, `address_complement`, `address_neighborhood`, `address_city`, `address_uf`, `address_state`, `address_country`, `address_zipcode`, `stars`, `internal_observation`) VALUES
(2, 1, 'Orlando Correia do Nascimento', 'orlandocorreia2@hotmail.com', '(11)94810-8855', 'Rua Manuel Homem de Andrade', '55', 'Casa', 'Jardim Santo AntÃ´nio', 'SÃ£o Paulo', 'SP', 'SÃ£o Paulo', 'Brasil', '05723-400', 4, 'Novo Cliente'),
(3, 1, 'Testador', 'testador@gmail.com', '1111111111', 'rua testador', '55', 'Casa', 'Jardim Santo Antônio', 'São Paulo', 'SP', 'São Paulo', 'Brasil', '05723400', 4, 'Cliente Testador'),
(4, 1, 'Testador', 'testador@gmail.com', '1111111111', 'Rua Manuel Homem de Andrade', '55', 'casa', 'Jardim Santo AntÃ´nio', 'SÃ£o Paulo', 'SP', 'SÃ£o Paulo', 'Brasil', '05723-400', 3, ''),
(5, 1, 'Testador 2', 'testador@gmail.com', '1111111111', 'Rua Manuel Homem de Andrade', '55', 'casa', 'Jardim Santo AntÃ´nio', 'SÃ£o Paulo', 'SP', 'SÃ£o Paulo', 'Brasil', '05723-400', 3, ''),
(6, 1, 'Testador 5', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(7, 1, 'Testador6', 'testador@gmail.com', '1111111111', 'Rua Manuel Homem de Andrade', '55', 'casa', 'Jardim Santo AntÃ´nio', 'SÃ£o Paulo', 'SP', 'SÃ£o Paulo', 'Brasil', '05723-400', 3, ''),
(8, 1, 'Testador7', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(9, 1, 'Testador8', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(10, 1, 'Testador9', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(11, 1, 'Testador10', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(12, 1, 'Testador11', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(13, 1, 'Testador12', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(14, 1, '13Testador', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(15, 1, 'Testador14', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(16, 1, 'Testador15', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(17, 1, 'Testador16', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(18, 1, 'Testador17', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(19, 1, 'Testador18', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(20, 1, 'Testador19', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(21, 1, 'Testador20', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(22, 1, 'Testador21', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(23, 1, 'Testador22', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(24, 1, 'Testador23', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(25, 1, 'Testador24', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(26, 1, '25Testador', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(27, 1, 'Testador26', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(28, 1, 'Testador27', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(29, 1, 'Testador28', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(30, 1, 'Testador29', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(31, 1, 'Testador30', 'testador@gmail.com', '1111111111', '', '55', 'casa', 'santo amaro', 'sao paulo', 'UF', '', 'brasil', '05723400', 3, ''),
(32, 1, 'Testador32', 'testador@gmail.com', '1111111111', 'Rua Manuel Homem de Andrade', '55', 'casa', 'Jardim Santo AntÃ´nio', 'SÃ£o Paulo', 'SP', 'SÃ£o Paulo', 'Brasil', '05723-400', 3, 'testador 32'),
(33, 1, 'Sarah Ponce', '', '', '', '', '', '', '', '', '', '', '', 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Empresa 123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `inventory`
--

INSERT INTO `inventory` (`id`, `id_company`, `name`, `price`, `quantity`, `min_quantity`) VALUES
(5, 1, 'CalÃ§a', 100, 8, 15),
(6, 1, 'Camisa', 50, 16, 5),
(7, 1, 'Chinelo', 20, 5, 2),
(8, 1, 'Saia', 50, 9, 10),
(9, 1, 'Sapato', 100.5, 7, 5),
(10, 1, 'Computador', 1005.5, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory_history`
--

CREATE TABLE IF NOT EXISTS `inventory_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `action` varchar(3) NOT NULL,
  `date_action` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `id_company`, `id_product`, `id_user`, `action`, `date_action`) VALUES
(1, 1, 5, 1, 'upd', '2017-02-21 19:34:06'),
(2, 1, 6, 1, 'upd', '2017-02-21 19:34:06'),
(3, 1, 7, 1, 'ins', '2017-02-21 19:35:12'),
(4, 1, 8, 1, 'upd', '2017-02-21 19:36:29'),
(5, 1, 9, 1, 'ins', '2017-02-21 20:51:22'),
(6, 1, 10, 1, 'add', '2017-02-21 21:05:25'),
(7, 1, 11, 1, 'add', '2017-02-21 21:30:20'),
(8, 1, 11, 1, 'edt', '2017-02-21 21:30:46'),
(9, 1, 11, 1, 'del', '2017-02-21 21:30:57'),
(10, 1, 6, 1, 'sal', '2017-02-23 21:54:17'),
(11, 1, 5, 1, 'sal', '2017-02-23 21:54:17'),
(12, 1, 7, 1, 'sal', '2017-02-23 21:54:17'),
(13, 1, 6, 1, 'sal', '2017-02-23 21:57:06'),
(14, 1, 7, 1, 'sal', '2017-02-23 21:57:06'),
(15, 1, 6, 1, 'sal', '2017-02-23 21:58:15'),
(16, 1, 5, 1, 'sal', '2017-02-23 21:58:15'),
(17, 1, 10, 1, 'sal', '2017-02-23 22:15:11'),
(18, 1, 9, 1, 'sal', '2017-02-23 22:19:08'),
(19, 1, 8, 1, 'sal', '2017-02-23 22:21:21'),
(20, 1, 8, 1, 'sal', '2017-02-23 22:23:26'),
(21, 1, 8, 1, 'sal', '2017-02-23 22:27:35'),
(22, 1, 8, 1, 'sal', '2017-02-23 22:37:49'),
(23, 1, 5, 1, 'edt', '2017-02-25 16:40:17'),
(24, 1, 6, 1, 'edt', '2017-02-25 16:40:25'),
(25, 1, 7, 1, 'edt', '2017-02-25 16:40:31'),
(26, 1, 10, 1, 'edt', '2017-02-25 16:40:36'),
(27, 1, 8, 1, 'edt', '2017-02-25 16:40:44'),
(28, 1, 9, 1, 'edt', '2017-02-25 16:40:49'),
(29, 1, 5, 1, 'sal', '2017-02-25 16:42:43'),
(30, 1, 6, 1, 'sal', '2017-02-25 16:42:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions_params`
--

CREATE TABLE IF NOT EXISTS `permissions_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `permissions_params`
--

INSERT INTO `permissions_params` (`id`, `id_company`, `name`) VALUES
(3, 1, 'permissions'),
(10, 1, 'home'),
(14, 1, 'users'),
(15, 1, 'clients'),
(16, 1, 'Folha de Pagamento'),
(17, 1, 'Contratar FuncionÃ¡rios'),
(18, 1, 'DemissÃ£o'),
(19, 1, 'user_add'),
(20, 1, 'user_edit'),
(21, 1, 'user_del'),
(22, 1, 'client_add'),
(23, 1, 'client_edit'),
(24, 1, 'client_del'),
(25, 1, 'inventory'),
(26, 1, 'inventory_add'),
(27, 1, 'inventory_edit'),
(28, 1, 'inventory_del'),
(29, 1, 'sales'),
(30, 1, 'sale_add'),
(31, 1, 'sale_edit'),
(32, 1, 'sale_del'),
(33, 1, 'puchases'),
(34, 1, 'puchases_add'),
(35, 1, 'puchases_edit'),
(36, 1, 'puchases_del'),
(37, 1, 'permissions_add'),
(38, 1, 'permissions_edit'),
(39, 1, 'permissions_del'),
(40, 1, 'permissions_group_add'),
(41, 1, 'permissions_group_edit'),
(42, 1, 'permissions_group_del'),
(43, 1, 'permissions_group');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `params` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `id_company`, `name`, `params`) VALUES
(1, 1, 'Desenvolvedores', '3,10,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43'),
(11, 1, 'UsuÃ¡rio', '10,13'),
(13, 1, 'Recursos Humanos', '14,16,17,18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `puchases`
--

CREATE TABLE IF NOT EXISTS `puchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_puchase` datetime NOT NULL,
  `total_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `puchases_products`
--

CREATE TABLE IF NOT EXISTS `puchases_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_puchase` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `puchase_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `id_company`, `id_client`, `id_user`, `date_sale`, `total_price`, `status`) VALUES
(16, 1, 2, 1, '2017-02-25 16:42:43', 400, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales_products`
--

CREATE TABLE IF NOT EXISTS `sales_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `sales_products`
--

INSERT INTO `sales_products` (`id`, `id_company`, `id_sale`, `id_product`, `quantity`, `price`) VALUES
(13, 1, 15, 8, 5, 50),
(14, 1, 16, 5, 2, 100),
(15, 1, 16, 6, 4, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_group` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_company`, `name`, `email`, `password`, `id_group`) VALUES
(1, 1, 'Orlando Nascimento', 'admin@empresa123.com.br', '202cb962ac59075b964b07152d234b70', 1),
(2, 1, 'UsuÃ¡rio de Teste', 'usuariodeteste@gmail.com', '202cb962ac59075b964b07152d234b70', 11),
(3, 1, 'Sarah Ponce', 'sarah@gmail.com', '202cb962ac59075b964b07152d234b70', 11),
(7, 1, 'Maria do Socorro do Nascimento', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70', 13);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
