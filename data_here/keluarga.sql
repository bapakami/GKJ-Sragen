
USE `GKJKlasis`;

DROP TABLE IF EXISTS `manajemen_keluarga`;

CREATE TABLE `keluarga` (
  `Idx` int(3) NOT NULL AUTO_INCREMENT,
  `Status_Keluarga` varchar(50) DEFAULT NULL,
  `Desc` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`Idx`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `manajemen_keluarga` */

insert  into `keluarga`(`Idx`,`Status_Keluarga`,`Desc`) values (1,'Kepala Keluarga',NULL),(2,'Istri',NULL),(3,'Anak',NULL),(4,'Saudara',NULL),(5,'Menantu',NULL),(6,'Cucu',NULL),(7,'Kakek/Nenek',NULL),(8,'Lain-lain',NULL);
