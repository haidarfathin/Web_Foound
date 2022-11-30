<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "lost_found";
    $conn = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : ". mysqli_connect_error();
    }
?>