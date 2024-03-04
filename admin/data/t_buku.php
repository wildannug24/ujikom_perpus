<?php 

// koneksi database
include '../../koneksi/koneksi.php';
 
// menangkap data yang di kirim dari form
$id_kategori      = $_POST['id_kategori'];
$judul      = $_POST['judul'];
$penulis    = $_POST['penulis'];
$penerbit   = $_POST['penerbit'];
$tahun_terbit= $_POST['tahun_terbit'];
$deskripsi = $_POST['deskripsi'];
$foto       = $_FILES['foto']['name'];
$buku       = $_FILES['buku']['name'];
$foto_tmp       = $_FILES['foto']['tmp_name'];
$file_tmp   = $_FILES['buku']['tmp_name'];
$ekstensi_diperbolehkan = array('pdf');
 
// menginput data ke database
move_uploaded_file($foto_tmp, '../../petugas/asset/sampul/' .$foto);
move_uploaded_file($file_tmp, '../../petugas/asset/buku/' .$buku);
mysqli_query($koneksi,"INSERT into buku values('','$id_kategori','$judul','$penulis','$foto','$buku','$penerbit','$tahun_terbit', '$deskripsi')");

// mengalihkan halaman kembali ke index.php
header("location:../buku.php");


?>