<?php
// koneksi database
session_start();
include '../../koneksi/koneksi.php';
 
// menangkap data yang di kirim dari form
$id_user               = $_SESSION['id_user'];
$id_buku               = $_POST['id_buku'];
$tanggal_peminjaman    = $_POST['tanggal_peminjaman'];
$tanggal_pengembalian  = $_POST['tanggal_pengembalian'];
$status_peminjaman     = $_POST['status_peminjaman'];
 
// menginput data ke database

$sql = "INSERT into peminjaman(id_user,id_buku,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman)
                      values('$id_user','$id_buku','$tanggal_peminjaman','$tanggal_pengembalian','dipinjam')";

$query = mysqli_query($koneksi, $sql);
 
 if($query){
    echo"
    <script>
    alert('Data berhasil disimpan');
    document.location.href = '../buku.php';
    </script>
    ";
}else{
    echo"
    <script>
    alert('Data gagal disimpan');
    document.location.href = '../buku.php';
    </script>
    ";
}
 
?>