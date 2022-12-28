<?php

function generateName()
{
        date_default_timezone_set('Asia/Jakarta');
        $extensionImg = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $nama_gambar = "hilang-" . date("Ymd-His") . "." . $extensionImg;
        return $nama_gambar;
}

include 'config.php';
if ($_POST['submit']) {
        $nama_barang = $_POST['nama_barang'];
        $desc_barang = $_POST['desc_barang'];
        $area = $_POST['area'];
        $tanggal = $_POST['tanggal'];
        $userid = $_POST['userid'];
        // $gambar = $_FILES['gambar']['name'];
        // $x = explode('.', $gambar);
        $ukuran        = $_FILES['gambar']['size'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        if ($ukuran < 5242880) {
                move_uploaded_file($file_tmp, 'data_gambar/' . generateName());
                $query = mysqli_query($conn, "INSERT INTO lost (userid, nama_barang, desc_barang, area, tanggal, gambar) 
                VALUES ('" . $userid . "','" . $nama_barang . "','" . $desc_barang . "','" . $area . "','" . $tanggal . "','" . generateName() . "')");
                if ($query) {
                        header('Location: home_page.php');
                } else {
                        echo "<script type='text/javascript'>alert('Gagal mengupload gambar, koneksi terganggu')</script>";
                }
        } else {
                echo "<script type='text/javascript'>alert('Ukuran gambar maksimum 5MB')</script>";
        }
}
// 5242880