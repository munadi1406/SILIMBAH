<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $passwordBaru1 = $_POST['password_baru1'];
    $passwordBaru2 = $_POST['password_baru2'];
    // $passwordBaru = $_POST['password_baru'];
    if (!$passwordBaru2){
        echo '<script>alert("Konfimasi Password yang anda masukan salah");</script>';
        echo '<meta http-equiv="refresh" content="0; url=?page=user-edit&id=' . $id . '">';
        return false;
    }
    // echo '<script>alert("simpan");</script>';
    // update user data
    $passHash = password_hash($passwordBaru2, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "UPDATE users SET id='$id',username='$username',password='$passHash' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    // echo '<meta http-equiv="refresh" content="0; url=?page=user-show">';
    echo 'berhasil di ubah';
}


function ubah_role($id, $role)
{
    // Koneksi ke database
    include '../koneksi.php';

    // Query untuk mengubah role
    $query = "UPDATE users SET role = '$role' WHERE id = $id";

    // Jalankan query
    mysqli_query($conn, $query);

    // Tutup koneksi
    mysqli_close($conn);
}

// Panggil fungsi ubah_role
if (isset($_POST['id']) && isset($_POST['role'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];
    ubah_role($id, $role);
}

?>