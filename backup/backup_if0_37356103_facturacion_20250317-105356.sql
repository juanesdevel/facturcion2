-- Backup de la base de datos: if0_37356103_facturacion
-- Fecha de creación: 2025-03-17 10:53:56

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Datos de la tabla clientes
INSERT INTO clientes VALUES ('69', 'JUAN PABLO GOMEZ', '1145678901', '3023334455', '3023334455', 'Calle 60 Carrera 25 35', 'juanpablo@gmail.com');
INSERT INTO clientes VALUES ('70', 'LAURA SOFIA RODRIGUEZ', '1156789012', '3034445566', '3034445566', 'Calle 50 Calle  8-22', 'laura@gmail.com');
INSERT INTO clientes VALUES ('71', 'DIEGO ALEJANDRO PEREZ', '1167890123', '3045556677', '3045556677', 'Carrera 15 Calle 23-56', 'diego@gmail.com');
INSERT INTO clientes VALUES ('72', 'ANA CAMILA RAMIREZ', '1178901234', '3056667788', '3056667788', 'Diagonal 3 Calle 9-40', 'ana@gmail.com');
INSERT INTO clientes VALUES ('73', 'MIGUEL ANGEL TORRES', '1189012345', '3067778899', '3067778899', 'Calle 80 Calle 100-12', 'miguel258@gmail.com');
INSERT INTO clientes VALUES ('74', 'SANTIAGO JOSE HERNANDEZ', '1190123456', '3078889900', '3078889900', 'Transversal 45 Calle 67-89', 'santiago@gmail.com');
INSERT INTO clientes VALUES ('75', 'VALENTINA ISABEL CASTRO', '1201234567', '3089990011', '3089990011', 'Carrera 90 Calle 2-16', 'valentina@gmail.com');
INSERT INTO clientes VALUES ('76', 'ENRIQUE MOLINA', '1028956214', '3005685210', '3012547852', 'Calle 93 Carrera 63 25', 'enrique1028@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Datos de la tabla facturas
INSERT INTO facturas VALUES ('61', '17', 'Cerrada', '2025-03-17 06:00:12', '', '', '1156789012', 'LAURA SOFIA RODRIGUEZ', 'admin', '1', 'Tarjeta', '49990', 'C:\\Users\\GalleOso\\Documents\\Facturas');
INSERT INTO facturas VALUES ('62', '18', 'Cerrada', '2025-03-17 06:38:15', '', '', '1167890123', 'DIEGO ALEJANDRO PEREZ', 'admin', '1', 'Tarjeta', '99980', 'C:\\Users\\GalleOso\\Documents\\Facturas');

-- Estructura de la tabla productos
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `ref_producto` varchar(15) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `cat_producto` varchar(20) NOT NULL DEFAULT 'TECNOLOGIA',
  `valor_producto` varchar(10) NOT NULL,
  `unidades_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Datos de la tabla productos
INSERT INTO productos VALUES ('28', 'SE19', 'Antena amplificadora', 'TECNOLOGIA', '49990', '20');
INSERT INTO productos VALUES ('29', 'TF20', 'Estuche para auriculares Profesionales', 'TECNOLOGIA', '14990', '75');
INSERT INTO productos VALUES ('30', 'UG21', 'Cable de carga USB', 'TECNOLOGIA', '34990', '90');
INSERT INTO productos VALUES ('31', 'VH22', 'Teclado inalámbrico', 'TECNOLOGIA', '74900', '15');
INSERT INTO productos VALUES ('32', 'WI23', 'Adaptador Bluetooth', 'TECNOLOGIA', '24990', '50');
INSERT INTO productos VALUES ('33', 'XJ24', 'Disco SSD 500GB', 'TECNOLOGIA', '124990', '19');
INSERT INTO productos VALUES ('34', 'YK25', 'Mousepad Gaming', 'TECNOLOGIA', '32990', '40');
INSERT INTO productos VALUES ('35', 'ZL26', 'Hub USB 3.0', 'TECNOLOGIA', '39900', '25');
INSERT INTO productos VALUES ('36', 'AM27', 'Cable Ethernet 10m', 'TECNOLOGIA', '49990', '15');
INSERT INTO productos VALUES ('37', 'BN28', 'Cámara de seguridad', 'TECNOLOGIA', '199990', '12');
INSERT INTO productos VALUES ('38', 'CO29', 'Soporte para teléfono', 'TECNOLOGIA', '15990', '80');
INSERT INTO productos VALUES ('39', 'DP30', 'Adaptador de corriente', 'TECNOLOGIA', '23990', '18');
INSERT INTO productos VALUES ('40', 'LT05', 'Lector multi-tarjetas', 'TECNOLOGIA', '55000', '44');
INSERT INTO productos VALUES ('42', 'MG25', 'Adaptador de red', 'TECNOLOGIA', '200000', '50');

-- Estructura de la tabla usuarios
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `rol_usuario` varchar(10) NOT NULL,
  `codigo_usuario` varchar(4) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasena_usuario` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Datos de la tabla ventas
INSERT INTO ventas VALUES ('175', '17', '2025-03-17 06:00:12', 'LAURA SOFIA RODRIGUEZ', '1156789012', '49990', 'admin', '1', 'Tarjeta', '1', 'AM27', 'Cable Ethernet 10m', '49990', 'Realizada');
INSERT INTO ventas VALUES ('176', '18', '2025-03-17 06:38:15', 'DIEGO ALEJANDRO PEREZ', '1167890123', '99980', 'admin', '1', 'Tarjeta', '2', 'AM27', 'Cable Ethernet 10m', '49990', 'Realizada');

