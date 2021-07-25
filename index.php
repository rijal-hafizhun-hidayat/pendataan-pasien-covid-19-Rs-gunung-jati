<?php 
    session_start();
    include 'konek.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <style>
        .gambar{
            width: 200px;
            height: 200px;
            margin: 100px 100px;
        }
    </style>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <title>rumah sakit gunung jati</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" action="cek_login.php">
                            <div class="col-lg-6 d-none d-lg-block img-fluid">
                                <img class="gambar" src="logorsgj.png" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username..." name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan Password..." name="password">
                                        </div>
                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block mt-5" value="login">
                                    </form>
                                    <?php 
                                        if (isset($_POST['login'])) {
                                            $user = $_POST['username'];
                                            $pass = $_POST['password'];
                                            $cek = mysqli_query($konek, "SELECT * FROM akun WHERE username = '$user' AND password = '$pass'");
                                            $baca = mysqli_fetch_array($cek);
                                            
                                            $username = $baca['username'];
                                            $password = $baca['password'];
                                            $level = $baca['level'];
                                            if ($user === $username && $pass === $password) {
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = $level;
                                                header('location:lobby.php?status=berhasil');
                                            }else{?>
                                                <script type="text/javascript">
                                                    alert('username atau password salah');
                                                </script>
                                           <?php }
                                        }
                                     ?>

</body>

</html>
