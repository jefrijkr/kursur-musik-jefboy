SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `kursus`;
CREATE TABLE `kursus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kursus` varchar(100) NOT NULL,
  `pengajar` varchar(100) DEFAULT NULL,
  `jadwal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

INSERT INTO `kursus` (`id`, `nama_kursus`, `pengajar`, `jadwal`) VALUES
(1,	'Gitar Elektrik',	'Jefri Jakaria',	'setiap Kamis'),
(2,	'Keyboard Electone',	'Noverry',	'Rabu, Jumat, dan Minggu'),
(3,	'Piano Jazz ',	'David Embang',	'Setiap Kamis'),
(4,	'Piano Klasik',	'Kevin Berliando',	'Senin dan Selasa'),
(5,	'Gitar Klasik',	'Jefri Jakaria',	'Setiap Minggu');

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `id_kursus` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id_kursus` (`id_kursus`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

INSERT INTO `siswa` (`id`, `nama`, `email`, `telepon`, `id_kursus`) VALUES
(2,	'Fernando',	'nando@gmail.com',	'082178786767',	3),
(3,	'Daniel Siswanto',	'danielsis@gmail.com',	'082287875454',	5),
(4,	'Osy Elvanisba',	'osyyyyy@gmail.com',	'08217873452',	2),
(5,	'Jonathan',	'jo2321@gmail.com',	'08223440576',	1),
(6,	'Leonardo',	'leo@gmail.com',	'08217823213',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

INSERT INTO `users` (`username`, `password`) VALUES
('jef',	'123456');