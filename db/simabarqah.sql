-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2022 pada 08.08
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simabarqah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `jdl_berita` varchar(255) DEFAULT NULL,
  `slug_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `gambar_berita` varchar(30) DEFAULT NULL,
  `tgl_berita` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `jdl_berita`, `slug_berita`, `isi_berita`, `gambar_berita`, `tgl_berita`, `id_user`) VALUES
(2, 'Kisah serigala yang beriman kepada Rasulullah', 'kisah-serigala-yang-beriman-kepada-rasulullah', '<p>Dikisahkan pada masa kenabian Muhammad SAW, pada suatu daerah hiduplah seorang pengembala kambing. Pengembala tersebut harus mengurus ratusan kambing dan domba. Setiap pagi, lelaki itu membawa seluruh hewan ternak yang diamanati kepadanya ke padang rumput dekat dengan oasis.</p>\r\n\r\n<p>Namun naas, suatu hari lelaki tersebut kecolongan karena seekor serigala berhasil menerkam seekor domba yang lepas dari kerumunan. Pengembala tersebut pun mengejar sang serigala dan menakut-nakutinya dengan ayunan tongkat.</p>\r\n\r\n<p>Domba yang menjadi buruan serigala bertubuh cukup&nbsp;gemuk, sehingga serigala alami&nbsp;kesulitan saat membawanya kabur. Sang gembala pun menarik paksa domba tersebut dari cengkeraman serigala.</p>\r\n\r\n<p><em>&quot;Wahai fulan, mengapa engkau begitu zalim? Allah telah menetapkan domba itu sebagai rezekiku untuk hari ini, mengapa engkau merebutnya dariku?&quot;</em>&nbsp;ujar serigala itu kemudian.</p>\r\n\r\n<p>Betapa terkejutnya pria ini ketika mendengar serigala itu bertutur kata layaknya manusia.&nbsp;<em>&quot;Kamu... Bisa berbicara?&quot;</em>&nbsp;kata sang pengembala&nbsp;takjub.</p>\r\n\r\n<p><em>&quot;Mengapa engkau melihatku terheran-heran? Harusnya engkau tahu, ada yang lebih mengherankan daripada seekor serigala bisa berbicara,&quot;&nbsp;</em>kata hewan itu.</p>\r\n\r\n<p><em>&quot;Apa itu?&quot;</em></p>\r\n\r\n<p><em>&quot;Di Madinah, ada seorang nabi dan rasul yang Allah utus untuk sekalian alam. Namun, banyak orang yang justru membangkang dan enggan beriman kepadanya. Nama nabi itu, Rasulullah Muhammad&nbsp;shalallahu &#39;alaihi wasallam,&quot;</em>&nbsp;papar serigala.</p>\r\n\r\n<p>Keesokan harinya, lelaki pengembala itu pergi ke Madinah untuk menjumpai langsung sosok yang diceritakan serigala kemarin. Perjalanan yang tidak mudah dia tempuh dengan penuh kesabaran dan sampailah ia di Madinah.</p>\r\n\r\n<p>Setelah bertanya kepada warga setempat, lelaki itu kemudian tiba di depan Masjid Nabawi. Singkat cerita, ia berkesempatan bertemu Nabi Muhammad SAW. Kepada beliau, ia pun menuturkan kisahnya hingga sampai di Madinah.</p>\r\n\r\n<p>Kemudian Rasulullah membenarkan kisah sang gembala bahwa ada&nbsp;seekor binatang yang terang-terangan menunjukkan rasa imannya kepada Allah dan Rasul-Nya. Lebih lanjut, hal itu ternyata termasuk tanda kian dekatnya hari akhir.</p>\r\n\r\n<p><em>&quot;Yang demikian itu adalah salah satu tanda kiamat,&quot;</em>&nbsp;sabda Muhammad SAW.</p>\r\n\r\n<p>Kisah ini termaktub dalam hadis riwayat dari Abu Hurairah dan Abu Sa&rsquo;id al-Khudri, serta Imam Ahmad. Pakar tafsir Ibnu Katsir menilai sanadnya sahih.&nbsp;</p>\r\n\r\n<p>Dari kisah ini, diharapkan anak dapat selalu beriman kepada Allah SWT untuk mempersiapkan hari akhir kelak.&nbsp;<em>Wallahualam.</em></p>\r\n', '2.jpg', '2021-01-28', 1),
(3, 'Kisah Nabi Ibrahim dan api', 'kisah-nabi-ibrahim-dan-api', '<p>Dilahirkan di tengah masyarakat jahiliah yang musyrik, Nabi Ibrahim sempat alami pengasingan ke hutan oleh orangtuanya. Hal ini lantaran di zaman itu,&nbsp;Raja Namrud (negeri tempat Ibrahim tinggal) mengeluarkan peraturan untuk membunuh setiap bayi laki-laki yang baru lahir.&nbsp;</p>\r\n\r\n<p>Seiring berjalannya waktu dan tumbuh dewasa, Nabi Ibrahim yang cerdas kemudian memahami bahwa berhala yang disembah warga setempat bukanlah Tuhan yang harus disembah. Singkat cerita,&nbsp;Nabi Ibrahim pun memutuskan untuk menghancurkan semua berhala yang ada di wilayah Namrud.</p>\r\n\r\n<p>Mengetahu berhala yang ada di negerinya dirusak, Raja Namrud geram dan memerintahkan para tentaranya untuk menghukum Nabi Ibrahim dengan cara dibakar hidup-hidup.</p>\r\n\r\n<p>Ketika Nabi Ibrahim dilempar ke dalam kobaran api, ia berkata,&nbsp;<em>&ldquo;Allah (Sendiri) sudah cukup bagi kami, dan, Dia adalah yang terbaik dalam segala urusan.&rdquo;</em>&nbsp;Setelah perkataannya, api yang berkobar itu padam&nbsp;dan Nabi Ibrahim pun berjalan keluar dari puing-puing pembakaran tanpa luka sedikit pun.</p>\r\n\r\n<p>Dari kisah singkat Nabi Ibrahim di atas, ini bisa menginspirasi anak untuk melawan rasa takut atas keyakinan yang ia miliki. Saat si Kecil merasa takut, Mama bisa mengajarkan padanya&nbsp;untuk mengatakan&nbsp;<em>HasbunAllah</em>&nbsp;seperti Ibrahim. Coba yuk, Ma!</p>\r\n', '3.jpg', '2021-01-28', 1),
(4, ' Kisah Nabi Musa A.S dan Qorun', 'kisah-nabi-musa-as-dan-qorun', '<p>Pada zaman dahulu dimasa kenabian Musa A.S saat memimpin Bani Israil, ada seorang pengikutnya yang sangat taat beribadah bernama Qorun. Setiap harinya ia beribadah dan tidak mementingkan kehidupan duniawi.</p>\r\n\r\n<p>Meski disegani sebagai ulama karena ketaatannya akan ibadah, Qorun yang tak mementingkan dunai membuat kehidupan keluarganya pun jauh dari kata layak. Sang istri yang bernama Ilza pun sering mengeluhkan ingin kehidupan yang lebih layak.</p>\r\n\r\n<p>Singkat cerita, suatu hari datang dua orang lelaki utusan Raja Gholan memberinya hadiah berupa uang emas yang sangat banyak. Qorun menolaknya dan berdalih bahwa ia tak mengenal Raja Gholan dan tak membutuhkan bantuan.</p>\r\n\r\n<p>Utusan Raja Gholan kemudian berhasil membujuk istri Qorun untuk menerima hadiah tersebut. Betapa marahnya Qorun, namun ia tak tega melihat sang istri begitu bahagia. Akhirnya ia juga menerima hadiah yang diutus kedua lelaki tadi.</p>\r\n\r\n<p>Saat hidupnya mulai berlimpah harta, Qorun kemudian melupakan ibadah. Terlebih sang istri yang melarang ia untuk mengunjungi Nabi Musa dengan alasan mereka hidup susah ketika menjadi pengikutnya.</p>\r\n\r\n<p>Kemudian ini membuat Qorun tak pernah lagi beribadah dan semakin tenggeam dalam urusan duniawi.Sampai suatu ketika, seorang teman Qorun berkunjung dan mengingatkannya untuk bersedekat atas harta yang ia miliki sekarang.</p>\r\n\r\n<p>Dengan terpaksa, Qorun&nbsp;mendatangi Nabi Musa&nbsp;untuk bertanya seberapa banyak zakat yang harus ia keluarkan. Ternyata jumlah yang harus dibayarnya begitu besar, lalu timbullah prasangka buruknya terhadap Nabi Musa.</p>\r\n\r\n<p>Saat itu kemudian Qorun mulai menghasut saudagar lain untuk tidak membayar zakat, bahkan sampai tega memfitnah Nabi Musa. Melihat pengikutnya dahulu mulai berubah, Nabi Musa&nbsp;berdoa kepada Tuhan dan tak lama Tuhan mendatangkan azab untuk Qorun.</p>\r\n\r\n<p>Qorun meminta ampun, tapi semuanya sudah terlambat. Ia beserta hartanya pun habis ditelan bumi.</p>\r\n\r\n<p>Melalui cerita Nabi Musa dan Qorun di atas, Mama bisa mengajarkan pada anak untuk tidak lalai akan kenikmatan yang sudah diberikan Allah SWT. Jadilah umat Allah yang selalu bersyukur dan tak lupa bersedekah atas rezeki yang dimiliki.</p>\r\n\r\n<p>Tak masalah berapa besar jumlah yang anak keluarkan, yang terpenting didasarkan niat dan ketulusan. Sebab dalam setiap rezeki kita ada bagian untuk orang lain yang membutuhkan.</p>\r\n', '4.png', '2021-01-28', 1),
(5, 'Kisah bayi yang ditolong oleh malaikat', 'kisah-bayi-yang-ditolong-oleh-malaikat', '<p>Pada suatu zaman di Bani Israil, terjadi bencana kelaparan yang berlangsung hingga bertahun lamanya. Hal ini kemudian membuat banyak orang menderita termasuk para bayi yang membutuhkan asupan gizi untuk tumbuh kembang mereka.</p>\r\n\r\n<p>Kemudian dikisahkan seorang perempuan yang memiliki sepotong roti yang hanya cukup untuk ia makan hari itu. Saat hendak memakan roti itu, datanglah seorang pengemis tua yang membuatnya tak tega dan tanpa pikir panjang memberikan roti tadi kepada pengemis tersebut.</p>\r\n\r\n<p>Kemudian perempuan tadi pergi ke hutan untuk mencari kayu bakar. Perempuan yang memiliki seorang bayi ini dengan terpaksa mengikutsertakan bayinya karena tak ada orang yang bisa ia mintai tolong untuk menjaga bayinya.</p>\r\n\r\n<p>Singkat cerita, sang anak&nbsp;dibaringkan di atas sebuah batu besar. Saat dirinya tengah mencari kayu bakar, ia tak menyadari ada seekor anjing hutan mendekat ke arah sang anak. Dengan gerakan cepat, anjing itu menyambar sang bayi dan membawanya lari.</p>\r\n\r\n<p>Ketika mengetahui bayinya dibawa lari, sang Mama berteriak meminta tolong sambil terus mengejar anjing hutan tersebut. Namun sayang, ia harus kehilangan jejak karena anjing itu berlari begitu cepat.&nbsp;</p>\r\n\r\n<p>Atas kebaikan hati sang Mama pada sesama, Allah SWT yang melihat langsung memerintahkan malaikat Jibril untuk menyelamatkan sang bayi.</p>\r\n\r\n<p>Kemudian malaikat Jibril dengan mudah mengambil bayi itu dari mulut anjing hutan dan diserahkan kembali kepada sang Mama.</p>\r\n\r\n<p>Dari dongeng singkat di atas, pelajaran yang bisa anak dapat adalah dengan saling membantu sesama, insya Allah kebaikan tersebut akan dibalas kebaikan oleh Allah SWT. Sebab kita sendiri juga tak tau kapan akan mengalami musibah dan membutuhkan pertolongan orang lain.</p>\r\n\r\n<p>Nah, itu dia kumpulan dongeng singkat bernuansa Islami yang bisa Mama dan Papa bacakan sebelum anak tidur. Selain dapat menenangkan hati si Kecil, cerita-cerita di atas juga bisa dijadikan pelajaran hidup baginya kelak.</p>\r\n\r\n<p>Semoga bermanfaat dan selamat membcakan dongeng untuk si Kecil ya, Ma, Pa!</p>\r\n', 'bc.png', '2021-01-28', 1),
(7, 'abc', 'abc', '<p>acgrre</p>\r\n', 'hole10.png', '2022-07-28', 2),
(8, 'Lailatul Qadr', 'lailatul-qadr', '<p>wqrer</p>\r\n', 'images3.jpg', '2022-07-28', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `channel`
--

CREATE TABLE `channel` (
  `id_channel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_channel` varchar(100) NOT NULL,
  `link_channel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `channel`
--

INSERT INTO `channel` (`id_channel`, `id_user`, `judul_channel`, `link_channel`) VALUES
(4, 1, 'Surah-surah pendek al quran', 'https://www.youtube.com/embed/UpYx7F14oxo'),
(5, 1, 'BELAJAR BACA ALQURAN DARI NOL SAMPAI LANCAR', 'https://www.youtube.com/embed/rOatWL8w8Mg'),
(6, 1, 'Huruf huruf yang sering salah saat orang membca al qur\'an', 'https://www.youtube.com/embed/fmjySxSK4Uo'),
(7, 1, 'Fitnah Dajjall', 'https://www.youtube.com/embed/T0WoyaUEJVA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(50) NOT NULL,
  `tgl_galeri` date NOT NULL,
  `foto_galeri` varchar(30) NOT NULL,
  `deskripsi_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `tgl_galeri`, `foto_galeri`, `deskripsi_galeri`) VALUES
(2, 2, 'Malam Takbiran Bismillah', '2022-08-01', 'hole5.png', 'nad'),
(3, 2, 'Isra Mi\'raj', '2022-08-10', 'hole9.png', 'nad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imam`
--

CREATE TABLE `imam` (
  `id_imam` int(11) NOT NULL,
  `nama_imam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imam`
--

INSERT INTO `imam` (`id_imam`, `nama_imam`) VALUES
(1, 'Jaemin'),
(2, 'Haechan'),
(3, 'Mark'),
(4, 'Imam Mark Lee'),
(5, 'Imam Muhammad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `uraian_kas` varchar(255) NOT NULL,
  `kas_masuk` int(11) NOT NULL,
  `kas_keluar` int(11) NOT NULL,
  `jenis_kas` enum('Masuk','Keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`id_kas`, `id_user`, `tgl_kas`, `uraian_kas`, `kas_masuk`, `kas_keluar`, `jenis_kas`) VALUES
(2, 1, '2022-07-14', 'Pembuatan Tempat Wudhu', 0, 85000, 'Masuk'),
(19, 2, '2022-08-02', 'Infaq Jumat', 25000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `hari_kegiatan` varchar(7) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `jam_kegiatan` time NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_user`, `nama_kegiatan`, `hari_kegiatan`, `tgl_kegiatan`, `jam_kegiatan`, `lokasi_kegiatan`, `deskripsi_kegiatan`) VALUES
(0, 2, 'Maulid Nabi Muhammad SAW', 'Senin', '2022-08-08', '10:25:00', 'Masjid Al-Barqah', 'ncjndcnidjcsdljcs'),
(4, 1, 'Festival', 'Jumat', '2022-07-15', '15:00:00', 'lapangan masjid', 'abchdh'),
(7, 1, 'Festival b', 'Jumat', '2022-07-08', '09:00:00', 'Lapangan Masjid Al-Barqah', 'abchdh'),
(8, 1, 'Buka Bersama Puasa', 'Sbtu', '2022-06-03', '17:36:00', 'Lapangan Masjid Al-Barqah', 'Buka bersama puasa ramadhan bersama anak yatim piatu dari Yayasan Unggul Sukses Jaya. Buka bersama ini akan dihadiri oleh pengurus masjid, masyarakat sekitar, anak yatim piatu, dan juga Ustad Maulana.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penceramah`
--

CREATE TABLE `penceramah` (
  `id_penceramah` int(11) NOT NULL,
  `nama_penceramah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penceramah`
--

INSERT INTO `penceramah` (`id_penceramah`, `nama_penceramah`) VALUES
(1, 'Ustad Muhammad'),
(3, 'Ustad Jaemin'),
(4, 'Ustad Udinm'),
(5, 'Ustad Sugeng'),
(6, 'Ustad Jeno'),
(7, 'Ustad Zayyann');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajian`
--

CREATE TABLE `pengajian` (
  `id_pengajian` int(11) NOT NULL,
  `id_penceramah` int(11) NOT NULL,
  `hari_pengajian` varchar(7) NOT NULL,
  `tgl_pengajian` date NOT NULL,
  `jam_pengajian` time NOT NULL,
  `tema_pengajian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajian`
--

INSERT INTO `pengajian` (`id_pengajian`, `id_penceramah`, `hari_pengajian`, `tgl_pengajian`, `jam_pengajian`, `tema_pengajian`) VALUES
(0, 2, 'Senin', '2022-08-08', '15:50:00', 'bersama menuju surga'),
(11, 3, 'Rabu', '2022-08-10', '10:00:00', 'Fitnah Dakjal'),
(13, 1, 'Selasa', '2022-08-02', '19:00:00', 'Surga Firdaus dan Neraka Jahanam'),
(14, 1, 'Senin', '2022-08-01', '15:30:00', 'Yajuj & Majuj'),
(15, 4, 'Senin', '2022-08-01', '20:00:00', 'Hukum makan babi'),
(16, 4, 'Rabu', '2022-08-17', '04:00:00', 'Anjaym');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pengurus` varchar(50) NOT NULL,
  `jabatan_pengurus` varchar(50) NOT NULL,
  `foto_pengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_user`, `nama_pengurus`, `jabatan_pengurus`, `foto_pengurus`) VALUES
(5, 2, 'dika', 'anggota', 'images25.jpg'),
(6, 2, 'Annisa', 'ketua', 'hole8.png'),
(7, 2, 'Annisa', 'anggota', 'images4.jpg'),
(8, 2, 'Annisa', 'anggota', 'hole7.png'),
(9, 2, 'Annisa', 'ketua', 'f0529384029a88f0ed451d674b9280b23.jpg'),
(10, 2, 'Annisa', 'anggota', 'f0529384029a88f0ed451d674b9280b21.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salat`
--

CREATE TABLE `salat` (
  `id_salat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_salat` date NOT NULL,
  `imsak` time NOT NULL,
  `subuh` time NOT NULL,
  `duha` time NOT NULL,
  `zuhur` time NOT NULL,
  `asar` time NOT NULL,
  `magrib` time NOT NULL,
  `isya` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `salat`
--

INSERT INTO `salat` (`id_salat`, `id_user`, `tgl_salat`, `imsak`, `subuh`, `duha`, `zuhur`, `asar`, `magrib`, `isya`) VALUES
(3, 1, '2022-08-04', '11:41:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00', '11:40:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sapras`
--

CREATE TABLE `sapras` (
  `id_sapras` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sapras` varchar(50) NOT NULL,
  `deskripsi_sapras` text NOT NULL,
  `foto_sapras` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sapras`
--

INSERT INTO `sapras` (`id_sapras`, `id_user`, `nama_sapras`, `deskripsi_sapras`, `foto_sapras`) VALUES
(1, 2, 'Area Parkir', 'Tempat Pengajian', ''),
(4, 2, 'Majelis', 'Tempat Pengajian', 'hole6.png'),
(5, 2, 'Majelis', 'Tempat Pengajian', 'images23.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soljum`
--

CREATE TABLE `soljum` (
  `id_soljum` int(11) NOT NULL,
  `id_imam` int(11) NOT NULL,
  `tgl_soljum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soljum`
--

INSERT INTO `soljum` (`id_soljum`, `id_imam`, `tgl_soljum`) VALUES
(0, 2, '2022-08-05'),
(5, 4, '2022-08-10'),
(6, 1, '2022-08-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `foto_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto_user`) VALUES
(1, 'admin', 'admin', 'admin', 1, ''),
(2, 'user', 'user', 'user', 2, ''),
(3, 'bendahara', 'bendahara', 'bendahara', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `imam`
--
ALTER TABLE `imam`
  ADD PRIMARY KEY (`id_imam`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `penceramah`
--
ALTER TABLE `penceramah`
  ADD PRIMARY KEY (`id_penceramah`);

--
-- Indeks untuk tabel `pengajian`
--
ALTER TABLE `pengajian`
  ADD PRIMARY KEY (`id_pengajian`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `salat`
--
ALTER TABLE `salat`
  ADD PRIMARY KEY (`id_salat`);

--
-- Indeks untuk tabel `sapras`
--
ALTER TABLE `sapras`
  ADD PRIMARY KEY (`id_sapras`);

--
-- Indeks untuk tabel `soljum`
--
ALTER TABLE `soljum`
  ADD PRIMARY KEY (`id_soljum`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `channel`
--
ALTER TABLE `channel`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `imam`
--
ALTER TABLE `imam`
  MODIFY `id_imam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penceramah`
--
ALTER TABLE `penceramah`
  MODIFY `id_penceramah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengajian`
--
ALTER TABLE `pengajian`
  MODIFY `id_pengajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `salat`
--
ALTER TABLE `salat`
  MODIFY `id_salat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sapras`
--
ALTER TABLE `sapras`
  MODIFY `id_sapras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `soljum`
--
ALTER TABLE `soljum`
  MODIFY `id_soljum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
