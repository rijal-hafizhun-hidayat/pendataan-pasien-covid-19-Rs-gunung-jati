<?php
require("konek.php");
$id_bayar = $_GET['id_bayar'];
if (isset($id_bayar)) {
    $delete = mysqli_query($konek, "DELETE FROM bayar WHERE id_bayar = $id_bayar "); ?>
    <script>
        alert('data berhasil di hapus');
        window.location = "tables.php";
    </script>
<?php } else { ?>
    <script>
        alert('data gagal di hapus');
        window.location = "tables.php";
    </script>
<?php } ?>