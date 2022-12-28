<?php
include "config.php";
$query = $conn->query("SELECT * FROM lost ORDER BY id DESC");
$hasil = array();
while ($fetchData = $query->fetch_assoc()) {
    $hasil[] = $fetchData;
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $query = mysqli_query($conn, "SELECT * FROM lost WHERE 
                                nama_barang LIKE '%$keyword%' OR
                                desc_barang LIKE '%$keyword%' OR
                                area LIKE '%$keyword%'
                                ORDER BY id DESC");
    $cari = array();
    while ($fetchData = $query->fetch_assoc()) {
        $cari[] = $fetchData;
    }
} 