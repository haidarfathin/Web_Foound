<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit barang</title>
</head>

<body>
    <?php
    include 'config.php';
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM lost WHERE id=$id");
    $data = $result->fetch_assoc();
    ?>
    <h1>Edit Barang</h1>
    <a href="home_page.php">back</a>
    <form action="editdata.php" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" value="<?php echo $data["nama_barang"] ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi Barang</td>
                <td><textarea name="desc_barang"><?php echo $data["desc_barang"] ?></textarea></td>
            </tr>
            <tr>
                <td>Tempat Kehilangan</td>
                <td><input type="text" name="area" value="<?php echo $data["area"] ?>"></td>
            </tr>
            <tr>
                <td>Tanggal kehilangan</td>
                <td><input type="date" name="tanggal" value="<?php echo $data["tanggal"] ?>"></td>
            </tr>
            <tr>
                <td>Kontak</td>
                <td><input type="text" name="kontak" value="<?php echo $data["kontak"] ?>"></input></td>
            </tr>
            <tr>
                <td>Returned</td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="returned" <?php
                                                                                                                                    if ($data['returned'] == '1') {
                                                                                                                                        echo "value='0' checked";
                                                                                                                                    } else if ($data['returned'] == '0') {
                                                                                                                                        echo "value='1'";
                                                                                                                                    }
                                                                                                                                    ?>>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan">
                    <a href="home_page.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>