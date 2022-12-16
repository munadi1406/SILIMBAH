<?php
include "../koneksi.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location:../dashboard/?page=user-show");