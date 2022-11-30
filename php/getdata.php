<?php 
include "config.php";
// function read(){
//     $data = "SELECT nama_barang, area, tanggal, kontak FROM lost";
//     while($row = $data){
//         $hasil[] = $row;
//     }
//     return $hasil;
// }
// // $koneksi->close();
$queryResult = $conn->query("SELECT * FROM lost");
$hasil = array();
while($fetchData=$queryResult->fetch_assoc()){
    $hasil[] = $fetchData;
}
// $data = $queryResult->fetch_assoc();
// echo json_encode($hasil); -> untuk ke mobile jadiin json dlu
?>