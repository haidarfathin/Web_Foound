<?php 
    include 'config.php';
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $desc_barang = $_POST['desc_barang'];
    $area = $_POST['area'];
    $tanggal = $_POST['tanggal'];
    $kontak = $_POST['kontak'];
    $returned = $_POST['returned'];
    $query = "UPDATE lost
                    SET nama_barang='".$nama_barang."',desc_barang='".$desc_barang."',area='".$area."',tanggal='".$tanggal."',kontak='".$kontak."',returned='".$returned."'
                    WHERE id=$id";
    $updateQuery = $conn->query($query);
    if($updateQuery){
        header('location:home_page.php');
    } else {
        echo "gagal";
    }
?>  