<?php
include '../koneksi.php';
if (isset($_POST['update'])) {
 $id = $_POST['id'];
 $sl = $_POST['statuslimbah'];
 // update user data
 $result = mysqli_query($conn, "UPDATE data_limbah SET status_limbah='$sl' WHERE id=$id");
 

 if ($result) {
    // Jika berhasil, tampilkan pesan sukses
    echo '<script>alert("Success...");window.location="' . $base_url . '/dashboard/?page=limbah-show";</script>';
  } else {
      // Jika gagal, tampilkan pesan kesalahan
      //   echo "Terjadi kesalahan saat mengubah status pengguna: " . $conn->error;
  }


}
