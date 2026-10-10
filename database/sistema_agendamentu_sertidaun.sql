/*
SQLyog Community v13.3.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - igreja_certidao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`igreja_certidao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `igreja_certidao`;

/*Table structure for table `arquivos` */

DROP TABLE IF EXISTS `arquivos`;

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `caminho` text NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `arquivos` */

/*Table structure for table `detalhes_pessoa` */

DROP TABLE IF EXISTS `detalhes_pessoa`;

CREATE TABLE `detalhes_pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `nome_completo_batizado` varchar(150) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `nome_pai` varchar(150) DEFAULT NULL,
  `nome_mae` varchar(150) DEFAULT NULL,
  `livro_numero` varchar(20) DEFAULT NULL,
  `pagina_numero` varchar(20) DEFAULT NULL,
  `assento_numero` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `detalhes_pessoa_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detalhes_pessoa` */

/*Table structure for table `notificacoes` */

DROP TABLE IF EXISTS `notificacoes`;

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `mensagem` text DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `pedido_id` (`pedido_id`),
  CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notificacoes` */

/*Table structure for table `paroquias` */

DROP TABLE IF EXISTS `paroquias`;

CREATE TABLE `paroquias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_paroquia` varchar(150) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `paroquias` */

insert  into `paroquias`(`id`,`nome_paroquia`,`municipio`,`telefone`,`endereco`,`created_at`) values 
(1,'Paroquia Baucau','Baucau','77564547','Vila-Antiga,Baucau-Vila,Baucau\r\n','2026-10-07 18:12:20');

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_pedido` varchar(20) DEFAULT NULL,
  `paroquia_id` int(11) NOT NULL,
  `tipo_certidao_id` int(11) NOT NULL,
  `nome_requerente` varchar(150) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `finalidade` varchar(150) DEFAULT NULL,
  `data_solicitacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_levantamento_desejada` date DEFAULT NULL,
  `status` enum('pendente','em_verificacao','em_processo','pronto','entregue','cancelado') DEFAULT 'pendente',
  `observacao_admin` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_pedido` (`codigo_pedido`),
  KEY `paroquia_id` (`paroquia_id`),
  KEY `tipo_certidao_id` (`tipo_certidao_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`paroquia_id`) REFERENCES `paroquias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`tipo_certidao_id`) REFERENCES `tipos_certidao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pedidos` */

insert  into `pedidos`(`id`,`codigo_pedido`,`paroquia_id`,`tipo_certidao_id`,`nome_requerente`,`whatsapp`,`finalidade`,`data_solicitacao`,`data_levantamento_desejada`,`status`,`observacao_admin`) values 
(7,'',1,1,'asdasdasdasd','adasda','asdasd','2026-10-07 20:47:08','2026-10-21','pendente',NULL),
(10,NULL,1,1,'asdasda','sadasda','asdasda','2026-10-07 20:57:22','2026-10-13','pendente',NULL),
(13,'PED01',1,1,'Jose Kaimanuai','77223344','Halo didiak','2026-10-07 21:25:59','2026-10-15','pendente',NULL),
(14,'PED-20261007-A9C2F',1,1,'Kaimoluai','75112233','Halo didiak','2026-10-07 21:34:13','2026-10-21','pendente',NULL),
(15,'PED-20261007-39E05',1,1,'Antonio de Sha','1232131','Halo didiak','2026-10-07 21:34:41','2026-10-17','pendente',NULL),
(16,'PED-20261007-05295',1,1,'Antonio de Sha','77223344','Halo didiak','2026-10-07 23:49:30','2026-10-15','pendente',NULL),
(17,'PED-20261007-EFAA8',1,1,'Antonio de Sha','77223344','Halo didiak','2026-10-07 23:52:15','2026-10-12','pendente',NULL),
(18,'PED-20261007-C315D',1,1,'Jesse Nukleu','77889910','Atu ba rai liur','2026-10-07 23:54:24','2026-10-10','pendente',NULL),
(19,'PED-20261010-5D06D',1,1,'Savior Jackris Guterres','78341174','Halo ho didiak atu ba rai liur','2026-10-10 09:12:08','2026-10-12','pendente',NULL);

/*Table structure for table `tipos_certidao` */

DROP TABLE IF EXISTS `tipos_certidao`;

CREATE TABLE `tipos_certidao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `requisitos` text DEFAULT NULL,
  `prazo_dias` int(11) DEFAULT 3,
  `custo` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipos_certidao` */

insert  into `tipos_certidao`(`id`,`nome`,`requisitos`,`prazo_dias`,`custo`) values 
(1,'Certidao Batismo','Inan Aman Kompletu',3,5.00);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','secretario','padre') NOT NULL,
  `paroquia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `paroquia_id` (`paroquia_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`paroquia_id`) REFERENCES `paroquias` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password_hash`,`role`,`paroquia_id`) values 
(1,'','','','',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
