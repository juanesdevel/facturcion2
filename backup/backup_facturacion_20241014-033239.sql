-- Backup de la base de datos: facturacion
-- Fecha de creación: 2024-10-14 03:32:39

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO auditoria_productos VALUES ('32', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '24', 'ACTUALIZACION', '2024-10-13 19:57:22', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('33', '13', 'DO04', 'Teclado mecánico', 'TECNOLOGIA', '124990.00', '10', 'ACTUALIZACION', '2024-10-13 20:14:44', 'Producto con referencia DO04 actualizado.');
INSERT INTO auditoria_productos VALUES ('34', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '22', 'ACTUALIZACION', '2024-10-13 20:24:32', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('35', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '24', 'ACTUALIZACION', '2024-10-13 20:26:24', 'Producto con referencia QC17 actualizado.');
INSERT INTO auditoria_productos VALUES ('36', '13', 'DO04', 'Teclado mecánico', 'TECNOLOGIA', '124990.00', '11', 'ACTUALIZACION', '2024-10-13 20:26:54', 'Producto con referencia DO04 actualizado.');
INSERT INTO auditoria_productos VALUES ('37', '26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490.00', '34', 'ACTUALIZACION', '2024-10-13 20:29:50', 'Producto con referencia QC17 actualizado.');

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla clientes
INSERT INTO clientes VALUES ('10', 'Enrique Jimenez', '125446768', '3152654215', '3152654215', 'carrera 65 No32-564', 'jim@gmail.com');
INSERT INTO clientes VALUES ('11', 'Juan Gallego', '1036611055', '3008144844', '3008144841', 'San Antonio de Prado - Palo Blanco', 'juanq@gmail.com');
INSERT INTO clientes VALUES ('14', 'Juan Pérez', '123456749', '3101234567', '3209876543', 'Calle 123 #456', 'juanperez@example.com');
INSERT INTO clientes VALUES ('15', 'María Gómez', '987654321', '3009876543', '3158765432', 'Carrera 456 #789', 'mariagomez@example.com');
INSERT INTO clientes VALUES ('16', 'Carlos Martínez', '567890123', '3187654321', '3046543210', 'Avenida 789 #012', 'carlosmartinez@example.com');
INSERT INTO clientes VALUES ('17', 'Ana Rodríguez', '234567890', '3055432109', '3001234567', 'Transversal 321 #654', 'anarodriguez@example.com');
INSERT INTO clientes VALUES ('18', 'Pedro López', '89023456', '3006543210', '3102109876', 'Diagonal 210 #543', 'pedrolopez@example.com');
INSERT INTO clientes VALUES ('19', 'Laura Sánchez', '56789012', '3202109876', '3153456789', 'Callejón 987 #210', 'laurasanchez@example.com');
INSERT INTO clientes VALUES ('20', 'Javier Hernández', '345678901', '3154567890', '3046789012', 'Carrera 543 #876', 'javierhernandez@example.com');
INSERT INTO clientes VALUES ('21', 'Sofía Torres', '678904234', '3106789012', '3187890123', 'Avenida 678 #123', 'sofiatorres@example.com');
INSERT INTO clientes VALUES ('22', 'Luisa Ramírez', '901634567', '3047890123', '3208901234', 'Transversal 456 #789', 'luisaramirez@example.com');
INSERT INTO clientes VALUES ('23', 'Daniel González', '234567890', '3004567890', '3105432109', 'Diagonal 543 #012', 'danielgonzalez@example.com');
INSERT INTO clientes VALUES ('24', 'Elena Vargas', '123098765', '3156789012', '3101230987', 'Calle 987 #654', 'elenavargaz@example.com');
INSERT INTO clientes VALUES ('25', 'Miguel Soto', '987012341', '3042109876', '3183456789', 'Carrera 210 #987', 'miguelsoto@example.com');
INSERT INTO clientes VALUES ('26', 'Patricia Ríos', '567890123', '3186543210', '3009870123', 'Avenida 789 #012', 'patriciarios@example.com');
INSERT INTO clientes VALUES ('27', 'Ricardo Cárdenas', '234567890', '3105432109', '3046789012', 'Transversal 321 #654', 'ricardocardenas@example.com');
INSERT INTO clientes VALUES ('28', 'Silvia Torres', '890123456', '3006789012', '3157890123', 'Diagonal 210 #543', 'silviatorres@example.com');
INSERT INTO clientes VALUES ('29', 'Gustavo Sánchez', '456789012', '3157890123', '3208901234', 'Callejón 987 #210', 'gustavosanchez@example.com');
INSERT INTO clientes VALUES ('30', 'Laura Gutiérrez', '345678901', '3181234567', '3008901234', 'Carrera 543 #876', 'lauragutierrez@example.com');
INSERT INTO clientes VALUES ('31', 'Roberto Navarro', '678901334', '3107890123', '3156789012', 'Avenida 678 #123', 'robertonavarro@example.com');
INSERT INTO clientes VALUES ('32', 'Alejandra Medina', '921234567', '3206543210', '3183456789', 'Transversal 456 #789', 'alejandramedina@example.com');
INSERT INTO clientes VALUES ('33', 'Diego Castro', '234567890', '3158901234', '3105678901', 'Diagonal 543 #012', 'diegocastro@example.com');
INSERT INTO clientes VALUES ('34', 'Natalia Gómez', '098765432', '3109876543', '3206543210', 'Calle 123 #456', 'nataliagomez@example.com');
INSERT INTO clientes VALUES ('35', 'Rosa Martínez', '876543210', '3043210987', '3185432109', 'Carrera 456 #789', 'rosamartinez@example.com');
INSERT INTO clientes VALUES ('36', 'Andrés Pérez', '543210987', '3156789012', '3100987654', 'Avenida 789 #012', 'andresperez@example.com');
INSERT INTO clientes VALUES ('37', 'Carolina López', '210987654', '3185678901', '3201230987', 'Transversal 321 #654', 'carolinalopez@example.com');
INSERT INTO clientes VALUES ('38', 'Gabriel Ramírez', '654321098', '3108901234', '3156789012', 'Diagonal 210 #543', 'gabrielramirez@example.com');
INSERT INTO clientes VALUES ('39', 'Valeria González', '109876543', '3205432109', '3040987654', 'Callejón 987 #210', 'valeriagonzalez@example.com');
INSERT INTO clientes VALUES ('40', 'Santiago Castro', '432109876', '3180987654', '3106789012', 'Carrera 543 #876', 'santiagocastro@example.com');
INSERT INTO clientes VALUES ('41', 'Marcela Díaz', '321098765', '3105678901', '3150987654', 'Avenida 678 #123', 'marceladiaz@example.com');
INSERT INTO clientes VALUES ('42', 'Felipe Gómez', '765432109', '3150987654', '3205678901', 'Transversal 456 #789', 'felipegomez@example.com');
INSERT INTO clientes VALUES ('43', 'Isabella Sánchez', '098765432', '3046789012', '3186543210', 'Diagonal 543 #012', 'isabellasanchez@example.com');
INSERT INTO clientes VALUES ('44', 'Jairo Ramirez', '1128978876', '3207655498', '', 'Barranquilla', 'Jairo2022@gmail.com');
INSERT INTO clientes VALUES ('45', 'Hernesto Sanchez', '1234565678', '3127645362', '', 'San juan Con la 65', 'hernesto@gmail.com');
INSERT INTO clientes VALUES ('47', 'Enrrique', 'Jimenez', '3019837653', '32453245', 'Calle 76 carrera 82', 'cliente@gmail.com');
INSERT INTO clientes VALUES ('50', 'prueba2', 'prueba2', 'prueba2', 'prueba2', 'prueba2', 'prueba@prueba2');
INSERT INTO clientes VALUES ('51', 'prueba3', 'prueba3', 'prueba3', 'prueba3', 'prueba3', 'prueba3@prueba3');
INSERT INTO clientes VALUES ('54', '23432', 'fggd', 'dfgd', 'dfgd', 'dfgdf', 'dgfd@dds');
INSERT INTO clientes VALUES ('55', 'Juan', '1234567890', '1242342233', '1234234234', '2vrvsafgsd ', 'dfg@fgdf.com');
INSERT INTO clientes VALUES ('56', 'franqui', '1231341234', '2342342344', '4235451254', 'sdgdfg 3445', 'asg@asd.com');

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
INSERT INTO devoluciones VALUES ('47', '2024-10-14 00:00:00', 'admin', '901634567', '155', 'QC17', '2', '9', '74980', 'Garantía', 'Prueba');
INSERT INTO devoluciones VALUES ('48', '2024-10-14 00:00:00', 'admin', '901634567', '154', 'DO04', '1', '9', '124990', 'Garantía', 'Prueba');
INSERT INTO devoluciones VALUES ('49', '2024-10-14 00:00:00', 'admin', '901634567', '153', 'QC17', '10', '9', '374900', 'Garantía', 'Prueba');

-- Estructura de la tabla facturas
CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `no_factura` int(150) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Cerrada',
  `fecha_factura` datetime NOT NULL DEFAULT current_timestamp(),
  `doc_cliente` varchar(10) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `asesor` varchar(14) NOT NULL,
  `caja` varchar(2) NOT NULL,
  `forma_de_pago` varchar(15) NOT NULL,
  `total_venta_con_iva` varchar(10) NOT NULL,
  `doc_factura` varchar(200) NOT NULL DEFAULT 'C:\\Users\\GalleOso\\Documents\\Facturas',
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla facturas
INSERT INTO facturas VALUES ('2', '1', 'Cerrada', '2024-03-25 18:33:23', '1036611055', 'JUAN GALLEGO', 'admin', '1', 'tarjeta', '0', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('46', '2', 'Cerrada', '2024-09-29 12:33:05', '1036611055', 'JUAN GALLEGO', 'admin', '1', 'tarjeta', '549940', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('47', '3', 'Cerrada', '2024-10-02 19:43:56', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '399960', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('48', '4', 'Cerrada', '2024-10-03 18:41:49', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '125000', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('49', '5', 'Cerrada', '2024-10-05 21:01:14', '1036611055', 'Juan Gallego', 'Pepito', '1', 'tarjeta', '131240', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('50', '6', 'Anulada', '2024-10-06 12:02:39', '1036611055', 'Juan Gallego', 'juan', '1', 'tarjeta', '68740', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('51', '7', 'Cerrada', '2024-10-12 16:14:00', '901634567 ', 'Luisa Ramírez', 'admin', '1', 'tarjeta', '125000', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('52', '8', 'Cerrada', '2024-10-12 17:51:30', '1036611055', 'Juan Gallego', 'admin', '1', 'tarjeta', '274960', 'C:\\Users\\GalleOso\\Documents\\Facturas');

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
INSERT INTO productos VALUES ('1', 'PH51', 'pantalla LG 55', 'TECNOLOGIA', '450000', '66');
INSERT INTO productos VALUES ('3', 'ME24', 'usb kingtone 64GB', 'TECNOLOGIA', '55000', '65');
INSERT INTO productos VALUES ('9', 'AT10', 'audifonos inalambricos', 'TECNOLOGIA', '150000', '44');
INSERT INTO productos VALUES ('10', 'AK01', 'usb kingtone 32GB', 'TECNOLOGIA', '39900', '50');
INSERT INTO productos VALUES ('11', 'BM02', 'Auriculares Bluetooth', 'TECNOLOGIA', '74900', '20');
INSERT INTO productos VALUES ('12', 'CN03', 'Ratón inalámbrico', 'TECNOLOGIA', '31250', '60');
INSERT INTO productos VALUES ('13', 'DO04', 'Teclado mecánico', 'TECNOLOGIA', '124990', '11');
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
INSERT INTO productos VALUES ('26', 'QC17', 'Adaptador USB-C', 'TECNOLOGIA', '37490', '34');
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
INSERT INTO productos VALUES ('39', 'DP30', 'Adaptador de corriente', 'TECNOLOGIA', '23990', '25');
INSERT INTO productos VALUES ('40', 'LT05', 'Lector multi-tarjetas', 'TECNOLOGIA', '55000', '44');

-- Estructura de la tabla usuarios
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `rol_usuario` varchar(10) NOT NULL,
  `codigo_usuario` int(4) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasena_usuario` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla usuarios
INSERT INTO usuarios VALUES ('69', 'bloqueado', '3323', 'juan', '2024');
INSERT INTO usuarios VALUES ('70', 'asesor', '1', 'Usuario1', '1234');
INSERT INTO usuarios VALUES ('71', 'asesor', '2', 'Usuario2', '5678');
INSERT INTO usuarios VALUES ('72', 'asesor', '3', 'Usuario3', '9876');
INSERT INTO usuarios VALUES ('73', 'asesor', '4', 'Usuario4', '4321');
INSERT INTO usuarios VALUES ('74', 'asesor', '5', 'Usuario5', '8765');
INSERT INTO usuarios VALUES ('75', 'asesor', '6', 'Usuario6', '3210');
INSERT INTO usuarios VALUES ('76', 'asesor', '7', 'Usuario7', '6543');
INSERT INTO usuarios VALUES ('77', 'asesor', '8', 'Usuario8', '7890');
INSERT INTO usuarios VALUES ('78', 'asesor', '9', 'Usuario9', '2109');
INSERT INTO usuarios VALUES ('79', 'asesor', '10', 'Usuario10', '5432');
INSERT INTO usuarios VALUES ('80', 'asesor', '76', 'Camilo', '1111');
INSERT INTO usuarios VALUES ('81', 'asesor', '25', 'Cristian Gonzalez', '1122');
INSERT INTO usuarios VALUES ('82', 'admin', '45', 'admin', 'admin');
INSERT INTO usuarios VALUES ('83', 'asesor', '66', 'picachu', '1234');
INSERT INTO usuarios VALUES ('84', 'asesor', '87', 'piter', '4321');
INSERT INTO usuarios VALUES ('85', 'admin', '99', 'admin', 'admin');
INSERT INTO usuarios VALUES ('86', 'bloqueado', '55', 'Pepito', '1234');
INSERT INTO usuarios VALUES ('88', 'admin', '44', 'piter', '1234');
INSERT INTO usuarios VALUES ('89', 'bloqueado', '56', '23423434', '4321');
INSERT INTO usuarios VALUES ('90', 'asesor', '1123', 'Juanpa', '1243234234');
INSERT INTO usuarios VALUES ('91', 'bloqueado', '0', 'Patricia', 'patri123');
INSERT INTO usuarios VALUES ('92', 'bloqueado', '0', '45', 'eve1234');
INSERT INTO usuarios VALUES ('93', 'asesor', '2000', 'Juan', '1234');
INSERT INTO usuarios VALUES ('94', 'bloqueado', '11222', 'gallego', 'w22222');
INSERT INTO usuarios VALUES ('95', 'bloqueado', '2340', 'sdf', '$2y$10$S9U');

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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Datos de la tabla ventas
INSERT INTO ventas VALUES ('56', '1', '2024-03-25 18:28:29', 'JUAN GALLEGO', '1036611055', '0', 'admin', '1', 'tarjeta', '0', 'p1', 'PANTALLA LG 42\"', '450000', 'Realizada');
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
INSERT INTO ventas VALUES ('153', '9', '2024-10-13 19:57:22', 'Luisa Ramírez', '901634567', '374900', 'admin', '1', 'tarjeta', '10', 'QC17', 'Adaptador USB-C', '37490', 'Devolucion');
INSERT INTO ventas VALUES ('154', '9', '2024-10-13 20:14:44', 'Luisa Ramírez', '901634567', '124990', 'admin', '1', 'tarjeta', '1', 'DO04', 'Teclado mecánico', '124990', 'Devolucion');
INSERT INTO ventas VALUES ('155', '9', '2024-10-13 20:24:32', 'Luisa Ramírez', '901634567', '74980', 'admin', '1', 'tarjeta', '2', 'QC17', 'Adaptador USB-C', '37490', 'Devolucion');

