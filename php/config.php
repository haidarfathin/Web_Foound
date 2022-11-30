<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "lost_found";
    $conn = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : ". mysqli_connect_error();
    }

    // function edit_id($kode_barang){
    //     $queryWithId = mysqli_query($this->conn, "SELECT * FROM lost WHERE id='$kode_barang'");
    //     while($ro    w_barang = mysqli_fetch_array($queryWithId)){
    //         $hasil_barang[] = $row_barang;
    //     }
    //     return $hasil_barang;
    // }

?>