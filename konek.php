<?php
$konek = mysqli_connect("localhost", "root", "", "rumah_sakit");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal " . mysqli_connect_error();
}
?>