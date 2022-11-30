<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah kehilangan</title>
</head>

<body>
    <h1>Tambah kehilangan</h1>
    <a href="home_page.php">back</a>
    <form action="adddata.php" method="post">
        <table>
            <tr>
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
            <!-- <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></input></td>
            </tr> -->
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