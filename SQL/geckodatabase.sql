-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 06:49 AM
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
-- Database: `geckodatabase`
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
(3, 'Sudaderas');

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
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `existencias`
--

CREATE TABLE `existencias` (
  `id_existencia` smallint(2) NOT NULL,
  `existencia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `existencias`
--

INSERT INTO `existencias` (`id_existencia`, `existencia`) VALUES
(1, 10),
(2, 25);

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

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_metodoP` int(11) NOT NULL,
  `estado_pedido` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `destinatario` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoriaf` smallint(2) NOT NULL,
  `id_dptof` smallint(2) NOT NULL,
  `id_existencia` smallint(2) NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoriaf`, `id_dptof`, `id_existencia`, `nombre_producto`, `descripcion`, `precio`, `imagen`) VALUES
(1, 1, 1, 1, 'Playera Blanca', 'Playera manga corta varias tallas', 300, '1'),
(2, 1, 1, 1, 'Playera Roja', 'Playera con estampado', 279, '2'),
(3, 1, 1, 1, 'Playera negra', 'Manga corta color negro', 350, '3'),
(4, 1, 1, 1, 'Playera con estampado', 'Tela de excelente calidad', 200, '4'),
(5, 1, 1, 1, 'Playera azul con estampado de flores', 'Color azul diferentes tallas', 499, '5'),
(6, 1, 1, 1, 'Playera color gris', 'De manga corta en diferentes tallas', 200, '6'),
(7, 1, 1, 1, 'Playera generica con un nombre demasiado larg', 'Esta es una playera con nombre y descripción ', 1299, '7'),
(8, 3, 1, 1, 'Sueter azul', 'Sueter con diseño Monstruo Comegalletas', 349, 'Sudadera1'),
(9, 3, 1, 2, 'Sueter rojo', 'Sueter con diseño navideño', 299, 'Sudadera2'),
(10, 3, 1, 1, 'Sueter verde', 'Sueter con diseño de reno navideño', 249, 'Sudadera3'),
(11, 2, 1, 1, 'Taza Blanca', 'Feliz Navidad Marcos', 130, 'Taza1'),
(12, 2, 1, 2, 'Taza Blanca', 'Feliz Navidad Patricia', 130, 'Taza2'),
(13, 2, 1, 1, 'Taza Azul', 'Muñeco de Nieve', 80, 'Taza3'),
(14, 2, 1, 1, 'Taza Negra Mágica', 'Merodeadores Harry Potter', 180, 'Taza4'),
(15, 2, 1, 1, 'Taza Negra/Blanca', 'Harry Potter Reliquias de la muerte', 160, 'Taza5'),
(16, 2, 1, 1, 'Taza Roja Mágica', 'Recuerdos de boda', 180, 'Taza6');

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
(1, 'jairmqz', '123', 1, '3318325850', 'a@a', 'Marquez', 'Jair', 'JMR123', 0),
(2, 'evegand', '123456', 2, '3315271078', 'evegand@gmail.com', 'Guerrero', 'Everardo', 'EGA234', 0);

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
  ADD PRIMARY KEY (`id_existencia`);

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
  ADD KEY `departamentos_ibfk_2` (`id_dptof`),
  ADD KEY `existencia_ibfk_3` (`id_existencia`);

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
  MODIFY `id_categoria` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id_existencia` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metodospago`
--
ALTER TABLE `metodospago`
  MODIFY `id_metodoP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `existencia_ibfk_3` FOREIGN KEY (`id_existencia`) REFERENCES `existencias` (`id_existencia`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoriaf`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/* Usuarios de cada cliente */
SELECT usuarios.id_usuario, clientes.nombre, clientes.apellido, usuarios.correo 
FROM clientes JOIN usuarios ON clientes.id_cliente = usuarios.id_cliente;

/* Métodos de pago de cada cliente */
SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, metodospago.numero_tarjeta, metodospago.fecha_vencimiento
FROM clientes JOIN metodospago ON clientes.id_cliente = metodospago.id_cliente;

SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, metodospago.numero_tarjeta, metodospago.fecha_vencimiento
FROM clientes AS c JOIN metodospago AS mp ON clientes.id_cliente = metodospago.id_cliente;


/* Direcciones de los clientes */

