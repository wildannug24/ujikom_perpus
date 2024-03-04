<?php
include 'layout/header.php';
?>

<div class="container">
   <div class="row" style="margin-top: 1rem;">
      <div class="col">
         <h2>Data Peminjaman</h2>
         <div class="page-content fade-in-up">
            <div class="ibox">
               <div class="ibox-head">
               </div>
               <div class="ibox-body">
                  <form method="post">
                     <div class="row">
                        <div class="col-md-4">
                           <label for="tanggal_peminjaman">Pilih Tanggal Pinjam:</label>
                           <input type="date" name="tanggal_peminjaman" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <label for="tanggal_pengembalian">Pilih Tanggal Kembali:</label>
                           <input type="date" name="tanggal_pengembalian" class="form-control">
                        </div>
                     </div><br>
                     <button type="submit" class="btn btn-primary">Filter</button>
                  </form>
                  <hr>
                  <?php
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     // Ambil tanggal dari form
                     $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                     $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                  ?>

                     <div class="container">
                        <a class="btn btn-sm btn-success" href="print.php?tanggal_peminjaman=<?php echo $tanggal_peminjaman;
                                                                                             ?>&tanggal_pengembalian=<?php echo $tanggal_pengembalian; ?>;" target="_blank">Print Semua</a>
                     </div>
                     <br>
                     <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Peminjam</th>
                              <th>Buku</th>
                              <th>Tgl. Peminjaman</th>
                              <th>Tgl.Pengembalian</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           include '../koneksi/koneksi.php';
                           $no = 1;
                           $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                           $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                           $query = mysqli_query($koneksi, "SELECT * FROM peminjaman, buku, user WHERE peminjaman.id_user=user.id_user
                                 AND peminjaman.id_buku=buku.id_buku AND tanggal_peminjaman >= '$tanggal_peminjaman' AND 
                                 (tanggal_pengembalian <= '$tanggal_pengembalian')");
                           while ($row = mysqli_fetch_assoc($query)) {
                              $status = $row['status_peminjaman'];
                           ?>
                              <tr class="text-center">
                                 <td><?php echo $no++; ?>.</td>
                                 <td><?php echo $row['nama_lengkap']; ?></td>
                                 <td><?php echo $row['judul']; ?></td>
                                 <td><?php echo $row['tanggal_peminjaman']; ?></td>
                                 <td><?php echo $row['tanggal_pengembalian']; ?></td>
                                 <td>
                                    <?php if ($status == 'dipinjam') { ?>
                                       <span class="badge badge-warning">Dipinjam</span>
                                    <?php } elseif ($status == 'dikembalikan') { ?>
                                       <span class="badge badge-success">Dikembalikan</span>
                                    <?php } elseif ($status == 'telat') { ?>
                                       <span class="badge badge-danger">Telat</span>
                                    <?php } ?>
                                 </td>
                                 <td>
                                    <a class="btn btn-sm btn-success" href="print1.php?id_peminjaman=<?php echo $row['id_peminjaman'];
                                 ?>&tanggal_peminjaman=<?php echo $tanggal_peminjaman; ?>&tanggal_pengembalian=<?php echo $tanggal_pengembalian;
                                                                                                                                                          ?>&status_peminjaman=<?php echo $status_peminjaman; ?>" target="_blank">Print</a>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  <?php } else { ?>
                     <div class="alert alert-sm alert-primary">
                        <center>
                           <strong>Perhatian!</strong> Silakan Filter Laporan Peminjaman
                        </center>
                     </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>


   <?php
   include 'layout/footer.php';
   ?>