<?php 
// koneksi database
include '../../koneksi/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_peminjaman = $_GET['id_peminjaman'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE from peminjaman where id_peminjaman='$id_peminjaman'");
 
// mengalihkan halaman kembali ke index.php
header("location:../peminjam.php");
 
?>