<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-3">
                <h3>LAPORAN DATA PEMINJAMAN BUKU</h3>
                <h3>APLIKASI PERPUSTAKAAN DIGITAL DAERAH KOTA BANJAR</h3>
                <span>Data ini merupakan data keseluruhan member perpustakaan</span>
            </div>
        </div>
        <div class="row">
            <table class="table my-2">
                <thead class="table table-info">
                    <tr>
                        <th scope="col">id peminjaman</th>
                        <th scope="col">id user</th>
                        <th scope="col">id buku</th>
                        <th scope="col">nama peminjam</th>
                        <th scope="col">tanggal peminjaman</th>
                        <th scope="col">tanggal pengembalian</th>
                        <th scope="col">status peminjaman</th>
                    </tr>
                </thead>
                <?php
                include '../../koneksi/koneksi.php';

                $data = mysqli_query($koneksi, "SELECT * FROM peminjaman");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo isset($d['id_peminjaman']) ? $d['id_peminjaman'] : ''; ?></th>
                        <td><?php echo isset($d['id_user']) ? $d['id_user'] : ''; ?></td>
                        <td><?php echo isset($d['id_buku']) ? $d['id_buku'] : ''; ?></td>
                        <td><?php echo isset($d['nama_peminjam']) ? $d['nama_peminjam'] : ''; ?></td>
                        <td><?php echo isset($d['tanggal_peminjaman']) ? $d['tanggal_peminjaman'] : ''; ?></td>
                        <td><?php echo isset($d['tanggal_pengembalian']) ? $d['tanggal_pengembalian'] : ''; ?></td>
                        <td><?php echo isset($d['status_peminjaman']) ? $d['status_peminjaman'] : ''; ?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <p style="line-height: 1rem;">Mengetahui:</p>
                <p class="">Kepala Dinas Perpustakan Daerah Kota Banjar</p>
                <p class="" style="margin-top: 4rem;"><b>Nia Kania Permasih, S.STP., M.SI</b></p>
            </div>
        </div>
        <div class="row">
            <a href="../laporan.php">Kembali</a>
        </div>
    </div>

    <script>
    window.print();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>