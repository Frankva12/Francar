-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2019 a las 05:22:28
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria_francar`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_editoriales` (IN `id_editorial` INT, IN `nombre_editorial` VARCHAR(100))  BEGIN

INSERT INTO editoriales(id_editorial, nombre_editorial) VALUES (id_editorial, nombre_editorial);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `facturar` ()  NO SQL
Select id_compra, c.nombre_cliente, c.apellido_cliente, l.nombre_libro, l.Precio, e.nombre_editorial, cm.total FROM libros as l INNER JOIN compras as cm on l.id_libro = cm.id_libro INNER JOIN clientes c ON c.id_cliente = cm.id_cliente INNER JOIN editoriales as e on l.id_libro = e.id_editorial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `informacion_clientes` ()  Select c.nombre_Cliente, c.apellido_cliente, l.nombre_libro, l.Precio, e.nombre_editorial, cm.total FROM libros as l INNER JOIN compras as cm on l.id_libro = cm.id_libro INNER JOIN clientes c ON c.id_cliente = cm.id_cliente INNER JOIN editoriales as e on l.id_libro = e.id_editorial$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre_administrador` varchar(255) NOT NULL,
  `apellido_administrador` varchar(255) NOT NULL,
  `alias_usuario` varchar(255) NOT NULL,
  `contrasenia` varchar(80) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(8) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre_administrador`, `apellido_administrador`, `alias_usuario`, `contrasenia`, `direccion`, `telefono`, `correo`) VALUES
(1, 'Carolina', 'Cabrera', 'Caro', '123456', 'Colonia Escalon', 75963201, 'marcia@gmail.com'),
(2, 'Francisco', 'Vasconcelos', 'Frank', '1234567', 'Avenida Aguilares, San Salvador', 76504010, 'frank@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `texto` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `texto`, `fecha`, `accion`) VALUES
(1, 'francar', '2019-04-20 21:19:30', 'libro insertado'),
(2, 'francar', '2019-04-20 21:19:48', 'libro modificado'),
(3, 'francar', '2019-04-20 21:21:10', 'libro insertado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(80) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `imagen_categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `imagen_categoria`) VALUES
(1, 'Comedia', 'Prueba 1, esta es una categoria', ''),
(2, 'Fantasia', 'Prueba 2, esta es una categoria', ''),
(3, 'Romantica', 'Prueba 3, esta es una categoria', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(80) NOT NULL,
  `apellido_cliente` varchar(80) NOT NULL,
  `alias_cliente` varchar(80) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(8) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `alias_cliente`, `direccion`, `telefono`, `contrasenia`) VALUES
(1, 'Maria', 'Campos', 'Majo', 'San Jacinto, El Salvador', 75948562, '123456'),
(2, 'Bryan', 'Amaya', 'BryanBosco', 'San Jacinto, El Salvador', 76958201, '1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id_editorial` int(11) NOT NULL,
  `nombre_editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id_editorial`, `nombre_editorial`) VALUES
(1, 'Salamandra'),
(2, 'Nube de tinta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
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
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `descripcion`, `imagen_libro`, `autor`, `precio`, `id_categoria`, `id_editorial`, `estado`) VALUES
(1, 'Harry Potter y la piedra filosofal', 'Esta es la descripcion 1', '', 'JK.Rowling', '25.00', 2, 1, 1),
(2, 'Bajo la misma estrella', 'Esta es la descripcion 2', '', 'John Green', '25.00', 3, 2, 1);

--
-- Disparadores `libros`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id_editorial`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
