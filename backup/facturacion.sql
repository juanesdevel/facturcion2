-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2024 a las 22:28:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nom_cliente` varchar(40) NOT NULL,
  `doc_cliente` varchar(10) NOT NULL,
  `cel1_cliente` varchar(13) NOT NULL DEFAULT '+57',
  `cel2_cliente` varchar(13) NOT NULL DEFAULT '+57',
  `direccion_cliente` varchar(50) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nom_cliente`, `doc_cliente`, `cel1_cliente`, `cel2_cliente`, `direccion_cliente`, `correo_cliente`) VALUES
(10, 'Enrique Jimenez', '125446768', '+573152654215', '', 'carrera 65 No32-564', 'jim@gmail.com'),
(11, 'Juan Gallego', '1036611055', '3008144841', '', 'San Antonio de Prado', 'Juan@gmail.com'),
(13, 'Patricia Osorio', '1128461346', '3008765654', '', 'Medellín', 'patricio123@gmail.com'),
(14, 'Juan Pérez', '123456749', '3101234567', '3209876543', 'Calle 123 #456', 'juanperez@example.com'),
(15, 'María Gómez', '987654321', '3009876543', '3158765432', 'Carrera 456 #789', 'mariagomez@example.com'),
(16, 'Carlos Martínez', '567890123', '3187654321', '3046543210', 'Avenida 789 #012', 'carlosmartinez@example.com'),
(17, 'Ana Rodríguez', '234567890', '3055432109', '3001234567', 'Transversal 321 #654', 'anarodriguez@example.com'),
(18, 'Pedro López', '89023456', '3006543210', '3102109876', 'Diagonal 210 #543', 'pedrolopez@example.com'),
(19, 'Laura Sánchez', '56789012', '3202109876', '3153456789', 'Callejón 987 #210', 'laurasanchez@example.com'),
(20, 'Javier Hernández', '345678901', '3154567890', '3046789012', 'Carrera 543 #876', 'javierhernandez@example.com'),
(21, 'Sofía Torres', '678904234', '3106789012', '3187890123', 'Avenida 678 #123', 'sofiatorres@example.com'),
(22, 'Luisa Ramírez', '901634567', '3047890123', '3208901234', 'Transversal 456 #789', 'luisaramirez@example.com'),
(23, 'Daniel González', '234567890', '3004567890', '3105432109', 'Diagonal 543 #012', 'danielgonzalez@example.com'),
(24, 'Elena Vargas', '123098765', '3156789012', '3101230987', 'Calle 987 #654', 'elenavargaz@example.com'),
(25, 'Miguel Soto', '987012341', '3042109876', '3183456789', 'Carrera 210 #987', 'miguelsoto@example.com'),
(26, 'Patricia Ríos', '567890123', '3186543210', '3009870123', 'Avenida 789 #012', 'patriciarios@example.com'),
(27, 'Ricardo Cárdenas', '234567890', '3105432109', '3046789012', 'Transversal 321 #654', 'ricardocardenas@example.com'),
(28, 'Silvia Torres', '890123456', '3006789012', '3157890123', 'Diagonal 210 #543', 'silviatorres@example.com'),
(29, 'Gustavo Sánchez', '456789012', '3157890123', '3208901234', 'Callejón 987 #210', 'gustavosanchez@example.com'),
(30, 'Laura Gutiérrez', '345678901', '3181234567', '3008901234', 'Carrera 543 #876', 'lauragutierrez@example.com'),
(31, 'Roberto Navarro', '678901334', '3107890123', '3156789012', 'Avenida 678 #123', 'robertonavarro@example.com'),
(32, 'Alejandra Medina', '921234567', '3206543210', '3183456789', 'Transversal 456 #789', 'alejandramedina@example.com'),
(33, 'Diego Castro', '234567890', '3158901234', '3105678901', 'Diagonal 543 #012', 'diegocastro@example.com'),
(34, 'Natalia Gómez', '098765432', '3109876543', '3206543210', 'Calle 123 #456', 'nataliagomez@example.com'),
(35, 'Rosa Martínez', '876543210', '3043210987', '3185432109', 'Carrera 456 #789', 'rosamartinez@example.com'),
(36, 'Andrés Pérez', '543210987', '3156789012', '3100987654', 'Avenida 789 #012', 'andresperez@example.com'),
(37, 'Carolina López', '210987654', '3185678901', '3201230987', 'Transversal 321 #654', 'carolinalopez@example.com'),
(38, 'Gabriel Ramírez', '654321098', '3108901234', '3156789012', 'Diagonal 210 #543', 'gabrielramirez@example.com'),
(39, 'Valeria González', '109876543', '3205432109', '3040987654', 'Callejón 987 #210', 'valeriagonzalez@example.com'),
(40, 'Santiago Castro', '432109876', '3180987654', '3106789012', 'Carrera 543 #876', 'santiagocastro@example.com'),
(41, 'Marcela Díaz', '321098765', '3105678901', '3150987654', 'Avenida 678 #123', 'marceladiaz@example.com'),
(42, 'Felipe Gómez', '765432109', '3150987654', '3205678901', 'Transversal 456 #789', 'felipegomez@example.com'),
(43, 'Isabella Sánchez', '098765432', '3046789012', '3186543210', 'Diagonal 543 #012', 'isabellasanchez@example.com'),
(44, 'Jairo Ramirez', '1128978876', '3207655498', '', 'Barranquilla', 'Jairo2022@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devolucion` int(10) NOT NULL,
  `fecha_devo` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_devo` varchar(30) NOT NULL,
  `doc_cliente_devo` varchar(10) NOT NULL,
  `id_venta` varchar(10) NOT NULL,
  `ref_producto` varchar(4) NOT NULL,
  `unidades_pro` varchar(2) NOT NULL,
  `factura_devo` varchar(10) NOT NULL,
  `valor_devo` varchar(10) NOT NULL,
  `tipo_devo` varchar(15) NOT NULL,
  `descripcion_devo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id_devolucion`, `fecha_devo`, `usuario_devo`, `doc_cliente_devo`, `id_venta`, `ref_producto`, `unidades_pro`, `factura_devo`, `valor_devo`, `tipo_devo`, `descripcion_devo`) VALUES
(13, '2024-03-30 05:00:00', 'admin', '1036611055', '111', 'OA15', '2', '2', '359980', 'Garantía', 'Garantía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `no_factura` int(150) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Cerrada',
  `fecha_factura` datetime NOT NULL DEFAULT current_timestamp(),
  `doc_cliente` varchar(10) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `asesor` varchar(14) NOT NULL,
  `caja` varchar(2) NOT NULL,
  `forma_de_pago` varchar(15) NOT NULL,
  `total_venta_con_iva` varchar(10) NOT NULL,
  `doc_factura` varchar(200) NOT NULL DEFAULT 'C:\\Users\\GalleOso\\Documents\\Facturas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `no_factura`, `estado`, `fecha_factura`, `doc_cliente`, `nom_cliente`, `asesor`, `caja`, `forma_de_pago`, `total_venta_con_iva`, `doc_factura`) VALUES
(2, 1, 'Cerrada', '2024-03-25 18:33:23', '1036611055', 'JUAN GALLEGO', 'admin', '1', 'tarjeta', '0', 'C:\\Users\\GalleOso\\Documents\\Facturas'),
(24, 2, 'Anulada', '2024-03-30 15:29:28', '1036611055', 'JUAN GALLEGO', 'admin', '1', '', '359980', 'C:\\Users\\GalleOso\\Documents\\Facturas'),
(25, 3, 'Cerrada', '2024-03-30 15:56:23', '345678901 ', 'Javier Hernández', 'admin', '2', 'Efectivo', '379420', 'C:\\Users\\GalleOso\\Documents\\Facturas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `ref_producto` varchar(15) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `cat_producto` varchar(20) NOT NULL DEFAULT 'TECNOLOGIA',
  `valor_producto` varchar(10) NOT NULL,
  `unidades_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `ref_producto`, `descripcion_producto`, `cat_producto`, `valor_producto`, `unidades_producto`) VALUES
(1, 'PH51', 'pantalla LG 55', 'TECNOLOGIA', '450000', 66),
(3, 'ME24', 'usb kingtone 64GB', 'TECNOLOGIA', '55000', 65),
(9, 'AT10', 'audifonos inalambricos', 'TECNOLOGIA', '150000', 44),
(10, 'AK01', 'usb kingtone 32GB', 'TECNOLOGIA', '39900', 50),
(11, 'BM02', 'Auriculares Bluetooth', 'TECNOLOGIA', '74900', 20),
(12, 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250', 35),
(13, 'DO04', 'Teclado mecánico', 'TECNOLOGIA', '124990', 12),
(14, 'EP05', 'Disco duro externo 1TB', 'TECNOLOGIA', '149990', 11),
(15, 'FQ06', 'Monitor LED 24\"', 'TECNOLOGIA', '374990', 12),
(16, 'GR07', 'Impresora láser', 'TECNOLOGIA', '499990', 15),
(17, 'HS08', 'Cargador inalámbrico', 'TECNOLOGIA', '62490', 30),
(18, 'IT09', 'Funda para portátil', 'TECNOLOGIA', '49990', 25),
(19, 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990', 12),
(20, 'KV11', 'Memoria RAM 16GB', 'TECNOLOGIA', '199990', 18),
(21, 'LW12', 'Adaptador HDMI', 'TECNOLOGIA', '24990', 40),
(22, 'MX13', 'Altavoces portátiles', 'TECNOLOGIA', '69990', 22),
(23, 'NZ14', 'Router Wi-Fi', 'TECNOLOGIA', '99990', 13),
(24, 'OA15', 'Tableta gráfica', 'TECNOLOGIA', '179990', 10),
(25, 'PB16', 'Batería externa 10000mAh', 'TECNOLOGIA', '74900', 28),
(26, 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490', 45),
(27, 'RD18', 'Lector de tarjetas', 'TECNOLOGIA', '22490', 50),
(28, 'SE19', 'Antena amplificadora', 'TECNOLOGIA', '49990', 20),
(29, 'TF20', 'Estuche para auriculares', 'TECNOLOGIA', '14990', 75),
(30, 'UG21', 'Cable de carga USB', 'TECNOLOGIA', '34990', 90),
(31, 'VH22', 'Teclado inalámbrico', 'TECNOLOGIA', '74900', 15),
(32, 'WI23', 'Adaptador Bluetooth', 'TECNOLOGIA', '24990', 50),
(33, 'XJ24', 'Disco SSD 500GB', 'TECNOLOGIA', '124990', 19),
(34, 'YK25', 'Mousepad Gaming', 'TECNOLOGIA', '32990', 40),
(35, 'ZL26', 'Hub USB 3.0', 'TECNOLOGIA', '39900', 30),
(36, 'AM27', 'Cable Ethernet 10m', 'TECNOLOGIA', '49990', 18),
(37, 'BN28', 'Cámara de seguridad', 'TECNOLOGIA', '199990', 12),
(38, 'CO29', 'Soporte para teléfono', 'TECNOLOGIA', '15990', 80),
(39, 'DP30', 'Adaptador de corriente', 'TECNOLOGIA', '23990', 25),
(40, 'LT05', 'Lector multi-tarjetas', 'TECNOLOGIA', '55000', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `codigo_usuario` int(4) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasena_usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `codigo_usuario`, `nombre_usuario`, `contrasena_usuario`) VALUES
(67, 25, 'admin', 'admin'),
(68, 10, 'jhon', '0103'),
(69, 13, 'juan', '2024'),
(70, 1, 'Usuario1', '1234'),
(71, 2, 'Usuario2', '5678'),
(72, 3, 'Usuario3', '9876'),
(73, 4, 'Usuario4', '4321'),
(74, 5, 'Usuario5', '8765'),
(75, 6, 'Usuario6', '3210'),
(76, 7, 'Usuario7', '6543'),
(77, 8, 'Usuario8', '7890'),
(78, 9, 'Usuario9', '2109'),
(79, 10, 'Usuario10', '5432'),
(80, 76, 'Camilo', '1111'),
(81, 25, 'Cristian Gonzalez', '1122');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `factura_venta` int(150) NOT NULL,
  `fecha_hora_venta` datetime NOT NULL DEFAULT current_timestamp(),
  `nom_cliente` varchar(30) NOT NULL,
  `doc_cliente_venta` varchar(11) NOT NULL,
  `valor_total_venta` decimal(10,0) NOT NULL,
  `asesor_venta` varchar(30) NOT NULL,
  `caja` varchar(2) NOT NULL,
  `forma_de_pago` varchar(30) NOT NULL,
  `unidades_venta` int(3) NOT NULL,
  `ref_prod_venta` varchar(10) NOT NULL,
  `producto_venta` varchar(50) NOT NULL,
  `valor_producto` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Realizada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `factura_venta`, `fecha_hora_venta`, `nom_cliente`, `doc_cliente_venta`, `valor_total_venta`, `asesor_venta`, `caja`, `forma_de_pago`, `unidades_venta`, `ref_prod_venta`, `producto_venta`, `valor_producto`, `estado`) VALUES
(56, 1, '2024-03-25 18:28:29', 'JUAN GALLEGO', '1036611055', 0, 'admin', '1', 'tarjeta', 0, 'p1', 'PANTALLA LG 42\"', '450000', 'Realizada'),
(111, 2, '2024-03-30 15:29:28', 'JUAN GALLEGO', '1036611055', 359980, 'admin', '1', '', 2, 'OA15', 'Tableta gráfica', '179990', 'Devolucion'),
(112, 3, '2024-03-30 15:56:23', 'Javier Hernández', '345678901', 199500, 'admin', '2', 'Efectivo', 5, 'ZL26', 'Hub USB 3.0', '39900', 'Realizada'),
(113, 3, '2024-03-30 15:58:14', 'Javier Hernández', '345678901', 179920, 'admin', '2', 'Efectivo', 8, 'RD18', 'Lector de tarjetas', '22490', 'Realizada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devolucion`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devolucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
