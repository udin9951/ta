-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for simabarqah
CREATE DATABASE IF NOT EXISTS `simabarqah` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `simabarqah`;

-- Dumping structure for table simabarqah.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `jdl_berita` varchar(255) DEFAULT NULL,
  `slug_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text,
  `gambar_berita` varchar(30) DEFAULT NULL,
  `tgl_berita` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table simabarqah.berita: ~6 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
REPLACE INTO `berita` (`id_berita`, `jdl_berita`, `slug_berita`, `isi_berita`, `gambar_berita`, `tgl_berita`, `id_user`) VALUES
	(2, 'Kisah serigala yang beriman kepada Rasulullah', 'kisah-serigala-yang-beriman-kepada-rasulullah', '<p>Dikisahkan pada masa kenabian Muhammad SAW, pada suatu daerah hiduplah seorang pengembala kambing. Pengembala tersebut harus mengurus ratusan kambing dan domba. Setiap pagi, lelaki itu membawa seluruh hewan ternak yang diamanati kepadanya ke padang rumput dekat dengan oasis.</p>\r\n\r\n<p>Namun naas, suatu hari lelaki tersebut kecolongan karena seekor serigala berhasil menerkam seekor domba yang lepas dari kerumunan. Pengembala tersebut pun mengejar sang serigala dan menakut-nakutinya dengan ayunan tongkat.</p>\r\n\r\n<p>Domba yang menjadi buruan serigala bertubuh cukup&nbsp;gemuk, sehingga serigala alami&nbsp;kesulitan saat membawanya kabur. Sang gembala pun menarik paksa domba tersebut dari cengkeraman serigala.</p>\r\n\r\n<p><em>&quot;Wahai fulan, mengapa engkau begitu zalim? Allah telah menetapkan domba itu sebagai rezekiku untuk hari ini, mengapa engkau merebutnya dariku?&quot;</em>&nbsp;ujar serigala itu kemudian.</p>\r\n\r\n<p>Betapa terkejutnya pria ini ketika mendengar serigala itu bertutur kata layaknya manusia.&nbsp;<em>&quot;Kamu... Bisa berbicara?&quot;</em>&nbsp;kata sang pengembala&nbsp;takjub.</p>\r\n\r\n<p><em>&quot;Mengapa engkau melihatku terheran-heran? Harusnya engkau tahu, ada yang lebih mengherankan daripada seekor serigala bisa berbicara,&quot;&nbsp;</em>kata hewan itu.</p>\r\n\r\n<p><em>&quot;Apa itu?&quot;</em></p>\r\n\r\n<p><em>&quot;Di Madinah, ada seorang nabi dan rasul yang Allah utus untuk sekalian alam. Namun, banyak orang yang justru membangkang dan enggan beriman kepadanya. Nama nabi itu, Rasulullah Muhammad&nbsp;shalallahu &#39;alaihi wasallam,&quot;</em>&nbsp;papar serigala.</p>\r\n\r\n<p>Keesokan harinya, lelaki pengembala itu pergi ke Madinah untuk menjumpai langsung sosok yang diceritakan serigala kemarin. Perjalanan yang tidak mudah dia tempuh dengan penuh kesabaran dan sampailah ia di Madinah.</p>\r\n\r\n<p>Setelah bertanya kepada warga setempat, lelaki itu kemudian tiba di depan Masjid Nabawi. Singkat cerita, ia berkesempatan bertemu Nabi Muhammad SAW. Kepada beliau, ia pun menuturkan kisahnya hingga sampai di Madinah.</p>\r\n\r\n<p>Kemudian Rasulullah membenarkan kisah sang gembala bahwa ada&nbsp;seekor binatang yang terang-terangan menunjukkan rasa imannya kepada Allah dan Rasul-Nya. Lebih lanjut, hal itu ternyata termasuk tanda kian dekatnya hari akhir.</p>\r\n\r\n<p><em>&quot;Yang demikian itu adalah salah satu tanda kiamat,&quot;</em>&nbsp;sabda Muhammad SAW.</p>\r\n\r\n<p>Kisah ini termaktub dalam hadis riwayat dari Abu Hurairah dan Abu Sa&rsquo;id al-Khudri, serta Imam Ahmad. Pakar tafsir Ibnu Katsir menilai sanadnya sahih.&nbsp;</p>\r\n\r\n<p>Dari kisah ini, diharapkan anak dapat selalu beriman kepada Allah SWT untuk mempersiapkan hari akhir kelak.&nbsp;<em>Wallahualam.</em></p>\r\n', '2.jpg', '2021-01-28', 1),
	(3, 'Kisah Nabi Ibrahim dan api', 'kisah-nabi-ibrahim-dan-api', '<p>Dilahirkan di tengah masyarakat jahiliah yang musyrik, Nabi Ibrahim sempat alami pengasingan ke hutan oleh orangtuanya. Hal ini lantaran di zaman itu,&nbsp;Raja Namrud (negeri tempat Ibrahim tinggal) mengeluarkan peraturan untuk membunuh setiap bayi laki-laki yang baru lahir.&nbsp;</p>\r\n\r\n<p>Seiring berjalannya waktu dan tumbuh dewasa, Nabi Ibrahim yang cerdas kemudian memahami bahwa berhala yang disembah warga setempat bukanlah Tuhan yang harus disembah. Singkat cerita,&nbsp;Nabi Ibrahim pun memutuskan untuk menghancurkan semua berhala yang ada di wilayah Namrud.</p>\r\n\r\n<p>Mengetahu berhala yang ada di negerinya dirusak, Raja Namrud geram dan memerintahkan para tentaranya untuk menghukum Nabi Ibrahim dengan cara dibakar hidup-hidup.</p>\r\n\r\n<p>Ketika Nabi Ibrahim dilempar ke dalam kobaran api, ia berkata,&nbsp;<em>&ldquo;Allah (Sendiri) sudah cukup bagi kami, dan, Dia adalah yang terbaik dalam segala urusan.&rdquo;</em>&nbsp;Setelah perkataannya, api yang berkobar itu padam&nbsp;dan Nabi Ibrahim pun berjalan keluar dari puing-puing pembakaran tanpa luka sedikit pun.</p>\r\n\r\n<p>Dari kisah singkat Nabi Ibrahim di atas, ini bisa menginspirasi anak untuk melawan rasa takut atas keyakinan yang ia miliki. Saat si Kecil merasa takut, Mama bisa mengajarkan padanya&nbsp;untuk mengatakan&nbsp;<em>HasbunAllah</em>&nbsp;seperti Ibrahim. Coba yuk, Ma!</p>\r\n', '3.jpg', '2021-01-28', 1),
	(4, ' Kisah Nabi Musa A.S dan Qorun', 'kisah-nabi-musa-as-dan-qorun', '<p>Pada zaman dahulu dimasa kenabian Musa A.S saat memimpin Bani Israil, ada seorang pengikutnya yang sangat taat beribadah bernama Qorun. Setiap harinya ia beribadah dan tidak mementingkan kehidupan duniawi.</p>\r\n\r\n<p>Meski disegani sebagai ulama karena ketaatannya akan ibadah, Qorun yang tak mementingkan dunai membuat kehidupan keluarganya pun jauh dari kata layak. Sang istri yang bernama Ilza pun sering mengeluhkan ingin kehidupan yang lebih layak.</p>\r\n\r\n<p>Singkat cerita, suatu hari datang dua orang lelaki utusan Raja Gholan memberinya hadiah berupa uang emas yang sangat banyak. Qorun menolaknya dan berdalih bahwa ia tak mengenal Raja Gholan dan tak membutuhkan bantuan.</p>\r\n\r\n<p>Utusan Raja Gholan kemudian berhasil membujuk istri Qorun untuk menerima hadiah tersebut. Betapa marahnya Qorun, namun ia tak tega melihat sang istri begitu bahagia. Akhirnya ia juga menerima hadiah yang diutus kedua lelaki tadi.</p>\r\n\r\n<p>Saat hidupnya mulai berlimpah harta, Qorun kemudian melupakan ibadah. Terlebih sang istri yang melarang ia untuk mengunjungi Nabi Musa dengan alasan mereka hidup susah ketika menjadi pengikutnya.</p>\r\n\r\n<p>Kemudian ini membuat Qorun tak pernah lagi beribadah dan semakin tenggeam dalam urusan duniawi.Sampai suatu ketika, seorang teman Qorun berkunjung dan mengingatkannya untuk bersedekat atas harta yang ia miliki sekarang.</p>\r\n\r\n<p>Dengan terpaksa, Qorun&nbsp;mendatangi Nabi Musa&nbsp;untuk bertanya seberapa banyak zakat yang harus ia keluarkan. Ternyata jumlah yang harus dibayarnya begitu besar, lalu timbullah prasangka buruknya terhadap Nabi Musa.</p>\r\n\r\n<p>Saat itu kemudian Qorun mulai menghasut saudagar lain untuk tidak membayar zakat, bahkan sampai tega memfitnah Nabi Musa. Melihat pengikutnya dahulu mulai berubah, Nabi Musa&nbsp;berdoa kepada Tuhan dan tak lama Tuhan mendatangkan azab untuk Qorun.</p>\r\n\r\n<p>Qorun meminta ampun, tapi semuanya sudah terlambat. Ia beserta hartanya pun habis ditelan bumi.</p>\r\n\r\n<p>Melalui cerita Nabi Musa dan Qorun di atas, Mama bisa mengajarkan pada anak untuk tidak lalai akan kenikmatan yang sudah diberikan Allah SWT. Jadilah umat Allah yang selalu bersyukur dan tak lupa bersedekah atas rezeki yang dimiliki.</p>\r\n\r\n<p>Tak masalah berapa besar jumlah yang anak keluarkan, yang terpenting didasarkan niat dan ketulusan. Sebab dalam setiap rezeki kita ada bagian untuk orang lain yang membutuhkan.</p>\r\n', '4.png', '2021-01-28', 1),
	(5, 'Kisah bayi yang ditolong oleh malaikat', 'kisah-bayi-yang-ditolong-oleh-malaikat', '<p>Pada suatu zaman di Bani Israil, terjadi bencana kelaparan yang berlangsung hingga bertahun lamanya. Hal ini kemudian membuat banyak orang menderita termasuk para bayi yang membutuhkan asupan gizi untuk tumbuh kembang mereka.</p>\r\n\r\n<p>Kemudian dikisahkan seorang perempuan yang memiliki sepotong roti yang hanya cukup untuk ia makan hari itu. Saat hendak memakan roti itu, datanglah seorang pengemis tua yang membuatnya tak tega dan tanpa pikir panjang memberikan roti tadi kepada pengemis tersebut.</p>\r\n\r\n<p>Kemudian perempuan tadi pergi ke hutan untuk mencari kayu bakar. Perempuan yang memiliki seorang bayi ini dengan terpaksa mengikutsertakan bayinya karena tak ada orang yang bisa ia mintai tolong untuk menjaga bayinya.</p>\r\n\r\n<p>Singkat cerita, sang anak&nbsp;dibaringkan di atas sebuah batu besar. Saat dirinya tengah mencari kayu bakar, ia tak menyadari ada seekor anjing hutan mendekat ke arah sang anak. Dengan gerakan cepat, anjing itu menyambar sang bayi dan membawanya lari.</p>\r\n\r\n<p>Ketika mengetahui bayinya dibawa lari, sang Mama berteriak meminta tolong sambil terus mengejar anjing hutan tersebut. Namun sayang, ia harus kehilangan jejak karena anjing itu berlari begitu cepat.&nbsp;</p>\r\n\r\n<p>Atas kebaikan hati sang Mama pada sesama, Allah SWT yang melihat langsung memerintahkan malaikat Jibril untuk menyelamatkan sang bayi.</p>\r\n\r\n<p>Kemudian malaikat Jibril dengan mudah mengambil bayi itu dari mulut anjing hutan dan diserahkan kembali kepada sang Mama.</p>\r\n\r\n<p>Dari dongeng singkat di atas, pelajaran yang bisa anak dapat adalah dengan saling membantu sesama, insya Allah kebaikan tersebut akan dibalas kebaikan oleh Allah SWT. Sebab kita sendiri juga tak tau kapan akan mengalami musibah dan membutuhkan pertolongan orang lain.</p>\r\n\r\n<p>Nah, itu dia kumpulan dongeng singkat bernuansa Islami yang bisa Mama dan Papa bacakan sebelum anak tidur. Selain dapat menenangkan hati si Kecil, cerita-cerita di atas juga bisa dijadikan pelajaran hidup baginya kelak.</p>\r\n\r\n<p>Semoga bermanfaat dan selamat membcakan dongeng untuk si Kecil ya, Ma, Pa!</p>\r\n', 'bc.png', '2021-01-28', 1),
	(7, 'abc', 'abc', '<p>acgrre</p>\r\n', 'hole10.png', '2022-07-28', 2),
	(8, 'Lailatul Qadr', 'lailatul-qadr', '<p>wqrer</p>\r\n', 'images3.jpg', '2022-07-28', 2);
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table simabarqah.channel
CREATE TABLE IF NOT EXISTS `channel` (
  `id_channel` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul_channel` varchar(100) NOT NULL,
  `link_channel` text NOT NULL,
  PRIMARY KEY (`id_channel`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.channel: ~4 rows (approximately)
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;
REPLACE INTO `channel` (`id_channel`, `id_user`, `judul_channel`, `link_channel`) VALUES
	(4, 1, 'Surah-surah pendek al quran', 'https://www.youtube.com/embed/UpYx7F14oxo'),
	(5, 1, 'BELAJAR BACA ALQURAN DARI NOL SAMPAI LANCAR', 'https://www.youtube.com/embed/rOatWL8w8Mg'),
	(6, 1, 'Huruf huruf yang sering salah saat orang membca al qur\'an', 'https://www.youtube.com/embed/fmjySxSK4Uo'),
	(7, 1, 'Fitnah Dajjall', 'https://www.youtube.com/embed/T0WoyaUEJVA');
/*!40000 ALTER TABLE `channel` ENABLE KEYS */;

-- Dumping structure for table simabarqah.galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(50) NOT NULL,
  `tgl_galeri` date NOT NULL,
  `foto_galeri` varchar(30) NOT NULL,
  `deskripsi_galeri` text NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.galeri: ~2 rows (approximately)
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
REPLACE INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `tgl_galeri`, `foto_galeri`, `deskripsi_galeri`) VALUES
	(2, 1, 'Malam Takbiran Bismillah', '2022-08-01', 'pngwing_com3.png', 'nad'),
	(3, 1, 'Isra Mi\'raj', '2022-08-10', 'pngwing_com2.png', 'nad');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;

-- Dumping structure for table simabarqah.imam
CREATE TABLE IF NOT EXISTS `imam` (
  `id_imam` int(11) NOT NULL AUTO_INCREMENT,
  `nama_imam` varchar(100) NOT NULL,
  PRIMARY KEY (`id_imam`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.imam: ~5 rows (approximately)
/*!40000 ALTER TABLE `imam` DISABLE KEYS */;
REPLACE INTO `imam` (`id_imam`, `nama_imam`) VALUES
	(1, 'Jaemin'),
	(2, 'Haechan'),
	(3, 'Mark'),
	(4, 'Imam Mark Lee'),
	(5, 'Imam Muhammad');
/*!40000 ALTER TABLE `imam` ENABLE KEYS */;

-- Dumping structure for table simabarqah.kas
CREATE TABLE IF NOT EXISTS `kas` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `uraian_kas` varchar(255) NOT NULL,
  `kas_masuk` int(11) NOT NULL,
  `kas_keluar` int(11) NOT NULL,
  `jenis_kas` enum('Masuk','Keluar') NOT NULL,
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.kas: ~4 rows (approximately)
/*!40000 ALTER TABLE `kas` DISABLE KEYS */;
REPLACE INTO `kas` (`id_kas`, `id_user`, `tgl_kas`, `uraian_kas`, `kas_masuk`, `kas_keluar`, `jenis_kas`) VALUES
	(2, 1, '2022-07-14', 'Pembuatan Tempat Wudhu', 0, 85000, 'Keluar'),
	(20, 1, '2022-08-10', 'Test Masuk', 150000, 0, 'Masuk'),
	(21, 1, '2022-08-10', 'Test Keluar', 0, 15000, 'Keluar'),
	(22, 4, '2022-08-13', 'Amal', 10000, 0, 'Masuk'),
	(23, 4, '2022-08-13', 'Jumat Berkah', 0, 20000, 'Keluar');
/*!40000 ALTER TABLE `kas` ENABLE KEYS */;

-- Dumping structure for table simabarqah.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `hari_kegiatan` varchar(7) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `jam_kegiatan` time NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.kegiatan: ~4 rows (approximately)
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
REPLACE INTO `kegiatan` (`id_kegiatan`, `id_user`, `nama_kegiatan`, `hari_kegiatan`, `tgl_kegiatan`, `jam_kegiatan`, `lokasi_kegiatan`, `deskripsi_kegiatan`) VALUES
	(0, 2, 'Maulid Nabi Muhammad SAW', 'Senin', '2022-08-08', '10:25:00', 'Masjid Al-Barqah', 'ncjndcnidjcsdljcs'),
	(4, 1, 'Festival', 'Jumat', '2022-07-15', '15:00:00', 'lapangan masjid', 'abchdh'),
	(7, 1, 'Festival b', 'Jumat', '2022-07-08', '09:00:00', 'Lapangan Masjid Al-Barqah', 'abchdh'),
	(8, 1, 'Buka Bersama Puasa', 'Sbtu', '2022-06-03', '17:36:00', 'Lapangan Masjid Al-Barqah', 'Buka bersama puasa ramadhan bersama anak yatim piatu dari Yayasan Unggul Sukses Jaya. Buka bersama ini akan dihadiri oleh pengurus masjid, masyarakat sekitar, anak yatim piatu, dan juga Ustad Maulana.');
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;

-- Dumping structure for table simabarqah.penceramah
CREATE TABLE IF NOT EXISTS `penceramah` (
  `id_penceramah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penceramah` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penceramah`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.penceramah: ~6 rows (approximately)
/*!40000 ALTER TABLE `penceramah` DISABLE KEYS */;
REPLACE INTO `penceramah` (`id_penceramah`, `nama_penceramah`) VALUES
	(1, 'Ustad Muhammad'),
	(3, 'Ustad Jaemin'),
	(4, 'Ustad Udinm'),
	(5, 'Ustad Sugeng'),
	(6, 'Ustad Jeno'),
	(7, 'Ustad Zayyann');
/*!40000 ALTER TABLE `penceramah` ENABLE KEYS */;

-- Dumping structure for table simabarqah.pengajian
CREATE TABLE IF NOT EXISTS `pengajian` (
  `id_pengajian` int(11) NOT NULL AUTO_INCREMENT,
  `id_penceramah` int(11) NOT NULL,
  `hari_pengajian` varchar(7) NOT NULL,
  `tgl_pengajian` date NOT NULL,
  `jam_pengajian` time NOT NULL,
  `tema_pengajian` text NOT NULL,
  PRIMARY KEY (`id_pengajian`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.pengajian: ~6 rows (approximately)
/*!40000 ALTER TABLE `pengajian` DISABLE KEYS */;
REPLACE INTO `pengajian` (`id_pengajian`, `id_penceramah`, `hari_pengajian`, `tgl_pengajian`, `jam_pengajian`, `tema_pengajian`) VALUES
	(0, 2, 'Senin', '2022-08-08', '15:50:00', 'bersama menuju surga'),
	(11, 3, 'Rabu', '2022-08-10', '10:00:00', 'Fitnah Dakjal'),
	(13, 1, 'Selasa', '2022-08-02', '19:00:00', 'Surga Firdaus dan Neraka Jahanam'),
	(14, 1, 'Senin', '2022-08-01', '15:30:00', 'Yajuj & Majuj'),
	(15, 4, 'Senin', '2022-08-01', '20:00:00', 'Hukum makan babi'),
	(16, 4, 'Rabu', '2022-08-17', '04:00:00', 'Anjaym');
/*!40000 ALTER TABLE `pengajian` ENABLE KEYS */;

-- Dumping structure for table simabarqah.pengurus
CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_pengurus` varchar(50) NOT NULL,
  `jabatan_pengurus` varchar(50) NOT NULL,
  `foto_pengurus` text NOT NULL,
  `no_urut` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.pengurus: ~5 rows (approximately)
/*!40000 ALTER TABLE `pengurus` DISABLE KEYS */;
REPLACE INTO `pengurus` (`id_pengurus`, `id_user`, `nama_pengurus`, `jabatan_pengurus`, `foto_pengurus`, `no_urut`) VALUES
	(5, 1, 'dika', 'Sekretaris', 'pngwing_com1.png', 3),
	(6, 1, 'Annisa', 'ketua', 'pngwing_com.png', 1),
	(7, 1, 'Udin', 'Wakil Ketua', 'pngwing_com4.png', 2),
	(9, 1, 'Ipeh', 'Wakil Sekertaris', 'pngwing_com5.png', 4),
	(13, 1, 'Sista', 'Anggota', 'pngwing_com8.png', 7);
/*!40000 ALTER TABLE `pengurus` ENABLE KEYS */;

-- Dumping structure for table simabarqah.salat
CREATE TABLE IF NOT EXISTS `salat` (
  `id_salat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_salat` date NOT NULL,
  `imsak` time NOT NULL,
  `subuh` time NOT NULL,
  `duha` time NOT NULL,
  `zuhur` time NOT NULL,
  `asar` time NOT NULL,
  `magrib` time NOT NULL,
  `isya` time NOT NULL,
  PRIMARY KEY (`id_salat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.salat: ~0 rows (approximately)
/*!40000 ALTER TABLE `salat` DISABLE KEYS */;
REPLACE INTO `salat` (`id_salat`, `id_user`, `tgl_salat`, `imsak`, `subuh`, `duha`, `zuhur`, `asar`, `magrib`, `isya`) VALUES
	(3, 1, '2022-08-04', '11:41:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00');
/*!40000 ALTER TABLE `salat` ENABLE KEYS */;

-- Dumping structure for table simabarqah.sapras
CREATE TABLE IF NOT EXISTS `sapras` (
  `id_sapras` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_sapras` varchar(50) NOT NULL,
  `deskripsi_sapras` text NOT NULL,
  `foto_sapras` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sapras`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table simabarqah.sapras: ~4 rows (approximately)
/*!40000 ALTER TABLE `sapras` DISABLE KEYS */;
REPLACE INTO `sapras` (`id_sapras`, `id_user`, `nama_sapras`, `deskripsi_sapras`, `foto_sapras`) VALUES
	(1, 2, 'Area Parkir', 'Tempat Pengajian', ''),
	(5, 1, 'Majelis', 'Tempat Pengajian tes', '1648179321674.png'),
	(6, 1, 'Test', 'Test', 'pngwing_com12.png'),
	(7, 1, 'Yuhu', 'TESTERR', 'pngwing_com10.png'),
	(8, 4, 'Majelis Test', 'TEST', 'pngwing_com13.png');
/*!40000 ALTER TABLE `sapras` ENABLE KEYS */;

-- Dumping structure for table simabarqah.soljum
CREATE TABLE IF NOT EXISTS `soljum` (
  `id_soljum` int(11) NOT NULL AUTO_INCREMENT,
  `id_imam` int(11) NOT NULL,
  `tgl_soljum` date NOT NULL,
  PRIMARY KEY (`id_soljum`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table simabarqah.soljum: ~3 rows (approximately)
/*!40000 ALTER TABLE `soljum` DISABLE KEYS */;
REPLACE INTO `soljum` (`id_soljum`, `id_imam`, `tgl_soljum`) VALUES
	(0, 2, '2022-08-05'),
	(5, 4, '2022-08-10'),
	(6, 1, '2022-08-03');
/*!40000 ALTER TABLE `soljum` ENABLE KEYS */;

-- Dumping structure for table simabarqah.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `nama_level` varchar(25) DEFAULT NULL,
  `foto_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table simabarqah.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `nama_level`, `foto_user`) VALUES
	(1, 'admin', 'admin', '123', 2, 'Admin', 'pngwing_com26.png'),
	(3, 'bendahara 1', 'bendahara', 'bendahara', 4, 'Bendahara', 'pngwing_com6.png'),
	(4, 'Super Admin', 'Super Admin', '123', 1, 'Super Admin', 'pngwing_com25.png'),
	(5, 'Sekertaris', 'sekertaris', '1234', 3, 'Sekertaris', 'pngwing_com8.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
