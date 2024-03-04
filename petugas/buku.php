<?php
include 'layout/header.php'
?>
<div class="container">
   <div class="row" style="margin-top: 1rem;">
      <h2>Data Buku</h2>
      <div class="col">
         <a href="data/tambah_buku.php" class="btn btn-success my-3">Tambah Buku</a>
         <table class="table mb-2">
            <thead class="table table-info">
               <tr>
                  <th scope="col">ID Buku</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">Penerbit</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>

               <?php
               include('../koneksi/koneksi.php');
               $no = 1;
               $query = mysqli_query($koneksi, "SELECT * FROM buku");
               while ($row = mysqli_fetch_array($query)) {
               ?>

                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $row['judul']; ?></td>
                     <td><?php echo $row['penulis']; ?></td>
                     <td><?php echo $row['penerbit']; ?></td>
                     <td>
                        <a href="data/detail_buku.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-secondary">Detail</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEditBuku<?php echo $row['id_buku']; ?>" class="btn btn-info">edit</a>
                        <a href="data/delete_buku.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('yakin untuk dihapus?');" class="btn btn-danger">hapus</a>
                     </td>
                  </tr>

               <?php  } ?>
            </tbody>
         </table>
      </div>
   </div>

   <!-- modal edit buku -->
   <?php

   $data = "SELECT * FROM buku";
   $result = mysqli_query($koneksi, $data);
   while ($row = mysqli_fetch_array($result)) {
   ?>

      <div class="modal fade" id="modalEditBuku<?= $row['id_buku']; ?>" tabindex="-1" aria-labelledby="modalEditBukuLabel" aria-hidden="true">
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
                              <input type="file" name="foto" id="foto" class="form-control" value="<?= $row['foto']; ?>" required>
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
                        <label for="kategoribuku">Kategori Buku</label>
                        <select name="id_kategori" id="id_kategori" class="form-control">
                           <?php
                           $k = mysqli_query($koneksi, "SELECT * FROM kategoribuku WHERE id_kategori");
                           while ($rowk = mysqli_fetch_assoc($k)) {
                           ?>
                              <option value="<?= $rowk['id_kategori']; ?>"><?= $rowk['nama_kategori']; ?>
                              </option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="form-group mt-2">
                        <label for="tahun_terbit" class="mb-2">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan Tahun Terbit Buku" value="<?= $row['tahun_terbit']; ?>">
                     </div>
                     <div class="form-group mt-2">
                        <label for="tahun_terbit" class="mb-2">Deskripsi Buku</label>
                        <textarea name="deskripsi" id="deskripsi" rows="7" placeholder="Deskripsi buku" value="<?= $row['deskripsi']; ?>" class="form-control"><?= $row['deskripsi']; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload Buku <span class="text-danger"><?= $row['buku']; ?></span></label>
                        <input class="form-control" name="buku" value="<?= $row['buku']; ?>" type="file" id="formFileMultiple" multiple required>
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

   <?php } ?>
</div>


</div>


<?php
include 'layout/footer.php'
?>