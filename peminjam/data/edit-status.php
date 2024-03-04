<?php

$id_peminjaman = $_POST['id_peminjaman'];
$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
$status_peminjaman = $_POST['status_peminjaman'];

include '../../koneksi/koneksi.php';
$query = "UPDATE peminjaman SET id_user='$id_user', id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='dikembalikan' WHERE id_peminjaman='$id_peminjaman'";
$success = mysqli_query($koneksi, $query);

if ($success) {
    echo "
    <script>
    alert('Data berhasil diubah');
    document.location.href = '../koleksi.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal ditambahkan');
    document.location.href = '../koleksi.php';
    </script>
    ";
}

?>