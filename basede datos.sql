-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2017 a las 08:30:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdapoloconstructora1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `ID_B` int(11) NOT NULL,
  `Inicio` datetime DEFAULT NULL,
  `Finalizacion` datetime DEFAULT NULL,
  `Usuario` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`ID_B`, `Inicio`, `Finalizacion`, `Usuario`) VALUES
(1, '2017-07-04 01:13:12', NULL, 'Fernando'),
(2, '2017-07-04 01:13:48', NULL, 'Eduardo'),
(3, '2017-07-04 02:08:23', NULL, 'eduardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `Per_CI` int(11) NOT NULL,
  `Licencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Placa` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`Per_CI`, `Licencia`, `Placa`) VALUES
(4567232, 'TYQ', 'OPQ'),
(12383355, 'XX-123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposito`
--

CREATE TABLE `deposito` (
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `deposito`
--

INSERT INTO `deposito` (`Numero`, `Nombre`) VALUES
(5500, 'Deposito 1'),
(5501, 'deposito 2'),
(5502, 'deposito 3'),
(5503, '123'),
(5504, '123'),
(5505, '123'),
(5506, 'Flojos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bitacora`
--

CREATE TABLE `detalle_bitacora` (
  `ID_Db` int(11) NOT NULL,
  `ID_b` int(11) NOT NULL,
  `Operacion` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Tabla` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_bitacora`
--

INSERT INTO `detalle_bitacora` (`ID_Db`, `ID_b`, `Operacion`, `Tabla`, `Hora`) VALUES
(2, 3, 'INSERTA', 'PERSONA', '02:11:50'),
(3, 3, 'INSERTAR', 'PERSONA', '02:17:44'),
(4, 3, 'INSERTAR', 'PERSONA', '02:18:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_estado`
--

CREATE TABLE `detalle_estado` (
  `ID` int(11) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `ID_Estado_Proyecto` int(11) NOT NULL,
  `Nro_Proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_estado`
--

INSERT INTO `detalle_estado` (`ID`, `Fecha_Hora`, `ID_Estado_Proyecto`, `Nro_Proyecto`) VALUES
(1, '2017-07-01 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dotacion`
--

CREATE TABLE `dotacion` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Depo_Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dotacion`
--

INSERT INTO `dotacion` (`ID`, `Nombre`, `Cantidad`, `Depo_Numero`) VALUES
(4000, 'Casco', 1040, 5500),
(4001, 'Camisa', 20, 5505);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dot_entrega_trabajador`
--

CREATE TABLE `dot_entrega_trabajador` (
  `Codigo` int(11) NOT NULL,
  `ID_Dotacion` int(11) NOT NULL,
  `Per_CI` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dot_entrega_trabajador`
--

INSERT INTO `dot_entrega_trabajador` (`Codigo`, `ID_Dotacion`, `Per_CI`, `ID_Rol`, `Cantidad`, `Fecha`) VALUES
(1, 4001, 12383355, 2, 4, '0000-00-00'),
(2, 4000, 4567232, 1, 2, '2017-06-30'),
(3, 4000, 4567232, 1, 2, '2017-06-30'),
(4, 4001, 4567232, 1, 4, '2017-06-30'),
(5, 4000, 4567232, 1, 2, '2017-06-30'),
(6, 4001, 4567232, 1, 2, '2017-06-30'),
(7, 4001, 12383355, 1, 3, '2017-06-30'),
(8, 4000, 4567232, 1, 12, '2017-06-30'),
(9, 4001, 4567232, 1, 20, '2017-06-30'),
(10, 4000, 12383355, 1, 4, '2017-06-30'),
(11, 4000, 4567232, 3, 2, '2017-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dot_tiene_notingdot`
--

CREATE TABLE `dot_tiene_notingdot` (
  `Codigo` int(11) NOT NULL,
  `Id_Dotacion` int(11) NOT NULL,
  `Cod_Nota_Ingreso_Dot` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dot_tiene_notingdot`
--

INSERT INTO `dot_tiene_notingdot` (`Codigo`, `Id_Dotacion`, `Cod_Nota_Ingreso_Dot`, `Cantidad`) VALUES
(1, 4000, 2, 1000),
(2, 4000, 3, 1000),
(3, 4000, 4, 1000),
(4, 4000, 5, 20);

--
-- Disparadores `dot_tiene_notingdot`
--
DELIMITER $$
CREATE TRIGGER `tr_updCantidadDotacion` AFTER INSERT ON `dot_tiene_notingdot` FOR EACH ROW UPDATE dotacion set Cantidad = Cantidad + new.Cantidad
where dotacion.ID = new.Id_Dotacion
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `Per_CI` int(11) NOT NULL,
  `ID_Encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`Per_CI`, `ID_Encargado`) VALUES
(234523, 9823);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encar_tiene_proy`
--

CREATE TABLE `encar_tiene_proy` (
  `Codigo` int(11) NOT NULL,
  `Encargado_CI` int(11) NOT NULL,
  `Proyecto_Nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `encar_tiene_proy`
--

INSERT INTO `encar_tiene_proy` (`Codigo`, `Encargado_CI`, `Proyecto_Nro`) VALUES
(1, 234523, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_chofer`
--

CREATE TABLE `entrega_chofer` (
  `Codigo` int(11) NOT NULL,
  `Chofer_CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `entrega_chofer`
--

INSERT INTO `entrega_chofer` (`Codigo`, `Chofer_CI`) VALUES
(4, 12383355),
(6, 12383355),
(7, 4567232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_prod_proy`
--

CREATE TABLE `entrega_prod_proy` (
  `Codigo` int(11) NOT NULL,
  `Produccion_Nro` int(11) NOT NULL,
  `Proyecto_Nro` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `entrega_prod_proy`
--

INSERT INTO `entrega_prod_proy` (`Codigo`, `Produccion_Nro`, `Proyecto_Nro`, `Cantidad`, `fecha`) VALUES
(1, 1, 1, 20, '2017-07-03'),
(2, 1, 1, 30, '2017-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_proyecto`
--

CREATE TABLE `entrega_proyecto` (
  `Codigo` int(11) NOT NULL,
  `Proyecto_Nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `entrega_proyecto`
--

INSERT INTO `entrega_proyecto` (`Codigo`, `Proyecto_Nro`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_Estado` int(11) NOT NULL,
  `Descripcion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_Estado`, `Descripcion`) VALUES
(1, 'Disponible'),
(2, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_devolucion`
--

CREATE TABLE `estado_devolucion` (
  `ID` int(11) NOT NULL,
  `Nota_Devolucion_Codigo` int(11) NOT NULL,
  `Herramienta_Codigo` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado_devolucion`
--

INSERT INTO `estado_devolucion` (`ID`, `Nota_Devolucion_Codigo`, `Herramienta_Codigo`, `ID_Estado`, `Cantidad`) VALUES
(1, 2, 6001, 1, 2),
(2, 2, 6001, 2, 1),
(3, 2, 6003, 1, 2),
(7, 1, 6001, 1, 20),
(12, 1, 6001, 1, 20),
(13, 1, 6001, 1, 20),
(14, 1, 6001, 1, 20),
(15, 1, 6001, 1, 20),
(16, 1, 6001, 2, 20),
(17, 1, 6001, 1, 20),
(18, 1, 6001, 1, 20),
(19, 1, 6001, 1, 20),
(20, 1, 6001, 2, 20),
(21, 3, 6003, 1, 2),
(22, 3, 6001, 2, 3),
(23, 4, 6001, 1, 2),
(24, 4, 6003, 2, 2);

--
-- Disparadores `estado_devolucion`
--
DELIMITER $$
CREATE TRIGGER `tr_updateestadoHerramienta1` AFTER INSERT ON `estado_devolucion` FOR EACH ROW UPDATE estado_tiene_herr SET Cantidad = new.Cantidad + estado_tiene_herr.Cantidad
WHERE estado_tiene_herr.ID_Estado = new.ID_Estado AND estado_tiene_herr.Codigo_Herramienta = new.Herramienta_Codigo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proyecto`
--

CREATE TABLE `estado_proyecto` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado_proyecto`
--

INSERT INTO `estado_proyecto` (`ID`, `Descripcion`) VALUES
(1, 'en curso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_tiene_herr`
--

CREATE TABLE `estado_tiene_herr` (
  `Codigo_Herramienta` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado_tiene_herr`
--

INSERT INTO `estado_tiene_herr` (`Codigo_Herramienta`, `ID_Estado`, `Cantidad`) VALUES
(6001, 1, 222),
(6001, 2, 44),
(6002, 1, 40),
(6003, 1, 22),
(6004, 1, 24),
(6005, 1, 20),
(6006, 1, 2),
(6007, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`Id`, `Descripcion`) VALUES
(40000, 'ADMINISTRADOR'),
(40001, 'BODEGUERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Depo_Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`Codigo`, `Nombre`, `Cantidad`, `Depo_Numero`) VALUES
(6001, 'Pala', 70, 5500),
(6002, 'Picota', 70, 5500),
(6003, 'Martillo', 15, 5500),
(6004, 'Tenaza', 22, 5502),
(6005, 'Clavo', 101, 5501),
(6006, 'Asadon', 201, 5501),
(6007, 'Machete', 30, 5500);

--
-- Disparadores `herramienta`
--
DELIMITER $$
CREATE TRIGGER `tr_insertinventarioherramienta` AFTER INSERT ON `herramienta` FOR EACH ROW INSERT INTO inventario_herramienta(inventario_herramienta.Codigo_Herramienta, inventario_herramienta.Cantidad_Herr) VALUES(new.Codigo,new.Cantidad)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updateinventarioherramienta` AFTER UPDATE ON `herramienta` FOR EACH ROW UPDATE inventario_herramienta SET inventario_herramienta.Cantidad_Herr = new.Cantidad WHERE inventario_herramienta.Codigo_Herramienta = new.Codigo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herr_tiene_notingherr1`
--

CREATE TABLE `herr_tiene_notingherr1` (
  `Codigo` int(11) NOT NULL,
  `Codigo_Herramienta` int(11) NOT NULL,
  `Cod_Nota_Ingreso_Herr` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `herr_tiene_notingherr1`
--

INSERT INTO `herr_tiene_notingherr1` (`Codigo`, `Codigo_Herramienta`, `Cod_Nota_Ingreso_Herr`, `Cantidad`) VALUES
(11, 6007, 14, 10),
(12, 6006, 14, 1),
(13, 6005, 14, 1),
(2000, 6004, 4, 12),
(2001, 6002, 22, 10),
(2002, 6004, 22, 20),
(2003, 6006, 23, 9),
(2004, 6005, 24, 9),
(2005, 6005, 25, 100),
(2006, 6005, 26, 100),
(2007, 6006, 26, 9),
(2008, 6005, 27, 9);

--
-- Disparadores `herr_tiene_notingherr1`
--
DELIMITER $$
CREATE TRIGGER `tr_updateestadoHerramienta` AFTER INSERT ON `herr_tiene_notingherr1` FOR EACH ROW UPDATE estado_tiene_herr SET Cantidad = Cantidad + new.Cantidad
where estado_tiene_herr.Codigo_Herramienta = new.Codigo_Herramienta and estado_tiene_herr.ID_Estado = '1'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Codigo`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_dotacion`
--

CREATE TABLE `inventario_dotacion` (
  `Cod_inv_dot` int(11) NOT NULL,
  `Codigo_I` int(11) NOT NULL,
  `ID_dot` int(11) NOT NULL,
  `Cantidad_Dot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_dotacion`
--

INSERT INTO `inventario_dotacion` (`Cod_inv_dot`, `Codigo_I`, `ID_dot`, `Cantidad_Dot`) VALUES
(1, 1, 4000, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_herramienta`
--

CREATE TABLE `inventario_herramienta` (
  `Cod_inv_herr` int(11) NOT NULL,
  `Codigo_I` int(11) NOT NULL,
  `Codigo_herr` int(11) NOT NULL,
  `Cantidad_Herr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_herramienta`
--

INSERT INTO `inventario_herramienta` (`Cod_inv_herr`, `Codigo_I`, `Codigo_herr`, `Cantidad_Herr`) VALUES
(1, 1, 6002, 2),
(2, 1, 6001, 13),
(3, 1, 6006, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_material`
--

CREATE TABLE `inventario_material` (
  `Cod_inv_mat` int(11) NOT NULL,
  `Codigo_I` int(11) NOT NULL,
  `Cod_Mat` int(11) NOT NULL,
  `Cantidad_Mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_material`
--

INSERT INTO `inventario_material` (`Cod_inv_mat`, `Codigo_I`, `Cod_Mat`, `Cantidad_Mat`) VALUES
(1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_produccion`
--

CREATE TABLE `inventario_produccion` (
  `Cod_inv_prod` int(11) NOT NULL,
  `Codigo_I` int(11) NOT NULL,
  `Nro_Prod` int(11) NOT NULL,
  `Cantidad_Prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_produccion`
--

INSERT INTO `inventario_produccion` (`Cod_inv_prod`, `Codigo_I`, `Nro_Prod`, `Cantidad_Prod`) VALUES
(1, 1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_proyecto`
--

CREATE TABLE `inventario_proyecto` (
  `Cod_inv_proy` int(11) NOT NULL,
  `Codigo_I` int(11) NOT NULL,
  `Nro_Proy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_proyecto`
--

INSERT INTO `inventario_proyecto` (`Cod_inv_proy`, `Codigo_I`, `Nro_Proy`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginp`
--

CREATE TABLE `loginp` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ID_Unidad_Medida` int(11) NOT NULL,
  `Depo_Numero` int(11) NOT NULL,
  `Tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`Codigo`, `Nombre`, `Cantidad`, `ID_Unidad_Medida`, `Depo_Numero`, `Tipo`) VALUES
(1, 'Arena', 21140, 3, 5501, NULL),
(2, 'Arena Fina', 112490, 3, 5502, 1),
(3, 'Arenilla', 10024060, 3, 5501, 1),
(4, 'Ripio', 13022, 3, 5501, NULL),
(500, 'Cascote', 4000, 3, 5502, 2),
(9513, 'ceramica', 102000, 2, 5502, 2),
(9514, 'Clavo', 10, 1, 5501, 1),
(9515, 'Combustible', 4, 4, 5501, NULL),
(9516, 'Diesel', 4, 4, 5504, 9515);

--
-- Disparadores `material`
--
DELIMITER $$
CREATE TRIGGER `tr_insertinventariomaterial` AFTER INSERT ON `material` FOR EACH ROW INSERT INTO inventario_material (inventario_material.Codigo_Material,inventario_material.Cantidad_Material) VALUES (new.Codigo,new.Cantidad)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updateinventariomaterial` AFTER UPDATE ON `material` FOR EACH ROW UPDATE inventario_material SET inventario_material.Cantidad_Material = new.CANTIDAD WHERE inventario_material.Codigo_Material = new.Codigo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_pertenece_notentre`
--

CREATE TABLE `material_pertenece_notentre` (
  `Codigo` int(11) NOT NULL,
  `Material_Codigo` int(11) NOT NULL,
  `Nota_Entrega_codigo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material_pertenece_notentre`
--

INSERT INTO `material_pertenece_notentre` (`Codigo`, `Material_Codigo`, `Nota_Entrega_codigo`, `Cantidad`) VALUES
(1, 9516, 4, 20),
(2, 9516, 6, 6),
(3, 9516, 7, 5),
(4, 4, 8, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_devolucion`
--

CREATE TABLE `nota_devolucion` (
  `Codigo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Rol` int(11) DEFAULT NULL,
  `Nro_Proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_devolucion`
--

INSERT INTO `nota_devolucion` (`Codigo`, `Fecha`, `ID_Rol`, `Nro_Proyecto`) VALUES
(1, '2017-07-12', 1, 1),
(2, '2017-07-03', 3, 1),
(3, '2017-07-03', 3, 1),
(4, '2017-07-03', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_entrega`
--

CREATE TABLE `nota_entrega` (
  `Codigo` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL,
  `Fecha_Hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_entrega`
--

INSERT INTO `nota_entrega` (`Codigo`, `ID_Rol`, `Fecha_Hora`) VALUES
(1, 3, '2017-07-03 18:04:42'),
(2, 3, '2017-07-03 18:13:50'),
(3, 3, '2017-07-03 18:16:23'),
(4, 3, '2017-07-03 18:16:54'),
(5, 3, '2017-07-01 00:00:00'),
(6, 3, '2017-07-03 18:29:47'),
(7, 3, '2017-07-03 18:39:28'),
(8, 3, '2017-07-03 19:19:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `Codigo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Proveedor_CI` int(11) NOT NULL,
  `Material_Codigo` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_ingreso`
--

INSERT INTO `nota_ingreso` (`Codigo`, `Cantidad`, `Fecha`, `Proveedor_CI`, `Material_Codigo`, `ID_Rol`) VALUES
(12, 1000, '2017-05-27 18:51:45', 1915805, 4, 1),
(13, 1000, '2017-05-27 18:53:18', 1915805, 4, 1),
(14, 20000, '2017-05-31 21:23:25', 1915805, 1, 1),
(15, 10000, '2017-06-25 14:16:58', 1915805, 2, 3),
(16, 100, '2017-06-25 15:27:17', 1915805, 2, 3),
(17, 200, '2017-06-25 16:31:05', 1915805, 2, 3),
(18, 1000, '2017-06-25 16:37:03', 1915805, 3, 1),
(19, 100, '2017-06-25 20:02:57', 1915805, 1, 3),
(20, 1000, '2017-06-25 20:37:26', 22549832, 500, 3),
(21, 40, '2017-06-25 23:29:45', 1915805, 2, 1),
(22, 2000, '2017-06-26 18:03:48', 22549832, 500, 3);

--
-- Disparadores `nota_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_updCantidadMateriaL1` AFTER INSERT ON `nota_ingreso` FOR EACH ROW update  material set cantidad =  Cantidad + new.Cantidad
    where material.Codigo = new.Material_Codigo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso_dotacion`
--

CREATE TABLE `nota_ingreso_dotacion` (
  `Codigo` int(11) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_ingreso_dotacion`
--

INSERT INTO `nota_ingreso_dotacion` (`Codigo`, `Fecha_Hora`, `ID_Rol`) VALUES
(1, '2017-06-26 00:00:00', 2),
(2, '2017-06-27 02:17:28', 3),
(3, '2017-06-27 02:19:27', 3),
(4, '2017-06-27 02:41:32', 3),
(5, '2017-06-30 13:58:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso_herramienta`
--

CREATE TABLE `nota_ingreso_herramienta` (
  `Codigo` int(11) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_ingreso_herramienta`
--

INSERT INTO `nota_ingreso_herramienta` (`Codigo`, `Fecha_Hora`, `ID_Rol`) VALUES
(1, '2017-06-25 00:00:00', 2),
(2, '2017-06-26 00:36:05', 1),
(3, '2017-06-26 00:52:50', 1),
(4, '2017-06-26 01:01:28', 1),
(5, '2017-06-26 01:04:46', 1),
(6, '2017-06-26 01:13:48', 1),
(7, '2017-06-26 01:14:41', 1),
(8, '2017-06-26 01:24:15', 1),
(9, '2017-06-26 01:29:36', 1),
(10, '2017-06-26 01:39:41', 1),
(11, '2017-06-26 01:47:18', 1),
(12, '2017-06-26 01:49:00', 1),
(13, '2017-06-26 01:58:38', 1),
(14, '2017-06-26 02:35:13', 1),
(15, '2017-06-26 20:30:51', 3),
(16, '2017-06-27 00:07:33', 3),
(17, '2017-06-27 00:09:57', 3),
(18, '2017-06-27 00:13:59', 3),
(19, '2017-06-27 00:19:14', 3),
(20, '2017-06-27 00:23:33', 3),
(21, '2017-06-27 00:32:33', 3),
(22, '2017-06-27 00:41:59', 3),
(23, '2017-06-27 00:43:02', 3),
(24, '2017-06-27 01:44:54', 3),
(25, '2017-06-27 01:48:36', 3),
(26, '2017-06-27 01:51:55', 3),
(27, '2017-06-27 01:53:02', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_prestamo`
--

CREATE TABLE `nota_prestamo` (
  `Codigo` int(11) NOT NULL,
  `Proyecto_Nro` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL,
  `Fecha_Aprox_Devol` date NOT NULL,
  `Fecha_Hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota_prestamo`
--

INSERT INTO `nota_prestamo` (`Codigo`, `Proyecto_Nro`, `ID_Rol`, `Fecha_Aprox_Devol`, `Fecha_Hora`) VALUES
(1, 1, 2, '2017-07-31', '2017-07-11 00:00:00'),
(2, 1, 3, '2017-07-07', '2017-07-02 04:58:35'),
(3, 1, 3, '2017-07-14', '2017-07-02 04:59:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notprest_tiene_herr`
--

CREATE TABLE `notprest_tiene_herr` (
  `Codigo` int(11) NOT NULL,
  `Nota_Prestamo_Codigo` int(11) NOT NULL,
  `Herramienta_Codigo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notprest_tiene_herr`
--

INSERT INTO `notprest_tiene_herr` (`Codigo`, `Nota_Prestamo_Codigo`, `Herramienta_Codigo`, `Cantidad`) VALUES
(1, 1, 6001, 2),
(2, 3, 6003, 2),
(3, 3, 6001, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otro_trabajador`
--

CREATE TABLE `otro_trabajador` (
  `Per_CI` int(11) NOT NULL,
  `Cargo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `CI` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido_Paterno` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido_Materno` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_P` int(11) NOT NULL,
  `Estado` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`CI`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Tipo_P`, `Estado`) VALUES
(12435, 'maria escalera', 'naba', 'sabu', 20000, 'A'),
(123123, 'Elmer', 'Escalera', 'Ojeda', 20002, 'A'),
(234523, 'Elena', 'de', 'Troya', 20003, 'A'),
(684564, 'Ayala', 'Edinho', 'cabri', 20003, 'A'),
(898989, 'Mauricio', 'Rojas', 'Estrada', 20001, 'A'),
(1243541, 'narni', 'tamira', 'casilla', 20001, 'A'),
(1915805, 'Leonardo', 'Ayala', 'Cayoja', 20001, 'A'),
(1916805, 'Fanor', 'Montaño', 'Gutierrez', 20000, 'A'),
(4567232, 'Marvin Ricardo', 'Sanchez', 'Curtiñaz', 20002, 'A'),
(9827218, 'Jose Eduardo', 'Montaño', 'Banegas', 20000, 'A'),
(11288389, 'Fernando', 'Camacho', 'Cosio', 20000, 'A'),
(11588389, 'Pedrito', 'Mamanita', 'Rojasita', 20003, 'B'),
(12383355, 'Maria Guadalupe', 'Bazoalto', 'Mamani', 20002, 'A'),
(13245234, 'ivan', 'Cali', 'Bayo', 20000, 'A'),
(22549832, 'Ivan', 'Lazo', 'Veizaga', 20001, 'A'),
(34632424, 'Camacho', 'casi', 'toca', 20001, 'A'),
(57875645, 'eddy', 'grimaldo', 'rivero', 20001, 'A'),
(89898989, 'Mauricio', 'Rojas', 'Estrada', 20001, 'A'),
(123123123, 'Ameira', 'Mansilla', 'Ramos', 20002, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `Nro` int(11) NOT NULL,
  `Tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`Nro`, `Tipo`, `Cantidad`) VALUES
(1, 'Cordones', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_realiza_proy`
--

CREATE TABLE `prod_realiza_proy` (
  `Codigo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Produccion_Nro` int(11) NOT NULL,
  `Proyecto_Nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `prod_realiza_proy`
--

INSERT INTO `prod_realiza_proy` (`Codigo`, `Cantidad`, `Fecha`, `Produccion_Nro`, `Proyecto_Nro`) VALUES
(1, 15, '2017-06-27', 1, 1),
(2, 12, '2017-07-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Per_CI` int(11) NOT NULL,
  `Placa` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Per_CI`, `Placa`) VALUES
(1915805, 'XTG'),
(22549832, '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Nro` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Inicio` date NOT NULL,
  `Final_Aproximado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`Nro`, `Nombre`, `Inicio`, `Final_Aproximado`) VALUES
(1, 'Amazonas', '2017-06-27', '2017-06-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Per_CI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID`, `Descripcion`, `Per_CI`) VALUES
(1, 'BODEGUERO', 11288389),
(2, 'BODEGUERO', 1916805),
(3, 'ADMINISTRADOR', 9827218);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`Id`, `Descripcion`) VALUES
(20000, 'USUARIO'),
(20001, 'PROVEEDOR'),
(20002, 'TRABAJADOR'),
(20003, 'ENCARGADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `ID_Trabajador` int(11) NOT NULL,
  `Per_CI` int(11) NOT NULL,
  `TipoO` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `TipoCh` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`ID_Trabajador`, `Per_CI`, `TipoO`, `TipoCh`) VALUES
(90, 4567232, 'V', 'F'),
(1222, 12383355, 'F', 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Abreviatura` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`ID`, `Descripcion`, `Abreviatura`) VALUES
(1, 'Bolsa', 'BL'),
(2, 'Pieza', 'PZA'),
(3, 'Metros Cubicos', 'm3'),
(4, 'Litro', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jose', 'jose@gmail.com', '$2y$10$0xFR2AzteKudJR5p90UVqOgBuebf4aXWYy4WIFiUlIf1tWu1i/cIa', NULL, '2017-05-25 19:10:07', '2017-05-25 19:10:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Per_CI` int(11) NOT NULL,
  `Id` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Contrasena` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Codigo_G` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Per_CI`, `Id`, `Contrasena`, `Codigo_G`) VALUES
(1916805, 'fanor123', 'xxxyyy', 40001),
(9827218, 'Eduardo', 'yo4', 40000),
(11288389, 'Fernando', '1234567', 40001);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID_B`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`Per_CI`);

--
-- Indices de la tabla `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `detalle_bitacora`
--
ALTER TABLE `detalle_bitacora`
  ADD PRIMARY KEY (`ID_Db`),
  ADD KEY `ID_b` (`ID_b`);

--
-- Indices de la tabla `detalle_estado`
--
ALTER TABLE `detalle_estado`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Estado_Proyecto` (`ID_Estado_Proyecto`),
  ADD KEY `Nro_Proyecto` (`Nro_Proyecto`);

--
-- Indices de la tabla `dotacion`
--
ALTER TABLE `dotacion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Depo_Numero` (`Depo_Numero`);

--
-- Indices de la tabla `dot_entrega_trabajador`
--
ALTER TABLE `dot_entrega_trabajador`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `dot_entrega_trabajador_ibfk_1` (`ID_Dotacion`),
  ADD KEY `dot_entrega_trabajador_ibfk_2` (`Per_CI`),
  ADD KEY `dot_entrega_trabajador_ibfk_3` (`ID_Rol`);

--
-- Indices de la tabla `dot_tiene_notingdot`
--
ALTER TABLE `dot_tiene_notingdot`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Id_Dotacion` (`Id_Dotacion`),
  ADD KEY `Cod_Nota_Ingreso_Dot` (`Cod_Nota_Ingreso_Dot`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`Per_CI`);

--
-- Indices de la tabla `encar_tiene_proy`
--
ALTER TABLE `encar_tiene_proy`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Encargado_CI` (`Encargado_CI`),
  ADD KEY `Proyecto_Nro` (`Proyecto_Nro`);

--
-- Indices de la tabla `entrega_chofer`
--
ALTER TABLE `entrega_chofer`
  ADD PRIMARY KEY (`Codigo`,`Chofer_CI`),
  ADD KEY `Chofer_CI` (`Chofer_CI`);

--
-- Indices de la tabla `entrega_prod_proy`
--
ALTER TABLE `entrega_prod_proy`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Proyecto_Nro` (`Proyecto_Nro`),
  ADD KEY `Produccion_Nro` (`Produccion_Nro`);

--
-- Indices de la tabla `entrega_proyecto`
--
ALTER TABLE `entrega_proyecto`
  ADD PRIMARY KEY (`Codigo`,`Proyecto_Nro`),
  ADD KEY `Proyecto_Nro` (`Proyecto_Nro`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `estado_devolucion`
--
ALTER TABLE `estado_devolucion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Nota_Devolucion_Codigo` (`Nota_Devolucion_Codigo`),
  ADD KEY `Herramienta_Codigo` (`Herramienta_Codigo`),
  ADD KEY `ID_Estado` (`ID_Estado`);

--
-- Indices de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estado_tiene_herr`
--
ALTER TABLE `estado_tiene_herr`
  ADD PRIMARY KEY (`Codigo_Herramienta`,`ID_Estado`),
  ADD KEY `ID_Estado` (`ID_Estado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Depo_Numero` (`Depo_Numero`);

--
-- Indices de la tabla `herr_tiene_notingherr1`
--
ALTER TABLE `herr_tiene_notingherr1`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `herr_tiene_notingherr_ibfk_1` (`Codigo_Herramienta`),
  ADD KEY `herr_tiene_notingherr_ibfk_2` (`Cod_Nota_Ingreso_Herr`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `inventario_dotacion`
--
ALTER TABLE `inventario_dotacion`
  ADD PRIMARY KEY (`Cod_inv_dot`),
  ADD KEY `Codigo_I` (`Codigo_I`),
  ADD KEY `ID_dot` (`ID_dot`);

--
-- Indices de la tabla `inventario_herramienta`
--
ALTER TABLE `inventario_herramienta`
  ADD PRIMARY KEY (`Cod_inv_herr`),
  ADD KEY `Codigo_I` (`Codigo_I`),
  ADD KEY `Codigo_herr` (`Codigo_herr`);

--
-- Indices de la tabla `inventario_material`
--
ALTER TABLE `inventario_material`
  ADD PRIMARY KEY (`Cod_inv_mat`),
  ADD KEY `Codigo_I` (`Codigo_I`),
  ADD KEY `Cod_Mat` (`Cod_Mat`);

--
-- Indices de la tabla `inventario_produccion`
--
ALTER TABLE `inventario_produccion`
  ADD PRIMARY KEY (`Cod_inv_prod`),
  ADD KEY `Codigo_I` (`Codigo_I`),
  ADD KEY `Nro_Prod` (`Nro_Prod`);

--
-- Indices de la tabla `inventario_proyecto`
--
ALTER TABLE `inventario_proyecto`
  ADD PRIMARY KEY (`Cod_inv_proy`),
  ADD KEY `Codigo_I` (`Codigo_I`),
  ADD KEY `Nro_Proy` (`Nro_Proy`);

--
-- Indices de la tabla `loginp`
--
ALTER TABLE `loginp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Unidad_Medida` (`ID_Unidad_Medida`),
  ADD KEY `Depo_Numero` (`Depo_Numero`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `material_pertenece_notentre`
--
ALTER TABLE `material_pertenece_notentre`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Material_Codigo` (`Material_Codigo`),
  ADD KEY `Nota_Entrega_codigo` (`Nota_Entrega_codigo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota_devolucion`
--
ALTER TABLE `nota_devolucion`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Rol` (`ID_Rol`),
  ADD KEY `Nro_Proyecto` (`Nro_Proyecto`);

--
-- Indices de la tabla `nota_entrega`
--
ALTER TABLE `nota_entrega`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Proveedor_CI` (`Proveedor_CI`),
  ADD KEY `Material_Codigo` (`Material_Codigo`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `nota_ingreso_dotacion`
--
ALTER TABLE `nota_ingreso_dotacion`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `nota_ingreso_herramienta`
--
ALTER TABLE `nota_ingreso_herramienta`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `nota_prestamo`
--
ALTER TABLE `nota_prestamo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Proyecto_Nro` (`Proyecto_Nro`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- Indices de la tabla `notprest_tiene_herr`
--
ALTER TABLE `notprest_tiene_herr`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Nota_Prestamo_Codigo` (`Nota_Prestamo_Codigo`),
  ADD KEY `Herramienta_Codigo` (`Herramienta_Codigo`);

--
-- Indices de la tabla `otro_trabajador`
--
ALTER TABLE `otro_trabajador`
  ADD PRIMARY KEY (`Per_CI`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`CI`),
  ADD KEY `Tipo_P` (`Tipo_P`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`Nro`);

--
-- Indices de la tabla `prod_realiza_proy`
--
ALTER TABLE `prod_realiza_proy`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Produccion_Nro` (`Produccion_Nro`),
  ADD KEY `Proyecto_Nro` (`Proyecto_Nro`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Per_CI`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Nro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Per_CI` (`Per_CI`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`Per_CI`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Per_CI`),
  ADD KEY `Codigo_G` (`Codigo_G`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID_B` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `deposito`
--
ALTER TABLE `deposito`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5507;
--
-- AUTO_INCREMENT de la tabla `detalle_bitacora`
--
ALTER TABLE `detalle_bitacora`
  MODIFY `ID_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detalle_estado`
--
ALTER TABLE `detalle_estado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dot_entrega_trabajador`
--
ALTER TABLE `dot_entrega_trabajador`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `dot_tiene_notingdot`
--
ALTER TABLE `dot_tiene_notingdot`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `encar_tiene_proy`
--
ALTER TABLE `encar_tiene_proy`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `entrega_prod_proy`
--
ALTER TABLE `entrega_prod_proy`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_devolucion`
--
ALTER TABLE `estado_devolucion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6008;
--
-- AUTO_INCREMENT de la tabla `herr_tiene_notingherr1`
--
ALTER TABLE `herr_tiene_notingherr1`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario_dotacion`
--
ALTER TABLE `inventario_dotacion`
  MODIFY `Cod_inv_dot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario_herramienta`
--
ALTER TABLE `inventario_herramienta`
  MODIFY `Cod_inv_herr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inventario_material`
--
ALTER TABLE `inventario_material`
  MODIFY `Cod_inv_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario_produccion`
--
ALTER TABLE `inventario_produccion`
  MODIFY `Cod_inv_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario_proyecto`
--
ALTER TABLE `inventario_proyecto`
  MODIFY `Cod_inv_proy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `loginp`
--
ALTER TABLE `loginp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9517;
--
-- AUTO_INCREMENT de la tabla `material_pertenece_notentre`
--
ALTER TABLE `material_pertenece_notentre`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota_devolucion`
--
ALTER TABLE `nota_devolucion`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `nota_entrega`
--
ALTER TABLE `nota_entrega`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso_dotacion`
--
ALTER TABLE `nota_ingreso_dotacion`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `nota_ingreso_herramienta`
--
ALTER TABLE `nota_ingreso_herramienta`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `nota_prestamo`
--
ALTER TABLE `nota_prestamo`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `notprest_tiene_herr`
--
ALTER TABLE `notprest_tiene_herr`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `Nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prod_realiza_proy`
--
ALTER TABLE `prod_realiza_proy`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `Nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `trabajador` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_bitacora`
--
ALTER TABLE `detalle_bitacora`
  ADD CONSTRAINT `detalle_bitacora_ibfk_1` FOREIGN KEY (`ID_b`) REFERENCES `bitacora` (`ID_B`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_estado`
--
ALTER TABLE `detalle_estado`
  ADD CONSTRAINT `detalle_estado_ibfk_1` FOREIGN KEY (`ID_Estado_Proyecto`) REFERENCES `estado_proyecto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_estado_ibfk_2` FOREIGN KEY (`Nro_Proyecto`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dotacion`
--
ALTER TABLE `dotacion`
  ADD CONSTRAINT `dotacion_ibfk_1` FOREIGN KEY (`Depo_Numero`) REFERENCES `deposito` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dot_entrega_trabajador`
--
ALTER TABLE `dot_entrega_trabajador`
  ADD CONSTRAINT `dot_entrega_trabajador_ibfk_1` FOREIGN KEY (`ID_Dotacion`) REFERENCES `dotacion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dot_entrega_trabajador_ibfk_2` FOREIGN KEY (`Per_CI`) REFERENCES `trabajador` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dot_entrega_trabajador_ibfk_3` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dot_tiene_notingdot`
--
ALTER TABLE `dot_tiene_notingdot`
  ADD CONSTRAINT `dot_tiene_notingdot_ibfk_1` FOREIGN KEY (`Id_Dotacion`) REFERENCES `dotacion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dot_tiene_notingdot_ibfk_2` FOREIGN KEY (`Cod_Nota_Ingreso_Dot`) REFERENCES `nota_ingreso_dotacion` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD CONSTRAINT `encargado_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `persona` (`CI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `encar_tiene_proy`
--
ALTER TABLE `encar_tiene_proy`
  ADD CONSTRAINT `encar_tiene_proy_ibfk_1` FOREIGN KEY (`Encargado_CI`) REFERENCES `encargado` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `encar_tiene_proy_ibfk_2` FOREIGN KEY (`Proyecto_Nro`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrega_chofer`
--
ALTER TABLE `entrega_chofer`
  ADD CONSTRAINT `entrega_chofer_ibfk_1` FOREIGN KEY (`Codigo`) REFERENCES `nota_entrega` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrega_chofer_ibfk_2` FOREIGN KEY (`Chofer_CI`) REFERENCES `chofer` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrega_prod_proy`
--
ALTER TABLE `entrega_prod_proy`
  ADD CONSTRAINT `entrega_prod_proy_ibfk_1` FOREIGN KEY (`Proyecto_Nro`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrega_prod_proy_ibfk_2` FOREIGN KEY (`Produccion_Nro`) REFERENCES `produccion` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrega_proyecto`
--
ALTER TABLE `entrega_proyecto`
  ADD CONSTRAINT `entrega_proyecto_ibfk_1` FOREIGN KEY (`Codigo`) REFERENCES `nota_entrega` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrega_proyecto_ibfk_2` FOREIGN KEY (`Proyecto_Nro`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado_devolucion`
--
ALTER TABLE `estado_devolucion`
  ADD CONSTRAINT `estado_devolucion_ibfk_1` FOREIGN KEY (`Nota_Devolucion_Codigo`) REFERENCES `nota_devolucion` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_devolucion_ibfk_2` FOREIGN KEY (`Herramienta_Codigo`) REFERENCES `herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_devolucion_ibfk_3` FOREIGN KEY (`ID_Estado`) REFERENCES `estado` (`ID_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado_tiene_herr`
--
ALTER TABLE `estado_tiene_herr`
  ADD CONSTRAINT `estado_tiene_herr_ibfk_1` FOREIGN KEY (`Codigo_Herramienta`) REFERENCES `herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_tiene_herr_ibfk_2` FOREIGN KEY (`ID_Estado`) REFERENCES `estado` (`ID_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `herramienta_ibfk_1` FOREIGN KEY (`Depo_Numero`) REFERENCES `deposito` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `herr_tiene_notingherr1`
--
ALTER TABLE `herr_tiene_notingherr1`
  ADD CONSTRAINT `herr_tiene_notingherr_ibfk_1` FOREIGN KEY (`Codigo_Herramienta`) REFERENCES `herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `herr_tiene_notingherr_ibfk_2` FOREIGN KEY (`Cod_Nota_Ingreso_Herr`) REFERENCES `nota_ingreso_herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_dotacion`
--
ALTER TABLE `inventario_dotacion`
  ADD CONSTRAINT `inventario_dotacion_ibfk_1` FOREIGN KEY (`Codigo_I`) REFERENCES `inventario` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_dotacion_ibfk_2` FOREIGN KEY (`ID_dot`) REFERENCES `dotacion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_herramienta`
--
ALTER TABLE `inventario_herramienta`
  ADD CONSTRAINT `inventario_herramienta_ibfk_1` FOREIGN KEY (`Codigo_I`) REFERENCES `inventario` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_herramienta_ibfk_2` FOREIGN KEY (`Codigo_herr`) REFERENCES `herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_material`
--
ALTER TABLE `inventario_material`
  ADD CONSTRAINT `inventario_material_ibfk_1` FOREIGN KEY (`Codigo_I`) REFERENCES `inventario` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_material_ibfk_2` FOREIGN KEY (`Cod_Mat`) REFERENCES `material` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_produccion`
--
ALTER TABLE `inventario_produccion`
  ADD CONSTRAINT `inventario_produccion_ibfk_1` FOREIGN KEY (`Codigo_I`) REFERENCES `inventario` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_produccion_ibfk_2` FOREIGN KEY (`Nro_Prod`) REFERENCES `produccion` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `loginp`
--
ALTER TABLE `loginp`
  ADD CONSTRAINT `loginp_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`ID_Unidad_Medida`) REFERENCES `unidad_medida` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`Depo_Numero`) REFERENCES `deposito` (`Numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_ibfk_3` FOREIGN KEY (`Tipo`) REFERENCES `material` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material_pertenece_notentre`
--
ALTER TABLE `material_pertenece_notentre`
  ADD CONSTRAINT `material_pertenece_notentre_ibfk_1` FOREIGN KEY (`Material_Codigo`) REFERENCES `material` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_pertenece_notentre_ibfk_2` FOREIGN KEY (`Nota_Entrega_codigo`) REFERENCES `nota_entrega` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_devolucion`
--
ALTER TABLE `nota_devolucion`
  ADD CONSTRAINT `nota_devolucion_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_devolucion_ibfk_2` FOREIGN KEY (`Nro_Proyecto`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_entrega`
--
ALTER TABLE `nota_entrega`
  ADD CONSTRAINT `nota_entrega_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD CONSTRAINT `nota_ingreso_ibfk_1` FOREIGN KEY (`Proveedor_CI`) REFERENCES `proveedor` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ingreso_ibfk_2` FOREIGN KEY (`Material_Codigo`) REFERENCES `material` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ingreso_ibfk_3` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_ingreso_dotacion`
--
ALTER TABLE `nota_ingreso_dotacion`
  ADD CONSTRAINT `nota_ingreso_dotacion_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_ingreso_herramienta`
--
ALTER TABLE `nota_ingreso_herramienta`
  ADD CONSTRAINT `nota_ingreso_herramienta_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_prestamo`
--
ALTER TABLE `nota_prestamo`
  ADD CONSTRAINT `nota_prestamo_ibfk_1` FOREIGN KEY (`Proyecto_Nro`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_prestamo_ibfk_2` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notprest_tiene_herr`
--
ALTER TABLE `notprest_tiene_herr`
  ADD CONSTRAINT `notprest_tiene_herr_ibfk_1` FOREIGN KEY (`Nota_Prestamo_Codigo`) REFERENCES `nota_prestamo` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notprest_tiene_herr_ibfk_2` FOREIGN KEY (`Herramienta_Codigo`) REFERENCES `herramienta` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `otro_trabajador`
--
ALTER TABLE `otro_trabajador`
  ADD CONSTRAINT `otro_trabajador_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `trabajador` (`Per_CI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Tipo_P`) REFERENCES `tipo_persona` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prod_realiza_proy`
--
ALTER TABLE `prod_realiza_proy`
  ADD CONSTRAINT `prod_realiza_proy_ibfk_1` FOREIGN KEY (`Produccion_Nro`) REFERENCES `produccion` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_realiza_proy_ibfk_2` FOREIGN KEY (`Proyecto_Nro`) REFERENCES `proyecto` (`Nro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `persona` (`CI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `usuario` (`Per_CI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`Per_CI`) REFERENCES `persona` (`CI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Codigo_G`) REFERENCES `grupo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
