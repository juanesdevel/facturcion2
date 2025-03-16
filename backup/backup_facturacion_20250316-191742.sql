-- Backup de la base de datos: facturacion
-- Fecha de creación: 2025-03-16 19:17:42

-- Estructura de la tabla clientes
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cliente` varchar(40) NOT NULL,
  `doc_cliente` varchar(10) NOT NULL,
  `cel1_cliente` varchar(13) NOT NULL DEFAULT '+57',
  `cel2_cliente` varchar(13) NOT NULL DEFAULT '+57',
  `direccion_cliente` varchar(50) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla clientes
INSERT INTO clientes VALUES ('69', 'JUAN PABLO GOMEZ', '1145678901', '3023334455', '3023334455', 'Calle 60 Carrera 25 35', 'juanpablo@gmail.com');
INSERT INTO clientes VALUES ('70', 'LAURA SOFIA RODRIGUEZ', '1156789012', '3034445566', '3034445566', 'Calle 50 Calle  8-22', 'laura@gmail.com');
INSERT INTO clientes VALUES ('71', 'DIEGO ALEJANDRO PEREZ', '1167890123', '3045556677', '3045556677', 'Carrera 15 Calle 23-56', 'diego@gmail.com');
INSERT INTO clientes VALUES ('72', 'ANA CAMILA RAMIREZ', '1178901234', '3056667788', '3056667788', 'Diagonal 3 Calle 9-40', 'ana@gmail.com');
INSERT INTO clientes VALUES ('73', 'MIGUEL ANGEL TORRES', '1189012345', '3067778899', '3067778899', 'Calle 80 Calle 100-12', 'miguel@gmail.com');
INSERT INTO clientes VALUES ('74', 'SANTIAGO JOSE HERNANDEZ', '1190123456', '3078889900', '3078889900', 'Transversal 45 Calle 67-89', 'santiago@gmail.com');
INSERT INTO clientes VALUES ('75', 'VALENTINA ISABEL CASTRO', '1201234567', '3089990011', '3089990011', 'Carrera 90 Calle 2-16', 'valentina@gmail.com');

-- Estructura de la tabla devoluciones
CREATE TABLE `devoluciones` (
  `id_devolucion` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_devo` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_devo` varchar(30) NOT NULL,
  `doc_cliente_devo` varchar(10) NOT NULL,
  `id_venta` varchar(10) NOT NULL,
  `ref_producto` varchar(4) NOT NULL,
  `unidades_pro` varchar(2) NOT NULL,
  `factura_devo` varchar(10) NOT NULL,
  `valor_devo` varchar(10) NOT NULL,
  `tipo_devo` varchar(15) NOT NULL,
  `descripcion_devo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_devolucion`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla devoluciones
INSERT INTO devoluciones VALUES ('38', '2024-10-06 00:00:00', 'juan', '1036611055', '149', 'QC17', '1', '6', '37490', 'Garantia', 'Garantia');
INSERT INTO devoluciones VALUES ('39', '2024-10-06 00:00:00', 'juan', '1036611055', '148', 'CN03', '1', '6', '31250', 'Garantia', 'sad');
INSERT INTO devoluciones VALUES ('40', '2024-10-06 00:00:00', 'admin', '1036611055', '142', 'QC17', '2', '2', '74980', 'Garantía', 'otro');
INSERT INTO devoluciones VALUES ('41', '2024-10-06 00:00:00', 'admin', '1036611055', '141', 'JU10', '1', '2', '99990', 'Garantía', 's');
INSERT INTO devoluciones VALUES ('42', '2024-10-12 00:00:00', 'admin', '1036611055', '151', 'QC17', '2', '8', '74980', 'Garantía', 'malo de fabrica');
INSERT INTO devoluciones VALUES ('43', '2024-10-12 00:00:00', 'admin', '1036611055', '152', 'JU10', '2', '8', '199980', 'Garantía', 'dasfsdf');
INSERT INTO devoluciones VALUES ('44', '2024-10-13 00:00:00', 'admin', '901634567', '150', 'CN03', '4', '7', '125000', 'Garantía', 'gggg\r\n');
INSERT INTO devoluciones VALUES ('45', '2024-10-13 00:00:00', 'admin', '1036611055', '147', 'CN03', '1', '5', '31250', 'Garantía', 'gg');
INSERT INTO devoluciones VALUES ('46', '2024-10-13 00:00:00', 'Pepito', '1036611055', '146', 'JU10', '1', '5', '99990', 'Garantía', 'yyy');
INSERT INTO devoluciones VALUES ('47', '2025-02-26 00:00:00', 'admin', '1036611055', '56', 'p1', '0', '1', '0', 'Garantía', 'Prueba');
INSERT INTO devoluciones VALUES ('48', '2025-02-27 00:00:00', 'Usuario1', '1036611055', '160', 'CN03', '10', '9', '312500', 'Garantía', 'pruba devolucion');
INSERT INTO devoluciones VALUES ('49', '2025-02-28 00:00:00', 'admin', '1036611055', '161', 'CN03', '5', '10', '156250', 'Garantía', 'prueba');

-- Estructura de la tabla facturas
CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `no_factura` int(150) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Cerrada',
  `fecha_factura` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_anulacion` datetime DEFAULT NULL,
  `descripcion_anulacion` varchar(200) DEFAULT NULL,
  `doc_cliente` varchar(10) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `asesor` varchar(14) NOT NULL,
  `caja` varchar(2) NOT NULL,
  `forma_de_pago` varchar(15) NOT NULL,
  `total_venta_con_iva` varchar(10) NOT NULL,
  `doc_factura` varchar(200) NOT NULL DEFAULT 'C:\\Users\\GalleOso\\Documents\\Facturas',
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla facturas
INSERT INTO facturas VALUES ('2', '1', 'Anulada', '2024-03-25 18:33:23', '2025-02-27 17:50:00', 'Prueba', '1036611055', 'JUAN GALLEGO', 'admin', '1', 'tarjeta', '0', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('46', '2', 'Cerrada', '2024-09-29 12:33:05', '', '', '1036611055', 'JUAN GALLEGO', 'admin', '1', 'tarjeta', '549940', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('47', '3', 'Cerrada', '2024-10-02 19:43:56', '', '', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '399960', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('48', '4', 'Cerrada', '2024-10-03 18:41:49', '', '', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '125000', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('49', '5', 'Cerrada', '2024-10-05 21:01:14', '', '', '1036611055', 'Juan Gallego', 'Pepito', '1', 'tarjeta', '131240', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('50', '6', 'Anulada', '2024-10-06 12:02:39', '', '', '1036611055', 'Juan Gallego', 'juan', '1', 'tarjeta', '68740', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('51', '7', 'Cerrada', '2024-10-12 16:14:00', '', '', '901634567 ', 'Luisa Ramírez', 'admin', '1', 'tarjeta', '125000', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('52', '8', 'Cerrada', '2024-10-12 17:51:30', '', '', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '274960', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('53', '9', 'Cerrada', '2025-02-28 09:40:43', '', '', '1036611055', 'Juan Gallego', 'Usuario1', '1', 'tarjeta', '312500', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('54', '10', 'Cerrada', '2025-02-28 09:54:58', '', '', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '156250', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('55', '11', 'Cerrada', '2025-02-28 10:04:00', '', '', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '125000', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('56', '12', 'Cerrada', '2025-03-04 20:08:25', '', '', '345678901 ', 'Javier Hernández', 'admin', '1', 'tarjeta', '31250', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('57', '13', 'Cerrada', '2025-03-05 19:29:50', '', '', '1036611051', 'Juan Ortiz', 'admin', '2', 'Tarjeta', '148980', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('58', '14', 'Cerrada', '2025-03-06 18:13:32', '', '', '1036611051', 'Juan Ortiz', 'admin', '1', 'Efectivo', '61480', 'C:\\Users\\GalleOso\\Documents\\Facturas');

-- Estructura de la tabla productos
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `ref_producto` varchar(15) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `cat_producto` varchar(20) NOT NULL DEFAULT 'TECNOLOGIA',
  `valor_producto` varchar(10) NOT NULL,
  `unidades_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla productos
INSERT INTO productos VALUES ('28', 'SE19', 'Antena amplificadora', 'TECNOLOGIA', '49990', '20');
INSERT INTO productos VALUES ('29', 'TF20', 'Estuche para auriculares Profesionales', 'TECNOLOGIA', '14990', '75');
INSERT INTO productos VALUES ('30', 'UG21', 'Cable de carga USB', 'TECNOLOGIA', '34990', '90');
INSERT INTO productos VALUES ('31', 'VH22', 'Teclado inalámbrico', 'TECNOLOGIA', '74900', '15');
INSERT INTO productos VALUES ('32', 'WI23', 'Adaptador Bluetooth', 'TECNOLOGIA', '24990', '50');
INSERT INTO productos VALUES ('33', 'XJ24', 'Disco SSD 500GB', 'TECNOLOGIA', '124990', '19');
INSERT INTO productos VALUES ('34', 'YK25', 'Mousepad Gaming', 'TECNOLOGIA', '32990', '40');
INSERT INTO productos VALUES ('35', 'ZL26', 'Hub USB 3.0', 'TECNOLOGIA', '39900', '25');
INSERT INTO productos VALUES ('36', 'AM27', 'Cable Ethernet 10m', 'TECNOLOGIA', '49990', '18');
INSERT INTO productos VALUES ('37', 'BN28', 'Cámara de seguridad', 'TECNOLOGIA', '199990', '12');
INSERT INTO productos VALUES ('38', 'CO29', 'Soporte para teléfono', 'TECNOLOGIA', '15990', '80');
INSERT INTO productos VALUES ('39', 'DP30', 'Adaptador de corriente', 'TECNOLOGIA', '23990', '18');
INSERT INTO productos VALUES ('40', 'LT05', 'Lector multi-tarjetas', 'TECNOLOGIA', '55000', '44');
INSERT INTO productos VALUES ('42', 'MG25', 'geteerte', 'TECNOLOGIA', '200000', '5');

-- Estructura de la tabla usuarios
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `rol_usuario` varchar(10) NOT NULL,
  `codigo_usuario` varchar(4) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasena_usuario` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla usuarios
INSERT INTO usuarios VALUES ('69', 'admin', '0001', 'admin', 'admin');
INSERT INTO usuarios VALUES ('70', 'asesor', '1965', 'Usuario', '1234');
INSERT INTO usuarios VALUES ('71', 'asesor', '0001', 'carlosp', '5678');
INSERT INTO usuarios VALUES ('72', 'asesor', '0002', 'cristianli', '$2y$10$oUm');
INSERT INTO usuarios VALUES ('95', 'asesor', '2340', 'andersonms', 'a123');
INSERT INTO usuarios VALUES ('96', 'admin', '0003', 'admina', 'j1234');

-- Estructura de la tabla ventas
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` varchar(10) NOT NULL DEFAULT 'Realizada',
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla ventas
INSERT INTO ventas VALUES ('56', '1', '2024-03-25 18:28:29', 'JUAN GALLEGO', '1036611055', '0', 'admin', '1', 'tarjeta', '0', 'p1', 'PANTALLA LG 42\"', '450000', 'Devolucion');
INSERT INTO ventas VALUES ('141', '2', '2024-09-29 12:33:05', 'JUAN GALLEGO', '1036611055', '99990', 'admin', '1', 'tarjeta', '1', 'JU10', 'Webcam HD', '99990', 'Devolucion');
INSERT INTO ventas VALUES ('142', '2', '2024-09-29 14:08:25', 'JUAN GALLEGO', '1036611055', '74980', 'admin', '1', 'tarjeta', '2', 'QC17', 'Adaptador USB-C', '37490', 'Devolucion');
INSERT INTO ventas VALUES ('143', '2', '2024-09-29 14:15:09', 'JUAN GALLEGO', '1036611055', '374970', 'admin', '1', 'tarjeta', '3', 'DO04', 'Teclado mecánico', '124990', 'Realizada');
INSERT INTO ventas VALUES ('144', '3', '2024-10-02 19:43:56', 'Juan Gallego', '1036611055', '399960', 'admin', '1', 'tarjeta', '4', 'JU10', 'Webcam HD', '99990', 'Realizada');
INSERT INTO ventas VALUES ('145', '4', '2024-10-03 18:41:49', 'Juan Gallego', '1036611055', '125000', 'admin', '1', 'tarjeta', '4', 'CN03', 'Ratón inalámbrico', '31250', 'Realizada');
INSERT INTO ventas VALUES ('146', '5', '2024-10-05 21:01:14', 'Juan Gallego', '1036611055', '99990', 'Pepito', '1', 'tarjeta', '1', 'JU10', 'Webcam HD', '99990', 'Devolucion');
INSERT INTO ventas VALUES ('147', '5', '2024-10-06 10:34:32', 'Juan Gallego', '1036611055', '31250', 'admin', '1', 'tarjeta', '1', 'CN03', 'Ratón inalámbrico', '31250', 'Devolucion');
INSERT INTO ventas VALUES ('148', '6', '2024-10-06 12:02:39', 'Juan Gallego', '1036611055', '31250', 'juan', '1', 'tarjeta', '1', 'CN03', 'Ratón inalámbrico', '31250', 'Devolucion');
INSERT INTO ventas VALUES ('149', '6', '2024-10-06 12:03:37', 'Juan Gallego', '1036611055', '37490', 'juan', '1', 'tarjeta', '1', 'QC17', 'Adaptador USB-C', '37490', 'Devolucion');
INSERT INTO ventas VALUES ('150', '7', '2024-10-12 16:14:00', 'Luisa Ramírez', '901634567', '125000', 'admin', '1', 'tarjeta', '4', 'CN03', 'Ratón inalámbrico', '31250', 'Devolucion');
INSERT INTO ventas VALUES ('151', '8', '2024-10-12 17:51:30', 'Juan Gallego', '1036611055', '74980', 'admin', '1', 'tarjeta', '2', 'QC17', 'Adaptador USB-C', '37490', 'Devolucion');
INSERT INTO ventas VALUES ('152', '8', '2024-10-12 17:52:13', 'Juan Gallego', '1036611055', '199980', 'admin', '1', 'tarjeta', '2', 'JU10', 'Webcam HD', '99990', 'Devolucion');
INSERT INTO ventas VALUES ('160', '9', '2025-02-28 09:40:43', 'Juan Gallego', '1036611055', '312500', 'Usuario1', '1', 'tarjeta', '10', 'CN03', 'Ratón inalámbrico', '31250', 'Devolucion');
INSERT INTO ventas VALUES ('161', '10', '2025-02-28 09:54:58', 'Juan Gallego', '1036611055', '156250', 'admin', '1', 'tarjeta', '5', 'CN03', 'Ratón inalámbrico', '31250', 'Devolucion');
INSERT INTO ventas VALUES ('162', '11', '2025-02-28 10:04:00', 'Juan Gallego', '1036611055', '125000', 'admin', '1', 'tarjeta', '4', 'CN03', 'Ratón inalámbrico', '31250', 'Realizada');
INSERT INTO ventas VALUES ('163', '12', '2025-03-04 20:08:25', 'Javier Hernández', '345678901', '31250', 'admin', '1', 'tarjeta', '1', 'CN03', 'Ratón inalámbrico', '31250', 'Realizada');
INSERT INTO ventas VALUES ('168', '13', '2025-03-05 19:29:50', 'Juan Ortiz', '1036611051', '124990', 'admin', '2', 'Tarjeta', '1', 'DO04', 'Teclado mecánico', '124990', 'Realizada');
INSERT INTO ventas VALUES ('169', '13', '2025-03-05 19:35:20', 'Juan Ortiz', '1036611051', '23990', 'admin', '2', 'Tarjeta', '1', 'DP30', 'Adaptador de corriente', '23990', 'Realizada');
INSERT INTO ventas VALUES ('170', '14', '2025-03-06 18:13:32', 'Juan Ortiz', '1036611051', '23990', 'admin', '1', 'Efectivo', '1', 'DP30', 'Adaptador de corriente', '23990', 'Realizada');
INSERT INTO ventas VALUES ('171', '14', '2025-03-06 18:53:27', 'Juan Ortiz', '1036611051', '37490', 'admin', '1', 'Efectivo', '1', 'QC17', 'Adaptador USB-C', '37490', 'Realizada');

