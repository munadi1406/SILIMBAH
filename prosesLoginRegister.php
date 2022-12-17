<?php
///////////////////////////////////////
/////////// START AKSI LOGIN //////////
///////////////////////////////////////
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        if (password_verify($pass, $row["password"])) {
            if ($row['status'] === 'active') {
                $_SESSION['username'] = $row['username'];
                $_SESSION['status'] = $row['status'];
                header('Location:./dashboard');
            } else {
                echo '<script>
                alert("Akun Anda Belum Di Aktifkan Admin...");
                window.location="' . $base_url . '/login.php";
             </script>';
            }
        } else {
            echo '<script>
                alert("Masukkan Password Yang Benar...");
                window.location="' . $base_url . '/login.php";
             </script>';
        }
    } else {
        echo '<script>
                alert("Akun Anda Tidak Ada !!!");
                window.location="' . $base_url . '/login.php";
             </script>';
    }
    $error = true;
}



//cek jika tombol register di klik
//maka jalankan script ini.
if (isset($_POST["register"])) {
    // Cek apakah form registrasi telah disubmit
    if (isset($_POST['register'])) {
        // Dapatkan data yang dimasukkan oleh user
        $username = $conn->real_escape_string($_POST['username']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        $email = $conn->real_escape_string($_POST['email']);
        $no_rekening = $conn->real_escape_string($_POST['no_rekening']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $no_telpon = $conn->real_escape_string($_POST['no_telpon']);

        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Jika email sudah terdaftar, tampilkan pesan error
            echo "Email sudah terdaftar. Silakan gunakan email lain.";
        } else {
            // Jika email belum terdaftar, simpan data ke dalam database
            try {
                $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
                $conn->query($query);

                $user_id = $conn->insert_id;
                $query = "INSERT INTO detail_users (user_id, no_rekening, alamat, no_telpon) VALUES ('$user_id', '$no_rekening', '$alamat', '$no_telpon')";
                $conn->query($query);

                echo '<script>
                alert("Registrasi Berhasil...");
                window.location="' . $base_url . '/login.php";
             </script>';
            } catch (Exception $e) {
                echo '<script>
                alert("Registrasi Gagal !");
                window.location="' . $base_url . '/register.php";
             </script>';
            }
        }
    }
}
