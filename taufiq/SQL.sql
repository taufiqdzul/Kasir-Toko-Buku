create database taufiq;

use taufiq;

create table distributor(
	id_distributor int primary key auto_increment,
	nama_distributor varchar(100) not null,
	alamat text not null,
	telepon varchar(20) not null
);

create table pasok(
	id_pasok int primary key auto_increment,
	id_distributor int not null,
	id_buku int not null,
	jumlah int not null,
	tanggal date not null
);

create table buku(
	id_buku int primary key auto_increment,
	judul varchar(100) not null,
	noisbn varchar(50) not null,
	penulis varchar(100) not null,
	penerbit varchar(100) not null,
	tahun int not null,
	stok int not null,
	harga_pokok int not null,
	harga_jual int not null,
	ppn int not null,
	diskon int not null
);

create table kasir(
	id_kasir varchar(30) primary key not null,
	nama varchar(100) not null,
	alamat text not null,
	telepon varchar(20) not null,
	status varchar(30) not null
);

create table penjualan(
	id_penjualan int primary key auto_increment,
	id_buku int not null,
	id_transaksi int not null,
	jumlah int not null,
	total int not null
);

create table transaksi(
	id_transaksi int primary key auto_increment,
	id_kasir varchar(30) not null,
	tanggal date not null,
	total_transaksi int not null,
	pembayaran int not null
);

create table user(
	id_user int primary key auto_increment,
	username varchar(100) unique not null,
	password varchar(100) not null,
	akses int not null
);

insert into user values(null,'admin','admin','0');
insert into kasir values('K-0001','Taufiq','Banjaran','085352601800','Pegawai Aktif');
insert into kasir values('K-0002','Ridho','Cingcin','085352601800','Pegawai Tidak Aktif');
insert into user values(null,'K-0001','kasir','1');
insert into user values(null,'K-0002','kasur','1');
insert into distributor values('D-0001','Pebby','Bojongsoang','9300302992');

select buku.id_buku, pasok.id_pasok, distributor.id_distributor from buku, distributor, pasok where buku.id_buku = pasok.id_buku and distributor.id_distributor = pasok.id_distributor and buku.id_buku = "B-0001";