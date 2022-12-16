<?php include "../koneksi.php" ?>
<?php
if (!isset($_SESSION["username"])) {
    echo '<script>
                alert("Anda Belum Login !");
                window.location="../?page=login";
             </script>';
    return false;
} elseif ($_SESSION['role'] != "admin") {
    echo '<script>
                alert("Anda Tidak Memiliki Akses Ke Halaman Ini...");
                window.location="' . $base_url . '/dashboard";
             </script>';
} else {
    header('location:' . $base_url . '/dashboard');
}


$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
}
?>
<div class="card">
    <div class="card-header">
        <strong>Edit</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-update" method="POST">
            <!-- <?php echo $password ?> -->
            <!-- <input type="hidden" name="password_lama1" class="form-control" placeholder="Username" value="<?php echo $password; ?>"> -->
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_lama2" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru1" class="form-control" placeholder="Password Baru" required">
                </div>
            </div>
            <div class=" form-group row">
                <label for="password_baru" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru2" class="form-control" placeholder="Password Baru" required>
                </div>
            </div>
    </div>
    <div class=" card-footer bg-transparent">
        <input type="hidden" name="id" value=<?php echo $id; ?>>
        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    </form>
</div>