<?php 
include 'config.php';
function generateName($usrnm, $file_gambar)
{
    date_default_timezone_set('Asia/Jakarta');
    $extensionImg = pathinfo($file_gambar, PATHINFO_EXTENSION);
    $nama_gambar = "profil-" . $usrnm . "." . $extensionImg;
    return $nama_gambar;
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor = $_POST['nomor'];
    if ($nomor == '') {
        $fnomor = $_POST['nomorAsli'];
    } else {
        $fnomor = setNomor($nomor);
    }
    $gambar_new = $_FILES["foto_profil"]["name"];
    if($gambar_new == '') {
        $gambar_old = $_POST["profil_old"];
        $gambar = generateName($name, $gambar_old);
    } else {
        $gambar = generateName($name, $gambar_new);
    }
    $file_tmp = $_FILES['foto_profil']['tmp_name'];
    move_uploaded_file($file_tmp, 'foto_profil/' . $gambar);
    $query = $query = mysqli_query($conn, "UPDATE users SET nama_lengkap='$nama_lengkap', nomor='$fnomor', foto_profil='$gambar' WHERE username='$name'");
    if ($query) {
        header('Location: profile_page.php');
    } else {
        echo "<script type='text/javascript'>alert('Gagal mengupload gambar, koneksi terganggu')</script>";
    }
}
