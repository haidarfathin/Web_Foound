<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM lost ORDER BY id DESC");
$hasil = array();
while ($fetchData = $query->fetch_assoc()) {
    $hasil[] = $fetchData;
}