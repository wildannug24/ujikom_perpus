<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container">
  <div class="content">
       <div class="card" style="margin-top: 1rem;"> 
          <div class="row">
              <div class="col-sm-8 m-3">
              <h3>Silahkan Masukkan data Calon Petugas!</h3>
              <form action="t_ptgs.php" method="post">
                  <div class="mb-2">
                      <label for="exampleInputEmail1" class="form-label">NIS</label>
                      <input type="text" name="nis" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                   <div class="mb-2">
                      <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                   <div class="mb-2">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                   <div class="mb-2">
                      <label for="exampleInputEmail1" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                   <div class="mb-2">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" required id="password">
                  </div>
                  <div clas="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Level</label>
                    <select class="form-select" name="level" id="level">
                      <option selected></option>
                      <option value="peminjam">Pengguna</option>
                      <option value="peminjam">Petugas</option>
                      <option value="peminjam">Admin</option>

                  </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                  <a href="../anggota.php" class="btn btn-danger">Kembali</a><hr>
                  </div>
                  <div class="col">
                    <img src="asset/img/login.png" width="500" alt="">
              </div>
           </div>
        </div>
     </div>
   </div>