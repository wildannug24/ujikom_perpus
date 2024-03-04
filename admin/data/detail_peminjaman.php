<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container" style="margin-top: 5rem;">
    <div class="card">
        <div class="row m-4">
        <?php
            include '../../koneksi/koneksi.php';
            if (isset($_GET['id_peminjaman'])) {
              $id_peminjaman = $_GET['id_peminjaman'];
            }else{
              die ("Error, Data Tidak Ditemukan");
            }
            $query  = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman' ");
            $result = mysqli_fetch_array($query);
            ?>
            <div class="col">
                    <h2>Detail Peminjam</h2> <hr>
                    <a href="../pinjam.php" class="btn btn-danger">Kembali</a><hr>
                <table>
                    <tr>
                        <td><h5>id_peminjaman</h5></td>
                        <td><h5>: <?php echo $result['id_peminjaman'];?></h5></td>
                    </tr>
                    <tr>
                        <td><h5>id_user</h5></td>
                        <td><h5>: <?php echo $result['id_user'];?></h5></td>
                     </tr>
                     <tr>
                        <td><h5>id_buku</h5></td>
                        <td><h5>: <?php echo $result['id_buku'];?></h5></td>               
                     </tr>
                     <tr>
                        <td><h5>nama_peminjam</h5></td>
                        <td><h5>: <?php echo $result['nama_peminjam'];?></h5></td>  
                     </tr>
                     <tr>
                        <td><h5>tanggal_peminjaman</h5></td>
                        <td><h5>: <?php echo $result['tanggal_peminjaman'];?></h5></td>  
                     </tr>
                     <tr>
                        <td><h5>tanggal_pengembalian</h5></td>
                        <td><h5>: <?php echo $result['tanggal_pengembalian'];?></h5></td>  
                     </tr>
                     <tr class="bg-warning text-white">
                        <td><h5>status_peminjaman</h5></td>
                        <td><h5>: <?php echo $result['status_peminjaman'];?></h5></td>  
                     </tr>
                </table>
           </div>
        </div>
    </div>
  </div>