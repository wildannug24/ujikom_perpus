<?php 
// menangkap data id yang dikirim dari url
$id_peminjaman = $_GET['id_peminjaman'];

// menghapus data dari databasee
include '../../koneksi/koneksi.php';

$query = "DELETE FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";
$success = mysqli_query ($koneksi, $query);
 
if ($success) {
    echo "
    <script>
    alert('buku berhasil dihapus');
    document.location.href = '../koleksi.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('buku gagal dihapus');
    document.location.href = '../koleksi.php';
    </script>";
}

?>