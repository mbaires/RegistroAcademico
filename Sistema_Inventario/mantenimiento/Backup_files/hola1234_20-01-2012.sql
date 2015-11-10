-- MySQL dump 10.8
--
-- Host: localhost    Database: Inventario
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;

--
-- Current Database: `Inventario`
--

USE `Inventario`;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `codigo` int(10) NOT NULL,
  `Nombre` varchar(55) NOT NULL,
  `Direccion` varchar(55) NOT NULL,
  `Dui` varchar(25) NOT NULL,
  `Nit` varchar(17) NOT NULL,
  `Telefono` varchar(10) default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--


/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
LOCK TABLES `clientes` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id_compra` int(10) NOT NULL,
  `codigo_producto` int(10) default NULL,
  `Cantidad` int(10) NOT NULL,
  `Precio_compra` decimal(4,2) NOT NULL,
  `Fecha_compra` varchar(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `Descripcion` varchar(55) default NULL,
  PRIMARY KEY  (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compras`
--


/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
LOCK TABLES `compras` WRITE;
INSERT INTO `compras` VALUES (1,1,50,'0.25','18-01-2012',1,'Acetatos trasparentes'),(2,2,50,'0.15','18-01-2012',1,'Boligrafo bic negro'),(3,3,50,'0.25','17-01-2012',1,'Boligrafo azul Diamante'),(4,4,50,'0.35','19-01-2012',1,'borrador pequeÃ±o pelikan blanco'),(5,5,25,'0.70','19-01-2012',1,'Carpeta plastica negra.'),(6,6,50,'0.75','19-01-2012',1,'CD-R color gris'),(7,7,50,'1.00','19-01-2012',1,'CD-RW Sony '),(8,8,50,'1.25','19-01-2012',1,'DVD Sony'),(9,9,50,'0.45','19-01-2012',1,'Cinta adhesiva blanco'),(10,10,50,'12.00','19-01-2012',1,'corrector facela blanco'),(11,11,50,'0.15','19-01-2012',1,'cuadernilla grande '),(12,12,50,'1.00','18-01-2012',1,'cuaderno nÂ°3 espiral'),(13,13,25,'75.00','16-01-2012',2,'Estuche geometria bic'),(14,14,30,'1.15','16-01-2012',2,'Folder ITCA-FEPADE'),(15,15,25,'0.10','18-01-2012',2,'fichas  marca note'),(16,16,40,'0.85','13-01-2012',2,'Lapiz HB'),(17,17,45,'0.15','17-01-2012',2,'lapiz grafico'),(18,18,50,'1.00','16-01-2012',1,'libreta Rayado'),(19,19,25,'0.75','19-01-2012',2,'Marcadores Tucan'),(20,20,35,'0.20','10-01-2012',3,'Folder Oficio ');
UNLOCK TABLES;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `N_factura` int(10) NOT NULL default '0',
  `Nombre_cliente` varchar(55) default NULL,
  `Direccion` varchar(55) default NULL,
  `id_cliente` int(10) NOT NULL,
  `Fecha_venta` varchar(10) default NULL,
  `tipo_factura` varchar(25) default NULL,
  PRIMARY KEY  (`N_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--


/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
LOCK TABLES `facturas` WRITE;
INSERT INTO `facturas` VALUES (1,'Karla Molina','',0,'18-01-12','Contado');
UNLOCK TABLES;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `codigo_producto` int(10) NOT NULL default '0',
  `Nombre` varchar(55) default NULL,
  `Marca` varchar(10) default NULL,
  `Estilo` varchar(10) default NULL,
  `Color` varchar(20) default NULL,
  `Precio_venta` decimal(4,2) default NULL,
  `Existencias` int(10) default NULL,
  PRIMARY KEY  (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--


/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
LOCK TABLES `inventario` WRITE;
INSERT INTO `inventario` VALUES (1,'Acetatos','colin','normal','transparente','0.26',50),(2,'Boligrafo','bic','normal','negro','0.15',48),(3,'Boligrafo','Diamante','normal','Azul','0.26',50),(4,'borrador','pelikan','pequeÃ±o','blanco','2.00',50),(5,'Carpeta plastica','pajarito','grande','negra','0.73',25),(6,'CD-R','Sony','normal','gris','0.78',50),(7,'CD-RW','Sony','normal','gris','1.04',50),(8,'DVD','Sony','normal','gris','1.31',50),(9,'Cinta Adhesiva ','facela','grande','blanco','0.46',50),(10,'Corrector','facela','normal','blanco','12.48',50),(11,'Cuadernillas ','Book','grande','','0.15',50),(12,'Cuadeno nÂ° 3 Espiral','Norma','grande','','1.03',50),(13,'Estuche de Geometria','Bic','pequeÃ±o','','76.50',25),(14,'Folder ITCA-FEPADE','ITCA','grande','','1.18',30),(15,'Fichas','Note','normal','blanco','0.10',25),(16,'Lapiz HB','Facela','normal','','0.88',40),(17,'Lapiz Grafito','facela','normal','','0.15',45),(18,'Libreta','Norma','Rayado','','1.03',50),(19,'Marcadores','Tucan','normal','','0.78',25),(20,'Folder  Oficio','Tucan','grande','crema','0.21',35),(21,'cuadernos','facela','Rayado','','1.05',25);
UNLOCK TABLES;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `codigo` varchar(10) NOT NULL,
  `Nombre` varchar(55) NOT NULL,
  `Direccion` varchar(55) NOT NULL,
  `Ncontacto` varchar(55) NOT NULL,
  `Telefono` varchar(10) default NULL,
  `Celular` varchar(10) default NULL,
  `Email` varchar(55) default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedores`
--


/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
LOCK TABLES `proveedores` WRITE;
INSERT INTO `proveedores` VALUES ('1','La medalla milagrosa','san miguel','Carlos Majano','2344-4562','7342-3423','carlos_majano@hotmail.com'),('2','Negocios de Oriente','san miguel','Juan Perez','2344-4562','7234-2342','jaunjo_per@hotmail.com'),('3','Todito','san miguel','Jose Hernandez','2334-3453','7890-2172','jose_her@hotmail.com');
UNLOCK TABLES;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

--
-- Table structure for table `temporal`
--

DROP TABLE IF EXISTS `temporal`;
CREATE TABLE `temporal` (
  `id` int(10) NOT NULL,
  `codigo_producto` int(10) default NULL,
  `Cantidad` int(10) NOT NULL,
  `Precio_venta` decimal(4,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporal`
--


/*!40000 ALTER TABLE `temporal` DISABLE KEYS */;
LOCK TABLES `temporal` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `temporal` ENABLE KEYS */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(6) NOT NULL auto_increment,
  `Login` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DUI` varchar(15) NOT NULL,
  `Type` varchar(25) NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--


/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
LOCK TABLES `usuarios` WRITE;
INSERT INTO `usuarios` VALUES (1,'administrador','63a9f0ea7bb98050796b649e85481845','000001','administrador'),(3,'Bairesaa','58788c42c2556304cc1038d4966f7650','09454545-4','usuario');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id_venta` int(10) NOT NULL,
  `N_factura` int(10) default NULL,
  `codigo_producto` int(10) default NULL,
  `Cantidad` int(10) NOT NULL,
  `Precio_venta` decimal(4,2) NOT NULL,
  PRIMARY KEY  (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ventas`
--


/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
LOCK TABLES `ventas` WRITE;
INSERT INTO `ventas` VALUES (1,1,2,2,'0.15');
UNLOCK TABLES;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

