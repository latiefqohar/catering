-- Adminer 4.4.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(100) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `tanggal_invoice` datetime NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bayar_invoice` datetime DEFAULT NULL,
  `status_invoice` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `invoice` (`id`, `no_invoice`, `id_perusahaan`, `periode`, `tanggal_invoice`, `jumlah`, `bayar_invoice`, `status_invoice`) VALUES
(8,	'INV/2001311515/2020',	1,	'01-2020',	'2020-01-31 15:15:18',	71000,	'2020-02-01 14:00:23',	'1');

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `diskon` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL DEFAULT 0,
  `id_transaksi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `keranjang` (`id`, `id_menu`, `jumlah`, `diskon`, `ongkir`, `status_bayar`, `id_transaksi`) VALUES
(3,	'3',	12,	3000,	14000,	1,	5),
(6,	'2',	1,	3000,	14000,	1,	5),
(7,	'2',	1,	0,	14000,	1,	6),
(8,	'3',	1,	0,	14000,	1,	6);

CREATE TABLE `kupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kupon` (`id`, `kode`, `jumlah`) VALUES
(2,	'makanseru',	140000);

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `nama`, `deskripsi`, `harga`, `foto`) VALUES
(1,	'Ayam Gepuk',	'Nasi, Ayam Gepuk, es teh manis',	12000,	'1.jpg'),
(2,	'Paket Pecel Ayam',	'Nasi, Ayam Goreng, Tahu,Tempe, Es Teh',	15000,	'2.jpg'),
(3,	'Ayam Bakar madu',	'1 Ekor Ayam Bakar dengan bumbu Maduku',	55000,	'Shoot.jpg'),
(4,	'Gurame Bakar',	'Nasi, Gurame, Sambel',	15000,	'4.jpg');

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat`, `kota`, `kode_pos`, `telpon`, `email`) VALUES
(1,	'PT. Maju Jaya',	'jalan raya serang no 100',	'Tangerang',	15802,	'0213456789',	'cs@majujaya.com'),
(2,	'Maurine.Will12',	'In quae at deleniti consequatur beatae in sed deleniti.',	'Voluptas necessitatibus ex qui inventore quia magnam veniam et ut.',	0,	'247',	'your.email+faker50024@gmail.com');

CREATE TABLE `registration` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `registration` (`id`, `nama`, `username`, `password`) VALUES
(1,	'admin',	'admin',	'0192023a7bbd73250516f069df18b500');

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `update` datetime DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `status_bayar` int(11) NOT NULL DEFAULT 0,
  `id_invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi` (`id`, `jenis`, `id_perusahaan`, `nama`, `alamat`, `kota`, `kode_pos`, `telpon`, `email`, `subtotal`, `ongkir`, `diskon`, `total`, `pembayaran`, `waktu`, `update`, `foto`, `status`, `status_bayar`, `id_invoice`) VALUES
(1,	'0',	0,	'0',	'jakarta',	'jakarta',	'15710',	'9192922',	'jokosusilo@joko.com',	'60000',	'14000',	'3000',	'71000',	'transfer',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	NULL,	0,	0,	NULL),
(2,	'0',	0,	'andi',	'tangerang',	'jakarta',	'15710',	'215150000',	'jokosusilo@joko.com',	'60000',	'14000',	'3000',	'71000',	'transfer',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	NULL,	0,	0,	NULL),
(3,	'0',	0,	'andi',	'tangerang',	'jakarta',	'15710',	'215150000',	'jokosusilo@joko.com',	'60000',	'14000',	'3000',	'71000',	'transfer',	'2020-01-29 10:25:49',	'0000-00-00 00:00:00',	NULL,	0,	0,	NULL),
(4,	'0',	0,	'andi',	'tangerang',	'jakarta',	'15710',	'215150000',	'jokosusilo@joko.com',	'60000',	'14000',	'3000',	'71000',	'transfer',	'2020-01-29 10:26:22',	'0000-00-00 00:00:00',	NULL,	0,	0,	NULL),
(5,	'0',	1,	'andi',	'tangerang',	'jakarta',	'15710',	'215150000',	'jokosusilo@joko.com',	'60000',	'14000',	'3000',	'71000',	'tagihan',	'2020-01-29 10:26:43',	'2020-02-01 14:00:23',	NULL,	3,	1,	8),
(6,	'0',	0,	'andi',	'jakarta',	'jakarta',	'15710',	'9192922',	'admin_kampus@admin.com',	'60000',	'14000',	'0',	'74000',	'transfer',	'2020-01-29 10:44:53',	'0000-00-00 00:00:00',	'5ac6207e-40cb-4335-97dd-70d9599832af.jpg',	3,	1,	NULL);

-- 2020-02-01 14:22:25
