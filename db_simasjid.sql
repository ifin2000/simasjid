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

INSERT INTO `hadits_jumat` (`id`, `konten`, `sumber`, `catatan`) VALUES
(1,	'Di dalam hari Jumat terdapat waktu yang tiada seorang hamba meminta sesuatu di dalamnya kecuali Allah mengabulkan permintaannya, selama tidak meminta dosa atau memutus tali shilaturrahim.\r\n',	'HR Imam Ahmad',	''),
(2,	'Barang siapa yg berwudlu dan kemudian memperbaiki wudlunya, lantas berangkat sholat Jumat, dekat dengan Imam dan mendengarkan khutbahnya, maka dosanya di antara hari tersebut dan Jumat berikutnya ditambah tiga hari akan diampuni.\r\n',	'HR. Muslim',	''),
(3,	'Barang siapa membaca surat al-Kahfi pada hari Jumat, maka Allah memberinya sinar cahaya di antara dua Jumat.\r\n',	'HR Al Hakim',	''),
(4,	'Sesungguhnya hari yang paling utama bagi kalian adalah hari Jumat, maka perbanyaklah sholawat kepadaku di dalamnya, karena sholawat kalian akan ditunjukkan kepadaku, para sahabat berkata: Bagaimana ditunjukkan kepadamu sedangkan engkau telah menjadi tanah? Nabi bersabda: Sesungguhnya Allah mengharamkan bumi untuk memakan jasad para Nabi.',	'HR. Abu Dawud, Ibnu Majah, An-Nasai',	''),
(5,	'Di hari Jumat itu terdapat satu waktu yang jika seorang Muslim melakukan shalat di dalamnya dan memohon sesuatu kepada Allah Taala, niscaya permintaannya akan dikabulkan. Lalu beliau memberi isyarat dengan tangannya yang menunjukkan sedikitnya waktu itu.',	'HR.Bukhari dan Muslim',	''),
(6,	'Sesungguhnya pada hari Jumat terdapat 12 jam, diantara waktu itu ada waktu yg tidak ada seorang hamba muslim pun memohon sesuatu kepada Allah melainkan Allah akan mengabulkannya, carilah ia di akhir waktu setelah Ashar.',	'HR Abu Dawud',	''),
(7,	'Hendaklah kaum-kaum itu berhenti dari meninggalkan shalat Jumat. Atau (jika tidak) Allah pasti akan mengunci hari mereka, kemudian mereka pasti menjadi orang-orang yang lalai.',	'HR Muslim',	''),
(8,	'Hai orang-orang beriman, apabila kamu di seru untuk menunaikan shalat Jum\'at, maka bersegeralah kepada mengingat Allah dan tinggalkanlah jual beli. Yang demikian itu lebih baik bagimu jika kamu mengetahui.',	'QS Al Jumuah 9',	''),
(9,	'Apabila seseorang mandi pada hari Jumat, dan bersuci semampunya, lalu memakai minyak dan harum-haruman dari rumahnya kemudian ia keluar rumah, lantas ia tidak memisahkan di antara dua orang, kemudian ia mengerjakan shalat yang diwajibkan, dan ketika imam berkhutbah, ia pun diam, maka ia akan mendapatkan ampunan antara Jumat yang satu dan Jumat lainnya.\r\n\r\n',	'HR. Bukhari no. 883',	''),
(10,	'Apabila Khotib sudah berdiri di mimbar dan mulai berkhotbah, maka diam dan dengarkan baik-baik, agar ibadah Sholat Jumat mu tidak sia-sia !',	'Mutiara Hadits',	'jeda'),
(11,	'Barang siapa membaca surat al-Kahfi pada hari Jumat, maka Allah memberinya sinar cahaya di antara dua Jumat',	'HR. An Nasai dan Baihaqi',	'');

DROP TABLE IF EXISTS `imam_rowatib`;
CREATE TABLE `imam_rowatib` (
  `hari` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `imam` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cadangan` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `imam_rowatib` (`hari`, `imam`, `cadangan`) VALUES
('Senin',	'Bp.Takroni',	'Bp.Fian Fitrian'),
('Selasa',	'Ust.Saepullah Fatah',	'Bp.Ahmad Rifai'),
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

INSERT INTO `motivasi` (`no`, `surat_rawi`, `ayat_nom`, `catatan`) VALUES
(2,	'59',	18,	'quran'),
(1,	'bukhari',	681,	'hadits'),
(3,	'muslim',	669,	'hadits'),
(4,	'muslim',	661,	'hadits');

DROP TABLE IF EXISTS `motivasi2`;
CREATE TABLE `motivasi2` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `konten` text COLLATE latin1_general_ci NOT NULL,
  `sumber` varchar(39) COLLATE latin1_general_ci NOT NULL,
  `catatan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `motivasi2` (`id`, `konten`, `sumber`, `catatan`) VALUES
(1,	'dan dirikanlah shalat Shubuh. Sesungguhnya shalat Shubuh itu disaksikan (oleh para malaikat).',	'QS Al-Isra:78',	'shubuh'),
(2,	'Barangsiapa yang mengerjakan shalat Isya secara berjamaah, itu seperti beribadah setengah malam dan barangsiapa yang mengerjakan shalat Isya dan Subuh secara berjamaah, maka ia seperti beribadah semalam.',	'HR Abu Dawud no.468',	'isya'),
(3,	'Berilah kabar gembira bagi orang-orang yang berjalan di kegelapan menuju masjid dengan cahaya yang terang benderang (pertolongan) pada hari kiamat.',	'HR Abu Daud, Tirmidzi dan Ibn Majah',	'isya'),
(4,	'barangsiapa yg menunaikan sholat shubuh maka ia berada dalam naungan dan penjagaan Allah.',	'HR Ahmad no.18060',	'shubuh'),
(5,	'Tidak akan masuk neraka seseorang yang mengerjakan shalat sebelum matahari terbit (yakni shalat shubuh) dan sebelum matahari terbenam (yakni shalat ashar).',	'HR. Muslim no. 634',	'ashar'),
(6,	'Barangsiapa yang mengerjakan shalat bardain (yaitu shalat shubuh dan ashar) maka dia akan masuk surga.',	'HR. Bukhari no. 574',	'shubuh'),
(7,	'Sesungguhnya shalat ini (shalat ashar) pernah diwajibkan kepada umat sebelum kalian, namun mereka menyia-nyiakannya. Sehingga barangsiapa yang menjaga shalat ini, maka baginya pahala dua kali lipat.',	'HR. Muslim no. 1372',	''),
(8,	'Siapa saja yang tidak melaksanakan shalat Ashar, maka amal perbuatannya akan hilang sia-sia,',	'HR Bukhari no.594',	'ashar'),
(9,	'Perumpamaan Sholat Lima Waktu itu seperti sebuah sungai yg mengalir melimpah di dekat pintu rumah dari salah seorang diantara kalian. Dia mandi dari air sungai tersebut setiap hari 5 kali, tentu tidak tersisa kotoran (dosa) sedikit pun dibadannya.',	'HR Ahmad no.9315',	'maghrib'),
(10,	'Siapa yg menjaga sholat wajib lima waktu, baginya cahaya, bukti dan keselamatan di Hari Kiamat kelak. Siapa yg tidak menjaga-nya maka dia tidak akan mendapatkan cahaya, bukti dan juga tidak memperoleh keselamatan.',	'HR Ahmad',	'dhuhur'),
(11,	'Sesungguhnya yang pertama kali akan dihisab atas seorang hamba pada hari kiamat adalah perkara Sholat, apabila Sholat-nya baik, maka baik pula seluruh amalan ibadah lainnya, kemudian semua amalannya akan dihitung atas hal itu.',	'HR. Nasai',	'maghrib'),
(12,	'Tidaklah seseorang berwudhu serta menyempurnakan wudhunya kemudian mendatangi masjid, lalu melangkah satu langkah melainkan ia akan diangkat beberapa derajat atau akan dihapus beberapa kesalahan darinya atau dicatat baginya satu kebaikan.',	'HR Ahmad no.3440',	'dhuhur'),
(13,	'Barangsiapa dalam sehari semalam shalat sunnah dua belas rakaat maka Allah akan membangunkan baginya rumah di surga; yakni empat rakaat sebelum Dhuhur, dua rakaat setelahnya, dua rakaat setelah Maghrib, dua rakaat setelah Isya dan dua rakaat sebelum Shubuh.',	'HR Tirmidzi no.380',	'dhuhur'),
(14,	'Dua rakaat shalat sunnah Fajar (shubuh) lebih baik dari dunia dan seisinya.',	'HR. Muslim no.725',	'jeda'),
(15,	'Hendaklah engkau memperbanyak sujud (perbanyak shalat) kepada Allah. Karena tidaklah engkau memperbanyak sujud karena Allah melainkan Allah akan meninggikan derajatmu dan menghapuskan dosamu.',	'HR. Muslim no.488',	'dhuhur'),
(16,	'Beristiqamahlah kalian dan sekali-kali kalian tidak dapat istiqomah dengan sempurna. Ketahuilah, sesungguhnya amalan kalian yang paling utama adalah shalat. Tidak ada yang menjaga wudhu melainkan ia adalah seorang mukmin.',	'HR. Ibnu Majah no.277',	'isya'),
(17,	'Sesungguhnya doa yang tidak tertolak adalah doa antara adzan & iqomah, berdoalah saat itu.',	'HR Ahmad no.12124',	'jeda'),
(18,	'Seorang hamba tetap dihitung dalam keadaan sholat selama ia berada di tempat sholatnya untuk menunggu waktu sholat, dan malaikat mendoakannya : \'Ya Allah ampunilah dia, ya Allah rahmatilah dia..\', hingga dia beranjak atau berhadats.',	'HR Muslim no.1061',	''),
(19,	'Luruskanlah shaf kalian, karena lurusnya shaf adalah bagian dari ditegakkannya shalat.',	'HR Bukhari no.681',	'jeda'),
(20,	'Wahai orang-orang yang beriman! Bertakwalah kepada Allah dan hendaklah setiap orang memperhatikan apa yang telah diperbuatnya untuk hari esok (akhirat), dan bertakwalah kepada Allah. Sungguh, Allah Mahateliti terhadap apa yang kamu kerjakan.',	'QS Al Hasyr 18',	'maghrib'),
(21,	'Kalau manusia tahu pahala dalam adzan dan shaf pertama kemudian mereka tidak mendapatkan jalan keluar untuk mendapatkannya kecuali dengan cara mengundi, niscaya mereka akan mengadakan undian. Dan seandainya mereka mengetahui pahala bersegera ke masjid, niscaya mereka akan bersegera kepadanya. Dan kalau mereka mengetahui pahala shalat Isya dan shubuh, niscaya mereka akan mendatangi keduanya walaupun dengan cara merangkak',	'HR. Muslim No. 661',	'isya'),
(22,	'Para malaikat mengawasi kalian bergantian antara malam dan siang. Mereka kemudian berkumpul saat shalat subuh dan ashar. Malaikat yang mengawasi di malam hari naik ke atas (saat shubuh), maka Tuhan bertanya - meski Dia lebih tahu dari mereka, Bagaimana kalian meninggalkan hamba-hamba-Ku? Para malaikat menjawab, Ketika kami pergi, mereka sedang melaksanakan shalat. Dan ketika kami datang, mereka juga sedang melaksanakan shalat, (demikian juga malaikat yg mengawasi di siang hari naik saat Ashar)',	'HR. Al-Bukhari no.555 dan Muslim no.6',	'ashar'),
(23,	'Amalan yang pertama dihisab pada hari kiamat adalah shalat. Allah berfirman kepada malaikat-Nya (pdhl Dia yang lebih tahu), lihatlah pada shalat hamba-Ku, apakah shalatnya sempurna atau tidak? Jika sempurna, maka akan dicatat baginya pahala yang sempurna. Namun jika dalam shalatnya ada kekurangan, maka Allah berfirman: Lihatlah, apakah hamba-Ku memiliki amalan sunnah. Jika hamba-Ku memiliki amalan tsb, maka sempurnakanlah kekurangan pada amalan wajib dengan amalan sunnahnya.',	'HR. Abu Daud no.864, Ibnu Majah no.14',	'maghrib');

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
  `id` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `kode` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `bank` varchar(36) COLLATE latin1_general_ci NOT NULL,
  `norek` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `anrek` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `organisasi` (`id`, `kode`, `nama`, `alamat`, `kota`, `telp`, `bank`, `norek`, `anrek`) VALUES
('3110',	'YMAMMS',	'Masjid Mujahidin Fi Sabilillah',	'Perumahan Sunrise Garden Blok H7, no.89, Ambon, Maluku',	'KOTA AMBON',	'081-3333-91898',	'Bank Syariah Suriname',	'99-1717-888-5',	'Masjid Mujahidin Fi Sabilillah');

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
(2,	'M. Syamsul Arifin',	'',	'',	'Sekretaris Yayasan',	'-',	'',	'2023-2027',	1),
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


DROP TABLE IF EXISTS `setup_tv`;
CREATE TABLE `setup_tv` (
  `jeda_page` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `jeda_iqomat` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `bg_image_cover` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `enable_page_imam` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `enable_page_donasi` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `enable_page_phbi` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `enable_page_hadits1` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `enable_page_jumatan` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `enable_page_hadits2` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `enable_page_kajian` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `enable_page_ramadhan` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `awal_ramadhan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `setup_tv` (`jeda_page`, `jeda_iqomat`, `bg_image_cover`, `enable_page_imam`, `enable_page_donasi`, `enable_page_phbi`, `enable_page_hadits1`, `enable_page_jumatan`, `enable_page_hadits2`, `enable_page_kajian`, `enable_page_ramadhan`, `awal_ramadhan`) VALUES
('5',	'20',	'bg-202303011325.jpg',	'1',	'1',	'',	'1',	'1',	'',	'1',	'1',	'2023-03-18 17:55:30');

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
(2,	'admin',	'e10adc3949ba59abbe56e057f20f883e',	'11,12,13,14,15,16,21,22,23,,31,32,33,34,41,42,51,52,',	'administrator',	'pengguna-admin20230302_022417.jpg'),
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


-- 2023-03-02 13:06:21
