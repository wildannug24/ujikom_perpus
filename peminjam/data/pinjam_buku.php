<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['id_user'])) {
  header("location:../../index.php?pesan=info_login");
}
if ($_SESSION['level'] != "peminjam") {
  header("location:../../logout.php");
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pinjam Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="card" style="margin-top: 4rem;">
      <div class="row m-4">
        <?php
        if (isset($_GET['id_buku'])) {
          $id_buku = $_GET['id_buku'];
        } else {
          die("Data tidak tersedia");
        }
        include '../../koneksi/koneksi.php';
        $query  = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'");
        $result = mysqli_fetch_array($query);
        ?>
        <div class="col-sm-7">
          <form action="t_pinjam.php" method="POST">
            <h4>Yakin Pinjam <?php echo $result['judul']; ?></h4>
            <input type="text" name="id_buku" class="form-control" required value="<?php echo $result['id_buku']; ?>" hidden>
            <input type="text" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" class="form-control" hidden id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="date" name="tanggal_peminjaman" class="form-control" value="<?php echo date('Y-m-d'); ?>" hidden id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="date" name="tanggal_pengembalian" class="form-control" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" hidden id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="text" name="status_peminjaman" class="form-control" hidden id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" class="btn btn-primary">Pinjam</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>