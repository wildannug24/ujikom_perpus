<?php
include 'layout/header.php';
?>

<div class="container">
                <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary mt-3">Ulasan Buku</h6>
                        </div>
            <div class="card-body">
            <div class="table-responsive">
            <a href="?page=ulasan_tambah" class=""></a>
            <table class="table table-bordered"  id="datatable" width="100%" cellspacing="0">
            <thead>
              <thead class="table table-secondary">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                </tr>
            </thead>
        <tbody>
                <?php
                $i = 1;
                include '../koneksi/koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM ulasanbuku, user, buku
                WHERE ulasanbuku.id_user=user.id_user
                AND ulasanbuku.id_buku=buku.id_buku
                ORDER BY id_ulasan ASC");
    
                while ($data = mysqli_fetch_array($query)) {
                    // Your code here
                
            ?>    
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                        </tr>
                        <?php
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>