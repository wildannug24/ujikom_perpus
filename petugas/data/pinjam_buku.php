<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

     <div  class="container">
        <div class="card" style="margin-top: 4rem;">
            <div class="row m-4">
                     <div class="col-sm-7">
                        <h3>From Peminjaman Buku</h3>
                        <a href="../peminjam.php" class="btn btn-danger m-2">Kembali</a>
                        <form action="t_pinjam.php" method="POST">
                          <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">id_buku</label>
                          <input type="text" name="id_buku" class="form-control" required>
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">id_user</label>
                          <input type="text" name="id_user" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">nama_peminjam</label>
                          <input type="text" name="nama_lengkap" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">tanggal_peminjaman</label>
                              <input type="date" name="tanggal_peminjaman" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                         </div>
                      </div>
                      <div class="col">
                             <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">tanggal_pengembalian</label>
                             <input type="date" name="tanggal_pengembalian" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                            </div>
                      </div>
                      <div clas="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Level</label>
                          <select class="form-select" name="status_peminjaman" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="dipinjam">Pinjam</option>
                         </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Pinjam</button>
                </form>
            </div>
        </div>
     </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>