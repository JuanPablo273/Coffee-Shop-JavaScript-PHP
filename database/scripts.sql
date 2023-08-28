CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `id_Menu` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `criticas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` smallint(1) DEFAULT NULL,
  `comida` smallint(1) DEFAULT NULL,
  `bebidas` smallint(1) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` int(6) DEFAULT NULL,
  `tipo` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tipo` smallint(1) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `maestro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
CREATE TABLE `factura` (
  `id` int(11) NOT NULL ,
  `id_maestro` int(11) NOT NULL ,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
drop TABLE factura;

ALTER TABLE carrito
ADD FOREIGN KEY (id_Menu) REFERENCES menu (id);
ALTER TABLE factura
ADD FOREIGN KEY (id_maestro) REFERENCES maestro (id);
ALTER TABLE factura
ADD FOREIGN KEY (id_Menu) REFERENCES menu (id);
ALTER TABLE maestro
ADD FOREIGN KEY (usuario) REFERENCES usuarios (email);


