-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2022 a las 21:16:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID` int(11) NOT NULL,
  `fecha-creacion` date NOT NULL,
  `fkcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritoprod`
--

CREATE TABLE `carritoprod` (
  `fkcarrito` int(11) NOT NULL,
  `fkprod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteid`
--

CREATE TABLE `clienteid` (
  `ID` int(11) NOT NULL,
  `Pnombre` varchar(11) NOT NULL,
  `Snombre` varchar(11) NOT NULL,
  `PApellido` varchar(11) NOT NULL,
  `Sapellido` varchar(11) NOT NULL,
  `Direccion` varchar(11) NOT NULL,
  `fkcorreo` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fktarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `ID` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(99) NOT NULL,
  `Apellido` varchar(99) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `HoraEntrada` time NOT NULL,
  `HoraSalida` time NOT NULL,
  `fkCorreo` int(11) DEFAULT NULL,
  `fkUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `FkCarrito` int(11) NOT NULL,
  `Monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Serial` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `fechaIngreso` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `CantidadDISP` int(11) NOT NULL,
  `Descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `Tipotarjeta` int(11) NOT NULL,
  `NumeroTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `tipoTelefono` varchar(15) NOT NULL,
  `numero` int(10) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoempleado`
--

CREATE TABLE `telefonoempleado` (
  `fkEmpleado` int(11) NOT NULL,
  `fkTelefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkcliente` (`fkcliente`);

--
-- Indices de la tabla `carritoprod`
--
ALTER TABLE `carritoprod`
  ADD KEY `fkcarrito` (`fkcarrito`);

--
-- Indices de la tabla `clienteid`
--
ALTER TABLE `clienteid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkcorreo` (`fkcorreo`),
  ADD KEY `fkusuario` (`fkusuario`),
  ADD KEY `fktarjeta` (`fktarjeta`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkCorreo` (`fkCorreo`),
  ADD KEY `empleado-ibfk2` (`fkUsuario`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD KEY `fkEmpleado` (`fkEmpleado`),
  ADD KEY `fkTelefono` (`fkTelefono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`fkcliente`) REFERENCES `clienteid` (`ID`);

--
-- Filtros para la tabla `carritoprod`
--
ALTER TABLE `carritoprod`
  ADD CONSTRAINT `carritoprod_ibfk_1` FOREIGN KEY (`fkcarrito`) REFERENCES `carrito` (`ID`);

--
-- Filtros para la tabla `clienteid`
--
ALTER TABLE `clienteid`
  ADD CONSTRAINT `clienteid_ibfk_1` FOREIGN KEY (`fkcorreo`) REFERENCES `correo` (`ID`),
  ADD CONSTRAINT `clienteid_ibfk_2` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `clienteid_ibfk_3` FOREIGN KEY (`fktarjeta`) REFERENCES `tarjeta` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado-ibfk2` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`fkCorreo`) REFERENCES `correo` (`ID`);

--
-- Filtros para la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD CONSTRAINT `telefonoempleado_ibfk_1` FOREIGN KEY (`fkEmpleado`) REFERENCES `empleado` (`ID`),
  ADD CONSTRAINT `telefonoempleado_ibfk_2` FOREIGN KEY (`fkTelefono`) REFERENCES `telefono` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
