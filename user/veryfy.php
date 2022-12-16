<?php

// Koneksikan ke database
include '../koneksi.php';

// Dapatkan data dari form
$id = $conn->escape_string($_POST["id"]);
$status = $conn->escape_string($_POST["status"]);

// Buat query UPDATE
$query = "UPDATE users SET status = '$status' WHERE id = $id";

// Jalankan query
$result = $conn->query($query);

if ($result) {
  // Jika berhasil, tampilkan pesan sukses
  echo '<script>alert("Success...");window.location="' . $base_url . '/dashboard/?page=user-show";</script>';
} else {
    //   echo "Terjadi kesalahan saat mengubah status pengguna: " . $conn->error;
}

?>
