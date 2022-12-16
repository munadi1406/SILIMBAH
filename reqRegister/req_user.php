<?php 
include '../koneksi.php';

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
?>


<div class="card">
    <div class="card-header">
        <strong>Data Permintaan Register</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-show" method="POST">
            <div class=" input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Username..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="Cari" id="button-search" name="search">Cari !</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover m-0">
                <?php
                include '../koneksi.php';
                $limit = 5;
                $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;
                $query = mysqli_query($conn, "SELECT users.*, detail_users.* FROM users JOIN detail_users ON users.id = detail_users.user_id WHERE status = 'inactive' LIMIT $mulai, $limit");

                ?>
                <thead>
                    <tr>
                        <th style="text-align:center;">No</th>
                        <th>Username</th>
                        <th>No Telepon</th>
                        <th>No Rek</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $keyword = trim($_POST['keyword']);
                        if (!empty($keyword)) {
                            $query = mysqli_query($conn, "SELECT * FROM users WHERE username LIKE '%" . $keyword . "%'");
                        }
                    }
                    $no = $mulai + 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['no_telpon']; ?></td>
                            <td><?php echo $data['no_rekening']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td>
                                <form action="?page=very-user" method="POST">
                                <?php $id = $data['id'];
                                    $status = $data['status']; ?>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <select name="status" id="">
                                        <option value="active" <?php if ($status == 'active') echo 'selected'; ?>>Aktif</option>
                                        <option value="inactive" <?php if ($status == 'inactive') echo 'selected'; ?>>Tidak Aktif</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Ubah" name="very_user" class="btn btn-primary">
                                </td>
                            </form>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM users WHERE status = 'inactive'");
        $total_records = mysqli_num_rows($result);
        ?>
        <p>Jumlah Data : <?php echo $total_records; ?></p>
        <nav class="mb-5">
            <ul class="pagination justify-content-end">
                <?php
                $jumlah_page = ceil($total_records / $limit);
                $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number :
                    $jumlah_page;
                if ($page == 1) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                } else {
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' .
                        $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=user-show&halaman=' . $i . '">' . $i . '</a></li>';
                }
                if ($page == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' . $jumlah_page . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>