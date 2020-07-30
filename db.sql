CREATE TABLE ms_guru (
  nip VARCHAR(18) NOT NULL,
  npsn VARCHAR(10) NOT NULL,
  namaGuru VARCHAR(50) NULL,
  jenisKelamin ENUM('Laki-laki', 'Perempuan') NULL,
  alamatGuru VARCHAR(255) NULL,
  PRIMARY KEY(nip),
  INDEX ms_guru_FKIndex1(npsn)
);

CREATE TABLE ms_kelas (
  idKelas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  npsn VARCHAR(10) NOT NULL,
  namaKelas VARCHAR(25) NULL,
  PRIMARY KEY(idKelas),
  INDEX ms_kelas_FKIndex1(npsn)
);

CREATE TABLE ms_orangtua (
  idOrangtua INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  namaOrangtua VARCHAR(50) NULL,
  noHp VARCHAR(15) NULL,
  PRIMARY KEY(idOrangtua)
);

CREATE TABLE ms_pegawai (
  idPegawai INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  namaPegawai VARCHAR(50) NULL,
  jenisKelamin ENUM('Laki-laki', 'Perempuan') NULL,
  alamatPegawai VARCHAR(255) NULL,
  noHp VARCHAR(15) NULL,
  PRIMARY KEY(idPegawai)
);

CREATE TABLE ms_sekolah (
  npsn VARCHAR(10) NOT NULL,
  namaSekolah VARCHAR(50) NULL,
  alamatSekolah VARCHAR(255) NULL,
  noTlp VARCHAR(15) NULL,
  email VARCHAR(50) NULL,
  kepalaSekolah VARCHAR(50) NULL,
  noHp VARCHAR(15) NULL,
  PRIMARY KEY(npsn)
);

CREATE TABLE ms_siswa (
  nisn VARCHAR(10) NOT NULL,
  idOrangtua INTEGER UNSIGNED NOT NULL,
  idKelas INTEGER UNSIGNED NOT NULL,
  namaSiswa VARCHAR(50) NULL,
  jenisKelamin ENUM('Laki-laki', 'Perempuan') NULL,
  alamatSiswa VARCHAR(255) NULL,
  PRIMARY KEY(nisn),
  INDEX ms_siswa_FKIndex1(idKelas),
  INDEX ms_siswa_FKIndex2(idOrangtua)
);

CREATE TABLE ms_user (
  idUser INTEGER NOT NULL AUTO_INCREMENT,
  npsn VARCHAR(10) NOT NULL,
  idPegawai INTEGER UNSIGNED NOT NULL,
  username VARCHAR(50) NULL,
  katasandi VARCHAR(32) NULL,
  level ENUM('superadmin', 'admin', 'pengelola') NULL,
  statusUser ENUM('aktif','tidakaktif') NULL,
  PRIMARY KEY(idUser),
  INDEX ms_user_FKIndex1(idPegawai),
  INDEX ms_user_FKIndex2(npsn)
);


