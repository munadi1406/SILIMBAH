<?php
include '../koneksi.php';
session_start();
?>
<div class="card">
   <div class="card-header">
      <strong>Informasi</strong>
   </div>
   <div class="card-body">

      <?php
      $result = $conn->query("SELECT * FROM users");
      $resInactive = $conn->query("SELECT * FROM users where status = 'inactive' ");
      $resActive = $conn->query("SELECT * FROM users where status = 'active' ");
      $resLimbah = $conn->query("SELECT * FROM data_limbah");

      // Dapatkan jumlah user dari hasil query
      $num_users = $result->num_rows;
      $num_InActive = $resInactive->num_rows;
      $num_Active = $resActive->num_rows;
      $num_Limbah = $resLimbah->num_rows;

      ?>

      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
               <div class="inner">
                  <h3>
                     <?php echo $num_Active;  ?>
                  </h3>

                  <p>Jumlah Users Aktif</p>
               </div>
               <div class="icon">
               <i class="fa-solid fa-user-plus"></i>
               
               </div>
               <a href="?page=user-show" class="small-box-footer">More

               </a>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3>
                     <?php echo $num_InActive;  ?>
                  </h3>

                  <p>Jumlah Users Belum Di Aktifkan</p>
               </div>
               <div class="icon">
               <i class="fa-regular fa-user"></i>
               </div>
               <a href="?page=req-register" class="small-box-footer">More

               </a>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
               <div class="inner">
                  <h3>
                     <?php echo $num_users;  ?>
                  </h3>

                  <p>Jumlah Pengguna </p>
               </div>
               <div class="icon">
                  <i class="fa-solid fa-users"></i>
               </div>
               <a href="?page=user-show" class="small-box-footer">More

               </a>
            </div>
         </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>
                     <?php echo $num_Limbah;  ?>
                  </h3>

                  <p>Jumlah Data Limbah</p>
               </div>
               <div class="icon">
                  <i class="fa-solid fa-trash-can"></i>
               </div>
               <a href="?page=limbah-show" class="small-box-footer">More

               </a>
            </div>
         </div>
         <!-- ./col -->
      </div>
   </div>