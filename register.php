<?php
session_start(); //memulai session

//cek jika sebelumnya sudah ada session level
//maka redirect ke halaman berdasarkan level si pengguna.
if (isset($_SESSION["level"])) {
  header('Location: ./dashboard/');
}

include("koneksi.php"); //include koneksi database
include("prosesLoginRegister.php"); //include proses untuk merespon dari masing-masing action
?>



<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Limbah_skincare </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="css/login.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>No.Rekening</strong></label>
                                            <input type="text" class="form-control" id="no_rekening" name="no_rekening">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Alamat</strong></label>
                                            <input type="text" class="form-control" id="alamat" name="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Telepone</strong></label>
                                            <input type="text" class="form-control" id="no_telpon" name="no_telpon"><br><br>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" name="register" value="Register" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <!--endRemoveIf(production)-->
</body>

</html>