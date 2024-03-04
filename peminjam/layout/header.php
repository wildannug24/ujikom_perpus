<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Peminjam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3 class="my-4">PERPUSTAKAN DIGITAL</h3>
    <div class="card">
      <div class="card-body">
        <a href="index_pmj.php" class="btn">Dashboard</a>
        <a href="buku.php" class="btn">Buku</a>
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Kategori
        </button>
        <ul class="dropdown-menu">
          <?php
          include '../koneksi/koneksi.php';
          $no = 1;
          $data = "SELECT * FROM kategoribuku";
          $result = mysqli_query($koneksi, $data);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <li><a class="dropdown-item" href="kategori.php?nama_kategori=<?php echo $row['nama_kategori']; ?>"><?= $row['nama_kategori']; ?></a>
            </li>
          <?php } ?>
        </ul>
          <a href="t-ulasan.php" class="btn">Ulasan</a>
          <a href="koleksi.php" class="btn">Koleksi</a>
          <a href="../logout.php" class="btn">Logout</a>
      </div>
    </div>
  </div>