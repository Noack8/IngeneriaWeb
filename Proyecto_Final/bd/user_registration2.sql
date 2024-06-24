-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-06-2024 a las 23:16:13
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `usuario`, `email`, `telefono`, `password`, `fecha_nacimiento`, `direccion`) VALUES
(1, 'David', 'Jimenez', 'David34', 'david34@gmail.com', '5589856978', '$2y$10$35vDdcLSa18LAWGMmT8B4u.8u9MIXC5D0ThIRIxsgOPm0yB6Veki2', '1985-06-11', 'Tizayuca, residencial Anda Lucia'),
(2, 'rafael ', 'juarez torres', 'verorafa10', 'dr_juarezt@yahoo.com.mx', '5516942802', '$2y$10$Lfn4cUG9Hy8vqWES69sZROenUusPvwc.xChymEvDZTGyj4LW/ZCA6', '1959-03-08', 'genaro nuÃ±ez '),
(3, 'Angelica ', 'Ochoa', 'Anyi69', 'anyi69@gmail.com', '5589878586', '$2y$10$lzzXarMjP87SAAq6MEzju.Uuav43Qy2T3QRl.H9b8sxYQM6a1ZMcm', '2002-08-15', 'la troja'),
(4, 'Veronica ', 'Astorga', 'Veronica74', 'vasmkt@hotmail.com', '5527378876', '$2y$10$EZp7CvtJTKpJkpYQrwYS/../7R8EK/aOmYZq31IuHZTOw7184Xjva', '1974-03-31', 'cerrada cornelio reyna 85');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
