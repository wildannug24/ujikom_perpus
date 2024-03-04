<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
  <div class="content">
       <div class="card" style="margin-top: 11rem;"> 
          <div class="row">
              <div class="col m-3">
              <h2>Silahkan Login Untuk Melanjutkan!</h2>
              <?php
              if (isset($_GET['pesan'])) {
                if ($_GET['pesan']=="gagal"){
                  echo"<div class='alert alert-danger'>Username atau Password Anda salah</div> ";
                }
              }
              if (isset($_GET['pesan'])) {
                  if ($_GET['pesan'] == "info_login") {
                      echo "<div class='alert alert-primary'>Maaf anda belum login !</div>";
                  }
              }
              if (isset($_GET['pesan'])) {
                  if ($_GET['pesan'] == "info_logout") {
                      echo "<div class='alert alert-danger'>Anda berhasil logout</div>";
                  }
              }
              if (isset($_GET['pesan'])) {
                  if ($_GET['pesan'] == "info_daftar") {
                      echo "<div class='alert alert-info'>Anda berhasil daftar, Silahkan login</div>";
                  }
              }
              ?>


              
              <form action="aksi/cek_login1.php" method="post">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required id="exampleInputPassword1">
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                  <p class="mt-3">Saya belum memiliki akun. Buat <a href="registrasi.php" class="btn btn-warning text-white">Disini</a></p>
                  </div>
                  <div class="col">
                    <img src="asset/img/masuk.png" width="400" alt="">
              </div>
           </div>
        </div>
     </div>
   </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>