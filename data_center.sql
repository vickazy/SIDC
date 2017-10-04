-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 05:35 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `tmpt_lahir` varchar(10) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `status_kepegawaian` enum('PNS','GTT','','') NOT NULL,
  `status_keanggotaan` enum('aktif','nonaktif','','') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `pendidikan_akhir`, `status_kepegawaian`, `status_keanggotaan`, `alamat`, `hak_akses`, `username`, `password`) VALUES
('1001', 'Elfan', 'Bojonegoro', '25/03/1996', 'L', 'ISLAM', 'S1', 'PNS', 'aktif', 'Trucuk', '', '1001', 'b8c37e33defde51cf91e1e03e51657da'),
('1002', 'Faqih', 'Bojonegoro', '26/03/1996', 'L', 'ISLAM', 'S2', 'PNS', 'aktif', 'Trucuk', '', '1002', 'fba9d88164f3e2d9109ee770223212a0'),
('1003', 'Isna', 'Bojonegoro', '27/03/1996', 'L', 'ISLAM', 'S3', 'PNS', 'aktif', 'Trucuk', '', '1003', 'aa68c75c4a77c87f97fb686b2f068676'),
('1004', 'Ine', 'Bojonegoro', '28/03/1996', 'L', 'ISLAM', 'S4', 'PNS', 'aktif', 'Trucuk', '', '1004', 'fed33392d3a48aa149a87a38b875ba4a');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE IF NOT EXISTS `gelombang` (
  `id_gelombang` varchar(10) NOT NULL,
  `nama_gelombang` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id_gelombang`, `nama_gelombang`, `keterangan`) VALUES
('g0', 'off', ''),
('g1', '1', 'gelombang 1 semester 1'),
('g2', '2', 'gelombang 2 semester 1'),
('g3', '3', 'gelombang 3 semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id_hak_akses` varchar(10) NOT NULL,
  `nama_akses` varchar(10) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_akses`, `status`) VALUES
('akses001', 'mahasiswa', 'aktif'),
('akses002', 'dosen', 'aktif'),
('akses003', 'tata_usaha', 'aktif'),
('akses005', 'superadmin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses_user`
--

CREATE TABLE IF NOT EXISTS `hak_akses_user` (
  `id_user` varchar(10) NOT NULL,
  `id_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses_user`
--

INSERT INTO `hak_akses_user` (`id_user`, `id_akses`) VALUES
('22', 'akses005'),
('22', 'akses003'),
('1421024001', 'akses001'),
('1421024002', 'akses001'),
('1421024003', 'akses001'),
('1421024004', 'akses001'),
('1421024005', 'akses001'),
('1421024006', 'akses001'),
('1421024007', 'akses001'),
('1421024008', 'akses001'),
('1421024011', 'akses001'),
('1421024013', 'akses001'),
('1421024014', 'akses001'),
('1421024015', 'akses001'),
('1421024016', 'akses001'),
('1421024017', 'akses001'),
('1421024018', 'akses001'),
('1421024019', 'akses001'),
('1421024020', 'akses001'),
('1421024021', 'akses001'),
('1421024022', 'akses001'),
('1421024023', 'akses001'),
('1421024024', 'akses001'),
('1421024025', 'akses001'),
('1421024026', 'akses001'),
('1421024028', 'akses001'),
('1421024029', 'akses001'),
('1421024030', 'akses001'),
('1421024031', 'akses001'),
('1421024032', 'akses001'),
('1421024033', 'akses001'),
('1421024034', 'akses001'),
('1421024035', 'akses001'),
('1421024037', 'akses001'),
('1421024038', 'akses001'),
('1421024039', 'akses001'),
('1421024040', 'akses001'),
('1421024041', 'akses001'),
('1421024042', 'akses001'),
('1421024043', 'akses001'),
('1421024044', 'akses001'),
('1421024046', 'akses001'),
('1421024047', 'akses001'),
('1421024049', 'akses001'),
('1421024050', 'akses001'),
('1421024051', 'akses001'),
('1421024052', 'akses001'),
('1421024054', 'akses001'),
('1421024055', 'akses001'),
('1421024056', 'akses001'),
('1421024057', 'akses001'),
('1421024058', 'akses001'),
('1421024059', 'akses001'),
('1421024063', 'akses001'),
('1421024064', 'akses001'),
('1421024065', 'akses001'),
('1421024066', 'akses001'),
('1421024067', 'akses001'),
('1421024068', 'akses001'),
('1421024070', 'akses001'),
('1421024071', 'akses001'),
('1421024072', 'akses001'),
('1421024073', 'akses001'),
('1421024074', 'akses001'),
('1421024075', 'akses001'),
('1421024080', 'akses001'),
('1421024081', 'akses001'),
('1421024082', 'akses001'),
('1421024083', 'akses001'),
('1421024084', 'akses001'),
('1421024085', 'akses001'),
('1421024086', 'akses001'),
('1421024087', 'akses001'),
('1421024088', 'akses001'),
('1421024089', 'akses001'),
('1421024090', 'akses001'),
('1421024091', 'akses001'),
('1421024093', 'akses001'),
('1421024094', 'akses001'),
('1421024096', 'akses001'),
('1421024097', 'akses001'),
('1421024098', 'akses001'),
('1421024099', 'akses001'),
('1421024100', 'akses001'),
('1421024101', 'akses001'),
('1421024102', 'akses001'),
('1421024104', 'akses001'),
('1421024105', 'akses001'),
('1421024106', 'akses001'),
('1421024107', 'akses001'),
('1421024108', 'akses001'),
('1421024110', 'akses001'),
('1421024111', 'akses001'),
('1421024112', 'akses001'),
('1421024113', 'akses001'),
('1421024114', 'akses001'),
('1421024115', 'akses001'),
('1421024116', 'akses001'),
('1421024117', 'akses001'),
('1421024118', 'akses001'),
('1421024120', 'akses001'),
('1421024122', 'akses001'),
('1421024123', 'akses001'),
('1421024124', 'akses001'),
('1421024126', 'akses001'),
('1421024127', 'akses001'),
('1421024128', 'akses001'),
('1421024129', 'akses001'),
('1421024130', 'akses001'),
('1421024131', 'akses001'),
('1421024132', 'akses001'),
('1421024133', 'akses001'),
('1421024136', 'akses001'),
('1421024138', 'akses001'),
('1421024139', 'akses001'),
('1421024141', 'akses001'),
('1421024142', 'akses001'),
('1421024143', 'akses001'),
('1421024144', 'akses001'),
('1421024145', 'akses001'),
('1421024146', 'akses001'),
('1421024147', 'akses001'),
('1421024148', 'akses001'),
('1421024149', 'akses001'),
('1421024201', 'akses001'),
('1421024151', 'akses001'),
('1421024152', 'akses001'),
('1421024153', 'akses001'),
('1421024154', 'akses001'),
('1421024155', 'akses001'),
('1421024156', 'akses001'),
('1421024158', 'akses001'),
('1421024159', 'akses001'),
('1421024160', 'akses001'),
('1421024161', 'akses001'),
('1421024162', 'akses001'),
('1421024163', 'akses001'),
('1421024164', 'akses001'),
('1421024165', 'akses001'),
('1421024168', 'akses001'),
('1421024170', 'akses001'),
('1421024171', 'akses001'),
('1421024172', 'akses001'),
('1421024173', 'akses001'),
('1421024175', 'akses001'),
('1421024176', 'akses001'),
('1421024177', 'akses001'),
('1421024178', 'akses001'),
('1421024179', 'akses001'),
('1421024180', 'akses001'),
('1421024181', 'akses001'),
('1421024182', 'akses001'),
('1421024183', 'akses001'),
('1421024184', 'akses001'),
('1421024186', 'akses001'),
('1421024187', 'akses001'),
('1421024188', 'akses001'),
('1421024189', 'akses001'),
('1421024190', 'akses001'),
('1421024191', 'akses001'),
('1421024192', 'akses001'),
('1421024193', 'akses001'),
('1421024194', 'akses001'),
('1421024195', 'akses001'),
('1421024196', 'akses001'),
('1421024198', 'akses001'),
('1421024199', 'akses001'),
('1421024200', 'akses001'),
('1001', 'akses002'),
('1002', 'akses002'),
('1003', 'akses002'),
('1004', 'akses002'),
('1421024001', 'akses001'),
('1421024002', 'akses001'),
('1421024003', 'akses001'),
('1421024004', 'akses001'),
('1421024005', 'akses001'),
('1421024006', 'akses001'),
('1421024007', 'akses001'),
('1421024008', 'akses001'),
('1421024011', 'akses001'),
('1421024013', 'akses001'),
('1421024014', 'akses001'),
('1421024015', 'akses001'),
('1421024016', 'akses001'),
('1421024017', 'akses001'),
('1421024018', 'akses001'),
('1421024019', 'akses001'),
('1421024020', 'akses001'),
('1421024021', 'akses001'),
('1421024022', 'akses001'),
('1421024023', 'akses001'),
('1421024024', 'akses001'),
('1421024025', 'akses001'),
('1421024026', 'akses001'),
('1421024028', 'akses001'),
('1421024029', 'akses001'),
('1421024030', 'akses001'),
('1421024031', 'akses001'),
('1421024032', 'akses001'),
('1421024033', 'akses001'),
('1421024034', 'akses001'),
('1421024035', 'akses001'),
('1421024037', 'akses001'),
('1421024038', 'akses001'),
('1421024039', 'akses001'),
('1421024040', 'akses001'),
('1421024041', 'akses001'),
('1421024042', 'akses001'),
('1421024043', 'akses001'),
('1421024044', 'akses001'),
('1421024046', 'akses001'),
('1421024047', 'akses001'),
('1421024049', 'akses001'),
('1421024050', 'akses001'),
('1421024051', 'akses001'),
('1421024052', 'akses001'),
('1421024054', 'akses001'),
('1421024055', 'akses001'),
('1421024056', 'akses001'),
('1421024057', 'akses001'),
('1421024058', 'akses001'),
('1421024059', 'akses001'),
('1421024063', 'akses001'),
('1421024064', 'akses001'),
('1421024065', 'akses001'),
('1421024066', 'akses001'),
('1421024067', 'akses001'),
('1421024068', 'akses001'),
('1421024070', 'akses001'),
('1421024071', 'akses001'),
('1421024072', 'akses001'),
('1421024073', 'akses001'),
('1421024074', 'akses001'),
('1421024075', 'akses001'),
('1421024080', 'akses001'),
('1421024081', 'akses001'),
('1421024082', 'akses001'),
('1421024083', 'akses001'),
('1421024084', 'akses001'),
('1421024085', 'akses001'),
('1421024086', 'akses001'),
('1421024087', 'akses001'),
('1421024088', 'akses001'),
('1421024089', 'akses001'),
('1421024090', 'akses001'),
('1421024091', 'akses001'),
('1421024093', 'akses001'),
('1421024094', 'akses001'),
('1421024096', 'akses001'),
('1421024097', 'akses001'),
('1421024098', 'akses001'),
('1421024099', 'akses001'),
('1421024100', 'akses001'),
('1421024101', 'akses001'),
('1421024102', 'akses001'),
('1421024104', 'akses001'),
('1421024105', 'akses001'),
('1421024106', 'akses001'),
('1421024107', 'akses001'),
('1421024108', 'akses001'),
('1421024110', 'akses001'),
('1421024111', 'akses001'),
('1421024112', 'akses001'),
('1421024113', 'akses001'),
('1421024114', 'akses001'),
('1421024115', 'akses001'),
('1421024116', 'akses001'),
('1421024117', 'akses001'),
('1421024118', 'akses001'),
('1421024120', 'akses001'),
('1421024122', 'akses001'),
('1421024123', 'akses001'),
('1421024124', 'akses001'),
('1421024126', 'akses001'),
('1421024127', 'akses001'),
('1421024128', 'akses001'),
('1421024129', 'akses001'),
('1421024130', 'akses001'),
('1421024131', 'akses001'),
('1421024132', 'akses001'),
('1421024133', 'akses001'),
('1421024136', 'akses001'),
('1421024138', 'akses001'),
('1421024139', 'akses001'),
('1421024141', 'akses001'),
('1421024142', 'akses001'),
('1421024143', 'akses001'),
('1421024144', 'akses001'),
('1421024145', 'akses001'),
('1421024146', 'akses001'),
('1421024147', 'akses001'),
('1421024148', 'akses001'),
('1421024149', 'akses001'),
('1421024201', 'akses001'),
('1421024151', 'akses001'),
('1421024152', 'akses001'),
('1421024153', 'akses001'),
('1421024154', 'akses001'),
('1421024155', 'akses001'),
('1421024156', 'akses001'),
('1421024158', 'akses001'),
('1421024159', 'akses001'),
('1421024160', 'akses001'),
('1421024161', 'akses001'),
('1421024162', 'akses001'),
('1421024163', 'akses001'),
('1421024164', 'akses001'),
('1421024165', 'akses001'),
('1421024168', 'akses001'),
('1421024170', 'akses001'),
('1421024171', 'akses001'),
('1421024172', 'akses001'),
('1421024173', 'akses001'),
('1421024175', 'akses001'),
('1421024176', 'akses001'),
('1421024177', 'akses001'),
('1421024178', 'akses001'),
('1421024179', 'akses001'),
('1421024180', 'akses001'),
('1421024181', 'akses001'),
('1421024182', 'akses001'),
('1421024183', 'akses001'),
('1421024184', 'akses001'),
('1421024186', 'akses001'),
('1421024187', 'akses001'),
('1421024188', 'akses001'),
('1421024189', 'akses001'),
('1421024190', 'akses001'),
('1421024191', 'akses001'),
('1421024192', 'akses001'),
('1421024193', 'akses001'),
('1421024194', 'akses001'),
('1421024195', 'akses001'),
('1421024196', 'akses001'),
('1421024198', 'akses001'),
('1421024199', 'akses001'),
('1421024200', 'akses001');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_dosen`
--

CREATE TABLE IF NOT EXISTS `kategori_dosen` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_dosen`
--

INSERT INTO `kategori_dosen` (`id_kategori`, `nama_kategori`, `status`) VALUES
('001dosen', 'KTP', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `kategori_mahasiswa` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_mahasiswa`
--

INSERT INTO `kategori_mahasiswa` (`id_kategori`, `nama_kategori`, `status`) VALUES
('001mahasiswa', 'KTP', 'aktif'),
('002mahasiswa', 'IJASAH', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tu`
--

CREATE TABLE IF NOT EXISTS `kategori_tu` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_tu`
--

INSERT INTO `kategori_tu` (`id_kategori`, `nama_kategori`, `status`) VALUES
('001tu', 'KTP', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `jk` enum('L','K','','') NOT NULL,
  `jalan` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jurusan_asal` varchar(20) NOT NULL,
  `tahun_masuk` varchar(5) NOT NULL,
  `ayah` varchar(20) NOT NULL,
  `ibu` varchar(20) NOT NULL,
  `pendidikan_ayah` varchar(10) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `pekerjaan_ayah` varchar(10) NOT NULL,
  `pekerjaan_ibu` varchar(10) NOT NULL,
  `penghasilan_ayah` varchar(10) NOT NULL,
  `penghasilan_ibu` varchar(10) NOT NULL,
  `kota_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `anak_ke` varchar(3) NOT NULL,
  `jumlah_anak` varchar(3) NOT NULL,
  `asal_sekolah` varchar(20) NOT NULL,
  `kota_sekolah` varchar(10) NOT NULL,
  `gelombang` varchar(5) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nilai_stl` varchar(3) NOT NULL,
  `nilai_rstl` varchar(3) NOT NULL,
  `jumlah_mp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jk`, `jalan`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `kode_pos`, `provinsi`, `phone`, `gol_darah`, `agama`, `jurusan_asal`, `tahun_masuk`, `ayah`, `ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `kota_lahir`, `tanggal_lahir`, `anak_ke`, `jumlah_anak`, `asal_sekolah`, `kota_sekolah`, `gelombang`, `status`, `username`, `password`, `nilai_stl`, `nilai_rstl`, `jumlah_mp`) VALUES
('1421024001', 'AGIL SYARASYAH PUTRA', 'L', 'DS. SUKOWATI RT. 04 ', '4', '1', 'DS. SUKOWATI', 'KEC. KAPAS', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '089633710087', '-', 'ISLAM', 'IPS', '2014', 'EKO PRASETYO', 'KUSRINAWATI', '-', '-', 'SWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '29/10/1993', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024001', '0f5424aa977ea0f674b053fc56107ffb', '49.', '8.3', '6'),
('1421024002', 'AHMAD UBAIDILLAH', 'L', 'DS. KEDUNGBONDO RT. ', '22', '3', 'DS. KEDUNGBONDO', 'KEC. BALEN', 'KAB. BOJONEGORO', '62182', 'JAWA TIMUR', '081515626277', '-', 'ISLAM', 'IPS', '2014', 'IMAM KHAMBALI', 'UNSIYAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '20/02/1996', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024002', 'dd2338d27901eafc9c80965a17526c17', ' -', ' -', ' -'),
('1421024003', 'ANANDA YUSTIN ARDIANOVA', 'L', 'DS. KALITIDU KEC. KA', ' -', ' -', 'DS. KALITIDU', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085749002908', '-', 'ISLAM', 'TEKNIK PEMESINAN', '2014', 'DWI WAHYU BASKORO', 'SUKARTINI', '-', '-', 'PEDAGANG', ' -', '1500000', '-', 'BOJONEGORO', '01/11/1995', '-', '-', 'SMK NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024003', '58a99ab9c7df5a24ecaf36b3ff1fd7bd', ' -', ' -', ' -'),
('1421024004', 'ANANTA NUGRAHA', 'L', 'JL. BASUKI RAHMAT Gg', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62116', 'JAWA TIMUR', '089678027323', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'SUMARTONO', 'ANTIN ARIANI', ' -', '-', 'PNS', ' -', '1500000', '-', 'BOJONEGORO', '15/11/1995', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024004', '7729f2452457129c49241f8fc5de9ce8', ' -', ' -', ' -'),
('1421024005', 'ANDIK AMIM RIFA''I', 'L', 'JL. BRAWIJAYA NO. 13', ' -', ' -', 'DS. SUMBEREJO', 'KEC. MALO', 'KAB. BOJONEGORO', '62153', 'JAWA TIMUR', '085330011709', '-', 'ISLAM', 'IPS', '2014', 'JAHURI', 'RASMI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '09/04/1996', '-', '-', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', 'g1', 'aktif', '1421024005', 'cc0cd5d5e64281b1631b5474a6eabf74', ' -', '  -', ' -'),
('1421024006', 'ARIS SYAHRI RAMADHAN ', 'L', 'DS. BUTOH KEC. NGASE', '20', '4', 'DS. BUTOH', 'KEC. NGASEM', 'KAB. BOJONEGORO', '62154', 'JAWA TIMUR', '08565319879', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'DAMAT', 'YASTRI', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1500000', '-', 'BOJONEGORO', '12/02/1995', '-', '-', 'SMK NEGERI NGASEM', 'BOJONEGORO', 'g2', 'aktif', '1421024006', '5fc95b68d8de0bc5b77f4f6b0b206c25', ' -', ' -', ' -'),
('1421024007', 'AZHAR HANIFUDIN', 'L', 'DS. KENEP RT. 16 RW.', '16', '3', 'DS. KENEP', 'KEC. BALEN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085746417437', '-', 'ISLAM', 'TEKNIK SURVEY PEMETA', '2014', 'JUNAIDI', 'INSIYAH', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '06/01/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024007', 'c3cca3190d31cf6df5505ec9b8fe9e16', ' -', ' -', ' -'),
('1421024008', 'BADI''ATUL HIDAYAH', '', 'DS. MOJORANU RT. 11 ', '11', '3', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '082335371818', '-', 'ISLAM', 'IPA', '2014', 'SUKARNO', 'SITI NIKMATUL CHOIRI', '-', '-', 'KARYAWAN S', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '03/09/1996', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024008', '5f6f16fcc9ed3bb8a8d341a10fc2f6b6', ' -', ' -', ' -'),
('1421024011', 'DENI ARI WIJAYA', 'L', 'DS. SUMBERARUM RT. 0', '7', '3', 'DS. SUMBERARUM', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085730491401', '-', 'ISLAM', 'IPA', '2014', 'SUPARIANTO', 'SUPRIANIK', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '11/01/1997', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024011', 'e4e778ed9f6c1e5febcfa08354b109a6', ' -', ' -', ' -'),
('1421024013', 'DYAH CHRISTANTI', '', 'DS. TAPELAN RT. 06 R', '6', '3', 'DS. TAPELAN', 'KEC. NGRAHO', 'KAB. BOJONEGORO', '62165', 'JAWA TIMUR', '085741569740', '-', 'ISLAM', 'IPA', '2014', 'KASMAN', 'PRAYATI', '-', '-', 'PNS', 'IBU RUMAH ', '2500000', '-', 'BOJONEGORO', '23/05/1996', '-', '-', 'SMA NEGERI 1 NGRAHO', 'BOJONEGORO', 'g1', 'aktif', '1421024013', '1141c541e7acac4bfb257d976934e545', ' -', ' -', ' -'),
('1421024014', 'FAJAR BUDI PRASETYO', 'L', 'DS. SUMBERARUM RT. 0', '2', '1', 'DS. SUMBERARUM', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085646183183', '-', 'ISLAM', 'IPS', '2014', 'MUNADI', 'KATMININGSIH', '-', '-', 'PNS', 'WIRASWASTA', '3500000', '-', 'BOJONEGORO', '02/05/1996', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024014', '666bede5462c463875388f49bfa26648', ' -', ' -', ' -'),
('1421024015', 'FITRIA FEBRIANI', '', 'DK. GLAGAH RT. 14 RW', '14', '5', 'DS. KALIREJO', 'KEC. NGRAHO', 'KAB. BOJONEGORO', '62165', 'JAWA TIMUR', '085648523587', '-', 'ISLAM', 'IPA', '2014', 'SLAMET RIYADI', 'SARI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '13/02/1996', '-', '-', 'SMA NEGERI 1 NGRAHO', 'BOJONEGORO', 'g1', 'aktif', '1421024015', '87fb24a5881e88926d0eb0ca8bc3e602', ' -', ' -', ' -'),
('1421024016', 'FURKAN FEBRIANTO', 'L', 'DS. PRAMBATAN RT. 01', '1', '1', 'DS. PRAMBATAN', 'KEC. BALEN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085755471338', '-', 'ISLAM', 'IPS', '2014', 'GUNADI, SE', 'PUTIAH', '-', '-', 'PNS', 'IBU RUMAH ', '1500000', '-', 'SINTANG', '10/02/1995', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024016', '4d1eacf19b11be654ff6dd686d998db5', ' -', ' -', ' -'),
('1421024017', 'IMAM MAHRUF', 'L', 'DS. MULYOREJO RT. 04', '4', '1', 'DS. MULYOREJO', 'KEC. CEPU', 'KAB. CEPU', '  -', 'JAWA TENGAH', '08993675094', '-', 'ISLAM', 'TEKNIK SEPEDA MOTOR', '2014', 'SUPARMIN', 'NUR ASIAH JAMIL', '-', '-', 'SWASTA', 'IBU RUMAH ', '1000000', '-', 'BALIKPAPAN', '17/06/1997', '-', '-', 'SMK MUHAMMADIYAH 2 C', 'CEPU', 'g1', 'aktif', '1421024017', 'c0255e62fd9d51418419ef47cee5cb5c', ' -', ' -', ' -'),
('1421024018', 'LAILY FAIZATIN NI''MAH', '', 'DS. WOTANNGARE KEC. ', ' -', ' -', 'DS. WOTANNGARE', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085655192722', '-', 'ISLAM', 'PERBANKAN', '2014', 'MUSTHOFA', 'UMI ZUBAIDAH', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1500000', '-', 'BOJONEGORO', '19/07/1997', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024018', 'a238c03aa7da56914d070cd1c30568c8', ' -', ' -', ' -'),
('1421024019', 'LISA APRILIA', '', 'JL. RAYA SUMBERREJO ', '1', '1', ' -', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '085784633383', '-', 'ISLAM', 'IPA', '2014', 'NUR KHOLIS', 'ETI APRIYANTI', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '3500000', '-', 'LAMPUNG UTARA', '27/04/1996', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024019', 'd38aef8fd6e9ac949bb4fd764105bd09', '-', '-', '-'),
('1421024020', 'M. HAMDAN MUKAFI', 'L', 'DS. SUMBERTLASEH KEC', ' -', ' -', 'DS. SUMBERTLASEH', 'KEC. KALITIDU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085708175951', '-', 'ISLAM', 'IPA', '2014', 'ABDUL QOHAR', 'SITI FATIMAH', '-', '-', 'PEDAGANG', 'PEDAGANG', '1000000', '-', 'BOJONEGORO', '01/04/1996', '-', '-', 'SMA MANBAIL HUDA', 'TUBAN', 'g1', 'aktif', '1421024020', '4737b4d541086d37ff5fe3682bbe2183', ' -', ' -', ' -'),
('1421024021', 'MAT?NI', 'L', 'DS. SEKAR RT. 08 RW.', '8', '3', 'DS. SEKAR', 'KEC. SEKAR', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085748231271', '-', 'ISLAM', 'BAHASA', '2014', 'NGADIYO', 'SUKINEM', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '08/12/1995', '-', '-', 'MA ABU DARRIN', 'BOJONEGORO', 'g1', 'aktif', '1421024021', '803b982bff19565336463f3772ece2f2', ' -', ' -', ' -'),
('1421024022', 'MOCH. ADAM TOWAFIAN', 'L', 'JL. LETNAN SUCIPTO P', ' -', ' -', 'DS. BANJARSARI', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', '089619256533', '-', 'ISLAM', 'IPS', '2014', 'GATOT BUDI SANTOSA', 'KEDAH HANDAYANI', '-', '-', 'PENSIUNAN ', 'PNS', '1500000', '-', 'BOJONEGORO', '28/01/1996', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024022', '6f4d3f724af0dc58007cef76393033b0', ' -', ' -', ' -'),
('1421024023', 'MUHAMMAD HADI ANWARUDIN', 'L', 'DS. SENDANGAGUNG KEC', ' - ', ' -', 'DS. SENDANGAGUNG', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085707199281', '-', 'ISLAM', 'IPS', '2014', 'SUPRIYADI', 'NIAYAH', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '11/06/1996', '-', '-', 'MA ISLAMIYAH ATTANWI', 'BOJONEGORO', 'g1', 'aktif', '1421024023', '270b79598a03478d3bf38c255bc99a9d', ' -', ' -', ' -'),
('1421024024', 'NELITA DYAH RAHAYU', '', 'DS. KALITIDU RT. 06 ', '6', '1', 'DS. KALITIDU', 'KEC. KALITIDU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085733296867', '-', 'ISLAM', 'ADMINISTRASI PERKANT', '2014', 'SARIYANTO', 'INNARNI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '2500000', '-', 'LAMONGAN', '13/08/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024024', '09d3c5b1c1d045c738296df5ca6546b8', ' -', ' -', ' -'),
('1421024025', 'NUGROHO AJI PURWANTO', 'L', 'DS. NGRAHO NO. 277 R', '5', '2', 'DS. NGRAHO', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085645609718', '-', 'ISLAM', 'TEKNIK INFORMATIKA', '2014', 'BAMBANG HARIJONO', 'KARI', '-', '-', 'PENSIUNAN', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '07/01/1996', '-', '-', 'SMA NEGERI 1 NGRAHO', 'BOJONEGORO', 'g1', 'aktif', '1421024025', '3e883e5fc9a18966983545c070a14b21', ' -', ' -', ' -'),
('1421024026', 'NUR INDAH SARI', '', 'DS. KEDUNGBONDO KEC.', ' -', ' -', 'DS. KEDUNGBONDO', 'KEC. BALEN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'IPS', '2014', 'SUHADI', 'MASRIFAH', '-', '-', 'PETANI', 'PEDAGANG', '1000000', '-', 'BOJONEGORO', '03/06/1996', '-', '-', 'MA ISLAMIYAH ATTANWI', 'BOJONEGORO', 'g2', 'aktif', '1421024026', '3c88e75540e8286d21903d7c56be3f58', ' -', ' -', ' -'),
('1421024028', 'SUSI ARDIYANI', '', 'DS. MULYOAGUNG KEC. ', ' -', ' -', 'DS. MULYOAGUNG', 'KEC. SINGGAHAN', 'KAB. TUBAN', '62361', 'JAWA TIMUR', '085230899477', '-', 'ISLAM', 'IPA', '2014', 'ALM. SOENDOKO', 'SUKARSIH', '-', '-', ' -', 'IBU RUMAH ', '1000000', '-', 'TUBAN', '18/05/1995', '-', '-', 'SMA NEGERI 1 SINGGAH', 'TUBAN', 'g3', 'aktif', '1421024028', '925b396b4b356dc6a1b45eafc2e3ce70', ' -', ' -', ' -'),
('1421024029', 'WIWIK SETYOWATI', '', 'DK. GLAGAH RT. 14 RW', '14', '5', 'DS. KALIREJO', 'KEC. NGRAHO', 'KAB. BOJONEGORO', '62165', 'JAWA TIMUR', '085706308185', '-', 'ISLAM', 'IPA', '2014', 'SUKIR', 'SUNTARI', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '27/06/1996', '-', '-', 'SMA NEGERI 1 NGRAHO', 'BOJONEGORO', 'g2', 'aktif', '1421024029', '2c5ec478c25ac152238c2b52fad7ebee', ' -', ' -', ' -'),
('1421024030', 'ADE DWI VIRNANDO', 'L', 'DS. JATITENGAH RT. 0', '3', '1', 'DS. JATITENGAH', 'KEC. SUGIHWARAS', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085607340404', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'MUKIT', 'SISWAHENI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '09/12/1996', '-', '-', 'SMK NEGERI SUGIHWARA', 'BOJONEGORO', 'g1', 'aktif', '1421024030', '586bf46cc2a1cad172b06b3545457394', '30.', '7.7', '4'),
('1421024031', 'AHMAD NAZWAR RIDWAN', 'L', 'DK. MEDALEM RT. 02 R', '2', '3', 'DS. PRAYUNGAN', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085732579847', '-', 'ISLAM', 'IPS', '2014', 'ACHMAD FAID', 'PUJI ASTUTI', '-', '-', 'PNS', 'BIDAN', '2000000', '-', 'BOJONEGORO', '25/08/1992', '-', '-', 'PAKET C', 'BOJONEGORO', 'g1', 'aktif', '1421024031', 'a927db33d3c7f47d6a430c1f2d998441', '45.', '6.5', '7'),
('1421024032', 'AHMAT SYAHRONI', 'L', 'DS. SIDOBANDUNG KEC.', ' -', ' -', 'DS. SIDOBANDUNG', 'KEC. BALEN', 'KAB. BOJONEGORO', '62182', 'JAWA TIMUR', '085733555810', '-', 'ISLAM', 'REKAYASA PERANGKAT L', '2014', 'PARNO', 'SUPARMI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '11/10/1994', '-', '-', 'SMK BIMA BOJONEGORO', 'BOJONEGORO', 'g1', 'aktif', '1421024032', '29beeb419f2a4c676edcde8260e11f59', ' -', '  -', ' -'),
('1421024033', 'DENY NAWANG AFISTA', '', 'DS. GROWOK RT. 07 RW', '7', '2', 'DS. GROWOK', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '087856620906', '-', 'ISLAM', 'IPA', '2014', 'WANTONO (ALM)', 'KARSINI', '-', '-', ' -', 'TKW', '2500000', '-', 'BOJONEGORO', '15/08/1996', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024033', '0daaf6b237615b0e86fb1f5d37c35c06', ' -', ' -', ' -'),
('1421024034', 'FABIOLA RIMADHANI', '', 'JL. KYAI MOJO NO. 7 ', ' -', ' -', 'DS. MOJOKAMPUNG', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62116', 'JAWA TIMUR', '08563279758', '-', 'ISLAM', 'PERBANKAN', '2014', 'BAMBANG HADIYONO', 'AINI MUFLIKAH', '-', '-', ' -', 'WIRASWASTA', '2000000', '-', 'BOJONEGORO', '07/02/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024034', 'f4e30733a997eef3f2c20984e773884b', ' -', ' -', ' -'),
('1421024035', 'FEBRI ANDRIYANI', '', 'DS. PRAMBATAN RT. 03', '3', '7', 'DS. PRAMBATAN', 'KEC. BALEN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085733919606', '-', 'ISLAM', 'IPS', '2014', 'HANI HANDOKO', 'YULIS STYONINGSIH', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '13/02/1996', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g2', 'aktif', '1421024035', 'c5ce2aa3a3b3ebe847515fa1494e25af', ' -', ' -', ' -'),
('1421024037', 'HARIS SETIYONO', 'L', 'JL. ARIF RAHMAN HAKI', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '087753053046', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'SUMARSONO', 'UMI CHOLIFAH', '-', '-', 'WIRASWASTA', ' -', '2000000', '-', 'BOJONEGORO', '19/09/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024037', 'bc7527edf23c132821aa0a442900f621', ' -', ' -', ' -'),
('1421024038', 'IHDINAN NAIM', 'L', 'DK. BANGSAN DS. BAJO', '5', '4', 'DS. BAJO', 'KEC. KEDUNGTUBAN', 'KAB. BLORA', ' -', 'JAWA TIMUR', '085712786464', '-', 'ISLAM', 'IPA', '2014', 'JAMARI', 'MUKAROMAH', '-', '-', 'PETANI', 'PEDAGANG', '2000000', '-', 'BLORA', '13/09/1996', '-', '-', 'MA NEGERI PADANGAN', 'BOJONEGORO', 'g1', 'aktif', '1421024038', '8cc1a6d562884c261f9035422178e37a', ' -', ' -', ' -'),
('1421024039', 'INTAN RINDANI', '', 'DSN. GEDANGAN RT. 01', '1', '4', 'DS. KEDUNGREJO', 'KEC. KEDUNGADEM', 'KAB. BOJONEGORO', '62195', 'JAWA TIMUR', '085731589991', '-', 'ISLAM', 'IPA', '2014', 'SUPANGAT', 'RUMINI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '05/01/1996', '-', '-', 'SMA NEGERI 1 SUGIHWA', 'BOJONEGORO', 'g1', 'aktif', '1421024039', 'b7397597ec6997977db4bb0a722474f3', ' -', ' -', ' -'),
('1421024040', 'LAELY KHOIRUN NISA', '', 'DS. JUMPUT RT. 04 RW', '4', '1', 'DS. JUMPUT', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085785871783', '-', 'ISLAM', 'IPA', '2014', 'SUWAJI, BA', 'UMI INSIYAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '13/10/1997', '-', '-', 'SMA NEGERI 1 SUGIHWA', 'BOJONEGORO', 'g1', 'aktif', '1421024040', '09b75f7a8f6913d232ec8a8c2f15b6e8', ' -', ' -', ' -'),
('1421024041', 'LEO ASDI SANDIKA', 'L', 'DSN. SENDANG ANYAR R', '4', '2', 'DS. BUMIAYU', 'KEC. BAURENO', 'KAB. BOJONEGORO', '62192', 'JAWA TIMUR', '085655338711', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'MOCH. YAKUB', 'SRI SUKASMI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'NGAWI', '27/07/1996', '-', '-', 'SMK NEGERI 1 BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024041', '8288199459ae735a2dd8aafed26933af', '-', '-', '-'),
('1421024042', 'LINA SEPTIANI', '', 'JL. ADE IRMA SURYANI', '2', '1', 'DS. SUMBANG', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '08983766912', '-', 'ISLAM', 'IPS', '2014', 'MARGONO', 'INDARTI', '-', '-', 'SWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '10/09/1995', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024042', 'd589817026a4c6d58487b714f53da70e', ' -', ' -', ' -'),
('1421024043', 'M. AGUNG PRASETYO', 'L', 'DSN. MEDALEM RT. 01 ', '1', '3', 'DS. PRAYUNGAN', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085852004484', '-', 'ISLAM', 'IPS', '2014', 'H. SUNARDI', 'H. SITI SUMRIYAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '25/10/1993', '-', '-', 'MA WALISONGO WOTAN', 'BOJONEGORO', 'g1', 'aktif', '1421024043', 'c48cf824790e6f02954b8694fbda3b58', '45.', '7.5', '6'),
('1421024044', 'M. ALFAN', 'L', 'JL. BASUKI RAHMAT Gg', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '(0353) 893944', '-', 'ISLAM', 'TEKNIK GAMBAR BANGUN', '2014', 'PUJIANTO, SH', 'LULUK RATNAWATI, SH', '-', '-', 'SWASTA', 'PNS', '2000000', '-', 'BOJONEGORO', '10/07/1996', '-', '-', 'SMK NEGERI DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024044', 'b27e9d7380b7ef438f067650ca6ad5ce', ' -', ' -', ' -'),
('1421024046', 'MITA TRIANA', '', 'DS. BENDO RT. 06 RW.', '6', '1', 'DS. BENDO', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', '085706186820', '-', 'ISLAM', 'MULTIMEDIA', '2014', 'YASIR', 'SULISTIANI', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '05/05/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024046', '2d20fe2c9cc00612aafb13fee5bef374', ' -', ' -', ' -'),
('1421024047', 'MUHAMAD ABDUL MALIK', 'L', 'DS. GAMONGAN KEC. TA', ' -', ' -', 'DS. GAMONGAN', 'KEC. TAMBAKREJO', 'KAB. BOJONEGORO', '62166', 'JAWA TIMUR', '085733930756', '-', 'ISLAM', 'REKAYASA PERANGKAT L', '2014', 'ANWAR', 'SUNARTI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'JAKARTA', '22/05/1995', '-', '-', 'SMK BIMA BOJONEGORO', 'BOJONEGORO', 'g1', 'aktif', '1421024047', '90307fca6cff052e781dd45918b326c9', ' -', ' -', ' -'),
('1421024049', 'NORMA KARTIKA PUTRI', '', 'JL. JAKSA AGUNG SUPR', ' -', ' -', 'DS. BANJAREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62118', 'JAWA TIMUR', '085236858727', '-', 'ISLAM', 'MULTIMEDIA', '2014', 'NUR AINI', 'DIANA DWI KARTIKA', '-', '-', 'PEDAGANG', 'IBU RUMAH ', '1000000', '-', 'SURABAYA', '06/07/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024049', '31f11490a8be8f30eae5c469c5db3e50', ' -', ' -', ' -'),
('1421024050', 'NOVI DWIYANTI', '', 'DS. MARGOMULYO RT. 1', '16', '7', 'DS. MARGOMULYO', 'KEC. BALEN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'IPA', '2014', 'SUNGKONO', 'SITI FATIMAH', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '07/11/1996', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024050', '851a4504f5ae4403ce17a49eabf51ac8', ' -', ' -', ' -'),
('1421024051', 'PURWANTO', 'L', 'DS. KALIOMBO KEC. PU', '21', '11', 'DS. KALIOMBO', 'KEC. PURWOSARI', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '081332467406', '-', 'ISLAM', 'IPS', '2014', 'SUYITNO', 'KARTINI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '23/10/1995', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024051', 'befd033439a2487da5ab49db78eef8bd', '-', '-', '6'),
('1421024052', 'RENI URIP PRATIAS', '', 'DK. SADANG RT. 12 RW', '12', '3', 'DS. BUTOH', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '087752263241', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'NUR HADI', 'SUNDARI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '30/05/1996', '-', '-', 'SMK MUHAMMADIYAH SUM', 'BOJONEGORO', 'g1', 'aktif', '1421024052', '343b1863c59631662ca1b5468a331074', ' -', ' -', ' -'),
('1421024054', 'RIYA MARLITA ANGGRAINI', '', 'DS. TAMBAKROMO RT. 0', '1', '3', 'DS. TAMBAKROMO', 'KEC. CEPU', 'KAB. BLORA', ' -', 'JAWA TENGAH', '082134941482', '-', 'ISLAM', 'IPA', '2014', 'SUPRIYO', 'JUMIATI NOVITA SARI', '-', '-', 'SWASTA', 'IBU RUMAH ', '1000000', '-', 'BLORA', '04/03/1996', '-', '-', 'SMA NEGERI 2 CEPU', 'BLORA', 'g1', 'aktif', '1421024054', 'f92d9846c71e1df9e6d0ad90563c9a6c', ' -', ' -', ' -'),
('1421024055', 'RIZKI OKTAVIA ', '', 'DS. SUKOWATI RT. 04 ', '4', '1', 'DS. SUKOWATI', 'KEC. KAPAS', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085730024470', '-', 'ISLAM', 'IPS', '2014', 'PURNOMO', 'LILIK JUNIWATI', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '28/10/1995', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024055', 'b7a8ef1948373fcc94a65f3cfe477c87', ' -', ' -', ' -'),
('1421024056', 'SANDHI WINDHA KARTIKA', '', 'DS. JATIBLIMBING RT.', '20', '3', 'DS. JATIBIMBLING', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '082334808863', '-', 'ISLAM', 'IPA', '2014', 'MUJIONO', 'MUSTIKANINGSIH', '-', '-', 'SWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '14/09/1996', '-', '-', 'SMA NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024056', 'd48ec812bfc15e0138d06a16f2b489f3', ' -', ' -', ' -'),
('1421024057', 'YUDI BACHTIAR ', 'L', 'DS. SUWALOH RT. 11 R', '11', '1', 'DS. SUWALOH', 'KEC. BALEN', 'KAB. BOJONEGORO', '62182', 'JAWA TIMUR', '085733782194', '-', 'ISLAM', 'IPS', '2014', 'MUZAINI', 'YUNARI', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1500000', '-', 'BOJONEGORO', '27/09/1996', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024057', 'a5caee30f3c33c1ae75c88c8269e4069', ' -', ' -', ' -'),
('1421024058', 'AGUS SANTOSO', 'L', 'DS. PIYAK RT. 02 RW.', '2', '2', 'DS. PIYAK', 'KEC. KANOR', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', '085706604029', '-', 'ISLAM', 'IPS', '2014', 'SURONO', 'MINARSIH', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1500000', '-', 'BOJONEGORO', '04/04/1994', '-', '-', 'SMA NEGERI 1 SUMBERR', 'BOJONEGORO', 'g1', 'aktif', '1421024058', '40db33ce92ccbfaa0cfdad4c8a6a1cbd', '51.', '8.5', '6'),
('1421024059', 'AHMAD ROZIKIN', 'L', 'DS. DUYUNGAN RT. 01 ', '1', '4', 'DS. DUYUNGAN', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085735925002', '-', 'ISLAM', 'IPS', '2014', 'SUKEMI', 'MARDHIATI', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '02/03/1996', '-', '-', 'SMA NEGERI 1 SUGIHWA', 'BOJONEGORO', 'g1', 'aktif', '1421024059', 'fd03ad6c0b6e3dca0c0436cba3ce8163', '44.', '7.5', '6'),
('1421024063', 'BAYU ADE SAPUTRA', 'L', 'JL. DR. CIPTO NO. 19', ' -', ' -', 'DS. MOJOKAMPUNG', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62116', 'JAWA TIMUR', '085607385151', '-', 'ISLAM', 'IPS', '2014', 'JUMINTO', 'LISWANING', '-', '-', 'SALES ROKO', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '24/06/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024063', 'a6a8b5502b62623c24b17b0014a3fb8b', '39.', '6.6', '6'),
('1421024064', 'CAHYO WIDODO', 'L', 'DS. PRIGI RT.04 RW.0', '4', '2', 'DS. PRIGI', 'KEC. KANOR', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', '-', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'SAMPURNO', 'SITI DAHROTIN', '-', '-', 'BURUH TANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '28/10/1995', '-', '-', 'SMK NEGERI 1 BAURENO', 'BOJONEGORO', 'g2', 'aktif', '1421024064', '00bf1fb86b7e037005c9541e7626b059', '33.', '8.3', '4'),
('1421024065', 'CHOLILURROHMAN', 'L', 'DS. PRAYUNGAN RT. 03', '3', '2', 'DS. PRAYUNGAN', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '085235042644', '-', 'ISLAM', 'IPA', '2014', 'SRIYANTO', 'SUMIJAH', '-', '-', 'GURU', 'PNS', '3500000', '-', 'BOJONEGORO', '11/05/1996', '-', '-', 'SMA NEGERI 1 BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024065', '806fb6cb198ed317cdc638d1e9b74886', '-', '-', '-'),
('1421024066', 'DEVI LUSIANA', '', 'DS. TULUNGREJO RT. 0', '9', '2', 'DS. TULUNGREJO', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', '085745921731', '-', 'ISLAM', 'IPA', '2014', 'DASAR', 'SUMIYATI', '-', '-', 'BURUH TANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '01/06/1996', '-', '-', 'SMA NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024066', 'ee873595d90f95b08c66749c23f35338', ' -', ' -', ' -'),
('1421024067', 'DHUWINTA GARNIS KURNIASARI', '', 'DS. TULUNGREJO RT. 0', '3', '1', 'DS. TULUNGREJO', 'KEC. TRUCUK', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'IPA', '2014', 'AGUNG SUGIANTO', 'SRI REJEKI', ' -', '-', 'PTT', ' -', '1000000', '-', 'BOJONEGORO', '06/06/1996', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024067', 'c8590227f76eee24fce81f1c2325f6b6', ' -', ' -', ' -'),
('1421024068', 'DIANA RAHMAWATI', '', 'DS. CANCUNG RT. 14 R', '14', '5', 'DS. CANCUNG', 'KEC. BUBULAN', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '081332924799', '-', 'ISLAM', 'IPA', '2014', 'DATON', 'SITI SULAIKAH', ' -', '-', 'PETANI', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '16/10/1996', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024068', '887a00686c115ad7491e2902fd9db636', ' -', ' -', ' -'),
('1421024070', 'DURROTUL ISTIQOMAH', '', 'JL. SERMA ABDULLAH N', ' -', ' -', 'DS. PACUL', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', '085706607436', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'MASDURI', 'SAUDAH', '-', '-', 'PETANI', 'BURU TANI', '1000000', '-', 'BOJONEGORO', '26/09/2014', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024070', 'a37d4d3c2c47c18812ae9d2296472f4d', ' -', ' -', ' -'),
('1421024071', 'HERU SULTONI', 'L', 'DS. TANJUNGHARJO RT.', '20', '3', 'DS. TANJUNGHARJO', 'KEC. KAPAS', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '08974943197', '-', 'ISLAM', 'IPA', '2014', 'BAMBANG WAHONO', 'SITI AISYAH', '-', '-', 'PETANI', 'PETANI', '1500000', '-', 'BOJONEGORO', '16/08/1995', '-', '-', 'MA ABU DARRIN', 'BOJONEGORO', 'g1', 'aktif', '1421024071', 'f2b3c7dd7429f110ab07157ac1accb25', '52.', '8.7', '6'),
('1421024072', 'HIDAYATUL LAILIYAH', '', 'JL. SUMBERAN RT. 11 ', '11', '2', 'DS. KUNCI', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085730671489', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'PONCO', 'AMINAH', '-', '-', 'SOPIR', 'TKI', '1000000', '-', 'BOJONEGORO', '14/09/1995', '-', '-', 'SMK PANCASILA', 'BOJONEGORO', 'g1', 'aktif', '1421024072', '59ddfa6bea80ce26b22ea1d9a55a0e3b', ' -', ' -', ' -'),
('1421024073', 'JOKO UTOMO', 'L', 'DS. KADUNGREJO RT. 2', '29', '11', 'DS. KADUNGREJO', 'KEC. BAURENO', 'KAB. BOJONEGORO', '62192', 'JAWA TIMUR', '085735483327', '-', 'ISLAM', 'IPS', '2014', 'SAMANI', 'KASNING', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '2500000', '-', 'BOJONEGORO', '28/04/1996', '-', '-', 'SMA AHMAD YANI 2 BAU', 'BOJONEGORO', 'g1', 'aktif', '1421024073', '9caefc6995e349084a5de52b278946f9', '49.', '8.2', '6'),
('1421024074', 'LULUK ISRO''IYAH', '', 'JL. MONGINSIDI Gg. I', '25', '6', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '089632733236', '-', 'ISLAM', 'IPA', '2014', 'MUCH. TURMUDZI', 'YULIANAWATI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '09/12/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024074', '1f934f5bf00911ba9d39637974880ed9', '48.', '8.1', '6'),
('1421024075', 'M. FEBRI HANSAH', 'L', 'DS. TALUN RT. 09 RW.', '9', '3', 'DS. TALUN', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62911', 'JAWA TIMUR', '085706664312', '-', 'ISLAM', 'KEAGAMAAN', '2014', 'SUWAJI', 'UMI HANIK', '-', '-', 'WIRASWASTA', 'PNS', '2500000', '-', 'BOJONEGORO', '18/02/1995', '-', '-', 'MA NU INFARUL GHOY', 'LAMONGAN', 'g1', 'aktif', '1421024075', 'b6bb1ebb4b826b4ef46a79d0d65a909b', '49.', '8.3', '6'),
('1421024080', 'RISKA ABDILANA', 'L', 'DS. BAKALAN RT. 01 R', '1', '1', 'DS. BAKALAN', 'KEC. TAMBAKREJO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085736851374', '-', 'ISLAM', 'IPS', '2014', 'RAHMAT', 'SULASMI', '-', '-', 'GURU', 'SWASTA', '1500000', '-', 'GUNUNGKIDUL ', '16/06/1996', '-', '-', 'MA NEGERI NGRAHO', 'BOJONEGORO', 'g1', 'aktif', '1421024080', '0981d530f7ecf8e1408223b8622bde32', ' -', ' -', ' -'),
('1421024081', 'RIZAL ARISDIANTO', 'L', 'JL. LETTU SUYITNO NO', '11', '3', 'DS. CAMPUREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62119', 'JAWA TIMUR', '085749035097', '-', 'ISLAM', 'IPS', '2014', 'ANDIK SLAMET BASUKI', 'GESWATI', '-', '-', 'PNS', 'WIRASWASTA', '2000000', '-', 'BOJONEGORO', '10/04/1996', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024081', '51b676f8e717bd322340994c5c21dc09', '-', '-', '-'),
('1421024082', 'VAQIDAH DISI QOMAROH', '', 'DS. SUGIHWARAS KEC. ', '  -', ' -', 'DS. SUGIHWARAS', 'KEC. SUGIHWARAS', 'KAB. BOJONEGORO', '62183', 'JAWA TIMUR', '085645015427', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'YUDHI S.', 'SITI MASRUROH', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '11/11/1995', '-', '-', 'SMK WALISONGO', 'BOJONEGORO', 'g1', 'aktif', '1421024082', '46930d1847accfa4e455a57f180a132a', ' -', ' -', ' -'),
('1421024083', 'WAHYU INDAH HARYATI', '', 'JL. SERMA ABDULLAH 2', ' -', ' -', 'DS. PACUL ', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', '085730508859', '-', 'ISLAM', 'IPS', '2014', 'SUHARTONO', 'SRIASIH', '-', '-', 'SWASTA', ' -', '1500000', '-', 'BOJONEGORO', '28/09/1996', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024083', 'b0c233538bb1402bc86e9f1d4279acb4', '-', '-', '-'),
('1421024084', 'WIWIK PUJI LESTARI', '', 'DS. KUNCI RT.22 RW.0', '22', '1', 'DS. KUNCI', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085648202352', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'SAMINGUN', 'DARIANTIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '21/08/1998', '-', '-', 'SMK PANCASILA', 'BOJONEGORO', 'g1', 'aktif', '1421024084', '34070a1613a44c485bb5deebf749387e', '-', '-', '-'),
('1421024085', 'YUDHI ANDRIANTO', 'L', 'DS. PRIGI RT. 02 RW.', '2', '1', 'DS. PRIGI', 'KEC. KANOR', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', '085785607864', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'KASDANI', 'KARNITI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '06/06/1996', '-', '-', 'SMK NEGERI 1 KANOR', 'BOJONEGORO', 'g1', 'aktif', '1421024085', '06c878a208dc4541d650116ca4333b75', '33.', '8.4', '4'),
('1421024086', 'ACHMAD ABUYAZID BUSTOMY', 'L', 'DS. SIMOREJO RT. 002', '2', '1', 'DS. SIMOREJO', 'KEC. KANOR', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085230733798', '-', 'ISLAM', 'IPA', '2014', 'ASHARI', 'ASRI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '14/11/1994', '-', '-', 'SMA NEGERI 1 BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024086', '46b630e651d25f5eef085ea4a4ff7837', '48.', '8.1', '6'),
('1421024087', 'AGUS TRI PRASETYO', 'L', 'DS. KALIOMBO RT. 19 ', '19', '10', 'DS. KALIOMBO', 'KEC. PURWOSARI', 'KAB. BOJONEGORO', '62161', 'JAWA TIMUR', '085852051663', '-', 'ISLAM', 'IPS', '2014', 'KARI', 'LUSI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '12/08/1996', '-', '-', 'SMA NEGERI 1 TAMBAKR', 'BOJONEGORO', 'g1', 'aktif', '1421024087', '7a5347419783cf87d1d67582cfce874d', '48.', '8.1', '6'),
('1421024088', 'AHMAD KAMALUDIN', 'L', 'DS. BETET RT. 001 RW', '1', '1', 'DS. BETET', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', '08560097922', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'NGATNO', 'SITI AMANAH', '-', '-', 'PERHUTANI', 'IBU RUMAH ', '2500000', '-', 'BOJONEGORO', '14/06/1996', '-', '-', 'SMK NEGERI 1 KASIMAN', 'BOJONEGORO', 'g1', 'aktif', '1421024088', 'bd74e616b1ec24c00752e40aea2a99fc', '29.', '7.4', '4'),
('1421024089', 'AHMAD ZAENURI', 'L', 'DS. TAPELAN KEC. NGR', ' -', ' -', 'DS. TAPELAN ', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '-', '-', 'ISLAM', 'BAHASA', '2014', 'SURAT', 'KASENI', ' -', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '09/02/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024089', 'ca492c4e1a90c12adc3c4e9da63e4959', '43.', '7.3', '6'),
('1421024090', 'AKHMAD ARIF SETIAWAN', 'L', 'DS. SOKOSARI RT. 08 ', '8', '2', 'DS. SOKOSARI', 'KEC. SOKO', 'KAB. TUBAN', '62732', 'JAWA TIMUR', '085606109918', '-', 'ISLAM', 'IPS', '2014', 'MOHAMMAD JONO', 'TRI YULIATI NINGSIH', '-', '-', 'PNS', 'IBU RUMAH ', '2500000', '-', 'TUBAN', '21/04/1995', '-', '-', 'SMA NEGERI 1 SOKO', 'TUBAN', 'g1', 'aktif', '1421024090', '4cbd4ad4a3310d651cc80bc1dd40f93e', '39.', '6.6', '6'),
('1421024091', 'CHABIB MASRIKUL ANWAR', 'L', 'DS. SENGON RT. 01 RW', '1', '1', 'DS. SENGON', 'KEC. NGAMBON', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085706108278', '-', 'ISLAM', 'IPA', '2014', 'SADIN', 'NGADIYAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', ' -', 'BOJONEGORO', '27/12/1995', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024091', '110877913d1343a689161a767844e06d', '48.', '8.1', '6'),
('1421024093', 'DEWI FATMAWATI', '', 'DS. LERAN RT. 13 RW.', '13', '4', 'DS. LERAN', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '089678224970', '-', 'ISLAM', 'ADMINISTRASI PERKANT', '2014', 'DJAZULI', 'MASRI''AH', '-', '-', 'PETANI', 'PETANI', '1500000', '-', 'BOJONEGORO', '12/09/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024093', '034fad2c6008784596ef1d62f3e06ffa', ' -', ' -', ' -'),
('1421024094', 'DINDA ANGGRAINI', '', 'JL. LETTU SUYITNO NO', '31', '11', 'DS. CAMPUREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62119', 'JAWA TIMUR', '085730297045', '-', 'ISLAM', 'IPA', '2014', 'SUWARJI', 'SUKARSIH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '02/06/1997', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g2', 'aktif', '1421024094', 'd30b62cebe9c1d303f5b23fe0d76dbda', '44.', '7.4', '6'),
('1421024096', 'ENDAH NUR ROFI''AH', '', 'DSN. GROGOL DS. SUMU', '20', '5', 'DS. SUMURAGUNG', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '085645545629', '-', 'ISLAM', 'IPA', '2014', 'SUYITNO', 'SA''DIYAH', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '13/03/1997', '-', '-', 'MA MUHAMMADIYAH 1 SU', 'BOJONEGORO', 'g1', 'aktif', '1421024096', '508d463eb12f11ae93b29e1236233569', '41.', '6.9', '6'),
('1421024097', 'FARADILLA RATNA DEWI', '', 'DS. KANOR RT. 13 RW.', '13', '3', 'DS. KANOR', 'KEC. KANOR', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'PEMASARAN', '2014', 'SLAMET HARIYONO', 'ISBANDIYAH', '-', '-', 'PNS', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '16/06/1996', '-', '-', 'SMK NEGERI 1 KANOR', 'BOJONEGORO', 'g1', 'aktif', '1421024097', 'b5dfe6270cf181ed3a11a398e14fd1b8', '-', '-', '-'),
('1421024098', 'FERDIAN SYAHRI NUGROHO', 'L', 'DS. WOTANNGARE RT. 1', '19', '6', 'DS. WOTANNGARE', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '082225235994', '-', 'ISLAM', 'IPA', '2014', 'DJOKO SUTOMO', 'TURSILO PUJI RAHAYU', '-', '-', 'PNS (GURU)', 'PNS (STAF ', '3500000', '-', 'BOJONEGORO', '15/02/1994', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024098', '31d1c7379702ce4621ba2ded79386ce0', '52', '8.7', '6'),
('1421024099', 'FITROTUL TIA WARDANI', '', 'DK. KALIPANG RT. 11 ', '11', '3', 'DS. LERAN', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085731792596', '-', 'ISLAM', 'IPA', '2014', 'SUWARNO', 'AHYUN KUSTIAH', '-', '-', 'SWASTA', 'IBU RUMAH ', '2000000', '-', 'BOJONEGORO', '18/02/1996', '-', '-', 'SMA NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024099', 'a6f5ea796efc19d61c65fe9387a31149', ' -', ' -', ' -'),
('1421024100', 'HERMANSYAH JANUARDANI', 'L', 'DS. BANGILAN RT. 003', '3', '5', 'DS. BANGILAN', 'KEC. BANGILAN', 'KAB. TUBAN', '62364', 'JAWA TIMUR', '085745929508', '-', 'ISLAM', 'AGRIBISNIS TERNAK RU', '2014', 'SETYO WAHONO', 'SITI HANIFAH', '-', '-', 'BURUH', 'IBU RUMAH ', '1000000', '-', 'TUBAN', '05/01/1996', '-', '-', 'SMK NEGERI 1 SINGGAH', 'TUBAN', 'g1', 'aktif', '1421024100', 'cc9828a6d466ce7574ab1310f038d320', '31.', '7.9', '4'),
('1421024101', 'HIDAYATUL ILMIYAH', '', 'JL. SUMBERAN RT. 11 ', '11', '2', 'DS. KUNCI', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085932640599', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'PONCO', 'AMINAH', '-', '-', 'SOPIR', 'TKI', '1000000', '-', 'BOJONEGORO', '14/09/1995', '-', '-', 'SMK PANCASILA', 'BOJONEGORO', 'g1', 'aktif', '1421024101', 'f8e3e7f6a0ffc7f4f8336225411d2aea', ' -', ' -', ' -'),
('1421024102', 'INDAH PUJI LESTARI', '', 'DS. PRIGI RT. 05 RW.', '5', '4', 'DS. PRIGI', 'KEC. KANOR', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', '085607828880', '-', 'ISLAM', 'TEKNIK PENGOLAHAN HA', '2014', 'SUWARTO', 'SITI SAMAWATI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', ' -', '-', 'BOJONEGORO', '05/06/1996', '-', '-', 'SMK NEGERI 1 KANOR', 'BOJONEGORO', 'g1', 'aktif', '1421024102', 'd2346fe719fac0c84b97bf9ca3224a30', '35.', '8.8', '4'),
('1421024104', 'LIA NUR FITRIANI', '', 'DS. NGUMPAKDALEM RT.', '17', '4', 'DS. NGUMPAKDALEM', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085791391301', '-', 'ISLAM', 'IPA', '2014', 'SAMSURI', 'SITI MUNTAAN', '-', '-', 'WIRASWASTA', 'PETANI', '1500000', '-', 'BOJONEGORO', '24/01/1997', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024104', '1bb932014f6f7022e2c866c3bd11985b', '43.', '7.3', '6'),
('1421024105', 'M. ARIF WARDANA', 'L', 'DK. BUTOH LOR DS. BU', '6', '3', 'DS. BUTOH', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '08973729907', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'KASNO', 'SUNIATI', '-', '-', 'BURUH TANI', 'BURUH TANI', '1000000', '-', 'BOJONEGORO', '15/12/1995', '-', '-', 'SMK AT-TANWIR TALUN ', 'BOJONEGORO', 'g1', 'aktif', '1421024105', '96a2f9586e122cdff23997bf93cb3e23', '34.', '8.6', '4'),
('1421024106', 'MOCH. CHOIRUL UMAM', 'L', 'DS. NGUMPAKDALEM RT.', '4', '1', 'DS. NGUMPAKDALEM', 'KEC. DANDER', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085706181061', '-', 'ISLAM', 'KIMIA ANALISIS', '2014', 'SUPARNO', 'SITI FATIMAH', '-', '-', 'WIRASWASTA', 'PEDAGANG', '2000000', '-', 'BOJONEGORO', '19/07/1996', '-', '-', 'SMK NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024106', '9b6662ea590a2ccd4434115154acb63b', '-', '-', '-'),
('1421024107', 'MOHAMAD FARIR FARKHAN', 'L', 'DS. NGUMPAKDALEM KEC', ' -', ' -', 'DS. NGUMPAKDALEM', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085649548150', '-', 'ISLAM', 'IPS', '2014', 'AHMAD MABRURI (ALM)', 'MASFUFATIN', '-', '-', ' -', 'SWASTA', '1000000', '-', 'TUBAN', '11/01/1994', '-', '-', 'MA MANBAIL FUTUH', 'TUBAN', 'g1', 'aktif', '1421024107', 'fb46272b0c2de5cc527d180a42c8a23a', '39.', '6.6', '6'),
('1421024108', 'MUHAMMAD AL BUSIRI', 'L', 'DS. NGRANDU KEC. BAU', ' -', ' -', 'DS. NGRANDU', 'KEC. BAURENO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085735293537', '-', 'ISLAM', 'IPA', '2014', 'SRIANTO', 'ENY KUSTINY', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'LUMAJANG', '27/06/1995', '-', '-', 'MA DARUL ULUM PASINA', 'BOJONEGORO', 'g1', 'aktif', '1421024108', 'eceb7879edead73067bb27e274d1ae4e', '50.', '8.4', '6'),
('1421024110', 'RAFI ARDIANSYAH', 'L', 'JL. SARIMULYO DS. BA', ' -', ' -', 'DS. BANJAREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '082161355991', '-', 'ISLAM', 'PEMESINAN', '2014', 'KASLAN', 'KUSPORINI', '-', '-', 'BURUH', 'PERSEORANG', '1500000', '-', 'BOJONEGORO', '17/02/1996', '-', '-', 'SMK NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024110', '72cee53d3302e6294a166909f3dcb93a', '31.', '7.8', '4'),
('1421024111', 'SOFIA DA SILVA', '', 'DS. TULUNGAGUNG RT. ', '11', '2', 'DS. TULUNGAGUNG', 'KEC. BAURENO', 'KAB. BOJONEGORO', '62192', 'JAWA TIMUR', '085648983220', '-', 'ISLAM', 'IPA', '2014', 'SUMAJI', 'IMROATIN', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '14/04/1996', '-', '-', 'SMA NEGERI 1 SUMBERR', 'BOJONEGORO', 'g1', 'aktif', '1421024111', 'b5a661fef070a530606f16726730134f', '47.', '8', '6'),
('1421024112', 'SUDARMONO', 'L', 'DS. BARENG RT. 01 RW', '1', '1', 'DS. BARENG', 'KEC. NGASEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085334872622', '-', 'ISLAM', 'GEOLOGI PERTAMBANGAN', '2014', 'DAMIN', 'PUJI RAHAYU', '-', '-', 'PETANI', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '26/03/1995', '-', '-', 'SMK NEGERI NGASEM', 'BOJONEGORO', 'g1', 'aktif', '1421024112', '98ee491953d08ae3750d0a547afdc31f', '25.', '6.5', '4'),
('1421024113', 'SUSI WIJIANI', '', 'DS. SEMEN PINGGIR RT', '3', '2', 'DS. SEMEN PINGGIR', 'KEC. KAPAS', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'MULTIMEDIA', '2014', 'SUHADAK', 'ERNA SUSILOWATI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '28/12/1995', '-', '-', 'SMK TARUNA BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024113', '3286b929b053a05bcd69608f2022cd45', '29.', '7.4', '4'),
('1421024114', 'TRI NANDA SATRIO PURNOMO', 'L', 'JL. KEDAWUNG 8d NO. ', ' -', ' -', 'DS. TULUSREJO', 'KEC. LOWOKWARU', 'KAB. MALANG', '65141', 'JAWA TIMUR', '08179603925', '-', 'ISLAM', 'DESIGN PRODUK KAYU', '2014', 'AGUS PURNOMO', 'DEWI RAHMAYANI', '-', '-', 'SATPAM', 'IBU RUMAH ', '1500000', '-', 'MALANG', '30/09/1995', '-', '-', 'SMK NEGERI 5 MALANG', 'MALANG', 'g1', 'aktif', '1421024114', 'd42a4c3874f305168acdfbf79a4d35dd', '-', '-', '-'),
('1421024115', 'ABDUL ROKHIM', 'L', 'DS. PILANGSARI RT. 1', '12', '4', 'DS. PILANGSARI', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '-', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'ZAENI', 'SITI ROHMAH', '-', '-', 'TANI', 'TANI ', '1500000', '-', 'BOJONEGORO', '13/05/1995', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024115', 'bfe630409c4bd1c7c0125db267b09ab3', '28.', '7.1', '4'),
('1421024116', 'ALFIA NOVIANTARI', '', 'DS. SUMURAGUNG RT. 1', '12', '4', 'DS. SUMURAGUNG', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '085648973769', '-', 'ISLAM', 'IPS', '2014', 'KUSMAN HADI', 'SITI ZAHROH', '-', '-', '-', '-', '1000000', '-', 'BOJONEGORO', '08/10/1996', '-', '-', 'MA MUHAMMADIYAH 01 S', 'BOJONEGORO', 'g1', 'aktif', '1421024116', '0c81273347d97a96c1b9a304de988033', '-', '7.1', '6'),
('1421024117', 'ANGGA DEDY HARTANTO', 'L', 'DSN. GEMPOL RT. 04 R', '4', '4', 'DS. TUMBRASANOM', 'KEC. KEDUNGADEM', 'KAB. BOJONEGORO', '61295', 'JAWA TIMUR', '085749143552', '-', 'ISLAM', 'IPA', '2014', 'BUDIONO', 'SRI HARTATIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '03/12/1996', '-', '-', 'SMA NEGERI 1 KEDUNGA', 'BOJONEGORO', 'g1', 'aktif', '1421024117', 'dd6e309126bc43f07caec277fe8f85da', '47.', '7.9', '6'),
('1421024118', 'ANIV ASRIAH', '', 'DK. PRAJEKAN RT. 19 ', '19', '4', 'DS. JELU', 'KEC. NGASEM', 'KAB. BOJONEGORO', '62154', 'JAWA TIMUR', '085733762611', '-', 'ISLAM', 'IPA', '2014', 'SUJI', 'LISPIANI', ' -', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '17/08/1995', '-', '-', 'SMA NEGERI 1 KALITID', 'BOJONEGORO', 'g1', 'aktif', '1421024118', 'fbb6ae88051e71baad26132681273c57', '44.', '7.4', '6'),
('1421024120', 'DESI NOURMA ALFIANI', '', 'DS. GUNUNGSARI RT. 0', '9', '3', 'DS. GUNUNGSARI', 'KEC. BAURENO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085608519612', '-', 'ISLAM', 'IPS', '2014', 'TRISNO', 'NUR HAYATI', '-', '-', 'PNS', 'IBU RUMAH ', '2500000', '-', 'BOJONEGORO', '20/12/1995', '-', '-', 'MA ISLAMIYAH AT-TANW', 'BOJONEGORO', 'g1', 'aktif', '1421024120', 'a748115ac5ff21f41d7fe938290c305c', '47', '7.8', '6'),
('1421024122', 'EKA FITRIANA', '', 'DK. KEKET DS. DRAJAT', ' -', ' -', 'DS. DRAJAT', 'KEC. BAURENO', 'KAB. BOJONEGORO', '62192', 'JAWA TIMUR', '085733242744', '-', 'ISLAM', 'IPA', '2014', 'SUYOTO', 'MAS''AMAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '22/02/1996', '-', '-', 'MA MUHAMMADIYAH 2 BA', 'BOJONEGORO', 'g2', 'aktif', '1421024122', '81fc53dcd88995d1229e317b343609b1', '49', '8.2', '6'),
('1421024123', 'HADI SUPRAPTO', 'L', 'DS. BENDO DK. SANTRE', ' -', ' -', 'DS. BENDO', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', '085259903207', '-', 'ISLAM', 'TEKNIK ELEKTRONIKA I', '2014', 'MUH. KANIP', 'YAYUK', '-', '-', 'BURUH TANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '06/04/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024123', '383476ae15fdbabf72aa99f6f665d685', '31.', '7.9', '4'),
('1421024124', 'HENDRI DWI PURWANTO', 'L', 'DS. RAHAYU KEC. SOKO', '1', '5', 'DS. RAHAYU', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', '081332467406', '-', 'ISLAM', 'IPS', '2014', 'SUYITNO', 'KARTINI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '23/10/1995', '-', '-', 'SMA NEGERI 1 BALEN', 'BOJONEGORO', 'g1', 'aktif', '1421024124', '709ba97177a7a77e9349268c6a4eda81', '-', '-', '6'),
('1421024126', 'KUKUH WAHYU AJI', 'L', 'DS. BUTOH RT. 008 RW', '8', '2', 'DS. BUTOH', 'KEC. NGASEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '082335346343', '-', 'ISLAM', 'TEKNIK INSTALASI LIS', '2014', 'SUSILO BUDI KUNCORO', 'RINI ASTUTIK', '-', '-', 'PEDAGANG', 'PEDAGANG', '1500000', '-', 'BOJONEGORO', '26/09/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024126', '0a7daeb00db0c8dcd8d2feb6d92121b4', '33.', '8.2', '4'),
('1421024127', 'MEY PETRINA', '', 'DS. BANJARSARI RT. 2', '28', '5', 'DS. BANJARSARI', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '085748173814', '-', 'ISLAM', 'IPA', '2014', 'DJAENURI', 'RUM INDAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '28/05/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024127', '50e1152792ddb2054d35027db607bb2e', '45.', '7.6', '6'),
('1421024128', 'MOCH. FAHRUL HARTANTO', 'L', 'DS. NGANTRU RT. 09 R', '9', '1', 'DS. NGANTRU', 'KEC. NGASEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085707476745', '-', 'ISLAM', 'GEOLOGI PERTAMBANGAN', '2014', 'PARDI', 'WARTI ATUN', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '14/09/1994', '-', '-', 'SMK NEGERI NGASEM', 'BOJONEGORO', 'g1', 'aktif', '1421024128', 'ad275b137a5f24cb4751d357131b2fa3', '28.', '7.1', '4'),
('1421024129', 'MUHAMAD HENDRA FEBIAWAN', 'L', 'DS. KALITIDU NO. 264', '7', '1', 'DS. KALITIDU', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '08973955153', '-', 'ISLAM', 'IPA', '2014', 'SUPRAPTO', 'SITI REKIANINGRUM', '-', '-', 'SWASTA', 'PEGAWAI TI', '1000000', '-', 'BOJONEGORO', '29/02/1996', '-', '-', 'SMA NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024129', 'd04705a7bc47a8da46db9e78d8f85b04', '-', '-', '6'),
('1421024130', 'MUHAMMAD PRIYONO', 'L', 'DS. KABALAN RT. 02 R', '2', '2', 'DS. KABALAN', 'KEC. KANOR', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085784763992', '-', 'ISLAM', 'IPS', '2014', 'TURLAN', 'MUJIDAH', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '15/07/1985', '-', '-', 'MA ISLAMIYAH AT-TANW', 'BOJONEGORO', 'g1', 'aktif', '1421024130', '7190f6bdf67c8f173a54e85a82e5929f', '-', '-', '-'),
('1421024131', 'NIKE NOVITA SARI ', '', 'DS. PUNGGUR KEC. PUR', ' -', ' -', 'DS. PUNGGUR', 'KEC. PURWOSARI', 'KAB. BOJONEGORO', '62161', 'JAWA TIMUR', '085648202484', '-', 'ISLAM', 'IPS', '2014', 'SUTARDJO', 'PARMI', ' -', '-', 'PLN', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '30/11/1995', '-', '-', 'SMA NEGERI 1 PADANGA', 'BOJONEGORO', 'g1', 'aktif', '1421024131', '0b019f609e3a327b40864af92f5cc6b6', '-', '-', '-'),
('1421024132', 'NUKING DIWATAWI MUHAMMAD', 'L', 'JL. PANGLIMA POLIM P', '22', '7', 'DS. PACUL', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '089677981848', '-', 'ISLAM', 'IPS', '2014', 'SUDIYATMIKO', 'INDARWATI', '-', '-', 'WIRASWASTA', 'PNS', '3500000', '-', 'MADIUN', '22/01/1996', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024132', '85e4d3b95add2c451e18a667e3304ddc', '49.', '8.2', '6'),
('1421024133', 'OKTA MUJI SETIAWAN', 'L', 'JL. MUNGINSIDI DS. S', ' -', ' -', 'DS. SEMBUNG', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', '081553069390', '-', 'ISLAM', 'IPS', '2014', 'DJOKO SETIO BUDI', 'MUNJIAH', '-', '-', 'TNI AD', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '06/10/1998', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024133', '5d730cff16322be8dfed74b947bb79ad', '43.', '7.3', '6'),
('1421024136', 'SITI MAULINDA MUSLIHAH', '', 'DS. SEKAR RT. 03 RW.', '3', '7', 'DS. SEKAR', 'KEC. SEKAR', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085607011995', '-', 'ISLAM', 'IPS', '2014', 'SUWANTAH', 'SUNDARI', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '18/05/1997', '-', '-', 'MA AL-ROSYID DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024136', 'c34acd96fcd0f0cfafd1c9dd8bc4735f', '41.', '6.9', '6'),
('1421024138', 'TRI WIBOWO', 'L', 'DS. NGRINGINREJO RT.', '10', '5', 'DS. NGRINGINREJO', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '08996362972', '-', 'ISLAM', 'TEKNIK SURVEY PEMETA', '2014', 'SUWARNO', 'SUMIYATI', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '16/11/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024138', '78327457fa4a200ff11efa3c3a69344a', '30.', '7.6', '4'),
('1421024139', 'TSUBBAT AL-ABID', 'L', 'JL. GAJAH MADA NO. 1', '4', '2', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '085704722736', '-', 'ISLAM', 'IPS', '2014', 'ANAS YUSUF', 'MASKANAH', '-', '-', 'GURU', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '11/09/1996', '-', '-', 'MA NEGERI JOMBANG', 'JOMBANG', 'g1', 'aktif', '1421024139', '9350e6ffdec9a4f06230f9cae28bb6c5', '-', '-', '6'),
('1421024141', 'VIRDAUS PRYA MUHAMMAD', 'L', 'DS. TALOK RT. 06 RW.', '6', '3', 'DS. TALOK', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085736496211', '-', 'ISLAM', 'IPS', '2014', 'MASDUKI', 'SURYANI', '-', '-', 'PNS', 'WIRASWASTA', '3500000', '-', 'BOJONEGORO', '11/10/1996', '-', '-', 'SMA 1 DARUL ULUM JOM', 'JOMBANG', 'g1', 'aktif', '1421024141', '6288dc6e2f3817186b089179936f4410', '48.', '8.1', '6'),
('1421024142', 'WAHYU BAGAS SAPUTRA', 'L', 'DS. CANCUNG KEC. BUB', ' -', ' -', 'DS. CANCUNG', 'KEC. BUBULAN', 'KAB. BOJONEGORO', '62172', 'JAWA TIMUR', ' -', '-', 'ISLAM', 'IPA', '2014', 'MAIDI', 'SARMINI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '04/05/1996', '-', '-', 'SMA NEGERI 1 BUBULAN', 'BOJONEGORO', 'g1', 'aktif', '1421024142', 'c63f1493e5c5f6246cdf5cb5fc75c257', '43.', '7.2', '6');
INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jk`, `jalan`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `kode_pos`, `provinsi`, `phone`, `gol_darah`, `agama`, `jurusan_asal`, `tahun_masuk`, `ayah`, `ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `kota_lahir`, `tanggal_lahir`, `anak_ke`, `jumlah_anak`, `asal_sekolah`, `kota_sekolah`, `gelombang`, `status`, `username`, `password`, `nilai_stl`, `nilai_rstl`, `jumlah_mp`) VALUES
('1421024143', 'WIDYA DWI TRISTINA ', '', 'DS. KEDUNG ADEM RT/R', '3', '6', 'DS. KEDUNGADEM ', 'KEC .KEDUNGADEM ', 'KAB. BOJONEGORO', '62195', 'JAWA TIMUR', '''085732161255', '-', 'ISLAM', 'IPA ', '2014', 'SITRIS ', 'MUNASRI ', '-', '-', 'WIRASWASTA', 'KARYAWATI ', '1500000', '-', 'BOJONEGORO', '06/05/1996', '-', '-', 'MA NEGERI 1 BOJOEGOR', 'BOJONEGORO', 'g1', 'aktif', '1421024143', '25a48575b6adcf070055a388b035db5d', '8.3', '7', '6'),
('1421024144', 'ABDUL GHONI', 'L', 'DS. SIDOMUKTI RT. 05', '5', '1', 'DS. SIDOMUKTI', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62194', 'JAWA TIMUR', '085706911905', '-', 'ISLAM', 'IPS', '2014', 'SUROSO', 'SULASTRI', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '16/11/1996', '-', '-', 'MA NEGERI BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024144', '945c389adde55ef162ddf781633ae5ed', '47.', '7.9', '6'),
('1421024145', 'ADHIKA KURNIA FEBRIANTO', 'L', 'JL. LETTU SUYITNO NO', ' -', ' -', 'DS. BANJAREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62118', 'JAWA TIMUR', '085784930676', '-', 'ISLAM', 'IPA', '2014', 'ABDUL WAKHID', 'SOEKIWATI', '-', '-', 'PNS', 'KARYAWAN S', '1500000', '-', 'BOJONEGORO', '02/02/1995', '-', '-', 'SMA NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024145', '2d388ec9f2d10ae4137d67b0f88cf993', '49.', '8.2', '6'),
('1421024146', 'AHMAD KHOIRI', 'L', 'DS. BAKULAN RT. 04 R', '4', '1', 'DS. BAKULAN', 'KEC. TEMAYANG', 'KAB. BOJONEGORO', '62184', 'JAWA TIMUR', '085748276791', '-', 'ISLAM', 'IPA', '2014', 'KARSIT', 'SUMILAH', '-', '-', 'TANI', 'TANI', '1000000', '-', 'BOJONEGORO', '22/11/1996', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024146', 'bbc480a6ab0d057135a225568c50b022', '48.', '8', '6'),
('1421024147', 'AHMAD MUHAJIRUL FAQIH', 'L', 'DSN. ALASTUWO RT. 06', '6', '2', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', '085608378272', '-', 'ISLAM', 'TEKNIK OTOMOTIF', '2014', 'NYAKIRAN', 'UMIATI', '-', '-', 'PETANI', 'PETANI', '1500000', '-', 'TUBAN', '24/03/1996', '-', '-', 'SMK NEGERI 1 TUBAN', 'TUBAN', 'g1', 'aktif', '1421024147', '585c009f76ef420eea37b6905d4ce8c2', '34.', '9.7', '4'),
('1421024148', 'AJENG AYRESTA SAKTI', '', 'JL. PEMUDA TIMUR DS.', '1', '1', 'DS. NGAMPEL', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62119', 'JAWA TIMUR', '085755272202', '-', 'ISLAM', 'AKOMODASI PERHOTELAN', '2014', 'DODDY SOEGIHARTO', 'TRI WAHYUNINGSIH', '-', '-', 'GURU (PNS)', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '23/03/1996', '-', '-', 'SMK NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024148', '2e57828a481a4f708ccbc1a20dec3efa', '28.', '7.1', '4'),
('1421024149', 'BEN JECKSON TAMPUBOLON', 'L', 'DS. PANJUNAN RT. 03 ', '3', '1', 'DS. PANJUNAN', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085749469291', '-', 'KRISTEN', 'IPA', '2014', 'SONTANG TAMPUBOLON', 'MAYA SIMANJORANG', '-', '-', 'WIRASWASTA', 'WIRASWASTA', '1000000', '-', 'TEGAL', '28/12/1995', '-', '-', 'SMA NEGERI 1 KALITID', 'BOJONEGORO', 'g2', 'aktif', '1421024149', 'df83f9db44772d06bc373749681a38e5', '47.', '7.9', '6'),
('1421024151', 'FAJAR INDRA PRATAMA', 'L', 'DS. MARGOAGUNG KEC. ', ' -', ' -', 'DS. MARGOAGUNG', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '08563015122', '-', 'ISLAM', 'OTOMOTIF', '2014', 'SUPRAYITNO', 'INDARTIK', '-', '-', 'PETANI', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '09/06/1993', '-', '-', 'SMK NEGERI 3 MATARAM', 'NTT', 'g1', 'aktif', '1421024151', '797625b4d78a24ae112323231349205e', '-', '-', '4'),
('1421024152', 'FIRDAUS WIJAYA KUSUMA', 'L', 'DS. KALANGAN RT. 08 ', '8', '2', 'DS. KALANGAN', 'KEC. PADANGAN', 'KAB. BOJONEGORO', '62162', 'JAWA TIMUR', '08991250977', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'MOCH. ALI SUN''AN', 'DEDEH', '-', '-', 'WIRASWASTA', ' -', '1000000', '-', 'TANGGERANG', '06/12/1995', '-', '-', 'SMK NEGERI NGRAHO', 'BOJONEGORO', 'g1', 'aktif', '1421024152', 'c535b2af86007a10edf0e1549aca8a8e', '28', '7', '4'),
('1421024153', 'FREDO VALE YUDHA UGHAY', 'L', 'PERUMDA BLOK U/18 BO', '-', '-', '-', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', '082139674836', '-', 'ISLAM', 'IPA', '2014', 'MAHFUD', 'SITI SUNDARI', '-', '-', 'PNS', 'PNS', '2500000', '-', 'BOJONEGORO', '15/02/1993', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024153', 'c82a14236a3ea0eb245042391f853ebf', '-', '-', '-'),
('1421024154', 'INDAH AGUSTINE ARIFIN', '', 'JL. DR. SUTOMO NO. 2', ' -', ' -', 'DS. SUMBANG', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '-', '-', 'ISLAM', 'IPS', '2014', '-', '-', '-', '-', '-', '-', '-', '-', 'BOJONEGORO', '23/08/1995', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024154', '9199dee67938147be039a22016fde349', '48.', '8.2', '6'),
('1421024155', 'ISNA KHOIRIYAH', '', 'DS. WADANG RT. 14 RW', '14', '3', 'DS. WADANG', 'KEC. NGASEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085785708027', '-', 'ISLAM', 'BAHASA', '2014', 'AHMAD ALI', 'NGATRI', '-', '-', 'PETANI', 'PETANI', '1500000', '-', 'BOJONEGORO', '23/08/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024155', '3c26afaee3ae5fe25674aa1482b18d0c', '47', '7.8', '6'),
('1421024156', 'ISTIANA SINTA DEWI', '', 'JL. MANGGA SOLANANG ', '9', '2', 'DS. CAMPUREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '087853106114', '-', 'ISLAM', 'IPS', '2014', 'MARDIONO', 'SUPRIHATIN', '-', '-', 'PNS', 'IBU RUMAH ', '2000000', '-', 'BOJONEGORO', '08/08/1995', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024156', '89d99f484dd36e79e3f0f546f13d5747', '-', '-', '6'),
('1421024158', 'LULUK ISMIATI ', '', 'DS. KENEP RT.17 RW.0', '17', '3', 'DS. KENEP', 'KEC. BALEN ', 'KAB. BOJONEGORO', '62182', 'JAWA TIMUR', '085730708393', '-', 'ISLAM', 'IPA ', '2014', 'SUMANTRI ', 'MUKIRAH ', '-', '-', 'TANI ', 'TANI ', '1000000', '-', 'BOJONEGORO', '04/03/1996', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024158', '676fccda8d2eb39bda86b6c9b89f1af2', '50.', '8.4', '6'),
('1421024159', 'M. IRFAN ALI HASAN', 'L', 'KEPEL DS. BRENGGOLO ', ' -', ' -', 'DS. BRENGGOLO', 'KEC. KALITIDU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '089669790498', '-', 'ISLAM', 'IPS', '2014', 'ISMAIL', 'INSOFIAH', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '29/09/1995', '-', '-', 'SMA NEGERI 1 KALITID', 'BOJONEGORO', 'g1', 'aktif', '1421024159', 'b6d401ef42d8cd1721055644a7373f48', '45.', '7.6', '6'),
('1421024160', 'M. IRHAM NASHRULLOH', 'L', 'DS. KACANGAN RT. 09 ', '9', '2', 'DS. KACANGAN', 'KEC. TAMBAKREJO', 'KAB. BOJONEGORO', '62166', 'JAWA TIMUR', '085655148511', '-', 'ISLAM', 'IPA', '2014', 'YOTO', 'SRI HARTINI', '-', '-', 'PNS (GURU)', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '11/04/1995', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024160', '09278bc7111c966d92e611093adb2775', '52.', '8.8', '6'),
('1421024161', 'M.ELFA RODHIAN PUTRA', 'L', 'DS.TRUCUK RT.14 RW.0', '14', '2', 'DS.TRUCUK', 'KEC.TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', '085730185250', '-', 'ISLAM', 'GEOLOGI PERTAMBANGAN', '2014', 'MEINARTO', 'SRI REJEKI', '-', '-', 'SWASTA', 'PNS', '3500000', '-', 'BOJONEGORO', '25/03/1996', '-', '-', 'SMKN 4 BOJONEGORO', 'BOJONEGORO', 'g1', 'aktif', '1421024161', '1da10616b8f718d47a1780b87c23167a', '36.', '9.2', '4'),
('1421024162', 'MOCH. RIZHA SETYAWAN', 'L', 'DS. MAYANGREJO DSN. ', '13', '7', 'DS. MAYANGREJO', 'KEC. KALITIDU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085730468211', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'MURIYANTO', 'SUHARTIK', '-', '-', 'SWASTA', ' -', '1500000', '-', 'BOJONEGORO', '15/12/1995', '-', '-', 'SMK SIANG 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024162', '32dbffabd384fa18e0bba439337a0586', '-', '-', '4'),
('1421024163', 'MUHAMMAD MALIK ABDUL AZIS', 'L', 'DS. NGULANAN RT. 01 ', '1', '1', 'DS. NGULANAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085731751389', '-', 'ISLAM', 'TEKNIK ELEKTRONIKA I', '2014', 'MUSTAIN', 'KARSIYAH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '2500000', '-', 'BOJONEGORO', '10/03/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024163', '3de5359a61d0f32d4541cb15ef4d9e3c', '30.', '7.7', '4'),
('1421024164', 'MUHAMMAD MIFTAHUL JANNAH', 'L', 'DS. BARENG KEC. NGAS', ' -', ' -', 'DS. BARENG', 'KEC. NGASEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085648364464', '-', 'ISLAM', 'REKAYASA PERANGKAT L', '2014', 'MOH. SUGHNAN', 'MARIYATON', '-', '-', 'PETANI', 'PETANI', '1000000', '-', 'BOJONEGORO', '09/08/1996', '-', '-', 'SMK NEGERI NGASEM', 'BOJONEGORO', 'g1', 'aktif', '1421024164', '09f5933ff356106559c705a85c301430', '22.', '5.6', '4'),
('1421024165', 'OKI PRASETYO NUGROHO', 'L', 'DS. MARGOAGUNG KEC. ', ' -', ' -', 'DS. MARGOAGUNG', 'KEC. SUMBERREJO', 'KAB. BOJONEGORO', '62191', 'JAWA TIMUR', '083831179621', '-', 'ISLAM', 'IPS', '2014', 'WARSITO', 'SRI ROHANI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '07/06/1996', '-', '-', 'SMA NEGERI 1 BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024165', '439920a04139b7138f59fd483677d9a7', '45.', '7.5', '6'),
('1421024168', 'SUTRISNO', 'L', 'DS. KOLONG RT. 01 RW', '1', '1', 'DS. KOLONG', 'KEC. NGASEM', 'KAB. BOJONEGORO', '62154', 'JAWA TIMUR', '08993898473', '-', 'KATOLIK', 'IPS', '2014', 'YADI (ALM)', 'MASRI', '-', '-', ' -', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '05/05/1994', '-', '-', 'SMA PGRI 1 NGASEM', 'BOJONEGORO', 'g1', 'aktif', '1421024168', '9dbb573b425e0211c8e7a0a192d421a2', '43.', '7.2', '6'),
('1421024170', 'YEYEN EKA SUSANTI', '', 'DK. BAYONG, DS. ALAS', '16', '5', 'DS. ALASGUNG', 'KEC. SUGIHWARAS', 'KAB. BOJONEGORO', '62183', 'JAWA TIMUR', '081555413154', '-', 'ISLAM', 'IPA', '2014', 'SUYOTO', 'TASLIN MATIN', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '28/06/1997', '-', '-', 'SMA NEGERI 1 SUGIHWA', 'BOJONEGORO', 'g1', 'aktif', '1421024170', '7657f2f127d9957f91df9e44f185acd3', '48.', '8.1', '6'),
('1421024171', 'YULI SHOLIHATUTS TSANI ', '', 'DS. GUNUNGSARI RT. 1', '12', '3', 'DS .GUNUNG SARI ', 'KEC. BAURENO', 'KAB. BOJONEGORO', '62192', 'JAWA TIMUR', '085748089783', '-', 'ISLAM', 'IPA ', '2014', 'EDY WIGYANTO', 'SUNARTI ', '-', '-', 'GURU/PNS ', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '14/07/1995', '-', '-', 'SMA EMPAT LIMA 1 BAB', 'BOJONEGORO', 'g1', 'aktif', '1421024171', 'fa48312dd3b2744434359fced6d9d163', '41.', '-', '6'),
('1421024172', 'ACHMAD FAHRIZAL BUSTOMI', 'L', 'JL. GAJAH MADA Gg. S', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', '082132446455', '-', 'ISLAM', 'TEKNIK KOMPUTER DAN ', '2014', 'HERI SISWANTO', 'NUR AROFAH', ' -', '-', 'PNS', ' -', '3500000', '-', 'BOJONEGORO', '19/04/1996', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024172', '5489afea437e4bc926229f049dd009d2', ' -', ' -', ' -'),
('1421024173', 'ADINDA NUR FIRDIYANI WATI', '', 'JL. MAHONI SELATAN 9', ' -', ' -', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085607896611', '-', 'ISLAM', 'IPS', '2014', 'SUYONO', 'SUSILOWATI', '-', '-', 'SWASTA', 'WIRAUSAHA', '2000000', '-', 'KUTAI', '09/08/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024173', '7cabb92849e6af1a81a50f57931f0aac', '-', '-', '6'),
('1421024175', 'AKRIMA BUNGA YUNIA RIZKY', '', 'DS. MOJOMALANG RT. 0', '4', '3', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', '085259953309', '-', 'ISLAM', 'IPA', '2014', 'MAT FAQIH', 'MUNTIASIH', '-', '-', 'WIRASWASTA', 'BURUH', '1500000', '-', 'TUBAN', '30/06/1996', '-', '-', 'MA NEGERI 2 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024175', 'a860dbe8e948cd99f8382dcd0c4deedb', '-', '-', '6'),
('1421024176', 'BAMBANG TRI HANDIKA', 'L', 'DK. KARANG ANYAR DS.', '1', '5', 'DS. KASIMAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', '085782883970', '-', 'ISLAM', 'IPA', '2014', 'YUSMONO', 'MARYUNI', '-', '-', 'KARYAWAN S', 'IBU RUMAH ', '2000000', '-', 'BOJONEGORO', '07/07/1996', '-', '-', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', 'g1', 'aktif', '1421024176', '7df22443d879bf6ac6d26666d61bbb35', '-', '-', '-'),
('1421024177', 'BENY RHAMDANI', 'L', 'DS. NGUNUT KEC. DAND', '-', '-', 'DS. NGUNUT', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '081938106060', '-', 'ISLAM', 'IPS', '2014', 'GATOT SUPRAYITNO', 'SUMINI', '-', '-', 'POLISI', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '08/02/1997', '-', '-', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 'g1', 'aktif', '1421024177', 'b2ce9f089922cab6643e54a0852497db', '7.6', '7', '6'),
('1421024178', 'BETHA YOGA ASMARA ADHY P.', 'L', 'DS. KEPOH KIDUL RT.0', '2', '4', 'DS. KEPOH KIDUL', 'KEC. KEDUNG ADEM ', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', '085730150558', '-', 'ISLAM', 'IPA', '2014', 'SURATNO ', 'SRIMURTI', '-', '-', 'PETANI', 'PETANI ', '2000000', '-', 'BOJONEGORO', '22/05/1996', '-', '-', '-', '-', 'g2', 'aktif', '1421024178', 'ef79636451c755a0257ee93d88eaa3c2', '45.', '7.6', '6'),
('1421024179', 'CHOIRUL FATIKHIN', 'L', 'DS. SUMODIKARAN RT. ', '2', '2', 'DS. SUMODIKARAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085730018562', '-', 'ISLAM', 'IPS', '2014', 'SUPAAT (ALM)', 'SYARI'' ATIN', '-', '-', '-', 'PETANI', '1000000', '-', 'BOJONEGORO', '19/05/1996', '-', '-', 'MA AL-ROSYID', 'BOJONEGORO', 'g1', 'aktif', '1421024179', 'a28f45f4073cefdc1addd55afe5442f8', '-', '-', '-'),
('1421024180', 'DEVI MARLINA SAFITRI', '', 'DK. BANDAR DS. BATOK', '24', '4', 'DS. BATOKAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', '08974479686', '-', 'ISLAM', 'AKUNTANSI', '2014', 'SAMIRAN', 'SUGINEM', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '02/03/1996', '-', '-', 'SMK NEGERI 1 CEPU', 'CEPU', 'g1', 'aktif', '1421024180', '1cccaa9d39105e3ec4c1114f2c5a103b', '60.', '7.8', '4'),
('1421024181', 'DEWI PUSPITASARI', '', 'DS. SUMUR CINDE RT. ', '3', '3', 'DS. SUMURCINDE', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', '085706613651', '-', 'ISLAM', 'IPA', '2014', 'SUYITNO (ALM)', 'SRIYATUN', '-', '-', ' -', 'IBU RUMAH ', '1000000', '-', 'TUBAN', '06/02/1996', '-', '-', 'SMA NEGERI 4 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024181', '18e0e74aff8f1c8c638f7e6f23d70860', '-', '-', '-'),
('1421024182', 'DYAH AYU MUSTIKANINGRUM', '', 'DS. JATIKLABANG KEC.', ' -', ' -', 'DS. JATIKLABANG', 'KEC. JATIROGO', 'KAB. TUBAN', '62362', 'JAWA TIMUR', '-', '-', 'ISLAM', 'IPS', '2014', 'SUPRIYARKO', 'SULIKAH', '-', '-', 'PNS', ' -', '3500000', '-', 'TUBAN', '17/11/1995', '-', '-', 'SMA NEGERI 1 JATIROG', 'TUBAN', 'g1', 'aktif', '1421024182', '92eabba6495b36fc4fc603caa0122d26', '43.', '7.2', '6'),
('1421024183', 'EKO IRIANTO', 'L', 'DS. MOJORANU RT. 16 ', '16', '5', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', '085790483988', '-', 'ISLAM', 'IPS', '2014', 'JAMARI', 'ERNI SETYANINGSIH', '-', '-', 'TNI ', 'IBU RUMAH ', '3500000', '-', 'SENTANI', '27/04/1992', '-', '-', 'SMA NEGERI 3 JOMBANG', 'BOJONEGORO', 'g1', 'aktif', '1421024183', 'c89893f56dbd12ea9090b6e621180dcf', '48.', '8.1', '6'),
('1421024184', 'EKO PRASETYO KURNIAWAN', 'L', 'JL. SERMA ABDULLAH 1', '6', '1', 'DS. PACUL ', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', '085259682307', '-', 'ISLAM', 'TKJ', '2014', 'BAMBANG PURNOMO', 'SITI KOESTINI', '-', '-', 'PENSIUNAN ', 'GURU/PNS', '2000000', '-', 'BOJONEGORO', '23/04/1996', '-', '-', 'SMK PGRI 1 BOJONEGOR', 'BOJONEGORO', 'g1', 'aktif', '1421024184', 'f7a17da8109a4245c528874f81126343', '31.', '-', '4'),
('1421024186', 'HADI ISMA SURYADI', 'L', 'DSn. KEDUNG PANDAN D', ' -', ' -', 'DS. KESONGO', 'KEC. KEDUNGADEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085731591391', '-', 'ISLAM', 'IPA', '2014', 'SARNO', 'PATEMI', '-', '-', 'PETANI', 'PETANI', '1500000', '-', 'BOJONEGORO', '13/03/1996', '-', '-', 'SMA NEGERI 1 KEDUNGA', 'BOJONEGORO', 'g1', 'aktif', '1421024186', 'e8e5b84f2c0454235cc8b9e0f3c83f6f', '45', '7.5', '6'),
('1421024187', 'INGGRIT ARIMBI SAPUTRI', '', 'JL. MONGINSIDI DS. P', '16', '3', 'DS. PACUL', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', '085730458479', '-', 'ISLAM', 'IPS', '2014', 'SUDARTO', 'SITI FATONAH', '-', '-', 'TNI-AD', 'IBU RUMAH ', '3500000', '-', 'SORONG', '26/04/1996', '-', '-', 'MA NEGERI 1 BOJONEGO', 'BOJONEGORO', 'g1', 'aktif', '1421024187', '98a69c2834be64f9ad17c375deb18fbe', '45', '7.5', '6'),
('1421024188', 'IRFAN ANDIK ANDRIANTO', 'L', 'DS. SUGIHWARAS KEC. ', '-', '-', 'DS. SUGIHWARAS', 'KEC. PARENGAN', 'KAB. TUBAN', '62366', 'JAWA TIMUR', '085655014344', '-', 'ISLAM', 'TEKNIK PERMESINAN ', '2014', 'SUNARTO', 'KHOIRIYAH', '-', '-', 'WIRASWASTA', '-', '2500000', '-', 'TUBAN ', '09/04/1996', '-', '-', 'SMK NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024188', '9b9ad56bb3bd99d439e78a0e793e20d6', '33.', '8.4', '4'),
('1421024189', 'JEPRI DWI PRASETYO', 'L', 'DS. NGUJUNG KEC. TEM', '-', '-', 'DS. NGUJUNG', 'KEC. TEMAYANG', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', '085645595969', '-', 'ISLAM', 'IPA', '2014', 'HADI SUSANTO', 'YASRI LESTARI', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO', '30/03/1996', '-', '-', 'SMA NEGERI 1 SUGIHWA', 'BOJONEGORO', 'g1', 'aktif', '1421024189', 'a1179446960648233a77cd04c412f95b', '47.', '7.9', '6'),
('1421024190', 'M. DUWI AGUS HERMAWAN', 'L', 'Dsn. KALIPAN RT. 005', '5', '5', 'DS. DUYUNGAN', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', '085704719200', '-', 'ISLAM', 'IPS', '2014', 'MUNTOHIR', 'SITI HERI ASIH', '-', '-', 'WIRASWASTA', 'SWASTA', '-', '-', 'BOJONEGORO', '05/09/1995', '-', '-', 'SMA NEGERI 1 KALITID', 'BOJONEGORO', 'g1', 'aktif', '1421024190', '8cf6061750467566d0bcd062a2bb2e88', '-', '7.6', '6'),
('1421024191', 'M. SYAIFUL AZIZ B.', 'L', 'DS. WEDI RT. 04 RW. ', '4', '1', 'DS. WEDI', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', '089677445175', '-', 'ISLAM', 'TEI', '2014', 'M. SAHER', 'SITI MUSYAROFAH', '-', '-', 'TANI', 'WIRASWASTA', '1000000', '-', 'BOJONEGORO', '19/12/1995', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024191', 'c9ac7717b1d25aad8da5a416dba8f406', '32.', '-', '4'),
('1421024192', 'MAFNI SILA AKTORI', 'L', 'DS. GUYANGAN RT. 02 ', '2', '1', 'DS. GUYANGAN', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', '087856050499', '-', 'ISLAM', 'TEKNIK KENDARAAN RIN', '2014', 'MA''RUF', 'YUNI ASTUTIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'BOJONEGORO', '05/10/1996', '-', '-', 'SMK NEGERI 3 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024192', 'e4a915084ebbb5d9cb7f85962f3e275f', '34.', '8.7', '4'),
('1421024193', 'MA''RUFI SUADIAH', '', 'DS. WORO RT. 04 RW. ', '4', '2', 'DS. WORO', 'KEC. KEPOHBARU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085645167116', '-', 'ISLAM', 'ADMINISTRASI PERKANT', '2014', 'SUBIYANTO', 'MUFROTIN', '-', '-', 'GURU SWAST', 'PNS', '1500000', '-', 'BOJONEGORO', '10/09/1996', '-', '-', 'SMK NEGERI 1 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024193', '85d3d70d71a2eee84c8968eea1e715eb', '31.', '7.8', '4'),
('1421024194', 'MAUIDLOTUL MUDRIKAH', '', 'DK. TAWANG DS. PAYAM', '14', '4', 'DS. PAYAMAN', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', '085707268540', '-', 'ISLAM', 'IPA', '2014', 'KHOIRUN', 'MARFUAH', '-', '-', 'SWASTA', 'SWASTA', '2000000', '-', 'BOJONEGORO', '25/10/1997', '-', '-', 'MA NEGERI PADANGAN', 'BOJONEGORO', 'g1', 'aktif', '1421024194', '0630d2d74b74a521a0bb2a95eb39eb0d', '-', '-', '-'),
('1421024195', 'MOHAMMAD BAYU AINUL IQBAL', 'L', 'DK. BILO DS. PANGKAT', '-', '-', 'DS. PANGKATREJO', 'KEC.LAMONGAN', 'KAB. LAMONGAN', '-', 'JAWA TIMUR', '085733808970', '-', 'ISLAM', 'IPS', '2014', 'MOHAMMAD SARIPIN', 'ERWIN MUNAWAROH', '-', '-', 'GURU', 'IBU RUMAH ', '3500000', '-', 'LAMONGAN', '27/07/1996', '-', '-', 'SMA MUHAMMADIYAH 1 B', 'LAMONGAN', 'g1', 'aktif', '1421024195', 'ad93e498ce0ed4273647eed87725ab84', '-', '7.8', '6'),
('1421024196', 'NIHAYATUL KHUSNA', '', 'DSN. SAWAHAN RT. 03 ', '3', '1', 'DS. PRAMBONTERGAYANG', 'KEC. SOKO', 'KAB. TUBAN', '62372', 'JAWA TIMUR', '085707340092', '-', 'ISLAM', 'IPA', '2014', 'MUHALI', 'SUTI''AH', '-', '-', 'WIRASWASTA', 'IBU RUMAH ', '1000000', '-', 'TUBAN', '21/05/1996', '-', '-', 'SMA NEGERI 1 SOKO', 'TUBAN', 'g1', 'aktif', '1421024196', '39808193925c120d55142548e85c61b7', '-', '-', '-'),
('1421024198', 'NUR HARIYATI', '', 'DK. DONDONG DS. GEDO', '3', '1', 'DS. GEDONG ARUM ', 'KEC. KANOR ', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', '085732081075', '-', 'ISLAM', 'IPA', '2014', 'NOTOREJO', 'BAYATUN', '-', '-', 'TANI', 'IBU RUMAH ', '1500000', '-', 'BOJONEGORO ', '30/01/1997', '-', '-', 'SMA NEGERI 1 SUMBERR', 'BOJONEGORO', 'g1', 'aktif', '1421024198', '7f04f143d33a0664409b84f99912c831', '49.', '8.3', '6'),
('1421024199', 'NUR KHOZIN ', 'L', 'DS. GLONGGONG RT.06 ', '6', '2', 'DS. GLONGGONG', 'KEC. DANDER', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', '081939834007', '-', 'ISLAM', 'TEKNIK OTOMOTIF', '2014', 'HADI SUCIPTO', 'UMI SAROH', '-', '-', 'BURUH TANI', '-', '1000000', '-', 'BOJONEGORO ', '24/04/1995', '-', '-', 'SMK NEGERI DANDER ', 'BOJONEGORO', 'g1', 'aktif', '1421024199', '2c34f4ce2cb5413d5643f4b2421a464d', '-', '-', '-'),
('1421024200', 'TRI SANTIKO ANDI YAHYA', 'L', 'JL. KAPTEN RAMELI NO', '2', '3', 'DS. LEDOK KULON', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62112', 'JAWA TIMUR', '089663477032', '-', 'ISLAM', 'TEI', '2014', 'WAGONO', 'JUMIATI', '-', '-', 'KARYAWAN P', 'IBU RUMAH ', '3500000', '-', 'BOJONEGORO', '18/10/1995', '-', '-', 'SMK NEGERI 2 BOJONEG', 'BOJONEGORO', 'g1', 'aktif', '1421024200', '5ee6789f12fac5d76a5c57adc9044de2', '30.', '-', '4'),
('1421024201', 'FAHMI FIRDAUS  RAMADHAN', 'L', 'DS. DRAJAT KEC. BAUR', '-', '-', 'DS. DRAJAT', 'KEC. BAURENO', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', '087701094737', '-', 'ISLAM', 'IPS', '2014', 'KUNTARI', 'SUNARWIN', '-', '-', 'WIRASWASTA', 'PNS', '2000000', '-', 'BOJONEGORO', '13/02/1995', '-', '-', 'SMA NEGERI 1 BAURENO', 'BOJONEGORO', 'g1', 'aktif', '1421024201', '0aaba84e2892853f92086e98c6e5a037', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tata_usaha`
--

CREATE TABLE IF NOT EXISTS `tata_usaha` (
  `id_tu` varchar(20) NOT NULL,
  `nama_tu` varchar(30) NOT NULL,
  `tmpt_lahir` varchar(10) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `status_kepegawaian` enum('PNS','GTT','','') NOT NULL,
  `status_keanggotaan` enum('aktif','nonaktif','','') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tata_usaha`
--

INSERT INTO `tata_usaha` (`id_tu`, `nama_tu`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `pendidikan_akhir`, `status_kepegawaian`, `status_keanggotaan`, `alamat`, `hak_akses`, `username`, `password`) VALUES
('22', 'M. Efan Rodhian Putra', 'Bojonegoro', '24-03-1996', 'L', 'ISLAM', 'S2', 'PNS', 'aktif', 'Trucuk', 'akses005', 'elfan', '49544adf91fde81b4db43c9f4a2e6ebd');

-- --------------------------------------------------------

--
-- Table structure for table `upload_dosen`
--

CREATE TABLE IF NOT EXISTS `upload_dosen` (
  `id_upload` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_dosen` varchar(20) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `upload_mahasiswa` (
  `id_upload` varchar(50) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_tu`
--

CREATE TABLE IF NOT EXISTS `upload_tu` (
  `id_upload` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_tu` varchar(20) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id_gelombang`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `kategori_dosen`
--
ALTER TABLE `kategori_dosen`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_mahasiswa`
--
ALTER TABLE `kategori_mahasiswa`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_tu`
--
ALTER TABLE `kategori_tu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tata_usaha`
--
ALTER TABLE `tata_usaha`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `upload_dosen`
--
ALTER TABLE `upload_dosen`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `upload_mahasiswa`
--
ALTER TABLE `upload_mahasiswa`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `upload_tu`
--
ALTER TABLE `upload_tu`
  ADD PRIMARY KEY (`id_upload`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
