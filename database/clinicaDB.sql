-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.31 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para clinica_db
CREATE DATABASE IF NOT EXISTS `clinica_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinica_db`;

-- Volcando estructura para tabla clinica_db.antecedentes
CREATE TABLE IF NOT EXISTS `antecedentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `cancer` int(11) NOT NULL DEFAULT '0',
  `hipertension` int(11) NOT NULL DEFAULT '0',
  `diabetes` int(11) NOT NULL DEFAULT '0',
  `rosacea` int(11) NOT NULL DEFAULT '0',
  `acne` int(11) NOT NULL DEFAULT '0',
  `cardiovasculares` int(11) NOT NULL DEFAULT '0',
  `otroHered` varchar(50) DEFAULT '0',
  `padecimiento` varchar(50) DEFAULT '0',
  `txmedico` varchar(50) DEFAULT '0',
  `fuma` int(11) NOT NULL DEFAULT '0',
  `hrsueno` int(11) NOT NULL DEFAULT '0',
  `protesis` int(11) NOT NULL DEFAULT '0',
  `alcohol` int(11) NOT NULL DEFAULT '0',
  `alergias` int(11) NOT NULL DEFAULT '0',
  `aparatos` int(11) NOT NULL DEFAULT '0',
  `agua` int(11) NOT NULL DEFAULT '0',
  `drogas` int(11) NOT NULL DEFAULT '0',
  `cirugias` int(11) NOT NULL DEFAULT '0',
  `ejercicio` int(11) NOT NULL DEFAULT '0',
  `alimentacion` int(11) NOT NULL DEFAULT '0',
  `otroPersonales` varchar(50) DEFAULT '0',
  `txestetico` varchar(50) DEFAULT '0',
  `cosmeticos` varchar(50) DEFAULT '0',
  `nota` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tabla` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `movimiento` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_capturista` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.bitacora_inv_citas
CREATE TABLE IF NOT EXISTS `bitacora_inv_citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.bitacora_productos
CREATE TABLE IF NOT EXISTS `bitacora_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL DEFAULT '0',
  `cantidad_add` int(11) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `movimiento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.citas
CREATE TABLE IF NOT EXISTS `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL DEFAULT '0',
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `id_tipo_consulta` int(11) NOT NULL DEFAULT '0',
  `fecha_cita` date NOT NULL,
  `hora_cita` int(11) NOT NULL DEFAULT '0',
  `comentarios` varchar(50) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `concluida` int(11) NOT NULL DEFAULT '0',
  `mail_send` int(11) NOT NULL DEFAULT '0',
  `archivo` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.citas_concluidas
CREATE TABLE IF NOT EXISTS `citas_concluidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `capturista` varchar(50) DEFAULT NULL,
  `resumen` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pension` int(11) NOT NULL,
  `nomcom` varchar(50) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `fechanac` date NOT NULL,
  `edoCivil` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `fechaApertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.doctores
CREATE TABLE IF NOT EXISTS `doctores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `especialidad` varchar(50) NOT NULL DEFAULT '0',
  `activo` int(11) NOT NULL DEFAULT '0',
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `cedula` varchar(50) NOT NULL DEFAULT '0',
  `turno` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.exploracion
CREATE TABLE IF NOT EXISTS `exploracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `color` varchar(50) NOT NULL DEFAULT '0',
  `espesor` varchar(50) NOT NULL DEFAULT '0',
  `poro` varchar(50) NOT NULL DEFAULT '0',
  `secrecion` varchar(50) NOT NULL DEFAULT '0',
  `fragilidad` varchar(50) NOT NULL DEFAULT '0',
  `lesiones` varchar(50) NOT NULL DEFAULT '0',
  `menciones` varchar(50) NOT NULL DEFAULT '0',
  `nivelhidratacion` varchar(50) NOT NULL DEFAULT '0',
  `diagfac` varchar(50) NOT NULL DEFAULT '0',
  `expcorp` varchar(50) NOT NULL DEFAULT '0',
  `grasa` varchar(50) NOT NULL DEFAULT '0',
  `flacidez` varchar(50) NOT NULL DEFAULT '0',
  `celulitis` varchar(50) NOT NULL DEFAULT '0',
  `estrias` varchar(50) NOT NULL DEFAULT '0',
  `varices` varchar(50) NOT NULL DEFAULT '0',
  `peso` int(11) NOT NULL DEFAULT '0',
  `imc` int(11) NOT NULL DEFAULT '0',
  `obsexpcorp` varchar(50) NOT NULL DEFAULT '0',
  `diagcorp` varchar(50) NOT NULL DEFAULT '0',
  `txcabina` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.hora_consulta
CREATE TABLE IF NOT EXISTS `hora_consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.hora_consulta_doble
CREATE TABLE IF NOT EXISTS `hora_consulta_doble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.hora_consulta_ves
CREATE TABLE IF NOT EXISTS `hora_consulta_ves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.plantratamiento
CREATE TABLE IF NOT EXISTS `plantratamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `recomendaciones` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `unidad` int(11) DEFAULT '0',
  `umax` int(11) DEFAULT NULL,
  `stockmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.tipo_consulta
CREATE TABLE IF NOT EXISTS `tipo_consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `activo` int(11) NOT NULL DEFAULT '0',
  `duracion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla clinica_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCompleto` varchar(255) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `permisos` int(11) DEFAULT '0',
  `usuario` varchar(255) DEFAULT '0',
  `password` varchar(255) DEFAULT '0',
  `asignado` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
