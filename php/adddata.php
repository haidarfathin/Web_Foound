<?php

include 'config.php';
$nama_barang = $_POST['nama_barang'];
$desc_barang = $_POST['desc_barang'];
$area = $_POST['area'];
$tanggal = $_POST['tanggal'];
$kontak = $_POST['kontak'];
$conn->query("INSERT INTO lost (nama_barang, desc_barang, area, tanggal, kontak) 
        VALUES ('" . $nama_barang . "','" . $desc_barang . "','" . $area . "','" . $tanggal . "','" . $kontak . "')");

// header("location:home_page.php");    
