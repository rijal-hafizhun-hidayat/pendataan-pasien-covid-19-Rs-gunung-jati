<?php
session_start();
include 'konek.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gender = $_POST['jenis_kelamin'];
    $level_ruang = $_POST['level_ruang'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    if ($jumlah_bayar >= $level_ruang && $jumlah_bayar <= $level_ruang) {
        $sql = "INSERT INTO bayar (nama_pembayar, gender, level_ruang, jumlah_bayar) VALUES ('$nama', '$gender', '$level_ruang', '$jumlah_bayar')";
        $add = mysqli_query($konek, $sql);
        if ($add) {
            header('location:lobby.php?status=sukses');
        } else {
            header('location:lobby.php?status=gagal');
        }
    }
    else if($jumlah_bayar >= $level_ruang && $jumlah_bayar >= $level_ruang){
        $sql = "INSERT INTO bayar (nama_pembayar, gender, level_ruang, jumlah_bayar) VALUES ('$nama', '$gender', '$level_ruang', '$jumlah_bayar')";
        $add = mysqli_query($konek, $sql);
        if ($add) {
            header('location:lobby.php?status=sukses');
        } else {
            header('location:lobby.php?status=gagal');
        }
    }
    else{
        header('location:bayar.php?status=gagal');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pembayaran Ruang Pasien</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logorsgj.png">

</head>

<body id="page-top">
    <?php
    if ($_SESSION['level'] == 'staff') { ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="lobby.php">
                    <div class="sidebar-brand-text mx-3">Rs Gunung Jati</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="lobby.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="far fa-clipboard"></i>
                        <span>Staff</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tools:</h6>
                            <a class="collapse-item" href="register.php">Buat Akun</a>
                            <a class="collapse-item" href="data_akun.php">Data Akun</a>
                            <a class="collapse-item" href="bayar.php">Bayar</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-user-md"></i>
                        <span>Dokter</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tools:</h6>
                            <a class="collapse-item" href="tables.php">Data Pasien</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span style="font-size: 15px;" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Booking Tempat Huni</h1>
                        <!-- isi content -->
                        <form class="bayar" method="POST" action="">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Masukkan Nama penghuni" name="nama" required="">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" aria-label="Default select example" name="jenis_kelamin" required="">
                                        <option selected value="">Pilih Jenis Kelamin</option>
                                        <option value="laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" aria-label="Default select example" name="level_ruang" required="">
                                        <option selected value="">Pilih Level Ruang</option>
                                        <option value="500000">Reguler/500.000</option>
                                        <option value="1000000">Premium/1.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword" placeholder="Masukkan Nominal" name="jumlah_bayar" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Rs Gunung Jati 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">klik "Logout" jika ingin keluar dari web.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    <?php
    } else { ?>
        <script>
            alert("maaf status anda bukan staff");
            window.location = "lobby.php";
        </script>
    <?php } ?>
    <?php
        if (isset($_GET['status'])) {
             if ($_GET['status'] == 'gagal') {?>
                 <script>
                    alert("Maaf Uang Yang Di Input Kurang");
                    window.location = "bayar.php";
                </script>
            <?php }
         } 


     ?>
</body>

</html>
