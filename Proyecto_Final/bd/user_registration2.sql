-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-06-2024 a las 05:36:36
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `user_registration2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `detalles` text NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `pago` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `titulo`, `descripcion`, `detalles`, `telefono`, `email`, `direccion`, `pago`, `imagen`, `fecha`) VALUES
(1, 'Carpintero ', 'Ocupo un carpintero para un closet', 'Lo necesito para dentro de 3 semanas con madera de caoba ', '5516942808', 'ejemplo@gmail.com', 'Av, Politecnico, cerca del chilis', '25,000', 'Carpintero1.png', '2024-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` text NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'usuario',
  `last_password_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `usuario`, `email`, `telefono`, `password`, `fecha_nacimiento`, `direccion`, `role`, `last_password_update`) VALUES
(1, 'David', 'Jimenez', 'David39', 'david34@gmail.com', '5589856978', '$2y$10$35vDdcLSa18LAWGMmT8B4u.8u9MIXC5D0ThIRIxsgOPm0yB6Veki2', '1985-06-11', 'Tizayuca, residencial Anda Lucia', 'usuario', NULL),
(2, 'rafael ', 'juarez torres', 'verorafa10', 'dr_juarezt@yahoo.com.mx', '5516942802', '$2y$10$Lfn4cUG9Hy8vqWES69sZROenUusPvwc.xChymEvDZTGyj4LW/ZCA6', '1959-03-08', 'genaro nuÃ±ez ', 'usuario', NULL),
(4, 'Veronica ', 'Astorga', 'Veronica74', 'vasmkt@hotmail.com', '5527378876', '$2y$10$EZp7CvtJTKpJkpYQrwYS/../7R8EK/aOmYZq31IuHZTOw7184Xjva', '1974-03-31', 'cerrada cornelio reyna 85', 'usuario', NULL),
(10, 'Juan Carlos', 'Ramirez Orozco', 'Noack', 'estop_11@hotmail.com', '5545734178', '$2y$10$FjocGsl5WUsmFsCqV1nbeOQPHPNQ.AMsT2LPe7AxyQ2/S009895K6', '2222-06-16', 'Casa', 'usuario', NULL),
(6, 'Admin', 'User', 'Joss', 'josuejimenez247@gmail.com', '1234567890', '$2y$10$ftQdCOJ1N7jUDmpxgDP.1etiXBLo5APgUO0tspBIcBx9qfC46j5yq', '2000-01-01', 'Admin Address', 'administrador', NULL),
(7, 'Operador', 'User', 'Juan', 'juan58@gmail.com', '1234567890', '$2y$10$024U8GgIq2fwKd3cpfnguOtlUILfhghCNayYwaZsuC/tKE9jdwzRS', '2000-01-01', 'Operador Address', 'operador', NULL),
(9, 'Mich', 'Varela', 'has-mich1', 'michelle.vrla@gmail.com', '5648087371', '$2y$10$ThYGRef90Y.SPBMsP4OUqerCVFHHcajVLi/8rM3NY5qFtDpB4Qp8q', '2000-04-04', 'fanny schiller 41', 'usuario', NULL),
(11, 'Juan Carlos', 'Ramirez Orozco', 'Noack', 'estop_11@hotmail.com', '5545734178', '$2y$10$wzOxdbBFg56.GiVT3yjs/eje/3qkKjcAUb9EwPrqx1YoHuVLXSNV2', '1985-06-25', 'Casa', 'usuario', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
