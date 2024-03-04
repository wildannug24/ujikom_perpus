<?php

$id_buku = $_POST['id_buku'];
$id_kategori = $_POST['id_kategori'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$deskripsi = $_POST['deskripsi'];

if ($_FILES['buku']['name']) {
    $buku = $_FILES['buku']['name'];
    $file_tmp = $_FILES['buku']['tmp_name'];
    $dir_upload = "../../petugas/asset/buku/";
    $ekstensi_diperbolehkan = array('pdf');

    $upload = move_uploaded_file($file_tmp, $dir_upload . $buku);

    if (!$upload) {
        echo "
        <script>
        alert('Gagal upload buku.');
        document.location.href = '../buku.php';
        </script>
        ";
        exit();
    }
} else {
    $buku = $_POST['buku'];
}

if ($_FILES['foto']['name']) {
    $foto = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $dir_upload = "../../petugas/asset/sampul/";

    $upload = move_uploaded_file($tmp_file, $dir_upload . $foto);

    if (!$upload) {
        echo "
        <script>
        alert('Gagal upload gambar.');
        document.location.href = '../buku.php';
        </script>
        ";
        exit();
    }
} else {
    $foto = $_POST['foto'];
}

// Query untuk update data ke database
include '../../koneksi/koneksi.php';
$query = "UPDATE buku SET id_kategori='$id_kategori', judul='$judul',  penulis='$penulis', foto='$foto', buku='$buku', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku='$id_buku'";
$success = mysqli_query($koneksi, $query);


if ($success) {
    echo "
    <script>
    alert('Data berhasil diubah');
    document.location.href = '../buku.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal ditambahkan');
    document.location.href = '../buku.php';
    </script>
    ";
}
?>