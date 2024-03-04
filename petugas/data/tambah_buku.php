<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="card" style="margin-top: 1rem;">
            <div class="row m-3">
                

                <div class="col-sm-7">
                    <h3>Form Tambah Buku</h3>
                    <a href="../buku.php" class="btn btn-secondary my-1">Kembali</a>
                    <form action="t_buku.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">judul</label>
                            <input type="text" name="judul" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">penulis</label>
                            <input type="text" name="penulis" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="exampleInputEmail1" class="form-label">penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="exampleInputEmail1" class="form-label">tahun_terbit</label>
                                    <input type="text" name="tahun_terbit" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Sampul</label>
                                <input class="form-control" name="foto" type="file" id="formFileMultiple" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Buku<span class="text-danger">*Pdf</span></label>
                                <input class="form-control" name="buku" type="file" id="formFileMultiple" multiple>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>