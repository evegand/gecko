-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 08:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geckodatabase2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` smallint(2) NOT NULL,
  `nombre_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Playeras'),
(2, 'Tazas'),
(3, 'Sudaderas'),
(4, 'Llaveros'),
(5, 'Termos'),
(6, 'Rompecabezas'),
(7, 'Botellas'),
(8, 'Invitaciones'),
(9, 'Almohadas'),
(10, 'Gorras');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` smallint(2) NOT NULL,
  `nombre_departamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Productos'),
(2, 'Servicios');

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `talla` varchar(25) NOT NULL,
  `subtotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `cantidad`, `id_pedido`, `id_producto`, `talla`, `subtotal`) VALUES
(1, 1, 1, 2, 'M', NULL),
(2, 1, 2, 4, 'C', NULL),
(3, 1, 3, 6, 'G', NULL),
(4, 2, 4, 8, 'G', NULL),
(5, 1, 5, 10, 'M', NULL),
(6, 1, 6, 11, 'NULL', NULL),
(7, 1, 7, 12, 'NULL', NULL),
(8, 1, 8, 16, 'NULL', NULL);

--
-- Triggers `detalle`
--
DELIMITER $$
CREATE TRIGGER `ActualizacionExistencias` BEFORE INSERT ON `detalle` FOR EACH ROW BEGIN
 IF (((SELECT existencia FROM existencias WHERE id_producto =
NEW.id_producto) - NEW.cantidad) > 0) THEN
 UPDATE existencias SET existencia = (existencia - NEW.cantidad)
 WHERE id_producto = NEW.id_producto;
 END IF;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CalcularSubtotal` BEFORE INSERT ON `detalle` FOR EACH ROW BEGIN
 SET NEW.subtotal = NEW.cantidad * (SELECT precio FROM productos WHERE
id_producto = NEW.id_producto);
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `numero` smallint(6) NOT NULL,
  `cp` smallint(6) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `estado`, `ciudad`, `colonia`, `calle`, `numero`, `cp`, `id_usuario`) VALUES
(0, 'Direccion Eliminada', '---', '---', '---', 0, 0, 0),
(1, 'Jalisco', 'Guadalajara', 'Lomas de Zapopan', 'Santa Margarita', 196, 32767, 1),
(2, 'Jalisco', 'Guadalajara', 'Tesistán', 'Glorieta Lorem ipsum', 321, 32767, 2),
(3, 'Jalisco', 'Guadalajara', 'Javier Mina', 'Calle Bernier', 451, 32767, 3),
(4, 'Jalisco', 'Guadalajara', 'Ladrón de Guevara', 'Viejo Camino a Tesistán', 689, 32767, 4),
(5, 'Jalisco', 'Guadalajara', 'Lagos de Oriente', 'Avenida de la Sienna', 685, 32767, 5),
(6, 'Jalisco', 'Guadalajara', 'Miravalle', 'Jardines de Kuphal', 238, 32767, 6),
(7, 'Jalisco', 'Guadalajara', 'El Mirador', 'Alameda Cuesta', 408, 32767, 7),
(8, 'Jalisco', 'Guadalajara', 'Chapalita', 'Calle Cañada Travesía', 505, 32767, 8),
(9, 'Jalisco', 'Guadalajara', 'Ciudad Universitaria', 'Avenida Lorem ipsum', 151, 32767, 9),
(10, 'Jalisco', 'Guadalajara', 'Fidel Velázquez', 'Rambla Lorem', 331, 32767, 10),
(11, 'Jalisco', 'Guadalajara', 'Lomas de Zapopan', 'Santa Margarita', 196, 32767, 2),
(12, 'Jalisco', 'Guadalajara', 'Tesistán', 'Glorieta Lorem ipsum', 321, 32767, 2),
(13, 'Jalisco', 'Guadalajara', 'Javier Mina', 'Calle Bernier', 451, 32767, 2),
(14, 'Jalisco', 'Guadalajara', 'Ladrón de Guevara', 'Viejo Camino a Tesistán', 689, 32767, 3),
(15, 'Jalisco', 'Guadalajara', 'Lagos de Oriente', 'Avenida de la Sienna', 685, 32767, 3),
(16, 'Jalisco', 'Guadalajara', 'Miravalle', 'Jardines de Kuphal', 238, 32767, 3),
(17, 'Jalisco', 'Guadalajara', 'El Mirador', 'Alameda Cuesta', 408, 32767, 6),
(18, 'Jalisco', 'Guadalajara', 'Chapalita', 'Calle Cañada Travesía', 505, 32767, 9),
(19, 'Jalisco', 'Guadalajara', 'Ciudad Universitaria', 'Avenida Lorem ipsum', 151, 32767, 9),
(20, 'Jalisco', 'Guadalajara', 'Fidel Velázquez', 'Rambla Lorem', 331, 32767, 10);

--
-- Triggers `direcciones`
--
DELIMITER $$
CREATE TRIGGER `EliminarDireccion` BEFORE DELETE ON `direcciones` FOR EACH ROW BEGIN
 UPDATE pedidos SET id_direccion = 0 WHERE id_direccion = OLD.id_direccion;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `existencias`
--

CREATE TABLE `existencias` (
  `id_existencia` smallint(2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `existencia` int(10) NOT NULL,
  `detalle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `existencias`
--

INSERT INTO `existencias` (`id_existencia`, `id_producto`, `existencia`, `detalle`) VALUES
(1, 1, 7, 'M'),
(2, 2, 3, 'M'),
(3, 3, 5, 'M'),
(4, 4, 2, 'M'),
(5, 5, 1, 'M'),
(6, 6, 1, 'M'),
(7, 7, 0, 'M'),
(8, 8, 0, 'M'),
(9, 9, 1, 'M'),
(10, 10, 0, 'M'),
(61, 11, 3, 'M'),
(62, 12, 5, 'M'),
(63, 13, 2, 'M'),
(64, 14, 1, 'M'),
(65, 15, 13, 'M'),
(66, 16, 10, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `metodospago`
--

CREATE TABLE `metodospago` (
  `id_metodoP` int(11) NOT NULL,
  `titular` varchar(45) NOT NULL,
  `numero_tarjeta` varchar(45) NOT NULL,
  `fecha_vencimiento` varchar(5) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodospago`
--

INSERT INTO `metodospago` (`id_metodoP`, `titular`, `numero_tarjeta`, `fecha_vencimiento`, `id_usuario`) VALUES
(0, 'Metodo eliminado', '0000', '00/00', 0),
(1, 'Jair Marquez', '7242279025494860', '10/22', 1),
(2, 'Everardo Guerrero', '1622565873261440', '06/24', 2),
(3, 'Vanessa Andrade', '3213642840273040', '11/21', 3),
(4, 'Alma Hernandez', '3084381145477410', '01/25', 4),
(5, 'Erubey Cazares', '8746909071230310', '05/23', 5),
(6, 'Guillermo Tavizon', '2502233434948690', '03/25', 6),
(7, 'Hector Delgado', '1807809386854040', '03/25', 7),
(8, 'David Trejo', '3959495905434370', '10/21', 8),
(9, 'Ivan Ayala', '4628484242458520', '11/25', 9),
(10, 'Ismael Ponce', '1102166010647190', '08/24', 10);

--
-- Triggers `metodospago`
--
DELIMITER $$
CREATE TRIGGER `EliminarMetodoP` BEFORE DELETE ON `metodospago` FOR EACH ROW BEGIN
 UPDATE pedidos SET id_metodoP = 0 WHERE id_metodoP = OLD.id_metodoP;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_metodoP` int(11) DEFAULT NULL,
  `estado_pedido` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `destinatario` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `id_metodoP`, `estado_pedido`, `fecha`, `id_direccion`, `destinatario`, `telefono`) VALUES
(1, 3, 3, 'Proceso', '2020-12-03', 3, 'Vanessa Andrade', '3310253266'),
(2, 4, 4, 'Proceso', '2020-12-03', 4, 'Alma Hernandez', '3334250456'),
(3, 5, 5, 'Proceso', '2020-12-03', 5, 'Erubey Cazares', '3314773622'),
(4, 6, 6, 'Proceso', '2020-12-03', 6, 'Guillermo Tavizon', '3310232200'),
(5, 7, 7, 'Proceso', '2020-12-03', 7, 'Hector Delgado', '3314254721'),
(6, 8, 8, 'Entregado', '2020-12-03', 8, 'David Trejo', '3335250637'),
(7, 9, 9, 'Proceso', '2020-12-03', 9, 'Ivan Ayala', '3356253638'),
(8, 10, 10, 'Entregado', '2020-12-03', 10, 'Ismael Ponce', '3400200008');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoriaf` smallint(2) NOT NULL,
  `id_dptof` smallint(2) NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoriaf`, `id_dptof`, `nombre_producto`, `descripcion`, `precio`, `imagen`) VALUES
(1, 1, 1, 'Playera Blanca', 'Playera manga corta varias tallas', 300, '1'),
(2, 1, 1, 'Playera Roja', 'Playera con estampado', 279, '2'),
(3, 1, 1, 'Playera negra', 'Manga corta color negro', 350, '3'),
(4, 1, 1, 'Playera con estampado', 'Tela de excelente calidad', 200, '4'),
(5, 1, 1, 'Playera azul con estampado de flores', 'Color azul diferentes tallas', 499, '5'),
(6, 1, 1, 'Playera color gris', 'De manga corta en diferentes tallas', 200, '6'),
(7, 1, 1, 'Playera generica con un nombre demasiado larg', 'Esta es una playera con nombre y descripción ', 1299, '7'),
(8, 3, 1, 'Sueter azul', 'Sueter con diseño Monstruo Comegalletas', 349, 'Sudadera1'),
(9, 3, 1, 'Sueter rojo', 'Sueter con diseño navideño', 299, 'Sudadera2'),
(10, 3, 1, 'Sueter verde', 'Sueter con diseño de reno navideño', 249, 'Sudadera3'),
(11, 2, 1, 'Taza Blanca', 'Feliz Navidad Marcos', 130, 'Taza1'),
(12, 2, 1, 'Taza Blanca', 'Feliz Navidad Patricia', 130, 'Taza2'),
(13, 2, 1, 'Taza Azul', 'Muñeco de Nieve', 80, 'Taza3'),
(14, 2, 1, 'Taza Negra Mágica', 'Merodeadores Harry Potter', 180, 'Taza4'),
(15, 2, 1, 'Taza Negra/Blanca', 'Harry Potter Reliquias de la muerte', 160, 'Taza5'),
(16, 2, 1, 'Taza Roja Mágica', 'Recuerdos de boda', 180, 'Taza6');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `RFC` varchar(45) DEFAULT NULL,
  `cambio_usuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `id_rol`, `telefono`, `correo`, `apellido`, `nombre`, `RFC`, `cambio_usuario`) VALUES
(0, 'Usuario Eliminado', '123456', 0, '-', '-', '-', '-', '-', 0),
(1, 'jairmqz', '123', 1, '3318325850', 'a@a', 'Marquez', 'Jair', 'JMR123', 0),
(2, 'evegand', '123456', 2, '3315271078', 'evegand@gmail.com', 'Guerrero', 'Everarda', 'EGA234', 0),
(3, 'vaneyadi', '456', 2, '3369815519', 'vaneyadi@gmail.com', 'Andrade', 'Vanessa', 'VA7819', 0),
(4, 'Alma', '789', 2, '3000053619', 'alma_hrn@gmail.com', 'Hernandez', 'Alma', 'AH0081', 0),
(5, 'Erubey', '123', 2, '34836945519', 'erucaz@gmail.com', 'Cazares', 'Erubey', 'EC0058', 0),
(6, 'Guillermo', '456', 2, '33698015519', 'rairguill@gmail.com', 'Tavizon', 'Guillermo', 'GT0032', 0),
(7, 'Hector', '789', 2, '3259815519', 'delgado_hector@gmail.com', 'Delgado', 'Hector', 'HD0056', 0),
(8, 'David', '123', 2, '3369815519', 'trejdav@gmail.com', 'Trejo', 'David', 'DT0042', 0),
(9, 'Ivan', '456', 2, '3369364519', 'churrosayala@gmail.com', 'Ayala', 'Ivan', 'IA0093', 0),
(10, 'Ismael', '789', 2, '3369814329', 'ismapon@gmail.com', 'Ponce', 'Ismael', 'IP0015', 0);

--
-- Triggers `usuarios`
--
DELIMITER $$
CREATE TRIGGER `EliminarUsuario` BEFORE DELETE ON `usuarios` FOR EACH ROW BEGIN
 UPDATE metodospago SET id_usuario = 0 WHERE id_usuario = OLD.id_usuario;
 DELETE FROM metodospago WHERE id_usuario = 0 AND id_metodoP != 0;
 UPDATE direcciones SET id_usuario = 0 WHERE id_usuario = OLD.id_usuario;
 DELETE FROM direcciones WHERE id_usuario = 0 AND id_direccion != 0;
 UPDATE pedidos SET id_usuario = 0 WHERE id_usuario = OLD.id_usuario;
 END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`id_existencia`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `metodospago`
--
ALTER TABLE `metodospago`
  ADD PRIMARY KEY (`id_metodoP`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_metodoP` (`id_metodoP`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoriaf` (`id_categoriaf`),
  ADD KEY `departamentos_ibfk_2` (`id_dptof`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id_existencia` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `metodospago`
--
ALTER TABLE `metodospago`
  MODIFY `id_metodoP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `existencias`
--
ALTER TABLE `existencias`
  ADD CONSTRAINT `existencias_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `metodospago`
--
ALTER TABLE `metodospago`
  ADD CONSTRAINT `metodospago_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_metodoP`) REFERENCES `metodospago` (`id_metodoP`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `departamentos_ibfk_2` FOREIGN KEY (`id_dptof`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoriaf`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
