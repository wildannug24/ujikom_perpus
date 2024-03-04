<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container" style="margin-top: 5rem;">
    <div class="card">
        <div class="row m-4">
        <?php
            include '../../koneksi/koneksi.php';
            if (isset($_GET['id_user'])) {
              $id_user = $_GET['id_user'];
            }else{
              die ("Error, Data Tidak Ditemukan");
            }
            $query  = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
            $result = mysqli_fetch_array($query);
            ?>
            
            <div class="col">
                    <h2>Detail Anggota</h2> <hr>
                    <a href="../anggota.php" class="btn btn-danger">Kembali</a><hr>
                <table>
                    <tr>
                        <td><h5>id_user</h5></td>
                        <td><h5>: <?php echo $result['id_user'];?></h5></td>
                    </tr>
                    <tr>
                       <td><h5>nis</h5></td>
                        <td><h5>: <?php echo $result['nis'];?></h5></td>
                    </tr>
                    <tr>
                        <td><h5>nama_lengkap</h5></td>
                        <td><h5>: <?php echo $result['nama_lengkap'];?></h5></td>
                     </tr>
                     <tr>
                        <td><h5>alamat</h5></td>
                        <td><h5>: <?php echo $result['alamat'];?></h5></td>               
                     </tr>
                     <tr>
                        <td><h5>email</h5></td>
                        <td><h5>: <?php echo $result['email'];?></h5></td>  
                     </tr>
                     <tr>
                        <td><h5>username</h5></td>
                        <td><h5>: <?php echo $result['username'];?></h5></td>  
                     </tr>
                     <tr>
                        <td><h5>password</h5></td>
                        <td><h5>: <?php echo $result['password'];?></h5></td>  
                     </tr>
                     <tr>
                        <td><h5>level</h5></td>
                        <td><h5>: <?php echo $result['level'];?></h5></td>  
                     </tr>
                </table>
                <a href="#" class="btn btn-success my-3">Baca Sekarang</a>
           </div>
        </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>