-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 09:06 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_crearp`
--

-- --------------------------------------------------------

--
-- Table structure for table `crearp_electiva`
--

CREATE TABLE `crearp_electiva` (
  `elect_cod` varchar(15) NOT NULL,
  `elect_nom` varchar(30) NOT NULL,
  `elect_profesor` varchar(15) NOT NULL,
  `elect_descripcion` varchar(50) NOT NULL,
  `elect_cupos` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crearp_electiva`
--

INSERT INTO `crearp_electiva` (`elect_cod`, `elect_nom`, `elect_profesor`, `elect_descripcion`, `elect_cupos`) VALUES
('ELECT1', 'Geografía ll', 'Jaime Florez', 'Geografía de segundo nivel', 13),
('ELECT2', 'Matemáticas', 'Luis Ocampo', 'Matemáticas de segundo nivel', 12),
('ELECT3', 'Multimedia', 'Ferix', 'Utilización de medio de sonido y audio', 22),
('ELECT41', 'Salud Ocupacional', 'Fernando Alonso', 'Salud Ocupacional de nivel 1', 13),
('ELECT5', 'Derecho lll', 'Alexander', 'Derecho de nivel 3', 22),
('ELECT55', 'Filosofía', 'Claudia Ramirez', 'El arte del buen pensar', 8),
('ELECT6', 'Ingeniería en Sistemas', 'Hector Diaz', 'Desarrollo de sistemas de información', 17);

-- --------------------------------------------------------

--
-- Table structure for table `crearp_usuarios`
--

CREATE TABLE `crearp_usuarios` (
  `usu_nombres` varchar(15) NOT NULL,
  `usu_apellidos` varchar(15) NOT NULL,
  `usu_tipodoc` varchar(15) NOT NULL,
  `usu_coduniv` varchar(15) NOT NULL,
  `usu_contrasena` varchar(225) NOT NULL,
  `usu_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crearp_usuarios`
--

INSERT INTO `crearp_usuarios` (`usu_nombres`, `usu_apellidos`, `usu_tipodoc`, `usu_coduniv`, `usu_contrasena`, `usu_tipo`) VALUES
('Camilo', 'Lozano', 'C.C', '111458726', '$2y$10$JPgI0U3xhIzcfVnVPULjUewP4Yc2A4nR3uAxU79eFwHuaNxB5JwXy', 'Estudiante'),
('Felipe', 'Arayon', 'C.C', '1114589627', '$2y$10$DQnl74E3zMXWx6F8c2aMRuo8dbIKC4SB4Vsxw/t.HERvZWC3CLLQK', 'Estudiante'),
('Juan', 'Molina', 'C.C', '1114589634', '$2y$10$voeXVA4NQR/6BrhKiPMkhuhWnG1YnWktmnEghrnSnSSOfNnND/tee', 'Administrador'),
('dfdddf', 'fddfdfdf', 'C.C', '3434334', '$2y$10$jv2baEzTm96nAcd/GDwKju7yRIoMm07sYjCQ.rDnLk4cTdzIxTLL.', 'Estudiante');

-- --------------------------------------------------------

--
-- Table structure for table `crearp_usuelectiva`
--

CREATE TABLE `crearp_usuelectiva` (
  `usuelectiva_usuarios` varchar(15) NOT NULL,
  `usuelectiva_electiva` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crearp_usuelectiva`
--

INSERT INTO `crearp_usuelectiva` (`usuelectiva_usuarios`, `usuelectiva_electiva`) VALUES
('1114589627', 'ELECT3'),
('1114589627', 'ELECT6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crearp_electiva`
--
ALTER TABLE `crearp_electiva`
  ADD PRIMARY KEY (`elect_cod`);

--
-- Indexes for table `crearp_usuarios`
--
ALTER TABLE `crearp_usuarios`
  ADD PRIMARY KEY (`usu_coduniv`);

--
-- Indexes for table `crearp_usuelectiva`
--
ALTER TABLE `crearp_usuelectiva`
  ADD KEY `usuelectiva_usuarios` (`usuelectiva_usuarios`),
  ADD KEY `usuelectiva_electiva` (`usuelectiva_electiva`),
  ADD KEY `usuelectiva_usuarios_2` (`usuelectiva_usuarios`),
  ADD KEY `usuelectiva_electiva_2` (`usuelectiva_electiva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
