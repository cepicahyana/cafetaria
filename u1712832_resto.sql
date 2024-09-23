-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2024 at 09:36 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1712832_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `poto` varchar(250) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `level` int(11) DEFAULT 3,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `mode` int(11) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `sts_aktivasi` enum('enable','disable') DEFAULT 'enable',
  `device_id` varchar(100) NOT NULL,
  `device_sts` int(11) NOT NULL DEFAULT 0,
  `device_qr` int(11) DEFAULT NULL,
  `nama_cs` varchar(150) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `sts_akun` enum('aktif','nonaktif','','') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `poto`, `owner`, `level`, `telp`, `alamat`, `email`, `id_parent`, `tgl`, `ip`, `mode`, `last_login`, `nip`, `sts_aktivasi`, `device_id`, `device_sts`, `device_qr`, `nama_cs`, `jk`, `sts_akun`) VALUES
(2, 'super', 'd5f7c193793bebc46740f05aed1f4cb2', '2.gif', 'cepi cahyana', 1, '085221288211', 'Subang', 'cv@dffdfd.h', NULL, NULL, NULL, 1, NULL, '2147483647', 'enable', '', 0, NULL, NULL, NULL, NULL),
(20, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', '20200409055718___180557_620.jpg', 'admin', 3, '-', NULL, 'mail@gmail.com', NULL, '2016-07-01 13:38:40', NULL, 0, NULL, 'pandu.pandang', 'enable', '', 0, NULL, NULL, NULL, NULL),
(44, 'admin', '628156f2a54b69b35e7176a0e0b5861e', 'dp___08122022094231.png', 'Admin Cv', 3, '085221288210', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2s2s', 'enable', '', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auto_replay`
--

CREATE TABLE `auto_replay` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `keyword` text NOT NULL,
  `replay` text NOT NULL,
  `sts` int(11) NOT NULL DEFAULT 1 COMMENT '1=aktif 0=nonaktif',
  `id_device` varchar(25) DEFAULT NULL,
  `typo` int(11) DEFAULT 0 COMMENT '0=bebas 1=sama persis',
  `file` text DEFAULT NULL,
  `jenis_pesan` int(11) NOT NULL DEFAULT 1 COMMENT '1= teks 2=pesan bergambar 3=pesan berfile 4=tombol 5=list',
  `options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auto_replay`
--

INSERT INTO `auto_replay` (`id`, `id_user`, `keyword`, `replay`, `sts`, `id_device`, `typo`, `file`, `jenis_pesan`, `options`) VALUES
(1, '', 'Best seller', '{\"title\":\"Coffe & Space\",\"body\":\"Menu Best Sellet minggu ini :\\r\\n*Makanan*\\r\\n1. Banana nugget\\r\\n2. Burger hangout\\r\\n3. Cirsi crispi\\r\\n\\r\\n*Minumam*\\r\\n1. Milkshake\\r\\n2. Coffe gula aren\\r\\n3. Coffe sachet\",\"footer\":\"Coffe & Space\"}', 1, '6285794151894', 0, NULL, 4, '[{\"body\":\"Order\"},{\"body\":\"Menu Utama\"}]'),
(2, '', 'Foto Menu,Gambar menu', 'Untuk order silahkan ketik *Order* ', 1, '6285794151894', 0, 'auto___05032023125917.png', 2, NULL),
(3, '', 'Daftar menu,menu', '{\"title\":\"\\u2615\\ufe0f Coffee & Space\",\"body\":\"1. Onion Ring \\/ price *Rp 15.000*\\r\\n2. Pisang Goreng \\/ price *Rp 15.000*\\r\\n3. Roti Bakar \\/ price *Rp 15.000*\\r\\n4. Nasi Goreng \\/ price *Rp 25.000*\\r\\n5. Mie Goreng \\/ price *Rp 25.000*\",\"footer\":\"Coffe & Space\"}', 1, '6285794151894', 0, NULL, 4, '[{\"body\":\"\\ud83d\\uded2 Order\"},{\"body\":\"\\ud83c\\udf71 Gambar menu\"},{\"body\":\"\\ud83d\\udd18 Menu utama\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `auto_replay_listmenu`
--

CREATE TABLE `auto_replay_listmenu` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `keyword` text NOT NULL,
  `replay` text NOT NULL,
  `sts` int(11) NOT NULL DEFAULT 1 COMMENT '1=aktif 0=nonaktif',
  `id_device` int(11) NOT NULL,
  `typo` int(11) DEFAULT 0 COMMENT '0=bebas 1=sama persis',
  `file` text DEFAULT NULL,
  `jenis_pesan` int(11) NOT NULL DEFAULT 1 COMMENT '1= teks 2=pesan bergambar 3=pesan berfile 4=tombol 5=list',
  `options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auto_replay_listmenu`
--

INSERT INTO `auto_replay_listmenu` (`id`, `id_user`, `keyword`, `replay`, `sts`, `id_device`, `typo`, `file`, `jenis_pesan`, `options`) VALUES
(12, '', 'hallo,hai,halo,info,Kembali,hi,Menu utama,mygas', '{\"title\":\"Informasi Layanan Pelanggan\",\"body\":\"Halo, ini merupakan layanan whatsapp *myGas*\\r\\nUntuk informasi lainnya silahkan pilih opsi dibawah ini\",\"footer\":\"mygas.id\"}', 1, 0, 0, NULL, 5, '[{\"title\":\"List menu pilihan\",\"rows\":[{\"title\":\"Alamat Distributor\",\"description\":\"Layanan Pesan Antar\"},{\"title\":\"Aduan Pelanggan\"},{\"title\":\"Hubungi Kami\"},{\"title\":\"Seputar Pertanyaan\",\"description\":\"FAQ\"},{\"title\":\"Sosial Media\"}]}]'),
(14, '', 'Alamat distributor,alamat,distributor,Area lainnya', '{\"title\":\"Alamat distributor\",\"body\":\"Silahkan pilih distributor di area anda\",\"footer\":\"mygas.id\"}', 1, 0, 0, NULL, 5, '[{\"title\":\"List menu pilihan\",\"rows\":[{\"title\":\"Jabodetabek\"},{\"title\":\"Jawa Barat\"},{\"title\":\"Banten\"},{\"title\":\"Jawa Tengah\"}]}]'),
(26, '', 'tentang mygas, profile mygas', 'Berbekal pengalaman yang cukup lama  dibidang minyak  dan gas  maka PT. Bhakti Migas Utama telah memiliki relasi  dengan perusahaan dunia dari berbagai negara  sehingga LPG myGas yang kami niagakan diimpor dari Pasar Internasional.', 1, 0, 0, NULL, 1, NULL),
(27, '', 'akan terus ada,ketersediaan', 'Pasar LPG  Internasional  memiliki  ketersediaan  produk  yang  tidak  pernah  habis, karena  masing-masing negara  yang  memiliki produk LPG  akan  memasarkan  produksi untuk memenuhi kebutuhan LPG dari negara-negara yang  membutuhkan termasuk  Indonesia. Ini yang menjadi alasan bahwa LPG myGas akan selalu ada.', 1, 0, 0, NULL, 1, NULL),
(30, '', 'REGION JAKARTA UTARA,Jakarta utara', '{\"title\":\"REGION JAKARTA UTARA\",\"body\":\"*PT. Jujur Pangkal Cuan*\\r\\nHP. 0821 2288 0070\\r\\nKompleks Perkantoran Mitra Sunter Blok E1 No.7 Jl. Yos Sudarso Jakarta Utara 14350\",\"footer\":\"Regional Jakarta Utara\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu utama\"}]'),
(31, '', ' REGION JAKARTA SELATAN,Jakarta selatan', '{\"title\":\" REGION JAKARTA SELATAN\",\"body\":\"PT. ENERGI MAKMUR SELARAS INDONESIA\\r\\nHP. 0813-8605-9593 \\/ 0857-1660-5209 \\/ 0811-8222-929\\r\\nPondok Indah Plaza 2 Ruko BA 52 JL. Sekolah Duta V Pondok Indah, Jakarta Selatan 13210\\r\\n\\r\\nCV. DEBANG MITRA GAS\\r\\nHp.0812-2005-7386 \\/ 0812-2005-7285\\r\\nJL. Dr Sahardjo No. 100 D Jakarta Selatan\\r\\n\\r\\nPT. GARUDA ABADI SEMESTA\\r\\nHP. 0813-1519-0213\\r\\nJl. Terusan H. R. Rasuna Said No.70, RT.18\\/RW.2, Kuningan Bar., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12710\\r\\n\\r\\nPT. CITIGAS ENERGI INDONESIA\\r\\nHP. 082198787343 \\/ 083871545754 \\r\\nJl. Lenteng Agung Raya No. 37B, Jakarta Selatan\",\"footer\":\"Regional Jakarta Selatan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Kembali\"}]'),
(32, '', 'pesan antar,cara memesan,cara pesan,Pesan Antar,memesan,order', '{\"title\":\"Cara memesan myGas\",\"body\":\"Silahkan hubungi distributor terdekat lokasi anda\",\"footer\":\"pemesanan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Alamat Distributor\"}]'),
(33, '', 'Seputar Pertanyaan', '{\"title\":\"FAQ\",\"body\":\"Dibawah ini adalah pertanyaan yang mungkin anda butuhkan, jika pertanyaan anda tidak ada dibawah silahkan tanyakan secara bebas pesan ini\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 5, '[{\"title\":\"List menu pilihan\",\"rows\":[{\"title\":\"Darimana asal gas LPG myGas ?\"},{\"title\":\"Apakah LPG myGas akan terus ada ?\"},{\"title\":\"Apa bedanya LPG myGas dengan LPG merk lain ?\"},{\"title\":\"Apakah valve untuk LPG myGas berbeda ?\"},{\"title\":\"Bagaimana cara memesan LPG myGas ?\"},{\"title\":\"Berapa harga isi dan atau harga tabung myGas ?\"},{\"title\":\"Tindakan bila terjadi kebocoran tabung ?\"},{\"title\":\"Tindakan bila terjadi kebakaran ?\"},{\"title\":\"Dimana lokasi SPL myGas ?\"}]}]'),
(34, '', 'Darimana asal gas LPG myGas ?', '{\"title\":\"Darimana asal gas LPG myGas ?\",\"body\":\"Berbekal pengalaman yang cukup lama  dibidang minyak  dan gas  maka PT. Bhakti Migas Utama telah memiliki relasi  dengan perusahaan dunia dari berbagai negara  sehingga LPG myGas yang kami niagakan diimpor dari Pasar Internasional.\",\"footer\":\"mygas.id\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(35, '', 'Apakah LPG myGas akan terus ada ?', '{\"title\":\"Apakah LPG myGas akan terus ada ?\",\"body\":\"Pasar LPG  Internasional  memiliki  ketersediaan  produk  yang  tidak  pernah  habis, karena  masing-masing negara  yang  memiliki produk LPG  akan  memasarkan  produksi untuk memenuhi kebutuhan LPG dari negara-negara yang  membutuhkan termasuk  Indonesia. Ini yang menjadi alasan bahwa LPG myGas akan selalu ada.\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(36, '', 'Tanya yang lain ?', 'Apa yang anda tanyakan ?', 1, 0, 0, NULL, 1, NULL),
(37, '', 'Apa bedanya LPG myGas dengan LPG merk lain ?', '{\"title\":\"Apa bedanya LPG myGas dengan LPG merk lain ?\",\"body\":\"LPG myGas sebagai produk LPG yang diproses dari Industri maka kandungan LPG sudah bersih dari H2S,  kandungan air dan unsur-unsur lain yang menimbulkan kerak  dan karat  atau hal lain  yang merusak  peralatan yang  digunakan.  Sebelum   di kirim dari negara asal, maka dilakukan Uji Laboratorum LPG oleh lembaga yang berwenang. Dan untuk memastikan kualitas dari LPG tersebut, maka PT. Bhakti Mingas Utama melakukan kembali Uji Laboratorium melalui lembaga yang berwenang yaitu LEMIGAS sebelum di pasarkan.\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(38, '', 'Apakah valve untuk LPG myGas berbeda ?', '{\"title\":\"Apakah valve untuk LPG myGas berbeda ?\",\"body\":\"Valve pada tabung  LPG myGas  diproduksi berdasarkan  standar yang berlaku,  yaitu: SNI 1591-2008,  oleh karena  itu valve  pada tabung LPG myGas dapat terpasang dengan regulator yang ada, sehingga pelanggan dengan mudah dapat langsung  menggunakan  LPG myGas tanpa harus membeli regulator baru.\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(39, '', 'Bagaimana cara memesan LPG myGas ?', '{\"title\":\"Bagaimana cara memesan LPG myGas ?\",\"body\":\"myGas sudah tersebar di daerah  Jakarta dan  sekitarnya, dan  juga sudah tersedia di Solo, Semarang dan Yogyakarta.  Untuk pemesanan myGas silahkan hubungi Call Center kami, atau silahkan hubungi Distributor myGas terdekat.\",\"footer\":\"Seputar Pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Alamat Distributor\"},{\"body\":\"Tanya yang lain ?\"}]'),
(40, '', 'Berapa harga isi dan atau harga tabung myGas ?', '{\"title\":\"Berapa harga isi dan atau harga tabung myGas ?\",\"body\":\"Bisa menghubungi ke Distributor kami di masing-masing lokasi.\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Alamat Distributor\"},{\"body\":\"Tanya yang lain ?\"}]'),
(41, '', 'Tindakan bila terjadi kebakaran ?', '{\"title\":\"Tindakan bila terjadi kebakaran ?\",\"body\":\"1. Dapatkan alat pemadam api\\r\\n2. Beritahu siapa pun saat rumah terbakar\\r\\n3. Segera hubungi pemadam kebakaran\\r\\n4. Tinggalkan barang berharga jika tidak lagi memungkinkan diselamatkan\\r\\n5. Jatuhkan diri saat pakaian terbakar\\r\\n6. Tutupi hidungmu\\r\\n7. Tutup pintu\\r\\n8. Menjauh\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(42, '', 'Tindakan bila terjadi kebocoran tabung ?, kebocoran', '{\"title\":\"Tindakan bila terjadi kebocoran tabung  ?\",\"body\":\"1. Hindari Kontak Listrik dan Api.\\r\\n2. Beri Karet Seal Tambahan pada Tabung Gas.\\r\\n3. Menambahkan Lakban Pada Karet Seal Tabung Gas.\\r\\n4. Merendam Karet Seal di Dalam Air.\",\"footer\":\"Seputar pertanyaan\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Tanya yang lain ?\"}]'),
(44, '', 'JAKARTA PUSAT,REGION JAKARTA PUSAT', '{\"title\":\"REGION JAKARTA PUSAT\",\"body\":\"PT. SHELVINDO KURNIA CEMERLANG\\r\\nHP. 0817 1788 1007\\r\\nJl. Mangga dua Abdad No.5 Rt001 Rw012 Kel. Mangga Dua Kec. Sawah Besar, Jakarta Pusat\",\"footer\":\"Regional Jakarta Pusat\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu Utama\"}]'),
(45, '', 'Sosial Media', 'Kunjungi Sosial Media atau Website official kami\r\n\r\nInstagram:\r\nhttps://instagram.com/mygasindonesia\r\n\r\nWebsite:\r\nhttps://mygas.id', 1, 0, 0, NULL, 1, NULL),
(46, '', 'REGION JAKARTA BARAT,Jakarta barat', '{\"title\":\"REGION JAKARTA BARAT\",\"body\":\"PT. Citra Inovasi Promosi \\r\\nTlp. 0812-8898-8936\\r\\nJl. Tanjung Duren Barat IV No. 1\\r\\n\\r\\nCV. TIRTA LESTARI ALKALINDO\\r\\nHP. 0812-1351-3636\\r\\nJl. Mandala Selatan 1 No.8 Tomang - Jakarta Barat\",\"footer\":\"Regional Jakarta Barat\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu utama\"}]'),
(47, '', 'REGION JAKARTA TIMUR,Jakarta timur', '{\"title\":\"REGION JAKARTA TIMUR\",\"body\":\"PT. TOTAL ENERGI ASIA - CAKUNG\\r\\nHp : 08118783088 \\/ Tlp : 021 - 4605729\\r\\nAlamat : Jalan Cakung - Cilincing Raya KM 1,5  RT 07\\/RW 6, Kec. Cilincing, Jakarta Timur\\r\\n\\r\\nPT. TOTAL ENERGI ASIA - PULOMAS\\r\\nHp. 0811-9503-088 \\/ Tlp : 021 - 4605729\\r\\nKomplek Pertokoan Pulomas Blok VII No.2 Jl. Perintis Kemerdekaan, Pulogadung Jakarta Timur 13260\",\"footer\":\"Regional Jakarta Timur\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu Utama\"}]'),
(52, '', 'Jabodetabek', '{\"title\":\" \",\"body\":\"Data distributor wiliayah Jabodetabek\",\"footer\":\"Jabodetabek\"}', 1, 0, 0, NULL, 5, '[{\"title\":\"List menu pilihan\",\"rows\":[{\"title\":\"Jakarta Pusat\"},{\"title\":\"Jakarta Utara\"},{\"title\":\"Jakarta Timur \"},{\"title\":\"Jakarta Selatan\"},{\"title\":\"Jakarta Barat\"},{\"title\":\"Bogor\"},{\"title\":\"Depok\"},{\"title\":\"Tangerang\"},{\"title\":\"Bekasi\"}]}]'),
(53, '', 'Jawa barat', '{\"title\":\" \",\"body\":\"Data distributor wiliayah Jawa Barat\",\"footer\":\"Jawa Barat\"}', 1, 0, 0, NULL, 5, '[{\"title\":\"List menu pilihan\",\"rows\":[{\"title\":\"Bandung\"},{\"title\":\"Cimahi\"},{\"title\":\"Indramayu\"},{\"title\":\"Karawang\"},{\"title\":\"Cianjur\"},{\"title\":\"Garut\"}]}]'),
(54, '', 'Bandung', '{\"title\":\"Area Bandung\",\"body\":\"PT. TOTAL ENERGI ASIA\\r\\nHp : 0851 6156 6854\\r\\nAlamat : Kutawaringin Industrial Park Kav.15-16 Jln Sukawangi Kaler Jelegong, Kec. Kutawaringin - Bandung Barat 40911\\r\\n\\r\\nPT. ENERGI SUKSES NUSANTARA\\r\\nHP. 0821-1077-7238\\r\\nJl. (Cigugur) Rancamalang No. 99 RT 05\\/RW02 Desa Margaaasih Kec. Margaasih Kab. Bandung 40215\\r\\n\\r\\nPT. ANAGATA MAJU SUKSES\\r\\nHP. 0819-2031-188\\r\\nKomplek Kopo Mas Regency Blok B 27 Bandung\\r\\n\\r\\nPT. QUANTA SUPREME GLOBALINDO\\r\\nHP. 0877-3317-1357\\r\\nJl. Cikutra no 237. Bandung\\r\\n\\r\\nPT. PESONA SINAR SUTRA BIRU\\r\\nHP. 0812-2446-8397\\r\\nPuspa Regency Blok D Nomor 11 12 RT.003 009 Batujajar Timur Kab. Bandung Barat, Jawa Barat\",\"footer\":\"Bandung\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(55, '', 'Cianjur', '{\"title\":\" Distributor Area Cianjur\",\"body\":\"PT. SUMBER PELITA GAS\\r\\nHP. 0896-6902-7705\\r\\nJl. Perintis Kemerdekaan No. 18 - Cianjur Jawa Barat\",\"footer\":\"cianjur\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(56, '', 'indramayu', '{\"title\":\"Distributor Area Indramayu\",\"body\":\"PT. TOTAL ENERGI ASIA\\r\\nHp : 0811-8683-088\\r\\nAlamat : Ds. Sukahaji Kec. Patrol - Indramayu 45257\\r\\n\\r\\nCV. GIO PUTRA PRATAMA\\r\\nHP. 0852-9476-4668\\r\\nDusun Sukaasih RT. 004 RW. 003 Desa Bogor, Kecamatan Sukra, Kabupaten Indramayu Jawa Barat\\r\\n\\r\\nGUDANG RUMPUT LAUT\\r\\nHP. 0812-1881-1507\\r\\nJl. Pantai Song Desa Karangsong Rt002 Rw002 Indramayu Jawa Barat\\r\\n\\r\\nCV. RIZKI PUTRI PRATAMA\\r\\nHP. 0813-1234-5745\\r\\nJl. Raya Pantura Desa Eretan Kulon Kec. Kandanghaur Indramayu, Jawa Barat\",\"footer\":\"Indramayu\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(57, '', 'Karawang', '{\"title\":\"Distributor Area Karawang\",\"body\":\"PT. MITRA NARAYA PRATAMA\\r\\nHP. 0878-8031-4393\\r\\nJl. Akses Tol Karawang Timur, Sukamulya, Anggadita, Klari, Karawang - Jawa Barat\",\"footer\":\"karawang\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(58, '', 'bogor', '{\"title\":\"Distributor Area Bogor\",\"body\":\"PT. TOTAL ENERGI ASIA - Bogor\\r\\nHp : 0811 9773 088\\r\\nRuko Bangbarung Grande Blok B1 No 27 Jln Achmad Adnawijaya Tegal Gundil, Bogor Utara  Kota Bogor 16152\\r\\n\\r\\nPT. LOKUS HIDUP SEJAHTERA\\r\\nHP. 0811-1703-883\\r\\nJl. Raya Karanggan No.171 Gunung Putri, Bogor 16963\\r\\n\\r\\nPT. KREASI ENERGI PRATAMA\\r\\nHP. 081806505888\\r\\nPesona Telaga Cibinong, Jl. Kalimutu No. 25 Harapanjaya Cibinong Bogor Jawa Barat\",\"footer\":\"Bogor\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu Utama\"}]'),
(59, '', 'Cimahi', '{\"title\":\"Distributor Area Cimahi\",\"body\":\"PT. SAHLAN FORTUNA ENERGI\\r\\nHP. 081311658746 \\/ 081282481289\\r\\nJl. Baros No. 8 RT.05 \\/ RW. 03 Utama Leuwigajah Cimahi Selatan Cimahi - Jawa Barat\",\"footer\":\"Cimahi\"}', 1, 0, 1, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(60, '', 'Garut', '{\"title\":\"Distributor Area Garut\",\"body\":\"PT. SOLUSI AGRO ENERGI\\r\\nHP.  0811 2430 645\\r\\nGudang PT. Solusi Agro Energi Jl. Cipanas Baru (Samping Mesjid Al Madinah) Kel. Pananjung Kec. Tarogong Kaler Kabupaten Garut 44151\",\"footer\":\"Garut\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jawa Barat\"},{\"body\":\"Menu Utama\"}]'),
(61, '', 'Bekasi', '{\"title\":\"Distributor Area Bekasi\",\"body\":\"PT. TOTAL ENERGI ASIA - Harapan Indah Bekasi\\r\\nHp : 08118783088 \\/ Tlp : 021 - 4605729\\r\\nAlamat : Jalan Cakung - Cilincing Raya KM 1,5  RT 07\\/RW 6, Kec. Cilincing, Jakarta Timur\\r\\n\\r\\nPT. KURNIA NUSA KENCANA\\r\\nHP. 0813-8498-2891\\r\\nRuko Arana Blok IX.2\\/16 Setia Asih Taruma Jaya Harapan Indah Bekasi 17215\",\"footer\":\"Bekasi\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu Utama\"}]'),
(62, '', 'banten', '{\"title\":\"Distributor Area Banten\",\"body\":\"PT CIKANDE MIGAS UTAMA\\r\\nHP. 085861793279\\r\\nJalan Raya Jakarta - Serang Kel. Parigi, Kec. Cikande. Kab. Serang - Banten\\r\\n\\r\\nPT. NUCLEAR KARYA INDONESIA\\r\\nHP. 0817-779-478\\r\\nRuko Taman Krakatau Blok N15 No5\\r\\nBanten\",\"footer\":\"Banten\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Area Lainnya\"},{\"body\":\"Menu Utama\"}]'),
(63, '', 'Jawa Tengah', '{\"title\":\"Distributor Wilayah Jawa Tengah\",\"body\":\"CV. BEJO UTAMA\\r\\nHP. 0822-7733-8877\\r\\nKawasan Industri Candi K No. 1 Purwoyoso Ngaliyan Semarang\\r\\n\\r\\nPT. JAYA BERSAMA MYGAS\\r\\nHP. 0877-4224-6707\\r\\nDukuh Morisan, Kel. Cetan, Kec. Ceper, Kab Klaten.\\r\\nJawa Tengah\",\"footer\":\"Jawa Tengah\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Area Lainnya\"},{\"body\":\"Menu Utama\"}]'),
(64, '', 'Tangerang', '{\"title\":\"Distributor Area Tangerang\",\"body\":\"PT. TOTAL ENERGI ASIA\\r\\nHp : 08119513088 \\/ Tlp : 021 - 7563487\\r\\nAlamat : Kawasan Industri Taman Tekno Blok F2 Kav 15 - 17 BSD,Tangerang - Banten\\r\\n\\r\\nPT. BERDAYA ALAM MAKSIMA\\r\\nHP. 0812-9966-7593\\r\\nJl. Kadumangu No.88 Dangdang Cisauk Tangerang Banten\\r\\n\\r\\nPT. HOKKINDO TEKNIK INDUSTRIAL\\r\\nHP. 0821-1060-1623\\r\\nJl. Jabal Mina Raya Blok O3 No. 3 Kelapa Dua - Tangerang\",\"footer\":\"Tangerang\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"Jabodetabek\"},{\"body\":\"Menu Utama\"}]'),
(66, '', 'up', '{\"title\":\"up\",\"body\":\"up\",\"footer\":\"up\"}', 1, 0, 0, NULL, 4, '[{\"body\":\"yt\",\"url\":\"https:\\/\\/www.youtube.com\\/channel\\/UCeOGDMaqBXCo0xH2LXbUxag\"},{\"body\":\"cs\",\"number\":\"085221288210\"}]'),
(68, '', 'Dimana lokasi SPL myGas', '1. Cakung cilincing, Jakarta Timur\r\n2. BSD Tangerang Selatan\r\n3. Eretan Indramayu', 1, 0, 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cetak_ulang_antrian`
--

CREATE TABLE `cetak_ulang_antrian` (
  `id` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(100) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `sts` int(11) NOT NULL DEFAULT 1 COMMENT '1=show',
  `jenis` int(11) NOT NULL DEFAULT 1 COMMENT '1=makanan 2=minuman',
  `special` int(11) NOT NULL DEFAULT 0,
  `kategory` varchar(100) DEFAULT NULL,
  `no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `nama`, `harga`, `foto`, `sn`, `sts`, `jenis`, `special`, `kategory`, `no`) VALUES
(1, 'Nasi goreng kampung', 25000, '', '6285794151322', 1, 1, 1, NULL, NULL),
(2, 'Nasi goreng spesial', 25000, '', '6285794151322', 1, 1, 0, NULL, NULL),
(3, 'Nasi ayam penyet', 35000, '', '6285794151322', 0, 1, 0, NULL, NULL),
(4, 'Coffee capucino', 15000, '', '6285794151322', 1, 2, 1, NULL, NULL),
(5, 'Kopi caramel oreo', 25000, '', '6285794151322', 1, 2, 0, NULL, NULL),
(6, 'Mie ramen', 17000, '', '6285794151322', 0, 1, 0, NULL, NULL),
(7, 'Rice bowl chicken teriyaki', 17000, '', '6285794151322', 1, 1, 1, '', 3),
(8, 'Nasi lengko', 2000, '', '6285794151322', 1, 1, 1, NULL, NULL),
(10, 'Avocado ice coffee', 10000, '', '6285794151322', 1, 2, 1, NULL, NULL),
(11, 'CIKUA', 2000, '', '6285221288210', 1, 1, 0, NULL, NULL),
(13, 'Ice red velvet', 25000, '', '6285794151322', 1, 2, 1, 'coffee', NULL),
(14, 'Chicken katsu', 42000, '', '6285794151322', 1, 1, 0, 'menu utama', 2),
(15, 'Stick sausages', 25000, '', '6285794151322', 1, 1, 1, 'snack', 1),
(16, 'Cireng + Lemon tea', 20000, '', '6283165005718', 1, 1, 0, '1.MENU PAKET', 1),
(17, 'Bakpau mini + kopi hitam / sweet tea', 20000, '', '6283165005718', 1, 1, 0, '1.MENU PAKET', 2),
(18, 'Dimsum + Lemon tea', 25000, '', '6283165005718', 1, 1, 0, '1.MENU PAKET', 3),
(19, 'Pisang goreng crispy +Kopi hitam/sweet tea', 20000, '', '6283165005718', 1, 1, 0, '1.MENU PAKET', 4),
(20, 'Sosis, Kentang + Lemon tea', 25000, '', '6283165005718', 1, 1, 0, '1.MENU PAKET', 5),
(21, 'Sosis Bakar', 15000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 1),
(22, 'French fries', 15000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 2),
(23, 'Otak-otak singapura', 15000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 3),
(24, 'Bakso bakar + Otak otak bakar', 15000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 4),
(25, 'Kebab full beef', 25000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 5),
(26, 'Pempek palembang', 25000, '', '6283165005718', 1, 1, 0, '2.APPETIZER', 6),
(27, 'Posaget', 30000, '', '6283165005718', 1, 1, 1, '2.APPETIZER', 7),
(28, 'Sate taichan + nasi', 25000, '', '6283165005718', 1, 1, 1, '3.MAIN COURSE', 1),
(29, 'Rice chicken katsu sambal matah', 25000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 2),
(30, 'Nasi goreng katsu nuansa cinta', 25000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 3),
(31, 'Nasi goreng kampung', 25000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 4),
(32, 'Rice beef black paper sauce', 45000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 5),
(33, 'Stick shirloin', 45000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 6),
(34, 'Ayam bakar + nasi', 27000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 7),
(35, 'Ayam geprek + nasi', 25000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 8),
(36, 'Ayam penyet + nasi', 27000, '', '6283165005718', 1, 1, 0, '3.MAIN COURSE', 8),
(37, 'Spaghetti bolognese', 20000, '', '6283165005718', 1, 1, 1, '4.PASTA', 1),
(38, 'Spaghetti carbonara', 20000, '', '6283165005718', 1, 1, 0, '4.PASTA', 2),
(39, 'Mie goreng (telur/ayam suwir) + es teh manis', 20000, '', '6283165005718', 1, 1, 0, '4.PASTA', 3),
(40, 'Mie rebus nuansa (telur/bakso) + es teh manis', 20000, '', '6283165005718', 1, 1, 0, '4.PASTA', 4),
(41, 'Lychee tea', 15000, '', '6283165005718', 1, 2, 0, '1.TEA', 1),
(42, 'Thai tea', 17000, '', '6283165005718', 1, 2, 0, '1.TEA', 2),
(43, 'Kopi tubruk', 15000, '', '6283165005718', 1, 2, 0, '2.BASED ESPRESSO HOT', 1),
(44, 'Vietnam drip', 18000, '', '6283165005718', 1, 2, 0, '2.BASED ESPRESSO HOT', 2),
(45, 'v60', 23000, '', '6283165005718', 1, 2, 0, '2.BASED ESPRESSO HOT', 3),
(46, 'Japanese', 23000, '', '6283165005718', 1, 2, 0, '2.BASED ESPRESSO HOT', 4),
(47, 'Matcha boba', 20000, '', '6283165005718', 1, 2, 0, '3.BOBA BALL', 1),
(48, 'Vanilla boba', 20000, '', '6283165005718', 1, 2, 0, '3.BOBA BALL', 2),
(49, 'Chocolate boba', 20000, '', '6283165005718', 1, 2, 1, '3.BOBA BALL', 3),
(50, 'Tiramisu boba', 20000, '', '6283165005718', 1, 2, 0, '3.BOBA BALL', 4),
(51, 'Caramel boba', 20000, '', '6283165005718', 1, 2, 0, '3.BOBA BALL', 5),
(52, 'Mojito min boba', 20000, '', '6283165005718', 1, 2, 0, '3.BOBA BALL', 6),
(53, 'Kopi susu gula aren', 20000, '', '6283165005718', 1, 2, 0, '4.BASE ESPRESSO COOL', 1),
(54, 'Americano', 18000, '', '6283165005718', 1, 2, 0, '4.BASE ESPRESSO COOL', 2),
(55, 'Capucino', 20000, '', '6283165005718', 1, 2, 0, '4.BASE ESPRESSO COOL', 3),
(56, 'Coffee latte', 20000, '', '6283165005718', 1, 2, 0, '4.BASE ESPRESSO COOL', 4),
(57, 'Flat white coffee', 20000, '', '6283165005718', 1, 2, 0, '4.BASE ESPRESSO COOL', 5),
(58, 'Red velvet', 20000, '', '6283165005718', 1, 2, 1, '5.MILK SHAKE', 1),
(59, 'Taro', 20000, '', '6283165005718', 1, 2, 0, '5.MILK SHAKE', 2),
(60, 'Chocolatte', 20000, '', '6283165005718', 1, 2, 0, '5.MILK SHAKE', 3),
(61, 'Matcha', 20000, '', '6283165005718', 1, 2, 1, '5.MILK SHAKE', 4),
(62, 'Lemon tea', 17000, '', '6283165005718', 1, 2, 0, '1.TEA', 3),
(63, 'SATE MARANGGI', 1500, '', '6285163082099', 1, 2, 1, 'Makanan', 1),
(64, 'SOP IGA SINGLE', 15000, '', '6285163082099', 1, 1, 1, 'Soup', 2),
(65, 'SOP IGA FAMILY', 20000, '', '6285163082099', 1, 1, 1, 'Soup', 3),
(66, 'PAKET KENYANG', 14000, '', '6285163082099', 1, 1, 1, 'Makanan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_aduan`
--

CREATE TABLE `data_aduan` (
  `id` int(11) NOT NULL,
  `sender_number` varchar(50) NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `hits` int(11) NOT NULL DEFAULT 1,
  `nama` varchar(150) DEFAULT NULL,
  `jenis_usaha` varchar(150) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `outlet` varchar(250) DEFAULT NULL,
  `aduan` text DEFAULT NULL,
  `sts` int(11) DEFAULT 0 COMMENT '0=open 1=close 2=waiting',
  `penanganan` text DEFAULT NULL,
  `nomor_aduan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_aduan`
--

INSERT INTO `data_aduan` (`id`, `sender_number`, `_ctime`, `hits`, `nama`, `jenis_usaha`, `alamat`, `outlet`, `aduan`, `sts`, `penanganan`, `nomor_aduan`) VALUES
(2, '6287874204411@c.us', '2023-01-04 14:46:01', 0, 'Seputar Pertanyaan\nFAQ', 'Distributor gas', 'Siang . Kak SPBE my gas ada dimana saja ya?', 'Ibu nia', 'Saya mau jadi distributor', 2, '', '00034'),
(3, '6281388360999@c.us', '2023-01-23 16:32:35', 0, 'Rohady', 'User Apartemen', 'Centro City', 'Pengecer Mygas kasih tabung mygas nya jelek', 'Tabung gas mygas koq kotor, biasa bagus tdk sekotor ini', 0, NULL, '00035'),
(4, '62811911992@c.us', '2023-01-26 11:01:50', 0, 'Mygas', 'Batal', 'Jl panglima polim', 'Batal', 'mygas laporan', 1, '', '00036');

-- --------------------------------------------------------

--
-- Table structure for table `data_antrian`
--

CREATE TABLE `data_antrian` (
  `id` int(11) NOT NULL,
  `tgl` varchar(10) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `jenis_pembayaran` varchar(100) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `usia` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `sts` int(11) NOT NULL DEFAULT 1 COMMENT '1= belum di panggiil 2=sudah dipanggil',
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `poli` varchar(250) DEFAULT NULL,
  `dokter` varchar(250) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_antrian`
--

INSERT INTO `data_antrian` (`id`, `tgl`, `nama`, `hp`, `jenis_pembayaran`, `jk`, `usia`, `nik`, `alamat`, `no_antrian`, `sts`, `_ctime`, `poli`, `dokter`, `jam`) VALUES
(1, '2023-03-02', 'Dony', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', '23', '229282', 'Subanh', 1, 1, '2023-03-01 14:08:29', 'POLIKLINIK JANTUNG', 'dr. Joni Iskandar', '17:00 sd 21:00 WIB'),
(2, '2023-03-05', 'Sosy', '6285221288210', 'Asuransi (BPJS,dll)?', 'Perempuan', '32', '321722', 'Uyt', 1, 1, '2023-03-01 14:09:18', 'POLIKLINIK SARAF', 'dr. Joni Iskandar', '09:03 sd 11:02 WIB'),
(3, '2023-03-05', 'Minggu, 05/03/2023 - POLIKLINIK BEDAH ONKOLOGI\nPukul : 07:32 sd 08:33 WIB', '6285221288210', 'Minggu, 05/03/2023 - POLIKLINIK BEDAH ONKOLOGI\nPukul : 07:32 sd 08:33 WIB', 'Minggu, 05', 'Minggu, 05/03/2023 - POLIKLINIK BEDAH ONKOLOGI\nPukul : 07:32 sd 08:33 WIB', 'Minggu, 05/03/2023 - POLIKLINIK BEDAH ONKOLOGI\nPukul : 07:32 sd 08:33 WIB', 'Minggu, 05/03/2023 - POLIKLINIK BEDAH ONKOLOGI\nPukul : 07:32 sd 08:33 WIB', 1, 1, '2023-03-01 15:47:25', 'POLIKLINIK BEDAH ONKOLOGI', NULL, '07:32 sd 08:33 WIB'),
(4, '2023-03-04', 'Z', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', 'S', '372', 'Hs', 1, 1, '2023-03-01 15:48:28', 'POLIKLINIK PENYAKIT DALAM', 'dr. Kevin Julio', '09:04 sd 10:05 WIB'),
(5, '2023-03-01', 'Cc', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', '23', '382', 'Sbg', 1, 1, '2023-03-01 15:49:34', 'dr. Rani Nurani', 'dr. Rani Nurani', '07:21 sd 08:21 WIB'),
(6, '2023-03-01', 'Cepi', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', '23', '33', 'Sd', 1, 1, '2023-03-01 15:52:27', 'POLIKLINIK OBGYN (OBSTETRI & GINEKOLOGI)', 'dr. Rani Nurani', '07:21 sd 08:21 WIB'),
(7, '2023-03-05', 'cv', '6285221288210', 'Asuransi (BPJS,dll)', 'Laki-laki', '32', '2323232', 'sv', 1, 1, '2023-03-03 13:25:25', 'POLIKLINIK BEDAH ONKOLOGI', 'dr. Kevin Julio', '07:32 sd 08:33 WIB'),
(8, '2023-03-08', 'bn', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', 'bn', '9', 'j', 1, 1, '2023-03-03 16:44:31', 'POLIKLINIK OBGYN (OBSTETRI & GINEKOLOGI)', 'dr. Rani Nurani', '07:21 sd 08:21 WIB'),
(9, '2023-03-09', 'Nasdi', '6285221288210', 'Asuransi (BPJS,dll)', 'Laki-laki', '40 Tahun', '321394994444', 'Bandung', 1, 1, '2023-03-03 16:51:57', 'POLIKLINIK JANTUNG', 'dr. Joni Iskandar', '17:00 sd 21:00 WIB'),
(10, '2023-03-06', 'Evan', '6285221288210', 'Pembayaran pribadi (Umum)', 'Laki-laki', '33', '77', 'Shs', 1, 1, '2023-03-05 09:13:58', 'POLIKLINIK ANAK DAN TUMBUH KEMBANG', 'dr. Joni Iskandar', '13:00 sd 14:31 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `data_bed`
--

CREATE TABLE `data_bed` (
  `id` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jml_bed` int(11) NOT NULL,
  `bed_kosong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_bed`
--

INSERT INTO `data_bed` (`id`, `id_ruangan`, `jml_bed`, `bed_kosong`) VALUES
(1, 1, 2, 1),
(2, 2, 3, 1),
(3, 3, 5, 2),
(4, 4, 2, 1),
(5, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_broadcast`
--

CREATE TABLE `data_broadcast` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `fotografer` varchar(255) NOT NULL,
  `artikel` longtext DEFAULT NULL,
  `options` text DEFAULT NULL,
  `kirim_group` text DEFAULT NULL,
  `kirim_kontak` text DEFAULT NULL,
  `kirim_nomor` text DEFAULT NULL,
  `tgl_broadcast` datetime DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=teks 2=button 3=list'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_broadcast`
--

INSERT INTO `data_broadcast` (`id`, `id_kategori`, `judul_berita`, `tanggal`, `fotografer`, `artikel`, `options`, `kirim_group`, `kirim_kontak`, `kirim_nomor`, `tgl_broadcast`, `type`) VALUES
(9, NULL, 'pesan baru', '2023-01-10', '', 'tes pesan', NULL, NULL, NULL, '085794151322', '2023-03-20 13:04:47', 1),
(10, NULL, 'pesan baru', '2023-05-24', '', 'tes', NULL, NULL, NULL, '085221288210', '2023-05-24 17:04:14', 1),
(11, NULL, 'pesan baru', '2023-07-13', '', 'tes', NULL, NULL, NULL, '085221288210', '2023-07-13 18:55:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `spesialis` varchar(250) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id`, `nama`, `spesialis`, `jk`) VALUES
(1, 'dr. Rian Irawan', 'Dokter Umum', NULL),
(2, 'dr. Rani Nurani', 'Sepsialis anak', NULL),
(3, 'dr. Joni Iskandar', 'Spesialis Jantung', NULL),
(4, 'dr. Kevin Julio', 'Spesialis Penyakit Dalam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_group`
--

CREATE TABLE `data_group` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `kode` varchar(200) NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT 0 COMMENT '0=group wa 1=group kontak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal_poliklinik`
--

CREATE TABLE `data_jadwal_poliklinik` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_mulai` varchar(9) NOT NULL,
  `jam_akhir` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_jadwal_poliklinik`
--

INSERT INTO `data_jadwal_poliklinik` (`id`, `id_poli`, `id_dokter`, `id_hari`, `jam_mulai`, `jam_akhir`) VALUES
(1, 1, 1, 1, '08:00:00', '12:00:00'),
(2, 1, 2, 2, '12:00:00', '15:01'),
(3, 1, 3, 1, '13:00:00', '14:31'),
(4, 2, 2, 3, '07:21', '08:21'),
(5, 8, 3, 4, '17:00', '21:00'),
(6, 7, 3, 7, '09:03', '11:02'),
(7, 6, 4, 5, '07:17', '08:02'),
(8, 3, 2, 6, '06:04', '08:03'),
(10, 4, 3, 4, '06:32', '07:33'),
(11, 4, 4, 4, '06:31', '07:31'),
(12, 5, 3, 5, '06:38', '06:42'),
(13, 5, 3, 3, '09:34', '10:34'),
(15, 5, 4, 7, '07:32', '08:33'),
(16, 3, 4, 6, '09:04', '10:05'),
(17, 4, 3, 6, '10:10', '11:11'),
(18, 1, 3, 6, '12:23', '13:23');

-- --------------------------------------------------------

--
-- Table structure for table `data_kontak`
--

CREATE TABLE `data_kontak` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `jabatan` varchar(300) DEFAULT NULL,
  `instansi` varchar(300) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `last` datetime DEFAULT NULL COMMENT 'last time send'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_media`
--

CREATE TABLE `data_media` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(250) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `path_thumbnail` varchar(100) NOT NULL,
  `jenis_media` varchar(10) NOT NULL DEFAULT 'image',
  `_ctime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_media`
--

INSERT INTO `data_media` (`id`, `nama_file`, `size`, `id_artikel`, `path`, `path_thumbnail`, `jenis_media`, `_ctime`) VALUES
(16, '___05092022135057.pdf', 154236, 47, '47/___05092022135057.pdf', '47/thumbnail/___05092022135057.pdf', 'file', '2022-09-05 13:50:57'),
(18, '___05092022140434.xlsx', 316183, 47, '47/___05092022140434.xlsx', '47/thumbnail/___05092022140434.xlsx', 'file', '2022-09-05 14:04:34'),
(19, '___05092022143805.xlsx', 13960, 50, '50/___05092022143805.xlsx', '50/thumbnail/___05092022143805.xlsx', 'file', '2022-09-05 14:38:05'),
(20, '___14092022125605.png', 520366, 24, '24/___14092022125605.png', '24/thumbnail/___14092022125605.png', 'image', '2022-09-14 12:56:05'),
(21, '___14092022125610.png', 1051812, 24, '24/___14092022125610.png', '24/thumbnail/___14092022125610.png', 'image', '2022-09-14 12:56:10'),
(22, '___14092022125611.png', 1263073, 24, '24/___14092022125611.png', '24/thumbnail/___14092022125611.png', 'image', '2022-09-14 12:56:11'),
(23, '___14092022125622.png', 3992309, 24, '24/___14092022125622.png', '24/thumbnail/___14092022125622.png', 'image', '2022-09-14 12:56:24'),
(24, '___14092022125624.png', 4096008, 24, '24/___14092022125624.png', '24/thumbnail/___14092022125624.png', 'image', '2022-09-14 12:56:25'),
(25, '___07122022104509.jpeg', 387499, 37, '37/___07122022104509.jpeg', '37/thumbnail/___07122022104509.jpeg', 'image', '2022-12-07 10:45:09'),
(28, '___20032023130418.jpeg', 301168, 9, '9/___20032023130418.jpeg', '9/thumbnail/___20032023130418.jpeg', 'image', '2023-03-20 13:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

CREATE TABLE `data_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `id_negara` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `id_kab` int(11) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL DEFAULT 1,
  `device_sender` varchar(20) NOT NULL,
  `id_usaha` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `device_sts` int(11) NOT NULL DEFAULT 0,
  `device_qr` int(11) DEFAULT NULL,
  `device_from` int(11) DEFAULT NULL COMMENT '1=pribadi 2=developer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_member`
--

INSERT INTO `data_member` (`id`, `nama`, `id_negara`, `id_prov`, `id_kab`, `email`, `hp`, `_ctime`, `sts`, `device_sender`, `id_usaha`, `id_paket`, `tgl_jatuh_tempo`, `username`, `password`, `device_id`, `device_sts`, `device_qr`, `device_from`) VALUES
(1, 'cepi', 1, 1, 1, '', '', '2021-10-16 09:18:57', 1, '', NULL, NULL, NULL, 'cepi', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, NULL, 1),
(2, 'Pak Erzon', NULL, NULL, NULL, '', '', '2021-10-27 14:58:02', 1, '', NULL, NULL, NULL, 'gsv', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_order`
--

CREATE TABLE `data_order` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `sender_name` varchar(250) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL,
  `order` text NOT NULL,
  `no_meja` varchar(100) DEFAULT NULL,
  `sts` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum diproses 1=lengkap  2=sesuai 3=done',
  `to` varchar(50) DEFAULT NULL,
  `deliv` datetime DEFAULT NULL,
  `fix_order_time` datetime DEFAULT NULL,
  `del` int(11) NOT NULL DEFAULT 0 COMMENT '1=hapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_outlet`
--

CREATE TABLE `data_outlet` (
  `id` int(11) NOT NULL,
  `regional` varchar(100) NOT NULL,
  `nama_outlet` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_paket`
--

CREATE TABLE `data_paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga_perbulan` varchar(30) NOT NULL,
  `harga_paket` varchar(30) NOT NULL,
  `tagihan` varchar(30) NOT NULL,
  `alias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_paket`
--

INSERT INTO `data_paket` (`id`, `nama_paket`, `harga_perbulan`, `harga_paket`, `tagihan`, `alias`) VALUES
(1, 'package-1', '', '', '', 'Paket1 - unlimited - 100k/bln'),
(2, 'package-2', '', '', '', 'Paket2 - unlimited - 150k/bln'),
(3, 'package-3', '', '', '', 'Paket3 - unlimited - 200k/bln');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `upd` datetime DEFAULT current_timestamp(),
  `to` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id`, `nama`, `hp`, `upd`, `to`) VALUES
(9, 'RestoBot', '6285794151894', '2023-05-29 18:48:17', '6285794151322'),
(31, 'Ike', '6282113978123', '2023-05-30 20:55:44', '6285794151322'),
(47, '622150980366', '622150980366', '2023-06-01 10:27:00', '6285794151322'),
(83, 'Mink', '6281276130432', '2023-06-04 14:40:33', '6285794151322'),
(93, 'PAPAHMUDA MANAGEMENT', '6285157559328', '2023-06-05 15:51:32', '6285163082099'),
(107, NULL, '6289514104072', '2023-06-09 23:06:41', '6285794151322'),
(110, 'Dori', '6285724901097', '2023-06-11 20:12:48', '6283165005718'),
(119, 'PAPAH MUDA ENTERTAINMENT', '6285157559328', '2023-06-25 11:04:39', '6285163082099'),
(144, 'Cepi.c', '6285221288210', '2023-06-28 07:18:51', '6285794151322'),
(160, 'Nunung- Kuliah karywan Univ Subang', '6285100795384', '2023-06-29 20:29:56', '6283165005718'),
(163, 'DickySP', '6283803341564', '2023-06-30 10:32:56', '6283165005718'),
(164, '.', '6281211813160', '2023-06-30 17:24:09', '6283165005718'),
(170, 'Prosa Cs', '6281395969437', '2023-07-06 06:21:14', '6285794151322'),
(171, 'rifky irawan', '6287762679524', '2023-07-12 11:31:01', '6285794151322'),
(173, 'Moch Irwin Anugrah', '6281806746201', '2023-07-12 11:53:37', '6285794151322'),
(174, 'PAPAH MUDA ENTERTAINMENT', '6285157559328', '2023-07-12 18:41:37', '6285163082099'),
(175, 'PAPAH MUDA ENTERTAINMENT', '6285157559328', '2023-07-12 18:43:48', '6285163082099'),
(176, 'PAPAH MUDA ENTERTAINMENT', '6285157559328', '2023-07-12 18:47:51', '6285163082099'),
(177, 'yam', '6285156524056', '2023-07-14 15:05:34', '6283165005718'),
(179, NULL, '6287749959808', '2023-07-19 14:18:43', '6283165005718'),
(180, NULL, '', '2023-07-27 07:49:49', '6285794151322'),
(181, '6288991762339', '6288991762339', '2023-07-28 08:30:53', '6285794151322'),
(182, NULL, '12014935311', '2023-07-28 08:30:54', '6285794151322'),
(183, NULL, '6288991762339', '2023-07-28 08:30:54', '6285794151322'),
(184, '12014935311', '12014935311', '2023-07-28 08:30:55', '6285794151322');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan2`
--

CREATE TABLE `data_pelanggan2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `upd` datetime DEFAULT current_timestamp(),
  `to` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_pelanggan2`
--

INSERT INTO `data_pelanggan2` (`id`, `nama`, `hp`, `upd`, `to`) VALUES
(52, '? R.E.Y', '6283101466888', '2023-04-30 22:36:12', '6285794151322'),
(68, 'Amin', '6285172476577', '2023-05-02 07:52:58', '6285794151322'),
(70, 'Rengga Tiar. N', '6281385820456', '2023-05-02 12:06:08', '6285794151322'),
(86, 'Oke Mubarokah Official', '6281558265837', '2023-05-03 16:13:27', '6285794151322'),
(102, 'RestoBot', '6285794151894', '2023-05-04 23:29:00', '6285794151322'),
(106, 'YOYOK', '6285739783837', '2023-05-05 08:30:23', '6285794151322'),
(109, 'Riski Putri Utari', '6282295932687', '2023-05-05 12:58:16', '6285794151322'),
(114, 'Muhammad Ali', '6285271939490', '2023-05-05 20:21:07', '6285794151322'),
(118, 'Raden Reigy Nawanori', '6281275037773', '2023-05-05 21:34:05', '6285794151322'),
(122, 'Dheazizah?', '6289602402435', '2023-05-06 07:41:38', '6285794151322'),
(125, 'vinywidian', '6285717946962', '2023-05-07 21:57:08', '6285794151322'),
(132, 'Aditya Almughni', '628116669647', '2023-05-09 16:58:55', '6285794151322'),
(133, '6287874831099', '6287874831099', '2023-05-09 16:59:04', '6285794151322'),
(157, NULL, '', '2023-05-24 17:33:12', '6285794151322'),
(179, 'akelhasanudin', '6281224886218', '2023-05-27 12:45:10', '6285794151322'),
(180, 'Zaiheryf', '6285220969224', '2023-05-27 12:49:29', '6285794151322'),
(182, 'Indra Dena Putra', '6281224907400', '2023-05-27 18:37:19', '6285794151322'),
(185, 'Ike', '6282113978123', '2023-05-27 20:10:54', '6285794151322'),
(189, 'Ike', '6282113978123', '2023-05-27 22:17:13', '6285794151322'),
(229, 'Cepi cahyana', '6285221288210', '2023-05-28 08:20:27', '6285794151322'),
(230, 'Cepi cahyana', '6285221288210', '2023-05-28 09:38:39', '6283165005718'),
(231, 'Cepi cahyana', '6285221288210', '2023-05-28 09:38:48', '6283165005718'),
(232, 'Cepi cahyana', '6285221288210', '2023-05-28 09:39:51', '6283165005718'),
(233, 'Cepi cahyana', '6285221288210', '2023-05-28 09:42:19', '6283165005718'),
(234, 'Cepi cahyana', '6285221288210', '2023-05-28 09:43:16', '6283165005718'),
(235, 'Cepi cahyana', '6285221288210', '2023-05-28 09:44:39', '6283165005718'),
(236, 'Cepi cahyana', '6285221288210', '2023-05-28 09:44:49', '6283165005718'),
(237, 'Cepi cahyana', '6285221288210', '2023-05-28 09:51:39', '6283165005718'),
(238, 'Cepi cahyana', '6285221288210', '2023-05-28 09:51:53', '6283165005718'),
(239, 'Cepi cahyana', '6285221288210', '2023-05-28 09:52:50', '6283165005718'),
(240, 'Cepi cahyana', '6285221288210', '2023-05-28 09:53:12', '6283165005718'),
(241, 'Cepi cahyana', '6285221288210', '2023-05-28 10:21:25', '6285794151322'),
(242, 'Cepi cahyana', '6285221288210', '2023-05-28 10:21:54', '6285794151322'),
(243, 'Cepi cahyana', '6285221288210', '2023-05-28 10:22:10', '6285794151322'),
(244, 'Cepi cahyana', '6285221288210', '2023-05-28 10:22:47', '6285794151322'),
(245, 'Cepi cahyana', '6285221288210', '2023-05-28 10:23:32', '6283165005718'),
(246, 'Cepi cahyana', '6285221288210', '2023-05-28 10:24:56', '6283165005718'),
(247, 'Cepi cahyana', '6285221288210', '2023-05-28 11:08:04', '6283165005718'),
(248, 'Cepi cahyana', '6285221288210', '2023-05-28 12:03:24', '6283165005718'),
(249, 'Ike', '6282113978123', '2023-05-28 13:17:35', '6285794151322'),
(250, 'Cepi cahyana', '6285221288210', '2023-05-28 13:36:38', '6283165005718'),
(251, 'Cepi cahyana', '6285221288210', '2023-05-28 13:41:35', '6283165005718'),
(252, 'Cepi cahyana', '6285221288210', '2023-05-28 13:43:19', '6283165005718'),
(253, 'Cepi cahyana', '6285221288210', '2023-05-28 14:08:19', '6283165005718'),
(254, 'Cepi cahyana', '6285221288210', '2023-05-28 14:24:21', '6283165005718'),
(255, 'Cepi cahyana', '6285221288210', '2023-05-28 15:14:56', '6283165005718'),
(256, 'Cepi cahyana', '6285221288210', '2023-05-28 16:09:53', '6285794151322'),
(257, 'Cepi cahyana', '6285221288210', '2023-05-28 16:10:04', '6283165005718'),
(258, 'Ruhyat', '6281299245525', '2023-05-28 16:16:05', '6283165005718'),
(259, 'Cepi cahyana', '6285221288210', '2023-05-28 18:55:31', '6283165005718'),
(260, 'Cepi cahyana', '6285221288210', '2023-05-28 19:25:10', '6283165005718'),
(261, 'Cepi cahyana', '6285221288210', '2023-05-28 19:43:49', '6283165005718'),
(262, 'Cepi cahyana', '6285221288210', '2023-05-28 19:44:31', '6283165005718'),
(263, 'Cepi cahyana', '6285221288210', '2023-05-28 19:45:54', '6283165005718'),
(264, 'Cepi cahyana', '6285221288210', '2023-05-28 19:49:48', '6283165005718'),
(265, 'Cepi cahyana', '6285221288210', '2023-05-28 20:01:11', '6283165005718'),
(266, 'Indra Dena Putra', '6281224907400', '2023-05-28 20:03:18', '6283165005718'),
(267, '13', '6285793967051', '2023-05-28 20:03:39', '6283165005718'),
(268, 'Ike', '6282113978123', '2023-05-28 20:08:37', '6285794151322'),
(269, 'Ike', '6282113978123', '2023-05-28 20:25:29', '6285794151322'),
(270, 'Cepi cahyana', '6285221288210', '2023-05-29 12:02:35', '6285794151322'),
(271, 'Cepi cahyana', '6285221288210', '2023-05-29 12:09:42', '6285794151322'),
(272, 'Zaiheryf', '6285220969224', '2023-05-29 12:11:51', '6283165005718'),
(273, 'Zaiheryf', '6285220969224', '2023-05-29 12:20:21', '6283165005718'),
(274, 'Cepi cahyana', '6285221288210', '2023-05-29 12:43:31', '6285794151322'),
(275, 'Cepi cahyana', '6285221288210', '2023-05-29 13:33:57', '6283165005718'),
(276, 'Cepi cahyana', '6285221288210', '2023-05-29 13:37:09', '6283165005718'),
(277, 'Cepi cahyana', '6285221288210', '2023-05-29 13:38:13', '6283165005718'),
(278, 'Cepi cahyana', '6285221288210', '2023-05-29 13:38:52', '6283165005718'),
(279, 'Cepi cahyana', '6285221288210', '2023-05-29 13:40:36', '6283165005718'),
(280, 'Zaiheryf', '6285220969224', '2023-05-29 13:42:08', '6283165005718'),
(281, 'Cepi cahyana', '6285221288210', '2023-05-29 13:43:03', '6283165005718'),
(282, 'Cepi cahyana', '6285221288210', '2023-05-29 13:43:56', '6285794151322'),
(283, 'Cepi cahyana', '6285221288210', '2023-05-29 13:44:17', '6285794151322'),
(284, 'Cepi cahyana', '6285221288210', '2023-05-29 13:44:57', '6285794151322'),
(285, 'Cepi cahyana', '6285221288210', '2023-05-29 13:45:15', '6285794151322'),
(286, 'Cepi cahyana', '6285221288210', '2023-05-29 13:46:05', '6285794151322'),
(287, 'Cepi cahyana', '6285221288210', '2023-05-29 13:46:05', '6285794151322'),
(288, 'Cepi cahyana', '6285221288210', '2023-05-29 13:46:07', '6285794151322'),
(289, 'Cepi cahyana', '6285221288210', '2023-05-29 13:46:37', '6285794151322'),
(290, 'Cepi cahyana', '6285221288210', '2023-05-29 13:47:32', '6285794151322'),
(291, 'Cepi cahyana', '6285221288210', '2023-05-29 13:47:43', '6285794151322'),
(292, 'Cepi cahyana', '6285221288210', '2023-05-29 13:47:59', '6285794151322'),
(293, 'Cepi cahyana', '6285221288210', '2023-05-29 13:48:13', '6285794151322'),
(294, 'Cepi cahyana', '6285221288210', '2023-05-29 13:48:31', '6285794151322'),
(295, 'Cepi cahyana', '6285221288210', '2023-05-29 14:31:15', '6285794151322'),
(296, 'Cepi cahyana', '6285221288210', '2023-05-29 15:16:23', '6285794151322'),
(297, 'Cepi cahyana', '6285221288210', '2023-05-29 17:26:37', '6285794151322'),
(298, 'Cepi cahyana', '6285221288210', '2023-05-29 17:27:27', '6285794151322'),
(299, 'Cepi cahyana', '6285221288210', '2023-05-29 17:27:45', '6285794151322'),
(300, 'Cepi cahyana', '6285221288210', '2023-05-29 17:28:17', '6285794151322'),
(301, 'Cepi cahyana', '6285221288210', '2023-05-29 17:29:04', '6285794151322'),
(302, 'Cepi cahyana', '6285221288210', '2023-05-29 17:29:08', '6285794151322'),
(303, 'Cepi cahyana', '6285221288210', '2023-05-29 17:29:55', '6285794151322'),
(304, 'Ike', '6282113978123', '2023-05-29 17:30:25', '6285794151322'),
(305, 'Cepi cahyana', '6285221288210', '2023-05-29 17:30:25', '6285794151322'),
(306, 'Ike', '6282113978123', '2023-05-29 17:30:48', '6285794151322'),
(307, 'Cepi cahyana', '6285221288210', '2023-05-29 17:31:04', '6285794151322'),
(308, 'Ike', '6282113978123', '2023-05-29 17:31:04', '6285794151322'),
(309, 'Ike', '6282113978123', '2023-05-29 17:35:44', '6283165005718'),
(310, 'Cepi cahyana', '6285221288210', '2023-05-29 17:43:49', '6285794151322'),
(311, 'Ike', '6282113978123', '2023-05-29 17:43:49', '6285794151322'),
(312, 'Cepi cahyana', '6285221288210', '2023-05-29 17:44:29', '6285794151322'),
(313, 'Ike', '6282113978123', '2023-05-29 17:44:44', '6285794151322'),
(314, 'Cepi cahyana', '6285221288210', '2023-05-29 17:45:18', '6285794151322'),
(315, 'Ike', '6282113978123', '2023-05-29 17:45:19', '6285794151322'),
(316, 'Cepi cahyana', '6285221288210', '2023-05-29 17:51:06', '6285794151322'),
(317, 'Cepi cahyana', '6285221288210', '2023-05-29 17:51:22', '6285794151322'),
(318, 'Cepi cahyana', '6285221288210', '2023-05-29 17:51:39', '6285794151322'),
(319, 'Cepi cahyana', '6285221288210', '2023-05-29 17:51:57', '6285794151322'),
(320, 'Ike', '6282113978123', '2023-05-29 17:51:58', '6285794151322'),
(321, 'Cepi cahyana', '6285221288210', '2023-05-29 17:52:05', '6285794151322'),
(322, 'Ike', '6282113978123', '2023-05-29 17:52:05', '6285794151322'),
(323, 'Cepi cahyana', '6285221288210', '2023-05-29 17:53:57', '6285794151322'),
(324, 'Cepi cahyana', '6285221288210', '2023-05-29 17:55:19', '6285794151322'),
(325, 'Ike', '6282113978123', '2023-05-29 17:55:44', '6285794151322'),
(326, 'Ike', '6282113978123', '2023-05-29 17:56:06', '6283165005718'),
(327, 'Cepi cahyana', '6285221288210', '2023-05-29 17:56:06', '6285794151322');

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `sender_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_penjualan`
--

INSERT INTO `data_penjualan` (`id`, `tgl`, `total`, `sender_number`) VALUES
(4, '2023-02-01', 32932, NULL),
(5, '2023-02-02', 31982, NULL),
(6, '2023-02-03', 30758.5, NULL),
(7, '2023-02-04', 23212, NULL),
(8, '2023-02-06', 23591.5, NULL),
(9, '2023-02-07', 37858, NULL),
(10, '2023-02-08', 34915, NULL),
(11, '2023-02-09', 27422.5, NULL),
(12, '2023-02-10', 47031.5, NULL),
(13, '2023-02-11', 17833, NULL),
(14, '2023-02-12', 0, NULL),
(15, '2023-02-13', 24624, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pesan`
--

CREATE TABLE `data_pesan` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL DEFAULT 0,
  `sts_pesan` int(11) DEFAULT 0 COMMENT '1=pending server 2=terkirim 3=diterima 2=dibaca',
  `type` int(11) NOT NULL COMMENT '1=text 2=media 3=text group 4=media group	5=buttonn 6=list',
  `no_tujuan` varchar(20) NOT NULL,
  `judul_pesan` varchar(250) DEFAULT NULL,
  `pesan` longtext DEFAULT NULL,
  `url` longtext DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `sender_number` varchar(100) NOT NULL,
  `hits` int(11) DEFAULT NULL COMMENT '1=api 2=web',
  `nama_group` varchar(250) DEFAULT NULL,
  `device_sts` int(11) NOT NULL DEFAULT 0,
  `options` longtext DEFAULT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `msg_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pesan`
--

INSERT INTO `data_pesan` (`id`, `tgl`, `sts`, `sts_pesan`, `type`, `no_tujuan`, `judul_pesan`, `pesan`, `url`, `id_user`, `sender_number`, `hits`, `nama_group`, `device_sts`, `options`, `_ctime`, `msg_id`) VALUES
(1, '2023-09-05 00:00:07', 1, 0, 1, '6287880311817', NULL, '*SIMARKA*\r\nYth *Eko Saputro* Informasi service berkala untuk kendaraan:\r\n*Toyota Camry 2.5L Hybrid - B 1113 PQB*\r\nTanggal service terakhir : *02/03/2023*\r\nTanggal service berikutnya : *02/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:07', ''),
(2, '2023-09-05 00:00:07', 1, 0, 1, '6285792445664', NULL, '*SIMARKA*\r\nYth *Djoko Sentanu* Informasi service berkala untuk kendaraan:\r\n*Toyota Alpard G A/T - B 1483 PQT*\r\nTanggal service terakhir : *02/03/2023*\r\nTanggal service berikutnya : *02/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:07', ''),
(3, '2023-09-05 00:00:07', 1, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova V M/T Lux - B 1536 PQQ*\r\nTanggal service terakhir : *04/03/2023*\r\nTanggal service berikutnya : *04/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:07', ''),
(4, '2023-09-05 00:00:07', 1, 0, 1, '6281290420696', NULL, '*SIMARKA*\r\nYth *Yudi* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1197 PQT*\r\nTanggal service terakhir : *07/03/2023*\r\nTanggal service berikutnya : *07/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:07', ''),
(5, '2023-09-05 00:00:07', 1, 0, 1, '6281317784366', NULL, '*SIMARKA*\r\nYth *Subandiyanto Jumanto* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1205 PQT*\r\nTanggal service terakhir : *06/03/2023*\r\nTanggal service berikutnya : *06/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:07', ''),
(6, '2023-09-05 00:00:08', 1, 0, 1, '6281394703621', NULL, '*SIMARKA*\r\nYth *Wahyudianto* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1276 PQT*\r\nTanggal service terakhir : *02/03/2023*\r\nTanggal service berikutnya : *02/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-05 00:00:08', ''),
(7, '2023-09-06 00:00:09', 1, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova V M/T Lux - B 1536 PQQ*\r\nTanggal service terakhir : *04/03/2023*\r\nTanggal service berikutnya : *04/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-06 00:00:09', ''),
(8, '2023-09-06 00:00:09', 1, 0, 1, '6281290420696', NULL, '*SIMARKA*\r\nYth *Yudi* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1197 PQT*\r\nTanggal service terakhir : *07/03/2023*\r\nTanggal service berikutnya : *07/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-06 00:00:09', ''),
(9, '2023-09-07 00:00:10', 1, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova V M/T Lux - B 1536 PQQ*\r\nTanggal service terakhir : *04/03/2023*\r\nTanggal service berikutnya : *04/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-07 00:00:10', ''),
(10, '2023-09-07 00:00:10', 1, 0, 1, '6281317784366', NULL, '*SIMARKA*\r\nYth *Subandiyanto Jumanto* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1205 PQT*\r\nTanggal service terakhir : *06/03/2023*\r\nTanggal service berikutnya : *06/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-07 00:00:10', ''),
(11, '2023-09-08 00:00:03', 0, 0, 1, '6281290420696', NULL, '*SIMARKA*\r\nYth *Yudi* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1197 PQT*\r\nTanggal service terakhir : *07/03/2023*\r\nTanggal service berikutnya : *07/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 00:00:03', ''),
(12, '2023-09-08 00:00:04', 0, 0, 1, '6281317784366', NULL, '*SIMARKA*\r\nYth *Subandiyanto Jumanto* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel - B 1205 PQT*\r\nTanggal service terakhir : *06/03/2023*\r\nTanggal service berikutnya : *06/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 00:00:04', ''),
(13, '2023-09-08 07:47:19', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 07:47:19', ''),
(14, '2023-09-08 07:47:19', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 07:47:19', ''),
(15, '2023-09-08 12:45:58', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT*\r\n*B 7836 PPA-B 7056 BA*\r\n\r\n*Penanggung jawab :* .Trisna\r\n*Peruntukan :* Rangkaian Presiden Perangkat\r\n \r\n*Catatan :* Mobil rangkaian RI 1 perangkat bapak  \r\n                \r\n*Detail:*\r\n1 Service berkala 64.268 km\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:45:58', ''),
(16, '2023-09-08 12:45:59', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT*\r\n*B 7836 PPA-B 7056 BA*\r\n\r\n*Penanggung jawab :* .Trisna\r\n*Peruntukan :* Rangkaian Presiden Perangkat\r\n \r\n*Catatan :* Mobil rangkaian RI 1 perangkat bapak  \r\n                \r\n*Detail:*\r\n1 Service berkala 64.268 km\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:45:59', ''),
(17, '2023-09-08 12:47:40', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT*\r\n*B 7836 PPA-B 7056 BA*\r\n\r\n*Penanggung jawab :* .Trisna\r\n*Peruntukan :* .Rangkaian Presiden Perangkat\r\n\r\n*Catatan :* Mobil rangkaian RI 1 perangkat bapak  \r\n            \r\n*Detail:*\r\n1 Service berkala 64.268 km\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:47:40', ''),
(18, '2023-09-08 12:47:40', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT*\r\n*B 7836 PPA-B 7056 BA*\r\n\r\n*Penanggung jawab :* .Trisna\r\n*Peruntukan :* .Rangkaian Presiden Perangkat\r\n\r\n*Catatan :* Mobil rangkaian RI 1 perangkat bapak  \r\n            \r\n*Detail:*\r\n1 Service berkala 64.268 km\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:47:40', ''),
(19, '2023-09-08 12:47:40', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT*\r\n*B 7836 PPA-B 7056 BA*\r\n\r\n*Penanggung jawab :* .Trisna\r\n*Peruntukan :* .Rangkaian Presiden Perangkat\r\n\r\n*Catatan :* Mobil rangkaian RI 1 perangkat bapak  \r\n            \r\n*Detail:*\r\n1 Service berkala 64.268 km\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:47:40', ''),
(20, '2023-09-08 12:48:12', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T*\r\n*B 1326 PQH-B 1573 ZZH*\r\n\r\n*Penanggung jawab :* .Irwan Sani\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala.KM 145672\n2 Balncing ban depan sebelah kiri\n3 Setir getar\n4 Rem agak dalam\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:48:12', ''),
(21, '2023-09-08 12:48:13', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T*\r\n*B 1326 PQH-B 1573 ZZH*\r\n\r\n*Penanggung jawab :* .Irwan Sani\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala.KM 145672\n2 Balncing ban depan sebelah kiri\n3 Setir getar\n4 Rem agak dalam\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:48:13', ''),
(22, '2023-09-08 12:48:13', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T*\r\n*B 1326 PQH-B 1573 ZZH*\r\n\r\n*Penanggung jawab :* .Irwan Sani\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala.KM 145672\n2 Balncing ban depan sebelah kiri\n3 Setir getar\n4 Rem agak dalam\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-08 12:48:13', ''),
(23, '2023-09-12 00:00:09', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-12 00:00:09', ''),
(24, '2023-09-12 00:00:09', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-12 00:00:09', ''),
(25, '2023-09-13 00:00:04', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-13 00:00:04', ''),
(26, '2023-09-13 00:00:04', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-13 00:00:04', ''),
(27, '2023-09-14 00:00:03', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-14 00:00:03', ''),
(28, '2023-09-14 00:00:03', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-14 00:00:03', ''),
(29, '2023-09-16 00:00:16', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-16 00:00:16', ''),
(30, '2023-09-16 00:00:16', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-16 00:00:16', ''),
(31, '2023-09-17 00:00:11', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-17 00:00:11', ''),
(32, '2023-09-17 00:00:11', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-17 00:00:11', ''),
(33, '2023-09-18 00:00:14', 0, 0, 1, '6281316879901', NULL, '*SIMARKA*\r\nYth *Suyatno* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2) - B 9787 KQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-18 00:00:14', ''),
(34, '2023-09-18 00:00:14', 0, 0, 1, '6281281792462', NULL, '*SIMARKA*\r\nYth *Dedi supriatna* Informasi service berkala untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T - B 1567 PQQ*\r\nTanggal service terakhir : *15/03/2023*\r\nTanggal service berikutnya : *15/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-18 00:00:14', ''),
(35, '2023-09-18 00:00:14', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-18 00:00:14', ''),
(36, '2023-09-19 00:00:10', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-19 00:00:10', ''),
(37, '2023-09-20 00:00:05', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 00:00:05', ''),
(38, '2023-09-20 08:02:59', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Commuter*\r\n*B 7072 PPA-B 7050 BA*\r\n\r\n*Penanggung jawab :* .Ade Bayu Lesmana\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Saat di kunci manual..pintu semua tdk terkunci\n2 Handle sliding door copot/lepas\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:02:59', ''),
(39, '2023-09-20 08:02:59', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Commuter*\r\n*B 7072 PPA-B 7050 BA*\r\n\r\n*Penanggung jawab :* .Ade Bayu Lesmana\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Saat di kunci manual..pintu semua tdk terkunci\n2 Handle sliding door copot/lepas\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:02:59', ''),
(40, '2023-09-20 08:20:20', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:20:20', ''),
(41, '2023-09-20 08:20:20', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:20:20', ''),
(42, '2023-09-20 08:21:41', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Km 113581 \n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:21:41', ''),
(43, '2023-09-20 08:21:42', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Km 113581 \n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:21:42', ''),
(44, '2023-09-20 08:24:04', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Km 113581 \n2 Service berkala .Rem kejut ketika mesin blm jauh berjalan\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:24:04', ''),
(45, '2023-09-20 08:24:04', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Km 113581 \n2 Service berkala .Rem kejut ketika mesin blm jauh berjalan\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:24:04', ''),
(46, '2023-09-20 08:27:29', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Km 113581 \n2 Service berkala .Rem kejut ketika mesin blm jauh berjalan\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:27:29', ''),
(47, '2023-09-20 08:27:29', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Km 113581 \n2 Service berkala .Rem kejut ketika mesin blm jauh berjalan\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:27:29', ''),
(48, '2023-09-20 08:27:29', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Km 113581 \n2 Service berkala .Rem kejut ketika mesin blm jauh berjalan\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:27:29', ''),
(49, '2023-09-20 08:30:07', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel*\r\n*B 1094 PQT-B 1275 RFO*\r\n\r\n*Penanggung jawab :* .Toto Hermanto\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 AC bagian depan tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:30:07', ''),
(50, '2023-09-20 08:30:07', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel*\r\n*B 1094 PQT-B 1275 RFO*\r\n\r\n*Penanggung jawab :* .Toto Hermanto\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 AC bagian depan tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:30:07', ''),
(51, '2023-09-20 08:31:01', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel*\r\n*B 1094 PQT-B 1275 RFO*\r\n\r\n*Penanggung jawab :* .Toto Hermanto\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC bagian depan tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:31:01', ''),
(52, '2023-09-20 08:31:01', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel*\r\n*B 1094 PQT-B 1275 RFO*\r\n\r\n*Penanggung jawab :* .Toto Hermanto\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC bagian depan tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:31:01', ''),
(53, '2023-09-20 08:31:02', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova 2.4 V AT Diesel*\r\n*B 1094 PQT-B 1275 RFO*\r\n\r\n*Penanggung jawab :* .Toto Hermanto\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC bagian depan tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:31:02', ''),
(54, '2023-09-20 08:32:05', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Commuter*\r\n*B 7072 PPA-B 7050 BA*\r\n\r\n*Penanggung jawab :* .Ade Bayu Lesmana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Saat di kunci manual..pintu semua tdk terkunci\n2 Handle sliding door copot/lepas\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:32:05', ''),
(55, '2023-09-20 08:32:05', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Commuter*\r\n*B 7072 PPA-B 7050 BA*\r\n\r\n*Penanggung jawab :* .Ade Bayu Lesmana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Saat di kunci manual..pintu semua tdk terkunci\n2 Handle sliding door copot/lepas\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:32:05', ''),
(56, '2023-09-20 08:32:06', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Hiace Commuter*\r\n*B 7072 PPA-B 7050 BA*\r\n\r\n*Penanggung jawab :* .Ade Bayu Lesmana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Saat di kunci manual..pintu semua tdk terkunci\n2 Handle sliding door copot/lepas\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-20 08:32:06', ''),
(57, '2023-09-21 12:00:49', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.7 G AT LUX*\r\n*B 1559 PQH-B 1576 ZZH*\r\n\r\n*Penanggung jawab :* .Rika Diana\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 69.684\n2 Shock bagasi belakang seret\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-21 12:00:49', ''),
(58, '2023-09-21 12:00:49', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.7 G AT LUX*\r\n*B 1559 PQH-B 1576 ZZH*\r\n\r\n*Penanggung jawab :* .Rika Diana\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 69.684\n2 Shock bagasi belakang seret\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-21 12:00:49', ''),
(59, '2023-09-21 12:02:01', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.7 G AT LUX*\r\n*B 1559 PQH-B 1576 ZZH*\r\n\r\n*Penanggung jawab :* .Rika Diana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 69.684\n2 Shock bagasi belakang seret\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-21 12:02:01', ''),
(60, '2023-09-21 12:02:02', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.7 G AT LUX*\r\n*B 1559 PQH-B 1576 ZZH*\r\n\r\n*Penanggung jawab :* .Rika Diana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 69.684\n2 Shock bagasi belakang seret\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-21 12:02:02', ''),
(61, '2023-09-21 12:02:03', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.7 G AT LUX*\r\n*B 1559 PQH-B 1576 ZZH*\r\n\r\n*Penanggung jawab :* .Rika Diana\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 69.684\n2 Shock bagasi belakang seret\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-21 12:02:03', ''),
(62, '2023-09-22 00:00:12', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 00:00:12', ''),
(63, '2023-09-22 09:24:40', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:24:40', ''),
(64, '2023-09-22 09:24:41', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:24:41', ''),
(65, '2023-09-22 09:33:05', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 94962\n2 Aki lemah\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:33:05', ''),
(66, '2023-09-22 09:33:05', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 94962\n2 Aki lemah\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:33:05', ''),
(67, '2023-09-22 09:33:44', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 94962\n2 Aki lemah\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:33:44', ''),
(68, '2023-09-22 09:33:44', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 94962\n2 Aki lemah\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:33:44', ''),
(69, '2023-09-22 09:33:44', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 94962\n2 Aki lemah\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-22 09:33:44', ''),
(70, '2023-09-23 00:00:11', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-23 00:00:11', ''),
(71, '2023-09-24 00:00:12', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-24 00:00:12', ''),
(72, '2023-09-24 00:00:12', 0, 0, 1, '6289624098183', NULL, '*SIMARKA*\r\nYth *Taopik Ridwan* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1279 PQT*\r\nTanggal service terakhir : *21/03/2023*\r\nTanggal service berikutnya : *21/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-24 00:00:12', ''),
(73, '2023-09-24 00:00:12', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1226 PQF*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-24 00:00:12', ''),
(74, '2023-09-25 00:00:03', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 00:00:03', ''),
(75, '2023-09-25 00:00:04', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1226 PQF*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 00:00:04', ''),
(76, '2023-09-25 10:07:28', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1226 PQF-B 1655 RFJ*\r\n\r\n*Penanggung jawab :* .Johan Triyuliarsito\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Servis berkala km 57023\n2 Stir getar saat kecepatan 120\n3 Ban depan makan luar\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 10:07:28', ''),
(77, '2023-09-25 10:07:29', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1226 PQF-B 1655 RFJ*\r\n\r\n*Penanggung jawab :* .Johan Triyuliarsito\r\n*Peruntukan :* Operasional \r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Servis berkala km 57023\n2 Stir getar saat kecepatan 120\n3 Ban depan makan luar\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 10:07:29', ''),
(78, '2023-09-25 10:09:08', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1226 PQF-B 1655 RFJ*\r\n\r\n*Penanggung jawab :* .Johan Triyuliarsito\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala km 57023\n2 Stir getar saat kecepatan 120\n3 Ban depan makan luar\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 10:09:08', ''),
(79, '2023-09-25 10:09:08', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1226 PQF-B 1655 RFJ*\r\n\r\n*Penanggung jawab :* .Johan Triyuliarsito\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala km 57023\n2 Stir getar saat kecepatan 120\n3 Ban depan makan luar\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 10:09:08', ''),
(80, '2023-09-25 10:09:08', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1226 PQF-B 1655 RFJ*\r\n\r\n*Penanggung jawab :* .Johan Triyuliarsito\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Servis berkala km 57023\n2 Stir getar saat kecepatan 120\n3 Ban depan makan luar\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-25 10:09:08', ''),
(81, '2023-09-26 00:00:03', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 00:00:03', ''),
(82, '2023-09-26 00:00:04', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1226 PQF*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 00:00:04', ''),
(83, '2023-09-26 00:00:05', 0, 0, 1, '6285218366658', NULL, '*SIMARKA*\r\nYth *Mariyoto* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1436 PQF*\r\nTanggal service terakhir : *29/03/2023*\r\nTanggal service berikutnya : *29/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 00:00:05', ''),
(84, '2023-09-26 09:34:43', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* Eksternal Sepupu IBN\r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 09:34:43', ''),
(85, '2023-09-26 09:34:44', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* Eksternal Sepupu IBN\r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 09:34:44', ''),
(86, '2023-09-26 09:50:59', 0, 0, 1, '628119638333', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.4 VRZ 4x2 AT Diesel*\r\n*B 1761 PQH-B 1414 RFO*\r\n\r\n*Penanggung jawab :* .Wahyu Andriansyah\r\n*Peruntukan :* Eksternal Anggit\r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 AC tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 09:50:59', ''),
(87, '2023-09-26 09:51:00', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.4 VRZ 4x2 AT Diesel*\r\n*B 1761 PQH-B 1414 RFO*\r\n\r\n*Penanggung jawab :* .Wahyu Andriansyah\r\n*Peruntukan :* Eksternal Anggit\r\n \r\n*Catatan :*  \r\n                \r\n*Detail:*\r\n1 AC tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-26 09:51:00', ''),
(88, '2023-09-27 00:00:14', 0, 0, 1, '6285218366658', NULL, '*SIMARKA*\r\nYth *Mariyoto* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1436 PQF*\r\nTanggal service terakhir : *29/03/2023*\r\nTanggal service berikutnya : *29/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-27 00:00:14', ''),
(89, '2023-09-28 00:00:12', 0, 0, 1, '6281382246931', NULL, '*SIMARKA*\r\nYth *Ade Maryadi* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1266 PQT*\r\nTanggal service terakhir : *31/03/2023*\r\nTanggal service berikutnya : *01/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-28 00:00:12', ''),
(90, '2023-09-28 00:00:12', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-28 00:00:12', ''),
(91, '2023-09-28 00:00:12', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1226 PQF*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-28 00:00:12', ''),
(92, '2023-09-28 00:00:13', 0, 0, 1, '6285218366658', NULL, '*SIMARKA*\r\nYth *Mariyoto* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1436 PQF*\r\nTanggal service terakhir : *29/03/2023*\r\nTanggal service berikutnya : *29/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-28 00:00:13', ''),
(93, '2023-09-29 00:00:04', 0, 0, 1, '6281382246931', NULL, '*SIMARKA*\r\nYth *Ade Maryadi* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1266 PQT*\r\nTanggal service terakhir : *31/03/2023*\r\nTanggal service berikutnya : *01/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 00:00:04', ''),
(94, '2023-09-29 00:00:04', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 00:00:04', ''),
(95, '2023-09-29 00:00:04', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT - B 7834 PPA*\r\nTanggal service terakhir : *02/04/2023*\r\nTanggal service berikutnya : *02/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 00:00:04', ''),
(96, '2023-09-29 00:00:05', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1226 PQF*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 00:00:05', ''),
(97, '2023-09-29 15:31:07', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.4 VRZ 4x2 AT Diesel*\r\n*B 1761 PQH-B 1414 RFO*\r\n\r\n*Penanggung jawab :* .Wahyu Andriansyah\r\n*Peruntukan :* .Eksternal Anggit\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:31:07', ''),
(98, '2023-09-29 15:31:07', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.4 VRZ 4x2 AT Diesel*\r\n*B 1761 PQH-B 1414 RFO*\r\n\r\n*Penanggung jawab :* .Wahyu Andriansyah\r\n*Peruntukan :* .Eksternal Anggit\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:31:07', ''),
(99, '2023-09-29 15:31:07', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Fortuner 2.4 VRZ 4x2 AT Diesel*\r\n*B 1761 PQH-B 1414 RFO*\r\n\r\n*Penanggung jawab :* .Wahyu Andriansyah\r\n*Peruntukan :* .Eksternal Anggit\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 AC tidak dingin\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:31:07', ''),
(100, '2023-09-29 15:32:15', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:32:15', ''),
(101, '2023-09-29 15:32:15', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:32:15', ''),
(102, '2023-09-29 15:32:15', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:32:15', ''),
(103, '2023-09-29 15:33:11', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:11', ''),
(104, '2023-09-29 15:33:11', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:11', ''),
(105, '2023-09-29 15:33:11', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:11', ''),
(106, '2023-09-29 15:33:13', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:13', ''),
(107, '2023-09-29 15:33:13', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:13', ''),
(108, '2023-09-29 15:33:13', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel*\r\n*B 1436 PQF-B 1140 ZF*\r\n\r\n*Penanggung jawab :* .Mariyoto\r\n*Peruntukan :* .Eksternal Sepupu IBN\r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n1 Service berkala km 57.325\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:13', ''),
(109, '2023-09-29 15:33:52', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:52', ''),
(110, '2023-09-29 15:33:52', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:52', ''),
(111, '2023-09-29 15:33:52', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:52', ''),
(112, '2023-09-29 15:33:53', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:53', ''),
(113, '2023-09-29 15:33:53', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:53', ''),
(114, '2023-09-29 15:33:54', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:54', ''),
(115, '2023-09-29 15:33:56', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:56', ''),
(116, '2023-09-29 15:33:56', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:56', ''),
(117, '2023-09-29 15:33:57', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:33:57', '');
INSERT INTO `data_pesan` (`id`, `tgl`, `sts`, `sts_pesan`, `type`, `no_tujuan`, `judul_pesan`, `pesan`, `url`, `id_user`, `sender_number`, `hits`, `nama_group`, `device_sts`, `options`, `_ctime`, `msg_id`) VALUES
(118, '2023-09-29 15:34:08', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:08', ''),
(119, '2023-09-29 15:34:09', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:09', ''),
(120, '2023-09-29 15:34:09', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:09', ''),
(121, '2023-09-29 15:34:09', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:09', ''),
(122, '2023-09-29 15:34:09', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:09', ''),
(123, '2023-09-29 15:34:10', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:10', ''),
(124, '2023-09-29 15:34:10', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:10', ''),
(125, '2023-09-29 15:34:11', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:11', ''),
(126, '2023-09-29 15:34:11', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:11', ''),
(127, '2023-09-29 15:34:11', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:11', ''),
(128, '2023-09-29 15:34:12', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:12', ''),
(129, '2023-09-29 15:34:12', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:12', ''),
(130, '2023-09-29 15:34:12', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:12', ''),
(131, '2023-09-29 15:34:13', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:13', ''),
(132, '2023-09-29 15:34:13', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Toyota Kijang Innova TG40G M/T*\r\n*B 1567 PQQ-B 1467 RFJ*\r\n\r\n*Penanggung jawab :* .Dedi supriatna\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:13', ''),
(133, '2023-09-29 15:34:31', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:31', ''),
(134, '2023-09-29 15:34:31', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:31', ''),
(135, '2023-09-29 15:34:31', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:31', ''),
(136, '2023-09-29 15:34:31', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:31', ''),
(137, '2023-09-29 15:34:31', 0, 0, 1, '6281298933142', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:32', ''),
(138, '2023-09-29 15:34:32', 0, 0, 1, '6285172476577', NULL, '*SIMARKA*\r\nPermohonon perbaikan untuk kendaraan:\r\n*Mitsubishi Fuso FM 517M (6x2)*\r\n*B 9787 KQ-  *\r\n\r\n*Penanggung jawab :* .Suyatno\r\n*Peruntukan :* .Operasional \r\n\r\n*Catatan :*  \r\n            \r\n*Detail:*\r\n\r\n', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-29 15:34:32', ''),
(139, '2023-09-30 00:00:12', 0, 0, 1, '6281382246931', NULL, '*SIMARKA*\r\nYth *Ade Maryadi* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1266 PQT*\r\nTanggal service terakhir : *31/03/2023*\r\nTanggal service berikutnya : *01/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-30 00:00:12', ''),
(140, '2023-09-30 00:00:12', 0, 0, 1, '6281380584520', NULL, '*SIMARKA*\r\nYth *Nurhasbialloh* Informasi service berkala untuk kendaraan:\r\n*Mitsubishi Pajero Sport 25HP 4x2 5 A/T - B 1327 PQH*\r\nTanggal service terakhir : *27/03/2023*\r\nTanggal service berikutnya : *27/09/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-30 00:00:12', ''),
(141, '2023-09-30 00:00:13', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT - B 7834 PPA*\r\nTanggal service terakhir : *02/04/2023*\r\nTanggal service berikutnya : *02/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-09-30 00:00:13', ''),
(142, '2023-10-01 00:00:13', 0, 0, 1, '6285780934338', NULL, '*SIMARKA*\r\nYth *Johan Triyuliarsito* Informasi service berkala untuk kendaraan:\r\n*Toyota Hiace Premio 2.8 MT - B 7834 PPA*\r\nTanggal service terakhir : *02/04/2023*\r\nTanggal service berikutnya : *02/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-10-01 00:00:13', ''),
(143, '2023-10-02 00:00:11', 0, 0, 1, '6281382246931', NULL, '*SIMARKA*\r\nYth *Ade Maryadi* Informasi service berkala untuk kendaraan:\r\n*Toyota All New Kijang Innova 2.4 G A/T Diesel - B 1266 PQT*\r\nTanggal service terakhir : *31/03/2023*\r\nTanggal service berikutnya : *01/10/2023*\r\n\r\n_Segera lakukan permohonan service pada aplikasi SIMARKA_', NULL, NULL, '6285794151322', 1, NULL, 1, NULL, '2023-10-02 00:00:11', ''),
(144, '2024-09-20 22:13:27', 0, 0, 1, '085221288210', 'order by app', '📍 *Nuansa Resto & Cafe*\nTerimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊\ndan berikut detail pesanan kakak :\n\n(1) Cireng + Lemon tea - 20000\n(1) Bakpau mini + kopi hitam / sweet tea - 20000\n(1) Pisang goreng crispy +Kopi hitam/sweet tea - 20000\n*Total :* Rp 60.000\n\n*Pesanan atas nama :* cepi\n*Nomor meja :* 23\n*Catatan pesanan:* Oke siap gass\n\n_Jika ada kekeliruan mohon hubungi pelayan kami ya kak_ 😊', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:13:27', ''),
(145, '2024-09-20 22:13:27', 0, 0, 1, '085703042414', 'Notif order', '*ORDER MASUK*\nMeja: 23\nNama: cepi\n\n*Order:*\n(1) Cireng + Lemon tea - 20000\n(1) Bakpau mini + kopi hitam / sweet tea - 20000\n(1) Pisang goreng crispy +Kopi hitam/sweet tea - 20000\n*Total :* 60.000\n*Catatan pesanan:* Oke siap gass\n\n🕐 _20-09-2024 22:13:27 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:13:27', ''),
(146, '2024-09-20 22:13:27', 0, 0, 1, '0895805332904', 'Notif order', '*ORDER MASUK*\nMeja: 23\nNama: cepi\n\n*Order:*\n(1) Cireng + Lemon tea - 20000\n(1) Bakpau mini + kopi hitam / sweet tea - 20000\n(1) Pisang goreng crispy +Kopi hitam/sweet tea - 20000\n*Total :* 60.000\n*Catatan pesanan:* Oke siap gass\n\n🕐 _20-09-2024 22:13:27 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:13:27', ''),
(147, '2024-09-20 22:27:22', 0, 0, 1, '085221288210', 'order by app', '📍 *Nuansa Resto & Cafe*\nTerimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊\ndan berikut detail pesanan kakak :\n\n(2) Dimsum + Lemon tea - 50000\n(2) Kebab full beef - 50000\n*Total :* Rp 100.000\n\n*Pesanan atas nama :* cepi\n*Nomor meja :* 78\n*Catatan pesanan:* \n\n_Jika ada kekeliruan mohon hubungi pelayan kami ya kak_ 😊', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:27:22', ''),
(148, '2024-09-20 22:27:22', 0, 0, 1, '085703042414', 'Notif order', '*ORDER MASUK*\nMeja: 78\nNama: cepi\n\n*Order:*\n(2) Dimsum + Lemon tea - 50000\n(2) Kebab full beef - 50000\n*Total :* 100.000\n*Catatan pesanan:* \n\n🕐 _20-09-2024 22:27:22 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:27:22', ''),
(149, '2024-09-20 22:27:22', 0, 0, 1, '0895805332904', 'Notif order', '*ORDER MASUK*\nMeja: 78\nNama: cepi\n\n*Order:*\n(2) Dimsum + Lemon tea - 50000\n(2) Kebab full beef - 50000\n*Total :* 100.000\n*Catatan pesanan:* \n\n🕐 _20-09-2024 22:27:22 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-20 22:27:22', ''),
(150, '2024-09-21 09:05:23', 0, 0, 1, '085221288210', 'order by app', '📍 *Nuansa Resto & Cafe*\nTerimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊\ndan berikut detail pesanan kakak :\n\n(1) Cireng + Lemon tea - 20000\n(1) Ayam bakar + nasi - 27000\n(1) Ayam geprek + nasi - 25000\n(2) Posaget - 60000\n(1) Otak-otak singapura - 15000\n*Total :* Rp 147.000\n\n*Pesanan atas nama :* cepi\n*Nomor meja :* J\n*Catatan pesanan:* \n\n_Jika ada kekeliruan mohon hubungi pelayan kami ya kak_ 😊', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:05:23', ''),
(151, '2024-09-21 09:05:23', 0, 0, 1, '085703042414', 'Notif order', '*ORDER MASUK*\nMeja: J\nNama: cepi\n\n*Order:*\n(1) Cireng + Lemon tea - 20000\n(1) Ayam bakar + nasi - 27000\n(1) Ayam geprek + nasi - 25000\n(2) Posaget - 60000\n(1) Otak-otak singapura - 15000\n*Total :* 147.000\n*Catatan pesanan:* \n\n🕐 _21-09-2024 09:05:23 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:05:23', ''),
(152, '2024-09-21 09:05:23', 0, 0, 1, '0895805332904', 'Notif order', '*ORDER MASUK*\nMeja: J\nNama: cepi\n\n*Order:*\n(1) Cireng + Lemon tea - 20000\n(1) Ayam bakar + nasi - 27000\n(1) Ayam geprek + nasi - 25000\n(2) Posaget - 60000\n(1) Otak-otak singapura - 15000\n*Total :* 147.000\n*Catatan pesanan:* \n\n🕐 _21-09-2024 09:05:23 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:05:23', ''),
(153, '2024-09-21 09:07:45', 0, 0, 1, '085221288210', 'order by app', '📍 *Nuansa Resto & Cafe*\nTerimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊\ndan berikut detail pesanan kakak :\n\n(1) Posaget - 30000\n(1) Spaghetti bolognese - 20000\n(2) Red velvet - 40000\n(2) Dimsum + Lemon tea - 50000\n*Total :* Rp 140.000\n\n*Pesanan atas nama :* cepi\n*Nomor meja :* H\n*Catatan pesanan:* \n\n_Jika ada kekeliruan mohon hubungi pelayan kami ya kak_ 😊', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:07:45', ''),
(154, '2024-09-21 09:07:45', 0, 0, 1, '085703042414', 'Notif order', '*ORDER MASUK*\nMeja: H\nNama: cepi\n\n*Order:*\n(1) Posaget - 30000\n(1) Spaghetti bolognese - 20000\n(2) Red velvet - 40000\n(2) Dimsum + Lemon tea - 50000\n*Total :* 140.000\n*Catatan pesanan:* \n\n🕐 _21-09-2024 09:07:45 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:07:45', ''),
(155, '2024-09-21 09:07:45', 0, 0, 1, '0895805332904', 'Notif order', '*ORDER MASUK*\nMeja: H\nNama: cepi\n\n*Order:*\n(1) Posaget - 30000\n(1) Spaghetti bolognese - 20000\n(2) Red velvet - 40000\n(2) Dimsum + Lemon tea - 50000\n*Total :* 140.000\n*Catatan pesanan:* \n\n🕐 _21-09-2024 09:07:45 WIB_\nCek order:\nhttps://cafe.allfoodregistration.com/master/order?id=NSAXJT', NULL, NULL, '6283165005718', 2, NULL, 0, NULL, '2024-09-21 09:07:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_poli`
--

CREATE TABLE `data_poli` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_poli`
--

INSERT INTO `data_poli` (`id`, `nama`) VALUES
(1, 'POLIKLINIK ANAK DAN TUMBUH KEMBANG'),
(2, 'POLIKLINIK OBGYN (OBSTETRI & GINEKOLOGI)'),
(3, 'POLIKLINIK PENYAKIT DALAM'),
(4, 'POLIKLINIK BEDAH UMUM'),
(5, 'POLIKLINIK BEDAH ONKOLOGI'),
(6, 'POLIKLINIK MATA'),
(7, 'POLIKLINIK SARAF'),
(8, 'POLIKLINIK JANTUNG');

-- --------------------------------------------------------

--
-- Table structure for table `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `ruangan` varchar(250) NOT NULL,
  `jml_bed` int(11) NOT NULL DEFAULT 0,
  `bed_kosong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_ruangan`
--

INSERT INTO `data_ruangan` (`id`, `kelas`, `ruangan`, `jml_bed`, `bed_kosong`) VALUES
(1, '1', 'Mawar', 10, 3),
(2, '2', 'Kamboja', 3, 2),
(3, '3', 'Melati', 4, 2),
(4, '1', 'Kaktus', 5, 1),
(5, '1', 'Teratai', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_survei`
--

CREATE TABLE `data_survei` (
  `id` int(11) NOT NULL,
  `to` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `pengalaman` varchar(250) DEFAULT NULL,
  `pelayanan` text DEFAULT NULL,
  `penyajian` varchar(100) DEFAULT NULL,
  `makanan` text NOT NULL,
  `tempat` text NOT NULL,
  `ks` text DEFAULT NULL,
  `sts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_survei`
--

INSERT INTO `data_survei` (`id`, `to`, `hp`, `nama`, `tgl`, `pengalaman`, `pelayanan`, `penyajian`, `makanan`, `tempat`, `ks`, `sts`) VALUES
(1, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 07:55:21', 'Biasa aja', 'Cepat', NULL, 'Biasa aja', 'Biasa aja', NULL, 1),
(3, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 07:59:26', '0', '0', '0', '0', '0', NULL, 1),
(4, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 08:03:16', '0', '0', '0', '0', '0', NULL, 1),
(5, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 08:03:55', 'Biasa aja', 'Biasa aja', 'Lambat', 'Biasa aja', 'Nyaman', NULL, 1),
(6, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 08:12:29', 'Biasa aja', 'Biasa aja', 'Biasa aja', 'Biasa aja', 'Biasa aja', 'oke lah', 1),
(7, '6285794151322', '6285221288210', 'Cepi Cahyana', '2023-04-29 13:44:16', 'Menyenangkan', 'Buruk', 'Cepat', 'Enak', 'Nyaman', 'Bagus tempatnya', 1),
(8, '6285794151322', '6285221288210', 'Cepi cahyana', '2023-05-30 08:47:20', 'Menyenangkan', 'Bagus', 'Cepat', 'Biasa aja', 'Nyaman', 'Ko carger aja bayar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_terjadwal`
--

CREATE TABLE `data_terjadwal` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `wa` varchar(20) NOT NULL,
  `field1` varchar(30) NOT NULL,
  `field2` varchar(30) NOT NULL,
  `field3` varchar(30) NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_terjadwal`
--

INSERT INTO `data_terjadwal` (`id`, `id_user`, `nik`, `nama`, `wa`, `field1`, `field2`, `field3`, `_ctime`, `sts`) VALUES
(1, '1', 'xx', 'xx', '0852 2128 8210', 'subang', 'xx', '', '2021-10-18 06:09:27', 0),
(2, '1', '1', 'cepi', '0852 2128 8210', 'subang', '1', '', '2021-10-18 06:26:48', 0),
(3, '1', '2678', 'cepi', '0852 2128 8210', 'subang', 'masuk angin', '', '2021-10-18 06:27:07', 0),
(4, '1', 'xxxxxxxxxxx', 'xcx', '0852 2128 8210', 'subang', 'cc', '', '2021-10-18 06:32:20', 0),
(5, '1', '4644', 'terlambars', '0852 2128 8210', 'xtc', 'ctg', '', '2021-10-18 08:29:43', 0),
(6, '1', '23', 'Cepi cahyana.MKOMc', '0852 2128 8210', 'xxx', 'cc', '', '2021-10-18 08:49:48', 0),
(7, '1', '4545', 'fgfg', '055', '', '', '', '2021-10-18 11:39:20', 0),
(8, '1', '123', 'www', '123', 'www', '', '', '2021-10-18 11:43:33', 0),
(9, '1', '123', 'wwwee', '12344', 'wert', '', '', '2021-10-18 11:44:57', 0),
(10, '1', '456', 'rtyr', '8658', 'dfg', '', '', '2021-10-18 11:45:36', 0),
(11, '1', '4509', 'pikachu', '12345', 'los angels', '', '', '2021-10-18 11:50:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `device_stations`
--

CREATE TABLE `device_stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `sender_number` varchar(200) DEFAULT NULL,
  `sts` tinyint(4) DEFAULT 0 COMMENT '0=diskonek 1=connect 2=ready for scan 3=sedang di autentikasi  4=restart 5=disable',
  `qr` text DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `key` text DEFAULT NULL,
  `delete` tinyint(1) DEFAULT 0,
  `session` text NOT NULL,
  `package` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `sender_name` varchar(50) NOT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `list_menu` text DEFAULT NULL,
  `foto_menu` varchar(250) DEFAULT NULL,
  `foto_menu2` varchar(250) DEFAULT NULL,
  `best_seller` text DEFAULT NULL,
  `menu_promo` text DEFAULT NULL,
  `foto1` varchar(250) DEFAULT NULL,
  `foto2` varchar(250) DEFAULT NULL,
  `foto3` varchar(250) DEFAULT NULL,
  `foto4` varchar(250) DEFAULT NULL,
  `foto5` varchar(100) DEFAULT NULL,
  `story` varchar(250) DEFAULT NULL,
  `sambutan` text DEFAULT 'Terimakasih sudah berkunjung ',
  `ig` varchar(100) DEFAULT NULL,
  `map` text NOT NULL,
  `info` text DEFAULT NULL,
  `jam_op` text DEFAULT NULL,
  `info_tutup` text DEFAULT 'Mohon maaf hari ini kami libur dulu ya kak ?',
  `jml_hari` int(11) DEFAULT 0,
  `price_access` int(11) NOT NULL DEFAULT 2500,
  `price_order` int(11) NOT NULL DEFAULT 5000,
  `price_max` int(11) NOT NULL DEFAULT 100000 COMMENT 'permonth',
  `payment` datetime DEFAULT NULL,
  `credit` double DEFAULT 100000,
  `owner` varchar(250) NOT NULL,
  `hp_owner` varchar(50) NOT NULL,
  `notif_order` text DEFAULT NULL,
  `broadcast` text DEFAULT 'hallo {nama}  , kami ada menu baru loh spesial untuk kak {nama}  hari ini ? Kami tunggu kehadiranya ya ?',
  `file_broadcast` varchar(250) NOT NULL,
  `tgl_syncron` datetime DEFAULT NULL COMMENT 'pelanggan',
  `contoh_order` text DEFAULT 'Nasgor spesial 2 pedas Es lemon tea 2 jangan banyak esnya',
  `kode` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1 COMMENT '1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_stations`
--

INSERT INTO `device_stations` (`id`, `_ctime`, `id_user`, `sender_number`, `sts`, `qr`, `updated`, `key`, `delete`, `session`, `package`, `due_date`, `sender_name`, `link_name`, `list_menu`, `foto_menu`, `foto_menu2`, `best_seller`, `menu_promo`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `story`, `sambutan`, `ig`, `map`, `info`, `jam_op`, `info_tutup`, `jml_hari`, `price_access`, `price_order`, `price_max`, `payment`, `credit`, `owner`, `hp_owner`, `notif_order`, `broadcast`, `file_broadcast`, `tgl_syncron`, `contoh_order`, `kode`, `alamat`, `order`) VALUES
(62, '2023-03-22 01:20:41', NULL, '6285794151322', 2, '[removed]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', '2023-11-18 05:52:08', 'cafe', 0, '', NULL, NULL, 'CAFETARIA', 'cafe', '1. Onion Ring / price Rp 15.000\r\n2. Pisang Goreng / price Rp 15.000\r\n3. Roti Bakar / price Rp 15.000\r\n4. Nasi Goreng / price Rp 25.000\r\n5. Mie Goreng / price Rp 25.000', 'fotmen___04062023143841.jpg', NULL, NULL, NULL, 'g1___29042023212505.jpg', 'g2___29042023232517.jpeg', 'g3___29042023232449.jpeg', 'g4___29042023232517.jpeg', 'g1___14032023102238.jpg', 'Berawal dari profesi owner seagai cheff di hotel bintang 5 maka dari itu kami memutuskan untuk membuat sebuah tempat yang menyajikan makanan yang enak dan juga tempat yang nyaman', 'Terimakasih sudah berkunjung untuk Password wifi : 12345', 'https://instagram.com', 'https://goo.gl/maps/t2SnPqLY7MECm77t9', 'Spesial hari ini ada diskon 10% untuk yang berulang tahun', '{\"1\":{\"open\":\"04:27\",\"close\":\"21:35\"},\"2\":{\"open\":\"01:36\",\"close\":\"23:29\"},\"3\":{\"open\":\"01:17\",\"close\":\"23:17\"},\"4\":{\"open\":\"00:01\",\"close\":\"23:37\"},\"5\":{\"open\":\"00:05\",\"close\":\"23:12\"},\"6\":{\"open\":\"00:05\",\"close\":\"23:31\"},\"7\":{\"open\":\"00:31\",\"close\":\"23:31\"}}', '', 10, 5000, 10000, 100000, NULL, 100000, 'cv', '0852212882105', '{\"1\":\"085221288210\",\"2\":\"\",\"3\":\"\"}', 'tes kirim 3 trer', 'broad___13072023185809.jpg', '2023-04-29 22:40:36', 'Nasgor spesial 2 pedas Es lemon tea 2 jangan banyak esnya', '123', 'kalijati', 1),
(65, '2023-05-28 09:09:34', NULL, '6283165005718', 0, '[removed]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', '2023-08-21 10:36:13', 'nuansa', 0, '', NULL, NULL, 'Nuansa Resto & Cafe', 'nuansa-resto-and-cafe', NULL, 'fotmen___28052023093537.jpeg', 'fotmen2___28052023102245.jpeg', NULL, NULL, 'g1___28052023114736.png', NULL, 'g3___28052023093538.jpeg', 'g4___28052023093538.jpeg', NULL, '', 'Terimakasih sudah berkunjung ', 'https://instagram.com', '', '', '{\"1\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"2\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"3\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"4\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"5\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"6\":{\"open\":\"09:00\",\"close\":\"22:30\"},\"7\":{\"open\":\"09:00\",\"close\":\"22:30\"}}', 'Mohon maaf hari ini kami libur dulu ya kak 😊', 0, 3000, 5000, 100000, NULL, 100000, 'INDRA', '085703042414', '{\"1\":\"085703042414\",\"2\":\"0895805332904\",\"3\":\"\"}', 'hallo {nama}  , kami ada menu baru loh spesial untuk kak {nama}  hari ini ? Kami tunggu kehadiranya ya ?', '', NULL, 'Nasgor spesial 2 pedas Es lemon tea 2 jangan banyak esnya', 'NSAXJT', 'kalijati', 1),
(66, '2023-06-05 15:02:38', NULL, '6285163082099', 0, '[removed]iVBORw0KGgoAAAANSUhEUgAAARQAAAEUCAYAAADqcMl5AAAAAklEQVR4AewaftIAABJfSURBVO3BQY4YybLgQDJR978yR0tfBZDIKLX+GzezP1hrrQse1lrrkoe11rrkYa21LnlYa61LHtZa65KHtda65GGttS55WGutSx7WWuuSh7XWuuRhrbUueVhrrUse1lrrkoe11rrkYa21LvnhI5W/qeINlaliUpkqTlTeqDhRmSpOVE4q3lCZKiaVk4pJZap4Q2WqOFF5o+ImlaniROWkYlL5myq+eFhrrUse1lrrkoe11rrkh8sqblL5omJSmSpOVKaKSWWqOFH5ouINlTdUTireUDmpmComlaliqphUpopJ5aTijYq/qeImlZse1lrrkoe11rrkYa21Lvnhl6m8UfGGylRxUjGpnFScVEwqU8VU8YbKVDGpnFScqEwVk8qkMlVMFZPKGypvqPwmlaniDZXfpPJGxW96WGutSx7WWuuSh7XWuuSH/8+oTBWTyqQyVUwqJyonFW+oTBWTyonKicpU8YbKScWkMlVMKicVb1ScqEwVk8oXFZPK/5KHtda65GGttS55WGutS374H6PyL6uYVKaKN1SmikllqphUTlTeqJhUJpUTlROVqWJSmSomlanijYpJ5Q2VqeJ/ycNaa13ysNZalzystdYlP/yyir+pYlJ5o+KNikllqphUpopJ5aTiC5WTijdUJpWpYlI5qXhDZaqYVN6omFSmiqniRGWquKniX/Kw1lqXPKy11iUPa611yQ+XqfzLKiaVqWJSmSomlaliUpkqJpWpYlI5UZkqTiomlROVqeKkYlKZKiaVE5Wp4ouKSWWqeENlqnhDZao4UfmXPay11iUPa611ycNaa11if/B/mMobFScqU8WJyknFpDJVTCpTxRsqU8WJylTxhspUMamcVLyhMlVMKicVf5PKScX/koe11rrkYa21LnlYa61L7A8+UJkqJpWbKk5U/ksVJypTxaRyUjGpnFScqNxUcaLyRcUbKicVk8pUMam8UfGFyk0Vv+lhrbUueVhrrUse1lrrkh/+sopJ5aTii4pJ5Y2KSWWq+EJlqnij4kTlpOINlanijYpJZap4Q+WmipOKE5UvVE4qJpU3VKaKmx7WWuuSh7XWuuRhrbUusT/4QGWqmFTeqJhUTipOVKaKSWWqeEPlpOINlZOKSeWk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', '2023-07-26 17:38:15', NULL, 0, '', NULL, NULL, 'RESTO PAPAH MUDA BOGA RASA', 'papah_muda', NULL, 'fotmen___05062023153038.jpg', NULL, NULL, NULL, NULL, 'g2___05062023150650.jpg', NULL, NULL, NULL, 'PAPAH MUDA BOGA RASA\nSejak tahun 2017 \n\n\' Dengan Bumbu pilihan, Rasakan Sensasi Rasanya Yang Berkualitas\'', 'Terimakasih sudah berkunjung ☺', 'Papahmuda_bogarasa', 'https://g.co/kgs/qrhV5p', '- Promo of 20%\n', '{\"1\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"2\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"3\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"4\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"5\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"6\":{\"open\":\"09:00\",\"close\":\"21:00\"},\"7\":{\"open\":\"09:00\",\"close\":\"21:00\"}}', 'Mohon maaf hari ini kami libur dulu ya kak ?', 0, 5000, 5000, 100000, NULL, 100000, 'Papah muda', '6285157559328', '{\"1\":\"6285157559328\",\"2\":\"085221288210\",\"3\":\"\"}', 'hallo {nama} , kami ada menu baru loh spesial untuk kak {nama}  hari ini ? Kami tunggu kehadiranya ya \nhuy', '', NULL, 'Nasgor spesial 2 pedas Es lemon tea 2 jangan banyak esnya', 'papah_muda', 'subang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inbox_autoreplay`
--

CREATE TABLE `inbox_autoreplay` (
  `id` int(11) NOT NULL,
  `_ctime` datetime NOT NULL,
  `sender_number` varchar(20) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `msg` mediumtext NOT NULL,
  `to` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox_autoreplay`
--

INSERT INTO `inbox_autoreplay` (`id`, `_ctime`, `sender_number`, `sender_name`, `msg`, `to`) VALUES
(1, '2022-12-21 08:50:22', '6285221288210', 'Cepi', 'halo', NULL),
(2, '2022-12-21 08:51:28', '6285221288210', 'Cepi', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(3, '2022-12-21 09:41:24', '6285221288210', 'Cepi', 'halo', NULL),
(4, '2022-12-21 10:25:17', '6285221288210', 'Cepi', 'halo', NULL),
(5, '2022-12-21 10:31:24', '6285221288210', 'Cepi', 'Sosial Media', NULL),
(6, '2022-12-21 10:31:37', '6285221288210', 'Cepi', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(7, '2022-12-21 10:31:45', '6285221288210', 'Cepi', 'Jawa Barat', NULL),
(8, '2022-12-21 10:32:02', '6285221288210', 'Cepi', 'Karawang', NULL),
(9, '2023-01-04 13:08:44', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(10, '2023-01-04 13:10:54', '62811911992', 'Andi  Perdana Kahar', 'Sosial Media', NULL),
(11, '2023-01-04 13:42:10', '6285221288210', 'Cepi Cahyana', 'Halo', NULL),
(12, '2023-01-04 13:52:31', '6281295439877', 'triana r. herayani', 'mygas', NULL),
(13, '2023-01-04 13:52:46', '6281295439877', 'triana r. herayani', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(14, '2023-01-04 13:58:02', '6282133047277', 'Han', 'mygas', NULL),
(15, '2023-01-04 13:58:15', '6282133047277', 'Han', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(16, '2023-01-04 13:58:22', '6282133047277', 'Han', 'Jawa Barat', NULL),
(17, '2023-01-04 13:58:41', '6282133047277', 'Han', 'Jabodetabek', NULL),
(18, '2023-01-04 14:02:07', '6285221288210', 'Cepi Cahyana', 'Nanti klw ada kendala atau ketidak sesuaian bisa langsung info aja ya bu ke saya', NULL),
(19, '2023-01-04 14:41:03', '6287874204411', 'Nia Bunda Zhaf', 'Siang... Kak mau tanya SPBE mygas ada dimana saja ya?', NULL),
(20, '2023-01-04 14:41:28', '6287874204411', 'Nia Bunda Zhaf', 'Seputar Pertanyaan\nFAQ', NULL),
(21, '2023-01-04 14:42:38', '6287874204411', 'Nia Bunda Zhaf', 'Darimana asal gas LPG myGas ?', NULL),
(22, '2023-01-04 14:42:51', '6287874204411', 'Nia Bunda Zhaf', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(23, '2023-01-04 14:43:42', '6287874204411', 'Nia Bunda Zhaf', 'Jabodetabek', NULL),
(24, '2023-01-04 14:44:03', '6287874204411', 'Nia Bunda Zhaf', 'Jawa Barat', NULL),
(25, '2023-01-04 14:44:23', '6287874204411', 'Nia Bunda Zhaf', 'Banten', NULL),
(26, '2023-01-04 14:44:40', '6287874204411', 'Nia Bunda Zhaf', 'Area Lainnya', NULL),
(27, '2023-01-04 14:44:48', '6287874204411', 'Nia Bunda Zhaf', 'Jawa Tengah', NULL),
(28, '2023-01-04 14:45:28', '6287874204411', 'Nia Bunda Zhaf', 'Menu Utama', NULL),
(29, '2023-01-04 14:45:39', '6287874204411', 'Nia Bunda Zhaf', 'Sosial Media', NULL),
(30, '2023-01-04 14:49:09', '6287874204411', 'Nia Bunda Zhaf', 'Tapi sedang cari lokasi yg cocok', NULL),
(31, '2023-01-04 14:49:14', '6281295439877', 'triana r. herayani', 'mygas', NULL),
(32, '2023-01-04 14:49:23', '6287874204411', 'Nia Bunda Zhaf', 'Alamat Distributor', NULL),
(33, '2023-01-04 14:49:38', '6281295439877', 'triana r. herayani', 'Seputar Pertanyaan\nFAQ', NULL),
(34, '2023-01-04 14:52:03', '6285959676057', 'Kamila', 'Hallo mas kira2 bisa dikirim kapan ya?', NULL),
(35, '2023-01-04 14:53:52', '6287874204411', 'Nia Bunda Zhaf', 'Berapa persen keuntungan distributor?', NULL),
(36, '2023-01-04 16:19:00', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(37, '2023-01-04 16:19:12', '6285221288210', 'Cepi Cahyana', 'lokasi', NULL),
(38, '2023-01-04 16:19:26', '6285221288210', 'Cepi Cahyana', 'lokasi SPL', NULL),
(39, '2023-01-04 16:21:42', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(40, '2023-01-04 16:24:14', '6285221288210', 'Cepi Cahyana', 'lokasi SPL', NULL),
(41, '2023-01-04 16:24:21', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(42, '2023-01-04 16:25:18', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(43, '2023-01-04 16:33:51', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(44, '2023-01-04 16:34:00', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(45, '2023-01-04 16:34:50', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan', NULL),
(46, '2023-01-04 16:34:55', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(47, '2023-01-04 16:35:35', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(48, '2023-01-04 16:35:43', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(49, '2023-01-04 16:36:21', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(50, '2023-01-04 16:36:57', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(51, '2023-01-05 06:34:28', '6285221288210', 'Cepi Cahyana', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(52, '2023-01-05 10:42:38', '6285221288210', 'Cepi Cahyana', 'Jabodetabek', NULL),
(53, '2023-01-05 11:53:06', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(54, '2023-01-05 11:53:13', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(55, '2023-01-05 11:53:21', '62811911992', 'Andi  Perdana Kahar', 'Dimana lokasi SPL myGas ?', NULL),
(56, '2023-01-05 11:56:00', '62811911992', 'Andi  Perdana Kahar', 'Dimana lokasi SPL myGas ?', NULL),
(57, '2023-01-05 11:56:23', '62811911992', 'Andi  Perdana Kahar', 'Bagaimana cara memesan LPG myGas ?', NULL),
(58, '2023-01-05 11:56:38', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(59, '2023-01-05 11:56:47', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(60, '2023-01-05 11:57:08', '62811911992', 'Andi  Perdana Kahar', 'Jawa Barat', NULL),
(61, '2023-01-05 13:57:37', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(62, '2023-01-05 13:57:45', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(63, '2023-01-05 14:29:33', '6281213132725', 'Melly', 'Terlampir ya bu orderannya', NULL),
(64, '2023-01-05 14:29:46', '6281213132725', 'Melly', 'Alamat Distributor', NULL),
(65, '2023-01-05 14:30:06', '6281213132725', 'Melly', 'Jabodetabek', NULL),
(66, '2023-01-05 14:41:33', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(67, '2023-01-05 14:41:44', '62811911992', 'Andi  Perdana Kahar', 'Apakah LPG myGas akan terus ada ?', NULL),
(68, '2023-01-05 14:41:52', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(69, '2023-01-05 15:00:23', '6285221288210', 'Cepi Cahyana', 'Bogor', NULL),
(70, '2023-01-05 15:05:50', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(71, '2023-01-05 15:05:57', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(72, '2023-01-05 15:06:27', '62811911992', 'Andi  Perdana Kahar', 'Sosial Media', NULL),
(73, '2023-01-05 20:24:03', '6285221288210', 'Cepi Cahyana', 'Jabodetabek', NULL),
(74, '2023-01-06 06:10:11', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(75, '2023-01-06 06:10:20', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(76, '2023-01-06 06:10:36', '62811911992', 'Andi  Perdana Kahar', 'Berapa harga isi dan atau harga tabung myGas ?', NULL),
(77, '2023-01-06 10:38:30', '6285221288210', 'Cepi Cahyana', 'Menu Utama', NULL),
(78, '2023-01-06 10:38:37', '6285221288210', 'Cepi Cahyana', 'Halo mygas', NULL),
(79, '2023-01-06 10:38:55', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(80, '2023-01-06 10:39:35', '6285221288210', 'Cepi Cahyana', 'Dimana lokasi SPL myGas ?', NULL),
(81, '2023-01-06 10:45:32', '6285221288210', 'Cepi Cahyana', 'Halo mygas', NULL),
(82, '2023-01-06 10:45:40', '6285221288210', 'Cepi Cahyana', 'Sosial Media', NULL),
(83, '2023-01-06 10:45:48', '6285221288210', 'Cepi Cahyana', 'Halo mygas', NULL),
(84, '2023-01-06 10:46:10', '6285221288210', 'Cepi Cahyana', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(85, '2023-01-06 10:46:25', '6285221288210', 'Cepi Cahyana', 'Banten', NULL),
(86, '2023-01-06 10:46:40', '6285221288210', 'Cepi Cahyana', 'Area Lainnya', NULL),
(87, '2023-01-06 10:46:46', '6285221288210', 'Cepi Cahyana', 'Jawa Barat', NULL),
(88, '2023-01-06 10:46:51', '6285221288210', 'Cepi Cahyana', 'Bandung', NULL),
(89, '2023-01-06 10:46:56', '628121014546', 'Toto', 'Pagi, saya mau beli isi ulang 1 tabung 9kg bisa diantar ke alamat yg biasa?', NULL),
(90, '2023-01-06 10:47:08', '628121014546', 'Toto', 'Jabodetabek', NULL),
(91, '2023-01-06 10:47:14', '628121014546', 'Toto', 'Jakarta Utara', NULL),
(92, '2023-01-06 10:48:39', '628121014546', 'Toto', 'Agar bisa dikirim ke:\nSugiharto\nApartment Mitra Sunter Unit 1101\nBoulevar Mitra Sunter Blok C2\nJl. Yos Sudarso Rt.9 Rw.11\nSunter Jaya, Tanjung Priok\nJakarta Utara 14350\nINDONESIA', NULL),
(93, '2023-01-06 10:48:52', '628121014546', 'Toto', 'Ini alamat saya', NULL),
(94, '2023-01-06 11:17:57', '6281381632337', 'dwi15dwi', 'Info penjualan mygas di area Cikupa Citra Raya?', NULL),
(95, '2023-01-06 11:18:30', '6281381632337', 'dwi15dwi', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(96, '2023-01-06 11:18:43', '6281381632337', 'dwi15dwi', 'Banten', NULL),
(97, '2023-01-06 11:19:27', '6281381632337', 'dwi15dwi', 'Area Lainnya', NULL),
(98, '2023-01-06 11:19:40', '6281381632337', 'dwi15dwi', 'Jabodetabek', NULL),
(99, '2023-01-06 11:19:48', '6281381632337', 'dwi15dwi', 'Tangerang', NULL),
(100, '2023-01-06 11:20:46', '6281381632337', 'dwi15dwi', 'Seputar Pertanyaan\nFAQ', NULL),
(101, '2023-01-06 11:22:16', '6281381632337', 'dwi15dwi', 'Dimana lokasi SPL myGas ?', NULL),
(102, '2023-01-06 11:22:36', '6281381632337', 'dwi15dwi', 'Bagaimana cara memesan LPG myGas ?', NULL),
(103, '2023-01-06 11:22:56', '6281381632337', 'dwi15dwi', 'Sosial Media', NULL),
(104, '2023-01-07 12:03:56', '6281218128190', 'Groy', 'Sy mau jual tabung gas mygas..UK 4.5 ms baru ..kosong..bgmna caranya yah', NULL),
(105, '2023-01-07 12:04:13', '6281218128190', 'Groy', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(106, '2023-01-07 12:04:23', '6281218128190', 'Groy', 'Banten', NULL),
(107, '2023-01-07 12:04:41', '6281218128190', 'Groy', 'Sosial Media', NULL),
(108, '2023-01-09 13:39:50', '6281295439877', 'triana r. herayani', 'mygas', NULL),
(109, '2023-01-09 13:39:57', '6281295439877', 'triana r. herayani', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(110, '2023-01-09 13:40:03', '6281295439877', 'triana r. herayani', 'Jawa Tengah', NULL),
(111, '2023-01-09 13:42:41', '62895360022976', 'Iron Bull', '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCABkAGQDASIAAhEBAxEB/8QAHAAAAQQDAQAAAAAAAAAAAAAAAAEDBAUCBgcI/8QAQBAAAgEDAgMFBgQCBgsAAAAAAQIDAAQRBRIhMUEGEyJRcSMyYYGRoQcUscEVUhZCU3LR8CQlMzREYmOSwuHx/8QAGgEAAgMBAQAAAAAAAAAAAAAAAgUAAQQDBv/EADERAAEDAQYDBwMFAQAAAAAAAAEAAhEDBAUSITFBE3HwIjJRYZGhsYHR4RQkM1KS8f/aAAwDAQACEQMRAD8A9OMcCos64bPQ1IJyawkXchHWhpswhRxkqLRSgEnAHGnkh6t9KNUsBAksTLINysCCPhVTaGSESW7OwlhOwsDgkf1T9Mfer4AAYAxVVq8fc3EN2PdPsZPQnwn68PnSi9qMsFdurdeR+2vKVrsj8yw7/Kf0lp5bQRujmWNu7aTGAQP630+9TV4M67gwU43DrVM07QTwFmJtmbZImeHiwA31wPnVje3AtoRsUNK52Rp5t/hWi66/Hp8PVzcvsfz5Fc7UzA7FsVGvSbjUIIE4iL2jf3jwUffPyqxljjkkEUb7WVe7AZMg/wDv/Co9lbm1RCfay7i8jHhuYjnT8GY0eY4LDwr8WPM/X96ZPI0GgWZo3KykIMgUH2cQwM9T1/z61XHOpyY/4FDx/wCqR/4j70X2ZnisI2PjG+ZuoTr8yf3qwVQqhVACgYAHSiHYE7lUe0Y2S0UUVyRooooqKIAA5CiiiooitT7cdrtK0OB7O6D3V3KnC3hxlQeTMTwX9fIVtleV9U1GW+nutSuiXmnYzP6np6DgB8BWK21uGzDE4sk7uO7m22q51Qw1ufXouhwfiWkqCHUNKcRMu13inDty57So/Wui9k76HW7RdSSdZ9o7pCBjbjmSOhNeYrO/kkuAkgXDcsDlXV/wSu7he0F9Yx+KCa2M7JnHiRlUEfHD/YeVLbD+3rDDuIPXWRKc3xddB1lNajlhzXZXzsO3nQ5DQAxKw7niUbmR5/rQrBlDA+EjOaVGKIZSOLjbGvmPM0/Xi1D02F1jeece3nO9h/KOi/IVMpEXairnOBilonOxGVQECEUUUUKtYl1DYJ41lWDzW7XX5SKWAOEE3cq43FScB8c9uevLNRbjV9Lt4RNcanYRRF2iDvcIq715rknmOoqsQG6MU3kwAptFYQSxXEKTW8sc0LjKyRsGVh8CKi3eqWVtcraPd2355/ctTMqyOTywpOauQqDHEkAaKXLIkMbSSsEReJJNeb+12iPourSwd1ItjOWe1d1wHjzy9RnH0PWvQFqiXlxM1zPHNNbSbHgQ5WFsAgHzOCDn41H7XaBB2j0WWynwsvvwS44xyDkfToR1BNcLXZ21mQ0yR1CZ3PeLrBXl47LsiPgrzPDaQwvvRePxPKup/hj2elSyudTuVMUlzGI7bPAhMht/oSFx8BnrWu/h/wBmG13tLJa6hEyW1jlrtD/MGKiM+pBz8FNdzvY/BFKqgY9m4HIEcjj0/akVWzPdQNQ9Bekvi82MIslHfMn3ATunTC8tElkGyNR7Qf8AMOBX601quq2mmwG81OdYIz4UB4n0AHEn0pu2vnS5jtJUR7eRTtGMHcDkjPpxHpXO9duv4r+Ilvaz7pLSG6itljf+Uld2fUk/ICmdC2YqDXAy7Q8+s15qzWDj1iHZNAJ+ngFsqfiHo7TbWhvkT+0MakfQMT9q2qxvLe/tUubOZJoHGVdDkGuf6V2Tn/pu/wCa0xv4R382Nw8GzDbPl7tQvwu1CSDXJLHcTBcxs+3oHXHH6ZHyHlXSnXqBwFTfJbLVd1ndSc+zHNoBOciDPuIXVKKKK2rz6592Tu7Fu1Glz2UZsrK40BEt45pCSu24bcoZjk4B+lVenNAzaBLcd01pJrl+4aTBRlw+Dx4EZro1/punX9n3WoafbT21umIo5oBtQ8gFBHDkBwqJrVhZPpdrbTWFlMgIWCGW3RkiyQBtBHDhWZtmc4hoI6hNzeVIEug5/XKHDXc5+yqOx8az6z2lGmyCHSfzMJj/AC/ud9s9qFPIcducdc1R6vHYWMOvXwj0/WNHe9Y3sU26C8gk3AFUc4LAHiBwPka6VBFFbwpDbxRwwoMLHGoVVHwAqJcaNpVzfLe3GmWUt4pBEzwKXyORzjmKJ1IlgaPP3XOlbmNrGoQYIA5xHKCYmQcj4rR9U1a80251oad3qtea5DbtIhRXVDboTtMnhDHGMtyz51nHe6+93pWm3d9d2gl1KWASCSB5zEIdwVym5dwOeOM8jit8msrOeK5ims7aSO5O6dWiUiU4AywxxPAc/IU3a6Zp9pHBHa6fZwpAxeIJCo7tiMFl4cCR1oOA6depRi8KWCOGJ8YnaAfxC5x2et7nSri51G31G4M0naMadcKyptuI+8Cbn8Od+GzkEDPTJJNi+vX39IbKeC8uZrK51c6e0cpiWIqNwIWMZYFSB4yQT5cRW9iztApUWdqFM35kjulwZc57zl72eO7nUYaNpYvXvV0yxF4ziQz9wu/eOIbOOeetT9O4CAURvGk9xc9knTQdZdeWg6DqWqi27MahPqt1cHUL2a1lgl2mPYGkAI4ZyNo45+HKme0cC6d2s07XWDDT7meKZmAzsdSNyn4+HP18q6FPZ2sNvaGCztUihYtGiwqBDJxyyjHAnJ4j96gC0t7xLvS7xd1vdAyJ5huuPIg4YfOlj6mCuKJ3+dvXMcyFpp21uI1mtgZggf1JPuMvRaLpXaNIO276jPc3B04zzOFyT4WDbfD8xVh+FmkyPdTatKpWFVMMOR7xJ8RHwGMfM+Va/p3Zye47WNoszHELkzSKMezGDkeRIZR8N1dmt4YraCOGBFjijUKqKMAAdK2Wam57sTtj7rve1qp0KfDo6vaP8iY+pn0TlFFFMV5dAMg92Z/Q4NNXCpOpeZAZYWUqw6nPDh8/vTtY+DuF3SBGkbvBuGQQOA/apMKLKikBIYq23OAwKnIIP/ylqKIoooqKIoooqKLBlDB43OEkHPybp/n4VWdyn5qLv9ymN87lOCDy/ergAFSCAfOqF4vyl9Lb8o3zLF6E+IfI/rSO9SA5j8Oh/IW6y5giVZQ6fax6hNfCFVvnQQyyDOWVeXw6/pUqmbWXeqsTx9xvXofpw+VPkYNNaFQPbI0Oay1cU9rbJJRQSBzIFFd1zSSAmNgpwSCBTdvOl0gniBEZG1AfIU7Vc3+rZdw/3Jz4h/ZMev8AdP2o2txZboSYz2U9QMIjHY6jarH3WHQHypclW2yDa/l5+lLwI6EGkDOIljkRXjUBcdeHXPnQIktFImdvi5/Hy6Uzd3K24UbWklc4SNebGrAJMBUTGZT9FQNl9cf7SRLVP5Y/E/8A3HgPpQbLjhr+788b1H7UeADUocR2CsAcGqfVDLesZLNVZbQlt2OMh6ovy++Kkfw+OVcPcXUqdVaU4PrU2FESEJHiKBOGQPsPjWW1WdlamWak5cvPmNl1pVHMcD4KusJlfGG9nKBhvLqDVoCWQEjDciPI9appysV61ukKwoEDRgdV5H55/UVaW8u9Vcn3vC3wYdfmKU3fVLS6iTJaf+/da7QyYeNCmbqMtJnY7cP6poqYRx4UU6DwRMrHBWNIyhlKsAVIwQetFFEqULQyTpNsSc+H96nUUV0q993MoGd0Iqt0n/SHnupeMu9ox5KoPIUUVbO45R3eCsqb2K6kMOc6g+m0cKKK5I0szEfmHHvAn7CnGAW4EY92NBtHrnj9qKKF/dKsaqt15QFtJR76zBQfgwII/T6Utq5CzL0K5+YIxRRXnW5W7Ly+EwP8HXirSiiimiyr/9k=', NULL),
(112, '2023-01-09 16:13:04', '6281211121220', 'myGas Commercial', 'BEGIN:VCARD\nVERSION:3.0\nN:Cuan;Okta PT. Jujur;Pangkal;;\nFN:Okta PT. Jujur Pangkal Cuan\nORG:myGas by JURAGAN\nTITLE:\nitem1.TEL;waid=6282122880070:+62 821-2288-0070\nitem1.X-ABLabel:Ponsel\nX-WA-BIZ-DESCRIPTION:Jam Operasional Kantor : 8.00-17.00\nX-WA-BIZ-NAME:Okta PT. Jujur Pangkal Cuan\nEND:VCARD', NULL),
(113, '2023-01-09 17:03:17', '6282122880070', 'myGas by JURAGAN', 'Hai, order / message Anda telah kami terima. Akan kami balas secepatnya di jam operasional kami. Terima Kasih 😊', NULL),
(114, '2023-01-10 09:19:55', '6282283294420', 'Desiaty', 'Pagi pak, saya mau pesen gas yg 12 kg, alamat saya di pulogebang cakung', NULL),
(115, '2023-01-10 09:20:07', '6282283294420', 'Desiaty', 'Jabodetabek', NULL),
(116, '2023-01-10 09:20:14', '6282283294420', 'Desiaty', 'Jakarta Timur', NULL),
(117, '2023-01-10 09:22:19', '6281211121220', 'myGas Commercial', 'BEGIN:VCARD\nVERSION:3.0\nN:Semesta;Harefa PT. Garuda;Abadi;;\nFN:Harefa PT. Garuda Abadi Semesta\nitem1.TEL;waid=6281315190213:+62 813-1519-0213\nitem1.X-ABLabel:Ponsel\nX-WA-BIZ-DESCRIPTION:Pengantaran akan kami lakukan H-1 order , Jam operasional untuk melakukan pemesanan dihari Senin-Jumat pukul 09:00 - 17:00. Pengantaran terahkir di hari Sabtu. (Minggu / Tanggal Merah libur) Kami tidak menerima orderan lewat dari jam tersebut 🙏\nX-WA-BIZ-NAME:Harefa PT. Garuda Abadi Semesta\nEND:VCARD', NULL),
(118, '2023-01-10 15:50:27', '6285214074584', 'Tiurma Elizabeth Fairra', 'Soalnya ini tabung milik tenant saya ..dan saya membantu mencari Supplier Gas My Gas...dikarenakan beliau tenant saya tidak diindonesia lg mereka mau jual tabung ksoongy', NULL),
(119, '2023-01-10 16:24:00', '628129742345', 'Erna Ervina', 'Halo', NULL),
(120, '2023-01-10 16:37:23', '628118222929', 'Nicolas Andre', 'Ga pernah supply selama saya kerja di emsi', NULL),
(121, '2023-01-10 16:56:07', '6285214074584', 'Tiurma Elizabeth Fairra', 'atas nama tersebut belinya infonya di Kiospee', NULL),
(122, '2023-01-10 16:57:42', '6285214074584', 'Tiurma Elizabeth Fairra', 'klo supplier tabung gas lain.. kita mau jual bisa kok memang klo ga dipakai lagi...', NULL),
(123, '2023-01-10 19:30:51', '62818812007', 'Wilson Wantjik', 'Halo selamat malam', NULL),
(124, '2023-01-10 19:31:01', '62818812007', 'Wilson Wantjik', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(125, '2023-01-10 19:31:08', '62818812007', 'Wilson Wantjik', 'Jabodetabek', NULL),
(126, '2023-01-10 19:31:13', '62818812007', 'Wilson Wantjik', 'Jakarta Utara', NULL),
(127, '2023-01-11 09:29:35', '628111703883', 'myGas LPG', 'kmren saya konfrim dengan pak andre info nya di kasih ke bmu', NULL),
(128, '2023-01-12 14:06:02', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(129, '2023-01-12 14:06:11', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(130, '2023-01-12 16:18:04', '62811911992', 'Andi  Perdana Kahar', 'Darimana asal gas LPG myGas ?', NULL),
(131, '2023-01-13 13:39:10', '6281295439877', 'triana r. herayani', 'mygas', NULL),
(132, '2023-01-13 14:08:44', '628129326150', 'Bonar-Telkomsel', 'Mygas', NULL),
(133, '2023-01-13 14:08:54', '628129326150', 'Bonar-Telkomsel', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(134, '2023-01-13 14:09:01', '628129326150', 'Bonar-Telkomsel', 'Jabodetabek', NULL),
(135, '2023-01-13 14:09:08', '628129326150', 'Bonar-Telkomsel', 'Jakarta Utara', NULL),
(136, '2023-01-17 10:04:13', '6285221288210', 'Cepi Cahyana', 'halo', NULL),
(137, '2023-01-17 10:06:31', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(138, '2023-01-17 10:06:41', '6285221288210', 'Cepi Cahyana', 'Berapa harga isi dan atau harga tabung myGas ?', NULL),
(139, '2023-01-17 10:29:39', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(140, '2023-01-17 10:29:48', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(141, '2023-01-17 10:30:08', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(142, '2023-01-17 10:30:16', '62811911992', 'Andi  Perdana Kahar', 'Jawa Barat', NULL),
(143, '2023-01-17 10:30:25', '62811911992', 'Andi  Perdana Kahar', 'Bandung', NULL),
(144, '2023-01-17 10:31:01', '62811911992', 'Andi  Perdana Kahar', 'Menu Utama', NULL),
(145, '2023-01-17 10:40:49', '6281213132725', 'Melly', 'baik bu, terimakasih infonya', NULL),
(146, '2023-01-17 11:46:56', '628129943041', 'Intaha', 'Intaha Ishaq\nCipinang Muara Rt 6/Rw 4, no 21, jln BB. \n08129943041\nintahaishaq@gmail.com\n\nSaya ingin mendaftar pelanggan PGN, karena dikelurahan ini sedang ada galian masal termasuk sekeliling rumah saya. Saat yg lalu ketua RT tidak memberi informasi kpd saya tentang pendaftaran massal. \nMumpung sedang digali, saya ingin segera mendaftar, bagaimana syaratnya dan kemana saya harus datang? \nTerima kasih.', NULL),
(147, '2023-01-17 15:59:46', '628121021062', 'Eddy', 'Tutup jam brp ya', NULL),
(148, '2023-01-18 09:51:34', '628129135388', 'Rio Suharto', 'Saya tertarik dgn iklan Gas dari Internet browsing.  Karena bisnis di LPG. Kamiohon ijin untukendpaarkan informasi, apakah Bhakti Mingas ini bergerak dalam Importir LPG ke Lokal Indonesia?', NULL),
(149, '2023-01-18 09:51:51', '628129135388', 'Rio Suharto', 'Seputar Pertanyaan\nFAQ', NULL),
(150, '2023-01-18 09:52:18', '628129135388', 'Rio Suharto', 'Darimana asal gas LPG myGas ?', NULL),
(151, '2023-01-18 09:52:29', '628129135388', 'Rio Suharto', 'Seputar Pertanyaan\nFAQ', NULL),
(152, '2023-01-18 09:52:40', '628129135388', 'Rio Suharto', 'Darimana asal gas LPG myGas ?', NULL),
(153, '2023-01-18 09:59:37', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(154, '2023-01-18 10:00:16', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(155, '2023-01-18 10:00:21', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(156, '2023-01-18 10:00:27', '62811911992', 'Andi  Perdana Kahar', 'Jakarta Selatan', NULL),
(157, '2023-01-18 10:00:53', '62811911992', 'Andi  Perdana Kahar', 'Kembali', NULL),
(158, '2023-01-18 10:01:03', '62811911992', 'Andi  Perdana Kahar', 'Sosial Media', NULL),
(159, '2023-01-18 10:01:27', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(160, '2023-01-18 10:01:37', '62811911992', 'Andi  Perdana Kahar', 'Tindakan bila terjadi kebocoran tabung ?', NULL),
(161, '2023-01-18 10:03:14', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(162, '2023-01-18 10:03:18', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(163, '2023-01-18 10:03:23', '62811911992', 'Andi  Perdana Kahar', 'Jakarta Selatan', NULL),
(164, '2023-01-18 11:05:00', '6285624951277', 'Patau Sitting', 'Selamat pagi ....\nPenjualan myGas u/area sukabumi sekitaran mana ya ?', NULL),
(165, '2023-01-18 11:10:00', '6285624951277', 'Patau Sitting', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(166, '2023-01-18 11:10:26', '6285624951277', 'Patau Sitting', 'Jawa Barat', NULL),
(167, '2023-01-18 11:10:50', '6285624951277', 'Patau Sitting', 'Cianjur', NULL),
(168, '2023-01-18 11:11:49', '6285624951277', 'Patau Sitting', 'Menu Utama', NULL),
(169, '2023-01-18 11:12:11', '6285624951277', 'Patau Sitting', 'Seputar Pertanyaan\nFAQ', NULL),
(170, '2023-01-18 11:16:07', '6285624951277', 'Patau Sitting', 'Kami punya banyak tabung kosong myGas, sdh tidak terpakai karena usaha kami terhenti   disebbkan sesuatu hal....\n\nPertanyaan kami... bisa dijual kemana tabung2 myGas kosong tersebut', NULL),
(171, '2023-01-18 13:56:02', '628119503088', 'Syamsul Falah', 'Super hero lg enak badan', NULL),
(172, '2023-01-19 09:48:21', '6282133047277', 'Han', 'Halo mygas center', NULL),
(173, '2023-01-20 07:50:24', '6281317264251', 'Jumin', 'Dengan mygas9', NULL),
(174, '2023-01-20 07:50:35', '6281317264251', 'Jumin', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(175, '2023-01-20 07:50:46', '6281317264251', 'Jumin', 'Jawa Barat', NULL),
(176, '2023-01-20 07:51:16', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(177, '2023-01-20 07:51:25', '6281317264251', 'Jumin', 'Bekasi', NULL),
(178, '2023-01-20 07:51:36', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(179, '2023-01-20 07:51:43', '6281317264251', 'Jumin', 'Bogor', NULL),
(180, '2023-01-20 07:52:56', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(181, '2023-01-20 07:53:00', '6281317264251', 'Jumin', 'Jakarta Timur', NULL),
(182, '2023-01-20 07:53:05', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(183, '2023-01-20 07:53:13', '6281317264251', 'Jumin', 'Bekasi', NULL),
(184, '2023-01-20 07:53:21', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(185, '2023-01-20 07:53:51', '6281317264251', 'Jumin', 'Menu Utama', NULL),
(186, '2023-01-20 07:53:59', '6281317264251', 'Jumin', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(187, '2023-01-20 07:54:04', '6281317264251', 'Jumin', 'Jawa Barat', NULL),
(188, '2023-01-20 07:54:21', '6281317264251', 'Jumin', 'Jabodetabek', NULL),
(189, '2023-01-20 07:54:27', '6281317264251', 'Jumin', 'Bogor', NULL),
(190, '2023-01-20 09:09:14', '6281317264251', 'Jumin', 'Saya belum berlangganan,jadi tabung saya dapat dari tempat usaha saya yg sudah tutup,dulu yang selalu pesan itu bukan saya', NULL),
(191, '2023-01-20 09:09:45', '62811810567', 'taufik', 'sebelumnya saya biasanya beli langsung d distributor yg di kelapa dua tangerang', NULL),
(192, '2023-01-20 09:11:58', '62811810567', 'taufik', 'Banten', NULL),
(193, '2023-01-20 09:12:12', '62811810567', 'taufik', 'Jabodetabek', NULL),
(194, '2023-01-20 09:12:19', '62811810567', 'taufik', 'Tangerang', NULL),
(195, '2023-01-20 09:24:12', '6281399378111', 'فوزي', 'Ya betul dia pelanggan kami..biasa diambil ke sini karna klo antar kejauhan order 1tab dri kelapa dua', NULL),
(196, '2023-01-20 10:31:39', '6281399378111', 'فوزي', 'Alamat Distributor', NULL),
(197, '2023-01-21 17:49:35', '6281213091991', 'nadia susanto', 'halo', NULL),
(198, '2023-01-21 17:49:46', '6281213091991', 'nadia susanto', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(199, '2023-01-21 17:49:52', '6281213091991', 'nadia susanto', 'Banten', NULL),
(200, '2023-01-21 17:50:00', '6281213091991', 'nadia susanto', 'Area Lainnya', NULL),
(201, '2023-01-21 17:50:05', '6281213091991', 'nadia susanto', 'Jabodetabek', NULL),
(202, '2023-01-21 17:50:13', '6281213091991', 'nadia susanto', 'Tangerang', NULL),
(203, '2023-01-21 17:51:10', '6281213091991', 'nadia susanto', 'Jabodetabek', NULL),
(204, '2023-01-21 17:51:16', '6281213091991', 'nadia susanto', 'Jakarta Barat', NULL),
(205, '2023-01-23 13:58:57', '6281388360999', 'Rohady', 'halo', NULL),
(206, '2023-01-23 13:59:25', '6281388360999', 'Rohady', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(207, '2023-01-23 13:59:34', '6281388360999', 'Rohady', 'Jabodetabek', NULL),
(208, '2023-01-23 13:59:39', '6281388360999', 'Rohady', 'Jakarta Barat', NULL),
(209, '2023-01-23 16:32:18', '6281388360999', 'Rohady', 'Menu utama', NULL),
(210, '2023-01-24 08:41:33', '6281388360999', 'Rohady', 'pagi bapak/ibu customer care mygas, terima kasih untuk respon nya', NULL),
(211, '2023-01-24 08:44:23', '6281388360999', 'Rohady', 'saya hanya mau memastikan saja bahwa memang tabung gas mygas spt ini, sebelumnya saya beli tabungnya bersih. Dan dapat saya informasikan juga utk karet merah yg di bag tempat pasang regulator kl bisa pas pengisian resmi dari mygas diganti sekalian, bukan karet merah yg bekas tabung sebelumnya', NULL),
(212, '2023-01-24 13:51:25', '6281277735799', 'Bersyukur..', 'Waktu itu bekas karyawan bluegas,yg menghubungi saya,dateng kerumah.. skrg di Bekasi,hilang no.hp nya ..saya lupa', NULL),
(213, '2023-01-24 13:53:16', '6281277735799', 'Bersyukur..', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(214, '2023-01-24 13:53:35', '6281277735799', 'Bersyukur..', 'Jabodetabek', NULL),
(215, '2023-01-24 13:53:44', '6281277735799', 'Bersyukur..', 'Jakarta Timur', NULL),
(216, '2023-01-24 13:53:56', '6281277735799', 'Bersyukur..', 'Menu Utama', NULL),
(217, '2023-01-24 13:54:12', '6281277735799', 'Bersyukur..', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(218, '2023-01-24 13:54:22', '6281277735799', 'Bersyukur..', 'Jabodetabek', NULL),
(219, '2023-01-24 13:54:29', '6281277735799', 'Bersyukur..', 'Jakarta Timur', NULL),
(220, '2023-01-24 13:54:32', '6281277735799', 'Bersyukur..', 'Jabodetabek', NULL),
(221, '2023-01-24 13:54:42', '6281277735799', 'Bersyukur..', 'Jakarta Timur', NULL),
(222, '2023-01-24 13:54:47', '6281277735799', 'Bersyukur..', 'Jabodetabek', NULL),
(223, '2023-01-24 13:55:04', '6281277735799', 'Bersyukur..', 'Jakarta Timur', NULL),
(224, '2023-01-24 13:55:08', '6281277735799', 'Bersyukur..', 'Menu Utama', NULL),
(225, '2023-01-25 23:46:15', '6281213132725', 'Melly', 'Bukti pembayaran 6 tabung gas 50kg - Whiterabit Elyxium', NULL),
(226, '2023-01-26 10:52:54', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(227, '2023-01-26 10:53:10', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(228, '2023-01-26 10:58:13', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(229, '2023-01-26 11:00:11', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(230, '2023-01-26 11:00:16', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(231, '2023-01-26 11:00:25', '62811911992', 'Andi  Perdana Kahar', 'Jakarta Timur', NULL),
(232, '2023-01-26 11:01:41', '62811911992', 'Andi  Perdana Kahar', 'Menu Utama', NULL),
(233, '2023-01-26 11:01:59', '628119503088', 'Syamsul Falah', 'MyGas', NULL),
(234, '2023-01-26 11:02:59', '6288298038647', 'Andreas', 'MyGas', NULL),
(235, '2023-01-26 11:04:07', '6288801006934', 'Arshaka Abyan Virendra', 'Mygas', NULL),
(236, '2023-01-26 11:04:08', '6287856068032', 'Mohammad Subhan', 'Mygas', NULL),
(237, '2023-01-26 11:07:57', '6283874216641', 'Syamsulfalah', 'MyGas', NULL),
(238, '2023-01-26 11:26:48', '6285817618451', 'Iwan 🇮🇩', 'MyGas', NULL),
(239, '2023-01-26 21:24:09', '6288809382014', 'Maya', 'Terima kasih info y', NULL),
(240, '2023-01-27 11:19:08', '6281382935853', 'Gajelas', 'owhiya tabung bisa sekalian pinjam ga ya pak ?', NULL),
(241, '2023-01-27 11:23:16', '6281382935853', 'Gajelas', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(242, '2023-01-27 11:23:23', '6281382935853', 'Gajelas', 'Jabodetabek', NULL),
(243, '2023-01-27 11:24:01', '6281382935853', 'Gajelas', 'Jakarta Timur', NULL),
(244, '2023-01-27 11:24:10', '6281382935853', 'Gajelas', 'Jabodetabek', NULL),
(245, '2023-01-27 19:21:29', '628121014546', 'Toto', 'Malam, mau pesan mygas isi ulang 9kg', NULL),
(246, '2023-01-27 19:21:45', '628121014546', 'Toto', 'Agar bisa dikirim ke:\nSugiharto\nApartment Mitra Sunter Unit 1101\nBoulevar Mitra Sunter Blok C2\nJl. Yos Sudarso Rt.9 Rw.11\nSunter Jaya, Tanjung Priok\nJakarta Utara 14350\nINDONESIA', NULL),
(247, '2023-01-28 09:28:02', '6281290000030', 'Muhamad Adib', 'Mau tanya untuk my gas 12 kg berapa untuk jakarta utara', NULL),
(248, '2023-01-28 09:28:32', '6281290000030', 'Muhamad Adib', 'Menu utama', NULL),
(249, '2023-01-30 12:07:48', '6281119087115', 'Authentique Group', 'saya mau tukar gas Mygas 12 kg refill', NULL),
(250, '2023-01-30 12:08:01', '6281119087115', 'Authentique Group', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(251, '2023-02-02 23:55:00', '6285221288210', 'Cepi Cahyana', 'MENU UTAMA', NULL),
(252, '2023-02-02 23:55:22', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(253, '2023-02-03 10:28:44', '6285221288210', 'Cepi Cahyana', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(254, '2023-02-03 11:35:58', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(255, '2023-02-03 14:02:50', '6285156610645', 'waygamma', 'Halo permisi pak, saya wahyu mitra mygas tambun mau isi ulang mygas apakah bisa?', NULL),
(256, '2023-02-03 14:03:19', '6285156610645', 'waygamma', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(257, '2023-02-03 14:03:30', '6285156610645', 'waygamma', 'Jabodetabek', NULL),
(258, '2023-02-03 14:03:39', '6285156610645', 'waygamma', 'Bekasi', NULL),
(259, '2023-02-03 16:11:58', '6285156610645', 'waygamma', 'myGas Tambun', NULL),
(260, '2023-02-03 16:46:41', '6282138849854', '.', 'Harga ini mungkin mitra nya HI', NULL),
(261, '2023-02-03 16:53:14', '6282138849854', '.', 'Iya bener mitra nya HI', NULL),
(262, '2023-02-03 16:53:25', '6285156610645', 'waygamma', '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', NULL),
(263, '2023-02-04 06:20:46', '628121021062', 'Eddy', 'Mau tanya dong, hr ini mygas buka gak? Tks', NULL),
(264, '2023-02-05 18:00:07', '6285221288210', 'Cepi Cahyana', 'Mygas', NULL),
(265, '2023-02-05 18:00:17', '6285221288210', 'Cepi Cahyana', 'Halo', NULL),
(266, '2023-02-06 22:20:56', '6281380896120', 'Twogather Wedding Planner', 'Kepada Yth : Mr. Rinaldi Kurniawan\n\nKami Twogather Wedding Planner, telah ditugaskan oleh pasangan *Steven Reinaldo & Cindy Regina*\nPutra dari *Bapak Danie Mulya Havianto & Ibu Nissa Liana Halim*\n&\nPutri dari *Bapak Yanto Teguh & Ibu Yenny Limiaty*\n\nUntuk mendapatkan konfirmasi kehadiran Bapak/Ibu, di acara pernikahan mereka yang diadakan pada: \n\nKamis, 23 Februari 2023\nPukul 18.30 WIB \nFairmont Hotel – Grand Ballroom\n\nDress Code :  \nMan Formal Attire (No Batik)\nWoman Evening Gown (No White)\n\nMohon konfirmasi kehadiran Bapak/Ibu dapat diberikan sebelum tanggal 8 Februari 2023, dengan format: \n\nJumlah pax : 1 pax\nAtas nama:\n1. \n\n\nMohon untuk dapat diinformasikan apabila bapak/ibu memiliki alergi tertentu terhadap makanan \nPilih salah satu : *Tidak ada alergi/Vegetarian/No beef/No Seafood/No pork*\n-\n\n\nMohon bantuan dari Bapak/Ibu untuk merevisi nama apabila ada yang kurang tepat dalam pengejaannya. \n\nAtas perhatiannya kami ucapkan terima kasih\n\nSalam,\nTwogather Wedding Planner', NULL),
(267, '2023-02-08 13:42:09', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(268, '2023-02-08 13:42:25', '62811911992', 'Andi  Perdana Kahar', 'Sosial Media', NULL),
(269, '2023-02-08 13:49:43', '6285221288210', 'Cepi Cahyana', 'halo', NULL),
(270, '2023-02-13 09:53:39', '628111703883', 'myGas LPG', 'iya pak tapi sudah lama tdak order ( off )', NULL),
(271, '2023-02-13 11:02:27', '6285221288210', 'Cepi Cahyana', 'Seputar Pertanyaan\nFAQ', NULL),
(272, '2023-02-13 11:15:33', '6285777691698', '🥰Habiboy & Hana🥰', 'Klo mau tambah stok,,klo gak mau ambil sendiri ke ruko bogor,,cust ya lain juga gtu pada mau ambil sendiri apalagi cust rumahan', NULL),
(273, '2023-02-13 11:23:38', '6281384519966', 'Nani', 'Halo ka,', NULL),
(274, '2023-02-13 11:23:56', '6281384519966', 'Nani', 'Saya nani di pondok aren, tangerang selatan. Mau tanya store yg jual gas my gas dimana ya?', NULL),
(275, '2023-02-13 11:24:14', '6281384519966', 'Nani', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(276, '2023-02-13 11:24:21', '6281384519966', 'Nani', 'Jabodetabek', NULL),
(277, '2023-02-13 11:24:28', '6281384519966', 'Nani', 'Tangerang', NULL),
(278, '2023-02-13 11:24:36', '6281384519966', 'Nani', 'Jabodetabek', NULL),
(279, '2023-02-13 13:59:59', '628111703883', 'myGas LPG', 'sama pak bogor juga kami blm ada rute saya maish tanyakan dengan pak andre ya pak', NULL),
(280, '2023-02-13 14:02:00', '628111703883', 'myGas LPG', 'Menu Utama', NULL),
(281, '2023-02-13 14:02:22', '628111703883', 'myGas LPG', 'Jabodetabek', NULL),
(282, '2023-02-13 14:48:18', '628111703883', 'myGas LPG', 'ngak bisa di oper ke distributor lain pak ?', NULL),
(283, '2023-02-13 14:52:37', '628111703883', 'myGas LPG', 'saya kurang tau juga distributor mana , saya masih konfrim pak andre cuma pak andre nya lagi tdak di tempat jadi agak lama pak', NULL),
(284, '2023-02-14 10:57:39', '628176580056', 'HSA', 'Hallo', NULL),
(285, '2023-02-14 10:57:57', '628176580056', 'HSA', 'Seputar Pertanyaan\nFAQ', NULL),
(286, '2023-02-14 10:58:09', '628176580056', 'HSA', 'Apa bedanya LPG myGas dengan LPG merk lain ?', NULL),
(287, '2023-02-14 10:58:21', '628176580056', 'HSA', 'Seputar Pertanyaan\nFAQ', NULL),
(288, '2023-02-14 10:58:26', '628176580056', 'HSA', 'Apakah valve untuk LPG myGas berbeda ?', NULL),
(289, '2023-02-14 10:58:36', '628176580056', 'HSA', 'Seputar Pertanyaan\nFAQ', NULL),
(290, '2023-02-14 10:58:43', '628176580056', 'HSA', 'Tindakan bila terjadi kebocoran tabung ?', NULL),
(291, '2023-02-14 10:59:04', '628176580056', 'HSA', 'Tanya yang lain ?', NULL),
(292, '2023-02-14 10:59:18', '628176580056', 'HSA', 'Berapa harga isi dan atau harga tabung myGas ?', NULL),
(293, '2023-02-14 10:59:23', '628176580056', 'HSA', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(294, '2023-02-14 10:59:28', '628176580056', 'HSA', 'Banten', NULL),
(295, '2023-02-14 10:59:33', '628176580056', 'HSA', 'Area Lainnya', NULL),
(296, '2023-02-14 10:59:37', '628176580056', 'HSA', 'Jabodetabek', NULL),
(297, '2023-02-14 10:59:45', '628176580056', 'HSA', 'Tangerang', NULL),
(298, '2023-02-15 15:22:14', '6281318490608', 'eva nainggolan', 'Ibu, maaf, saya mau tanya, apakah saya harus kasih info KTP dan Photo ID saya pada pada marketing nya', NULL),
(299, '2023-02-15 15:24:06', '6281318490608', 'eva nainggolan', 'BEGIN:VCARD\nVERSION:3.0\nN:Mygas;Marketing;;;\nFN:Marketing Mygas\nitem1.TEL;waid=6282138849854:+62 821-3884-9854\nitem1.X-ABLabel:Mobile\nEND:VCARD', NULL),
(300, '2023-02-16 09:21:54', '6285221288210', 'Cepi Cahyana', 'Jd bisa mendapatkan informasi mengenai grafik penjualan bu', NULL),
(301, '2023-02-16 09:56:42', '628179800697', 'Handono', 'Saya mau order 2 tabung', NULL),
(302, '2023-02-16 09:56:53', '628179800697', 'Handono', 'Alamat Distributor', NULL),
(303, '2023-02-16 09:57:02', '628179800697', 'Handono', 'Jabodetabek', NULL),
(304, '2023-02-16 09:57:11', '628179800697', 'Handono', 'Jakarta Utara', NULL),
(305, '2023-02-16 09:57:22', '628179800697', 'Handono', 'Menu utama', NULL),
(306, '2023-02-16 09:57:31', '628179800697', 'Handono', 'Jabodetabek', NULL),
(307, '2023-02-16 11:56:35', '6282122828992', 'Sr Fabiola OSA', 'Tapi kami setiap bulan order gas kisaran 2-4 ton gas LPG', NULL),
(308, '2023-02-16 11:56:51', '6282122828992', 'Sr Fabiola OSA', 'Alamat Distributor', NULL),
(309, '2023-02-16 11:57:10', '6282122828992', 'Sr Fabiola OSA', 'Banten', NULL),
(310, '2023-02-16 11:57:31', '6282122828992', 'Sr Fabiola OSA', 'Menu Utama', NULL),
(311, '2023-02-16 11:58:06', '6282122828992', 'Sr Fabiola OSA', 'Area Lainnya', NULL),
(312, '2023-02-16 11:58:59', '6282122828992', 'Sr Fabiola OSA', 'Jabodetabek', NULL),
(313, '2023-02-16 11:59:17', '6282122828992', 'Sr Fabiola OSA', 'Tangerang', NULL),
(314, '2023-02-16 12:00:20', '6282122828992', 'Sr Fabiola OSA', 'Terima kasih atas infonya', NULL),
(315, '2023-02-16 21:32:50', '628176580056', 'HSA', 'Menu Utama', NULL),
(316, '2023-02-16 21:33:00', '628176580056', 'HSA', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(317, '2023-02-16 21:33:09', '628176580056', 'HSA', 'Jabodetabek', NULL),
(318, '2023-02-16 21:33:22', '628176580056', 'HSA', 'Jakarta Selatan', NULL),
(319, '2023-02-16 21:33:30', '628176580056', 'HSA', 'Jabodetabek', NULL),
(320, '2023-02-16 21:33:40', '628176580056', 'HSA', 'Tangerang', NULL),
(321, '2023-02-16 21:33:49', '628176580056', 'HSA', 'Menu Utama', NULL),
(322, '2023-02-16 21:34:07', '628176580056', 'HSA', 'Seputar Pertanyaan\nFAQ', NULL),
(323, '2023-02-16 21:34:50', '628176580056', 'HSA', 'Berapa harga isi dan atau harga tabung myGas ?', NULL),
(324, '2023-02-17 09:38:13', '62895410622054', 'BROSURS', 'Di Bekasi gak ada pengisiannya', NULL),
(325, '2023-02-17 09:50:13', '62895410622054', 'BROSURS', 'Menu Utama', NULL),
(326, '2023-02-17 09:50:14', '62895410622054', 'BROSURS', 'Jabodetabek', NULL),
(327, '2023-02-17 09:50:53', '62895410622054', 'BROSURS', 'Bekasi', NULL),
(328, '2023-02-17 14:37:13', '62895410622054', 'BROSURS', 'Daerah Bekasi selatan', NULL),
(329, '2023-02-17 16:39:18', '62859106515331', 'Sesilia N.', 'Ada kebutuhan gas lpg 50 kg untuk perusahaan \nApakah saya dapat langsung beli ke Mygas?', NULL),
(330, '2023-02-17 16:40:06', '62859106515331', 'Sesilia N.', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(331, '2023-02-17 16:40:11', '62859106515331', 'Sesilia N.', 'Jabodetabek', NULL),
(332, '2023-02-17 16:40:17', '62859106515331', 'Sesilia N.', 'Bekasi', NULL),
(333, '2023-02-17 17:25:00', '6281295175495', 'Met', 'Halo sore', NULL),
(334, '2023-02-18 09:58:06', '6289608322860', 'Trix House', 'Selamat Siang Bapak/Ibu, Jika anda membutuhkan tempat menginap di Kota Malang, Trix House adalah pilihan yang tepat. Kami adalah Guest House terbaru yang terletak di tengah Kota Malang: Jalan Cikampek No.31, Malang. Dengan lokasi yang strategis, aman, nyaman dan harga yang terjangkau pastikan memilih Trix house untuk kebutuhan liburan keluarga atau kepentingan lain. Tipe kamar yang tersedia saat ini mulai dari standard (maks 2 orang), superior deluxe (maks 3 orang), dan double decker (maks untuk 4 orang). Untuk info lebih lanjut bisa visit Instagram kami di @trixhousemalang dan untuk reservasi bisa menghubungi Whatsapp kami di http://wa.me/6289608322860 Terimakasih.', NULL),
(335, '2023-02-20 11:17:57', '6281293328630', 'slametr4276', 'Di Ciledug tangerang', NULL),
(336, '2023-02-20 14:37:47', '6285946146003', 'Siska Natalia 🌸', 'Halo my gas', NULL),
(337, '2023-02-20 14:37:58', '6285946146003', 'Siska Natalia 🌸', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(338, '2023-02-20 14:38:05', '6285946146003', 'Siska Natalia 🌸', 'Jabodetabek', NULL),
(339, '2023-02-20 14:38:12', '6285946146003', 'Siska Natalia 🌸', 'Jakarta Barat', NULL),
(340, '2023-02-20 14:40:10', '6285946146003', 'Siska Natalia 🌸', 'Halo mau tnya my gas', NULL),
(341, '2023-02-21 09:47:48', '6285795132012', 'Giata Utama K', 'hallo MyGas Utama Mau minta foto brg tabung dr 4.5 kg 9kg 12kg berikut Harganya Trimakasih. dr Bandung.\nKakau sy mau pesan lokasi Bandung dimana ya.dn nomer telp brp 🙏🏻🙌', NULL),
(342, '2023-02-21 09:48:04', '6285795132012', 'Giata Utama K', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(343, '2023-02-21 09:48:10', '6285795132012', 'Giata Utama K', 'Jawa Barat', NULL),
(344, '2023-02-21 09:48:16', '6285795132012', 'Giata Utama K', 'Bandung', NULL),
(345, '2023-02-21 09:48:59', '6285795132012', 'Giata Utama K', 'Menu Utama', NULL),
(346, '2023-02-21 09:49:05', '6285795132012', 'Giata Utama K', 'Jawa Barat', NULL),
(347, '2023-02-21 09:49:12', '6285795132012', 'Giata Utama K', 'Bandung', NULL),
(348, '2023-02-21 09:49:24', '6285795132012', 'Giata Utama K', 'Menu Utama', NULL),
(349, '2023-02-21 09:49:35', '6285795132012', 'Giata Utama K', 'Sosial Media', NULL),
(350, '2023-02-21 09:51:34', '6281289100097', 'Kristina FHPM', 'Halo', NULL),
(351, '2023-02-21 09:51:47', '6281289100097', 'Kristina FHPM', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(352, '2023-02-21 09:51:56', '6281289100097', 'Kristina FHPM', 'Jabodetabek', NULL),
(353, '2023-02-21 09:52:02', '6281289100097', 'Kristina FHPM', 'Jakarta Selatan', NULL),
(354, '2023-02-21 16:42:03', '61416332487', 'Yud\'s', 'Saya mau tanya untuk pemakaian supply ke resto apa bs?', NULL),
(355, '2023-02-22 09:18:57', '62895410622054', 'brosuryadharma', 'Saya mau kembalikan tabung gas', NULL),
(356, '2023-02-22 09:19:09', '62895410622054', 'brosuryadharma', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(357, '2023-02-22 09:19:16', '62895410622054', 'brosuryadharma', 'Jawa Barat', NULL),
(358, '2023-02-22 09:19:24', '62895410622054', 'brosuryadharma', 'Jabodetabek', NULL),
(359, '2023-02-22 09:19:32', '62895410622054', 'brosuryadharma', 'Bekasi', NULL),
(360, '2023-02-22 09:19:56', '62895410622054', 'brosuryadharma', 'Jabodetabek', NULL),
(361, '2023-02-22 09:20:02', '62895410622054', 'brosuryadharma', 'Bekasi', NULL),
(362, '2023-02-23 06:21:05', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(363, '2023-02-23 06:25:57', '62811911992', 'Andi  Perdana Kahar', 'https://linktr.ee/mygasindonesia?utm_source=linktree_profile_share&ltsid=fc424a4f-5351-4ef6-bbbc-e487a7de1d03', NULL),
(364, '2023-02-23 07:08:57', '62811911992', 'Andi  Perdana Kahar', 'Sosial Media', NULL),
(365, '2023-02-23 08:52:15', '62811911992', 'Andi  Perdana Kahar', 'myGas\n\nhttps://linktr.ee/mygasindonesia', NULL),
(366, '2023-02-23 15:51:34', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(367, '2023-02-23 15:51:40', '62811911992', 'Andi  Perdana Kahar', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(368, '2023-02-23 15:51:45', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(369, '2023-02-23 15:51:50', '62811911992', 'Andi  Perdana Kahar', 'Jakarta Selatan', NULL),
(370, '2023-02-27 09:46:20', '6281776535150', 'Tony', 'Sebentar, ini bisa dikirimkan di weekend ngga? kalau ngga bisa, kan percuma kan ya saya kirim alamat lengkap?', NULL),
(371, '2023-02-27 09:46:45', '6281776535150', 'Tony', 'Saya di Tangerang, Banten.', NULL),
(372, '2023-02-27 09:46:48', '6281776535150', 'Tony', 'Kota Tangerang*', NULL),
(373, '2023-02-27 09:52:49', '6281776535150', 'Tony', 'Ini saya pengen coba mygas.', NULL),
(374, '2023-02-27 10:31:15', '6281776535150', 'Tony', 'Perumahan Banjar Wijaya, Cluster Cattleya, Kota Tangerang, Banten, 15142.', NULL),
(375, '2023-02-27 12:29:20', '62811911992', 'Andi  Perdana Kahar', 'Jabodetabek', NULL),
(376, '2023-02-27 12:30:21', '62811911992', 'Andi  Perdana Kahar', 'Kembali', NULL),
(377, '2023-02-27 14:05:21', '62811911992', 'Andi  Perdana Kahar', 'Seputar Pertanyaan\nFAQ', NULL),
(378, '2023-02-27 14:53:00', '6281262643058', 'Harry KISS', 'myGas.pdf', NULL),
(379, '2023-02-27 21:47:12', '62811911992', 'Andi  Perdana Kahar', 'mygas', NULL),
(380, '2023-02-28 05:54:54', '62811911992', 'Andi  Perdana Kahar', 'myGas Q-Art.pdf', NULL),
(381, '2023-02-28 09:26:50', '62811911992', 'Andi  Perdana Kahar', 'myGas Q-Art.pdf', NULL),
(382, '2023-02-28 12:30:08', '6285221288210', 'Cepi Cahyana', 'Alamat Distributor\nLayanan Pesan Antar', NULL),
(383, '2023-02-28 12:30:22', '6285221288210', 'Cepi Cahyana', 'Jabodetabek', NULL),
(384, '2023-02-28 12:38:22', '6285221288210', 'Cepi Cahyana', 'Jabodetabek', NULL),
(385, '2023-02-28 12:41:49', '6285221288210', 'Cepi Cahyana', 'Jakarta Barat', NULL),
(386, '2023-02-28 14:24:06', '6288213203885', 'senior', 'pas sy butuh sy bel kembali', NULL),
(387, '2023-03-02 17:00:16', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(388, '2023-03-02 17:04:01', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(389, '2023-03-02 17:07:08', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(390, '2023-03-02 17:09:05', '6285221288210', 'Cepi Cahyana', 'Menu utama', NULL),
(391, '2023-03-02 17:10:04', '6285221288210', 'Cepi Cahyana', 'Jakarta Pusat', NULL),
(392, '2023-03-02 17:10:07', '6285221288210', 'Cepi Cahyana', 'Menu Utama', NULL),
(393, '2023-03-02 17:10:47', '6285221288210', 'Cepi Cahyana', 'Halo', NULL),
(394, '2023-03-02 17:11:24', '6285221288210', 'Cepi Cahyana', 'Mygas', NULL),
(395, '2023-03-02 17:16:54', '6285221288210', 'Cepi Cahyana', 'Mygas', NULL),
(396, '2023-03-02 19:23:42', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(397, '2023-03-02 19:25:52', '6285221288210', 'Cepi Cahyana', 'Jakarta pusat', NULL),
(398, '2023-03-03 07:14:53', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(399, '2023-03-03 16:16:28', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(400, '2023-03-04 06:20:35', '6285221288210', 'Cepi Cahyana', 'mygas', NULL),
(401, '2023-03-04 09:04:56', '62811911992', 'Andi  Perdana Kahar', 'Mygas', NULL),
(402, '2023-03-04 09:37:32', '628119413111', 'Nina Marlena', 'Halo kak, saya nina dari bsd', NULL),
(403, '2023-03-04 11:01:24', '628119413111', 'Nina Marlena', 'Halo', NULL),
(404, '2023-03-04 11:02:08', '6285647318338', 'Simanten', 'Halo kak', NULL);
INSERT INTO `inbox_autoreplay` (`id`, `_ctime`, `sender_number`, `sender_name`, `msg`, `to`) VALUES
(405, '2023-03-04 13:32:17', '6285777487100', 'Linky Walewangko', 'Hallo', NULL),
(406, '2023-03-05 10:30:27', '6285221288210', 'Cepi Cahyana', 'Halo', NULL),
(407, '2023-03-05 10:31:39', '6285221288210', 'polls', 'halo', NULL),
(408, '2023-03-05 10:32:37', '6285221288210', 'polls', 'halo', NULL),
(409, '2023-03-05 10:34:57', '6285221288210', 'polls', 'halo', NULL),
(410, '2023-03-05 10:35:03', '6285221288210', 'Cepi Cahyana', 'Menu utama', NULL),
(411, '2023-03-05 10:35:07', '6285221288210', 'Cepi Cahyana', 'Cek ketersediaan ruangan', NULL),
(412, '2023-03-05 10:35:14', '6285221288210', 'Cepi Cahyana', 'MENU UTAMA', NULL),
(413, '2023-03-05 12:35:45', '6285221288210', 'Cepi Cahyana', 'Best seller', NULL),
(414, '2023-03-05 12:42:27', '6285221288210', 'Cepi Cahyana', 'Foto Menu', NULL),
(415, '2023-03-05 12:44:19', '6285221288210', 'Cepi Cahyana', 'Best seller', NULL),
(416, '2023-03-05 12:52:23', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(417, '2023-03-05 12:52:50', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(418, '2023-03-05 12:53:43', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(419, '2023-03-05 12:54:42', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(420, '2023-03-05 12:55:44', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(421, '2023-03-05 12:57:15', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(422, '2023-03-05 12:57:47', '6285221288210', 'Cepi Cahyana', 'Gambar menu', NULL),
(423, '2023-03-05 12:59:28', '6285221288210', 'Cepi Cahyana', 'Foto Menu', NULL),
(424, '2023-03-05 13:00:17', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(425, '2023-03-05 13:04:12', '6285221288210', 'Cepi Cahyana', 'Foods', NULL),
(426, '2023-03-05 13:09:06', '6285221288210', 'Cepi Cahyana', 'Foto Menu', NULL),
(427, '2023-03-05 13:54:44', '6285221288210', 'polls', '📙Daftar menu', NULL),
(428, '2023-03-05 13:54:52', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(429, '2023-03-05 21:07:25', '6285221288210', 'polls', '📙Daftar menu', NULL),
(430, '2023-03-05 21:07:50', '6285221288210', 'polls', '📙Daftar menu', NULL),
(431, '2023-03-05 21:07:57', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(432, '2023-03-05 21:14:24', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(433, '2023-03-05 21:17:09', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(434, '2023-03-05 21:28:38', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(435, '2023-03-05 21:29:14', '6285221288210', 'polls', '🍱 Gambar menu', NULL),
(436, '2023-03-05 21:30:48', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(437, '2023-03-05 21:30:53', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(438, '2023-03-05 21:39:43', '6285221288210', 'Cepi Cahyana', 'Gambar menu', NULL),
(439, '2023-03-05 21:40:18', '6285221288210', 'Cepi Cahyana', 'Foto menu', NULL),
(440, '2023-03-05 21:43:57', '6285221288210', 'polls', '🍱 Gambar menu', NULL),
(441, '2023-03-05 21:44:05', '6285221288210', 'polls', 'foto menu', NULL),
(442, '2023-03-05 21:51:57', '6285221288210', 'polls', 'foto menu', NULL),
(443, '2023-03-05 21:52:43', '6285221288210', 'polls', 'foto menu', NULL),
(444, '2023-03-05 21:53:52', '6285221288210', 'polls', 'foto menu', NULL),
(445, '2023-03-05 21:54:11', '6285221288210', 'polls', 'foto menu', NULL),
(446, '2023-03-05 21:54:39', '6285221288210', 'polls', 'foto menu', NULL),
(447, '2023-03-05 21:55:29', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(448, '2023-03-05 21:55:31', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(449, '2023-03-06 04:37:30', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(450, '2023-03-06 05:37:17', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(451, '2023-03-06 05:39:57', '6285221288210', 'Cepi Cahyana', '🤤Best seller', NULL),
(452, '2023-03-06 05:40:18', '6285221288210', 'Cepi Cahyana', 'Menu Utama', NULL),
(453, '2023-03-06 05:41:18', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(454, '2023-03-06 05:43:46', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(455, '2023-03-06 07:23:35', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(456, '2023-03-06 07:24:07', '6285221288210', 'Cepi Cahyana', 'Menu', NULL),
(457, '2023-03-06 07:24:24', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(458, '2023-03-06 11:45:49', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(459, '2023-03-06 11:50:20', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(460, '2023-03-06 15:52:48', '6285221288210', 'Cepi Cahyana', 'Daftar menu', NULL),
(461, '2023-03-06 15:57:01', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(462, '2023-03-06 16:08:16', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(463, '2023-03-06 16:08:58', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(464, '2023-03-06 16:09:57', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(465, '2023-03-06 18:33:18', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(466, '2023-03-06 18:50:35', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(467, '2023-03-06 18:51:00', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(468, '2023-03-06 18:51:08', '6285221288210', 'Cepi Cahyana', '🔘 Menu utama', NULL),
(469, '2023-03-07 09:31:24', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(470, '2023-03-07 09:31:31', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL),
(471, '2023-03-07 11:03:24', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(472, '2023-03-07 11:03:48', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(473, '2023-03-07 11:03:55', '6285221288210', 'Cepi Cahyana', '📙Daftar menu', NULL),
(474, '2023-03-07 11:03:58', '6285221288210', 'Cepi Cahyana', '🍱 Gambar menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `saran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to` varchar(100) DEFAULT NULL,
  `sts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `nama`, `hp`, `tgl`, `saran`, `to`, `sts`) VALUES
(4, 'Cepicahyana.com', '6285221288210', '2023-04-30 22:30:26', 'bagus lah', '6285794151322', 1),
(5, 'Cepicahyana.com', '6285221288210', '2023-04-30 22:32:48', 'oke', '6285794151322', 1),
(6, 'Cepicahyana.com', '6285221288210', '2023-04-30 22:34:26', 'bagus sekali', '6285794151322', 1),
(7, 'Cepicahyana.com', '6285221288210', '2023-04-30 23:30:02', 'Harusnya ada tisyu', '6285794151322', 1),
(8, 'Cepicahyana', '6285221288210', '2023-05-01 23:30:02', 'Lumayan menyenangkan', '6285794151322', 1),
(9, 'Tasmin', '6285172476577', '2023-05-02 23:30:02', NULL, '6285794151322', 0),
(10, 'Cepi cahyana', '6285221288210', '2023-05-03 13:56:44', 'Halo', '6285794151322', 1),
(11, 'Cepi cahyana', '6285221288210', '2023-05-03 23:30:02', 'Oke mantap', '6285794151322', 1),
(12, 'Cepi cahyana', '6285221288210', '2023-05-04 23:30:02', 'sudah bagus ko', '6285794151322', 1),
(13, 'Cepi cahyana', '6285221288210', '2023-05-05 23:30:03', 'Cafetaria tempatnya nyaman namun sayang pelayananya lambat', '6285794151322', 1),
(14, 'Cepi cahyana', '6285221288210', '2023-05-06 07:46:57', 'mantappp', '6285794151322', 1),
(15, 'Cepi cahyana', '6285221288210', '2023-05-06 07:58:29', 'halo', '6285794151322', 1),
(16, 'Cepi cahyana', '6285221288210', '2023-05-06 08:04:26', 'ok', '6285794151322', 1),
(17, 'Cepi cahyana', '6285221288210', '2023-05-06 08:08:00', 'siap', '6285794151322', 1),
(18, 'Dheazizah?', '6289602402435', '2023-05-06 08:08:00', NULL, '6285794151322', 0),
(21, 'Cepi cahyana', '6285221288210', '2023-05-25 06:47:30', 'Ok', '', 1),
(22, 'Cepi cahyana', '6285221288210', '2023-05-25 06:48:01', 'Halo', '6285794151322', 1),
(23, 'Cepi cahyana', '6285221288210', '2023-05-25 23:30:03', 'Menyenangkan, klw bisa sih pembayaranya bisa pake ovo', '6285794151322', 1),
(24, 'Cepi cahyana', '6285221288210', '2023-05-26 23:30:03', 'Tees', '6285794151322', 1),
(25, 'akelhasanudin', '6281224886218', '2023-05-27 23:30:03', NULL, '6285794151322', 0),
(26, 'Cepi cahyana', '6285221288210', '2023-05-27 23:30:03', 'bagus', '6285794151322', 1),
(27, 'Indra Dena Putra', '6281224907400', '2023-05-28 20:07:36', 'Kritik jam pelayanan .....order lama ...di percpat', '6283165005718', 1),
(28, 'Ruhyat', '6281299245525', '2023-05-28 20:07:36', NULL, '6283165005718', 0),
(29, 'Ike', '6282113978123', '2023-05-28 20:07:36', 'P', '6285794151322', 1),
(30, 'Cepi cahyana', '6285221288210', '2023-05-28 20:07:36', 'Tes', '6285794151322', 1),
(31, '13', '6285793967051', '2023-05-28 20:07:36', 'Halo kak!\nKirim daftar menu dong', '6283165005718', 1),
(32, 'Indra Dena Putra', '6281224907400', '2023-05-28 23:30:02', NULL, '6283165005718', 0),
(33, 'Ruhyat', '6281299245525', '2023-05-28 23:30:02', NULL, '6283165005718', 0),
(34, 'Ike', '6282113978123', '2023-05-28 23:30:02', 'T', '6285794151322', 1),
(35, 'Cepi cahyana', '6285221288210', '2023-05-28 23:30:02', 'Tdak oke', '6285794151322', 1),
(36, '13', '6285793967051', '2023-05-28 23:30:02', 'Daftar menu', '6283165005718', 1),
(37, 'Ike', '6282113978123', '2023-05-29 23:30:03', 'Pelayanan sangat baik', '6283165005718', 1),
(38, 'Cepi cahyana', '6285221288210', '2023-05-29 23:30:03', 'bagus', '6285794151322', 1),
(39, 'Ike', '6282113978123', '2023-05-30 21:52:56', 'Pelayanan baik dan tempatnya recomended bgt', '6283165005718', 1),
(40, 'Cepi cahyana', '6285221288210', '2023-05-30 21:52:56', 'mengesankan sekali cafetaria', '6285794151322', 1),
(41, 'Ike', '6282113978123', '2023-05-30 23:30:02', NULL, '6283165005718', 0),
(42, 'Cepi cahyana', '6285221288210', '2023-05-30 23:30:02', 'Oke', '6285794151322', 1),
(43, 'Cepi cahyana', '6285221288210', '2023-05-31 23:30:03', 'Tempatnya enak dan banyak cemilan yg pas buat nongkrong', '6283165005718', 1),
(44, 'Cepi cahyana', '6285221288210', '2023-06-01 23:30:02', 'I', '6283165005718', 1),
(45, 'Cepi cahyana', '6285221288210', '2023-06-04 23:30:02', 'Hi', '6283165005718', 1),
(46, 'PAPAHMUDA MANAGEMENT', '6285157559328', '2023-06-05 16:30:16', 'Tes', '6285163082099', 1),
(47, 'Cepi.c', '6285221288210', '2023-06-05 16:30:16', 'Bagus makanannya enak, tambahin colokan dong', '6285163082099', 1),
(48, 'PAPAHMUDA MANAGEMENT', '6285157559328', '2023-06-05 23:30:03', 'Cek', '6285163082099', 1),
(49, 'Cepi.c', '6285221288210', '2023-06-05 23:30:03', 'Hlo', '6285163082099', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_level`
--

CREATE TABLE `main_level` (
  `id_level` int(10) UNSIGNED NOT NULL,
  `nama` varchar(25) NOT NULL,
  `direct` text DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `main_level`
--

INSERT INTO `main_level` (`id_level`, `nama`, `direct`, `ket`) VALUES
(1, 'super', 'super', 'kelola keseluruhan'),
(2, 'admin', 'dashboard', 'kelola data user'),
(3, 'member', 'member', 'Penggunaan aplikasi'),
(12, 'verifikator', 'verifikator', 'verifikator'),
(13, 'distributor', 'distributor', 'Distributor'),
(14, 'distributor_persus', 'distributor_persus', 'distributor_persus'),
(15, 'inputor', 'inputor', 'inputor'),
(16, 'leader', 'lead', 'lead'),
(17, 'eksekutor', 'eksekutor', NULL),
(18, 'cs', 'cs', 'customer service'),
(19, 'administrator', 'mode_vicon', 'kelola keseluruhan kecuali setting');

-- --------------------------------------------------------

--
-- Table structure for table `msg_inbox`
--

CREATE TABLE `msg_inbox` (
  `id` int(11) NOT NULL,
  `_ctime` datetime NOT NULL,
  `to` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `sender_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sender_name` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `msg` mediumtext NOT NULL,
  `sts` int(11) NOT NULL DEFAULT 0 COMMENT '0=blm di blas 1=sudah dibals 2=hapus',
  `jenis_pesan` int(11) NOT NULL DEFAULT 1 COMMENT '1=chat 2=image 3=documen 4=video',
  `file` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `kategory` int(11) NOT NULL DEFAULT 1 COMMENT '1=tak terjawab 2=cs 3=kirik saran',
  `session_cs` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `replay` int(11) NOT NULL DEFAULT 0 COMMENT '1= hasil klik replay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg_inbox`
--

INSERT INTO `msg_inbox` (`id`, `_ctime`, `to`, `sender_number`, `sender_name`, `msg`, `sts`, `jenis_pesan`, `file`, `kategory`, `session_cs`, `replay`) VALUES
(1, '2023-04-29 22:31:02', '6285794151322', '6285221288210', 'Cepicahyana.com', 'F', 0, 1, NULL, 1, NULL, 0),
(2, '2023-04-29 22:39:58', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(3, '2023-04-29 22:40:19', '6285794151322', '6285221288210', 'Cepicahyana.com', 'oe', 0, 1, NULL, 1, NULL, 0),
(4, '2023-04-29 22:51:13', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hi', 0, 1, NULL, 1, NULL, 0),
(5, '2023-04-29 22:53:57', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hi', 0, 1, NULL, 1, NULL, 0),
(6, '2023-04-29 22:54:26', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hui', 0, 1, NULL, 1, NULL, 0),
(7, '2023-04-29 22:56:17', '6285794151322', '6285221288210', 'Cepicahyana.com', 'w', 0, 1, NULL, 1, NULL, 0),
(8, '2023-04-29 22:57:19', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hai', 0, 1, NULL, 1, NULL, 0),
(9, '2023-04-29 22:57:27', '6285794151322', '6285221288210', 'Cepicahyana.com', 'ok', 0, 1, NULL, 1, NULL, 0),
(10, '2023-04-29 23:00:50', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(11, '2023-04-29 23:00:52', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(12, '2023-04-29 23:01:07', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(13, '2023-04-29 23:01:09', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(14, '2023-04-29 23:01:11', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(15, '2023-04-29 23:01:11', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(16, '2023-04-29 23:13:04', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(17, '2023-04-29 23:13:07', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(18, '2023-04-29 23:15:34', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(19, '2023-04-29 23:15:37', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(20, '2023-04-29 23:16:34', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(21, '2023-04-29 23:16:36', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(22, '2023-04-29 23:16:48', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(23, '2023-04-30 00:46:05', '6285794151322', '6285221288210', 'Cepicahyana.com', 'P', 0, 1, NULL, 1, NULL, 0),
(24, '2023-04-30 00:46:50', '6285794151322', '6285221288210', 'Cepicahyana.com', 'F', 0, 1, NULL, 1, NULL, 0),
(25, '2023-04-30 00:47:50', '6285794151322', '6285221288210', 'Cepicahyana.com', 'T', 0, 1, NULL, 1, NULL, 0),
(26, '2023-04-30 00:48:26', '6285794151322', '6285221288210', 'Cepicahyana.com', 'G', 0, 1, NULL, 1, NULL, 0),
(27, '2023-04-30 00:48:36', '6285794151322', '6285221288210', 'Cepicahyana.com', 'D', 0, 1, NULL, 1, NULL, 0),
(28, '2023-04-30 00:48:48', '6285794151322', '6285221288210', 'Cepicahyana.com', 'F', 0, 1, NULL, 1, NULL, 0),
(29, '2023-04-30 00:48:57', '6285794151322', '6285221288210', 'Cepicahyana.com', 'T', 0, 1, NULL, 1, NULL, 0),
(30, '2023-04-30 00:51:58', '6285794151322', '6285221288210', 'Cepicahyana.com', 'G', 0, 1, NULL, 1, NULL, 0),
(31, '2023-04-30 00:52:09', '6285794151322', '6285221288210', 'Cepicahyana.com', 'T', 0, 1, NULL, 1, NULL, 0),
(32, '2023-04-30 01:04:12', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(33, '2023-04-30 01:11:25', '6285794151322', '6281385820456', 'Rengga Tiar. N', 'P', 0, 1, NULL, 1, NULL, 0),
(34, '2023-04-30 01:21:08', '6285794151322', '6282113978123', 'Ike', 'Huy', 0, 1, NULL, 1, NULL, 0),
(35, '2023-04-30 06:13:27', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(36, '2023-04-30 06:22:04', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hui', 0, 1, NULL, 1, NULL, 0),
(37, '2023-04-30 06:25:09', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hoyah', 0, 1, NULL, 1, NULL, 0),
(38, '2023-04-30 06:26:08', '6285794151322', '6285221288210', 'Cepicahyana.com', 'uy', 0, 1, NULL, 1, NULL, 0),
(39, '2023-04-30 06:27:09', '6285794151322', '6285221288210', 'Cepicahyana.com', 'd', 0, 1, NULL, 1, NULL, 0),
(40, '2023-04-30 06:34:03', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(41, '2023-04-30 06:34:05', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(42, '2023-04-30 06:34:08', '6285794151322', '6285221288210', 'Cepicahyana.com', 's', 0, 1, NULL, 1, NULL, 0),
(43, '2023-04-30 07:38:37', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(44, '2023-04-30 09:09:17', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(45, '2023-04-30 14:03:50', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(46, '2023-04-30 17:45:04', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(47, '2023-04-30 19:43:08', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hi', 0, 1, NULL, 1, NULL, 0),
(48, '2023-04-30 22:08:22', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(49, '2023-04-30 22:21:16', '6285794151322', '6281385820456', 'Rengga Tiar. N', 'Yehbabjamnd', 0, 1, NULL, 1, NULL, 0),
(50, '2023-04-30 22:27:23', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(51, '2023-04-30 22:29:18', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(52, '2023-04-30 22:36:12', '6285794151322', '6283101466888', '? R.E.Y', '083101466888', 0, 1, NULL, 1, NULL, 0),
(53, '2023-04-30 22:42:52', '6285794151322', '6285221288210', 'Cepicahyana.com', 'ok', 0, 1, NULL, 1, NULL, 0),
(54, '2023-04-30 22:54:36', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(55, '2023-04-30 22:55:21', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(56, '2023-04-30 22:55:38', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(57, '2023-04-30 23:19:56', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(58, '2023-05-01 06:29:48', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(59, '2023-05-01 17:35:38', '6285794151322', '6285221288210', 'Cepicahyana.com', 'HIi', 0, 1, NULL, 1, NULL, 0),
(60, '2023-05-01 19:34:15', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(61, '2023-05-01 20:38:46', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hai', 0, 1, NULL, 1, NULL, 0),
(62, '2023-05-02 06:21:43', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(63, '2023-05-02 06:37:05', '6285794151322', '6285221288210', 'Cepicahyana.com', 'halo', 0, 1, NULL, 1, NULL, 0),
(64, '2023-05-02 06:37:39', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(65, '2023-05-02 06:38:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(66, '2023-05-02 06:38:54', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(67, '2023-05-02 06:39:09', '6285794151322', '6285221288210', 'Cepi cahyana', '', 0, 2, 'file_upload/inbox/6285221288210_2023MayTue063909.png', 1, NULL, 0),
(68, '2023-05-02 07:52:58', '6285794151322', '6285172476577', 'Amin', 'Halo', 0, 1, NULL, 1, NULL, 0),
(69, '2023-05-02 10:43:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(70, '2023-05-02 12:06:08', '6285794151322', '6281385820456', 'Rengga Tiar. N', 'P', 0, 1, NULL, 1, NULL, 0),
(71, '2023-05-03 05:28:16', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(72, '2023-05-03 09:45:42', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(73, '2023-05-03 09:46:18', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(74, '2023-05-03 09:47:41', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(75, '2023-05-03 09:47:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(76, '2023-05-03 11:20:11', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(77, '2023-05-03 11:20:44', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(78, '2023-05-03 13:24:06', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(79, '2023-05-03 13:31:22', '6285794151322', '6285717946962', NULL, '', 0, 1, NULL, 1, NULL, 0),
(80, '2023-05-03 13:31:22', '6285794151322', '6285717946962', 'vinywidian', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(81, '2023-05-03 13:52:26', '6285794151322', '6285221288210', 'Cepi cahyana', '', 0, 2, 'file_upload/inbox/6285221288210_2023MayWed135226.png', 1, NULL, 0),
(82, '2023-05-03 14:52:58', '6285794151322', '6285717946962', 'vinywidian', 'a berarti ini untuk awal free yah?', 0, 1, NULL, 1, NULL, 0),
(83, '2023-05-03 15:00:13', '6285794151322', '6285221288210', 'Cepi cahyana', 'Jalo', 0, 1, NULL, 1, NULL, 0),
(84, '2023-05-03 15:32:04', '6285794151322', '6285739783837', 'YOYOK', 'Test', 0, 1, NULL, 1, NULL, 0),
(85, '2023-05-03 15:33:43', '6285794151322', '6285739783837', 'YOYOK', 'Wah keren ni', 0, 1, NULL, 1, NULL, 0),
(86, '2023-05-03 16:13:27', '6285794151322', '6281558265837', 'Oke Mubarokah Official', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(87, '2023-05-04 05:59:46', '6285794151322', '6285221288210', 'Cepi cahyana', 'Oke', 0, 1, NULL, 1, NULL, 0),
(88, '2023-05-04 06:03:02', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(89, '2023-05-04 12:28:01', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(92, '2023-05-04 23:28:43', '6285794151322', '6285794151894', 'RestoBot', 'Halo', 0, 1, NULL, 1, NULL, 0),
(94, '2023-05-04 23:28:48', '6285794151322', '6285794151894', 'RestoBot', 'Hai kak Konekwa Official 👋\nSelamat datang di 📍PENTOL SEAFOOD !!\nTerimakasih sudah berkunjung \n\nUntuk 🛒order bisa melalui link dibawah ini:\nhttps://cafetaria.online/daftar_menu?resto=PENTOL-SEAFOOD&me=6285794151322', 0, 2, 'file_upload/inbox/6285794151894_2023MayThu232848.png', 1, NULL, 0),
(96, '2023-05-04 23:28:52', '6285794151322', '6285794151894', 'RestoBot', 'Hai kak Konekwa Official 👋\nSelamat datang di 📍PENTOL SEAFOOD !!\nTerimakasih sudah berkunjung \n\nUntuk 🛒order bisa melalui link dibawah ini:\nhttps://cafetaria.online/daftar_menu?resto=PENTOL-SEAFOOD&me=6285794151322', 0, 2, 'file_upload/inbox/6285794151894_2023MayThu232852.png', 1, NULL, 0),
(98, '2023-05-04 23:28:55', '6285794151322', '6285794151894', 'RestoBot', 'Hai kak Konekwa Official 👋\nSelamat datang di 📍PENTOL SEAFOOD !!\nTerimakasih sudah berkunjung \n\nUntuk 🛒order bisa melalui link dibawah ini:\nhttps://cafetaria.online/daftar_menu?resto=PENTOL-SEAFOOD&me=6285794151322', 0, 2, 'file_upload/inbox/6285794151894_2023MayThu232855.png', 1, NULL, 0),
(100, '2023-05-04 23:28:58', '6285794151322', '6285794151894', 'RestoBot', 'Hai kak Konekwa Official 👋\nSelamat datang di 📍PENTOL SEAFOOD !!\nTerimakasih sudah berkunjung \n\nUntuk 🛒order bisa melalui link dibawah ini:\nhttps://cafetaria.online/daftar_menu?resto=PENTOL-SEAFOOD&me=6285794151322', 0, 2, 'file_upload/inbox/6285794151894_2023MayThu232858.png', 1, NULL, 0),
(102, '2023-05-04 23:29:00', '6285794151322', '6285794151894', 'RestoBot', 'Hai kak Konekwa Official 👋\nSelamat datang di 📍PENTOL SEAFOOD !!\nTerimakasih sudah berkunjung \n\nUntuk 🛒order bisa melalui link dibawah ini:\nhttps://cafetaria.online/daftar_menu?resto=PENTOL-SEAFOOD&me=6285794151322', 0, 2, 'file_upload/inbox/6285794151894_2023MayThu232900.png', 1, NULL, 0),
(105, '2023-05-05 08:13:33', '6285794151322', '6285739783837', 'YOYOK', 'Tes', 0, 1, NULL, 1, NULL, 0),
(106, '2023-05-05 08:30:23', '6285794151322', '6285739783837', 'YOYOK', 'Tes', 0, 1, NULL, 1, NULL, 0),
(107, '2023-05-05 11:33:49', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(108, '2023-05-05 12:58:16', '6285794151322', '6282295932687', NULL, '', 0, 1, NULL, 1, NULL, 0),
(109, '2023-05-05 12:58:16', '6285794151322', '6282295932687', 'Riski Putri Utari', 'daftar', 0, 1, NULL, 1, NULL, 0),
(110, '2023-05-05 15:38:19', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(111, '2023-05-05 15:39:12', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar Menu', 0, 1, NULL, 1, NULL, 0),
(112, '2023-05-05 15:39:27', '6285794151322', '6285221288210', 'Cepi cahyana', '', 0, 2, 'file_upload/inbox/6285221288210_2023MayFri153927.png', 1, NULL, 0),
(113, '2023-05-05 20:14:12', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(114, '2023-05-05 20:21:07', '6285794151322', '6285271939490', 'Muhammad Ali', 'Tws', 0, 1, NULL, 1, NULL, 0),
(115, '2023-05-05 21:33:30', '6285794151322', '6281275037773', NULL, '', 0, 1, NULL, 1, NULL, 0),
(116, '2023-05-05 21:33:30', '6285794151322', '6281275037773', 'Raden Reigy Nawanori', 'Malam bang', 0, 1, NULL, 1, NULL, 0),
(117, '2023-05-05 21:34:00', '6285794151322', '6281275037773', 'Raden Reigy Nawanori', 'Saye sepupunya bang ali', 0, 1, NULL, 1, NULL, 0),
(118, '2023-05-05 21:34:05', '6285794151322', '6281275037773', 'Raden Reigy Nawanori', 'Mau nanya soal aplikasi POS', 0, 1, NULL, 1, NULL, 0),
(119, '2023-05-06 06:35:01', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar-menu', 0, 1, NULL, 1, NULL, 0),
(120, '2023-05-06 07:30:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(121, '2023-05-06 07:32:03', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar-menu', 0, 1, NULL, 1, NULL, 0),
(122, '2023-05-06 07:41:38', '6285794151322', '6289602402435', 'Dheazizah?', 'daftar-menu', 0, 1, NULL, 1, NULL, 0),
(123, '2023-05-07 08:13:09', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(124, '2023-05-07 08:13:16', '6285794151322', '6285221288210', 'Cepi cahyana', 'ok', 0, 1, NULL, 1, NULL, 0),
(125, '2023-05-07 21:57:08', '6285794151322', '6285717946962', 'vinywidian', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(126, '2023-05-08 06:04:04', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(127, '2023-05-08 12:43:34', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(128, '2023-05-08 21:27:53', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(129, '2023-05-09 06:53:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(130, '2023-05-09 13:43:20', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(131, '2023-05-09 16:58:55', '6285794151322', '628116669647', NULL, '', 0, 1, NULL, 1, NULL, 0),
(132, '2023-05-09 16:58:55', '6285794151322', '628116669647', 'Aditya Almughni', 'Test', 0, 1, NULL, 1, NULL, 0),
(133, '2023-05-09 16:59:04', '6285794151322', '6287874831099', '6287874831099', 'Tes', 0, 1, NULL, 1, NULL, 0),
(134, '2023-05-10 05:26:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(135, '2023-05-11 06:36:58', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(136, '2023-05-13 18:21:14', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(137, '2023-05-15 21:18:58', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(138, '2023-05-16 15:40:53', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(139, '2023-05-16 15:46:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Mau pesan', 0, 1, NULL, 1, NULL, 0),
(140, '2023-05-18 06:31:11', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(141, '2023-05-21 07:06:35', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(142, '2023-05-21 08:55:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(143, '2023-05-21 08:56:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'order', 0, 1, NULL, 1, NULL, 0),
(144, '2023-05-21 08:59:56', '6285794151322', '6285221288210', 'Cepi cahyana', 'hi', 0, 1, NULL, 1, NULL, 0),
(145, '2023-05-24 16:51:17', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(146, '2023-05-24 16:59:56', '6285794151322', '6285221288210', 'Cepi cahyana', 'Balo', 0, 1, NULL, 1, NULL, 0),
(147, '2023-05-24 17:00:27', '6285794151322', '6285221288210', 'Cepi cahyana', 'F', 0, 1, NULL, 1, NULL, 0),
(148, '2023-05-24 17:04:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'G', 0, 1, NULL, 1, NULL, 0),
(149, '2023-05-24 17:06:39', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(150, '2023-05-24 17:12:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'HLo', 0, 1, NULL, 1, NULL, 0),
(151, '2023-05-24 17:14:20', '6285794151322', '', NULL, 'dd', 0, 1, NULL, 1, NULL, 0),
(152, '2023-05-24 17:14:35', '6285794151322', '', NULL, 'dd', 0, 1, NULL, 1, NULL, 0),
(153, '2023-05-24 17:15:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(154, '2023-05-24 17:19:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(155, '2023-05-24 17:19:52', '6285794151322', '6285221288210', 'Cepi cahyana', 'Affsgdh', 0, 1, NULL, 1, NULL, 0),
(156, '2023-05-24 17:32:28', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ffff', 0, 1, NULL, 1, NULL, 0),
(157, '2023-05-24 17:33:12', '6285794151322', '', NULL, 'dd', 0, 1, NULL, 1, NULL, 0),
(158, '2023-05-24 17:38:46', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(159, '2023-05-24 17:39:20', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(160, '2023-05-24 17:39:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(161, '2023-05-24 17:54:16', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ddhau', 0, 1, NULL, 1, NULL, 0),
(162, '2023-05-24 17:55:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'Uhuy', 0, 1, NULL, 1, NULL, 0),
(163, '2023-05-24 17:56:00', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ok', 0, 1, NULL, 1, NULL, 0),
(164, '2023-05-25 05:43:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(165, '2023-05-25 06:41:34', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(166, '2023-05-25 06:41:54', '6285794151322', '6282113978123', 'Ike', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(167, '2023-05-25 06:48:23', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ok', 0, 1, NULL, 1, NULL, 0),
(168, '2023-05-25 07:24:31', '6285794151322', '6285221288210', NULL, '', 0, 1, NULL, 1, NULL, 0),
(169, '2023-05-25 07:24:31', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(170, '2023-05-25 09:01:05', '6285794151322', '6285221288210', 'Cepi cahyana', 'hi', 0, 1, NULL, 1, NULL, 0),
(171, '2023-05-25 14:26:50', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(172, '2023-05-25 16:36:06', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(173, '2023-05-25 16:36:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(174, '2023-05-26 06:47:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Oke', 0, 1, NULL, 1, NULL, 0),
(175, '2023-05-27 10:52:36', '6285794151322', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(176, '2023-05-27 11:34:16', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(177, '2023-05-27 12:16:02', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(178, '2023-05-27 12:44:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(179, '2023-05-27 12:45:10', '6285794151322', '6281224886218', 'akelhasanudin', 'P', 0, 1, NULL, 1, NULL, 0),
(180, '2023-05-27 12:49:29', '6285794151322', '6285220969224', 'Zaiheryf', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(181, '2023-05-27 17:07:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(182, '2023-05-27 18:37:19', '6285794151322', '6281224907400', 'Indra Dena Putra', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(183, '2023-05-27 18:55:35', '6285794151322', '6282113978123', 'Ike', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(184, '2023-05-27 20:09:26', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(185, '2023-05-27 20:10:54', '6285794151322', '6282113978123', 'Ike', 'Tes', 0, 1, NULL, 1, NULL, 0),
(186, '2023-05-27 20:13:18', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(187, '2023-05-27 20:24:38', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(188, '2023-05-27 20:36:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'daftar menu', 0, 1, NULL, 1, NULL, 0),
(189, '2023-05-27 22:17:13', '6285794151322', '6282113978123', 'Ike', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(190, '2023-05-28 00:50:56', '6285794151322', '6285221288210', 'Cepi cahyana', 'hi', 0, 1, NULL, 1, NULL, 0),
(191, '2023-05-28 00:51:40', '6285794151322', '6285221288210', 'Cepi cahyana', 'ji', 0, 1, NULL, 1, NULL, 0),
(192, '2023-05-28 00:58:29', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(193, '2023-05-28 01:09:30', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hai', 0, 1, NULL, 1, NULL, 0),
(194, '2023-05-28 01:11:39', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(195, '2023-05-28 01:12:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(196, '2023-05-28 01:12:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ok', 0, 1, NULL, 1, NULL, 0),
(197, '2023-05-28 01:24:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(198, '2023-05-28 01:27:11', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hai', 0, 1, NULL, 1, NULL, 0),
(199, '2023-05-28 01:27:21', '6285794151322', '6285221288210', 'Cepi cahyana', 'HLo', 0, 1, NULL, 1, NULL, 0),
(200, '2023-05-28 01:30:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(201, '2023-05-28 01:31:53', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(202, '2023-05-28 01:36:51', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(203, '2023-05-28 01:37:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ji', 0, 1, NULL, 1, NULL, 0),
(204, '2023-05-28 01:38:08', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(205, '2023-05-28 01:40:16', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(206, '2023-05-28 01:41:28', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(207, '2023-05-28 01:43:07', '6285794151322', '6285221288210', 'Cepi cahyana', '1', 0, 1, NULL, 1, NULL, 0),
(208, '2023-05-28 01:43:48', '6285794151322', '6285221288210', 'Cepi cahyana', 'J', 0, 1, NULL, 1, NULL, 0),
(209, '2023-05-28 01:44:50', '6285794151322', '6285221288210', 'Cepi cahyana', 'J', 0, 1, NULL, 1, NULL, 0),
(210, '2023-05-28 01:45:34', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(211, '2023-05-28 01:51:30', '6285794151322', '6285221288210', 'Cepi cahyana', 'HLo', 0, 1, NULL, 1, NULL, 0),
(212, '2023-05-28 01:51:43', '6285794151322', '6285221288210', 'Cepi cahyana', 'Sau', 0, 1, NULL, 1, NULL, 0),
(213, '2023-05-28 01:58:09', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hlo', 0, 1, NULL, 1, NULL, 0),
(214, '2023-05-28 01:58:45', '6285794151322', '6285221288210', 'Cepi cahyana', 'Oke', 0, 1, NULL, 1, NULL, 0),
(215, '2023-05-28 06:51:45', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(216, '2023-05-28 08:04:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hai', 0, 1, NULL, 1, NULL, 0),
(217, '2023-05-28 08:07:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'V', 0, 1, NULL, 1, NULL, 0),
(218, '2023-05-28 08:07:39', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(219, '2023-05-28 08:08:38', '6285794151322', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(220, '2023-05-28 08:09:46', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(221, '2023-05-28 08:12:48', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(222, '2023-05-28 08:13:06', '6285794151322', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(223, '2023-05-28 08:16:08', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(224, '2023-05-28 08:16:34', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hu', 0, 1, NULL, 1, NULL, 0),
(225, '2023-05-28 08:16:46', '6285794151322', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(226, '2023-05-28 08:18:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(227, '2023-05-28 08:19:01', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(228, '2023-05-28 08:19:31', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(229, '2023-05-28 08:20:27', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(230, '2023-05-28 09:38:39', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(231, '2023-05-28 09:38:48', '6283165005718', '6285221288210', 'Cepi cahyana', 'Ok', 0, 1, NULL, 1, NULL, 0),
(232, '2023-05-28 09:39:51', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(233, '2023-05-28 09:42:19', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(234, '2023-05-28 09:43:16', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(235, '2023-05-28 09:44:39', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(236, '2023-05-28 09:44:49', '6283165005718', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(237, '2023-05-28 09:51:39', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(238, '2023-05-28 09:51:53', '6283165005718', '6285221288210', 'Cepi cahyana', 'Ijr', 0, 1, NULL, 1, NULL, 0),
(239, '2023-05-28 09:52:50', '6283165005718', '6285221288210', 'Cepi cahyana', 'C', 0, 1, NULL, 1, NULL, 0),
(240, '2023-05-28 09:53:12', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(241, '2023-05-28 10:21:25', '6285794151322', '6285221288210', 'Cepi cahyana', '', 0, 2, 'file_upload/inbox/6285221288210_2023MaySun102125.png', 1, NULL, 0),
(242, '2023-05-28 10:21:54', '6285794151322', '6285221288210', 'Cepi cahyana', 'V', 0, 1, NULL, 1, NULL, 0),
(243, '2023-05-28 10:22:10', '6285794151322', '6285221288210', 'Cepi cahyana', 'G', 0, 1, NULL, 1, NULL, 0),
(244, '2023-05-28 10:22:47', '6285794151322', '6285221288210', 'Cepi cahyana', 'C', 0, 1, NULL, 1, NULL, 0),
(245, '2023-05-28 10:23:32', '6283165005718', '6285221288210', 'Cepi cahyana', 'Vv', 0, 1, NULL, 1, NULL, 0),
(246, '2023-05-28 10:24:56', '6283165005718', '6285221288210', 'Cepi cahyana', 'G', 0, 1, NULL, 1, NULL, 0),
(247, '2023-05-28 11:08:04', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(248, '2023-05-28 12:03:24', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(249, '2023-05-28 13:17:35', '6285794151322', '6282113978123', 'Ike', 'Hai', 0, 1, NULL, 1, NULL, 0),
(250, '2023-05-28 13:36:38', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(251, '2023-05-28 13:41:35', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(252, '2023-05-28 13:43:19', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(253, '2023-05-28 14:08:19', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(254, '2023-05-28 14:24:21', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hai', 0, 1, NULL, 1, NULL, 0),
(255, '2023-05-28 15:14:56', '6283165005718', '6285221288210', 'Cepi cahyana', 'Hiu', 0, 1, NULL, 1, NULL, 0),
(256, '2023-05-28 16:09:53', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(257, '2023-05-28 16:10:04', '6283165005718', '6285221288210', 'Cepi cahyana', 'HLo', 0, 1, NULL, 1, NULL, 0),
(258, '2023-05-28 16:16:05', '6283165005718', '6281299245525', 'Ruhyat', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(259, '2023-05-28 18:55:31', '6283165005718', '6285221288210', 'Cepi cahyana', 'Bai', 0, 1, NULL, 1, NULL, 0),
(260, '2023-05-28 19:25:10', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(261, '2023-05-28 19:43:49', '6283165005718', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(262, '2023-05-28 19:44:31', '6283165005718', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(263, '2023-05-28 19:45:54', '6283165005718', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(264, '2023-05-28 19:49:48', '6283165005718', '6285221288210', 'Cepi cahyana', 'HLo', 0, 1, NULL, 1, NULL, 0),
(265, '2023-05-28 20:01:11', '6283165005718', '6285221288210', 'Cepi cahyana', 'P', 0, 1, NULL, 1, NULL, 0),
(266, '2023-05-28 20:03:18', '6283165005718', '6281224907400', 'Indra Dena Putra', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(267, '2023-05-28 20:03:39', '6283165005718', '6285793967051', '13', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(268, '2023-05-28 20:08:37', '6285794151322', '6282113978123', 'Ike', 'Baikkak🙏', 0, 1, NULL, 1, NULL, 0),
(269, '2023-05-28 20:25:29', '6285794151322', '6282113978123', 'Ike', 'Halo', 0, 1, NULL, 1, NULL, 0),
(270, '2023-05-29 12:02:35', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(271, '2023-05-29 12:09:42', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(272, '2023-05-29 12:11:51', '6283165005718', '6285220969224', 'Zaiheryf', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(273, '2023-05-29 12:20:21', '6283165005718', '6285220969224', 'Zaiheryf', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(274, '2023-05-29 12:43:31', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(275, '2023-05-29 13:33:57', '6283165005718', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(276, '2023-05-29 13:37:09', '6283165005718', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(277, '2023-05-29 13:38:13', '6283165005718', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(278, '2023-05-29 13:38:52', '6283165005718', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(279, '2023-05-29 13:40:36', '6283165005718', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(280, '2023-05-29 13:42:08', '6283165005718', '6285220969224', 'Zaiheryf', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(281, '2023-05-29 13:43:03', '6283165005718', '6285221288210', 'Cepi cahyana', 'Halo kak!\nKirim daftar menu dong', 0, 1, NULL, 1, NULL, 0),
(282, '2023-05-29 13:43:56', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(283, '2023-05-29 13:44:17', '6285794151322', '6285221288210', 'Cepi cahyana', 'Mau tanya', 0, 1, NULL, 1, NULL, 0),
(284, '2023-05-29 13:44:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(285, '2023-05-29 13:45:15', '6285794151322', '6285221288210', 'Cepi cahyana', 'Mau daftar menu dong', 0, 1, NULL, 1, NULL, 0),
(286, '2023-05-29 13:46:05', '6285794151322', '6285221288210', 'Cepi cahyana', 'F', 0, 1, NULL, 1, NULL, 0),
(287, '2023-05-29 13:46:05', '6285794151322', '6285221288210', 'Cepi cahyana', 'J', 0, 1, NULL, 1, NULL, 0),
(288, '2023-05-29 13:46:07', '6285794151322', '6285221288210', 'Cepi cahyana', 'Fd', 0, 1, NULL, 1, NULL, 0),
(289, '2023-05-29 13:46:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(290, '2023-05-29 13:47:32', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(291, '2023-05-29 13:47:43', '6285794151322', '6285221288210', 'Cepi cahyana', 'Huy', 0, 1, NULL, 1, NULL, 0),
(292, '2023-05-29 13:47:59', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(293, '2023-05-29 13:48:13', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(294, '2023-05-29 13:48:31', '6285794151322', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(295, '2023-05-29 14:31:15', '6285794151322', '6285221288210', 'Cepi cahyana', 'hai', 0, 1, NULL, 1, NULL, 0),
(296, '2023-05-29 15:16:23', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(297, '2023-05-29 17:26:37', '6285794151322', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(298, '2023-05-29 17:27:27', '6285794151322', '6285221288210', 'Cepi cahyana', 'D', 0, 1, NULL, 1, NULL, 0),
(299, '2023-05-29 17:27:45', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ije', 0, 1, NULL, 1, NULL, 0),
(300, '2023-05-29 17:28:17', '6285794151322', '6285221288210', 'Cepi cahyana', 'T', 0, 1, NULL, 1, NULL, 0),
(301, '2023-05-29 17:29:04', '6285794151322', '6285221288210', 'Cepi cahyana', 'Oke', 0, 1, NULL, 1, NULL, 0),
(302, '2023-05-29 17:29:08', '6285794151322', '6285221288210', 'Cepi cahyana', 'Oke', 0, 1, NULL, 1, NULL, 0),
(303, '2023-05-29 17:29:55', '6285794151322', '6285221288210', 'Cepi cahyana', 'T', 0, 1, NULL, 1, NULL, 0),
(304, '2023-05-29 17:30:25', '6285794151322', '6282113978123', 'Ike', 'T', 0, 1, NULL, 1, NULL, 0),
(305, '2023-05-29 17:30:25', '6285794151322', '6285221288210', 'Cepi cahyana', 'Y', 0, 1, NULL, 1, NULL, 0),
(306, '2023-05-29 17:30:48', '6285794151322', '6282113978123', 'Ike', 'B', 0, 1, NULL, 1, NULL, 0),
(307, '2023-05-29 17:31:04', '6285794151322', '6285221288210', 'Cepi cahyana', 'U', 0, 1, NULL, 1, NULL, 0),
(308, '2023-05-29 17:31:04', '6285794151322', '6282113978123', 'Ike', 'Y', 0, 1, NULL, 1, NULL, 0),
(309, '2023-05-29 17:35:44', '6283165005718', '6282113978123', 'Ike', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(310, '2023-05-29 17:43:49', '6285794151322', '6285221288210', 'Cepi cahyana', 'X', 0, 1, NULL, 1, NULL, 0),
(311, '2023-05-29 17:43:49', '6285794151322', '6282113978123', 'Ike', 'G', 0, 1, NULL, 1, NULL, 0),
(312, '2023-05-29 17:44:29', '6285794151322', '6285221288210', 'Cepi cahyana', 'C', 0, 1, NULL, 1, NULL, 0),
(313, '2023-05-29 17:44:44', '6285794151322', '6282113978123', 'Ike', 'B', 0, 1, NULL, 1, NULL, 0),
(314, '2023-05-29 17:45:18', '6285794151322', '6285221288210', 'Cepi cahyana', 'X', 0, 1, NULL, 1, NULL, 0),
(315, '2023-05-29 17:45:19', '6285794151322', '6282113978123', 'Ike', 'X', 0, 1, NULL, 1, NULL, 0),
(316, '2023-05-29 17:51:06', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(317, '2023-05-29 17:51:22', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(318, '2023-05-29 17:51:39', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hai', 0, 1, NULL, 1, NULL, 0),
(319, '2023-05-29 17:51:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ghh', 0, 1, NULL, 1, NULL, 0),
(320, '2023-05-29 17:51:58', '6285794151322', '6282113978123', 'Ike', 'Cff', 0, 1, NULL, 1, NULL, 0),
(321, '2023-05-29 17:52:05', '6285794151322', '6285221288210', 'Cepi cahyana', 'Bhh', 0, 1, NULL, 1, NULL, 0),
(322, '2023-05-29 17:52:05', '6285794151322', '6282113978123', 'Ike', 'Fff', 0, 1, NULL, 1, NULL, 0),
(323, '2023-05-29 17:53:57', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(324, '2023-05-29 17:55:19', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(325, '2023-05-29 17:55:44', '6285794151322', '6282113978123', 'Ike', 'H', 0, 1, NULL, 1, NULL, 0),
(326, '2023-05-29 17:56:06', '6283165005718', '6282113978123', 'Ike', 'Menu', 0, 1, NULL, 1, NULL, 0),
(327, '2023-05-29 17:56:06', '6285794151322', '6285221288210', 'Cepi cahyana', 'Menu', 0, 1, NULL, 1, NULL, 0),
(328, '2023-05-29 17:57:48', '6283165005718', '6282113978123', 'Ike', 'Menu', 0, 1, NULL, 1, NULL, 0),
(329, '2023-05-29 17:59:10', '6283165005718', '6282113978123', 'Ike', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(330, '2023-05-29 18:25:53', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(331, '2023-05-29 18:38:26', '6283165005718', '6285794151894', 'RestoBot', 'Halo kak!\nKirim daftar menu dong', 0, 1, NULL, 1, NULL, 0),
(332, '2023-05-29 18:41:35', '6285794151322', '6285794151894', 'RestoBot', 'Hi', 0, 1, NULL, 1, NULL, 0),
(333, '2023-05-29 18:41:58', '6285794151322', '6285221288210', 'Cepi cahyana', 'G', 0, 1, NULL, 1, NULL, 0),
(334, '2023-05-29 18:42:00', '6285794151322', '6285794151894', 'RestoBot', 'G', 0, 1, NULL, 1, NULL, 0),
(335, '2023-05-29 18:48:17', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(336, '2023-05-29 18:48:17', '6285794151322', '6285794151894', 'RestoBot', 'D', 0, 1, NULL, 1, NULL, 0),
(337, '2023-05-29 20:25:29', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(338, '2023-05-29 20:40:03', '6285794151322', '6285221288210', 'Cepi cahyana', 'Ho', 0, 1, NULL, 1, NULL, 0),
(339, '2023-05-30 06:01:19', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(340, '2023-05-30 08:19:24', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hay', 0, 1, NULL, 1, NULL, 0),
(341, '2023-05-30 08:42:09', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(342, '2023-05-30 11:17:08', '6285794151322', '6285221288210', 'Cepi cahyana', 'Halo', 0, 1, NULL, 1, NULL, 0),
(343, '2023-05-30 15:02:57', '6285794151322', '6282113978123', 'Ike', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(344, '2023-05-30 15:03:22', '6283165005718', '6282113978123', 'Ike', 'P', 0, 1, NULL, 1, NULL, 0),
(345, '2023-05-30 15:03:29', '6283165005718', '6282113978123', 'Ike', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(346, '2023-05-30 16:45:43', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(347, '2023-05-30 17:02:04', '6283165005718', '6285221288210', 'Cepi cahyana', 'tes', 0, 1, NULL, 1, NULL, 0),
(348, '2023-05-30 18:52:49', '6285794151322', '6285221288210', 'Cepi cahyana', 'hi', 0, 1, NULL, 1, NULL, 0),
(349, '2023-05-30 20:05:03', '6283165005718', '6285221288210', 'Tomi', 'Buku menu', 0, 1, NULL, 1, NULL, 0),
(350, '2023-05-30 20:05:17', '6285794151322', '6285221288210', 'Tomi', 'halo', 0, 1, NULL, 1, NULL, 0),
(351, '2023-05-30 20:05:20', '6285794151322', '6285221288210', 'Tomi', 'halo', 0, 1, NULL, 1, NULL, 0),
(352, '2023-05-30 20:05:42', '6283165005718', '6285221288210', 'Tomi', 'Buku menu', 0, 1, NULL, 1, NULL, 0),
(353, '2023-05-30 20:09:49', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(354, '2023-05-30 20:10:03', '6285794151322', '6285221288210', 'Cepi cahyana', 'halo', 0, 1, NULL, 1, NULL, 0),
(355, '2023-05-30 20:10:12', '6285794151322', '6285221288210', 'Cepi cahyana', 'oke', 0, 1, NULL, 1, NULL, 0),
(356, '2023-05-30 20:55:36', '6285794151322', '6285221288210', 'Cepi cahyana', 'Hi', 0, 1, NULL, 1, NULL, 0),
(357, '2023-05-30 20:55:39', '6285794151322', '6282113978123', 'Ike', 'Tes', 0, 1, NULL, 1, NULL, 0),
(358, '2023-05-30 20:55:44', '6285794151322', '6282113978123', 'Ike', 'Hallo', 0, 1, NULL, 1, NULL, 0),
(359, '2023-05-31 01:30:29', '6285794151322', '6285221288210', 'Cepi cahyana', 'Tes', 0, 1, NULL, 1, NULL, 0),
(360, '2023-05-31 01:30:44', '6285794151322', '6285221288210', 'Cepi cahyana', 'H', 0, 1, NULL, 1, NULL, 0),
(361, '2023-05-31 01:31:24', '6285794151322', '6285221288210', 'Abc', 'Tes', 0, 1, NULL, 1, NULL, 0),
(362, '2023-05-31 01:32:09', '6285794151322', '6285221288210', 'Cepicahyana.com', 'A', 0, 1, NULL, 1, NULL, 0),
(363, '2023-05-31 06:45:33', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hi', 0, 1, NULL, 1, NULL, 0),
(364, '2023-05-31 06:45:34', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Uhuy', 0, 1, NULL, 1, NULL, 0),
(365, '2023-05-31 07:50:23', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hai', 0, 1, NULL, 1, NULL, 0),
(366, '2023-05-31 13:51:56', '6285794151322', '6285221288210', 'Cepicahyana.com', 'hi', 0, 1, NULL, 1, NULL, 0),
(367, '2023-05-31 14:11:41', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Gi', 0, 1, NULL, 1, NULL, 0),
(368, '2023-05-31 22:48:33', '6285794151322', '6285221288210', 'Cepicahyana.com', 'D', 0, 1, NULL, 1, NULL, 0),
(369, '2023-05-31 22:48:33', '6285794151322', '6285221288210', 'Cepicahyana.com', 'E', 0, 1, NULL, 1, NULL, 0),
(370, '2023-05-31 22:48:34', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hi', 0, 1, NULL, 1, NULL, 0),
(371, '2023-05-31 22:48:34', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Iy', 0, 1, NULL, 1, NULL, 0),
(372, '2023-06-01 09:52:39', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Trs', 0, 1, NULL, 1, NULL, 0),
(373, '2023-06-01 10:27:00', '6285794151322', '622150980366', NULL, '', 0, 1, NULL, 1, NULL, 0),
(374, '2023-06-01 10:27:00', '6285794151322', '622150980366', '622150980366', '*029125* adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.', 0, 1, NULL, 1, NULL, 0),
(375, '2023-06-01 18:13:31', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Halo', 0, 1, NULL, 1, NULL, 0),
(376, '2023-06-01 18:13:38', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hai', 0, 1, NULL, 1, NULL, 0),
(377, '2023-06-01 18:40:40', '6283165005718', '6285221288210', 'Cepicahyana.com', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(378, '2023-06-01 19:00:42', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Yu', 0, 1, NULL, 1, NULL, 0),
(379, '2023-06-02 09:46:12', '6285794151322', '6285221288210', 'Cepicahyana.com', 'h', 0, 1, NULL, 1, NULL, 0),
(380, '2023-06-02 10:27:15', '6285794151322', '6285221288210', 'Cepicahyana.com', '!buttons', 0, 1, NULL, 1, NULL, 0),
(381, '2023-06-02 10:29:24', '6285794151322', '6285221288210', 'Cepicahyana.com', 'G', 0, 1, NULL, 1, NULL, 0),
(382, '2023-06-02 10:29:35', '6285794151322', '6285221288210', 'Cepicahyana.com', '!buttons', 0, 1, NULL, 1, NULL, 0),
(383, '2023-06-02 10:34:31', '6285794151322', '6285221288210', 'Cepicahyana.com', 'H', 0, 1, NULL, 1, NULL, 0),
(384, '2023-06-02 10:39:56', '6285794151322', '6285221288210', 'Cepicahyana.com', 'D', 0, 1, NULL, 1, NULL, 0),
(385, '2023-06-02 10:40:16', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Hi', 0, 1, NULL, 1, NULL, 0),
(386, '2023-06-02 10:48:02', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Tes', 0, 1, NULL, 1, NULL, 0),
(387, '2023-06-02 10:48:12', '6285794151322', '6285221288210', 'Cepicahyana.com', 'Tes', 0, 1, NULL, 1, NULL, 0),
(388, '2023-06-02 10:50:35', '6285794151322', '6285221288210', 'Cepicahyana.com', 'V', 0, 1, NULL, 1, NULL, 0),
(389, '2023-06-02 10:50:47', '6285794151322', '6285221288210', 'Cepicahyana.com', 'F', 0, 1, NULL, 1, NULL, 0),
(390, '2023-06-02 10:51:41', '6285794151322', '6285221288210', 'Cepicahyana.com', 'G', 0, 1, NULL, 1, NULL, 0),
(391, '2023-06-02 10:52:18', '6285794151322', '6285221288210', 'Tes', 'Tes', 0, 1, NULL, 1, NULL, 0),
(392, '2023-06-02 10:52:47', '6285794151322', '6285221288210', 'Cepi.c', 'Huy', 0, 1, NULL, 1, NULL, 0),
(393, '2023-06-02 14:06:06', '6285794151322', '6285221288210', 'Cepi.c', 'D', 0, 1, NULL, 1, NULL, 0),
(394, '2023-06-02 14:06:07', '6285794151322', '6285221288210', 'Cepi.c', 'V', 0, 1, NULL, 1, NULL, 0),
(395, '2023-06-02 14:06:08', '6285794151322', '6285221288210', 'Cepi.c', 'G', 0, 1, NULL, 1, NULL, 0),
(396, '2023-06-02 15:03:04', '6285794151322', '6285221288210', 'Cepi.c', 'Teh', 0, 1, NULL, 1, NULL, 0),
(397, '2023-06-02 15:03:25', '6283165005718', '6285221288210', 'Cepi.c', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(398, '2023-06-03 17:48:39', '6285794151322', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(399, '2023-06-03 23:24:36', '6285794151322', '6285221288210', 'Cepi.c', 'HLo', 0, 1, NULL, 1, NULL, 0),
(400, '2023-06-04 05:49:05', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(401, '2023-06-04 09:17:30', '6285794151322', '6285221288210', 'Cepi.c', 'Sip', 0, 1, NULL, 1, NULL, 0),
(402, '2023-06-04 09:28:09', '6285794151322', '6285221288210', 'Cepi.c', 'Halo', 0, 1, NULL, 1, NULL, 0),
(403, '2023-06-04 12:05:14', '6283165005718', '6285221288210', 'Cepi.c', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(404, '2023-06-04 12:34:18', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunSun123418.png', 1, NULL, 0),
(405, '2023-06-04 14:37:19', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(406, '2023-06-04 14:38:47', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(407, '2023-06-04 14:38:59', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(408, '2023-06-04 14:39:19', '6285794151322', '6285221288210', 'Cepi.c', 'Halo', 0, 1, NULL, 1, NULL, 0),
(409, '2023-06-04 14:39:41', '6285794151322', '6285221288210', 'Cepi.c', 'Huy', 0, 1, NULL, 1, NULL, 0),
(410, '2023-06-04 14:40:33', '6285794151322', '6281276130432', 'Mink', 'Haloo', 0, 1, NULL, 1, NULL, 0),
(411, '2023-06-04 18:02:11', '6285794151322', '6285221288210', 'Cepi.c', 'HI', 0, 1, NULL, 1, NULL, 0),
(412, '2023-06-05 15:10:29', '6285163082099', '6285157559328', 'PAPAHMUDA MANAGEMENT', 'P', 0, 1, NULL, 1, NULL, 0),
(413, '2023-06-05 15:11:42', '6285163082099', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(414, '2023-06-05 15:11:57', '6285163082099', '6285221288210', 'Cepi.c', 'Ok', 0, 1, NULL, 1, NULL, 0),
(415, '2023-06-05 15:25:52', '6285163082099', '6285157559328', 'PAPAHMUDA MANAGEMENT', 'Tes', 0, 1, NULL, 1, NULL, 0),
(416, '2023-06-05 15:27:50', '6285163082099', '6285221288210', 'Cepi.c', 'tes', 0, 1, NULL, 1, NULL, 0),
(417, '2023-06-05 15:28:03', '6285794151322', '6285221288210', 'Cepi.c', 'tes', 0, 1, NULL, 1, NULL, 0),
(418, '2023-06-05 15:28:10', '6285163082099', '6285221288210', 'Cepi.c', 'tes', 0, 1, NULL, 1, NULL, 0),
(419, '2023-06-05 15:31:37', '6285163082099', '6285157559328', 'PAPAHMUDA MANAGEMENT', 'Hi', 0, 1, NULL, 1, NULL, 0),
(420, '2023-06-05 15:51:32', '6285163082099', '6285157559328', 'PAPAHMUDA MANAGEMENT', 'Hi', 0, 1, NULL, 1, NULL, 0),
(421, '2023-06-05 16:23:13', '6285163082099', '6285221288210', 'Cepi.c', 'daftar-menu', 0, 1, NULL, 1, NULL, 0),
(422, '2023-06-05 16:25:27', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(423, '2023-06-05 16:26:05', '6285794151322', '6285221288210', 'Cepi.c', 'HI', 0, 1, NULL, 1, NULL, 0),
(424, '2023-06-05 16:26:52', '6285794151322', '6285221288210', 'Cepi.c', 'Huy', 0, 1, NULL, 1, NULL, 0),
(425, '2023-06-05 16:37:21', '6283165005718', '6285221288210', 'Cepi.c', 'Daftar meenu', 0, 1, NULL, 1, NULL, 0),
(426, '2023-06-06 12:29:38', '6285163082099', '6285221288210', 'Cepi.c', 'Good food', 0, 1, NULL, 1, NULL, 0),
(427, '2023-06-06 12:30:10', '6283165005718', '6285221288210', 'Cepi.c', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(428, '2023-06-06 22:56:39', '6285794151322', '6285221288210', 'Cepi.c', 'halo', 0, 1, NULL, 1, NULL, 0),
(429, '2023-06-06 23:21:52', '6285794151322', '6285221288210', 'Cepi.c', 'hi', 0, 1, NULL, 1, NULL, 0),
(430, '2023-06-07 07:51:54', '6285794151322', '6285221288210', 'Cepi.c', 'Hay', 0, 1, NULL, 1, NULL, 0),
(431, '2023-06-07 10:52:16', '6285794151322', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(432, '2023-06-08 07:45:52', '6285794151322', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(433, '2023-06-08 07:47:07', '6285794151322', '6285221288210', 'Cepi.c', 'HLo', 0, 1, NULL, 1, NULL, 0),
(434, '2023-06-09 23:06:41', '6285794151322', '6289514104072', NULL, '', 0, 1, NULL, 1, NULL, 0),
(435, '2023-06-10 14:57:09', '6285794151322', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(436, '2023-06-11 20:12:48', '6283165005718', '6285724901097', NULL, '', 0, 1, NULL, 1, NULL, 0),
(437, '2023-06-11 20:12:48', '6283165005718', '6285724901097', 'Dori', 'Halo kak!\nKirim daftar menu dong', 0, 1, NULL, 1, NULL, 0),
(438, '2023-06-12 14:22:13', '6285794151322', '6285221288210', 'Cepi.c', 'HLo', 0, 1, NULL, 1, NULL, 0),
(439, '2023-06-12 14:22:41', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(440, '2023-06-12 14:48:50', '6285794151322', '6285221288210', 'Cepi.c', 'Tes', 0, 1, NULL, 1, NULL, 0),
(441, '2023-06-14 06:16:56', '6285794151322', '6285221288210', 'Cepi.c', 'halo', 0, 1, NULL, 1, NULL, 0),
(442, '2023-06-14 06:17:09', '6285794151322', '6285221288210', 'Cepi.c', 'ok', 0, 1, NULL, 1, NULL, 0),
(443, '2023-06-14 06:18:19', '6285794151322', '6285221288210', 'Cepi.c', 'huy', 0, 1, NULL, 1, NULL, 0),
(444, '2023-06-20 01:42:24', '6285794151322', '6285221288210', 'Cepi.c', 'halo', 0, 1, NULL, 1, NULL, 0),
(445, '2023-06-20 09:32:11', '6285794151322', '6285221288210', 'Cepi.c', 'Hai', 0, 1, NULL, 1, NULL, 0),
(446, '2023-06-25 11:04:39', '6285163082099', '6285157559328', 'PAPAH MUDA ENTERTAINMENT', 'BEGIN:VCARD\nVERSION:3.0\nN:;Daw;;;\nFN:Daw\nitem1.TEL;waid=62895360608247:+62 895-3606-08247\nitem1.X-ABLabel:Ponsel\nEND:VCARD', 0, 1, NULL, 1, NULL, 0),
(447, '2023-06-25 18:20:33', '6285794151322', '6285221288210', 'Cepi.c', 'Halo', 0, 1, NULL, 1, NULL, 0),
(448, '2023-06-25 18:21:31', '6283165005718', '6285221288210', 'Cepi.c', 'Daftar menu', 0, 1, NULL, 1, NULL, 0),
(449, '2023-06-26 14:12:41', '6285794151322', '6285221288210', 'Cepi.c', 'Hi', 0, 1, NULL, 1, NULL, 0),
(450, '2023-06-26 14:48:39', '6285794151322', '6285221288210', 'Cepi.c', 'Tes', 0, 1, NULL, 1, NULL, 0),
(451, '2023-06-26 15:05:43', '6285794151322', '6285221288210', 'Cepi.c', 'Tes', 0, 1, NULL, 1, NULL, 0);
INSERT INTO `msg_inbox` (`id`, `_ctime`, `to`, `sender_number`, `sender_name`, `msg`, `sts`, `jenis_pesan`, `file`, `kategory`, `session_cs`, `replay`) VALUES
(452, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'Halo', 0, 1, NULL, 1, NULL, 0),
(453, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'halo', 0, 1, NULL, 1, NULL, 0),
(454, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'Y', 0, 1, NULL, 1, NULL, 0),
(455, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'H', 0, 1, NULL, 1, NULL, 0),
(456, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'Fbr', 0, 1, NULL, 1, NULL, 0),
(457, '2023-06-27 06:21:10', '6285794151322', '6285221288210', 'Cepi.c', 'Tes', 0, 1, NULL, 1, NULL, 0),
(458, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', 'Halo fbr', 0, 1, NULL, 1, NULL, 0),
(459, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', '1', 0, 1, NULL, 1, NULL, 0),
(460, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', 'Cara gabung fbr gimana?', 0, 1, NULL, 1, NULL, 0),
(461, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunTue110950.png', 1, NULL, 0),
(462, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunTue110950.png', 1, NULL, 0),
(463, '2023-06-27 11:09:50', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunTue110950.png', 1, NULL, 0),
(464, '2023-06-27 11:09:51', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunTue110951.png', 1, NULL, 0),
(465, '2023-06-27 11:09:51', '6285794151322', '6285221288210', 'Cepi.c', '', 0, 2, 'file_upload/inbox/6285221288210_2023JunTue110951.png', 1, NULL, 0),
(466, '2023-06-27 11:09:51', '6285794151322', '6285221288210', 'Cepi.c', 'Halo fbr', 0, 1, NULL, 1, NULL, 0),
(467, '2023-06-27 11:09:51', '6285794151322', '6285221288210', 'Cepi.c', 'tes', 0, 1, NULL, 1, NULL, 0),
(468, '2023-06-27 11:10:45', '6285794151322', '6285221288210', 'Cepi.c', 'tes', 0, 1, NULL, 1, NULL, 0),
(469, '2023-06-27 11:10:45', '6285794151322', '6285221288210', 'Cepi.c', 'hi', 0, 1, NULL, 1, NULL, 0),
(470, '2023-06-27 11:10:56', '6285794151322', '6285221288210', 'Cepi.c', 'sip', 0, 1, NULL, 1, NULL, 0),
(471, '2023-06-28 07:18:51', '6285794151322', '6285221288210', 'Cepi.c', 'Halo', 0, 1, NULL, 1, NULL, 0),
(472, '2023-06-29 11:10:58', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', '', 0, 2, 'file_upload/inbox/6285100795384_2023JunThu111058.png', 1, NULL, 0),
(473, '2023-06-29 13:12:25', '6283165005718', '6281211813160', '.', 'Hp ak mati', 0, 1, NULL, 1, NULL, 0),
(474, '2023-06-29 13:12:29', '6283165005718', '6281211813160', '.', 'Ga BS d cas', 0, 1, NULL, 1, NULL, 0),
(475, '2023-06-29 13:12:36', '6283165005718', '6281211813160', '.', 'Ke wa Kaka aja KL mau tlp', 0, 1, NULL, 1, NULL, 0),
(476, '2023-06-29 13:24:06', '6283165005718', '6283803341564', 'DickySP', 'iyah pa', 0, 1, NULL, 1, NULL, 0),
(477, '2023-06-29 13:33:16', '6283165005718', '6283803341564', 'DickySP', 'tdi ali ksitu gada katanya pa', 0, 1, NULL, 1, NULL, 0),
(478, '2023-06-29 14:08:38', '6283165005718', '6283803341564', 'DickySP', 'pa krimer skm abis banget', 0, 1, NULL, 1, NULL, 0),
(479, '2023-06-29 20:24:00', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'ia pah....mksh...', 0, 1, NULL, 1, NULL, 0),
(480, '2023-06-29 20:24:06', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'km udh makan blm?', 0, 1, NULL, 1, NULL, 0),
(481, '2023-06-29 20:24:12', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'umi td siang nlp nanyain', 0, 1, NULL, 1, NULL, 0),
(482, '2023-06-29 20:24:16', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'km ktnya ga ada d rmh', 0, 1, NULL, 1, NULL, 0),
(483, '2023-06-29 20:25:56', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'ga apa2 da dxjt jg pd ga ada', 0, 1, NULL, 1, NULL, 0),
(484, '2023-06-29 20:26:07', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'kt umi mau ikt k bandung ga', 0, 1, NULL, 1, NULL, 0),
(485, '2023-06-29 20:26:10', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'nawarin si kaka', 0, 1, NULL, 1, NULL, 0),
(486, '2023-06-29 20:26:17', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'slna si ateu mah pd d bndg', 0, 1, NULL, 1, NULL, 0),
(487, '2023-06-29 20:29:56', '6283165005718', '6285100795384', 'Nunung- Kuliah karywan Univ Subang', 'ga....', 0, 1, NULL, 1, NULL, 0),
(488, '2023-06-30 10:30:10', '6283165005718', '6283803341564', 'DickySP', 'ORDER BAR : \n\nKRIMER\nSKM\nGULA PUTIH\nGULA AREN\nBUAH LECI\nPOWDER CHOCOLATE', 0, 1, NULL, 1, NULL, 0),
(489, '2023-06-30 10:30:19', '6283165005718', '6283803341564', 'DickySP', 'BOBA', 0, 1, NULL, 1, NULL, 0),
(490, '2023-06-30 10:32:56', '6283165005718', '6283803341564', 'DickySP', 'bar bnyak yg kosong pa', 0, 1, NULL, 1, NULL, 0),
(491, '2023-06-30 17:24:09', '6283165005718', '6281211813160', '.', 'Pah td mpah ga bawa kucing kann', 0, 1, NULL, 1, NULL, 0),
(492, '2023-07-06 06:16:05', '6285794151322', '6281395969437', 'Prosa Cs', 'Your Prosa OTP is 0457', 0, 1, NULL, 1, NULL, 0),
(493, '2023-07-06 06:16:18', '6285794151322', '6281395969437', 'Prosa Cs', 'Selamat datang di contact center Prosa AI\n\nSilakan tulis pesan anda, kami akan segera menjawab:\n\nHari Kerja Senin-Jum\'at jam 09.00 - 18.00', 0, 1, NULL, 1, NULL, 0),
(494, '2023-07-06 06:16:20', '6285794151322', '6281395969437', 'Prosa Cs', 'Terima kasih telah menghubungi kami, saat ini seluruh tim kami sedang tidak dapat membalas pesan anda dengan cepat, mohon menunggu balasan.', 0, 1, NULL, 1, NULL, 0),
(495, '2023-07-06 06:17:11', '6285794151322', '6281395969437', 'Prosa Cs', 'Your Prosa OTP is 1908', 0, 1, NULL, 1, NULL, 0),
(496, '2023-07-06 06:18:50', '6285794151322', '6281395969437', 'Prosa Cs', 'Your Prosa OTP is 0047', 0, 1, NULL, 1, NULL, 0),
(497, '2023-07-06 06:21:14', '6285794151322', '6281395969437', 'Prosa Cs', 'Your Prosa OTP is 5420', 0, 1, NULL, 1, NULL, 0),
(498, '2023-07-12 11:31:01', '6285794151322', '6287762679524', 'rifky irawan', '', 0, 1, NULL, 1, NULL, 0),
(499, '2023-07-12 11:50:19', '6285794151322', '6281806746201', 'Moch Irwin Anugrah', 'Ok', 0, 1, NULL, 1, NULL, 0),
(500, '2023-07-12 11:53:37', '6285794151322', '6281806746201', 'Moch Irwin Anugrah', 'Oke', 0, 1, NULL, 1, NULL, 0),
(501, '2023-07-12 18:41:37', '6285163082099', '6285157559328', 'PAPAH MUDA ENTERTAINMENT', 'Sound 1,500\nPlayer 450\nKendang 350\nSinger 250x2 (500) \nMC 250\n\nGalura \nPenari 250x4 (1jt) \nPayung agung 250\nLengser 250x2 (500)\nMC 400\nKostum 75x7 \nProperty 150', 0, 1, NULL, 1, NULL, 0),
(502, '2023-07-12 18:43:48', '6285163082099', '6285157559328', 'PAPAH MUDA ENTERTAINMENT', 'Sound 1,500\nPlayer 450\nKendang 350\nSinger 250x2 (500) \nMC 250\n\nGalura \nKendang 400\nKecapi 400\nSuling 350\nJurkaw 400\nPenari 250x4 (1jt) \nPayung agung 250\nLengser 250x2 (500)\nMC 400\nKostum 75x7 \nProperty 150', 0, 1, NULL, 1, NULL, 0),
(503, '2023-07-12 18:47:51', '6285163082099', '6285157559328', 'PAPAH MUDA ENTERTAINMENT', '', 0, 2, 'file_upload/inbox/6285157559328_2023JulWed184751.png', 1, NULL, 0),
(504, '2023-07-14 15:05:34', '6283165005718', '6285156524056', 'yam', 'Halo kak!\npesanannya masih belum ya?', 0, 1, NULL, 1, NULL, 0),
(505, '2023-07-19 14:18:43', '6283165005718', '6287749959808', NULL, '', 0, 1, NULL, 1, NULL, 0),
(506, '2023-07-19 14:18:43', '6283165005718', '6287749959808', NULL, '', 0, 1, NULL, 1, NULL, 0),
(507, '2023-07-27 07:49:49', '6285794151322', '', NULL, 'dd', 0, 1, NULL, 1, NULL, 0),
(508, '2023-07-28 08:30:53', '6285794151322', '6288991762339', '6288991762339', '*TikTok 225418* adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.', 0, 1, NULL, 1, NULL, 0),
(509, '2023-07-28 08:30:54', '6285794151322', '12014935311', NULL, '', 0, 1, NULL, 1, NULL, 0),
(510, '2023-07-28 08:30:54', '6285794151322', '6288991762339', NULL, '', 0, 1, NULL, 1, NULL, 0),
(511, '2023-07-28 08:30:55', '6285794151322', '12014935311', '12014935311', '[#][TikTok] 225418 adalah kode verifikasi Anda\nDaewVlZQ+ns', 0, 1, NULL, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg_outbox`
--

CREATE TABLE `msg_outbox` (
  `id` int(11) NOT NULL,
  `_ctime` datetime NOT NULL,
  `sender_number` varchar(20) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `msg` mediumtext NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pengaturan` varchar(35) DEFAULT NULL,
  `val` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_pengaturan`, `val`) VALUES
(1, 'Keyword pemanggilan CS', 'Hubungi CS'),
(2, 'instruksi cs', 'Silahkan ketik pesan yang akan anda sampaikan ini bisa berupa kritik & saran maupun pertanyaan lainnya'),
(3, '3', 'Terimakasih anda akan segera kami hubungi, mohon menunggu pesan balasan dari kami, jika ingin membatalkan silahkan ketk *batal*'),
(4, 'pesan batal', 'Permohonan sudah di batalkan, anda bisa akses kembali menu informasi lainnya'),
(5, 'file_upload', 'file_upload/broadcast'),
(6, 'Keyword aduan pelanggan', 'Pengaduan Pasien'),
(7, 'Informasi end chat', 'Terimakasih sudah menghubungi kami, semoga kami selalu memberikan yang terbaik buat anda'),
(8, 'Nama RS', 'Coffee & Space'),
(9, 'keyword panggil antrian', 'Daftar Sekarang'),
(10, 'keyword cek ruangan', 'cek ketersediaan ruangan');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_cs`
--

CREATE TABLE `pesan_cs` (
  `id` int(11) NOT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `sender_name` varchar(250) NOT NULL,
  `sender_number` varchar(100) NOT NULL,
  `msg` mediumtext NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `kode` varchar(50) NOT NULL,
  `sts` int(11) NOT NULL DEFAULT 0 COMMENT '1=sudah dibaca',
  `hits` int(11) NOT NULL DEFAULT 0 COMMENT '1=done',
  `file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_cs`
--

INSERT INTO `pesan_cs` (`id`, `id_cs`, `sender_name`, `sender_number`, `msg`, `_ctime`, `kode`, `sts`, `hits`, `file`) VALUES
(1, NULL, 'Andi  Perdana Kahar', '62811911992', 'Mygas', '2023-01-12 14:05:34', '20230106061046rYMhT', 0, 1, NULL),
(2, NULL, 'Andi  Perdana Kahar', '62811911992', 'Mygas', '2023-01-12 14:05:41', '20230106061046rYMhT', 0, 1, NULL),
(3, NULL, 'Andi  Perdana Kahar', '62811911992', 'mygas', '2023-01-17 10:29:25', '20230112161817apK2C', 0, 1, NULL),
(4, NULL, 'Intaha', '628129943041', 'Intaha Ishaq\nCipinang Muara Rt 6/Rw 4, no 21, jln BB. \n08129943041\nintahaishaq@gmail.com\n\nSaya ingin mendaftar pelanggan PGN, karena dikelurahan ini sedang ada galian masal termasuk sekeliling rumah saya. Saat yg lalu ketua RT tidak memberi informasi kpd saya tentang pendaftaran massal. \nMumpung sedang digali, saya ingin segera mendaftar, bagaimana syaratnya dam kemana saya harus datang? \nTerima kasih.', '2023-01-17 11:47:50', '20230117114738DskoK', 0, 1, NULL),
(5, NULL, 'Intaha', '628129943041', '???', '2023-01-17 12:25:13', '20230117114738DskoK', 0, 1, NULL),
(6, NULL, 'Intaha', '628129943041', 'Gas untuk dapur rumah tangga, bukan bisnis ya.', '2023-01-17 12:27:42', '20230117114738DskoK', 0, 1, NULL),
(7, NULL, 'Intaha', '628129943041', 'Sebetulnya saya mau datang offline biar cepet, tapi blm tau kemana dan dengan siapa.', '2023-01-17 12:30:17', '20230117114738DskoK', 0, 1, NULL),
(8, NULL, 'Intaha', '628129943041', 'Selamst siang', '2023-01-17 12:38:43', '20230117114738DskoK', 0, 1, NULL),
(9, NULL, 'Intaha', '628129943041', 'Instalasi pipa dari jaringan ke dapur seperti yg sedang digali  massal di cipinang muara.', '2023-01-17 12:40:04', '20230117114738DskoK', 0, 1, NULL),
(10, NULL, 'Intaha', '628129943041', '', '2023-01-17 12:42:17', '20230117114738DskoK', 0, 1, 'file_upload/inbox/628129943041_2023JanTue124217.png'),
(11, NULL, 'Intaha', '628129943041', 'Tolong bantu saya, kemana saya harus datang untuk tujuan diatas.', '2023-01-17 12:43:44', '20230117114738DskoK', 0, 1, NULL),
(12, NULL, 'Intaha', '628129943041', 'Intaha Ishaq\nCipinang Muara Rt 6/Rw 4, no 21, jln BB. \n08129943041\nintahaishaq@gmail.com\n\nSaya ingin mendaftar pelanggan PGN, karena dikelurahan ini sedang ada galian masal termasuk sekeliling rumah saya. Saat yg lalu ketua RT tidak memberi informasi kpd saya tentang pendaftaran massal. \nMumpung sedang digali, saya ingin segera mendaftar, bagaimana syaratnya dam kemana saya harus datang? \nTerima kasih.', '2023-01-17 12:44:21', '20230117114738DskoK', 0, 1, NULL),
(13, NULL, 'Intaha', '628129943041', 'Kata pusat, bisa menghubungi bag penjualan dimanapun.', '2023-01-17 12:46:05', '20230117114738DskoK', 0, 1, NULL),
(14, NULL, 'Intaha', '628129943041', 'Oke tq', '2023-01-17 13:19:41', '20230117114738DskoK', 0, 1, NULL),
(15, NULL, 'Patau Sitting', '6285624951277', 'Kami punya banyak tabung kosong myGas, sdh tidak terpakai karena usaha kami terhenti   disebbkan sesuatu hal....\n\nPertanyaan kami... bisa dijual kemana tabung2 myGas kosong tersebut', '2023-01-18 11:16:53', '20230118111640nHKU3', 0, 1, NULL),
(16, NULL, 'Patau Sitting', '6285624951277', 'Bpk Ifan Gunawan dr Sukabumi', '2023-01-18 11:20:18', '20230118111640nHKU3', 0, 1, NULL),
(17, NULL, 'Patau Sitting', '6285624951277', 'Kami kurang faham dari mana asal pembelian tabung gas tsb.....cmn yg jelas kami akan jual semua tabung kosong tsb..m', '2023-01-18 11:26:16', '20230118111640nHKU3', 0, 1, NULL),
(18, NULL, 'Patau Sitting', '6285624951277', 'Mitra', '2023-01-18 11:28:32', '20230118111640nHKU3', 0, 1, NULL),
(19, NULL, 'Patau Sitting', '6285624951277', 'Itulah kami tdk tahu siapa nama yg suka kirimnya....parahnya lagi kami lost kontak dgn beliau...', '2023-01-18 11:36:44', '20230118111640nHKU3', 0, 1, NULL),
(20, NULL, 'Patau Sitting', '6285624951277', 'Ya kesimpulannya kami hanya ingin menjual tabung myGas kosong ..itu za....karena sayang ...itu aset buat kami....ada sekitaran 100-150 tabung kosong, 12kg dan 4,5kg', '2023-01-18 11:39:15', '20230118111640nHKU3', 0, 1, NULL),
(21, NULL, 'Patau Sitting', '6285624951277', '🙏🏼🙏🏼🙏🏼', '2023-01-18 11:39:19', '20230118111640nHKU3', 0, 1, NULL),
(22, NULL, 'Patau Sitting', '6285624951277', 'Siap trims pak boss ....akan kami usahakan tuk menghubungi nya...sipenjual awal', '2023-01-18 11:40:29', '20230118111640nHKU3', 0, 1, NULL),
(23, NULL, 'Patau Sitting', '6285624951277', 'Kami di sukabumi....\n\nNamun untuk data lkpnya.....\nMf...bribu ribu mf.... u/sementara kami privacy dl.....mf..🙏🏼🙏🏼', '2023-01-18 11:42:29', '20230118111640nHKU3', 0, 1, NULL),
(24, NULL, 'Han', '6282133047277', 'Mau tanya kalo isi langsung ke spl itu bisa kaga ya', '2023-01-19 09:48:47', '20230119094833yPmTQ', 0, 1, NULL),
(25, NULL, 'Han', '6282133047277', 'Ok', '2023-01-19 09:48:57', '20230119094833yPmTQ', 0, 1, NULL),
(26, NULL, 'Han', '6282133047277', 'Pagii', '2023-01-19 09:49:59', '20230119094833yPmTQ', 0, 1, NULL),
(27, NULL, 'Han', '6282133047277', 'Sudah', '2023-01-19 09:50:43', '20230119094833yPmTQ', 0, 1, NULL),
(28, NULL, 'Han', '6282133047277', 'Untuk pengisian langsung ke spl bisa kaga ya?', '2023-01-19 09:51:05', '20230119094833yPmTQ', 0, 1, NULL),
(29, NULL, 'Han', '6282133047277', 'Sebagai resto pak/bu', '2023-01-19 09:55:10', '20230119094833yPmTQ', 0, 1, NULL),
(30, NULL, 'Han', '6282133047277', 'Saya mau tanya kalo misalkan saya isi ke spl itu langsung bisa dapet harga beda kaga ya', '2023-01-19 09:55:59', '20230119094833yPmTQ', 0, 1, NULL),
(31, NULL, 'Han', '6282133047277', 'Rencana saya mau isi 40 tbg', '2023-01-19 09:56:17', '20230119094833yPmTQ', 0, 1, NULL),
(32, NULL, 'Han', '6282133047277', 'Ooo okok', '2023-01-19 09:57:05', '20230119094833yPmTQ', 0, 1, NULL),
(33, NULL, 'Han', '6282133047277', 'Atas nama rudy pak', '2023-01-19 09:57:19', '20230119094833yPmTQ', 0, 1, NULL),
(34, NULL, 'Han', '6282133047277', 'Restoran singapore', '2023-01-19 09:57:28', '20230119094833yPmTQ', 0, 1, NULL),
(35, NULL, 'Han', '6282133047277', 'Lokasi di pulau bira', '2023-01-19 09:58:08', '20230119094833yPmTQ', 0, 1, NULL),
(36, NULL, 'Han', '6282133047277', 'Biasa refill di tomang pak', '2023-01-19 09:58:21', '20230119094833yPmTQ', 0, 1, NULL),
(37, NULL, 'Han', '6282133047277', 'Ooo okok', '2023-01-19 10:00:18', '20230119094833yPmTQ', 0, 1, NULL),
(38, NULL, 'Bersyukur..', '6281277735799', 'Saya mau minta price list mygas', '2023-01-24 15:26:46', '20230124152628kIaEs', 0, 1, NULL),
(39, NULL, 'Bersyukur..', '6281277735799', '👍🏽🙏🏽', '2023-01-24 15:35:51', '20230124152628kIaEs', 0, 1, NULL),
(40, NULL, 'Bersyukur..', '6281277735799', 'Harga dipasaran brp ? Maksudnya saya jual berapa. ?', '2023-01-24 15:37:31', '20230124152628kIaEs', 0, 1, NULL),
(41, NULL, 'Bersyukur..', '6281277735799', 'Ini tempat saya', '2023-01-24 15:43:52', '20230124152628kIaEs', 0, 1, 'file_upload/inbox/6281277735799_2023JanTue154352.png'),
(42, NULL, 'Bersyukur..', '6281277735799', '👍🏽🙏🏽', '2023-01-24 15:50:53', '20230124152628kIaEs', 0, 1, NULL),
(43, NULL, 'Bersyukur..', '6281277735799', 'Maaf..utk yg nganterin  ?', '2023-01-24 15:53:42', '20230124152628kIaEs', 0, 1, NULL),
(44, NULL, 'Bersyukur..', '6281277735799', 'Adri', '2023-01-24 16:03:49', '20230124152628kIaEs', 0, 1, NULL),
(45, NULL, 'Bersyukur..', '6281277735799', 'Udah satu THN an gak operasi,karena Covid', '2023-01-24 16:04:37', '20230124152628kIaEs', 0, 1, NULL),
(46, NULL, 'Bersyukur..', '6281277735799', 'Bu Marsito', '2023-01-24 16:05:02', '20230124152628kIaEs', 0, 1, NULL),
(47, NULL, 'Bersyukur..', '6281277735799', '🙏🏽', '2023-01-24 16:05:23', '20230124152628kIaEs', 0, 1, NULL),
(48, NULL, 'Eddy', '628121021062', 'Mau beli gas bisa?', '2023-02-04 06:21:18', '20230204062104wAGaR', 0, 1, NULL),
(49, NULL, 'Eddy', '628121021062', 'Kalo tutup, bisa gak ambil di satpam nya?', '2023-02-04 06:22:17', '20230204062104wAGaR', 0, 1, NULL),
(50, NULL, 'Eddy', '628121021062', 'Alamat Distributor\nLayanan Pesan Antar', '2023-02-04 06:23:02', '20230204062104wAGaR', 0, 1, NULL),
(51, NULL, 'Eddy', '628121021062', 'Ok. Tks ya 🙏', '2023-02-04 11:19:19', '20230204062104wAGaR', 0, 1, NULL),
(52, NULL, 'Met', '6281295175495', 'Mau pesan gas 50 kg', '2023-02-17 17:25:29', '20230217172517UEt8s', 0, 1, NULL),
(53, NULL, 'Met', '6281295175495', 'Utk kirim ke jakarta pusat', '2023-02-17 17:25:41', '20230217172517UEt8s', 0, 1, NULL),
(54, NULL, 'Met', '6281295175495', 'Boleh tanya, harganya brp', '2023-02-17 17:25:52', '20230217172517UEt8s', 0, 1, NULL),
(55, NULL, 'Met', '6281295175495', 'Mau pesan gas 50 kg', '2023-02-17 18:58:25', '20230217172517UEt8s', 0, 1, NULL),
(56, NULL, 'Met', '6281295175495', 'Utk kirim ke jakarta pusat', '2023-02-17 18:58:26', '20230217172517UEt8s', 0, 1, NULL),
(57, NULL, 'Met', '6281295175495', 'Boleh tanya, harganya brp', '2023-02-17 18:58:26', '20230217172517UEt8s', 0, 1, NULL),
(58, NULL, 'Met', '6281295175495', 'Dg ibu metta', '2023-02-20 09:10:28', '20230217172517UEt8s', 0, 1, NULL),
(59, NULL, 'Met', '6281295175495', 'Harga tabung kosongnya brp ya?', '2023-02-20 09:46:31', '20230217172517UEt8s', 0, 1, NULL),
(60, NULL, 'Met', '6281295175495', 'Sebulan bisa 10-12 tbng', '2023-02-20 09:48:55', '20230217172517UEt8s', 0, 1, NULL),
(61, NULL, 'Met', '6281295175495', 'Iya', '2023-02-20 09:49:28', '20230217172517UEt8s', 0, 1, NULL),
(62, NULL, 'Met', '6281295175495', 'Ok', '2023-02-20 09:51:32', '20230217172517UEt8s', 0, 1, NULL),
(63, NULL, 'Met', '6281295175495', 'Bisa spt itu ya', '2023-02-20 09:54:50', '20230217172517UEt8s', 0, 1, NULL),
(64, NULL, 'Met', '6281295175495', 'Hr ini sy ada beli 1 tabung dan isinya', '2023-02-20 09:55:05', '20230217172517UEt8s', 0, 1, NULL),
(65, NULL, 'Met', '6281295175495', 'Sy mau coba dulu 1 tabung', '2023-02-20 09:55:23', '20230217172517UEt8s', 0, 1, NULL),
(66, NULL, 'Met', '6281295175495', 'Nanti kelanjutannya br kami infokan lg', '2023-02-20 09:55:46', '20230217172517UEt8s', 0, 1, NULL),
(67, NULL, 'Met', '6281295175495', 'Kira kira brp tabung yg bisa kami pinjam?', '2023-02-20 09:56:02', '20230217172517UEt8s', 0, 1, NULL),
(68, NULL, 'Siska Natalia 🌸', '6285946146003', 'Kirim ke daerah cengkareng bisa??', '2023-02-20 14:40:36', '20230220144021npZ7J', 0, 1, NULL),
(69, NULL, 'Siska Natalia 🌸', '6285946146003', 'Dengan siska', '2023-02-20 15:20:04', '20230220144021npZ7J', 0, 1, NULL),
(70, NULL, 'Siska Natalia 🌸', '6285946146003', 'Oh trnyta tabung yg pink', '2023-02-20 16:01:58', '20230220144021npZ7J', 0, 1, NULL),
(71, NULL, 'Siska Natalia 🌸', '6285946146003', 'Kalo my gas brp yah skr??', '2023-02-20 16:02:09', '20230220144021npZ7J', 0, 1, NULL),
(72, NULL, 'Siska Natalia 🌸', '6285946146003', 'Iya ini harga brp satu nya??', '2023-02-20 16:37:34', '20230220144021npZ7J', 0, 1, NULL),
(73, NULL, 'Siska Natalia 🌸', '6285946146003', 'Tabung nya sdh ada', '2023-02-20 20:10:18', '20230220144021npZ7J', 0, 1, NULL),
(74, NULL, 'Siska Natalia 🌸', '6285946146003', 'Kalo mau isi yg 12 kilo', '2023-02-20 20:10:25', '20230220144021npZ7J', 0, 1, NULL),
(75, NULL, 'Siska Natalia 🌸', '6285946146003', 'Ok', '2023-02-21 10:05:27', '20230220144021npZ7J', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_instruksi`
--

CREATE TABLE `pesan_instruksi` (
  `id` int(11) NOT NULL,
  `pesan` varchar(250) NOT NULL,
  `to` varchar(20) NOT NULL,
  `instruksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_instruksi`
--

INSERT INTO `pesan_instruksi` (`id`, `pesan`, `to`, `instruksi`) VALUES
(1, 'create_session', '085221288210', 'create_session'),
(2, 'create_session', '081223144494', 'create_session');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_keyword`
--

CREATE TABLE `pesan_keyword` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `pesan_balasan` varchar(50) NOT NULL,
  `sts` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_terjadwal`
--

CREATE TABLE `pesan_terjadwal` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `fr` varchar(20) NOT NULL COMMENT 'frekuensi (hari)',
  `jam` time NOT NULL,
  `tgl_kirim` date NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan_terjadwal`
--

INSERT INTO `pesan_terjadwal` (`id`, `id_user`, `id_pelanggan`, `msg`, `fr`, `jam`, `tgl_kirim`, `_ctime`, `sts`) VALUES
(25, '1', '1', '1111', '1', '08:00:00', '2021-10-18', '2021-10-18 06:26:48', 0),
(46, '1', 'xx', 'xxssss', '1', '08:00:00', '2021-10-19', '2021-10-18 06:31:49', 0),
(47, '1', 'xx', 'xx2', '1', '08:00:00', '2021-10-19', '2021-10-18 06:31:49', 0),
(48, '1', 'xx', 'xxssss', '1', '08:00:00', '2021-10-19', '2021-10-18 06:31:49', 0),
(49, '1', 'xx', 'xx2', '1', '08:00:00', '2021-10-19', '2021-10-18 06:31:49', 0),
(59, '1', 'xxxxxxxxxxx', 'x', '1', '08:00:00', '2021-10-19', '2021-10-18 08:08:14', 0),
(60, '1', 'xxxxxxxxxxx', 'xx', '1', '08:00:00', '2021-10-18', '2021-10-18 08:08:14', 0),
(61, '1', 'xxxxxxxxxxxe', 'x', '1', '08:00:00', '2021-10-19', '2021-10-18 08:28:22', 0),
(62, '1', 'xxxxxxxxxxxe', 'xx', '1', '08:00:00', '2021-10-18', '2021-10-18 08:28:22', 0),
(63, '1', '123', '1111', '1', '08:00:00', '2021-10-18', '2021-10-18 08:28:46', 0),
(64, '1', 'xxxxxxxxxxx3', 'x', '1', '08:00:00', '2021-10-19', '2021-10-18 08:28:53', 0),
(65, '1', 'xxxxxxxxxxx3', 'xx', '1', '08:00:00', '2021-10-18', '2021-10-18 08:28:53', 0),
(66, '1', 'xxxxxxxxxxx1', 'x', '1', '08:00:00', '2021-10-19', '2021-10-18 08:28:59', 0),
(67, '1', 'xxxxxxxxxxx1', 'xx', '1', '08:00:00', '2021-10-18', '2021-10-18 08:28:59', 0),
(75, '1', '08', 'okey siappppp', '1', '08:00:00', '2021-10-18', '2021-10-18 08:30:28', 0),
(78, '1', '082', 'okey siappppp', '1', '08:00:00', '2021-10-18', '2021-10-18 08:31:35', 0),
(79, '1', '0823', 'okey siappppp', '1', '08:00:00', '2021-10-18', '2021-10-18 08:35:11', 0),
(81, '1', '08234', 'okey siappppp', '1', '08:00:00', '2021-10-18', '2021-10-18 08:41:10', 0),
(85, '1', '567', 'cc', '1', '08:00:00', '2021-10-18', '2021-10-18 08:50:00', 0),
(86, '1', '2', 'cc', '1', '08:00:00', '2021-10-18', '2021-10-18 08:50:10', 0),
(87, '1', '2678', 'cc', '1', '08:00:00', '2021-10-18', '2021-10-18 08:51:04', 0),
(89, '1', '23', 'cc', '1', '08:00:00', '2021-10-18', '2021-10-18 08:51:23', 0),
(90, '1', '4644', 'cc', '1', '08:00:00', '2021-10-18', '2021-10-18 08:51:28', 0),
(91, '1', '4545', 'ggg', '1', '08:00:00', '2021-10-18', '2021-10-18 11:39:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session_aduan`
--

CREATE TABLE `session_aduan` (
  `id` int(11) NOT NULL,
  `sender_number` varchar(50) NOT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `hits` int(11) NOT NULL DEFAULT 1,
  `nama` varchar(150) DEFAULT NULL,
  `jenis_usaha` varchar(150) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `outlet` varchar(250) DEFAULT NULL,
  `aduan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_cs`
--

CREATE TABLE `session_cs` (
  `id` int(11) NOT NULL,
  `sender_number` varchar(50) NOT NULL,
  `sender_name` varchar(200) DEFAULT NULL,
  `_ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `hits` int(11) NOT NULL DEFAULT 1,
  `id_cs` int(11) DEFAULT NULL,
  `intro` mediumtext DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_cs`
--

INSERT INTO `session_cs` (`id`, `sender_number`, `sender_name`, `_ctime`, `hits`, `id_cs`, `intro`, `kode`) VALUES
(63, '628129943041@c.us', 'Intaha', '2023-01-17 11:47:38', 3, 44, '???', '20230117114738DskoK'),
(64, '6285624951277@c.us', 'Patau Sitting', '2023-01-18 11:16:40', 3, 44, 'Bpk Ifan Gunawan dr Sukabumi', '20230118111640nHKU3'),
(65, '6282133047277@c.us', 'Han', '2023-01-19 09:48:33', 3, 44, 'Ok', '20230119094833yPmTQ'),
(66, '6281277735799@c.us', 'Bersyukur..', '2023-01-24 15:26:28', 3, 44, '👍🏽🙏🏽', '20230124152628kIaEs'),
(67, '628121021062@c.us', 'Eddy', '2023-02-04 06:21:04', 3, 44, 'Kalo tutup, bisa gak ambil di satpam nya?', '20230204062104wAGaR'),
(68, '6281295175495@c.us', 'Met', '2023-02-17 17:25:17', 3, 44, 'Utk kirim ke jakarta pusat', '20230217172517UEt8s'),
(69, '6285946146003@c.us', 'Siska Natalia 🌸', '2023-02-20 14:40:21', 3, 44, 'Dengan siska', '20230220144021npZ7J');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kategori`
--

CREATE TABLE `tm_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tm_kategori`
--

INSERT INTO `tm_kategori` (`id`, `nama`) VALUES
(1, 'Promosi'),
(2, 'Rutin');

-- --------------------------------------------------------

--
-- Table structure for table `tm_list_order`
--

CREATE TABLE `tm_list_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_session_order` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` double NOT NULL,
  `harga_dasar` double DEFAULT NULL,
  `entry` datetime NOT NULL,
  `hp_pelanggan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tm_list_order`
--

INSERT INTO `tm_list_order` (`id`, `id_session_order`, `id_user`, `nama_barang`, `kode_barang`, `qty`, `harga_satuan`, `harga_dasar`, `entry`, `hp_pelanggan`) VALUES
(1, '20230430222928', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-04-30 22:29:28', '6285221288210'),
(2, '20230430222928', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-04-30 22:29:29', '6285221288210'),
(3, '20230430224259', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-04-30 22:42:59', '6285221288210'),
(4, '20230430224259', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-04-30 22:43:01', '6285221288210'),
(5, '20230430232010', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-04-30 23:20:10', '6285221288210'),
(6, '20230430232010', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-04-30 23:20:12', '6285221288210'),
(7, '20230430232010', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-04-30 23:20:13', '6285221288210'),
(8, '20230430224259', '6285794151322', 'Coffee capucino', '4', 2, 15000, NULL, '2023-04-30 23:21:50', '6285221288210'),
(9, '20230501062957', '6285794151322', 'Nasi goreng kampung', '1', 3, 25000, NULL, '2023-05-01 06:29:57', '6285221288210'),
(19, '20230502075414', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-02 07:54:14', '6285172476577'),
(11, '20230501062957', '6285794151322', 'Bajigur', '10', 2, 10000, NULL, '2023-05-01 06:31:52', '6285221288210'),
(12, '20230501062957', '6285794151322', 'Pecel lele', '6', 3, 17000, NULL, '2023-05-01 06:32:00', '6285221288210'),
(13, '20230501074551', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-01 07:45:51', '6285221288210'),
(14, '20230501074551', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-01 07:45:53', '6285221288210'),
(15, '20230501193426', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-01 19:34:26', '6285221288210'),
(16, '20230501193426', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-01 19:34:31', '6285221288210'),
(17, '20230501193426', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-01 19:34:37', '6285221288210'),
(18, '20230501193635', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-01 19:36:35', '6285221288210'),
(20, '20230502075414', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-02 07:54:33', '6285172476577'),
(21, '20230502104410', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-02 10:44:10', '6285221288210'),
(22, '20230502104410', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-02 10:44:13', '6285221288210'),
(23, '20230503094815', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-03 09:48:15', '6285221288210'),
(24, '20230503094815', '6285794151322', 'Bajigur', '10', 1, 10000, NULL, '2023-05-03 09:49:07', '6285221288210'),
(25, '20230503112026', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-03 11:20:26', '6285221288210'),
(26, '20230503133432', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-03 13:34:32', '6285717946962'),
(27, '20230503133707', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-03 13:37:07', '6285717946962'),
(28, '20230503133707', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-03 13:37:11', '6285717946962'),
(29, '20230503153231', '6285794151322', 'Nasi goreng spesial', '2', 4, 25000, NULL, '2023-05-03 15:32:31', '6285739783837'),
(30, '20230503153231', '6285794151322', 'Pecel kuya', '7', 10, 17000, NULL, '2023-05-03 15:32:39', '6285739783837'),
(35, '20230504060314', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-04 06:03:15', '6285221288210'),
(34, '20230504060314', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-04 06:03:14', '6285221288210'),
(36, '20230504060314', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-04 06:03:17', '6285221288210'),
(37, '20230504060621', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-04 06:06:21', '6285221288210'),
(38, '20230504060621', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-04 06:06:22', '6285221288210'),
(39, '20230504060621', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-04 06:06:24', '6285221288210'),
(41, '20230504104125', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-04 10:41:25', '6285739783837'),
(42, '20230504232346', '6285794151894', 'Sate ayam', '12', 4, 2000, NULL, '2023-05-04 23:23:46', '6285221288210'),
(43, '20230504232957', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-04 23:29:57', '6285794151894'),
(44, '20230504232957', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-04 23:30:30', '6285794151894'),
(48, '20230505081402', '6285794151322', 'Nasi goreng kampung', '1', 3, 25000, NULL, '2023-05-05 08:14:02', '6285739783837'),
(47, '20230505054352', '6285794151894', 'Sate ayam', '12', 2, 2000, NULL, '2023-05-05 05:43:52', '6285221288210'),
(51, '20230505081402', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-05 08:14:36', '6285739783837'),
(50, '20230505081402', '6285794151322', 'Bajigur', '10', 3, 10000, NULL, '2023-05-05 08:14:17', '6285739783837'),
(52, '20230505083037', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-05 08:30:37', '6285739783837'),
(53, '20230505092548', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-05 09:25:48', '6285739783837'),
(54, '20230505093305', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-05 09:33:05', '6285739783837'),
(55, '20230505093305', '6285794151322', 'Pecel kuya', '7', 1, 17000, NULL, '2023-05-05 09:33:08', '6285739783837'),
(56, '20230505113402', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-05 11:34:02', '6285221288210'),
(57, '20230505155546', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-05 15:55:46', '6285221288210'),
(58, '20230505155546', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-05 15:55:51', '6285221288210'),
(59, '20230505202119', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-05 20:21:19', '6285271939490'),
(60, '20230505202119', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-05 20:21:23', '6285271939490'),
(61, '20230505203046', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-05 20:30:46', '6285221288210'),
(62, '20230505203046', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-05 20:30:47', '6285221288210'),
(63, '20230505203046', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-05 20:30:48', '6285221288210'),
(64, '20230505203046', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-05 20:30:53', '6285221288210'),
(65, '20230506063513', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-06 06:35:13', '6285221288210'),
(66, '20230506063513', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-06 06:35:15', '6285221288210'),
(67, '20230506063513', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-06 06:35:18', '6285221288210'),
(68, '20230506074259', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-06 07:42:59', '6289602402435'),
(69, '20230506074259', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-06 07:43:19', '6289602402435'),
(70, '20230506074259', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-06 07:43:36', '6289602402435'),
(71, '20230508124356', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-08 12:43:56', '6285221288210'),
(72, '20230508124356', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-08 12:44:01', '6285221288210'),
(73, '20230508124356', '6285794151322', 'Ice red velvet', '13', 1, 25000, NULL, '2023-05-08 12:44:08', '6285221288210'),
(74, '20230508124356', '6285794151322', 'Avocado ice coffee', '10', 1, 10000, NULL, '2023-05-08 12:44:10', '6285221288210'),
(75, '20230509070119', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-09 07:01:19', '6285221288210'),
(76, '20230509070119', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-09 07:01:22', '6285221288210'),
(77, '20230509170029', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-09 17:00:29', '6285271939490'),
(78, '20230509170029', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-09 17:00:32', '6285271939490'),
(79, '20230509170029', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-09 17:00:35', '6285271939490'),
(80, '20230509170036', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-09 17:00:36', '6285271939490'),
(81, '20230509170036', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-09 17:00:39', '6285271939490'),
(83, '20230509213044', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-09 21:30:44', '6285221288210'),
(84, '20230509213044', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-09 21:30:46', '6285221288210'),
(85, '20230509213044', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-09 21:30:48', '6285221288210'),
(86, '20230509213044', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-09 21:30:49', '6285221288210'),
(87, '20230513182142', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-13 18:21:42', '6285221288210'),
(88, '20230513182142', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-13 18:21:44', '6285221288210'),
(89, '20230515211949', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-15 21:19:49', '6285221288210'),
(90, '20230518063155', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-18 06:31:55', '6285221288210'),
(91, '20230518063155', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-18 06:31:56', '6285221288210'),
(92, '20230518063155', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-18 06:31:57', '6285221288210'),
(93, '20230525064324', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-25 06:43:24', '6285221288210'),
(94, '20230525064324', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-25 06:43:25', '6285221288210'),
(95, '20230525155414', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-25 15:54:14', '6285221288210'),
(96, '20230525155414', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-25 15:54:16', '6285221288210'),
(97, '20230525155414', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-25 15:54:19', '6285221288210'),
(98, '20230525155414', '6285794151322', 'Kopi caramel oreo', '5', 1, 25000, NULL, '2023-05-25 15:55:53', '6285221288210'),
(99, '20230525155414', '6285794151322', 'Nasi ayam penyet', '3', 3, 35000, NULL, '2023-05-25 15:56:04', '6285221288210'),
(100, '20230526064749', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-26 06:47:49', '6285221288210'),
(101, '20230526064749', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-26 06:47:51', '6285221288210'),
(102, '20230526064749', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-26 06:47:55', '6285221288210'),
(103, '20230527113427', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-27 11:34:27', '6285221288210'),
(104, '20230527113427', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-27 11:34:32', '6285221288210'),
(105, '20230527113427', '6285794151322', 'Ice red velvet', '13', 1, 25000, NULL, '2023-05-27 11:34:34', '6285221288210'),
(108, '20230527114321', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-27 11:43:50', '6285221288210'),
(109, '20230527114321', '6285794151322', 'Stick sausages', '15', 2, 25000, NULL, '2023-05-27 11:43:51', '6285221288210'),
(110, '20230527114321', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-27 11:43:53', '6285221288210'),
(111, '20230527114321', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-27 11:54:50', '6285221288210'),
(112, '20230527121637', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-27 12:16:37', '6285221288210'),
(113, '20230527121637', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-27 12:16:39', '6285221288210'),
(114, '20230527122033', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-27 12:20:33', '6285221288210'),
(115, '20230527124636', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-27 12:46:36', '6281224886218'),
(116, '20230527184344', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-27 18:43:44', '6285221288210'),
(117, '20230527184344', '6285794151322', 'Kopi caramel oreo', '5', 1, 25000, NULL, '2023-05-27 18:43:47', '6285221288210'),
(118, '20230527184344', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-27 20:13:51', '6285221288210'),
(119, '20230528015301', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-28 01:53:01', '6285221288210'),
(120, '20230528090102', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-28 09:01:02', '6285221288210'),
(121, '20230528090102', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-28 09:01:03', '6285221288210'),
(123, '20230528103735', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 1, 20000, NULL, '2023-05-28 10:37:35', '6285221288210'),
(124, '20230528105858', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 10:58:58', '6285221288210'),
(125, '20230528110130', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 1, 20000, NULL, '2023-05-28 11:01:30', '6285221288210'),
(126, '20230528110130', '6285794151894', 'Mie goreng (telur/ayam suwir) + es teh manis', '39', 1, 20000, NULL, '2023-05-28 11:01:33', '6285221288210'),
(127, '20230528110130', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 11:01:35', '6285221288210'),
(128, '20230528110150', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-28 11:01:50', '6285221288210'),
(129, '20230528110150', '6285794151322', 'Rice bowl chicken teriyaki', '7', 2, 17000, NULL, '2023-05-28 11:01:51', '6285221288210'),
(130, '20230528110226', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-28 11:02:26', '6285221288210'),
(131, '20230528110304', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 11:03:04', '6285221288210'),
(132, '20230528110710', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 11:07:10', '6285221288210'),
(133, '20230528110710', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 1, 20000, NULL, '2023-05-28 11:07:11', '6285221288210'),
(134, '20230528110833', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 11:08:33', '6285221288210'),
(135, '20230528110833', '6285794151894', 'Mie goreng (telur/ayam suwir) + es teh manis', '39', 1, 20000, NULL, '2023-05-28 11:08:37', '6285221288210'),
(136, '20230528110833', '6285794151894', 'Stick shirloin', '33', 1, 45000, NULL, '2023-05-28 11:08:40', '6285221288210'),
(137, '20230528110833', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 11:08:49', '6285221288210'),
(138, '20230528115549', '6285794151894', 'Kopi tubruk', '43', 3, 15000, NULL, '2023-05-28 11:55:49', '6285221288210'),
(139, '20230528115549', '6285794151894', 'Vietnam drip', '44', 2, 18000, NULL, '2023-05-28 11:55:55', '6285221288210'),
(140, '20230528115549', '6285794151894', 'Capucino', '55', 1, 20000, NULL, '2023-05-28 11:56:06', '6285221288210'),
(141, '20230528115549', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 11:56:18', '6285221288210'),
(142, '20230528115549', '6285794151894', 'Sosis, Kentang + Lemon tea', '20', 1, 25000, NULL, '2023-05-28 11:56:29', '6285221288210'),
(143, '20230528115549', '6285794151894', 'Pempek palembang', '26', 1, 25000, NULL, '2023-05-28 11:56:34', '6285221288210'),
(144, '20230528115549', '6285794151894', 'Rice chicken katsu sambal matah', '29', 1, 25000, NULL, '2023-05-28 11:56:35', '6285221288210'),
(145, '20230528115549', '6285794151894', 'v60', '45', 1, 23000, NULL, '2023-05-28 11:57:31', '6285221288210'),
(171, '20230528132125', '6285794151894', 'Sosis Bakar', '21', 1, 15000, NULL, '2023-05-28 13:21:25', '6285221288210'),
(172, '20230528132125', '6285794151894', 'French fries', '22', 1, 15000, NULL, '2023-05-28 13:21:27', '6285221288210'),
(167, '20230528131803', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-28 13:18:03', '6282113978123'),
(168, '20230528131803', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-28 13:18:13', '6282113978123'),
(169, '20230528131803', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-28 13:18:20', '6282113978123'),
(170, '20230528131803', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-28 13:18:28', '6282113978123'),
(179, '20230528132258', '6285794151894', 'Ayam penyet + nasi', '36', 1, 27000, NULL, '2023-05-28 13:23:08', '6285221288210'),
(173, '20230528132125', '6285794151894', 'Otak-otak singapura', '23', 1, 15000, NULL, '2023-05-28 13:21:29', '6285221288210'),
(174, '20230528132135', '6285794151894', 'Spaghetti bolognese', '37', 1, 20000, NULL, '2023-05-28 13:21:35', '6285221288210'),
(175, '20230528132135', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 13:21:40', '6285221288210'),
(176, '20230528125901', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 13:22:04', '6285221288210'),
(178, '20230528132258', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 1, 20000, NULL, '2023-05-28 13:23:05', '6285221288210'),
(180, '20230528132258', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 13:23:24', '6285221288210'),
(181, '20230528132258', '6285794151894', 'Sosis, Kentang + Lemon tea', '20', 1, 25000, NULL, '2023-05-28 13:23:28', '6285221288210'),
(182, '20230528132258', '6285794151894', 'Sosis Bakar', '21', 1, 15000, NULL, '2023-05-28 13:23:31', '6285221288210'),
(183, '20230528132258', '6285794151894', 'French fries', '22', 1, 15000, NULL, '2023-05-28 13:23:34', '6285221288210'),
(184, '20230528132258', '6285794151894', 'Bakso bakar + Otak otak bakar', '24', 1, 15000, NULL, '2023-05-28 13:23:37', '6285221288210'),
(185, '20230528132258', '6285794151894', 'Posaget', '27', 1, 30000, NULL, '2023-05-28 13:23:42', '6285221288210'),
(186, '20230528132258', '6285794151894', 'Sate taichan + nasi', '28', 1, 25000, NULL, '2023-05-28 13:23:44', '6285221288210'),
(189, '20230528133137', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-28 13:31:37', '6285221288210'),
(190, '20230528133137', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-28 13:31:59', '6285221288210'),
(191, '20230528133207', '6285794151322', 'Coffee capucino', '4', 2, 15000, NULL, '2023-05-28 13:32:07', '6285221288210'),
(193, '20230528133207', '6285794151322', 'Avocado ice coffee', '10', 1, 10000, NULL, '2023-05-28 13:32:32', '6285221288210'),
(194, '20230528133207', '6285794151322', 'Kopi caramel oreo', '5', 1, 25000, NULL, '2023-05-28 13:32:35', '6285221288210'),
(195, '20230528133305', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 13:33:05', '6285221288210'),
(196, '20230528133305', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 13:33:07', '6285221288210'),
(197, '20230528133305', '6285794151894', 'French fries', '22', 1, 15000, NULL, '2023-05-28 13:33:12', '6285221288210'),
(198, '20230528133305', '6285794151894', 'Bakso bakar + Otak otak bakar', '24', 1, 15000, NULL, '2023-05-28 13:33:15', '6285221288210'),
(199, '20230528133305', '6285794151894', 'Kebab full beef', '25', 1, 25000, NULL, '2023-05-28 13:33:18', '6285221288210'),
(200, '20230528133305', '6285794151894', 'Rice chicken katsu sambal matah', '29', 1, 25000, NULL, '2023-05-28 13:33:34', '6285221288210'),
(201, '20230528133305', '6285794151894', 'Rice beef black paper sauce', '32', 1, 45000, NULL, '2023-05-28 13:33:37', '6285221288210'),
(202, '20230528110710', '6285794151894', 'Kebab full beef', '25', 1, 25000, NULL, '2023-05-28 13:34:50', '6285221288210'),
(203, '20230528110304', '6285794151894', 'Americano', '54', 1, 18000, NULL, '2023-05-28 13:35:06', '6285221288210'),
(204, '20230528133534', '6285794151894', 'Bakso bakar + Otak otak bakar', '24', 1, 15000, NULL, '2023-05-28 13:35:34', '6285221288210'),
(205, '20230528133534', '6285794151894', 'Kebab full beef', '25', 1, 25000, NULL, '2023-05-28 13:35:37', '6285221288210'),
(206, '20230528133534', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 13:35:47', '6285221288210'),
(207, '20230528134357', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 13:43:57', '6285221288210'),
(208, '20230528134357', '6285794151894', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2023-05-28 13:44:00', '6285221288210'),
(209, '20230528134357', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 2, 20000, NULL, '2023-05-28 13:44:09', '6285221288210'),
(210, '20230528134357', '6285794151894', 'Spaghetti carbonara', '38', 1, 20000, NULL, '2023-05-28 13:44:59', '6285221288210'),
(218, '20230528134606', '6285794151894', 'Ayam bakar + nasi', '34', 1, 27000, NULL, '2023-05-28 13:47:03', '6285221288210'),
(212, '20230528134606', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 13:46:14', '6285221288210'),
(219, '20230528134606', '6285794151894', 'Stick shirloin', '33', 1, 45000, NULL, '2023-05-28 13:47:05', '6285221288210'),
(222, '20230528134800', '6285794151894', 'Thai tea', '42', 1, 17000, NULL, '2023-05-28 13:48:00', '6285221288210'),
(223, '20230528134800', '6285794151894', 'Kopi tubruk', '43', 1, 15000, NULL, '2023-05-28 13:48:02', '6285221288210'),
(226, '20230528134800', '6285794151894', 'Matcha', '61', 1, 20000, NULL, '2023-05-28 13:48:34', '6285221288210'),
(225, '20230528134800', '6285794151894', 'v60', '45', 10, 23000, NULL, '2023-05-28 13:48:05', '6285221288210'),
(227, '20230528134800', '6285794151894', 'Chocolatte', '60', 1, 20000, NULL, '2023-05-28 13:48:38', '6285221288210'),
(228, '20230528134800', '6285794151894', 'Lychee tea', '41', 1, 15000, NULL, '2023-05-28 13:48:42', '6285221288210'),
(229, '20230528134850', '6285794151894', 'Bakpau mini + kopi hitam / sweet tea', '17', 2, 20000, NULL, '2023-05-28 13:48:50', '6285221288210'),
(233, '20230528134850', '6285794151894', 'Mie rebus nuansa (telur/bakso) + es teh manis', '40', 1, 20000, NULL, '2023-05-28 13:49:13', '6285221288210'),
(231, '20230528134850', '6285794151894', 'Nasi goreng katsu nuansa cinta', '30', 10, 25000, NULL, '2023-05-28 13:48:53', '6285221288210'),
(235, '20230528134850', '6285794151894', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2023-05-28 13:49:25', '6285221288210'),
(236, '20230528134850', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 13:49:26', '6285221288210'),
(237, '20230528134850', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 13:49:29', '6285221288210'),
(238, '20230528134850', '6285794151894', 'Stick shirloin', '33', 1, 45000, NULL, '2023-05-28 13:49:33', '6285221288210'),
(243, '20230528142458', '6285794151894', 'Sosis Bakar', '21', 1, 15000, NULL, '2023-05-28 14:24:58', '6285221288210'),
(240, '20230528134850', '6285794151894', 'Ayam geprek + nasi', '35', 1, 25000, NULL, '2023-05-28 13:49:36', '6285221288210'),
(244, '20230528142458', '6285794151894', 'French fries', '22', 1, 15000, NULL, '2023-05-28 14:25:01', '6285221288210'),
(245, '20230528142458', '6285794151894', 'Bakso bakar + Otak otak bakar', '24', 1, 15000, NULL, '2023-05-28 14:25:04', '6285221288210'),
(247, '20230528142458', '6285794151894', 'Spaghetti bolognese', '37', 1, 20000, NULL, '2023-05-28 14:25:28', '6285221288210'),
(248, '20230528143324', '6285794151894', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 14:33:24', '6285221288210'),
(249, '20230528143324', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 14:33:25', '6285221288210'),
(250, '20230528143324', '6285794151894', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2023-05-28 14:33:26', '6285221288210'),
(251, '20230528161724', '6285794151894', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2023-05-28 16:17:24', '6281299245525'),
(252, '20230528161724', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 16:17:28', '6281299245525'),
(253, '20230528161724', '6285794151894', 'Sosis Bakar', '21', 1, 15000, NULL, '2023-05-28 16:17:32', '6281299245525'),
(254, '20230528192557', '6285794151894', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2023-05-28 19:25:57', '6285221288210'),
(255, '20230528192557', '6285794151894', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-28 19:25:58', '6285221288210'),
(256, '20230528194625', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 19:46:25', '6285221288210'),
(257, '20230528194959', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 19:49:59', '6285221288210'),
(258, '20230528195003', '6283165005718', 'Japanese', '46', 1, 23000, NULL, '2023-05-28 19:50:03', '6285221288210'),
(259, '20230528195003', '6283165005718', 'Chocolatte', '60', 1, 20000, NULL, '2023-05-28 19:50:07', '6285221288210'),
(260, '20230528195303', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-28 19:53:03', '6285221288210'),
(261, '20230528195303', '6283165005718', 'Posaget', '27', 1, 30000, NULL, '2023-05-28 19:53:05', '6285221288210'),
(263, '20230528200528', '6283165005718', 'Posaget', '27', 2, 30000, NULL, '2023-05-28 20:05:28', '6281224907400'),
(266, '20230529175410', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-29 17:54:10', '6285221288210'),
(267, '20230529175410', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-29 17:54:12', '6285221288210'),
(268, '20230529204033', '6285794151322', 'Nasi lengko', '8', 1, 2000, NULL, '2023-05-29 20:40:33', '6285221288210'),
(269, '20230529204050', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-29 20:40:50', '6285221288210'),
(270, '20230529204050', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-29 20:40:52', '6285221288210'),
(271, '20230529204050', '6285794151322', 'Rice bowl chicken teriyaki', '7', 2, 17000, NULL, '2023-05-29 20:40:54', '6285221288210'),
(272, '20230529204050', '6285794151322', 'Nasi lengko', '8', 1, 2000, NULL, '2023-05-29 20:40:55', '6285221288210'),
(273, '20230529204050', '6285794151322', 'Avocado ice coffee', '10', 1, 10000, NULL, '2023-05-29 20:40:57', '6285221288210'),
(274, '20230529204050', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-29 20:41:01', '6285221288210'),
(275, '20230529204050', '6285794151322', 'Ice red velvet', '13', 1, 25000, NULL, '2023-05-29 20:41:03', '6285221288210'),
(276, '20230530060139', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-30 06:01:39', '6285221288210'),
(277, '20230530060139', '6285794151322', 'Nasi lengko', '8', 1, 2000, NULL, '2023-05-30 06:01:43', '6285221288210'),
(278, '20230530060139', '6285794151322', 'Rice bowl chicken teriyaki', '7', 3, 17000, NULL, '2023-05-30 06:01:48', '6285221288210'),
(280, '20230530060347', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-30 06:03:47', '6285221288210'),
(281, '20230530060347', '6285794151322', 'Ice red velvet', '13', 1, 25000, NULL, '2023-05-30 06:03:50', '6285221288210'),
(282, '20230530060347', '6285794151322', 'Avocado ice coffee', '10', 1, 10000, NULL, '2023-05-30 06:03:52', '6285221288210'),
(283, '20230530060347', '6285794151322', 'Nasi lengko', '8', 1, 2000, NULL, '2023-05-30 06:03:54', '6285221288210'),
(284, '20230530060347', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-30 06:04:00', '6285221288210'),
(285, '20230530060347', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-30 06:04:04', '6285221288210'),
(286, '20230530084403', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-30 08:44:03', '6285221288210'),
(287, '20230530084403', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-30 08:44:06', '6285221288210'),
(288, '20230530084403', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-05-30 08:44:11', '6285221288210'),
(289, '20230530084403', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-30 08:44:14', '6285221288210'),
(290, '20230530084421', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2023-05-30 08:44:21', '6285221288210'),
(291, '20230530084421', '6285794151322', 'Avocado ice coffee', '10', 1, 10000, NULL, '2023-05-30 08:44:23', '6285221288210'),
(292, '20230530084421', '6285794151322', 'Ice red velvet', '13', 3, 25000, NULL, '2023-05-30 08:44:44', '6285221288210'),
(293, '20230530111717', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-30 11:17:17', '6285221288210'),
(294, '20230530111717', '6285794151322', 'Stick sausages', '15', 1, 25000, NULL, '2023-05-30 11:17:20', '6285221288210'),
(299, '20230530165630', '6285794151322', 'Nasi goreng kampung', '1', 2, 25000, NULL, '2023-05-30 16:56:30', '6285221288210'),
(300, '20230530165630', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-05-30 16:57:17', '6285221288210'),
(301, '20230530170046', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-05-30 17:00:46', '6285221288210'),
(302, '20230530170046', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2023-05-30 17:00:48', '6285221288210'),
(303, '20230530204228', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2023-05-30 20:42:28', '6285221288210'),
(304, '20230530204228', '6283165005718', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2023-05-30 20:42:30', '6285221288210'),
(316, '20230604143730', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-06-04 14:37:30', '6285221288210'),
(317, '20230605151213', '6285163082099', 'Ayam geprek', '63', 1, 18000, NULL, '2023-06-05 15:12:13', '6285221288210'),
(318, '20230605153207', '6285163082099', 'Ayam geprek', '63', 2, 18000, NULL, '2023-06-05 15:32:07', '6285157559328'),
(319, '20230605162701', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2023-06-05 16:27:01', '6285221288210'),
(320, '20230605162701', '6285794151322', 'Rice bowl chicken teriyaki', '7', 1, 17000, NULL, '2023-06-05 16:27:02', '6285221288210'),
(321, '20230605162701', '6285794151322', 'Chicken katsu', '14', 1, 42000, NULL, '2023-06-05 16:28:04', '6285221288210'),
(322, '20240920220753', '6285794151322', 'Nasi goreng kampung', '1', 1, 25000, NULL, '2024-09-20 22:07:53', '085221288210'),
(323, '20240920220753', '6285794151322', 'Nasi goreng spesial', '2', 1, 25000, NULL, '2024-09-20 22:07:56', '085221288210'),
(324, '20240920220804', '6285794151322', 'Coffee capucino', '4', 1, 15000, NULL, '2024-09-20 22:08:04', '085221288210'),
(325, '20240920220804', '6285794151322', 'Kopi caramel oreo', '5', 2, 25000, NULL, '2024-09-20 22:08:05', '085221288210'),
(326, '20240920221104', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2024-09-20 22:11:04', '085221288210'),
(327, '20240920221104', '6283165005718', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2024-09-20 22:11:09', '085221288210'),
(328, '20240920221104', '6283165005718', 'Pempek palembang', '26', 1, 25000, NULL, '2024-09-20 22:11:13', '085221288210'),
(329, '20240920221104', '6283165005718', 'Ayam bakar + nasi', '34', 1, 27000, NULL, '2024-09-20 22:11:17', '085221288210'),
(330, '20240920221125', '6283165005718', 'Lychee tea', '41', 1, 15000, NULL, '2024-09-20 22:11:25', '085221288210'),
(331, '20240920221125', '6283165005718', 'Dimsum + Lemon tea', '18', 1, 25000, NULL, '2024-09-20 22:11:33', '085221288210'),
(332, '20240920221224', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2024-09-20 22:12:24', '085221288210'),
(333, '20240920221224', '6283165005718', 'Bakpau mini + kopi hitam / sweet tea', '17', 1, 20000, NULL, '2024-09-20 22:12:26', '085221288210'),
(334, '20240920221224', '6283165005718', 'Pisang goreng crispy +Kopi hitam/sweet tea', '19', 1, 20000, NULL, '2024-09-20 22:12:31', '085221288210'),
(335, '20240920222653', '6283165005718', 'Dimsum + Lemon tea', '18', 3, 25000, NULL, '2024-09-20 22:26:53', '085221288210'),
(336, '20240920222653', '6283165005718', 'Kebab full beef', '25', 2, 25000, NULL, '2024-09-20 22:27:02', '085221288210'),
(337, '20240920222944', '6283165005718', 'Sosis Bakar', '21', 1, 15000, NULL, '2024-09-20 22:29:44', '085221288210'),
(338, '20240920222944', '6283165005718', 'Otak-otak singapura', '23', 1, 15000, NULL, '2024-09-20 22:29:47', '085221288210'),
(339, '20240920222944', '6283165005718', 'Rice chicken katsu sambal matah', '29', 1, 25000, NULL, '2024-09-20 22:29:52', '085221288210'),
(340, '20240920222944', '6283165005718', 'Red velvet', '58', 1, 20000, NULL, '2024-09-20 22:31:40', '085221288210'),
(341, '20240921090236', '6283165005718', 'Cireng + Lemon tea', '16', 1, 20000, NULL, '2024-09-21 09:02:36', '085221288210'),
(342, '20240921090236', '6283165005718', 'Ayam bakar + nasi', '34', 1, 27000, NULL, '2024-09-21 09:03:02', '085221288210'),
(343, '20240921090236', '6283165005718', 'Ayam geprek + nasi', '35', 1, 25000, NULL, '2024-09-21 09:03:04', '085221288210'),
(344, '20240921090236', '6283165005718', 'Posaget', '27', 2, 30000, NULL, '2024-09-21 09:03:10', '085221288210'),
(349, '20240921090644', '6283165005718', 'Posaget', '27', 1, 30000, NULL, '2024-09-21 09:06:44', '085221288210'),
(346, '20240921090236', '6283165005718', 'Otak-otak singapura', '23', 1, 15000, NULL, '2024-09-21 09:03:21', '085221288210'),
(350, '20240921090644', '6283165005718', 'Spaghetti bolognese', '37', 1, 20000, NULL, '2024-09-21 09:07:05', '085221288210'),
(351, '20240921090644', '6283165005718', 'Red velvet', '58', 2, 20000, NULL, '2024-09-21 09:07:10', '085221288210'),
(352, '20240921090644', '6283165005718', 'Dimsum + Lemon tea', '18', 2, 25000, NULL, '2024-09-21 09:07:27', '085221288210'),
(353, '20240921090826', '6283165005718', 'Kopi susu gula aren', '53', 11, 20000, NULL, '2024-09-21 09:08:26', '085221288210'),
(354, '20240921090826', '6283165005718', 'Mojito min boba', '52', 1, 20000, NULL, '2024-09-21 09:08:41', '085221288210'),
(355, '20240921090826', '6283165005718', 'Tiramisu boba', '50', 3, 20000, NULL, '2024-09-21 09:08:42', '085221288210'),
(356, '20240921090826', '6283165005718', 'Chocolate boba', '49', 1, 20000, NULL, '2024-09-21 09:08:43', '085221288210'),
(357, '20240921090826', '6283165005718', 'Vanilla boba', '48', 1, 20000, NULL, '2024-09-21 09:08:45', '085221288210'),
(358, '20240921090826', '6283165005718', 'Lemon tea', '62', 1, 17000, NULL, '2024-09-21 09:08:47', '085221288210'),
(359, '20240921090826', '6283165005718', 'Thai tea', '42', 1, 17000, NULL, '2024-09-21 09:08:48', '085221288210'),
(360, '20240921090826', '6283165005718', 'Kopi tubruk', '43', 1, 15000, NULL, '2024-09-21 09:08:48', '085221288210'),
(361, '20240921090826', '6283165005718', 'Vietnam drip', '44', 24, 18000, NULL, '2024-09-21 09:08:49', '085221288210'),
(362, '20240921090826', '6283165005718', 'v60', '45', 1, 23000, NULL, '2024-09-21 09:08:50', '085221288210'),
(363, '20240923082330', '6283165005718', 'Ayam penyet + nasi', '36', 1, 27000, NULL, '2024-09-23 08:23:30', '085221288210'),
(364, '20240923082330', '6283165005718', 'Ayam geprek + nasi', '35', 2, 25000, NULL, '2024-09-23 08:23:32', '085221288210');

-- --------------------------------------------------------

--
-- Table structure for table `tm_order`
--

CREATE TABLE `tm_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` varchar(100) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `harga_final` double DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `cashback` double DEFAULT NULL,
  `tunai` double DEFAULT NULL,
  `laba` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `entry` datetime DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `hp_pelanggan` varchar(20) NOT NULL,
  `catatan_pesanan` text DEFAULT NULL,
  `sts` int(11) NOT NULL DEFAULT 0 COMMENT '1=selesai',
  `no_meja` varchar(10) DEFAULT NULL,
  `del` int(11) DEFAULT 0 COMMENT '1=terhapus',
  `deliv` datetime DEFAULT NULL,
  `fix_order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `tanda` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tm_order`
--

INSERT INTO `tm_order` (`id`, `id_order`, `id_user`, `harga_final`, `diskon`, `cashback`, `tunai`, `laba`, `qty`, `entry`, `nama_pelanggan`, `hp_pelanggan`, `catatan_pesanan`, `sts`, `no_meja`, `del`, `deliv`, `fix_order_time`, `tanda`) VALUES
(1, '20230430222928', '6285794151322', 42000, NULL, NULL, NULL, NULL, 2, '2023-04-30 22:29:28', 'Cepicahyana.com', '6285221288210', '', 3, '12', 0, '2023-04-30 23:21:13', '2023-04-30 22:29:34', 0),
(2, '20230430224259', '6285794151322', 97000, NULL, NULL, NULL, NULL, 5, '2023-04-30 22:42:59', 'Cepicahyana.com', '6285221288210', 'Kuya betina', 3, '1', 0, '2023-04-30 23:22:39', '2023-04-30 22:43:24', 1),
(3, '20230430232010', '6285794151322', 67000, NULL, NULL, NULL, NULL, 3, '2023-04-30 23:20:10', 'Cepi cahyana', '6285221288210', 'Pedes', 3, '12', 0, '2023-04-30 23:21:25', '2023-04-30 23:20:24', 0),
(4, '20230501062957', '6285794151322', 146000, NULL, NULL, NULL, NULL, 8, '2023-05-01 06:29:57', 'Cepicahyana', '6285221288210', '', 2, '1', 0, '2023-05-01 19:38:17', '2023-05-01 06:30:03', 0),
(5, '20230501074551', '6285794151322', 42000, NULL, NULL, NULL, NULL, 2, '2023-05-01 07:45:51', 'Cepi', '6285221288210', 'Jangan pake pedes', 2, '1', 0, '2023-05-01 19:38:18', '2023-05-01 07:46:21', 1),
(6, '20230501193426', '6285794151322', 57000, NULL, NULL, NULL, NULL, 3, '2023-05-01 19:34:26', 'Cepicahyana', '6285221288210', 'Tidak pedas', 2, '1', 0, '2023-05-01 19:38:19', '2023-05-01 19:34:51', 0),
(7, '20230501193635', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-01 19:36:35', 'Cepicahyana.com', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-01 19:36:35', 0),
(8, '20230502075414', '6285794151322', 42000, NULL, NULL, NULL, NULL, 2, '2023-05-02 07:54:14', 'Tasmin', '6285172476577', 'Jangan terlalu pedas', 1, '1', 0, NULL, '2023-05-02 07:55:52', 0),
(9, '20230502104410', '6285794151322', 42000, NULL, NULL, NULL, NULL, 2, '2023-05-02 10:44:10', 'Cepicahyana', '6285221288210', '', 1, '1', 0, NULL, '2023-05-02 10:44:41', 0),
(10, '20230503094815', '6285794151322', 35000, NULL, NULL, NULL, NULL, 2, '2023-05-03 09:48:15', 'Cepi cahyana', '6285221288210', '', 3, '1', 0, '2023-05-03 13:35:47', '2023-05-03 09:48:20', 0),
(11, '20230503112026', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-03 11:20:26', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-03 11:20:26', 0),
(12, '20230503133432', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-03 13:34:32', 'vinywidian', '6285717946962', 'jangan pedes', 1, '1', 0, NULL, '2023-05-03 13:34:44', 0),
(13, '20230503133707', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-03 13:37:07', 'vinywidian', '6285717946962', NULL, 0, NULL, 0, NULL, '2023-05-03 13:37:07', 0),
(14, '20230503153231', '6285794151322', 270000, NULL, NULL, NULL, NULL, 14, '2023-05-03 15:32:31', 'YOYOK', '6285739783837', 'Pedes semua', 1, '10', 0, NULL, '2023-05-03 15:33:03', 0),
(15, '20230503221621', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-03 22:16:21', 'vinywidian', '6285717946962', NULL, 0, NULL, 0, NULL, '2023-05-03 22:16:21', 0),
(16, '20230504060314', '6285794151322', 67000, NULL, NULL, NULL, NULL, 3, '2023-05-04 06:03:14', 'Cepi cahyana', '6285221288210', '', 1, '1', 0, NULL, '2023-05-04 06:03:22', 0),
(17, '20230504060621', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-04 06:06:21', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-04 06:06:21', 0),
(18, '20230504104125', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-04 10:41:25', 'YOYOK', '6285739783837', '', 1, '1', 0, NULL, '2023-05-04 10:41:34', 0),
(20, '20230504232957', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-04 23:29:57', 'RestoBot', '6285794151894', NULL, 0, NULL, 0, NULL, '2023-05-04 23:29:57', 0),
(21, '20230505000745', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-05 00:07:45', 'vinywidian', '6285717946962', NULL, 0, NULL, 0, NULL, '2023-05-05 00:07:45', 0),
(23, '20230505081402', '6285794151322', 122000, NULL, NULL, NULL, NULL, 7, '2023-05-05 08:14:02', 'YOYOK', '6285739783837', 'Seng pedes', 3, '3', 0, '2023-05-05 20:24:45', '2023-05-05 08:15:00', 0),
(24, '20230505083037', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-05 08:30:37', 'YOYOK', '6285739783837', 'Josi', 2, '8', 0, '2023-05-05 16:06:07', '2023-05-05 08:30:48', 0),
(25, '20230505092548', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-05 09:25:48', 'YOYOK', '6285739783837', '', 2, '1', 0, '2023-05-05 16:06:08', '2023-05-05 09:25:55', 1),
(26, '20230505093305', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-05 09:33:05', 'YOYOK', '6285739783837', NULL, 0, NULL, 0, NULL, '2023-05-05 09:33:05', 0),
(27, '20230505113402', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-05 11:34:02', 'Cepi cahyana', '6285221288210', '', 2, '1', 0, '2023-05-05 16:06:10', '2023-05-05 11:34:09', 1),
(28, '20230505155546', '6285794151322', 32000, NULL, NULL, NULL, NULL, 2, '2023-05-05 15:55:46', 'Cepi', '6285221288210', 'Untuk nasi goreng jangan pake bawang putih ', 2, '2', 0, '2023-05-05 16:06:04', '2023-05-05 15:57:50', 0),
(29, '20230505202119', '6285794151322', 32000, NULL, NULL, NULL, NULL, 2, '2023-05-05 20:21:19', 'Muhammad Ali', '6285271939490', '', 1, '008', 0, NULL, '2023-05-05 20:21:32', 0),
(30, '20230505203046', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-05 20:30:46', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-05 20:30:46', 0),
(31, '20230506063513', '6285794151322', 92000, NULL, NULL, NULL, NULL, 3, '2023-05-06 06:35:13', 'Cepi cahyana', '6285221288210', '', 2, '2', 0, '2023-05-06 06:36:13', '2023-05-06 06:35:23', 0),
(32, '20230506074259', '6285794151322', 109000, NULL, NULL, NULL, NULL, 4, '2023-05-06 07:42:59', 'Dheazizah?', '6289602402435', 'Nasi goreng yang satu Minta tambahan telor ceplok yah kak. ', 2, '4', 0, '2023-05-06 07:50:03', '2023-05-06 07:44:34', 0),
(33, '20230508124356', '6285794151322', 77000, NULL, NULL, NULL, NULL, 4, '2023-05-08 12:43:56', 'Cepi cahyana', '6285221288210', 'Nasgornya jangan terlalu pedas', 3, '7', 0, '2023-05-08 20:27:49', '2023-05-08 12:44:33', 0),
(34, '20230509070119', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-09 07:01:19', 'Cepi cahyana', '6285221288210', 'Minta air teh', 2, '7', 0, '2023-05-09 07:07:33', '2023-05-09 07:02:06', 0),
(35, '20230509170029', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-09 17:00:29', 'Muhammad Ali', '6285271939490', NULL, 0, NULL, 0, NULL, '2023-05-09 17:00:29', 0),
(36, '20230509170036', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-09 17:00:36', 'Muhammad Ali', '6285271939490', NULL, 0, NULL, 0, NULL, '2023-05-09 17:00:36', 0),
(37, '20230509170307', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-09 17:03:07', '6287874831099', '6287874831099', NULL, 0, NULL, 0, NULL, '2023-05-09 17:03:07', 0),
(38, '20230509213044', '6285794151322', 117000, NULL, NULL, NULL, NULL, 4, '2023-05-09 21:30:44', 'Cepi cahyana', '6285221288210', '', 2, '7', 0, '2023-05-09 21:31:20', '2023-05-09 21:30:55', 0),
(39, '20230513182142', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-13 18:21:42', 'Cepi cahyana', '6285221288210', 'Ga ada', 3, '7', 0, '2023-05-13 18:23:23', '2023-05-13 18:22:38', 0),
(40, '20230515211949', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-15 21:19:49', 'Cepi cahyana', '6285221288210', '', 2, '6', 0, '2023-05-15 21:20:21', '2023-05-15 21:19:55', 0),
(41, '20230518063155', '6285794151322', 92000, NULL, NULL, NULL, NULL, 3, '2023-05-18 06:31:55', 'Cepi cahyana', '6285221288210', 'Pedes', 3, '1', 0, '2023-05-18 06:33:24', '2023-05-18 06:32:09', 0),
(42, '20230525064324', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-25 06:43:24', 'Cepi cahyana', '6285221288210', '', 2, '7', 0, '2023-05-25 06:43:52', '2023-05-25 06:43:30', 0),
(43, '20230525155414', '6285794151322', 222000, NULL, NULL, NULL, NULL, 7, '2023-05-25 15:54:14', 'Cepi cahyana', '6285221288210', 'Pedes', 2, '2', 0, '2023-05-25 15:56:32', '2023-05-25 15:54:32', 0),
(44, '20230526064749', '6285794151322', 92000, NULL, NULL, NULL, NULL, 3, '2023-05-26 06:47:49', 'Cepi cahyana', '6285221288210', '', 2, '3', 0, '2023-05-26 08:05:20', '2023-05-26 06:48:01', 0),
(45, '20230527113427', '6285794151322', 65000, NULL, NULL, NULL, NULL, 3, '2023-05-27 11:34:27', 'Cepi cahyana', '6285221288210', '', 3, '7', 0, '2023-05-27 12:25:56', '2023-05-27 11:34:39', 0),
(46, '20230527114321', '6285794151322', 117000, NULL, NULL, NULL, NULL, 5, '2023-05-27 11:43:21', 'Cepi cahyana', '6285221288210', '', 3, '7', 0, '2023-05-27 12:26:08', '2023-05-27 11:54:54', 0),
(47, '20230527121637', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-27 12:16:37', 'Cepi cahyana', '6285221288210', '', 3, '7', 0, '2023-05-27 12:26:13', '2023-05-27 12:16:49', 1),
(48, '20230527122033', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-27 12:20:33', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-27 12:20:33', 1),
(49, '20230527124636', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-27 12:46:36', 'akelhasanudin', '6281224886218', 'Pedas : sedeng', 1, '7', 0, NULL, '2023-05-27 12:47:15', 0),
(50, '20230527184344', '6285794151322', 92000, NULL, NULL, NULL, NULL, 3, '2023-05-27 18:43:44', 'Cepi cahyana', '6285221288210', '', 1, '7', 0, NULL, '2023-05-27 20:14:03', 1),
(51, '20230528015301', '6285794151322', 17000, NULL, NULL, NULL, NULL, 1, '2023-05-28 01:53:01', 'Cepi cahyana', '6285221288210', '', 1, '7', 0, NULL, '2023-05-28 01:53:11', 0),
(52, '20230528090102', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 09:01:02', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 09:01:02', 0),
(53, '20230528103735', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 10:37:35', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 10:37:35', 0),
(54, '20230528105858', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 10:58:58', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 10:58:58', 0),
(55, '20230528110130', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 11:01:30', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 11:01:30', 0),
(56, '20230528110150', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 11:01:50', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 11:01:50', 0),
(57, '20230528110226', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-05-28 11:02:26', 'Cepi cahyana', '6285221288210', '', 1, '7', 0, NULL, '2023-05-28 11:02:31', 0),
(58, '20230528110304', '6283165005718', 38000, NULL, NULL, NULL, NULL, 2, '2023-05-28 11:03:04', 'Cepi cahyana', '6285221288210', '', 2, '1', 0, '2023-05-28 19:56:35', '2023-05-28 11:03:20', 1),
(59, '20230528110710', '6283165005718', 65000, NULL, NULL, NULL, NULL, 3, '2023-05-28 11:07:10', 'Cepi cahyana', '6285221288210', '', 3, '8', 0, '2023-05-28 19:57:12', '2023-05-28 11:07:17', 1),
(60, '20230528110833', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 11:08:33', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 11:08:33', 0),
(61, '20230528115549', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 11:55:49', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 11:55:49', 0),
(62, '20230528123853', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 12:38:53', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 12:38:53', 0),
(63, '20230528125901', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 12:59:01', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 12:59:01', 0),
(64, '20230528131803', '6285794151322', 92000, NULL, NULL, NULL, NULL, 4, '2023-05-28 13:18:03', 'Ike', '6282113978123', 'Nasi goreng tidak pedas', 1, '02', 0, NULL, '2023-05-28 13:18:49', 0),
(65, '20230528132125', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:21:25', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:21:25', 1),
(66, '20230528132135', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:21:35', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:21:35', 0),
(67, '20230528132258', '6283165005718', 192000, NULL, NULL, NULL, NULL, 9, '2023-05-28 13:22:58', 'Cepi cahyana', '6285221288210', '', 2, '1', 0, '2023-05-28 19:56:45', '2023-05-28 13:24:26', 1),
(68, '20230528133137', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:31:37', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:31:37', 0),
(69, '20230528133207', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:32:07', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:32:07', 0),
(70, '20230528133305', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:33:05', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:33:05', 0),
(71, '20230528133534', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:35:34', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:35:34', 1),
(72, '20230528134357', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:43:57', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:43:57', 1),
(73, '20230528134606', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:46:06', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:46:06', 0),
(74, '20230528134800', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:48:00', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:48:00', 1),
(75, '20230528134850', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 13:48:50', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 13:48:50', 0),
(76, '20230528142458', '6283165005718', 65000, NULL, NULL, NULL, NULL, 4, '2023-05-28 14:24:58', 'Cepi cahyana', '6285221288210', '', 2, '7', 0, '2023-05-28 19:56:48', '2023-05-28 14:25:38', 1),
(77, '20230528143324', '6283165005718', 65000, NULL, NULL, NULL, NULL, 3, '2023-05-28 14:33:24', 'Cepi cahyana', '6285221288210', '', 2, '12', 0, '2023-05-28 19:56:50', '2023-05-28 14:33:33', 0),
(78, '20230528161724', '6283165005718', 60000, NULL, NULL, NULL, NULL, 3, '2023-05-28 16:17:24', 'Ruhyat', '6281299245525', '', 2, '8', 0, '2023-05-28 19:56:53', '2023-05-28 16:17:43', 0),
(79, '20230528192557', '6283165005718', 45000, NULL, NULL, NULL, NULL, 2, '2023-05-28 19:25:57', 'Cepi cahyana', '6285221288210', '', 1, '5', 0, NULL, '2023-05-28 19:26:09', 0),
(80, '20230528194625', '6283165005718', 20000, NULL, NULL, NULL, NULL, 1, '2023-05-28 19:46:25', 'Cepi cahyana', '6285221288210', '', 1, '7', 1, NULL, '2023-05-28 19:46:31', 0),
(81, '20230528194959', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 19:49:59', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-28 19:49:59', 0),
(82, '20230528195003', '6283165005718', 43000, NULL, NULL, NULL, NULL, 2, '2023-05-28 19:50:03', 'Cepi cahyana', '6285221288210', 'Jangan banyak es', 1, '9', 0, NULL, '2023-05-28 19:50:20', 0),
(83, '20230528195303', '6283165005718', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-28 19:53:03', 'Cepi cahyana', '6285221288210', 'Tes', 1, '9', 0, NULL, '2023-05-28 19:53:23', 0),
(84, '20230528200421', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-28 20:04:21', '13', '6285793967051', NULL, 0, NULL, 0, NULL, '2023-05-28 20:04:21', 0),
(85, '20230528200528', '6283165005718', 60000, NULL, NULL, NULL, NULL, 2, '2023-05-28 20:05:28', 'Indra Dena Putra', '6281224907400', 'Aman', 1, '07', 0, NULL, '2023-05-28 20:06:18', 0),
(86, '20230529173842', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-29 17:38:42', 'Ike', '6282113978123', NULL, 0, NULL, 0, NULL, '2023-05-29 17:38:42', 0),
(87, '20230529175410', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-29 17:54:10', 'Cepi cahyana', '6285221288210', '', 1, 'H', 0, NULL, '2023-05-29 17:54:20', 0),
(88, '20230529204033', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-29 20:40:33', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-29 20:40:33', 0),
(89, '20230529204050', '6285794151322', 161000, NULL, NULL, NULL, NULL, 9, '2023-05-29 20:40:50', 'Cepi cahyana', '6285221288210', '', 1, '7', 0, NULL, '2023-05-29 20:41:53', 0),
(90, '20230530060139', '6285794151322', 78000, NULL, NULL, NULL, NULL, 5, '2023-05-30 06:01:39', 'Cepi cahyana', '6285221288210', '', 3, '8', 0, '2023-05-30 08:49:27', '2023-05-30 06:02:48', 1),
(91, '20230530060347', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 06:03:47', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-30 06:03:47', 0),
(92, '20230530084403', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 08:44:03', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-30 08:44:03', 0),
(93, '20230530084421', '6285794151322', 100000, NULL, NULL, NULL, NULL, 5, '2023-05-30 08:44:21', 'Cepi cahyana', '6285221288210', '', 3, '7', 0, '2023-05-30 08:49:35', '2023-05-30 08:45:58', 1),
(94, '20230530111717', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 11:17:17', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-30 11:17:17', 0),
(95, '20230530150351', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 15:03:51', 'Ike', '6282113978123', NULL, 0, NULL, 0, NULL, '2023-05-30 15:03:51', 0),
(96, '20230530165630', '6285794151322', 92000, NULL, NULL, NULL, NULL, 3, '2023-05-30 16:56:30', 'Cepi cahyana', '6285221288210', '', 1, 'Tes', 0, NULL, '2023-05-30 16:58:00', 1),
(97, '20230530170046', '6285794151322', 50000, NULL, NULL, NULL, NULL, 2, '2023-05-30 17:00:46', 'Cepi cahyana', '6285221288210', '', 1, 'Wow', 0, NULL, '2023-05-30 17:00:59', 1),
(98, '20230530204228', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-30 20:42:28', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-30 20:42:28', 0),
(99, '20230531225024', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-31 22:50:24', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-05-31 22:50:24', 0),
(100, '20230601184106', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-06-01 18:41:06', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-06-01 18:41:06', 0),
(101, '20230604120602', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2023-06-04 12:06:02', 'Cepi cahyana', '6285221288210', NULL, 0, NULL, 0, NULL, '2023-06-04 12:06:02', 0),
(102, '20230604143730', '6285794151322', 25000, NULL, NULL, NULL, NULL, 1, '2023-06-04 14:37:30', 'Cepi cahyana', '6285221288210', '', 1, '1', 0, NULL, '2023-06-04 14:37:39', 0),
(103, '20230605151213', '6285163082099', 18000, NULL, NULL, NULL, NULL, 1, '2023-06-05 15:12:13', 'Cepi.c', '6285221288210', 'Jangan pedas oke', 1, '1', 1, NULL, '2023-06-05 15:12:26', 0),
(104, '20230605153207', '6285163082099', 36000, NULL, NULL, NULL, NULL, 2, '2023-06-05 15:32:07', 'PAPAHMUDA MANAGEMENT', '6285157559328', 'Lada na di pisah nya', 1, '1', 1, NULL, '2023-06-05 15:32:31', 0),
(105, '20230605162701', '6285794151322', 84000, NULL, NULL, NULL, NULL, 3, '2023-06-05 16:27:01', 'Cepi.c', '6285221288210', '', 3, '2', 0, '2023-06-05 16:28:28', '2023-06-05 16:27:26', 1),
(106, '20240920220753', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-20 22:07:53', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-20 22:07:53', 0),
(107, '20240920220804', '6285794151322', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-20 22:08:04', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-20 22:08:04', 0),
(108, '20240920221104', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-20 22:11:04', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-20 22:11:04', 0),
(109, '20240920221125', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-20 22:11:25', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-20 22:11:25', 0),
(110, '20240920221224', '6283165005718', 60000, NULL, NULL, NULL, NULL, 3, '2024-09-20 22:12:24', 'cepi', '085221288210', 'Oke siap gass', 3, '23', 0, '2024-09-20 22:15:18', '2024-09-20 22:13:27', 0),
(111, '20240920222653', '6283165005718', 125000, NULL, NULL, NULL, NULL, 5, '2024-09-20 22:26:53', 'cepi', '085221288210', 'ok', 3, '78', 0, '2024-09-20 22:35:00', '2024-09-20 22:27:22', 0),
(112, '20240920222944', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-20 22:29:44', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-20 22:29:44', 0),
(113, '20240921090236', '6283165005718', 147000, NULL, NULL, NULL, NULL, 6, '2024-09-21 09:02:36', 'cepi', '085221288210', '', 1, 'J', 0, NULL, '2024-09-21 09:05:23', 0),
(114, '20240921090644', '6283165005718', 140000, NULL, NULL, NULL, NULL, 6, '2024-09-21 09:06:44', 'cepi', '085221288210', '', 1, 'H', 0, NULL, '2024-09-21 09:07:45', 0),
(115, '20240921090826', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-21 09:08:26', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-21 09:08:26', 0),
(116, '20240923082330', '6283165005718', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-23 08:23:30', 'cepi', '085221288210', NULL, 0, NULL, 0, NULL, '2024-09-23 08:23:30', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_percakapan`
-- (See below for the actual view)
--
CREATE TABLE `v_percakapan` (
`id` int(11)
,`_ctime` datetime /* mariadb-5.3 */
,`sender_number` varchar(100)
,`sender_name` varchar(500)
,`msg` longtext
,`file` longtext
,`sts` int(11)
,`jenis_pesan` int(11)
,`inbox` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pesan`
-- (See below for the actual view)
--
CREATE TABLE `v_pesan` (
`out` varchar(3)
,`id` int(11)
,`tgl` datetime
,`sts_pesan` int(11)
,`type` int(11)
,`no_tujuan` varchar(20)
,`pesan` longtext
,`url` longtext
,`hits` int(11)
,`options` longtext
);

-- --------------------------------------------------------

--
-- Table structure for table `wil_kabupaten`
--

CREATE TABLE `wil_kabupaten` (
  `id_kab` char(4) NOT NULL,
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jml` int(11) DEFAULT 0 COMMENT 'jml pemohon'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wil_kabupaten`
--

INSERT INTO `wil_kabupaten` (`id_kab`, `id_prov`, `nama`, `id_jenis`, `jml`) VALUES
('1101', '11', 'KAB. ACEH SELATAN', 1, 0),
('1102', '11', 'KAB. ACEH TENGGARA', 1, 0),
('1103', '11', 'KAB. ACEH TIMUR', 1, 0),
('1104', '11', 'KAB. ACEH TENGAH', 1, 0),
('1105', '11', 'KAB. ACEH BARAT', 1, 0),
('1106', '11', 'KAB. ACEH BESAR', 1, 0),
('1107', '11', 'KAB. PIDIE', 1, 0),
('1108', '11', 'KAB. ACEH UTARA', 1, 0),
('1109', '11', 'KAB. SIMEULUE', 1, 0),
('1110', '11', 'KAB. ACEH SINGKIL', 1, 0),
('1111', '11', 'KAB. BIREUEN', 1, 0),
('1112', '11', 'KAB. ACEH BARAT DAYA', 1, 0),
('1113', '11', 'KAB. GAYO LUES', 1, 0),
('1114', '11', 'KAB. ACEH JAYA', 1, 0),
('1115', '11', 'KAB. NAGAN RAYA', 1, 0),
('1116', '11', 'KAB. ACEH TAMIANG', 1, 0),
('1117', '11', 'KAB. BENER MERIAH', 1, 0),
('1118', '11', 'KAB. PIDIE JAYA', 1, 0),
('1171', '11', 'KOTA BANDA ACEH', 2, 0),
('1172', '11', 'KOTA SABANG', 2, 0),
('1173', '11', 'KOTA LHOKSEUMAWE', 2, 0),
('1174', '11', 'KOTA LANGSA', 2, 0),
('1175', '11', 'KOTA SUBULUSSALAM', 2, 0),
('1201', '12', 'KAB. TAPANULI TENGAH', 1, 0),
('1202', '12', 'KAB. TAPANULI UTARA', 1, 0),
('1203', '12', 'KAB. TAPANULI SELATAN', 1, 0),
('1204', '12', 'KAB. NIAS', 1, 0),
('1205', '12', 'KAB. LANGKAT', 1, 0),
('1206', '12', 'KAB. KARO', 1, 0),
('1207', '12', 'KAB. DELI SERDANG', 1, 0),
('1208', '12', 'KAB. SIMALUNGUN', 1, 0),
('1209', '12', 'KAB. ASAHAN', 1, 0),
('1210', '12', 'KAB. LABUHANBATU', 1, 0),
('1211', '12', 'KAB. DAIRI', 1, 0),
('1212', '12', 'KAB. TOBA SAMOSIR', 1, 0),
('1213', '12', 'KAB. MANDAILING NATAL', 1, 0),
('1214', '12', 'KAB. NIAS SELATAN', 1, 0),
('1215', '12', 'KAB. PAKPAK BHARAT', 1, 0),
('1216', '12', 'KAB. HUMBANG HASUNDUTAN', 1, 0),
('1217', '12', 'KAB. SAMOSIR', 1, 0),
('1218', '12', 'KAB. SERDANG BEDAGAI', 1, 0),
('1219', '12', 'KAB. BATU BARA', 1, 0),
('1220', '12', 'KAB. PADANG LAWAS UTARA', 1, 0),
('1221', '12', 'KAB. PADANG LAWAS', 1, 0),
('1222', '12', 'KAB. LABUHANBATU SELATAN', 1, 0),
('1223', '12', 'KAB. LABUHANBATU UTARA', 1, 0),
('1224', '12', 'KAB. NIAS UTARA', 1, 0),
('1225', '12', 'KAB. NIAS BARAT', 1, 0),
('1271', '12', 'KOTA MEDAN', 2, 0),
('1272', '12', 'KOTA PEMATANG SIANTAR', 2, 0),
('1273', '12', 'KOTA SIBOLGA', 2, 0),
('1274', '12', 'KOTA TANJUNG BALAI', 2, 0),
('1275', '12', 'KOTA BINJAI', 2, 0),
('1276', '12', 'KOTA TEBING TINGGI', 2, 0),
('1277', '12', 'KOTA PADANGSIDIMPUAN', 2, 0),
('1278', '12', 'KOTA GUNUNGSITOLI', 2, 0),
('1301', '13', 'KAB. PESISIR SELATAN', 1, 0),
('1302', '13', 'KAB. SOLOK', 1, 0),
('1303', '13', 'KAB. SIJUNJUNG', 1, 0),
('1304', '13', 'KAB. TANAH DATAR', 1, 0),
('1305', '13', 'KAB. PADANG PARIAMAN', 1, 0),
('1306', '13', 'KAB. AGAM', 1, 0),
('1307', '13', 'KAB. LIMA PULUH KOTA', 1, 0),
('1308', '13', 'KAB. PASAMAN', 1, 0),
('1309', '13', 'KAB. KEPULAUAN MENTAWAI', 1, 0),
('1310', '13', 'KAB. DHARMASRAYA', 1, 0),
('1311', '13', 'KAB. SOLOK SELATAN', 1, 0),
('1312', '13', 'KAB. PASAMAN BARAT', 1, 0),
('1371', '13', 'KOTA PADANG', 2, 0),
('1372', '13', 'KOTA SOLOK', 2, 0),
('1373', '13', 'KOTA SAWAHLUNTO', 2, 0),
('1374', '13', 'KOTA PADANG PANJANG', 2, 0),
('1375', '13', 'KOTA BUKITTINGGI', 2, 0),
('1376', '13', 'KOTA PAYAKUMBUH', 2, 0),
('1377', '13', 'KOTA PARIAMAN', 2, 0),
('1401', '14', 'KAB. KAMPAR', 1, 0),
('1402', '14', 'KAB. INDRAGIRI HULU', 1, 0),
('1403', '14', 'KAB. BENGKALIS', 1, 0),
('1404', '14', 'KAB. INDRAGIRI HILIR', 1, 0),
('1405', '14', 'KAB. PELALAWAN', 1, 0),
('1406', '14', 'KAB. ROKAN HULU', 1, 0),
('1407', '14', 'KAB. ROKAN HILIR', 1, 0),
('1408', '14', 'KAB. SIAK', 1, 0),
('1409', '14', 'KAB. KUANTAN SINGINGI', 1, 0),
('1410', '14', 'KAB. KEPULAUAN MERANTI', 1, 0),
('1471', '14', 'KOTA PEKANBARU', 2, 0),
('1472', '14', 'KOTA DUMAI', 2, 0),
('1501', '15', 'KAB. KERINCI', 1, 0),
('1502', '15', 'KAB. MERANGIN', 1, 0),
('1503', '15', 'KAB. SAROLANGUN', 1, 0),
('1504', '15', 'KAB. BATANGHARI', 1, 0),
('1505', '15', 'KAB. MUARO JAMBI', 1, 0),
('1506', '15', 'KAB. TANJUNG JABUNG BARAT', 1, 0),
('1507', '15', 'KAB. TANJUNG JABUNG TIMUR', 1, 0),
('1508', '15', 'KAB. BUNGO', 1, 0),
('1509', '15', 'KAB. TEBO', 1, 0),
('1571', '15', 'KOTA JAMBI', 2, 0),
('1572', '15', 'KOTA SUNGAI PENUH', 2, 0),
('1601', '16', 'KAB. OGAN KOMERING ULU', 1, 0),
('1602', '16', 'KAB. OGAN KOMERING ILIR', 1, 0),
('1603', '16', 'KAB. MUARA ENIM', 1, 0),
('1604', '16', 'KAB. LAHAT', 1, 0),
('1605', '16', 'KAB. MUSI RAWAS', 1, 0),
('1606', '16', 'KAB. MUSI BANYUASIN', 1, 0),
('1607', '16', 'KAB. BANYUASIN', 1, 0),
('1608', '16', 'KAB. OGAN KOMERING ULU TIMUR', 1, 0),
('1609', '16', 'KAB. OGAN KOMERING ULU SELATAN', 1, 0),
('1610', '16', 'KAB. OGAN ILIR', 1, 0),
('1611', '16', 'KAB. EMPAT LAWANG', 1, 0),
('1612', '16', 'KAB. PENUKAL ABAB LEMATANG ILIR', 1, 0),
('1613', '16', 'KAB. MUSI RAWAS UTARA', 1, 0),
('1671', '16', 'KOTA PALEMBANG', 2, 0),
('1672', '16', 'KOTA PAGAR ALAM', 2, 0),
('1673', '16', 'KOTA LUBUK LINGGAU', 2, 0),
('1674', '16', 'KOTA PRABUMULIH', 2, 0),
('1701', '17', 'KAB. BENGKULU SELATAN', 1, 0),
('1702', '17', 'KAB. REJANG LEBONG', 1, 0),
('1703', '17', 'KAB. BENGKULU UTARA', 1, 0),
('1704', '17', 'KAB. KAUR', 1, 0),
('1705', '17', 'KAB. SELUMA', 1, 0),
('1706', '17', 'KAB. MUKO MUKO', 1, 0),
('1707', '17', 'KAB. LEBONG', 1, 0),
('1708', '17', 'KAB. KEPAHIANG', 1, 0),
('1709', '17', 'KAB. BENGKULU TENGAH', 1, 0),
('1771', '17', 'KOTA BENGKULU', 2, 0),
('1801', '18', 'KAB. LAMPUNG SELATAN', 1, 0),
('1802', '18', 'KAB. LAMPUNG TENGAH', 1, 0),
('1803', '18', 'KAB. LAMPUNG UTARA', 1, 0),
('1804', '18', 'KAB. LAMPUNG BARAT', 1, 0),
('1805', '18', 'KAB. TULANG BAWANG', 1, 0),
('1806', '18', 'KAB. TANGGAMUS', 1, 0),
('1807', '18', 'KAB. LAMPUNG TIMUR', 1, 0),
('1808', '18', 'KAB. WAY KANAN', 1, 0),
('1809', '18', 'KAB. PESAWARAN', 1, 0),
('1810', '18', 'KAB. PRINGSEWU', 1, 0),
('1811', '18', 'KAB. MESUJI', 1, 0),
('1812', '18', 'KAB. TULANG BAWANG BARAT', 1, 0),
('1813', '18', 'KAB. PESISIR BARAT', 1, 0),
('1871', '18', 'KOTA BANDAR LAMPUNG', 2, 0),
('1872', '18', 'KOTA METRO', 2, 0),
('1901', '19', 'KAB. BANGKA', 1, 0),
('1902', '19', 'KAB. BELITUNG', 1, 0),
('1903', '19', 'KAB. BANGKA SELATAN', 1, 0),
('1904', '19', 'KAB. BANGKA TENGAH', 1, 0),
('1905', '19', 'KAB. BANGKA BARAT', 1, 0),
('1906', '19', 'KAB. BELITUNG TIMUR', 1, 0),
('1971', '19', 'KOTA PANGKAL PINANG', 2, 0),
('2101', '21', 'KAB. BINTAN', 1, 0),
('2102', '21', 'KAB. KARIMUN', 1, 0),
('2103', '21', 'KAB. NATUNA', 1, 0),
('2104', '21', 'KAB. LINGGA', 1, 0),
('2105', '21', 'KAB. KEPULAUAN ANAMBAS', 1, 0),
('2171', '21', 'KOTA BATAM', 2, 0),
('2172', '21', 'KOTA TANJUNG PINANG', 2, 0),
('3101', '31', 'KAB. ADM. KEP. SERIBU', 1, 0),
('3171', '31', 'KOTA ADM. JAKARTA PUSAT', 2, 0),
('3172', '31', 'KOTA ADM. JAKARTA UTARA', 2, 0),
('3173', '31', 'KOTA ADM. JAKARTA BARAT', 2, 0),
('3174', '31', 'KOTA ADM. JAKARTA SELATAN', 2, 0),
('3175', '31', 'KOTA ADM. JAKARTA TIMUR', 2, 0),
('3201', '32', 'KAB. BOGOR', 1, 0),
('3202', '32', 'KAB. SUKABUMI', 1, 0),
('3203', '32', 'KAB. CIANJUR', 1, 0),
('3204', '32', 'KAB. BANDUNG', 1, 0),
('3205', '32', 'KAB. GARUT', 1, 0),
('3206', '32', 'KAB. TASIKMALAYA', 1, 0),
('3207', '32', 'KAB. CIAMIS', 1, 0),
('3208', '32', 'KAB. KUNINGAN', 1, 0),
('3209', '32', 'KAB. CIREBON', 1, 0),
('3210', '32', 'KAB. MAJALENGKA', 1, 0),
('3211', '32', 'KAB. SUMEDANG', 1, 0),
('3212', '32', 'KAB. INDRAMAYU', 1, 0),
('3213', '32', 'KAB. SUBANG', 1, 0),
('3214', '32', 'KAB. PURWAKARTA', 1, 0),
('3215', '32', 'KAB. KARAWANG', 1, 0),
('3216', '32', 'KAB. BEKASI', 1, 0),
('3217', '32', 'KAB. BANDUNG BARAT', 1, 0),
('3218', '32', 'KAB. PANGANDARAN', 1, 0),
('3271', '32', 'KOTA BOGOR', 2, 0),
('3272', '32', 'KOTA SUKABUMI', 2, 0),
('3273', '32', 'KOTA BANDUNG', 2, 0),
('3274', '32', 'KOTA CIREBON', 2, 0),
('3275', '32', 'KOTA BEKASI', 2, 0),
('3276', '32', 'KOTA DEPOK', 2, 0),
('3277', '32', 'KOTA CIMAHI', 2, 0),
('3278', '32', 'KOTA TASIKMALAYA', 2, 0),
('3279', '32', 'KOTA BANJAR', 2, 0),
('3301', '33', 'KAB. CILACAP', 1, 0),
('3302', '33', 'KAB. BANYUMAS', 1, 0),
('3303', '33', 'KAB. PURBALINGGA', 1, 0),
('3304', '33', 'KAB. BANJARNEGARA', 1, 0),
('3305', '33', 'KAB. KEBUMEN', 1, 0),
('3306', '33', 'KAB. PURWOREJO', 1, 0),
('3307', '33', 'KAB. WONOSOBO', 1, 0),
('3308', '33', 'KAB. MAGELANG', 1, 0),
('3309', '33', 'KAB. BOYOLALI', 1, 0),
('3310', '33', 'KAB. KLATEN', 1, 0),
('3311', '33', 'KAB. SUKOHARJO', 1, 0),
('3312', '33', 'KAB. WONOGIRI', 1, 0),
('3313', '33', 'KAB. KARANGANYAR', 1, 0),
('3314', '33', 'KAB. SRAGEN', 1, 0),
('3315', '33', 'KAB. GROBOGAN', 1, 0),
('3316', '33', 'KAB. BLORA', 1, 0),
('3317', '33', 'KAB. REMBANG', 1, 0),
('3318', '33', 'KAB. PATI', 1, 0),
('3319', '33', 'KAB. KUDUS', 1, 0),
('3320', '33', 'KAB. JEPARA', 1, 0),
('3321', '33', 'KAB. DEMAK', 1, 0),
('3322', '33', 'KAB. SEMARANG', 1, 0),
('3323', '33', 'KAB. TEMANGGUNG', 1, 0),
('3324', '33', 'KAB. KENDAL', 1, 0),
('3325', '33', 'KAB. BATANG', 1, 0),
('3326', '33', 'KAB. PEKALONGAN', 1, 0),
('3327', '33', 'KAB. PEMALANG', 1, 0),
('3328', '33', 'KAB. TEGAL', 1, 0),
('3329', '33', 'KAB. BREBES', 1, 0),
('3371', '33', 'KOTA MAGELANG', 2, 0),
('3372', '33', 'KOTA SURAKARTA', 2, 0),
('3373', '33', 'KOTA SALATIGA', 2, 0),
('3374', '33', 'KOTA SEMARANG', 2, 0),
('3375', '33', 'KOTA PEKALONGAN', 2, 0),
('3376', '33', 'KOTA TEGAL', 2, 0),
('3401', '34', 'KAB. KULON PROGO', 1, 0),
('3402', '34', 'KAB. BANTUL', 1, 0),
('3403', '34', 'KAB. GUNUNG KIDUL', 1, 0),
('3404', '34', 'KAB. SLEMAN', 1, 0),
('3471', '34', 'KOTA YOGYAKARTA', 2, 0),
('3501', '35', 'KAB. PACITAN', 1, 0),
('3502', '35', 'KAB. PONOROGO', 1, 0),
('3503', '35', 'KAB. TRENGGALEK', 1, 0),
('3504', '35', 'KAB. TULUNGAGUNG', 1, 0),
('3505', '35', 'KAB. BLITAR', 1, 0),
('3506', '35', 'KAB. KEDIRI', 1, 0),
('3507', '35', 'KAB. MALANG', 1, 0),
('3508', '35', 'KAB. LUMAJANG', 1, 0),
('3509', '35', 'KAB. JEMBER', 1, 0),
('3510', '35', 'KAB. BANYUWANGI', 1, 0),
('3511', '35', 'KAB. BONDOWOSO', 1, 0),
('3512', '35', 'KAB. SITUBONDO', 1, 0),
('3513', '35', 'KAB. PROBOLINGGO', 1, 0),
('3514', '35', 'KAB. PASURUAN', 1, 0),
('3515', '35', 'KAB. SIDOARJO', 1, 0),
('3516', '35', 'KAB. MOJOKERTO', 1, 0),
('3517', '35', 'KAB. JOMBANG', 1, 0),
('3518', '35', 'KAB. NGANJUK', 1, 0),
('3519', '35', 'KAB. MADIUN', 1, 0),
('3520', '35', 'KAB. MAGETAN', 1, 0),
('3521', '35', 'KAB. NGAWI', 1, 0),
('3522', '35', 'KAB. BOJONEGORO', 1, 0),
('3523', '35', 'KAB. TUBAN', 1, 0),
('3524', '35', 'KAB. LAMONGAN', 1, 0),
('3525', '35', 'KAB. GRESIK', 1, 0),
('3526', '35', 'KAB. BANGKALAN', 1, 0),
('3527', '35', 'KAB. SAMPANG', 1, 0),
('3528', '35', 'KAB. PAMEKASAN', 1, 0),
('3529', '35', 'KAB. SUMENEP', 1, 0),
('3571', '35', 'KOTA KEDIRI', 2, 0),
('3572', '35', 'KOTA BLITAR', 2, 0),
('3573', '35', 'KOTA MALANG', 2, 0),
('3574', '35', 'KOTA PROBOLINGGO', 2, 0),
('3575', '35', 'KOTA PASURUAN', 2, 0),
('3576', '35', 'KOTA MOJOKERTO', 2, 0),
('3577', '35', 'KOTA MADIUN', 2, 0),
('3578', '35', 'KOTA SURABAYA', 2, 0),
('3579', '35', 'KOTA BATU', 2, 0),
('3601', '36', 'KAB. PANDEGLANG', 1, 0),
('3602', '36', 'KAB. LEBAK', 1, 0),
('3603', '36', 'KAB. TANGERANG', 1, 0),
('3604', '36', 'KAB. SERANG', 1, 0),
('3671', '36', 'KOTA TANGERANG', 2, 0),
('3672', '36', 'KOTA CILEGON', 2, 0),
('3673', '36', 'KOTA SERANG', 2, 0),
('3674', '36', 'KOTA TANGERANG SELATAN', 2, 0),
('5101', '51', 'KAB. JEMBRANA', 1, 0),
('5102', '51', 'KAB. TABANAN', 1, 0),
('5103', '51', 'KAB. BADUNG', 1, 0),
('5104', '51', 'KAB. GIANYAR', 1, 0),
('5105', '51', 'KAB. KLUNGKUNG', 1, 0),
('5106', '51', 'KAB. BANGLI', 1, 0),
('5107', '51', 'KAB. KARANGASEM', 1, 0),
('5108', '51', 'KAB. BULELENG', 1, 0),
('5171', '51', 'KOTA DENPASAR', 2, 0),
('5201', '52', 'KAB. LOMBOK BARAT', 1, 0),
('5202', '52', 'KAB. LOMBOK TENGAH', 1, 0),
('5203', '52', 'KAB. LOMBOK TIMUR', 1, 0),
('5204', '52', 'KAB. SUMBAWA', 1, 0),
('5205', '52', 'KAB. DOMPU', 1, 0),
('5206', '52', 'KAB. BIMA', 1, 0),
('5207', '52', 'KAB. SUMBAWA BARAT', 1, 0),
('5208', '52', 'KAB. LOMBOK UTARA', 1, 0),
('5271', '52', 'KOTA MATARAM', 2, 0),
('5272', '52', 'KOTA BIMA', 2, 0),
('5301', '53', 'KAB. KUPANG', 1, 0),
('5302', '53', 'KAB TIMOR TENGAH SELATAN', 1, 0),
('5303', '53', 'KAB. TIMOR TENGAH UTARA', 1, 0),
('5304', '53', 'KAB. BELU', 1, 0),
('5305', '53', 'KAB. ALOR', 1, 0),
('5306', '53', 'KAB. FLORES TIMUR', 1, 0),
('5307', '53', 'KAB. SIKKA', 1, 0),
('5308', '53', 'KAB. ENDE', 1, 0),
('5309', '53', 'KAB. NGADA', 1, 0),
('5310', '53', 'KAB. MANGGARAI', 1, 0),
('5311', '53', 'KAB. SUMBA TIMUR', 1, 0),
('5312', '53', 'KAB. SUMBA BARAT', 1, 0),
('5313', '53', 'KAB. LEMBATA', 1, 0),
('5314', '53', 'KAB. ROTE NDAO', 1, 0),
('5315', '53', 'KAB. MANGGARAI BARAT', 1, 0),
('5316', '53', 'KAB. NAGEKEO', 1, 0),
('5317', '53', 'KAB. SUMBA TENGAH', 1, 0),
('5318', '53', 'KAB. SUMBA BARAT DAYA', 1, 0),
('5319', '53', 'KAB. MANGGARAI TIMUR', 1, 0),
('5320', '53', 'KAB. SABU RAIJUA', 1, 0),
('5321', '53', 'KAB. MALAKA', 1, 0),
('5371', '53', 'KOTA KUPANG', 2, 0),
('6101', '61', 'KAB. SAMBAS', 1, 0),
('6102', '61', 'KAB. MEMPAWAH', 1, 0),
('6103', '61', 'KAB. SANGGAU', 1, 0),
('6104', '61', 'KAB. KETAPANG', 1, 0),
('6105', '61', 'KAB. SINTANG', 1, 0),
('6106', '61', 'KAB. KAPUAS HULU', 1, 0),
('6107', '61', 'KAB. BENGKAYANG', 1, 0),
('6108', '61', 'KAB. LANDAK', 1, 0),
('6109', '61', 'KAB. SEKADAU', 1, 0),
('6110', '61', 'KAB. MELAWI', 1, 0),
('6111', '61', 'KAB. KAYONG UTARA', 1, 0),
('6112', '61', 'KAB. KUBU RAYA', 1, 0),
('6171', '61', 'KOTA PONTIANAK', 2, 0),
('6172', '61', 'KOTA SINGKAWANG', 2, 0),
('6201', '62', 'KAB. KOTAWARINGIN BARAT', 1, 0),
('6202', '62', 'KAB. KOTAWARINGIN TIMUR', 1, 0),
('6203', '62', 'KAB. KAPUAS', 1, 0),
('6204', '62', 'KAB. BARITO SELATAN', 1, 0),
('6205', '62', 'KAB. BARITO UTARA', 1, 0),
('6206', '62', 'KAB. KATINGAN', 1, 0),
('6207', '62', 'KAB. SERUYAN', 1, 0),
('6208', '62', 'KAB. SUKAMARA', 1, 0),
('6209', '62', 'KAB. LAMANDAU', 1, 0),
('6210', '62', 'KAB. GUNUNG MAS', 1, 0),
('6211', '62', 'KAB. PULANG PISAU', 1, 0),
('6212', '62', 'KAB. MURUNG RAYA', 1, 0),
('6213', '62', 'KAB. BARITO TIMUR', 1, 0),
('6271', '62', 'KOTA PALANGKARAYA', 2, 0),
('6301', '63', 'KAB. TANAH LAUT', 1, 0),
('6302', '63', 'KAB. KOTABARU', 1, 0),
('6303', '63', 'KAB. BANJAR', 1, 0),
('6304', '63', 'KAB. BARITO KUALA', 1, 0),
('6305', '63', 'KAB. TAPIN', 1, 0),
('6306', '63', 'KAB. HULU SUNGAI SELATAN', 1, 0),
('6307', '63', 'KAB. HULU SUNGAI TENGAH', 1, 0),
('6308', '63', 'KAB. HULU SUNGAI UTARA', 1, 0),
('6309', '63', 'KAB. TABALONG', 1, 0),
('6310', '63', 'KAB. TANAH BUMBU', 1, 0),
('6311', '63', 'KAB. BALANGAN', 1, 0),
('6371', '63', 'KOTA BANJARMASIN', 2, 0),
('6372', '63', 'KOTA BANJARBARU', 2, 0),
('6401', '64', 'KAB. PASER', 1, 0),
('6402', '64', 'KAB. KUTAI KARTANEGARA', 1, 0),
('6403', '64', 'KAB. BERAU', 1, 0),
('6407', '64', 'KAB. KUTAI BARAT', 1, 0),
('6408', '64', 'KAB. KUTAI TIMUR', 1, 0),
('6409', '64', 'KAB. PENAJAM PASER UTARA', 1, 0),
('6411', '64', 'KAB. MAHAKAM ULU', 1, 0),
('6471', '64', 'KOTA BALIKPAPAN', 2, 0),
('6472', '64', 'KOTA SAMARINDA', 2, 0),
('6474', '64', 'KOTA BONTANG', 2, 0),
('6501', '65', 'KAB. BULUNGAN', 1, 0),
('6502', '65', 'KAB. MALINAU', 1, 0),
('6503', '65', 'KAB. NUNUKAN', 1, 0),
('6504', '65', 'KAB. TANA TIDUNG', 1, 0),
('6571', '65', 'KOTA TARAKAN', 2, 0),
('7101', '71', 'KAB. BOLAANG MONGONDOW', 1, 0),
('7102', '71', 'KAB. MINAHASA', 1, 0),
('7103', '71', 'KAB. KEPULAUAN SANGIHE', 1, 0),
('7104', '71', 'KAB. KEPULAUAN TALAUD', 1, 0),
('7105', '71', 'KAB. MINAHASA SELATAN', 1, 0),
('7106', '71', 'KAB. MINAHASA UTARA', 1, 0),
('7107', '71', 'KAB. MINAHASA TENGGARA', 1, 0),
('7108', '71', 'KAB. BOLAANG MONGONDOW UTARA', 1, 0),
('7109', '71', 'KAB. KEP. SIAU TAGULANDANG BIARO', 1, 0),
('7110', '71', 'KAB. BOLAANG MONGONDOW TIMUR', 1, 0),
('7111', '71', 'KAB. BOLAANG MONGONDOW SELATAN', 1, 0),
('7171', '71', 'KOTA MANADO', 2, 0),
('7172', '71', 'KOTA BITUNG', 2, 0),
('7173', '71', 'KOTA TOMOHON', 2, 0),
('7174', '71', 'KOTA KOTAMOBAGU', 2, 0),
('7201', '72', 'KAB. BANGGAI', 1, 0),
('7202', '72', 'KAB. POSO', 1, 0),
('7203', '72', 'KAB. DONGGALA', 1, 0),
('7204', '72', 'KAB. TOLI TOLI', 1, 0),
('7205', '72', 'KAB. BUOL', 1, 0),
('7206', '72', 'KAB. MOROWALI', 1, 0),
('7207', '72', 'KAB. BANGGAI KEPULAUAN', 1, 0),
('7208', '72', 'KAB. PARIGI MOUTONG', 1, 0),
('7209', '72', 'KAB. TOJO UNA UNA', 1, 0),
('7210', '72', 'KAB. SIGI', 1, 0),
('7211', '72', 'KAB. BANGGAI LAUT', 1, 0),
('7212', '72', 'KAB. MOROWALI UTARA', 1, 0),
('7271', '72', 'KOTA PALU', 2, 0),
('7301', '73', 'KAB. KEPULAUAN SELAYAR', 1, 0),
('7302', '73', 'KAB. BULUKUMBA', 1, 0),
('7303', '73', 'KAB. BANTAENG', 1, 0),
('7304', '73', 'KAB. JENEPONTO', 1, 0),
('7305', '73', 'KAB. TAKALAR', 1, 0),
('7306', '73', 'KAB. GOWA', 1, 0),
('7307', '73', 'KAB. SINJAI', 1, 0),
('7308', '73', 'KAB. BONE', 1, 0),
('7309', '73', 'KAB. MAROS', 1, 0),
('7310', '73', 'KAB. PANGKAJENE KEPULAUAN', 1, 0),
('7311', '73', 'KAB. BARRU', 1, 0),
('7312', '73', 'KAB. SOPPENG', 1, 0),
('7313', '73', 'KAB. WAJO', 1, 0),
('7314', '73', 'KAB. SIDENRENG RAPPANG', 1, 0),
('7315', '73', 'KAB. PINRANG', 1, 0),
('7316', '73', 'KAB. ENREKANG', 1, 0),
('7317', '73', 'KAB. LUWU', 1, 0),
('7318', '73', 'KAB. TANA TORAJA', 1, 0),
('7322', '73', 'KAB. LUWU UTARA', 1, 0),
('7324', '73', 'KAB. LUWU TIMUR', 1, 0),
('7326', '73', 'KAB. TORAJA UTARA', 1, 0),
('7371', '73', 'KOTA MAKASSAR', 2, 0),
('7372', '73', 'KOTA PARE PARE', 2, 0),
('7373', '73', 'KOTA PALOPO', 2, 0),
('7401', '74', 'KAB. KOLAKA', 1, 0),
('7402', '74', 'KAB. KONAWE', 1, 0),
('7403', '74', 'KAB. MUNA', 1, 0),
('7404', '74', 'KAB. BUTON', 1, 0),
('7405', '74', 'KAB. KONAWE SELATAN', 1, 0),
('7406', '74', 'KAB. BOMBANA', 1, 0),
('7407', '74', 'KAB. WAKATOBI', 1, 0),
('7408', '74', 'KAB. KOLAKA UTARA', 1, 0),
('7409', '74', 'KAB. KONAWE UTARA', 1, 0),
('7410', '74', 'KAB. BUTON UTARA', 1, 0),
('7411', '74', 'KAB. KOLAKA TIMUR', 1, 0),
('7412', '74', 'KAB. KONAWE KEPULAUAN', 1, 0),
('7413', '74', 'KAB. MUNA BARAT', 1, 0),
('7414', '74', 'KAB. BUTON TENGAH', 1, 0),
('7415', '74', 'KAB. BUTON SELATAN', 1, 0),
('7471', '74', 'KOTA KENDARI', 2, 0),
('7472', '74', 'KOTA BAU BAU', 2, 0),
('7501', '75', 'KAB. GORONTALO', 1, 0),
('7502', '75', 'KAB. BOALEMO', 1, 0),
('7503', '75', 'KAB. BONE BOLANGO', 1, 0),
('7504', '75', 'KAB. PAHUWATO', 1, 0),
('7505', '75', 'KAB. GORONTALO UTARA', 1, 0),
('7571', '75', 'KOTA GORONTALO', 2, 0),
('7601', '76', 'KAB. MAMUJU UTARA', 1, 0),
('7602', '76', 'KAB. MAMUJU', 1, 0),
('7603', '76', 'KAB. MAMASA', 1, 0),
('7604', '76', 'KAB. POLEWALI MANDAR', 1, 0),
('7605', '76', 'KAB. MAJENE', 1, 0),
('7606', '76', 'KAB. MAMUJU TENGAH', 1, 0),
('8101', '81', 'KAB. MALUKU TENGAH', 1, 0),
('8102', '81', 'KAB. MALUKU TENGGARA', 1, 0),
('8103', '81', 'KAB MALUKU TENGGARA BARAT', 1, 0),
('8104', '81', 'KAB. BURU', 1, 0),
('8105', '81', 'KAB. SERAM BAGIAN TIMUR', 1, 0),
('8106', '81', 'KAB. SERAM BAGIAN BARAT', 1, 0),
('8107', '81', 'KAB. KEPULAUAN ARU', 1, 0),
('8108', '81', 'KAB. MALUKU BARAT DAYA', 1, 0),
('8109', '81', 'KAB. BURU SELATAN', 1, 0),
('8171', '81', 'KOTA AMBON', 2, 0),
('8172', '81', 'KOTA TUAL', 2, 0),
('8201', '82', 'KAB. HALMAHERA BARAT', 1, 0),
('8202', '82', 'KAB. HALMAHERA TENGAH', 1, 0),
('8203', '82', 'KAB. HALMAHERA UTARA', 1, 0),
('8204', '82', 'KAB. HALMAHERA SELATAN', 1, 0),
('8205', '82', 'KAB. KEPULAUAN SULA', 1, 0),
('8206', '82', 'KAB. HALMAHERA TIMUR', 1, 0),
('8207', '82', 'KAB. PULAU MOROTAI', 1, 0),
('8208', '82', 'KAB. PULAU TALIABU', 1, 0),
('8271', '82', 'KOTA TERNATE', 2, 0),
('8272', '82', 'KOTA TIDORE KEPULAUAN', 2, 0),
('9101', '91', 'KAB. MERAUKE', 1, 0),
('9102', '91', 'KAB. JAYAWIJAYA', 1, 0),
('9103', '91', 'KAB. JAYAPURA', 1, 0),
('9104', '91', 'KAB. NABIRE', 1, 0),
('9105', '91', 'KAB. KEPULAUAN YAPEN', 1, 0),
('9106', '91', 'KAB. BIAK NUMFOR', 1, 0),
('9107', '91', 'KAB. PUNCAK JAYA', 1, 0),
('9108', '91', 'KAB. PANIAI', 1, 0),
('9109', '91', 'KAB. MIMIKA', 1, 0),
('9110', '91', 'KAB. SARMI', 1, 0),
('9111', '91', 'KAB. KEEROM', 1, 0),
('9112', '91', 'KAB PEGUNUNGAN BINTANG', 1, 0),
('9113', '91', 'KAB. YAHUKIMO', 1, 0),
('9114', '91', 'KAB. TOLIKARA', 1, 0),
('9115', '91', 'KAB. WAROPEN', 1, 0),
('9116', '91', 'KAB. BOVEN DIGOEL', 1, 0),
('9117', '91', 'KAB. MAPPI', 1, 0),
('9118', '91', 'KAB. ASMAT', 1, 0),
('9119', '91', 'KAB. SUPIORI', 1, 0),
('9120', '91', 'KAB. MAMBERAMO RAYA', 1, 0),
('9121', '91', 'KAB. MAMBERAMO TENGAH', 1, 0),
('9122', '91', 'KAB. YALIMO', 1, 0),
('9123', '91', 'KAB. LANNY JAYA', 1, 0),
('9124', '91', 'KAB. NDUGA', 1, 0),
('9125', '91', 'KAB. PUNCAK', 1, 0),
('9126', '91', 'KAB. DOGIYAI', 1, 0),
('9127', '91', 'KAB. INTAN JAYA', 1, 0),
('9128', '91', 'KAB. DEIYAI', 1, 0),
('9171', '91', 'KOTA JAYAPURA', 2, 0),
('9201', '92', 'KAB. SORONG', 1, 0),
('9202', '92', 'KAB. MANOKWARI', 1, 0),
('9203', '92', 'KAB. FAK FAK', 1, 0),
('9204', '92', 'KAB. SORONG SELATAN', 1, 0),
('9205', '92', 'KAB. RAJA AMPAT', 1, 0),
('9206', '92', 'KAB. TELUK BINTUNI', 1, 0),
('9207', '92', 'KAB. TELUK WONDAMA', 1, 0),
('9208', '92', 'KAB. KAIMANA', 1, 0),
('9209', '92', 'KAB. TAMBRAUW', 1, 0),
('9210', '92', 'KAB. MAYBRAT', 1, 0),
('9211', '92', 'KAB. MANOKWARI SELATAN', 1, 0),
('9212', '92', 'KAB. PEGUNUNGAN ARFAK', 1, 0),
('9271', '92', 'KOTA SORONG', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wil_negara`
--

CREATE TABLE `wil_negara` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wil_negara`
--

INSERT INTO `wil_negara` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(100, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(94, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `wil_provinsi`
--

CREATE TABLE `wil_provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `jml` int(11) DEFAULT NULL COMMENT 'jml_pemohon'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wil_provinsi`
--

INSERT INTO `wil_provinsi` (`id_prov`, `nama`, `jml`) VALUES
('11', 'Aceh', NULL),
('12', 'Sumatera Utara', NULL),
('13', 'Sumatera Barat', NULL),
('14', 'Riau', NULL),
('15', 'Jambi', NULL),
('16', 'Sumatera Selatan', NULL),
('17', 'Bengkulu', NULL),
('18', 'Lampung', NULL),
('19', 'Kepulauan Bangka Belitung', NULL),
('21', 'Kepulauan Riau', NULL),
('31', 'DKI Jakarta', NULL),
('32', 'Jawa Barat', NULL),
('33', 'Jawa Tengah', NULL),
('34', 'DI Yogyakarta', NULL),
('35', 'Jawa Timur', NULL),
('36', 'Banten', NULL),
('51', 'Bali', NULL),
('52', 'Nusa Tenggara Barat', NULL),
('53', 'Nusa Tenggara Timur', NULL),
('61', 'Kalimantan Barat', NULL),
('62', 'Kalimantan Tengah', NULL),
('63', 'Kalimantan Selatan', NULL),
('64', 'Kalimantan Timur', NULL),
('65', 'Kalimantan Utara', NULL),
('71', 'Sulawesi Utara', NULL),
('72', 'Sulawesi Tengah', NULL),
('73', 'Sulawesi Selatan', NULL),
('74', 'Sulawesi Tenggara', NULL),
('75', 'Gorontalo', NULL),
('76', 'Sulawesi Barat', NULL),
('81', 'Maluku', NULL),
('82', 'Maluku Utara', NULL),
('91', 'Papua', NULL),
('92', 'Papua Barat', NULL);

-- --------------------------------------------------------

--
-- Structure for view `v_percakapan`
--
DROP TABLE IF EXISTS `v_percakapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u1712832`@`localhost` SQL SECURITY DEFINER VIEW `v_percakapan`  AS SELECT `msg_inbox`.`id` AS `id`, `msg_inbox`.`_ctime` AS `_ctime`, `msg_inbox`.`sender_number` AS `sender_number`, `msg_inbox`.`sender_name` AS `sender_name`, `msg_inbox`.`msg` AS `msg`, `msg_inbox`.`file` AS `file`, `msg_inbox`.`sts` AS `sts`, `msg_inbox`.`jenis_pesan` AS `jenis_pesan`, 'inbox' AS `inbox` FROM `msg_inbox`union all select `data_pesan`.`id` AS `id`,`data_pesan`.`_ctime` AS `_ctime`,`data_pesan`.`sender_number` AS `sender_number`,`data_pesan`.`no_tujuan` AS `no_tujuan`,`data_pesan`.`pesan` AS `pesan`,`data_pesan`.`url` AS `url`,`data_pesan`.`sts_pesan` AS `sts_pesan`,`data_pesan`.`type` AS `type`,'outbox' AS `outbox` from `data_pesan`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_pesan`
--
DROP TABLE IF EXISTS `v_pesan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u1712832`@`localhost` SQL SECURITY DEFINER VIEW `v_pesan`  AS SELECT 'out' AS `out`, `data_pesan`.`id` AS `id`, `data_pesan`.`tgl` AS `tgl`, `data_pesan`.`sts_pesan` AS `sts_pesan`, `data_pesan`.`type` AS `type`, `data_pesan`.`no_tujuan` AS `no_tujuan`, `data_pesan`.`pesan` AS `pesan`, `data_pesan`.`url` AS `url`, `data_pesan`.`hits` AS `hits`, `data_pesan`.`options` AS `options` FROM `data_pesan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `auto_replay`
--
ALTER TABLE `auto_replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_replay_listmenu`
--
ALTER TABLE `auto_replay_listmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cetak_ulang_antrian`
--
ALTER TABLE `cetak_ulang_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_aduan`
--
ALTER TABLE `data_aduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `data_antrian`
--
ALTER TABLE `data_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bed`
--
ALTER TABLE `data_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_broadcast`
--
ALTER TABLE `data_broadcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_group`
--
ALTER TABLE `data_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_jadwal_poliklinik`
--
ALTER TABLE `data_jadwal_poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kontak`
--
ALTER TABLE `data_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_media`
--
ALTER TABLE `data_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_outlet`
--
ALTER TABLE `data_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_paket`
--
ALTER TABLE `data_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pelanggan2`
--
ALTER TABLE `data_pelanggan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pesan`
--
ALTER TABLE `data_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_poli`
--
ALTER TABLE `data_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ruangan`
--
ALTER TABLE `data_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_survei`
--
ALTER TABLE `data_survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_terjadwal`
--
ALTER TABLE `data_terjadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_stations`
--
ALTER TABLE `device_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_autoreplay`
--
ALTER TABLE `inbox_autoreplay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_level`
--
ALTER TABLE `main_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `msg_inbox`
--
ALTER TABLE `msg_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg_outbox`
--
ALTER TABLE `msg_outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_cs`
--
ALTER TABLE `pesan_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_instruksi`
--
ALTER TABLE `pesan_instruksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_keyword`
--
ALTER TABLE `pesan_keyword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_terjadwal`
--
ALTER TABLE `pesan_terjadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_aduan`
--
ALTER TABLE `session_aduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `session_cs`
--
ALTER TABLE `session_cs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tm_kategori`
--
ALTER TABLE `tm_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_list_order`
--
ALTER TABLE `tm_list_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`id_session_order`,`id_user`,`kode_barang`,`qty`,`harga_satuan`,`harga_dasar`);

--
-- Indexes for table `tm_order`
--
ALTER TABLE `tm_order`
  ADD PRIMARY KEY (`id`,`id_order`),
  ADD KEY `id` (`id`,`id_order`,`harga_final`,`tunai`,`diskon`) USING BTREE;

--
-- Indexes for table `wil_kabupaten`
--
ALTER TABLE `wil_kabupaten`
  ADD PRIMARY KEY (`id_kab`) USING BTREE,
  ADD KEY `id_kab` (`id_kab`,`id_prov`) USING BTREE;

--
-- Indexes for table `wil_negara`
--
ALTER TABLE `wil_negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wil_provinsi`
--
ALTER TABLE `wil_provinsi`
  ADD PRIMARY KEY (`id_prov`) USING BTREE,
  ADD KEY `id_prov` (`id_prov`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `auto_replay`
--
ALTER TABLE `auto_replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auto_replay_listmenu`
--
ALTER TABLE `auto_replay_listmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cetak_ulang_antrian`
--
ALTER TABLE `cetak_ulang_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `data_aduan`
--
ALTER TABLE `data_aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_antrian`
--
ALTER TABLE `data_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_bed`
--
ALTER TABLE `data_bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_broadcast`
--
ALTER TABLE `data_broadcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_group`
--
ALTER TABLE `data_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `data_jadwal_poliklinik`
--
ALTER TABLE `data_jadwal_poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_kontak`
--
ALTER TABLE `data_kontak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `data_media`
--
ALTER TABLE `data_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `data_member`
--
ALTER TABLE `data_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_order`
--
ALTER TABLE `data_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_outlet`
--
ALTER TABLE `data_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_paket`
--
ALTER TABLE `data_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `data_pelanggan2`
--
ALTER TABLE `data_pelanggan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_pesan`
--
ALTER TABLE `data_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `data_poli`
--
ALTER TABLE `data_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_ruangan`
--
ALTER TABLE `data_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_survei`
--
ALTER TABLE `data_survei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_terjadwal`
--
ALTER TABLE `data_terjadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `device_stations`
--
ALTER TABLE `device_stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `inbox_autoreplay`
--
ALTER TABLE `inbox_autoreplay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `main_level`
--
ALTER TABLE `main_level`
  MODIFY `id_level` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `msg_inbox`
--
ALTER TABLE `msg_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `msg_outbox`
--
ALTER TABLE `msg_outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesan_cs`
--
ALTER TABLE `pesan_cs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pesan_instruksi`
--
ALTER TABLE `pesan_instruksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan_keyword`
--
ALTER TABLE `pesan_keyword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_terjadwal`
--
ALTER TABLE `pesan_terjadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `session_aduan`
--
ALTER TABLE `session_aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `session_cs`
--
ALTER TABLE `session_cs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tm_kategori`
--
ALTER TABLE `tm_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_list_order`
--
ALTER TABLE `tm_list_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `tm_order`
--
ALTER TABLE `tm_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `wil_negara`
--
ALTER TABLE `wil_negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
