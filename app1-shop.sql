-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.21-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk klinik
CREATE DATABASE IF NOT EXISTS `klinik` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `klinik`;

-- membuang struktur untuk table klinik.barang_masuk
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.data_transaksi
CREATE TABLE IF NOT EXISTS `data_transaksi` (
  `id_trans` int(11) DEFAULT NULL,
  `no_rm` int(11) DEFAULT NULL,
  `nama_tindakan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(50) DEFAULT NULL,
  `no_telf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.mast_obat
CREATE TABLE IF NOT EXISTS `mast_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.mast_pasien
CREATE TABLE IF NOT EXISTS `mast_pasien` (
  `no_rm` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.mast_tindakan
CREATE TABLE IF NOT EXISTS `mast_tindakan` (
  `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tindakan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.order
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` int(11) DEFAULT NULL,
  `id_tindakan` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `tgl_trx` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `FK_order_mast_pasien` (`no_rm`),
  KEY `FK_order_tindakan` (`id_tindakan`),
  KEY `FK_order_mast_obat` (`id_obat`),
  CONSTRAINT `FK_order_mast_obat` FOREIGN KEY (`id_obat`) REFERENCES `mast_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_order_mast_pasien` FOREIGN KEY (`no_rm`) REFERENCES `mast_pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_order_tindakan` FOREIGN KEY (`id_tindakan`) REFERENCES `mast_tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.trans_obat
CREATE TABLE IF NOT EXISTS `trans_obat` (
  `id_trans` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `no_rm` int(11) DEFAULT NULL,
  `nama_px` varchar(50) DEFAULT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.trans_tindakan
CREATE TABLE IF NOT EXISTS `trans_tindakan` (
  `id_trans` varchar(50) NOT NULL DEFAULT '',
  `no_rm` int(11) DEFAULT NULL,
  `nama_px` varchar(50) DEFAULT NULL,
  `nama_tindakan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table klinik.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Pengeluaran data tidak dipilih.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
