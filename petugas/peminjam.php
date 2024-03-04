<?php
include 'layout/header.php';
?>

<div class="container">
   <div class="row" style="margin-top: 1rem;">
      <div class="col">
         <h2>Data Peminjaman</h2>
         <a href="data/pinjam_buku.php" class="btn btn-success mt-3">Tambah Peminjaman</a>
         <table class="table my-2">
            <thead class="table table-warning">
               <tr>
                  <th scope="col">ID Peminjaman</th>
                  <th scope="col">Nama Peminjam</th>
                  <th scope="col">Status Peminjaman</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <?php
            include '../koneksi/koneksi.php';

            $data = mysqli_query($koneksi, "SELECT * FROM peminjaman,user WHERE peminjaman.id_user=user.id_user");
            while ($d = mysqli_fetch_array($data)) {
            ?>
               <tbody>
                  <tr>
                     <th scope="row"><?= $d['id_peminjaman']; ?></th>
                     <td><?= $d['username']; ?></td>
                     <td><?= $d['status_peminjaman']; ?></td>
                     <td>
                        <a href="data/detail_peminjaman.php?id_peminjaman=<?php echo $d['id_peminjaman']; ?>" class="btn btn-primary text-white">Detail</a>
                        <!-- <a href="" data-bs-toggle="modal" data-bs-target="#modalEditBuku" class="btn btn-info">Edit</a> -->
                        <a href="data/delete_pinjaman.php?id_peminjaman=<?php echo $d['id_peminjaman']; ?>" class="btn btn-danger text-white">Delete</a>
                     </td>
                  </tr>
               </tbody>
            <?php
            }
            ?>
         </table>
      </div>
      <!-- modal edit buku -->
      <?php

      $data = "SELECT * FROM peminjaman,user,buku WHERE peminjaman.id_buku=buku.id_buku AND peminjaman.id_user=user.id_user";
      $result = mysqli_query($koneksi, $data);
      while ($row = mysqli_fetch_array($result)) {
      ?>
         <div class="modal fade" id="modalEditBuku<?= $row['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="modalEditBukuLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="modalEditBukuLabel">Edit Data Buku</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="data/edit_buku.php" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                        <div class="form-group mt-2">
                           <div class="row">
                              <div class="col-sm-9">
                                 <label for="foto" class="form-label"><?= $row['foto']; ?></label>
                                 <input type="file" name="foto" id="foto" class="form-control" value="<?= $row['foto']; ?>">
                                 <input type="hidden" name="id_buku" id="id_buku" class="form-control" value="<?= $row['id_buku']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-group mt-2">
                           <input type="hidden" name="id_buku" id="id_buku" class="form-control" value="<?= $row['id_buku']; ?>">
                           <label for="judul" class="mb-2">Judul Buku</label>
                           <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Buku" value="<?= $row['judul']; ?>">
                        </div>
                        <div class="form-group mt-2">
                           <label for="penulis" class="mb-2">Penulis Buku</label>
                           <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Masukkan Nama Penulis Buku" value="<?= $row['penulis']; ?>">
                        </div>
                        <div class="form-group mt-2">
                           <label for="penerbit" class="mb-2">Penerbit Buku</label>
                           <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Masukkan Nama Penerbit Buku" value="<?= $row['penerbit']; ?>">
                        </div>

                        <div class="form-group mt-2">
                           <label for="tahun_terbit" class="mb-2">Tahun Terbit</label>
                           <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan Tahun Terbit Buku" value="<?= $row['tahun_terbit']; ?>">
                        </div>
                        <div class="form-group mt-2">
                           <label for="tahun_terbit" class="mb-2">Deskripsi Buku</label>
                           <textarea name="deskripsi" id="deskripsi" rows="7" placeholder="Deskripsi buku" class="form-control"><?= $row['deskripsi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                           <label for="formFileMultiple" class="form-label">Upload Buku<span class="text-danger">*Pdf</span></label>
                           <input class="form-control" name="buku" type="file" id="formFileMultiple" multiple>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

      <?php
      }
      ?>
   </div>


   <?php
   include 'layout/footer.php';
   ?>