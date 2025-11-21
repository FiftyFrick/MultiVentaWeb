-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2025 a las 00:24:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multiventaservice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Hardware'),
(2, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `cod_interno` varchar(15) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_sub_categoria` int(11) DEFAULT NULL,
  `cod_provedor` varchar(15) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `cod_interno`, `nombre`, `descripcion`, `id_categoria`, `id_sub_categoria`, `cod_provedor`, `precio`, `ruta_imagen`, `fecha`) VALUES
(1, 'HW001', 'GTX 1660 Super', 'Rendimiento sólido para gaming en 1080p. Ideal para juegos competitivos y títulos exigentes a buena calidad gráfica. Bajo consumo, mantiene buenas temperaturas y es compatible con la mayoría de las PCs actuales.', 1, 1, 'zv012', 250000.00, 'img/gtx1660super.jpeg', '2025-11-12'),
(2, 'HW002', 'RX 6600', 'Placa de video AMD serie 6000, excelente rendimiento 1080p.', 1, 1, 'rx6600-a1', 290000.00, 'img/rx6600.jpeg', '2025-11-13'),
(3, 'HW003', 'Ryzen 5', 'Procesador Ryzen de última generación, ideal para gaming.', 1, 2, 'ry5-b3', 180000.00, 'img/rayzen5.jpeg', '2025-11-12'),
(4, 'HW004', 'Intel i7', 'Procesador Intel Core i7 para alto rendimiento en tareas pesadas.', 1, 2, 'i7-k9', 290000.00, 'img/inteli7.jpg', '2025-11-12'),
(5, 'HW005', 'Gabinete Coolermaster TD300', 'Gabinete ATX ventilado con panel frontal mesh.', 1, 4, 'td300-wh', 85000.00, 'img/Gabinete-Coolermaster-Masterbox-Td300-Mesh-White.png', '2025-11-12'),
(6, 'HW006', 'Intel i9', 'Procesador tope de gama para entornos profesionales y gaming extremo.', 1, 2, 'i9-x7', 280000.00, 'img/inteli9.jpeg', '2025-11-13'),
(7, 'hw007', 'Kit Memoria DDR4 32GB', 'Kit dual channel para mejor rendimiento.', 1, 3, 'd4-32-kit', 80000.00, 'img/1763003513_kitmemddr4.jpg', '2025-11-13'),
(8, 'HW008', 'Gabinete Cooler Master', 'Gabinete compacto con diseño minimalista.', 1, 4, 'cmx202', 70000.00, 'img/1763004686_gabinetecoolermaster.jpeg', '2025-11-13'),
(11, 'HW009', 'Memoria DDR4 16GB', 'Memoria para PC de alto rendimiento', 1, 3, 'd4-16x', 80000.00, 'img/1763006362_memddr4.jpg', '2025-11-13'),
(12, 'HW010', 'Kit Upgrade Ryzen 7', 'Incluye placa + CPU + RAM para actualización completa.', 1, 5, 'up-ry7', 300000.00, 'img/kitupgrade.jpeg', '2025-11-21'),
(13, 'AC001', 'Mouse Gamer Logitech G Pro', 'Sensor preciso, RGB, diseñado para eSports.', 2, 6, 'lg-gp', 25000.00, 'img/mouse-gamer-logitech-g-pro-gaming-con-cable-luz-led-rgb-12000-dpi.jpg', '2025-11-21'),
(14, 'AC002', 'Mando PS4', 'Control inalámbrico compatible con PlayStation 4.', 2, 7, 'ps4-c1', 18000.00, 'img/ps4.jpg', '2025-11-21'),
(15, 'AC003', 'Mando Xbox Series X', 'Control oficial con cableado mejorado.', 2, 7, 'xb-sx2', 20000.00, 'img/xbox x.jpg', '2025-11-21'),
(16, 'AC004', 'Teclado Gamer', 'Teclado retroiluminado ideal para gaming.', 2, 6, 'tk-bs1', 15000.00, 'img/teclado.jpg', '2025-11-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id_sub_categoria` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id_sub_categoria`, `id_categoria`, `nombre`) VALUES
(1, 1, 'GPU'),
(2, 1, 'CPU'),
(3, 1, 'Memoria'),
(4, 1, 'Gabinetes'),
(5, 1, 'Kits Upgrade'),
(6, 2, 'Periféricos Gamer'),
(7, 2, 'Controles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosadmin`
--

CREATE TABLE `usuariosadmin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariosadmin`
--

INSERT INTO `usuariosadmin` (`id`, `nombre`, `email`, `telefono`, `contraseña`) VALUES
(1, 'walter', 'walter@example.com', '123456789', '81dc9bdb52d04dc20036dbd8313ed055');

-- walter -- 1234




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventana_emergente`
--

CREATE TABLE `ventana_emergente` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ruta_imagen` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventana_emergente`
--

INSERT INTO `ventana_emergente` (`id`, `titulo`, `descripcion`, `ruta_imagen`) VALUES
(1, '¡Bienvenido!', 'Revisa nuestros Últimos Productos agregados!!!', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sub_categoria` (`id_sub_categoria`),
  ADD KEY `idx_nombre` (`nombre`),
  ADD KEY `idx_categoria_sub` (`id_categoria`,`id_sub_categoria`);

--
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id_sub_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventana_emergente`
--
ALTER TABLE `ventana_emergente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventana_emergente`
--
ALTER TABLE `ventana_emergente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_sub_categoria`) REFERENCES `sub_categorias` (`id_sub_categoria`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD CONSTRAINT `sub_categorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
