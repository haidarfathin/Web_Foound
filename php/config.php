<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "lost_found";
    $conn = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : ". mysqli_connect_error();
    }

    function cek_nama($username,$conn){
        $username = mysqli_real_escape_string($conn, $username);
        $query = "SELECT * FROM users WHERE username = '$username'";
        if( $result = mysqli_query($conn, $query) ) 
        return mysqli_num_rows($result);
    }
    
    function setNomor($nomor){
        $potong = substr($nomor, 1);
        $fnomor = '62'.$potong;
        return $fnomor;
    }
?>