<?php
include 'config.php';
function generateName()
{
    date_default_timezone_set('Asia/Jakarta');
    $extensionImg = pathinfo($_FILES["foto_bukti"]["name"], PATHINFO_EXTENSION);
    $nama_gambar = "pemilik-" . date("Ymd-His") . "." . $extensionImg;
    return $nama_gambar;
}
if ($_POST['submit']) {
    $id = $_POST['id'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $status = $_POST['status'];
    $kelas = strtoupper($_POST['kelas']);
    $file_tmp = $_FILES['foto_bukti']['tmp_name'];
    $gambar = generateName();
    move_uploaded_file($file_tmp, 'foto_bukti/' . $gambar);
    $query = $query = mysqli_query($conn, "UPDATE lost SET nama_pemilik='$nama_pemilik', status_pemilik='$status', foto_bukti='$gambar', kelas='$kelas', returned='1' WHERE id='$id'");
    if ($query) {
        header('Location: profile_page.php');
    } else {
        echo "<script type='text/javascript'>alert('Gagal mengupload gambar, koneksi terganggu')</script>";
    }
}
