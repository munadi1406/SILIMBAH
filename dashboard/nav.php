<!-- Main Sidebar Container -->
<aside class="main-sidebar levation-4 sidebar-dark-primary">
	<!-- Brand Logo -->
	<a href="index.php" class="brand-link">
		<img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
		<span class="brand-text"> LIMBAH SCINCARE</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-2 pb-2 mb-2 d-flex">
			<div class="image" style="margin-top: 10px;">
				<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
			</div>
			<div class="info">
				<a href="index.php" class="d-block">
					<?php echo ($_SESSION['username']) ?>
				</a>
				<span class="badge badge-success">
					<?php echo $_SESSION['role']; ?>
				</span>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<!-- Level  -->
				<li class="nav-item">
					<a href="?page=dashboard" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				
				<?php
				include '../koneksi.php';
				session_status() === PHP_SESSION_ACTIVE ?: session_start();
				$role = $_SESSION['role'];
				if ($role === 'admin') {
					echo '
					<li class="nav-item">
					<a href="?page=user-show" class="nav-link">
						<i class="nav-icon far fa-solid fa-users"></i>
						
						<p>
							Data User
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="?page=req-register" class="nav-link">
						<i class="nav-icon fas fa-arrow-circle-right"></i>
						<p>
							Permintaan Register
						</p>
					</a>
				</li>';
				}
				?>
				
				<li class="nav-item">
					<a href="?page=limbah-show" class="nav-link">
						<i class="nav-icon fas fa-trash-can"></i>
						<!-- <i class="fa-solid fa-trash-can"></i> -->
						<p>
							Data Limbah
						</p>
					</a>
				</li>
				<br>
				<li class="nav-item">
					<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="../logout.php" class="nav-link">
						<i class="nav-icon far fa-solid fa-power-off" style="color: red;"></i>
						<!-- <i class="fa-solid fa-power-off"></i> -->
						<p>
							Logout
						</p>
					</a>
				</li>

		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>