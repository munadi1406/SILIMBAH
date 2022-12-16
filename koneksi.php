<?php  

//set koneksi database
$host = "localhost"; //host
$user = "root"; //username host
$pass = ""; // password database
$db   = "db_limbah_skincare"; //nama database

$conn = mysqli_connect($host,$user,$pass,$db); //koneksi database
if (!$conn){
    die("Koneksi tidak terhubung");
}

//set base_url
$base_url = "http://localhost/limbah_skincare"; 
//ketikan nama folder utama anda sesudah http://localhost/(nama folder utama anda).
