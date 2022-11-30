<?php

include 'config.php';
$nama_barang = $_POST['nama_barang'];
$desc_barang = $_POST['desc_barang'];
$area = $_POST['area'];
$tanggal = $_POST['tanggal'];
$kontak = $_POST['kontak'];
if (isset($_POST['tombol'])) {
    if (!isset($_FILES['gambar']['tmp_name'])) {
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    } else {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png')) {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            mysqli_query($conn, "INSERT INTO lost (nama_barang, desc_barang, area, tanggal, kontak, gambar) 
                VALUES ('" . $nama_barang . "','" . $desc_barang . "','" . $area . "','" . $tanggal . "','" . $kontak . "','$image')");
            header('location:home_page.php');
        } else {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
