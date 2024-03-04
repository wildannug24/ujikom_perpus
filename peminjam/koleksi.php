<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['id_user'])) {
    header("location:../index.php?pesan=info_login");
}
if ($_SESSION['level'] != "peminjam") {
    header("location:../logout.php");
}
require "../koneksi/koneksi.php";
$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$query = mysqli_query($koneksi, "SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul,  buku.foto, buku.id_kategori, buku.tahun_terbit, user.nama_lengkap, user.id_user, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.status_peminjaman
FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
INNER JOIN user ON peminjaman.id_user = user.id_user
WHERE peminjaman.id_user = $id_user");

?>

<?php
include 'layout/header.php';
?>

<div class="container" style="margin-top: 2rem;">
    <div class="row">
        <h4>Pilihan Buku</h4>
        <?php foreach ($query as $d) :
            $status = $d['status_peminjaman'];
        ?>
            <div class="card" style="width: 16rem;">
                <div class="card-body">
                    <?php if ($status == 'dipinjam') { ?>
                        <img src="../petugas/asset/sampul/<?php echo $d['foto']; ?>" class="card-img-top" alt="...">
                        <h5 class="card-title"><?php echo $d['judul']; ?></h5>
                        <h6>Tahun terbit : <?php echo $d['tahun_terbit']; ?> </h6>
                        <form action="data/edit-status.php" method="POST">
                            <input type="text" class="form-control" name="id_peminjaman" value="<?= $d['id_peminjaman']; ?>" hidden>
                            <input type="text" name="id_user" value="<?= $d['id_user']; ?>" hidden>
                            <input type="text" name="id_buku" value="<?= $d['id_buku']; ?>" hidden>
                            <input type="text" name="tanggal_peminjaman" value="<?= $d['tanggal_peminjaman']; ?>" hidden>
                            <input type="text" name="tanggal_pengembalian" value="<?= $d['tanggal_pengembalian']; ?>" hidden>
                            <input type="text" name="status_peminjaman" value="<?= $d['status_peminjaman']; ?>" hidden>
                            <button type="submit" class="btn btn-success">kembalikan</button>
                        </form>
                        <a href="data/baca.php?id_buku=<?php echo $d['id_buku']; ?>" class="btn btn-warning my-4">Baca Sekarang</a>
                        <a href="Ulasan.php?id_buku=<?php echo $d['id_buku']; ?>" class="btn btn-info my-4">Ulasan</a>
                    <?php } elseif ($status == 'dikembalikan') { ?>
                        <img src="../petugas/asset/sampul/<?php echo $d['foto']; ?>" class="card-img-top" alt="...">
                        <h5 class="card-title"><?php echo $d['judul']; ?></h5>
                        <h6>Tahun terbit : <?php echo $d['tahun_terbit']; ?> </h6>
                        <a class="btn btn-warning" href="detail.php?id_buku=<?php echo $d['id_buku']; ?>">Detail</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus buku dari koleksi?')" class="btn btn-danger" href="data/hapus_koleksi.php?id_peminjaman=<?php echo $d['id_peminjaman']; ?>">hapus</a>
                    <?php } elseif ($status == 'telat') { ?>
                        <img src="../petugas/asset/sampul/<?php echo $d['foto']; ?>" class="card-img-top" alt="...">
                        <h5 class="card-title"><?php echo $d['judul']; ?></h5>
                        <h6>Tahun terbit : <?php echo $d['tahun_terbit']; ?> </h6>
                        <form action="data/edit-status.php" method="POST">
                            <input type="text" class="form-control" name="id_peminjaman" value="<?= $d['id_peminjaman']; ?>" hidden>
                            <input type="text" name="id_user" value="<?= $d['id_user']; ?>" hidden>
                            <input type="text" name="id_buku" value="<?= $d['id_buku']; ?>" hidden>
                            <input type="text" name="tanggal_peminjaman" value="<?= $d['tanggal_peminjaman']; ?>" hidden>
                            <input type="text" name="tanggal_pengembalian" value="<?= $d['tanggal_pengembalian']; ?>" hidden>
                            <input type="text" name="status_peminjaman" value="<?= $d['status_peminjaman']; ?>" hidden>
                            <button type="submit" class="btn btn-success">kembalikan</button>
                        </form>
                    <?php }  ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    $data = "SELECT * FROM peminjaman WHERE id_peminjaman";
    $result = mysqli_query($koneksi, $data);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="modal fade" id="updateStatus<?= $row['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="updateStatusLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateStatusLabel">Ubah status peminjaman</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="edit-status.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
                                <label for="exampleInputEmail1" class="form-label">Kembalikan buku</label>
                                <select name="status_peminjaman" id="status_peminjaman" class="form-control" required>
                                    <option value="" selected disabled>Update status peminjaman</option>
                                    <option value="dikembalikan">dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">kembalikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- detail buku -->
<?php
$data = "SELECT * FROM peminjaman, buku WHERE peminjaman.id_buku=buku.id_buku ORDER BY tanggal_peminjaman ASC";
$result = mysqli_query($koneksi, $data);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="modal fade" id="modalDetailGenerate<?= $row['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="modalDetailGenerateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailGenerateLabel"><i class="bi bi-journal-bookmark-fill"></i> Detail Laporan<h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../petugas/asset/sampul/<?= $row['foto']; ?>" alt="" width="200">
                            </div>
                            <div class="col-md-8">
                                <form action="">
                                    <div class="row mb-3">
                                        <!-- <div class="col-sm-3">
                                            <label for="" class="col-form-label">Peminjam : </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="" class="col-form-label"><?= $row['nama_peminjam']; ?></label>
                                        </div> -->
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="" class="col-form-label">Judul Buku :</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="" class="col-form-label"><?= $row['judul']; ?></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="" class="col-form-label">tanggal_peminjam:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="" class="col-form-label"><?= $row['tanggal_peminjaman']; ?></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="" class="col-form-label">Tanggal Kembali :</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="" class="col-form-label"><?= $row['tanggal_pengembalian']; ?></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="" class="col-form-label">Status Peminjam :</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="" class="col-form-label"><?= $row['status_peminjaman']; ?></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="ulasan.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-warning">Ulasan</a> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>