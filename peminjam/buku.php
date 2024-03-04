<?php
  include 'layout/header.php';
?>

 <div class="container" style="margin-top: 2rem;">
    <div class="row">
    <h4>Pilihan Buku</h4>
    <form action="" method="GET" class="mb-3">
      <div>
          <input type="text" name="search" class="form-control" placeholder="cari judul buku...">
          <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </form>

<?php
          include '../koneksi/koneksi.php';
          // proses filter pencarian
          if (isset($_GET['search'])){
              $search = $_GET['search'];
              // Pastikan untuk melarutkan nilai input untuk menghindari serangan SQL injection
              $search = mysqli_real_escape_string($koneksi, $search);

              // Query untuk mencari buku berdasarkan judul
              $query = "SELECT * FROM buku WHERE judul LIKE '%$search%' ORDER BY id_buku ASC";
          }else{
            // Query untuk menampilkan semua buku jika tidak ada pencarian
            $query = "SELECT * FROM buku ORDER BY id_buku ASC";
          }
          $data = mysqli_query($koneksi, $query);

          while ($d = mysqli_fetch_array($data)){
            $id_buku = $d['id_buku'];     //ambil id_buku yang digunakan dalam query rating



          
?>
       <div class="card" style="width: 14rem;">
       <img src="../petugas/asset/sampul/<?php echo $d['foto'];?>" class="card-img-top" alt="...">
       <div class="card-body">
           <h5 class="card-title"><?php echo $d['judul'];?></h5>
           <h6>Tahun Terbit : <?php echo $d['tahun_terbit'];?></h6>
           <a href="data/detail.php?id_buku=<?php echo $d['id_buku'];?>" class="btn btn-warning text-white">Detail</a>
           <a href="data/pinjam_buku.php?id_buku=<?php echo $d['id_buku'];?>" class="btn btn-primary">Pinjam</a>
       </div>
   </div>
   <?php
    }
    ?>
    </div>
  </div>



<?php
  include 'layout/footer.php';
?>