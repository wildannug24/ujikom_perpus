<?php 
// koneksi database
include '../../koneksi/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_buku = $_GET['id_buku'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE from buku where id_buku='$id_buku'");
 
// mengalihkan halaman kembali ke index.php
header("location:../buku.php");
 
?>