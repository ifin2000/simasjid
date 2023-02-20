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

INSERT INTO `data_aktivis` (`id`, `nama`, `alamat`, `telp`, `photo`, `jabatan`, `catatan`) VALUES
(1,	'Bahrul Ulum Lc',	'',	'',	'',	'ustadz',	''),
(2,	'Muhammad Asad SPdI',	'',	'',	'',	'ustadz',	''),
(3,	'KH.ASEP SURYADI S.PD.I ',	'Kp Bpm ',	'',	'',	'ustadz',	'');

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

INSERT INTO `dat_trans` (`id`, `tgl`, `kode`, `nama`, `uraian`, `nilai`, `jenis`, `bukti`, `catatan`) VALUES
(4,	'2023-02-15',	'2302004',	'Kotak Amal Minimarket',	'Pengambilan kotak infaq di alfamidi Bintaro',	1253900,	'Pemasukan',	'',	''),
(5,	'2023-02-15',	'2302005',	'Perawatan Masjid',	'Beli Token Listrik utk Masjid',	320000,	'Pengeluaran',	'brje-inner.png',	''),
(6,	'2023-02-14',	'2302006',	'Iuran Rutin Jamaah',	'Donasi Rutin RT04 pekan ke-2',	2345000,	'Pemasukan',	'',	''),
(7,	'2023-02-14',	'2302007',	'Iuran Rutin Jamaah',	'Donasi Rutin RT-03',	1786500,	'Pemasukan',	'',	''),
(8,	'2023-02-13',	'2302008',	'Donasi Tunai Langsung',	'Sumbangan dari alm.Bambang Sudrajat RT-24',	500000,	'Pemasukan',	'',	''),
(9,	'2023-02-13',	'2302009',	'Kotak Jumat',	'Kotak Jumat ke-2',	1650000,	'Pemasukan',	'',	''),
(10,	'2023-02-13',	'2302010',	'Kencleng Donasi',	'Kencleng Donasi RT-05',	6520000,	'Pemasukan',	'',	''),
(11,	'2023-02-12',	'2302011',	'Pemasukan Lain-lain',	'Hasil Pemasukan Jual Kaos dan Jaket Yayasan',	5342000,	'Pemasukan',	'',	''),
(12,	'2023-02-11',	'2302012',	'Tunjangan Ustadz Kajian Ahad',	'Kajian Ahad ke-2',	250000,	'Pengeluaran',	'',	''),
(13,	'2023-02-11',	'2302013',	'Tunjangan Khotib Jumat',	'Khotib Jumat ke-2',	500000,	'Pengeluaran',	'',	''),
(14,	'2023-02-17',	'2302014',	'Tunjangan Marbot',	'Bonus 2 marbot krn rajin',	1250000,	'Pengeluaran',	'',	''),
(15,	'2023-02-17',	'2302015',	'Tunjangan Sopir Ambulance',	'Ujroh Sopir Ambulance antar jenazah ke Jawa Tengah',	750000,	'Pengeluaran',	'',	'');

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

INSERT INTO `imam_rowatib` (`hari`, `imam`, `cadangan`) VALUES
('Senin',	'Bp.Takroni',	'Bp.Fian Fitrian'),
('Selasa',	'Ust.Aep Saepullah',	'Bp.Ahmad Rifai'),
('Rabu',	'Bp.Imam Tauhid',	'Ust.Ade Rendy'),
('Kamis',	'Ust.Muhammad Ali',	'Bp.Imam Khudori'),
('Jumat',	'Bp.Adi Irawan',	'Bp.Supriyono'),
('Sabtu',	'Ust.Husein',	'Bp.Sudirman'),
('Ahad',	'Ust.Muhtar',	'Bp.Sumarlin');

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

INSERT INTO `kajian` (`pekan`, `ustadz`, `tema`, `catatan`) VALUES
('1',	'Adi Hidayat SE MA',	'Kajian Umum',	'ust-muchsin-albantani2.jpg'),
('2',	'Abdul Shomad Lc MA',	'Arbain AnNawawiyah',	'ust-abdul-syukur2.jpg'),
('3',	'K.H.Syukron Makmun',	'Fiqih Sholat',	'ust-syamsuri2.jpg'),
('4',	'KH. Dr.Muslih Abdul Karim MA',	'Sirah Nabawiyah',	'ust-ugi-sugiman2.jpg'),
('5',	'KH Bahauddin Nursalim',	'Kewajiban seorang Muslim',	'ust-muhammad-ali2.jpg');

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

INSERT INTO `organisasi` (`id`, `kode`, `nama`, `alamat`, `kota`, `telp`) VALUES
(0,	'MAH',	'Masjid Al - Hijrah',	'Perumahan Puri Harmoni 6 Desa Situsari Kec. Cileungsi ',	'Kab. Bogor',	'081563761234');

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
(2,	'M. Syamsul Arifin',	'',	'085885268989',	'Sekretaris Yayasan',	'-',	'',	'2023-2027',	1),
(3,	'Bambang Sumantri',	'',	'',	'Ketua Yayasan',	'',	'PHAR',	'2023-2027',	1);

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

INSERT INTO `template_surat` (`id`, `nama`, `jenis`, `konten`, `pembuat`) VALUES
(1,	'SK utk Marbot Masjid',	'Surat Keputusan',	'<p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">Berdasarkan hasil&nbsp;</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:=\"\" minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;mso-ansi-language:=\"\" en-id\"=\"\">penilaian dari Pengurus Masjid Al Muhajirin, Tangerang&nbsp;m</span><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">aka ditetapkan keputusan yang ditujukan kepada :<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">&nbsp;</span><span calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555\"=\"\"><br>Tempat</span><span lang=\"EN-ID\" calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555;mso-ansi-language:en-id\"=\"\">/</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">Tanggal Lahir :</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:=\"\" minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;mso-ansi-language:=\"\" en-id\"=\"\">&nbsp;</span><span calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555\"=\"\"><br>Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">&nbsp;</span><span calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555\"=\"\"><br>Alamat</span><span lang=\"EN-ID\" calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555;mso-ansi-language:en-id\"=\"\">&nbsp;Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:=\"\" minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">:</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">&nbsp;<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">Dengan ini saudara telah&nbsp;</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">diangkat sebagai Tenaga Marbot Masjid di Masjid Al Muhajirin, Kota Tangerang,&nbsp;</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">dengan ketentuan yaitu :<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">1. Yang bersangkutan memiliki kewajiban untuk melakukan&nbsp;</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">pembersihan dan perawatan</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">&nbsp;di</span><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555;mso-ansi-language:en-id\"=\"\">&nbsp;</span><span calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555\"=\"\">area</span><span lang=\"EN-ID\" calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555;mso-ansi-language:en-id\"=\"\">&nbsp;Masjid</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">&nbsp;yang telah ditetapkan secara rutin dan terjadwal sesuai dengan&nbsp;</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;=\"\" mso-ansi-language:en-id\"=\"\">arahan dari Pengurus Yayasan</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">2. Yang bersangkutan berhak mendapatkan gaji pokok sesuai dengan aturan&nbsp;</span><span lang=\"EN-ID\" calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555;mso-ansi-language:en-id\"=\"\">Yayasan</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">&nbsp;sebesar Rp. ..............</span><span calibri\",sans-serif;mso-ascii-theme-font:minor-latin;=\"\" mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;color:#555555\"=\"\">&nbsp;setiap bulannya</span><span lang=\"EN-ID\" calibri\",sans-serif;=\"\" mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:=\"\" minor-latin;color:#555555;mso-ansi-language:en-id\"=\"\">, dan akan diperbarui sesuai kebutuhan.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">3. Yang bersangkutan harus melaksanakan tugas dan kewajibannya serta bertanggung jawab dengan target yang telah ditentukan oleh perusahaan.<o:p></o:p></span></p><p></p><p style=\"margin: 0cm 0cm 9pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">Demikian surat pengangkatan ini agar dapat dijadikan perhatian dan dapat dilaksanakan sesuai dengan aturan perusahaan. Jika ada kesalahan atau kekurangan akan segera diperbaik</span><span lang=\"EN-ID\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:=\"\" minor-latin;mso-bidi-theme-font:minor-latin;color:#555555;mso-ansi-language:=\"\" en-id\"=\"\">i</span><span calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#555555\"=\"\">.</span></p>',	'Sekretaris'),
(2,	'Surat Penyataan Bebas Narkoba',	'Surat Pernyataan',	'<p><div style=\"text-align: center;\"><span style=\"font-weight: bold; text-decoration-line: underline; color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">SURAT PERNYATAAN</span></div><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Saya yang bertanda tangan di bawah ini:</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Nama&nbsp;Lengkap&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ..................................................</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Tempat Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;: ..............., ..................................</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Alamat&nbsp; Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ...................................................................................................</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Dengan ini menyatakan bahwa:</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">1. Sama sekali tidak pernah terlibat penggunaan narkotika atau zat adiktif lain yang dibuktikan pada surat tes dari laboratorium terlampir.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">2. Sama sekali tidak pernah terlibat dalam kegiatan untuk menggunakan, memasarkan, atau menyebarluaskan narkotika.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">3. Tidak terlibat aktivitas partai politik baik sebagai anggota maupun pengurus.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">4. Tidak terlibat dalam kejahatan dalam bentuk apapun yang dibuktikan dengan surat berkelakuan baik terlampir.</span></p><p><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Demikian surat pernyataan diri ini saya buat dengan sebenar-benarnya sebagai persyaratan untuk mengikuti Tes Masuk Sekolah Dakwah Masjid Al Muhajirin, Tangerang.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Saya bersedia menerima konsekuensi hukum apabila pernyataan diri ini di kemudian hari terdapat kesalahan.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">Tangerang, ...........................</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif; font-size: 16px;\">[nama lengkap]</span></p>',	'Sekretaris');

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
(2,	'admin',	'e10adc3949ba59abbe56e057f20f883e',	'11,12,13,14,15,21,22,23,,31,32,33,34,41,42,51,52,',	'administrator',	'pengguna-sy4r13f20230220_060750.jpg'),
(3,	'bambang',	'e10adc3949ba59abbe56e057f20f883e',	'',	'',	'');

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


-- 2023-02-20 10:53:29
