-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `db_simasjid`;
CREATE DATABASE `db_simasjid` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `db_simasjid`;

DROP TABLE IF EXISTS `data_aktivis`;
CREATE TABLE `data_aktivis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(12) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `dat_trans`;
CREATE TABLE `dat_trans` (
  `id` bigint(12) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `kode` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `uraian` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nilai` decimal(10,0) DEFAULT NULL,
  `jenis` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `bukti` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `catatan` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `uploader` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `waktu_upload` datetime NOT NULL,
  `lokasi_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `format_surat`;
CREATE TABLE `format_surat` (
  `header` tinytext COLLATE latin1_general_ci NOT NULL,
  `footer` tinytext COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `format_surat` (`header`, `footer`) VALUES
('Bismillahirrohmanirrohim,\r\nAssalamu alaikum Warohatullahi Wabarokatuh,',	'Jazakumullahi Khoiron Katsir,\r\nWassalamu alaikum Warohatullahi Wabarokatuh,');

DROP TABLE IF EXISTS `hadits_jumat`;
CREATE TABLE `hadits_jumat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `sumber` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `imam_rowatib`;
CREATE TABLE `imam_rowatib` (
  `hari` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `imam` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cadangan` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `jns_transaksi`;
CREATE TABLE `jns_transaksi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jenis` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `jns_transaksi` (`id`, `nama`, `jenis`, `catatan`) VALUES
(1,	'Kotak Jumat',	'Pemasukan',	''),
(2,	'Iuran Rutin Jamaah',	'Pemasukan',	''),
(3,	'Kencleng Donasi',	'Pemasukan',	''),
(4,	'Kotak Amal Minimarket',	'Pemasukan',	''),
(5,	'Donasi Tunai Langsung',	'Pemasukan',	''),
(6,	'Tunjangan Ustadz Kajian Ahad',	'Pengeluaran',	''),
(7,	'Tunjangan Ustadz PHBI',	'Pengeluaran',	''),
(8,	'Tunjangan Khotib Jumat',	'Pengeluaran',	''),
(9,	'Tunjangan Marbot',	'Pengeluaran',	''),
(10,	'Tunjangan Muadzin',	'Pengeluaran',	''),
(11,	'Tunjangan Ustdz Sholat Jenazah',	'Pengeluaran',	''),
(12,	'Tunjangan Memandikan Jenazah',	'Pengeluaran',	''),
(13,	'Tunjangan Sopir Ambulance',	'Pengeluaran',	''),
(14,	'Perawatan Masjid',	'Pengeluaran',	''),
(15,	'Konsumsi Rapat Pengurus',	'Pengeluaran',	''),
(16,	'Biaya Lain-lain',	'Pengeluaran',	''),
(17,	'Pemasukan Lain-lain',	'Pemasukan',	'');

DROP TABLE IF EXISTS `jumatan`;
CREATE TABLE `jumatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `khotib` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `bilal` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `muadzin` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `photo_khotib` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `photo_bilal` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `photo_muadzin` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `kajian`;
CREATE TABLE `kajian` (
  `pekan` char(1) COLLATE latin1_general_ci NOT NULL,
  `ustadz` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `tema` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `kode_jabatan`;
CREATE TABLE `kode_jabatan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kode` varchar(6) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `kode_jabatan` (`id`, `jabatan`, `kode`) VALUES
(1,	'Pembina',	'PEM'),
(2,	'Pengawas',	'PWAS'),
(3,	'KSB',	'PHAR'),
(4,	'Ketua1',	'KET1'),
(5,	'Ketua2',	'KET2'),
(6,	'Ketua3',	'KET3'),
(7,	'Ketua4',	'KET4'),
(8,	'Ketua5',	'KET5');

DROP TABLE IF EXISTS `kode_surat`;
CREATE TABLE `kode_surat` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kode` varchar(2) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `kode_surat` (`id`, `jenis`, `kode`) VALUES
(1,	'Surat Keputusan',	'01'),
(2,	'Surat Undangan',	'02'),
(3,	'Surat Permohonan',	'03'),
(4,	'Surat Pemberitahuan',	'04'),
(5,	'Surat Pernyataan',	'05'),
(6,	'Surat Tugas',	'06'),
(7,	'Surat Keterangan',	'07'),
(8,	'Surat Rekomendasi',	'08'),
(9,	'Surat Balasan',	'09'),
(10,	'Surat Pengantar',	'10');

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `login` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `asal` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `notes` varchar(60) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `motivasi`;
CREATE TABLE `motivasi` (
  `no` mediumint(6) NOT NULL,
  `surat_rawi` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ayat_nom` mediumint(6) NOT NULL,
  `catatan` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `motivasi2`;
CREATE TABLE `motivasi2` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `sumber` varchar(39) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `notulen_rapat`;
CREATE TABLE `notulen_rapat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `pengundang` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `kehadiran` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `bahasan` text COLLATE latin1_general_ci NOT NULL,
  `notulis` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `organisasi`;
CREATE TABLE `organisasi` (
  `id` tinyint(1) NOT NULL,
  `kode` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE `pengurus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(36) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ket_jabatan` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `kode_jabatan` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `periode` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `pengurus` (`id`, `nama`, `alamat`, `telp`, `jabatan`, `ket_jabatan`, `kode_jabatan`, `periode`, `aktif`) VALUES
(2,	'M. Syamsul Arifin',	'',	'085885268989',	'',	'-',	'PHAR',	'2023-2027',	1);

DROP TABLE IF EXISTS `persuratan`;
CREATE TABLE `persuratan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_buat` datetime NOT NULL,
  `keterangan` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `jenis_surat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `no_surat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `isi_surat` text COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `setup_akses`;
CREATE TABLE `setup_akses` (
  `jabatan` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `hak_akses` varchar(120) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `setup_wablast`;
CREATE TABLE `setup_wablast` (
  `ipserver` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nomor` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `pengenal` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `header` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `footer` varchar(160) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `template_surat`;
CREATE TABLE `template_surat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jenis` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `akses` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tingkatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `users` (`id`, `user`, `password`, `akses`, `tingkatan`, `photo`) VALUES
(2,	'sy4r13f',	'e10adc3949ba59abbe56e057f20f883e',	'11,12,,14,15,16,21,22,23,,31,32,33,34,41,42,51,52,',	'administrator',	'pengguna-sy4r13f20230212_225415.jpg');

DROP TABLE IF EXISTS `warga_muslim`;
CREATE TABLE `warga_muslim` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `gender` char(1) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pendidikan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `pekerjaan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `rt` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `rw` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `kelurahan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nohp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `wa_kirim`;
CREATE TABLE `wa_kirim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-02-16 02:00:20
