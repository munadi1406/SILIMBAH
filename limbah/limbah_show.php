<div class="card">
    <div class="card-header">
        <strong>Data Limbah</strong>
    </div>
    <div class="card-body">
        <form action="?page=limbah-show" method="POST">
            <div class=" input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Nama Atau Jenis Limbah..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="Cari" id="button-search" name="search">Cari !</button>
                </div>
            </div>
        </form>
        <!-- <div class="col-md-12"> -->
        <a href="?page=limbah-add" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover m-0">
                <?php
                include '../koneksi.php';
                session_status() === PHP_SESSION_ACTIVE ?: session_start();
                $id = $_SESSION['user_id'];
                $limit = 10;
                $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;

                if ($_SESSION['role'] == 'admin') {
                    $query = mysqli_query($conn, "SELECT users.*, data_limbah.* FROM users JOIN data_limbah ON users.id = data_limbah.user_id ORDER BY data_limbah.created_at DESC LIMIT $mulai, $limit");
                } elseif ($_SESSION['role'] == 'user') {
                    $query = mysqli_query($conn, "SELECT * FROM data_limbah WHERE user_id = $id");
                }

                if (!$query) {
                    echo "Error: " . mysqli_error($conn);
                }

                // $query = mysqli_query($conn, "SELECT * FROM data_limbah $mulai, $limit");
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <?php
                        include '../koneksi.php';
                        session_status() === PHP_SESSION_ACTIVE ?: session_start();
                        $role = $_SESSION['role'];
                        if ($role === 'admin') {
                            echo ' <th>Nama Penginput</th>';
                        }
                        ?>
                        <th>Jenis Limbah</th>
                        <th>Waktu Pengangkutan</th>
                        <th>Keterangan</th>
                        <th>Lokasi</th>
                        <th>Jumlah\kg</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $keyword = trim($_POST['keyword']);
                        if (!empty($keyword)) {
                            $query = mysqli_query($conn, "SELECT users.*, data_limbah.* FROM users JOIN data_limbah ON users.id = data_limbah.user_id WHERE jenis_limbah LIKE '%" . $keyword . "%'");
                        }
                    }
                    $no = $mulai + 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <?php
                            include '../koneksi.php';
                            session_status() === PHP_SESSION_ACTIVE ?: session_start();
                            $role = $_SESSION['role'];
                            if ($role === 'admin') {
                                echo "<td>" . $data['username'] . "</td>";
                            }
                            ?>
                            <td><?php echo $data['jenis_limbah']; ?></td>
                            <td><?php echo $data['waktu_pengangkutan']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['lokasi']?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['status_limbah']; ?></td>

                            <td>
                                <?php
                                include '../koneksi.php';
                                session_status() === PHP_SESSION_ACTIVE ?: session_start();
                                $role = $_SESSION['role'];
                                if ($role === 'admin') {
                                    echo '<a class="btn btn-sm btn-success" href="?page=limbah-edit&id=' . $data['id'] . '"><i class="fa-solid fa-pen-to-square"></i> Edit</a>';
                                }
                                ?>

                                <a class="btn btn-sm btn-danger" href="../limbah/limbah_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fa-solid fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM data_limbah");
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
                    echo '<li class="page-item"><a class="page-link" href="?page=limbah-show&halaman=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=limbah-show&halaman=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=limbah-show&halaman=' . $i . '">' . $i . '</a></li>';
                }
                if ($page == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                    echo '<li class="page-item"><a class="page-link" href="?page=limbah-show&halaman=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=limbah-show&halaman=' . $jumlah_page . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>