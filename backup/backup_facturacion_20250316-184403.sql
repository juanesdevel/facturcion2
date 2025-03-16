-- Backup de la base de datos: facturacion
-- Fecha de creación: 2025-03-16 18:44:03

-- Estructura de la tabla auditoria_clientes
CREATE TABLE `auditoria_clientes` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `nom_cliente` varchar(100) DEFAULT NULL,
  `doc_cliente` varchar(50) DEFAULT NULL,
  `cel1_cliente` varchar(20) DEFAULT NULL,
  `cel2_cliente` varchar(20) DEFAULT NULL,
  `direccion_cliente` text DEFAULT NULL,
  `correo_cliente` varchar(100) DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de la tabla auditoria_clientes
INSERT INTO auditoria_clientes VALUES ('5', '48', '234', '', 'sdfsdf', 'fsd', '', '', 'INSERCION', '2024-10-04 18:14:37', 'Cliente con documento  insertado.');
INSERT INTO auditoria_clientes VALUES ('6', '49', '', '', '', '', '', '', 'INSERCION', '2024-10-04 19:04:56', 'Cliente con documento  insertado.');
INSERT INTO auditoria_clientes VALUES ('7', '11', 'Juan Gallego', '1036611055', '3008144844', '', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-06 11:47:56', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('8', '11', 'Juan Gallo', '1036611055', '3008144844', '', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-06 11:50:03', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('9', '11', 'Juan Gallo', '1036611055', '3008144844', '', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-06 11:50:24', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('10', '50', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba@prueba', 'INSERCION', '2024-10-06 12:00:24', 'Cliente con documento prueba insertado.');
INSERT INTO auditoria_clientes VALUES ('11', '50', 'prueba2', 'prueba2', 'prueba2', 'prueba2', 'prueba2', 'prueba@prueba2', 'ACTUALIZACION', '2024-10-06 12:01:52', 'Cliente con documento prueba actualizado.');
INSERT INTO auditoria_clientes VALUES ('12', '51', 'prueba3', 'prueba3', 'prueba3', 'prueba3', 'prueba3', 'prueba3@prueba3', 'INSERCION', '2024-10-06 12:02:21', 'Cliente con documento prueba3 insertado.');
INSERT INTO auditoria_clientes VALUES ('13', '52', '', '', '', '', '', '', 'INSERCION', '2024-10-06 16:54:57', 'Cliente con documento  insertado.');
INSERT INTO auditoria_clientes VALUES ('14', '48', '234', '', 'sdfsdf', 'fsd', '', '', 'ELIMINACION', '2024-10-06 16:57:07', 'Cliente con documento  eliminado.');
INSERT INTO auditoria_clientes VALUES ('15', '49', '', '', '', '', '', '', 'ELIMINACION', '2024-10-06 16:57:13', 'Cliente con documento  eliminado.');
INSERT INTO auditoria_clientes VALUES ('16', '52', '', '', '', '', '', '', 'ELIMINACION', '2024-10-06 16:57:23', 'Cliente con documento  eliminado.');
INSERT INTO auditoria_clientes VALUES ('17', '53', '', '', '', '', '', '', 'INSERCION', '2024-10-06 16:58:41', 'Cliente con documento  insertado.');
INSERT INTO auditoria_clientes VALUES ('18', '54', '23432', 'fggd', 'dfgd', 'dfgd', 'dfgdf', 'dgfd@dds', 'INSERCION', '2024-10-06 17:02:20', 'Cliente con documento fggd insertado.');
INSERT INTO auditoria_clientes VALUES ('19', '55', 'Juan', '1234567890', '1242342233', '1234234234', '2vrvsafgsd ', 'dfg@fgdf.com', 'INSERCION', '2024-10-06 17:11:45', 'Cliente con documento 1234567890 insertado.');
INSERT INTO auditoria_clientes VALUES ('20', '55', 'Juan', '1234567890', '1242342233', '1234234234', '2vrvsafgsd ', 'dfg@fgdf.com', 'ACTUALIZACION', '2024-10-06 17:23:54', 'Cliente con documento 1234567890 actualizado.');
INSERT INTO auditoria_clientes VALUES ('21', '56', 'franqui', '1231341234', '2342342344', '4235451254', 'sdgdfg 3445', 'asg@asd.com', 'INSERCION', '2024-10-12 10:55:51', 'Cliente con documento 1231341234 insertado.');
INSERT INTO auditoria_clientes VALUES ('22', '53', '', '', '', '', '', '', 'ELIMINACION', '2024-10-12 15:24:20', 'Cliente con documento  eliminado.');
INSERT INTO auditoria_clientes VALUES ('23', '11', 'Juan Gallo', '1036611055', '3008144844', '3008144844', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-12 16:10:23', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('24', '10', 'Enrique Jimenez', '125446768', '3152654215', '3152654215', 'carrera 65 No32-564', 'jim@gmail.com', 'ACTUALIZACION', '2024-10-12 16:11:55', 'Cliente con documento 125446768 actualizado.');
INSERT INTO auditoria_clientes VALUES ('25', '11', 'Juan Gallo', '1036611055', '3008144844', '3008144841', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-12 16:12:57', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('26', '11', 'Juan Gallego', '1036611055', '3008144844', '3008144841', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com', 'ACTUALIZACION', '2024-10-12 16:13:32', 'Cliente con documento 1036611055 actualizado.');
INSERT INTO auditoria_clientes VALUES ('27', '13', 'Patricia Osorio', '1128461346', '3008765654', '', 'Medellín', 'patricio123@gmail.com', 'ELIMINACION', '2024-10-12 16:20:44', 'Cliente con documento 1128461346 eliminado.');

-- Estructura de la tabla auditoria_productos
CREATE TABLE `auditoria_productos` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `ref_producto` varchar(50) DEFAULT NULL,
  `descripcion_producto` text DEFAULT NULL,
  `cat_producto` varchar(50) DEFAULT NULL,
  `valor_producto` decimal(10,2) DEFAULT NULL,
  `unidades_producto` int(11) DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de la tabla auditoria_productos
INSERT INTO auditoria_productos VALUES ('15', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '70', 'ACTUALIZACION', '2024-10-03 18:41:49', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('16', '19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990.00', '29', 'ACTUALIZACION', '2024-10-05 21:01:14', 'Producto con referencia JU10 actualizado.');
INSERT INTO auditoria_productos VALUES ('17', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '69', 'ACTUALIZACION', '2024-10-06 10:34:32', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('18', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '68', 'ACTUALIZACION', '2024-10-06 12:02:39', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('19', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '41', 'ACTUALIZACION', '2024-10-06 12:03:37', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('20', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '40', 'ACTUALIZACION', '2024-10-06 12:42:00', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('21', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '67', 'ACTUALIZACION', '2024-10-06 12:44:08', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('22', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '38', 'ACTUALIZACION', '2024-10-06 16:48:23', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('23', '19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990.00', '28', 'ACTUALIZACION', '2024-10-06 16:49:40', 'Producto con referencia JU10 actualizado.');
INSERT INTO auditoria_productos VALUES ('24', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '63', 'ACTUALIZACION', '2024-10-12 16:14:00', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('25', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '36', 'ACTUALIZACION', '2024-10-12 17:51:30', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('26', '19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990.00', '26', 'ACTUALIZACION', '2024-10-12 17:52:13', 'Producto con referencia JU10 actualizado.');
INSERT INTO auditoria_productos VALUES ('27', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '34', 'ACTUALIZACION', '2024-10-12 18:13:07', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('28', '19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990.00', '24', 'ACTUALIZACION', '2024-10-12 18:16:36', 'Producto con referencia JU10 actualizado.');
INSERT INTO auditoria_productos VALUES ('29', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '59', 'ACTUALIZACION', '2024-10-13 11:29:41', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('30', '12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250.00', '60', 'ACTUALIZACION', '2024-10-13 11:50:51', 'Producto con referencia CN03 actualizado.');
INSERT INTO auditoria_productos VALUES ('31', '19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990.00', '25', 'ACTUALIZACION', '2024-10-13 11:52:52', 'Producto con referencia JU10 actualizado.');

-- Estructura de la tabla auditoria_usuarios
CREATE TABLE `auditoria_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `codigo_usuario` varchar(50) DEFAULT NULL,
  `rol_usuario` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de la tabla auditoria_usuarios
INSERT INTO auditoria_usuarios VALUES ('27', '89', '56', 'admin', 'Albeiro', 'INSERTADO', '2024-10-03 17:40:46', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('28', '90', '1123', 'asesor', 'Juanpa', 'INSERTADO', '2024-10-03 18:20:29', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('29', '91', '1234', 'asesor', 'Patricia', 'INSERTADO', '2024-10-03 18:32:18', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('30', '92', '5320', 'bloqueado', 'Evelin Gallego', 'INSERTADO', '2024-10-04 17:47:13', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('31', '88', '0', 'admin', 'piter', 'ACTUALIZADO', '2024-10-06 15:35:29', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('32', '93', '2342', 'bloqueado', 'jUAN', 'INSERTADO', '2024-10-06 17:26:52', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('33', '93', '2342', 'bloqueado', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:40:21', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('34', '93', '2342', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:41:25', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('35', '93', '2342', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:42:38', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('36', '93', '2342', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:42:55', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('37', '93', '2342', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:43:06', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('38', '93', '2342', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:49:36', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('39', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:49:48', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('40', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:50:32', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('41', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:52:03', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('42', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:52:15', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('43', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:52:31', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('44', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 17:56:50', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('45', '93', '1667', '', 'jUAN', 'ACTUALIZADO', '2024-10-06 18:07:39', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('46', '92', '5320', 'bloqueado', 'Evelin Gallego', 'ACTUALIZADO', '2024-10-06 18:09:12', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('47', '91', '1234', 'asesor', 'Patricia', 'ACTUALIZADO', '2024-10-06 18:10:28', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('48', '91', '1234', '', 'Patricia', 'ACTUALIZADO', '2024-10-06 18:11:45', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('49', '91', '1234', '', 'Patricia', 'ACTUALIZADO', '2024-10-06 18:11:57', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('50', '91', '1234', '', 'Patricia', 'ACTUALIZADO', '2024-10-06 18:12:49', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('51', '92', '5320', '', 'Evelin Gallego', 'ACTUALIZADO', '2024-10-06 18:13:10', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('52', '93', '1667', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:14:46', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('53', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:14:59', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('54', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:17:06', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('55', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:21:12', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('56', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:21:23', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('57', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:22:43', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('58', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:28:26', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('59', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:29:17', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('60', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:32:41', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('61', '93', '2000', '', 'Juan', 'ACTUALIZADO', '2024-10-06 18:46:02', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('62', '92', '5320', '', 'Evelin Gallego', 'ACTUALIZADO', '2024-10-06 18:46:43', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('63', '86', '55', 'admin', 'Pepito', 'ACTUALIZADO', '2024-10-06 19:12:00', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('64', '89', '56', 'admin', 'Albeiro', 'ACTUALIZADO', '2024-10-06 19:13:21', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('65', '91', '1234', '', 'Patricia', 'ACTUALIZADO', '2024-10-06 19:14:28', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('66', '92', '5320', 'bloqueado', 'Evelin Gallego', 'ACTUALIZADO', '2024-10-06 19:18:08', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('67', '92', '0', 'bloqueado', 'Evelin Gallego', 'ACTUALIZADO', '2024-10-06 19:19:48', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('68', '92', '0', 'bloqueado', '45', 'ACTUALIZADO', '2024-10-06 19:20:53', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('69', '94', '11222', 'bloqueado', 'gallego', 'INSERTADO', '2024-10-12 11:01:00', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('70', '95', '2340', 'bloqueado', 'sdf', 'INSERTADO', '2024-10-12 11:05:56', 'Nuevo usuario agregado');
INSERT INTO auditoria_usuarios VALUES ('71', '69', '33', 'asesor', 'juan', 'ACTUALIZADO', '2024-10-12 11:06:55', 'Datos del usuario actualizados');
INSERT INTO auditoria_usuarios VALUES ('72', '69', '33', 'bloqueado', 'juan@', 'ACTUALIZADO', '2024-10-12 11:10:00', 'Datos del usuario actualizados');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla productos
INSERT INTO productos VALUES ('1', 'PH51', 'pantalla LG 55', 'TECNOLOGIA', '450000', '9');
INSERT INTO productos VALUES ('3', 'ME24', 'usb kingtone 64GB', 'TECNOLOGIA', '55000', '65');
INSERT INTO productos VALUES ('9', 'AT10', 'audifonos inalambricos', 'TECNOLOGIA', '150000', '44');
INSERT INTO productos VALUES ('10', 'AK01', 'usb kingtone 32GB', 'TECNOLOGIA', '39900', '50');
INSERT INTO productos VALUES ('11', 'BM02', 'Auriculares Bluetooth', 'TECNOLOGIA', '74900', '20');
INSERT INTO productos VALUES ('12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250', '55');
INSERT INTO productos VALUES ('13', 'DO04', 'Teclado mecánico', 'TECNOLOGIA', '124990', '10');
INSERT INTO productos VALUES ('14', 'EP05', 'Disco duro externo 1TB', 'TECNOLOGIA', '149990', '30');
INSERT INTO productos VALUES ('15', 'FQ06', 'Monitor LED 24', 'TECNOLOGIA', '374990', '50');
INSERT INTO productos VALUES ('16', 'GR07', 'Impresora láser', 'TECNOLOGIA', '499990', '15');
INSERT INTO productos VALUES ('17', 'HS08', 'Cargador inalámbrico', 'TECNOLOGIA', '62490', '29');
INSERT INTO productos VALUES ('18', 'IT09', 'Funda para portátil', 'TECNOLOGIA', '49990', '25');
INSERT INTO productos VALUES ('19', 'JU10', 'Webcam HD', 'TECNOLOGIA', '99990', '25');
INSERT INTO productos VALUES ('20', 'KV11', 'Memoria RAM 16GB', 'TECNOLOGIA', '199990', '18');
INSERT INTO productos VALUES ('21', 'LW12', 'Adaptador HDMI', 'TECNOLOGIA', '24990', '40');
INSERT INTO productos VALUES ('22', 'MX13', 'Altavoces portátiles', 'TECNOLOGIA', '69990', '22');
INSERT INTO productos VALUES ('23', 'NZ14', 'Router Wi-Fi', 'TECNOLOGIA', '99990', '13');
INSERT INTO productos VALUES ('24', 'OA15', 'Tableta gráfica', 'TECNOLOGIA', '179990', '11');
INSERT INTO productos VALUES ('25', 'PB16', 'Batería externa 10000mAh', 'TECNOLOGIA', '74900', '25');
INSERT INTO productos VALUES ('26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490', '31');
INSERT INTO productos VALUES ('27', 'RD18', 'Lector de tarjetas', 'TECNOLOGIA', '22490', '42');
INSERT INTO productos VALUES ('28', 'SE19', 'Antena amplificadora', 'TECNOLOGIA', '49990', '20');
INSERT INTO productos VALUES ('29', 'TF20', 'Estuche para auriculares', 'TECNOLOGIA', '14990', '75');
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

