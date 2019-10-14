-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 05:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria_francar`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre_administrador` varchar(255) NOT NULL,
  `apellido_administrador` varchar(255) NOT NULL,
  `alias_usuario` varchar(255) NOT NULL,
  `contrasenia` varchar(80) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(8) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `token_usuario` varchar(80) NOT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre_administrador`, `apellido_administrador`, `alias_usuario`, `contrasenia`, `direccion`, `telefono`, `correo`, `estado`, `token_usuario`, `intentos`) VALUES
(8, 'Francisco', 'Vasconcelos', 'Frank', '$2y$10$15kKjcxwUkchQLg227zliei.19Wd6/VbDPnvRAJlHELnXeE1gNhye', 'mi casa', 77932797, 'stanleyvasconcelos0@gmail.com', 1, '5d6d3199540af', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `texto` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `texto`, `fecha`, `accion`) VALUES
(1, 'francar', '2019-07-03 11:10:15', 'libro insertado'),
(2, 'francar', '2019-07-03 11:11:35', 'libro insertado'),
(3, 'francar', '2019-07-03 11:13:33', 'libro insertado'),
(4, 'francar', '2019-07-03 11:15:26', 'libro insertado'),
(5, 'francar', '2019-07-03 11:16:34', 'libro insertado'),
(6, 'francar', '2019-07-03 11:18:31', 'libro insertado'),
(7, 'francar', '2019-07-03 11:20:20', 'libro insertado'),
(8, 'francar', '2019-07-03 11:21:14', 'libro modificado'),
(9, 'francar', '2019-07-03 11:21:16', 'libro modificado'),
(10, 'francar', '2019-07-03 11:21:37', 'libro modificado'),
(11, 'francar', '2019-07-07 14:00:43', 'libro modificado'),
(12, 'francar', '2019-07-07 14:00:56', 'libro modificado'),
(13, 'francar', '2019-07-07 14:01:06', 'libro modificado'),
(14, 'francar', '2019-07-07 14:01:20', 'libro modificado');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(80) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `imagen_categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `imagen_categoria`) VALUES
(7, 'Terror', 'Miedo sin igual', '5d1ce0723d216.jpg'),
(8, 'Drama', 'Drama de carito', '5d1ce0bdec21a.jpg'),
(9, 'comedia', 'Chistes', '5d1ce0f558775.jpeg'),
(10, 'Ficcion', 'Ficcion', '5d1ce104d4699.png'),
(11, 'Tradicional', 'La tradicion de las cosaas', '5d1ce119d94b9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(80) NOT NULL,
  `apellido_cliente` varchar(80) NOT NULL,
  `alias_cliente` varchar(80) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(8) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `token_cliente` varchar(80) NOT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `alias_cliente`, `direccion`, `telefono`, `contrasenia`, `correo`, `estado`, `token_cliente`, `intentos`) VALUES
(5, 'Frank', 'Vasconcelos', 'Farbi', 'mi casa', 77932797, '$2y$10$.nClPxIwsEWMo.q3Vyom.uFbBd/Djdxbg8r7/a6TF8gTEue84qHMq', 'stanleyvasconcelos0@gmail.com', 1, '5d66f7787ef2e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id_compra`, `id_libro`, `id_cliente`, `cantidad`, `precio`) VALUES
(1, 1, 5, 12, 15.00),
(2, 4, 5, 11, 17.00),
(8, 1, 5, 21, 12.00),
(9, 4, 5, 5, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `id_compra`, `cantidad`, `precio`) VALUES
(1, 1, 12, 25.00),
(2, 2, 12, 159.00);

-- --------------------------------------------------------

--
-- Table structure for table `editoriales`
--

CREATE TABLE `editoriales` (
  `id_editorial` int(11) NOT NULL,
  `nombre_editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editoriales`
--

INSERT INTO `editoriales` (`id_editorial`, `nombre_editorial`) VALUES
(6, 'Santillana'),
(7, 'Aprende tu'),
(8, 'Cadejo'),
(9, 'Milenarios'),
(10, 'Cuida los libros');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(200) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen_libro` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `descripcion`, `imagen_libro`, `autor`, `precio`, `id_categoria`, `id_editorial`, `estado`, `cantidad`) VALUES
(1, 'Los cuentos de Frank', 'Los cuentos de frank la mejor cosa del mundo', '5d1ce1775797b.jpg', 'Frank', '6.00', 9, 9, 1, 11),
(2, 'Las cosas que conte', 'Como nunca lo has visto', '5d1ce1c75a392.jpg', 'Carito', '4.00', 8, 10, 1, 18),
(3, 'Los tres tristes tigres', 'Comen trigo en un trigal', '5d1ce23d735bb.jpg', 'Tigres', '7.00', 11, 6, 1, 10),
(4, 'Trabajo de buenos', 'La buena vida', '5d1ce2ae5e85c.jpg', 'Trabajadores', '5.00', 10, 8, 1, 2),
(5, 'Tadeo y sus amigos', 'Trabajo y duelo', '5d1ce2f2dff22.png', 'Hello', '20.00', 7, 7, 1, 22),
(6, 'Trato', 'Y turco', '5d1ce3673fff7.jpg', 'Tadeo Hernandez', '4.00', 11, 8, 1, 9);

--
-- Triggers `libros`
--
DELIMITER $$
CREATE TRIGGER `llenar` AFTER INSERT ON `libros` FOR EACH ROW insert into bitacora values (null, 'francar', NOW(), 'libro insertado')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `modificar` BEFORE UPDATE ON `libros` FOR EACH ROW insert into bitacora values (null, 'francar', NOW(), 'libro modificado')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `alias_usuario` (`alias_usuario`);

--
-- Indexes for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `alias_cliente` (`alias_cliente`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `compra_ibfk_2` (`id_libro`);

--
-- Indexes for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indexes for table `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id_editorial`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
