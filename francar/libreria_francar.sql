-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 09:28 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_editoriales` (IN `id_editorial` INT, IN `nombre_editorial` VARCHAR(120))  BEGIN

INSERT INTO editoriales(id_editorial, nombre_editorial) VALUES (id_editorial, nombre_editorial);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `facturar` ()  NO SQL
Select id_compra, c.nombre_Cliente, c.apellido_cliente, l.nombre_libro, l.Precio, e.nombre_editorial, cm.total FROM libros as l INNER JOIN compras as cm on l.id_libro = cm.id_libro INNER JOIN clientes c ON c.id_cliente = cm.id_cliente INNER JOIN editoriales as e on l.id_libro = e.id_editorial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `informacion_clientes` ()  Select c.nombre_Cliente, c.apellido_cliente, l.nombre_libro, l.Precio, e.nombre_editorial, cm.total FROM libros as l INNER JOIN compras as cm on l.id_libro = cm.id_libro INNER JOIN clientes c ON c.id_cliente = cm.id_cliente INNER JOIN editoriales as e on l.id_libro = e.id_editorial$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(12) NOT NULL,
  `nombre_administrador` varchar(255) NOT NULL,
  `apellido_administrador` varchar(255) NOT NULL,
  `contrasenia` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `edad` int(3) NOT NULL,
  `id_genero` int(12) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre_administrador`, `apellido_administrador`, `contrasenia`, `direccion`, `telefono`, `correo`, `edad`, `id_genero`, `id_cargo`) VALUES
(1, 'Ulysses', 'Travis', '123', '8025 Nullam Rd.', 0, 'eget.odio@Nullam.edu', 48, 1, 1),
(2, 'Jarrod', 'Sweet', 'RNU03EWU9ID', '8819 Nunc, Street', 0, 'cubilia.Curae@vitae.edu', 49, 1, 1),
(3, 'Ulric', 'Mayo', 'WCF72ZFW9PA', '542 Lorem St.', 0, 'iaculis@magnaDuis.org', 57, 1, 1),
(4, 'Eric', 'Stanley', 'NLP44MXH2IG', '5424 Magnis Rd.', 0, 'arcu.imperdiet.ullamcorper@utnullaCras.ca', 28, 2, 1),
(5, 'Flynn', 'Medina', 'ATC58RWP2PT', 'Ap #374-9610 Aliquet Avenue', 0, 'consectetuer.euismod.est@vestibulumMauris.co.uk', 54, 2, 1);

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
(1, 'francar', '2019-03-04 06:21:39', 'libro insertado'),
(2, 'francar', '2019-03-04 06:22:07', 'libro insertado'),
(3, 'francar', '2019-03-04 06:28:31', 'libro modificado');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(12) NOT NULL,
  `nombre_cargo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(12) NOT NULL,
  `nombre_categoria` varchar(120) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion`, `imagen_categoria`) VALUES
(1, 'Ornare In Faucibus Company', 'La mejor editorial conocida', 0),
(2, 'Malesuada Fames Ac Industries', 'De libros a libros', 0),
(3, 'Tempor Erat Neque LLP', 'Tu lo quieres nosotros lo tenemos', 0),
(4, 'Semper Foundation', 'Tenemos siempre lo que buscas', 0),
(5, 'Diam Luctus Corp.', 'Libros y mas Libros', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(12) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `apellido_cliente` varchar(255) NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `contrasenia` int(50) NOT NULL,
  `id_genero` int(2) NOT NULL,
  `id_cargo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `edad`, `direccion`, `telefono`, `contrasenia`, `id_genero`, `id_cargo`) VALUES
(1, 'Hector', 'Richards', 59, 'P.O. Box 301, 1514 Ipsum. Avenue', 1, 0, 2, 2),
(2, 'Dennis', 'Campbell', 47, '4621 Varius Ave', 1, 0, 2, 2),
(3, 'Aphrodite', 'Snow', 51, '9381 Risus St.', 1, 0, 1, 2),
(4, 'Ethan', 'Harper', 39, '280-8948 Nec Avenue', 1, 0, 1, 2),
(5, 'Azalia', 'Nielsen', 49, 'Ap #237-2911 Fringilla Av.', 1, 0, 1, 2),
(6, 'Slade', 'Buckner', 23, 'P.O. Box 175, 6856 Hendrerit Rd.', 1, 0, 2, 2),
(7, 'Doris', 'Duke', 50, '2208 Ante, Rd.', 1, 0, 2, 2),
(8, 'Geraldine', 'Wheeler', 51, '6032 Aenean St.', 1, 0, 1, 2),
(9, 'Phillip', 'Brewer', 38, '2075 Sagittis Av.', 1, 0, 2, 2),
(10, 'Magee', 'Tyson', 56, '4308 Vehicula. Street', 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(12) NOT NULL,
  `id_libro` int(12) NOT NULL,
  `id_cliente` int(12) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `id_libro`, `id_cliente`, `cantidad`, `precio`) VALUES
(1, 1, 1, 0, 0),
(2, 2, 2, 0, 0),
(3, 3, 3, 0, 0),
(4, 4, 4, 0, 0),
(5, 5, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `id_compra`, `cantidad`, `precio`) VALUES
(1, 1, 15, 100),
(1, 2, 10, 50);

-- --------------------------------------------------------

--
-- Table structure for table `editoriales`
--

CREATE TABLE `editoriales` (
  `id_editorial` int(12) NOT NULL,
  `nombre_editorial` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editoriales`
--

INSERT INTO `editoriales` (`id_editorial`, `nombre_editorial`) VALUES
(1, 'Ligula Consectetuer Rhoncus Associates'),
(2, 'Sed Limited'),
(3, 'Morbi Neque Tellus Limited'),
(4, 'Et Magna Praesent LLP'),
(5, 'Non Dui Nec Limited');

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(12) NOT NULL,
  `genero` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(12) NOT NULL,
  `id_categoria` int(12) NOT NULL,
  `id_editorial` int(12) NOT NULL,
  `nombre_libro` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen_libro` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `Precio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libro`, `id_categoria`, `id_editorial`, `nombre_libro`, `descripcion`, `imagen_libro`, `Autor`, `Precio`) VALUES
(1, 1, 1, 'Consequat Lectus Industries', 'erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus', '', 'Brody C. William', 0),
(2, 2, 2, 'Et Company', 'pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis', '', 'Jennifer W. Alford', 0),
(3, 3, 3, 'Penatibus Et LLP', 'sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.', '', 'Craig J. Gates', 0),
(4, 4, 4, 'Magna PC', 'iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam', '', 'Henry Quinn', 0),
(5, 5, 5, 'Et Tristique Ltd', 'Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem.', '', 'Victoria Vazquez', 0);

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
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `administrador_ibfk_2` (`id_genero`);

--
-- Indexes for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

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
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`,`id_compra`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indexes for table `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_editorial` (`id_editorial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id_editorial` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id_editorial`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
