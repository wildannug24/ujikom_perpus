<?php

$id_user = $_GET['id_user'];


include '../../koneksi/koneksi.php';

$sql = "DELETE FROM user WHERE id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script>
    document.location.href = '../anggota.php';
    </script>";
} else {
    echo "<script>
    alert('Maaf Data Tidak Terhapus');
    document.location.href = '../anggota.php';
    </script>";
}
