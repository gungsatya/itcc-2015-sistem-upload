/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.31-MariaDB : Database - itcc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_peserta` */

DROP TABLE IF EXISTS `tb_peserta`;

CREATE TABLE `tb_peserta` (
  `id_peserta` smallint(6) NOT NULL AUTO_INCREMENT,
  `no_peserta` char(15) DEFAULT NULL,
  `nama_peserta` varchar(50) DEFAULT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_peserta` */

insert  into `tb_peserta`(`id_peserta`,`no_peserta`,`nama_peserta`,`nama_sekolah`,`username`,`password`) values (2,'ITCC-PEM-2201','Aditya Putra Santosa','SMAN 4 Denpasar','ITCC2201','QW12WE'),(3,'ITCC-PEM-2209','Galangkangin Gotera','SMAN 1 Denpasar','ITCC2209','WE23ER'),(4,'ITCC-PEM-2214','Pande Ketut Cahya Nugraha','SMAN 3 Denpasar','ITCC2214','ER34RT'),(5,'ITCC-PEM-2215','Dhestar Bagus Wirawan','SMAN 4 Denpasar','ITCC2215','RT45TY'),(6,'ITCC-PEM-2216','Danang Biyan Permana','SMAN 4 Denpasar','ITCC2216','TY56YU'),(7,'ITCC-PEM-2223','I Made Krisna Dwitama','SMAN 4 Denpasar','ITCC2223','YU67UI'),(8,'ITCC-PEM-2229','I Putu Aris Sanjaya','SMA Negeri Bali Mandara','ITCC2229','UI78IO'),(9,'ITCC-PEM-2233','Eurico Branco Budhisatria A','SMAN 1 Tabanan','ITCC2233','IO89OP'),(10,'ITCC-PEM-2234','A.A Anandika Parwata','SMAN 4 Denpasar','ITCC2234','OP90PA'),(11,'ITCC-PEM-2235','Steven Kusuman','SMAN 4 Denpasar','ITCC2235','PA01AS'),(12,'ITCC-WEB-1329','Urip','SMA NEGERI 2 AMLAPURA','urip','sukasuka');

/*Table structure for table `tb_soal` */

DROP TABLE IF EXISTS `tb_soal`;

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_soal` */

insert  into `tb_soal`(`id_soal`,`nomor`) values (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);

/*Table structure for table `tb_upload` */

DROP TABLE IF EXISTS `tb_upload`;

CREATE TABLE `tb_upload` (
  `id_upload` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) DEFAULT NULL,
  `nama_file` char(50) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `soal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_upload`),
  KEY `soal` (`soal`),
  CONSTRAINT `tb_upload_ibfk_1` FOREIGN KEY (`soal`) REFERENCES `tb_soal` (`id_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_upload` */

/* Procedure structure for procedure `cek` */

/*!50003 DROP PROCEDURE IF EXISTS  `cek` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cek`(IN `vip` CHAR)
BEGIN
	DECLARE id SMALLINT;
		SET id:=(SELECT tb_peserta.`id_peserta` FROM tb_peserta WHERE tb_peserta.`ip` = vip);
	IF(id IS NULL) THEN
		INSERT INTO tb_peserta(ip,banyak_upload) VALUE (vip);
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `upload` */

/*!50003 DROP PROCEDURE IF EXISTS  `upload` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `upload`(IN `vip` CHAR, IN `nama` CHAR, IN `alamat` CHAR, IN `ket` CHAR)
BEGIN
	declare id smallint;
	sET id:=(SELECT tb_peserta.`id_peserta` from tb_peserta WHERE tb_peserta.`ip` = vip);
	IF(id IS NULL) THEN
		INSERT INTO tb_peserta(ip,banyak_upload) VALUE (vip,0);
		SET id:=(SELECT tb_peserta.`id_peserta` FROM tb_peserta WHERE tb_peserta.`ip` = vip);
	end if;
		UPDATE tb_peserta SET banyak_upload = banyak_upload + 1 WHERE tb_peserta.`ip` = vip;
		INSERT INTO tb_upload(id_peserta, nama_file, alamat_file, waktu, keterangan) VALUES (id, nama, alamat, NOW(), ket);
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
