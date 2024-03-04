<?php
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data yang di kirim dari form
$nis = $_POST['nis'];
$namalengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// menginput data ke database
mysqli_query($koneksi, "INSERT into user(nis,nama_lengkap,email,alamat,username,password,level)
            values('$nis','$namalengkap','$email','$alamat','$username','$password','$level')");

// mengalihkan halaman kembali ke index.php
header("location:../anggota.php");