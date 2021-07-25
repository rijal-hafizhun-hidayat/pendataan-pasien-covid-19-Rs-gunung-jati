<?php
require("konek.php");
$id_akun = $_GET['id_akun'];
if (isset($id_akun)) {
    $delete = mysqli_query($konek, "DELETE FROM akun WHERE id_akun = $id_akun "); ?>
    <script>
        alert('data berhasil di hapus');
        window.location = "data_akun.php";
    </script>
<?php } else { ?>
    <script>
        alert('data gagal di hapus');
        window.location = "data_akun.php";
    </script>
<?php } ?>