<?php
include "../koneksi.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM data_limbah WHERE id=$id");
header("Location:../dashboard/?page=limbah-show");
// echo "<meta http-equiv='refresh' content='0; url=../?page=mahasiswa-show'>"
?>