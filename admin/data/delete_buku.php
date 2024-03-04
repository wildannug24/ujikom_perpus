<?php

$id_buku = $_GET['id_buku'];


include '../../koneksi/koneksi.php';

$sql = "DELETE FROM buku WHERE id_buku = '$id_buku'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script>
    document.location.href = '../buku.php';
    </script>";
} else {
    echo "<script>
    alert('Maaf Data Tidak Terhapus');
    document.location.href = '../buku.php';
    </script>";
}
