<?php
// koneksi database
session_start();
include '../koneksi/koneksi.php';

// menangkap data yang di kirim dari form
$id_user               = $_SESSION['id_user'];
$id_buku               = $_POST['id_buku'];
$ulasan                = $_POST['ulasan'];
$rating                = $_POST['rating'];

// menginput data ke database
$sql = mysqli_query($koneksi, "INSERT into ulasanbuku(id_user,id_buku,ulasan,rating)
                      values('$id_user','$id_buku','$ulasan','$rating')");

// mengalihkan halaman kembali ke index.php
if ($sql) {
    header("location:buku.php");
} else {
    echo "
    <script>
    alert('Gagal simpan');
    </script>
    ";
}
