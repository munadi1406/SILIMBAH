<?php 
session_start();
include '../koneksi.php';

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$jenis_limbah = $_POST['jenis_limbah'];
$waktu_pengangkutan = $_POST['waktu_pengangkutan'];
$keterangan = $_POST['keterangan'];
$lokasi = $_POST['alamat'];
$jumlah = $_POST['jumlah'];

// Cek apakah input kosong
    $sql = "INSERT INTO data_limbah (id,user_id, jenis_limbah, waktu_pengangkutan, keterangan, lokasi, jumlah) VALUES (null,$user_id, '$jenis_limbah', '$waktu_pengangkutan', '$keterangan', '$lokasi', '$jumlah')";
    
    if (mysqli_query($conn, $sql)) {
        // header('location: ./dashboard/?page=limbah-show');

        echo '<script>
                alert("Data Limbah Berhasil Di Tambahkan...");
                window.location="./?page=limbah-show";
             </script>';
        // echo "data berhasil di tambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // tutup koneksi
    mysqli_close($conn);

?>