<?php
// Display selected user data based on id
// Getting id from url
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
$result = mysqli_query($conn, "SELECT * FROM data_limbah WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $jl = $data['jenis_limbah'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Status Limbah</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=limbah-update" class="form-horizontal">
                    <div class="form-group">
                        <label for="nim" class="col-sm-2 control-label">Jenis Limbah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jl" value="<?php echo $jl; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Status Limbah</label>
                        <div class="col-sm-10">
                            <select class="" name="statuslimbah">
                                <?php $status = $data['status_limbah']; ?>
                                <option value="sudah di ambil" <?php if ($status === 'sudah di ambil') echo 'selected'; ?>>Sudah Di Ambil</option>
                                <option value="belum di ambil" <?php if ($status != 'sudah di ambil') echo 'selected'; ?>>Belum Di Ambil</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>