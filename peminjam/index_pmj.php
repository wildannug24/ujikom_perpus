<?php
session_start();
$SQL =  (isset($_SESSION["id_user"]) && $_SESSION["id_user"]);
include 'layout/header.php';
?>
<div class="container">
    <div class="row" style="margin-top: 5rem;">
        <div class="col-sm-7" style="margin-top: 5rem;">
            <h3>SELAMAT DATANG</h3>
            <h5>di Halaman Perpustakaan Digital</h5>
            <samp>"Hidup adalah sebuah buku dan membaca buku berulang kali dengan judul dan isi yang sama itu tetaplah
                indah,seperti mengulangi bersamamu lagi"</samp>
        </div>
        <div class="col-sm-5">
            <img src="../asset/img/ayo membaca.png" width="300" alt="">
        </div>
    </div>
</div>


<?php
include 'layout/footer.php';
?>