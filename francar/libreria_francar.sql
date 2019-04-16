-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 07:54 PM
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
(5, 'Flynn', 'Medina', 'ATC58RWP2PT', 'Ap #374-9610 Aliquet Avenue', 0, 'consectetuer.euismod.est@vestibulumMauris.co.uk', 54, 2, 1),
(6, 'Dexter', 'Meadows', 'GSI83BYZ6LF', '621-5496 Non Rd.', 0, 'purus.in@magnaSuspendissetristique.com', 23, 1, 1),
(7, 'Graiden', 'Sosa', 'XMR79WOP2FL', 'P.O. Box 573, 9450 Ornare Av.', 0, 'aliquet.magna@laciniaat.co.uk', 26, 2, 1),
(8, 'Theodore', 'Morton', 'AUK78FPM3JX', '711-1797 Fermentum Av.', 0, 'sem@malesuadaIntegerid.com', 60, 2, 1),
(9, 'Wyatt', 'Sears', 'JTH77GRH3IZ', '2793 Fermentum St.', 0, 'cursus.et@vitaerisus.co.uk', 49, 1, 1),
(10, 'Palmer', 'Middleton', 'LWR77SDR4RD', 'P.O. Box 280, 9242 Sed Road', 0, 'eu.sem.Pellentesque@sapienNunc.org', 46, 2, 1),
(11, 'Amir', 'Walter', 'JHG25CHB1HL', '4411 Nibh Road', 0, 'quis@auctorvitae.ca', 23, 1, 1),
(12, 'Ahmed', 'Morton', 'NYK41BUE7NL', 'Ap #167-3595 Sed Rd.', 0, 'lorem@libero.com', 50, 1, 1),
(13, 'Channing', 'Rosa', 'RXU38ZOG3QI', 'Ap #695-7087 Mauris St.', 0, 'enim.gravida.sit@mi.com', 34, 2, 1),
(14, 'Nissim', 'Keith', 'AMN94VTT3KU', 'Ap #313-6769 Nunc Street', 0, 'nulla.ante.iaculis@nasceturridiculus.com', 21, 2, 1),
(15, 'Quamar', 'Martinez', 'ECJ69FTB5EV', '5950 Dictum Road', 0, 'scelerisque.dui@feugiatnecdiam.net', 55, 2, 1),
(16, 'Emerson', 'Haynes', 'EMY15LMH3QP', '9073 Eu Street', 0, 'sem.ut@sitametante.edu', 22, 2, 1),
(17, 'Daniel', 'Thompson', 'VJB16HKA5FV', '472-1231 Id, Ave', 0, 'quis.arcu@Nullam.com', 48, 2, 1),
(18, 'Derek', 'Austin', 'RGP70DQN3GI', 'P.O. Box 657, 617 Hendrerit Road', 0, 'tortor.dictum@sit.com', 37, 2, 1),
(19, 'Gareth', 'Rowe', 'SVK34CKI5FI', 'Ap #209-1007 Quisque Street', 0, 'Nunc.ut@magnisdisparturient.com', 51, 2, 1),
(20, 'Kuame', 'Rivas', 'ADQ26UGK4KD', 'Ap #311-4196 Consectetuer, Avenue', 0, 'eget.lacus@euodioPhasellus.co.uk', 39, 2, 1),
(21, 'Carter', 'Wade', 'PLQ45BUA1US', '881-630 Netus Avenue', 0, 'tristique.pellentesque@odioNaminterdum.ca', 30, 2, 1),
(22, 'Abbot', 'Garner', 'KAN78VKH7JI', '356-3584 A, Avenue', 0, 'Ut@Lorem.com', 46, 1, 1),
(23, 'Caldwell', 'Jenkins', 'JJG63GRI8HU', 'Ap #556-5696 Volutpat. St.', 0, 'malesuada@acurnaUt.com', 47, 2, 1),
(24, 'Mohammad', 'Schmidt', 'IEO14SOA2SW', 'Ap #781-9065 Vivamus Av.', 0, 'commodo.tincidunt.nibh@Etiamimperdiet.edu', 34, 1, 1),
(25, 'Branden', 'Mccall', 'PJW06ZMO5NG', 'P.O. Box 703, 4184 Quam St.', 0, 'diam@nequepellentesquemassa.co.uk', 18, 2, 1),
(26, 'Jelani', 'Gay', 'FAF26VNZ3WV', 'P.O. Box 662, 4287 Dolor St.', 0, 'Cras.pellentesque@sitametorci.org', 29, 2, 1),
(27, 'Troy', 'Rodriguez', 'XGR85VVW5VR', '1064 In St.', 0, 'Duis.elementum.dui@placerateget.com', 47, 1, 1),
(28, 'Gil', 'Tillman', 'HOB63LDW9ZF', 'Ap #225-9326 Sit Road', 0, 'lorem@urna.co.uk', 38, 1, 1),
(29, 'Berk', 'Chapman', 'AGS49SVU1QQ', '9197 Leo. Rd.', 0, 'Nam@blanditcongueIn.ca', 25, 2, 1),
(30, 'Dane', 'Ellison', 'NXD37TPK9UO', '7256 Ligula. Avenue', 0, 'ac@gravidaPraesenteu.org', 46, 1, 1),
(31, 'Colorado', 'Cabrera', 'RLD57XMI0TT', 'P.O. Box 784, 8399 Proin Street', 0, 'tellus.Aenean.egestas@ipsumdolorsit.co.uk', 41, 1, 1),
(32, 'Macon', 'Miller', 'JVM72XLW1EH', 'Ap #290-5026 Senectus Street', 0, 'iaculis@ornareFuscemollis.ca', 44, 1, 1),
(33, 'Hedley', 'Wilcox', 'EHZ11MZV6CL', 'Ap #691-7037 Neque Ave', 0, 'nascetur.ridiculus.mus@pretiumnequeMorbi.co.uk', 40, 1, 1),
(34, 'Anthony', 'Maynard', 'DJF42VLR9LS', '517-3926 Porttitor Av.', 0, 'tempus.scelerisque@vitaesodalesat.co.uk', 40, 2, 1),
(35, 'Christopher', 'Rice', 'GNG21OEO6IG', '789 Blandit Ave', 0, 'scelerisque.sed@ultriciessemmagna.com', 49, 2, 1),
(36, 'Jacob', 'Figueroa', 'HJL35BPU9QV', 'Ap #144-7472 Nunc, St.', 0, 'quis.arcu@vehiculaaliquet.ca', 41, 1, 1),
(37, 'John', 'Vargas', 'YHA39MTY6PR', '577-4376 Luctus Rd.', 0, 'mollis.Integer.tincidunt@luctusaliquetodio.org', 38, 1, 1),
(38, 'Allistair', 'Cooper', 'KCN93PRO6VD', '828-4527 Lorem Street', 0, 'sociis.natoque@ipsumnonarcu.com', 35, 1, 1),
(39, 'Todd', 'Hernandez', 'VNS45RUV6SU', 'P.O. Box 980, 4784 Ac St.', 0, 'ullamcorper@egestasDuis.org', 34, 1, 1),
(40, 'Kadeem', 'Valencia', 'CLA36MAT7BG', '7512 Nec Av.', 0, 'pellentesque.Sed.dictum@eteuismod.org', 28, 1, 1);

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
  `nombre_categoria` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Ornare In Faucibus Company'),
(2, 'Malesuada Fames Ac Industries'),
(3, 'Tempor Erat Neque LLP'),
(4, 'Semper Foundation'),
(5, 'Diam Luctus Corp.'),
(6, 'Nec Ligula Incorporated'),
(7, 'Morbi Vehicula Pellentesque Inc.'),
(8, 'Tincidunt Tempus Risus Corporation'),
(9, 'At Egestas Consulting'),
(10, 'Eros Industries'),
(11, 'Elementum LLP'),
(12, 'Accumsan Incorporated'),
(13, 'Urna Institute'),
(14, 'Suspendisse Inc.'),
(15, 'Ullamcorper Viverra Maecenas Institute'),
(16, 'In Mi Industries'),
(17, 'Sit Amet Dapibus Company'),
(18, 'Sed Turpis Nec Associates'),
(19, 'Ultricies Consulting'),
(20, 'Ornare Consulting'),
(21, 'A Purus Duis LLP'),
(22, 'Semper Nam Tempor Inc.'),
(23, 'Tincidunt Consulting'),
(24, 'Ultrices Iaculis Odio Industries'),
(25, 'Sed Orci Lobortis Corp.'),
(26, 'Integer Sem Industries'),
(27, 'Pede Suspendisse Dui Company'),
(28, 'Aliquet Company'),
(29, 'Proin Corp.'),
(30, 'Aliquam Eros Foundation'),
(31, 'Enim Company'),
(32, 'Non Associates'),
(33, 'Molestie Foundation'),
(34, 'Cras Vehicula Aliquet Consulting'),
(35, 'Placerat Velit Corporation'),
(36, 'At Velit Inc.'),
(37, 'Curabitur Massa Ltd'),
(38, 'Tristique Associates'),
(39, 'Ipsum Nunc Id Institute'),
(40, 'Tincidunt Nunc Ac Corporation'),
(41, 'Vel Arcu PC'),
(42, 'Commodo Corp.'),
(43, 'Scelerisque Lorem Institute'),
(44, 'Aliquam Arcu Inc.'),
(45, 'Augue Sed Corp.'),
(46, 'Molestie PC'),
(47, 'Sit Amet Diam Corporation'),
(48, 'Ut Ltd'),
(49, 'Duis Incorporated'),
(50, 'Augue Malesuada Malesuada LLC'),
(51, 'Elit Corp.'),
(52, 'Ut Semper PC'),
(53, 'Urna Corporation'),
(54, 'Ligula Tortor Company'),
(55, 'Nunc Associates'),
(56, 'Et Associates'),
(57, 'Gravida Inc.'),
(58, 'Quam LLP'),
(59, 'Non Company'),
(60, 'Aliquam Ltd'),
(61, 'Molestie Tellus Consulting'),
(62, 'Nunc Ullamcorper Eu Corp.'),
(63, 'Aliquam Enim Nec Inc.'),
(64, 'Tellus Associates'),
(65, 'Praesent Eu Corp.'),
(66, 'Odio Phasellus At Institute'),
(67, 'Sed Leo Cras Corp.'),
(68, 'Posuere LLC'),
(69, 'Dolor Nulla Semper Associates'),
(70, 'Magna Suspendisse Tristique Associates'),
(71, 'Augue Ut Lacus Corp.'),
(72, 'At Fringilla LLC'),
(73, 'Pellentesque Tellus Sem Limited'),
(74, 'Vehicula LLC'),
(75, 'Vel Lectus LLP'),
(76, 'Nisi Sem Inc.'),
(77, 'A Inc.'),
(78, 'Quis Tristique Ac Limited'),
(79, 'Parturient Montes Nascetur Limited'),
(80, 'Libero Morbi Accumsan Corporation'),
(81, 'Consectetuer Company'),
(82, 'Magnis Ltd'),
(83, 'Laoreet Libero Et Ltd'),
(84, 'Eu Turpis Nulla Industries'),
(85, 'Metus Consulting'),
(86, 'Sollicitudin A Incorporated'),
(87, 'Facilisis LLP'),
(88, 'Sem Company'),
(89, 'Aenean Massa LLP'),
(90, 'Magna Ltd'),
(91, 'Nisi Cum Corporation'),
(92, 'At LLP'),
(93, 'A Enim Company'),
(94, 'Arcu Iaculis Enim Ltd'),
(95, 'Dictum Eu Eleifend PC'),
(96, 'Nascetur Ridiculus Mus Institute'),
(97, 'Eget Associates'),
(98, 'Duis Cursus Diam Corporation'),
(99, 'Erat Volutpat Nulla Corp.'),
(100, 'Lorem Fringilla Ornare Inc.');

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
(10, 'Magee', 'Tyson', 56, '4308 Vehicula. Street', 1, 0, 1, 2),
(11, 'Angela', 'Case', 18, '227-5860 Vel Road', 1, 0, 2, 2),
(12, 'Lee', 'Dickerson', 60, '3781 Dui. Ave', 1, 0, 1, 2),
(13, 'Zeus', 'Wilson', 37, '8515 Luctus St.', 1, 0, 1, 2),
(14, 'Ginger', 'Long', 48, '6834 Tellus Street', 1, 0, 2, 2),
(15, 'Raphael', 'Reynolds', 45, '9514 Ultrices Av.', 1, 0, 1, 2),
(16, 'Hayes', 'Thomas', 40, 'Ap #432-3856 Curabitur Rd.', 1, 0, 1, 2),
(17, 'Dale', 'Morse', 18, '992-2103 Viverra. Ave', 1, 0, 2, 2),
(18, 'Rachel', 'Glass', 32, 'Ap #874-6804 Vehicula Street', 1, 0, 2, 2),
(19, 'Brenden', 'Potts', 48, 'Ap #943-4115 In Avenue', 1, 0, 2, 2),
(20, 'Amity', 'Coffey', 52, 'Ap #721-9680 Ligula. St.', 1, 0, 1, 2),
(21, 'Darryl', 'Cochran', 27, 'P.O. Box 174, 559 Enim Street', 1, 0, 2, 2),
(22, 'Althea', 'Wagner', 54, '989-5007 Dictum Av.', 1, 0, 1, 2),
(23, 'Ishmael', 'Walter', 58, 'Ap #154-4938 Duis Road', 1, 0, 1, 2),
(24, 'Marcia', 'Walters', 48, '784-6343 Tellus. Ave', 1, 0, 2, 2),
(25, 'Vernon', 'Gates', 49, 'P.O. Box 761, 7977 Consequat Avenue', 1, 0, 2, 2),
(26, 'Eagan', 'Hoover', 60, 'P.O. Box 880, 5315 Nulla Avenue', 1, 0, 1, 2),
(27, 'Sage', 'Hunter', 19, 'Ap #606-6846 Augue Rd.', 1, 0, 2, 2),
(28, 'Aidan', 'Morton', 40, '285 Fusce Rd.', 1, 0, 2, 2),
(29, 'Omar', 'Nguyen', 37, 'P.O. Box 155, 5568 Euismod Ave', 1, 0, 1, 2),
(30, 'Cynthia', 'Bryan', 53, '4752 Nunc. Avenue', 1, 0, 1, 2),
(31, 'Griffin', 'Morrow', 47, '662-7712 Non, Rd.', 1, 0, 2, 2),
(32, 'Craig', 'Ballard', 29, '7015 Magna Rd.', 1, 0, 2, 2),
(33, 'Lance', 'Farley', 26, 'Ap #115-7985 Faucibus Road', 1, 0, 1, 2),
(34, 'Dane', 'Bishop', 30, 'P.O. Box 795, 6172 Mauris Rd.', 1, 0, 1, 2),
(35, 'Veronica', 'Sampson', 47, 'Ap #256-6668 Amet St.', 1, 0, 2, 2),
(36, 'Hope', 'Jenkins', 25, '758-7263 Sagittis Street', 1, 0, 1, 2),
(37, 'Ciaran', 'Puckett', 51, '3621 Facilisis Avenue', 1, 0, 2, 2),
(38, 'Noah', 'Mitchell', 48, '510-3375 Pharetra Ave', 1, 0, 1, 2),
(39, 'Ciara', 'Hooper', 31, '156-2039 Aliquet Ave', 1, 0, 2, 2),
(40, 'Hamish', 'Hanson', 18, 'Ap #758-8663 Et St.', 1, 0, 1, 2),
(41, 'Patricia', 'Odonnell', 54, '5700 Fusce St.', 1, 0, 2, 2),
(42, 'Brock', 'Bell', 50, '7830 Duis St.', 1, 0, 1, 2),
(43, 'Sasha', 'Nieves', 23, '604-1448 Elit Rd.', 1, 0, 1, 2),
(44, 'Harding', 'Whitaker', 32, '752 Aliquet Rd.', 1, 0, 2, 2),
(45, 'Arsenio', 'Vargas', 34, 'P.O. Box 476, 6961 Fermentum St.', 1, 0, 1, 2),
(46, 'Declan', 'Wheeler', 29, 'P.O. Box 679, 3944 A Avenue', 1, 0, 2, 2),
(47, 'Dolan', 'Goodman', 57, 'Ap #671-7031 Non, Av.', 1, 0, 2, 2),
(48, 'James', 'Anthony', 55, 'Ap #707-4520 Risus. Rd.', 1, 0, 2, 2),
(49, 'Brett', 'Harvey', 48, 'Ap #661-6266 Sed Rd.', 1, 0, 1, 2),
(50, 'Lee', 'Mack', 34, 'Ap #429-455 Aliquam Avenue', 1, 0, 1, 2),
(51, 'Bevis', 'Walker', 21, 'P.O. Box 505, 8691 Faucibus Rd.', 1, 0, 2, 2),
(52, 'Griffith', 'Carrillo', 48, 'P.O. Box 212, 7673 Ac St.', 1, 0, 2, 2),
(53, 'Hanna', 'Russo', 21, '713-6915 Posuere Rd.', 1, 0, 2, 2),
(54, 'Jesse', 'Sanders', 40, 'Ap #978-2241 Nec Ave', 1, 0, 2, 2),
(55, 'Armando', 'Yates', 43, '3910 Cum Av.', 1, 0, 2, 2),
(56, 'Jarrod', 'Griffith', 36, 'Ap #466-252 Amet Road', 1, 0, 2, 2),
(57, 'Britanney', 'Hudson', 54, '5187 Aliquet Road', 1, 0, 2, 2),
(58, 'Boris', 'Mccall', 27, 'Ap #766-4236 Vulputate, Avenue', 1, 0, 1, 2),
(59, 'Serina', 'Church', 49, 'P.O. Box 784, 6379 Nibh Road', 1, 0, 1, 2),
(60, 'Jacqueline', 'Shelton', 55, '2500 Erat. Ave', 1, 0, 1, 2),
(61, 'Cameron', 'Whitney', 58, 'Ap #990-7067 Ante. St.', 1, 0, 2, 2),
(62, 'Patricia', 'Sampson', 58, '9391 Habitant Rd.', 1, 0, 1, 2),
(63, 'Samson', 'Michael', 23, '4346 Ultrices Av.', 1, 0, 2, 2),
(64, 'Vaughan', 'Burton', 40, 'P.O. Box 608, 1656 Proin St.', 1, 0, 1, 2),
(65, 'Burke', 'Emerson', 50, 'P.O. Box 509, 938 Quam. Road', 1, 0, 2, 2),
(66, 'William', 'Brown', 26, '1353 Tempor St.', 1, 0, 1, 2),
(67, 'Anastasia', 'Everett', 44, '565-5998 Amet Road', 1, 0, 1, 2),
(68, 'Deanna', 'Webb', 36, '484 Quisque St.', 1, 0, 2, 2),
(69, 'Laith', 'Velazquez', 57, 'P.O. Box 290, 8669 Fusce St.', 1, 0, 1, 2),
(70, 'Rhona', 'Nelson', 38, '4348 Auctor Street', 1, 0, 1, 2),
(71, 'Leigh', 'Hayden', 54, 'Ap #666-5410 Aliquam Ave', 1, 0, 1, 2),
(72, 'Thomas', 'Bush', 59, '616-9272 Habitant Rd.', 1, 0, 2, 2),
(73, 'Laith', 'Acosta', 20, '925-1264 Cubilia St.', 1, 0, 2, 2),
(74, 'Isabelle', 'Richardson', 54, '874-8766 Arcu. St.', 1, 0, 1, 2),
(75, 'Mufutau', 'Leach', 32, 'Ap #746-656 Aliquam Ave', 1, 0, 2, 2),
(76, 'Graiden', 'Mills', 44, 'Ap #688-1526 Diam. Street', 1, 0, 1, 2),
(77, 'Noah', 'Wilkins', 21, 'P.O. Box 850, 8586 Sem Avenue', 1, 0, 2, 2),
(78, 'Brody', 'Keith', 19, 'P.O. Box 195, 1407 Faucibus Rd.', 1, 0, 1, 2),
(79, 'Abigail', 'Little', 28, '601-9982 Molestie Av.', 1, 0, 2, 2),
(80, 'Jeremy', 'Patel', 22, 'P.O. Box 196, 9269 Ut St.', 1, 0, 2, 2),
(81, 'Phillip', 'Lamb', 56, 'P.O. Box 465, 6723 Et Ave', 1, 0, 1, 2),
(82, 'Macey', 'Kerr', 37, 'Ap #219-3450 Sed Av.', 1, 0, 2, 2),
(83, 'Quintessa', 'Harding', 37, 'P.O. Box 109, 6481 Euismod St.', 1, 0, 1, 2),
(84, 'Dylan', 'Monroe', 27, '6608 Tempus Ave', 1, 0, 1, 2),
(85, 'Cyrus', 'Blair', 26, '8948 Elit Rd.', 1, 0, 1, 2),
(86, 'Yasir', 'Keller', 38, '6165 Id, Rd.', 1, 0, 1, 2),
(87, 'Abra', 'Kaufman', 23, '381-1935 Lectus, Ave', 1, 0, 1, 2),
(88, 'MacKensie', 'Acosta', 51, '1883 At Street', 1, 0, 2, 2),
(89, 'Caesar', 'Merrill', 38, '8273 Dui. St.', 1, 0, 1, 2),
(90, 'Nigel', 'Frye', 19, 'Ap #891-2605 Feugiat Rd.', 1, 0, 2, 2),
(91, 'Sean', 'Park', 52, '724-4276 Ipsum St.', 1, 0, 1, 2),
(92, 'Nita', 'Kline', 33, 'P.O. Box 430, 676 Justo. Rd.', 1, 0, 2, 2),
(93, 'Eleanor', 'Evans', 48, 'P.O. Box 903, 472 Ac Rd.', 1, 0, 1, 2),
(94, 'Amethyst', 'Allen', 53, '6329 Vulputate, Rd.', 1, 0, 1, 2),
(95, 'Ria', 'Oneill', 56, 'Ap #587-1221 Montes, Rd.', 1, 0, 1, 2),
(96, 'Colette', 'Lynch', 19, '7457 Scelerisque Rd.', 1, 0, 2, 2),
(97, 'Alan', 'Bradshaw', 27, '5486 Lorem Avenue', 1, 0, 1, 2),
(98, 'Honorato', 'Ball', 43, 'P.O. Box 682, 8401 Ligula. St.', 1, 0, 1, 2),
(99, 'Norman', 'Roman', 22, '3684 Arcu Avenue', 1, 0, 1, 2),
(100, 'Nadine', 'Roy', 54, '9449 Est Av.', 1, 0, 2, 2);

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
(100, 1, 1, 0, 0),
(101, 2, 2, 0, 0),
(102, 3, 3, 0, 0),
(103, 4, 4, 0, 0),
(104, 5, 5, 0, 0),
(105, 6, 6, 0, 0),
(106, 7, 7, 0, 0),
(107, 8, 8, 0, 0),
(108, 9, 9, 0, 0),
(109, 10, 10, 0, 0),
(110, 11, 11, 0, 0),
(111, 12, 12, 0, 0),
(112, 13, 13, 0, 0),
(113, 14, 14, 0, 0),
(114, 15, 15, 0, 0),
(115, 16, 16, 0, 0),
(116, 17, 17, 0, 0),
(117, 18, 18, 0, 0),
(118, 19, 19, 0, 0),
(119, 20, 20, 0, 0),
(120, 21, 21, 0, 0),
(121, 22, 22, 0, 0),
(122, 23, 23, 0, 0),
(123, 24, 24, 0, 0),
(124, 25, 25, 0, 0),
(125, 26, 26, 0, 0),
(126, 27, 27, 0, 0),
(127, 28, 28, 0, 0),
(128, 29, 29, 0, 0),
(129, 30, 30, 0, 0),
(130, 31, 31, 0, 0),
(131, 32, 32, 0, 0),
(132, 33, 33, 0, 0),
(133, 34, 34, 0, 0),
(134, 35, 35, 0, 0),
(135, 36, 36, 0, 0),
(136, 37, 37, 0, 0),
(137, 38, 38, 0, 0),
(138, 39, 39, 0, 0),
(139, 40, 40, 0, 0),
(140, 41, 41, 0, 0),
(141, 42, 42, 0, 0),
(142, 43, 43, 0, 0),
(143, 44, 44, 0, 0),
(144, 45, 45, 0, 0),
(145, 46, 46, 0, 0),
(146, 47, 47, 0, 0),
(147, 48, 48, 0, 0),
(148, 49, 49, 0, 0),
(149, 50, 50, 0, 0),
(150, 51, 51, 0, 0),
(151, 52, 52, 0, 0),
(152, 53, 53, 0, 0),
(153, 54, 54, 0, 0),
(154, 55, 55, 0, 0),
(155, 56, 56, 0, 0),
(156, 57, 57, 0, 0),
(157, 58, 58, 0, 0),
(158, 59, 59, 0, 0),
(159, 60, 60, 0, 0),
(160, 61, 61, 0, 0),
(161, 62, 62, 0, 0),
(162, 63, 63, 0, 0),
(163, 64, 64, 0, 0),
(164, 65, 65, 0, 0),
(165, 66, 66, 0, 0),
(166, 67, 67, 0, 0),
(167, 68, 68, 0, 0),
(168, 69, 69, 0, 0),
(169, 70, 70, 0, 0),
(170, 71, 71, 0, 0),
(171, 72, 72, 0, 0),
(172, 73, 73, 0, 0),
(173, 74, 74, 0, 0),
(174, 75, 75, 0, 0),
(175, 76, 76, 0, 0),
(176, 77, 77, 0, 0),
(177, 78, 78, 0, 0),
(178, 79, 79, 0, 0),
(179, 80, 80, 0, 0),
(180, 81, 81, 0, 0),
(181, 82, 82, 0, 0),
(182, 83, 83, 0, 0),
(183, 84, 84, 0, 0),
(184, 85, 85, 0, 0),
(185, 86, 86, 0, 0),
(186, 87, 87, 0, 0),
(187, 88, 88, 0, 0),
(188, 89, 89, 0, 0),
(189, 90, 90, 0, 0),
(190, 91, 91, 0, 0),
(191, 92, 92, 0, 0),
(192, 93, 93, 0, 0),
(193, 94, 94, 0, 0),
(194, 95, 95, 0, 0),
(195, 96, 96, 0, 0),
(196, 97, 97, 0, 0),
(197, 98, 98, 0, 0),
(198, 99, 99, 0, 0),
(199, 100, 100, 0, 0);

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
(1, 100, 15, 100),
(1, 101, 10, 50);

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
(5, 'Non Dui Nec Limited'),
(6, 'Sed Consequat LLP'),
(7, 'Phasellus Elit Institute'),
(8, 'Volutpat Nunc Consulting'),
(9, 'Non Cursus Limited'),
(10, 'Morbi PC'),
(11, 'Quis Pede Consulting'),
(12, 'Turpis Corporation'),
(13, 'Proin Sed Foundation'),
(14, 'Elit Aliquam Inc.'),
(15, 'Vulputate Institute'),
(16, 'Congue A Corp.'),
(17, 'Nullam Corp.'),
(18, 'Sodales Incorporated'),
(19, 'Non Incorporated'),
(20, 'Libero Et Associates'),
(21, 'Mauris Quis Turpis Institute'),
(22, 'Erat Vitae Risus Company'),
(23, 'Vitae Company'),
(24, 'Nibh Lacinia Orci Company'),
(25, 'Ipsum Suspendisse Incorporated'),
(26, 'Convallis Est Vitae LLP'),
(27, 'Ac PC'),
(28, 'Elementum Ltd'),
(29, 'Mus PC'),
(30, 'Nibh Dolor Nonummy Inc.'),
(31, 'Congue In Scelerisque Institute'),
(32, 'Phasellus LLP'),
(33, 'Sed Dui Company'),
(34, 'Posuere Inc.'),
(35, 'Leo Vivamus Consulting'),
(36, 'Vestibulum Industries'),
(37, 'Luctus Sit PC'),
(38, 'Dolor Foundation'),
(39, 'Nisi Corporation'),
(40, 'Cras Industries'),
(41, 'Et Netus Foundation'),
(42, 'Volutpat Nulla Incorporated'),
(43, 'Enim Etiam Imperdiet Ltd'),
(44, 'Tellus LLP'),
(45, 'Et Industries'),
(46, 'Lacinia Ltd'),
(47, 'Conubia Incorporated'),
(48, 'Justo Eu Arcu Company'),
(49, 'Libero Corp.'),
(50, 'Conubia Nostra Consulting'),
(51, 'Eget Metus Foundation'),
(52, 'Nulla Industries'),
(53, 'Arcu Corp.'),
(54, 'Scelerisque Neque Institute'),
(55, 'Suspendisse Non Leo Corporation'),
(56, 'Mi Fringilla Inc.'),
(57, 'Natoque Penatibus Et Corporation'),
(58, 'Purus In Molestie Associates'),
(59, 'Purus Accumsan Corporation'),
(60, 'Quis Institute'),
(61, 'Varius Ultrices Mauris Associates'),
(62, 'Commodo Industries'),
(63, 'Gravida Incorporated'),
(64, 'Phasellus Dolor Elit Inc.'),
(65, 'Curabitur Industries'),
(66, 'Velit Company'),
(67, 'Metus Aenean Institute'),
(68, 'Felis Purus Foundation'),
(69, 'Convallis Ante Consulting'),
(70, 'Tempor Erat Corp.'),
(71, 'Vulputate Corporation'),
(72, 'Dolor Sit LLP'),
(73, 'Felis Eget Varius Incorporated'),
(74, 'Quis Diam Pellentesque Foundation'),
(75, 'Ut Tincidunt Vehicula LLC'),
(76, 'Ligula Incorporated'),
(77, 'Adipiscing PC'),
(78, 'Eu Incorporated'),
(79, 'Sed Consulting'),
(80, 'Eu Accumsan Sed Foundation'),
(81, 'Et Arcu Imperdiet Associates'),
(82, 'Nunc Company'),
(83, 'Vitae Odio Corporation'),
(84, 'Ornare Ltd'),
(85, 'Eu Nibh Vulputate Foundation'),
(86, 'Pellentesque Habitant LLC'),
(87, 'In Lorem Donec Corporation'),
(88, 'Adipiscing Lacus LLP'),
(89, 'Cras Pellentesque Limited'),
(90, 'Donec Sollicitudin Adipiscing Associates'),
(91, 'Non Lorem Corporation'),
(92, 'Elementum Lorem Corp.'),
(93, 'Eu Associates'),
(94, 'Eleifend Nunc PC'),
(95, 'Taciti Sociosqu LLC'),
(96, 'Metus LLP'),
(97, 'Sit Amet Consectetuer Ltd'),
(98, 'Sapien Consulting'),
(99, 'Eu Nulla At LLP'),
(100, 'Neque Institute'),
(101, 'holixd');

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
  `Autor` varchar(255) NOT NULL,
  `Precio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libro`, `id_categoria`, `id_editorial`, `nombre_libro`, `descripcion`, `Autor`, `Precio`) VALUES
(1, 1, 1, 'Consequat Lectus Industries', 'erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus', 'Brody C. William', 0),
(2, 2, 2, 'Et Company', 'pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis', 'Jennifer W. Alford', 0),
(3, 3, 3, 'Penatibus Et LLP', 'sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.', 'Craig J. Gates', 0),
(4, 4, 4, 'Magna PC', 'iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam', 'Henry Quinn', 0),
(5, 5, 5, 'Et Tristique Ltd', 'Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem.', 'Victoria Vazquez', 0),
(6, 6, 6, 'Imperdiet Industries', 'Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel', 'Galvin Klein', 0),
(7, 7, 7, 'Mi Lorem Inc.', 'Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut', 'Kathleen Y. Weiss', 0),
(8, 8, 8, 'Morbi Corp.', 'luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae,', 'Jana T. Stone', 0),
(9, 9, 9, 'Nulla Eget Inc.', 'nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis', 'Ahmed J. Wood', 0),
(10, 10, 10, 'Lectus Associates', 'lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis', 'Quail Richards', 0),
(11, 11, 11, 'Ac Company', 'et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis', 'Noel P. Terry', 0),
(12, 12, 12, 'Nunc Ac Sem LLC', 'nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem', 'Ursa Hancock', 0),
(13, 13, 13, 'Vitae Consulting', 'rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis,', 'Lance N. Carver', 0),
(14, 14, 14, 'Eros Turpis Incorporated', 'eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin', 'Dillon W. Moss', 0),
(15, 15, 15, 'Lorem Lorem LLP', 'sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc', 'Honorato Good', 0),
(16, 16, 16, 'Dictum Augue Malesuada LLP', 'dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'Rylee Slater', 0),
(17, 17, 17, 'Magna PC', 'faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet,', 'Gregory Baldwin', 0),
(18, 18, 18, 'Quisque LLP', 'vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis', 'Blaine Pickett', 0),
(19, 19, 19, 'Nunc Sed Corp.', 'Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque', 'Imelda Pope', 0),
(20, 20, 20, 'Eros Proin Ultrices LLC', 'non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor.', 'Nolan Jackson', 0),
(21, 21, 21, 'Sed Est Corporation', 'ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim', 'Florence U. Walton', 0),
(22, 22, 22, 'Suspendisse Non PC', 'libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque', 'Gregory Willis', 0),
(23, 23, 23, 'Eget Industries', 'sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet', 'Roanna W. Norton', 0),
(24, 24, 24, 'Ligula Nullam PC', 'vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna.', 'Kaden Avila', 0),
(25, 25, 25, 'Velit Cras Industries', 'Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit,', 'Alika X. Nunez', 0),
(26, 26, 26, 'Suspendisse Tristique Neque Ltd', 'sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper,', 'Caleb Reeves', 0),
(27, 27, 27, 'Sodales Nisi Magna Ltd', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris', 'Kennedy U. Schwartz', 0),
(28, 28, 28, 'Ultricies Institute', 'sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas', 'Leslie Holmes', 0),
(29, 29, 29, 'Lacus Nulla Limited', 'justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor,', 'Bianca Little', 0),
(30, 30, 30, 'Ac Industries', 'non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum', 'Grant Dixon', 0),
(31, 31, 31, 'At Arcu Vestibulum Inc.', 'amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a', 'Mona S. Guzman', 0),
(32, 32, 32, 'Nec Tellus LLP', 'Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,', 'Valentine Blair', 0),
(33, 33, 33, 'Tincidunt Congue Associates', 'Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus.', 'Fitzgerald J. Hayes', 0),
(34, 34, 34, 'Cursus A Associates', 'aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'Ira U. Juarez', 0),
(35, 35, 35, 'Aliquam Gravida Ltd', 'leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus', 'Kirestin Calderon', 0),
(36, 36, 36, 'Semper Pretium Neque Associates', 'ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris', 'Uma Clark', 0),
(37, 37, 37, 'Neque Limited', 'tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed', 'Dana D. Olson', 0),
(38, 38, 38, 'Nam Ligula Associates', 'dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus', 'Justina W. Hernandez', 0),
(39, 39, 39, 'At Associates', 'eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus.', 'Jesse Craft', 0),
(40, 40, 40, 'Hendrerit Neque Inc.', 'nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas', 'Lev N. Bowman', 0),
(41, 41, 41, 'Nec Quam Curabitur Institute', 'In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est,', 'Claudia Y. Chan', 0),
(42, 42, 42, 'Tempor Company', 'malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', 'Zia H. Gardner', 0),
(43, 43, 43, 'Sem Consequat Nec Inc.', 'a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non,', 'Xanthus T. Winters', 0),
(44, 44, 44, 'Placerat Eget Incorporated', 'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit', 'Ray M. Atkins', 0),
(45, 45, 45, 'Dictum Placerat Augue Foundation', 'risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris', 'Rajah D. Fox', 0),
(46, 46, 46, 'Tellus Lorem Consulting', 'ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim', 'Neve Z. Ford', 0),
(47, 47, 47, 'Donec Tempus Lorem Ltd', 'Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Alan Morrison', 0),
(48, 48, 48, 'Pellentesque Ultricies Dignissim Corporation', 'erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', 'Myra Emerson', 0),
(49, 49, 49, 'Massa Suspendisse Inc.', 'Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede.', 'Jeremy G. Moody', 0),
(50, 50, 50, 'Urna Nec Corporation', 'ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec', 'Denton Conway', 0),
(51, 51, 51, 'Duis Company', 'Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at', 'Colt Montgomery', 0),
(52, 52, 52, 'Sem Consequat Nec LLC', 'justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus', 'Idola Wilkins', 0),
(53, 53, 53, 'Interdum Feugiat Sed Corporation', 'Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in', 'Damon Ratliff', 0),
(54, 54, 54, 'Maecenas Malesuada Fringilla Ltd', 'posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue,', 'Buckminster R. Kemp', 0),
(55, 55, 55, 'Elit Inc.', 'lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi', 'Gregory Hickman', 0),
(56, 56, 56, 'Quam Consulting', 'Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non', 'Hayes Barron', 0),
(57, 57, 57, 'Lacus Corporation', 'eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis', 'Julie I. Clayton', 0),
(58, 58, 58, 'Ac Associates', 'luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum', 'Blaine G. Gibson', 0),
(59, 59, 59, 'Vivamus Nisi Mauris LLP', 'lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique', 'Harding Guy', 0),
(60, 60, 60, 'Nullam Velit Dui Institute', 'eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 'Cherokee Stone', 0),
(61, 61, 61, 'Est Mauris PC', 'dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum purus, accumsan interdum libero dui', 'Gisela P. Pittman', 0),
(62, 62, 62, 'Semper Egestas LLC', 'fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec', 'Holmes Raymond', 0),
(63, 63, 63, 'Nisl PC', 'tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque', 'Arthur E. Key', 0),
(64, 64, 64, 'Porttitor Vulputate LLP', 'commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius', 'Hop W. Miller', 0),
(65, 65, 65, 'Imperdiet Non Limited', 'blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie', 'Hu N. Ellis', 0),
(66, 66, 66, 'Pharetra Company', 'lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla.', 'Malik V. Acevedo', 0),
(67, 67, 67, 'Dui Nec LLP', 'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit', 'Jolie Finch', 0),
(68, 68, 68, 'Id Incorporated', 'Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi.', 'Jackson D. Sharp', 0),
(69, 69, 69, 'Massa Suspendisse LLP', 'semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut', 'Cheryl Walter', 0),
(70, 70, 70, 'Aliquet Vel Institute', 'Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 'Leroy Farrell', 0),
(71, 71, 71, 'Ante PC', 'Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci', 'Casey Bradford', 0),
(72, 72, 72, 'Non Massa Company', 'nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit', 'Jescie Z. Olson', 0),
(73, 73, 73, 'Turpis Industries', 'dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie', 'Jasper Lowe', 0),
(74, 74, 74, 'Dignissim Company', 'a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci.', 'Freya Cabrera', 0),
(75, 75, 75, 'Scelerisque Mollis Phasellus LLC', 'euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi.', 'Haley Mcfadden', 0),
(76, 76, 76, 'Justo Praesent Luctus Institute', 'aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'Jasmine Y. Graves', 0),
(77, 77, 77, 'Adipiscing Fringilla Porttitor LLP', 'convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', 'Yoshio Dale', 0),
(78, 78, 78, 'Mauris Integer Corporation', 'in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna', 'Ila A. Mendez', 0),
(79, 79, 79, 'Imperdiet Erat Nonummy Incorporated', 'cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras', 'Candace Kidd', 0),
(80, 80, 80, 'Penatibus Et Corp.', 'Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,', 'Colin N. Morrison', 0),
(81, 81, 81, 'Varius Ultrices Mauris Incorporated', 'quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula.', 'Ezekiel Elliott', 0),
(82, 82, 82, 'Dapibus LLC', 'eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui.', 'Cally N. Williamson', 0),
(83, 83, 83, 'Ipsum Nunc Industries', 'et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac', 'Ivy W. Potter', 0),
(84, 84, 84, 'Urna Nullam Lobortis Corporation', 'eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit', 'Graham Farley', 0),
(85, 85, 85, 'Malesuada Vel Consulting', 'dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in', 'Kane Cohen', 0),
(86, 86, 86, 'Sagittis Felis Corp.', 'neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit', 'Portia Q. Gross', 0),
(87, 87, 87, 'Amet Consectetuer Adipiscing Limited', 'consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient', 'Desiree Harvey', 0),
(88, 88, 88, 'Gravida Sit Corp.', 'nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque', 'Keely Richards', 0),
(89, 89, 89, 'Ipsum Ltd', 'accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum', 'Walker Z. Hopper', 0),
(90, 90, 90, 'Aliquet Libero Integer LLC', 'nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum', 'Gay D. Chen', 0),
(91, 91, 91, 'Sed Tortor Ltd', 'Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit', 'Fitzgerald G. Orr', 0),
(92, 92, 92, 'Phasellus Nulla Company', 'quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit.', 'Hedley N. Pittman', 0),
(93, 93, 93, 'Ut Company', 'dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus.', 'Evelyn K. Walter', 0),
(94, 94, 94, 'Pede Praesent Eu Foundation', 'hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci', 'Rogan Cummings', 0),
(95, 95, 95, 'Donec Inc.', 'facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a', 'Aphrodite Ayala', 0),
(96, 96, 96, 'Ante Dictum Institute', 'rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis', 'Igor J. Grant', 0),
(97, 97, 97, 'Maecenas Ornare Consulting', 'pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut', 'Benjamin Cole', 0),
(98, 98, 98, 'Phasellus Nulla Incorporated', 'Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor', 'Dominique O. Bray', 0),
(99, 99, 99, 'Dolor Corp.', 'est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a', 'Yuri X. Bentley', 0),
(100, 100, 100, 'Ac Risus PC', 'augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue', 'Zia Blackburn', 0),
(101, 5, 40, 'Harry Potter y el prisionero de Azkaban', 'El prisionero de Azkaban narra los hechos que suceden a lo largo del tercer curso de su protagonista, Harry Potter, en el Colegio Hogwarts. Aunque en la novela no aparece el antagonista de la serie, Lord Voldemort, la trama presenta una nueva situaciÃ³n d', 'JK.Rowling', 25),
(102, 5, 40, 'Harry Potter y las reliquias de la muerte', 'Este Ãºltimo libro narra los acontecimientos que siguen directamente al libro anterior: Harry Potter y el misterio del prÃ­ncipe â€”publicado en 2005â€”, y concluye con el enfrentamiento final, largamente esperado, entre Harry Potter junto a sus amigos, f', 'JK.Rowling', 25);

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
  MODIFY `id_cargo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
