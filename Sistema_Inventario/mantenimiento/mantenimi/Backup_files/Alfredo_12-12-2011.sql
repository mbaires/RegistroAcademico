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
  `codigo` varchar(10) NOT NULL,
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
INSERT INTO `compras` VALUES (1,1,8,'0.25','12-12-2011',1,'es el primer registro'),(2,1,12,'0.50','12-12-11',1,'fftgyygy'),(3,1,12,'0.40','12-12-11',1,'yuhih'),(4,2,5,'10.00','12-12-2011',1,'gfsdfsdfsbvc'),(5,2,6,'10.00','12-12-11',1,'fghfhh');
UNLOCK TABLES;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `N_factura` int(10) NOT NULL,
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
UNLOCK TABLES;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `codigo_producto` int(10) NOT NULL default '0',
  `Nombre` varchar(55) default NULL,
  `Marca` varchar(35) default NULL,
  `Estilo` varchar(35) default NULL,
  `Color` varchar(35) default NULL,
  `Precio_venta` decimal(4,2) default NULL,
  `Existencias` int(10) default NULL,
  PRIMARY KEY  (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--


/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
LOCK TABLES `inventario` WRITE;
INSERT INTO `inventario` VALUES (1,'lapiz','facela','mediano','amarillo','0.40',24),(2,'calculadora','cacio','xxx','xxxx','12.50',11);
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
INSERT INTO `temporal` VALUES (1,1,8,'0.40');
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
INSERT INTO `usuarios` VALUES (1,'administrador','63a9f0ea7bb98050796b649e85481845','000001','administrador');
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
INSERT INTO `ventas` VALUES (1,0,1,8,'0.40');
UNLOCK TABLES;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

