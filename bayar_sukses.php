<?php
session_start();
include 'konek.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gender = $_POST['jenis_kelamin'];
    $level_ruang = $_POST['level_ruang'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $sql = "INSERT INTO bayar (nama_pembayar, gender, level_ruang, jumlah_bayar) VALUES ('$nama', '$gender', '$level_ruang', '$jumlah_bayar')";
    $add = mysqli_query($konek, $sql);
    if ($add) {
        header('location:lobby.php?status=sukses');
    } else {
        header('location:lobby.php?status=gagal');
    }
}
