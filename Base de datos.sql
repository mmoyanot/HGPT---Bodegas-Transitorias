-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2021 a las 14:42:48
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `vencimiento` date DEFAULT NULL,
  `cant_actual` int(11) DEFAULT NULL,
  `lote` varchar(255) DEFAULT NULL,
  `cod_bar` varchar(255) DEFAULT NULL,
  `ingreso` date DEFAULT NULL,
  `cant_inicial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id_mov` int(11) NOT NULL,
  `id_prod` int(11) DEFAULT NULL,
  `id_lote` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `tipo_mov` varchar(255) DEFAULT NULL,
  `cant_ent` int(11) DEFAULT NULL,
  `cant_sal` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cod_ref` varchar(255) DEFAULT NULL,
  `cant_total` int(11) DEFAULT NULL,
  `creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `descrip`, `tipo`, `cod_ref`, `cant_total`, `creacion`) VALUES
(5, 'Â Agua bidones 20 ltÂ ', 'ABARROTES', '', NULL, '2021-02-04'),
(6, 'corchetes 26-6 c 5000 ud', 'ESCRITORIO', '177', NULL, '2021-02-04'),
(7, 'cinta engomada musching', 'ESCRITORIO', '174', NULL, '2021-02-04'),
(8, 'cinta embalaje transparente 48x40mt', 'ESCRITORIO', '173', NULL, '2021-02-04'),
(9, 'archivador palanca (blanco)', 'ESCRITORIO', '166', NULL, '2021-02-04'),
(10, 'archivador lomo ancho oficio', 'ESCRITORIO', '167', NULL, '2021-02-04'),
(11, 'alfileres (caja)', 'ESCRITORIO', '165', NULL, '2021-02-04'),
(12, 'accoclips plastico (50 unidades)', 'ESCRITORIO', '164', NULL, '2021-02-04'),
(13, 'esponja bonobril', 'ASEO', '139', NULL, '2021-02-04'),
(14, 'escobillon plÃ¡stico tradicional virutex y clorinda', 'ASEO', '137', NULL, '2021-02-04'),
(15, 'botella atomizador gatillo 1lt', 'ASEO', '481', NULL, '2021-02-04'),
(16, 'bolsas plasticas 20x50', 'ASEO', '131', NULL, '2021-02-04'),
(17, 'bolsas aseo 70x90', 'ASEO', '275', NULL, '2021-02-04'),
(18, 'bolsa basura 80x110- 10 unidades', 'ASEO', '130', NULL, '2021-02-04'),
(19, 'BOLSA BASURA 50x70- 10 UNIDADES', 'ASEO', '129', NULL, '2021-02-04'),
(20, 'alcohol 70Âº spray 500 ml', 'ABARROTES', '593', NULL, '2021-02-04'),
(21, 'TOALLA PAPEL WYPALL PARA UMONIUM ROLLO JUMBO 890 HOJAS', 'ASEO', '', NULL, '2021-02-04'),
(22, 'mopa avion 60cm', 'ASEO', '', NULL, '2021-02-04'),
(23, 'CLORO GRANULADO EN SOBRE 4G', 'ASEO', '609', NULL, '2021-02-04'),
(24, 'CLORO GRANULADO EN SOBRE 2G', 'ASEO', '', NULL, '2021-02-04'),
(25, 'CREMA HUMECTANTE', 'OTROS', '550', NULL, '2021-02-04'),
(26, 'ESPUMA DE AFEITAR', 'OTROS', '603', NULL, '2021-02-04'),
(27, 'ESCOBILLON LIVE', 'OTROS', '601', NULL, '2021-02-04'),
(28, 'EPP--PROTECTOR FACIAL (UNIDAD)', 'OTROS', '575', NULL, '2021-02-04'),
(29, 'EPP--PECHERAS PLASTICAS (UNIDAD)', 'OTROS', '577', NULL, '2021-02-04'),
(30, 'EPP--MICA REPUESTO PROTECTOR FACIAL (UNIDAD)', 'OTROS', '576', NULL, '2021-02-04'),
(32, 'EPP--MASCARILLAS KN95 (CAJA)', 'OTROS', '569', NULL, '2021-02-04'),
(33, 'EPP--MASCARILLAS 3 PLIEGUES (CAJA)', 'OTROS', '568', NULL, '2021-02-04'),
(34, 'EPP--GUANTES LATEX S (CAJA)', 'OTROS', '572', NULL, '2021-02-04'),
(35, 'EPP--GUANTES LATEX M (CAJA)', 'OTROS', '573', NULL, '2021-02-04'),
(36, 'EPP--GUANTES LATEX L (CAJA)', 'OTROS', '574', NULL, '2021-02-04'),
(37, 'BOLSA BASURA ROJO LIVE 70X90', 'ASEO', '', NULL, '2021-02-04'),
(38, 'PLUMON PARA ROPA (SHARPIE)', 'ESCRITORIO', '', NULL, '2021-02-04'),
(39, 'PAPEL HIGIENICO X500 MTS', 'ASEO', '', NULL, '2021-02-04'),
(40, 'LIMPIADOR MULTIUSO VIRGINIA CREMA CITRUS 750GR', 'ASEO', '', NULL, '2021-02-04'),
(41, 'LIMPIAVIDRIOS 500 CC', 'ASEO', '', NULL, '2021-02-04'),
(42, 'LYSOFORM AEROSOL 257 GRS SPRAY', 'ASEO', '', NULL, '2021-02-04'),
(43, 'TIJERAS ESCOLARES PUNTA REDONDA', 'ESCRITORIO', '', NULL, '2021-02-04'),
(44, 'TOALLA PAPEL DE MANO ROLLO 300 MTS', 'ASEO', '', NULL, '2021-02-04'),
(45, 'LAPIZ PASTA AZUL', 'ESCRITORIO', '', NULL, '2021-02-04'),
(46, 'SOBRE CARTA ', 'ESCRITORIO', '', NULL, '2021-02-04'),
(47, 'SOBRE OFICIO BLANCO', 'ESCRITORIO', '', NULL, '2021-02-04'),
(48, 'SOBRE 1/3 OFICIO', 'ESCRITORIO', '', NULL, '2021-02-04'),
(49, 'SOBRE 1/4 OFICIO', 'ESCRITORIO', '', NULL, '2021-02-04'),
(50, 'STIC-FIX 20 GR', 'ESCRITORIO', '', NULL, '2021-02-04'),
(51, 'CUCHILLO CARTONERO GRANDE', 'ESCRITORIO', '', NULL, '2021-02-04'),
(52, 'FUNDA PLÃSTICA OFICIO', 'ESCRITORIO', '', NULL, '2021-02-04'),
(53, 'PLUMÃ“N PIZARRA FINA COLORES', 'ESCRITORIO', '', NULL, '2021-02-04'),
(54, 'VASO PLUMAVIT 180CC', 'MENAJE', '', NULL, '2021-02-04'),
(55, 'PAÃ‘AL ADULTO (TRADICIONAL) UNIDAD', 'ASEO', '', NULL, '2021-02-04'),
(56, 'BOLSAS CAMISETAS', 'ASEO', '', NULL, '2021-02-04'),
(57, 'REPUESTO MOPA DE ALGODÃ“N', 'ASEO', '', NULL, '2021-02-04'),
(58, 'LAPIZ PASTA ROJO', 'ESCRITORIO', '', NULL, '2021-02-04'),
(59, 'Â Mopa Clasica c/mangoÂ ', 'ASEO', 'Â 146Â ', NULL, '2021-02-04'),
(60, 'Â VASO PLÃSTICO 300CC CON TAPA Â ', 'MENAJE', '222', NULL, '2021-02-04'),
(61, 'Â VASO PLUMAVIT 300cc CON TAPA Â ', 'MENAJE', '547', NULL, '2021-02-04'),
(62, 'Â Vasos Plasticos Desechables ChicosÂ ', 'MENAJE', '221', NULL, '2021-02-04'),
(63, 'Â DVDÂ ', 'ESCRITORIO', '375', NULL, '2021-02-04'),
(64, 'Â PLUMONES PARA METALÂ ', 'ESCRITORIO', '198', NULL, '2021-02-04'),
(65, 'Â PLUMON PERMANENTE NEGROÂ ', 'ESCRITORIO', '380', NULL, '2021-02-04'),
(66, 'Â Pilas AAÂ ', 'MENAJE', '193', NULL, '2021-02-04'),
(67, 'Â PILAS AAAÂ ', 'MENAJE', '194', NULL, '2021-02-04'),
(68, 'Â PILAS AAA RECARGABLESÂ ', 'MENAJE', '368', NULL, '2021-02-04'),
(69, 'Â Pilas D (Grandes)Â ', 'MENAJE', '195', NULL, '2021-02-04'),
(70, 'Â PILAS GRANDES CÂ ', 'MENAJE', '196', NULL, '2021-02-04'),
(71, 'Â LAVALOZAS QUIX 750 MLÂ ', 'ASEO', '143', NULL, '2021-02-04'),
(72, 'Â PAÃ‘AL ADULTO (CALZON) PAQUETEÂ ', 'ASEO', '461', NULL, '2021-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_uca`
--

CREATE TABLE `usuarios_uca` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `user_uca` varchar(255) DEFAULT NULL,
  `pass_uca` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_uca`
--

INSERT INTO `usuarios_uca` (`id_user`, `nombre`, `apellido`, `user_uca`, `pass_uca`, `correo`) VALUES
(4, 'Cristian', 'Jorquera', 'cjorquera', '123456', NULL),
(5, 'Catalina', 'Del Canto', 'cdelcanto', '123456', NULL),
(6, 'Bernardo', 'Castañeda', 'bcastaneda', '123456', NULL),
(7, 'Gabriela', 'Rojas', 'grojas', '123456', NULL),
(8, 'Jonathan', 'Arias', 'jarias', '123456', NULL),
(9, 'maximiliano', 'lobos', 'mlobos', 't610w2a9', 'naruto2501@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `prod` (`id_prod`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `lote` (`id_lote`),
  ADD KEY `prod2` (`id_prod`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `usuarios_uca`
--
ALTER TABLE `usuarios_uca`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `usuarios_uca`
--
ALTER TABLE `usuarios_uca`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `prod` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `lote` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
