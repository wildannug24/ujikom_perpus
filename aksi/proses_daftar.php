<?php
// koneksi database
include '../koneksi/koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nis = $_POST['nis'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$level= $_POST['level'];

// Validasi username
$cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
if (mysqli_num_rows($cek_username) > 0) {
    echo "<script>alert('Username sudah ada!'); window.location='../registrasi.php';</script>";
    exit;
}
 
// menginput data ke database
mysqli_query($koneksi,"INSERT into user values('','$username','$password','$email','$nis','$namalengkap','$alamat','peminjam')");
 
// mengalihkan halaman kembali ke index.php
header("location:../index.php?pesan=info_daftar");
 
?>