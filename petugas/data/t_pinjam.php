<?php
// koneksi database
include '../../koneksi/koneksi.php';
 
// menangkap data yang di kirim dari form
$id_user               = $_POST['id_user'];
$id_buku               = $_POST['id_buku'];
$tanggal_peminjaman    = $_POST['tanggal_peminjaman'];
$tanggal_pengembalian  = $_POST['tanggal_pengembalian'];
$id_buku               = $_POST['nama'];
$status_peminjaman     = $_POST['status_peminjaman'];
 
// menginput data ke database
mysqli_query($koneksi,"INSERT into peminjaman(id_user,id_buku,nama_peminjam,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman)
                      values('$id_user','$id_buku','$tanggal_peminjaman','$tanggal_pengembalian')'$nama','$status_peminjaman')");
 
// mengalihkan halaman kembali ke index.php
header("location:../peminjam.php");
 
?>