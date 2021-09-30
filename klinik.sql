/*
SQLyog Ultimate v8.55 
MySQL - 5.7.19 : Database - klinik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinik`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `kodeakun` char(7) NOT NULL,
  `jenisakun` enum('M','K') DEFAULT NULL,
  `namaakun` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodeakun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`kodeakun`,`jenisakun`,`namaakun`) values ('KDA-001','M','Pendapatan'),('KDA-002','M','Konsul Dokter'),('KDA-003','M','Labor'),('KDA-004','M','Claim BPJS'),('KDA-005','M','Selisih Uang Kecil'),('KDA-006','K','Obat'),('KDA-007','K','BTB'),('KDA-008','K','dr Pengg'),('KDA-009','K','ADM'),('KDA-010','K','PP'),('KDA-011','K','SDM'),('KDA-012','K','Senam'),('KDA-013','K','Acara'),('KDA-014','K','Ayia'),('KDA-015','K','Prive'),('KDA-016','K','PTDS');

/*Table structure for table `pendapatan` */

DROP TABLE IF EXISTS `pendapatan`;

CREATE TABLE `pendapatan` (
  `kodetransaksi` char(7) NOT NULL,
  `tgltransaksi` date DEFAULT NULL,
  `jenisakun` char(10) DEFAULT NULL,
  `kodesaldo` char(7) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`kodetransaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pendapatan` */

/*Table structure for table `pengeluaran` */

DROP TABLE IF EXISTS `pengeluaran`;

CREATE TABLE `pengeluaran` (
  `kodetransaksikeluar` char(7) NOT NULL,
  `tglkeluar` date DEFAULT NULL,
  `jenisakun` varchar(30) DEFAULT NULL,
  `kodesaldo` char(7) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`kodetransaksikeluar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pengeluaran` */

/*Table structure for table `saldo` */

DROP TABLE IF EXISTS `saldo`;

CREATE TABLE `saldo` (
  `kodesaldo` char(7) NOT NULL,
  `tglsaldo` date DEFAULT NULL,
  `saldoawal` int(11) DEFAULT '0',
  `saldoakhir` int(11) DEFAULT '0',
  PRIMARY KEY (`kodesaldo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `saldo` */

insert  into `saldo`(`kodesaldo`,`tglsaldo`,`saldoawal`,`saldoakhir`) values ('SAL-001','2020-06-04',100000000,100000000);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `notelp` char(13) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `hakakses` enum('1','2','3') DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`namalengkap`,`password`,`email`,`notelp`,`foto`,`hakakses`) values ('USR-000','Pimpinan','21232f297a57a5a743894a0e4a801fc3','fauzan.adli92@gmail.com','081266053442','user.png','1'),('USR-001','Admin','202cb962ac59075b964b07152d234b70','fauzan.adli00@gmail.com','083181005832','user4.png','2'),('USR-002','Yeyen','202cb962ac59075b964b07152d234b70','yeyen@gmail.com','0832394929382','user6.png','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
