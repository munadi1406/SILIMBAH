<?php
//Mulai Sesion
session_start();


//KONEKSI DB
include "../koneksi.php";
include "../prosesLoginRegister.php";

if (!isset($_SESSION["username"])) {
	echo '<script>
                alert("Mohon login dahulu !");
                window.location="../?page=login";
             </script>';
	return false;
}
?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LIMBAH SCINCARE</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<script src="https://kit.fontawesome.com/85282e1914.js" crossorigin="anonymous"></script>
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">


				<li class="nav-item d-none d-sm-inline-block">

					<a href="index.php" class="nav-link">
						<font color="white">
							<b>
								<!-- <?php echo $nama; ?> -->
							</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- sidebar -->
		<?php include './nav.php'; ?>
		<!-- close sidebar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					error_reporting(0);
					switch ($_GET['page']) {
						default:
							include "dashboard.php";
							break;
						case "dashboard";
							include "dashboard.php";
							break;


							// limbah

						case "limbah-add";
							include "../limbah/limbah_add.php";
							break;
						case "limbah-show";
							include "../limbah/limbah_show.php";
							break;
						case "limbah-edit";
							include "../limbah/limbah_edit.php";
							break;
						case "limbah-delete";
							include "../limbah/limbah_delete.php.php";
							break;
						case "limbah-update";
							include "../limbah/limbah_update.php";
							break;
							// limbah
						case "proses-add-limbah";
							include "../limbah/proses.php";
							break;
						case "add-limbah-push";
							include "../limbah/push.php";
							break;


							// user 
						case "ubah-role";
							include "../user/ubah_role.php";
							break;
						case "user-add";
							include "../user/user_add.php";
							break;
						case "user-show";
							include "../user/user_show.php";
							break;
						case "user-edit";
							include "../user/user_edit.php";
							break;
						case "user-update";
							include "../user/user_update.php";
							break;
						case "req-register";
							include "../reqRegister/req_user.php";
							break;
						case "very-user";
							include "../reqRegister/very_user.php";
							break;
						case "veryfy";
							include "../user/veryfy.php";
							break;
					}
					?>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<span>Kelompok ?</span>

				<!-- All rights reserved. -->
			</div>
			<b>SISTEM INFORMASI LIMBAH SKINCARE</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>