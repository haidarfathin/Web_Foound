<!DOCTYPE html>
<html lang="en">
<?php 
include "config.php";
if(isset($_POST['submit']))
{
    if(!isset($_FILES['gambar']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $keterangan = $_POST['keterangan'];
            $conn->query("insert into 'gambar' ('gambar','nama_gambar') values ('$image','$file_name')");
            header("location:home_page.php");
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah kehilangan</title>
</head>

<body>
    <h1>Tambah kehilangan</h1>
    <a href="home_page.php">back</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <!-- <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Deskripsi Barang</td>
                <td><textarea name="desc_barang"></textarea></td>
            </tr>
            <tr>
                <td>Tempat Kehilangan</td>
                <td><input type="text" name="area"></td>
            </tr>
            <tr>
                <td>Tanggal kehilangan</td>
                <td><input type="date" name="tanggal"></td>
            </tr>
            <tr>
                <td>Kontak</td>
                <td><input type="text" name="kontak"></input></td>
            </tr>
            <tr> -->
                <td>Gambar</td>
                <td><input type="file" name="gambar"></input></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="submit">
                    <a href="home_page.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>