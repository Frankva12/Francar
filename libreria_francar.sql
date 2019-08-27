-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2019 a las 19:57:01
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

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
  `correo` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `token_usuario` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre_administrador`, `apellido_administrador`, `alias_usuario`, `contrasenia`, `direccion`, `telefono`, `correo`, `estado`, `token_usuario`) VALUES
(1, 'Frank', 'Vasconcelos', 'Frank', '$2y$10$QRvV3iZiRmjkJh7yXXwOH.TolNCq.azIXR8c/AGk6Kw4niwpftbpy', 'Mi casita', 77932797, 'stanleyvasconcelos0@gmail.com', 1, '5d656dbb60bbd'),
(2, 'Carolina', 'Marcia', 'Caro', '$2y$10$P2T13gQOZFQkieZ7v0cKweShQRQsFz3EYvLsJP9QISihM.o6xEA.W', 'Su casita', 71463889, 'carolinamarcia@gmail.com', 1, ''),
(7, 'Frank', 'Vasconcelos', 'Frankie', '$2y$10$YsXV3ZMLPtZ8JR1/rj45Eueh30oN46EhsD/klru2BhKGX69uVjSmu', 'mi casa', 77932797, 'stanleyvasconcelohifosd@gmail.com', 1, '5d658f8e77c8a');

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
(7, 'Terror', 'Miedo sin igual', '5d1ce0723d216.jpg'),
(8, 'Drama', 'Drama de carito', '5d1ce0bdec21a.jpg'),
(9, 'comedia', 'Chistes', '5d1ce0f558775.jpeg'),
(10, 'Ficcion', 'Ficcion', '5d1ce104d4699.png'),
(11, 'Tradicional', 'La tradicion de las cosaas', '5d1ce119d94b9.jpg');

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
  `contrasenia` varchar(255) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `token_cliente` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `alias_cliente`, `direccion`, `telefono`, `contrasenia`, `correo`, `estado`, `token_cliente`) VALUES
(2, 'Raul ', 'Meana', 'Raul123', 'mi casa', 7894578, '123456', '', 1, ''),
(3, 'Arturo', 'Galileo', 'Arthur', 'su casa', 798563, '123456', '', 1, ''),
(4, 'Frank', 'Vasconcelos', 'Frank', 'mi casa', 77932797, '123456', 'jeje', 0, ''),
(5, 'Frank', 'Vasconcelos', 'Farbi', 'mi casa', 77932797, '$2y$10$2rWVHZ7ipGGXnsFPDd8y2OfeMzDMzaPb42rWXV2j1CwXGCDtGc7aG', 'stanleyvasconcelos0@gmail.com', 1, '');

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

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_libro`, `id_cliente`, `cantidad`, `precio`) VALUES
(1, 1, 2, 12, 15.00),
(2, 4, 2, 11, 17.00),
(3, 2, 3, 2, 20.00),
(4, 3, 3, 29, 120.00),
(5, 4, 3, 36, 48.00),
(6, 5, 3, 25, 14.00),
(7, 6, 2, 7, 16.00);

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

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `id_compra`, `cantidad`, `precio`) VALUES
(1, 1, 12, 25.00),
(2, 2, 12, 159.00);

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
(6, 'Santillana'),
(7, 'Aprende tu'),
(8, 'Cadejo'),
(9, 'Milenarios'),
(10, 'Cuida los libros');

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
  `estado` tinyint(1) NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `descripcion`, `imagen_libro`, `autor`, `precio`, `id_categoria`, `id_editorial`, `estado`, `cantidad`) VALUES
(1, 'Los cuentos de Frank', 'Los cuentos de frank la mejor cosa del mundo', '5d1ce1775797b.jpg', 'Frank', '6.00', 9, 9, 1, 11),
(2, 'Las cosas que conte', 'Como nunca lo has visto', '5d1ce1c75a392.jpg', 'Carito', '4.00', 8, 10, 1, 18),
(3, 'Los tres tristes tigres', 'Comen trigo en un trigal', '5d1ce23d735bb.jpg', 'Tigres', '7.00', 11, 6, 1, 10),
(4, 'Trabajo de buenos', 'La buena vida', '5d1ce2ae5e85c.jpg', 'Trabajadores', '5.00', 10, 8, 1, 2),
(5, 'Tadeo y sus amigos', 'Trabajo y duelo', '5d1ce2f2dff22.png', 'Hello', '20.00', 7, 7, 1, 22),
(6, 'Trato', 'Y turco', '5d1ce3673fff7.jpg', 'Tadeo Hernandez', '4.00', 11, 8, 1, 9);

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
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `alias_usuario` (`alias_usuario`);

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
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `alias_cliente` (`alias_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `compra_ibfk_2` (`id_libro`);

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
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

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
