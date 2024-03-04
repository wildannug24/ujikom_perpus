<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-3">
                <h3>LAPORAN DATA ANGGOTA</h3>
                <h3>APLIKASI PERPUSTAKAAN DIGITAL DAERAH KOTA BANJAR</h3>
                <span>Data ini merupakan data keseluruhan member perpustakaan</span>
            </div>
        </div>
        <div class="row">
            <table class="table my-3">
                <thead class="table table-info">
                    <tr>
                        <th scope="col">ID user</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Level</th>

                    </tr>
                </thead>
                <?php
                include '../../koneksi/koneksi.php';

                $data = mysqli_query($koneksi, "SELECT * FROM user");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $d['id_user']; ?></th>
                        <td><?php echo $d['nis']; ?></td>
                        <td><?php echo $d['nama_lengkap']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td><?php echo $d['password']; ?></td>
                        <td><?php echo $d['level']; ?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <p syle="line-height: 1rem;">Mengetahui</p>
                <p class="">Kepala Dinas Perpusataan Daerah Kota Banjar</p>
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