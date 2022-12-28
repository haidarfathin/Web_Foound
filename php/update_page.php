<?php
include 'config.php';
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Konfirmasi pengembalian</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            background-color: #e6e6e6;
            font-family: 'Poppins', sans-serif;
        }

        a {
            text-decoration: none
        }

        .fab-container {
            position: fixed;
            left: 50px;
            top: 50px;
        }

        .iconbutton {
            width: 60px;
            height: 60px;
            border-radius: 100%;
            box-shadow: 1px 5px 5px #aaaaaa;
            background: #444c74;
        }

        .iconbutton i {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: white;
        }

        .cont-banner {
            top: 50%;
            left: 50%;
            display: block;
            position: absolute;
            margin-top: -200px;
            margin-left: -300px;
            background-color: #ffff;
            padding: 20px;
            border-radius: 15px;
            width: 600px;
            height: 480px;
            overflow: auto;
        }

        .img-banner {
            border-radius: 3%;
        }

        i {
            color: #aaaaaa;
            font-size: 12px;
        }

        .re {
            margin-bottom: 3px;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
            margin: 0 auto;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .wrapper h2 {
            margin-top: 0;
            color: #333;
        }

        .btn-warning {
            position: relative;
            padding: 11px 16px;
            width: 350px;
        }

        form label {
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 3px;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 8px;
            resize: vertical;

        }

        input[type="datetime-local"] {
            position: relative;
            height: 4S0px;
            border: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="fab-container">
        <div class="iconbutton">
            <a href="profile_page.php">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
    <div class="container cont-banner">
        <div class="wrapper">
            <h4><b>Konfirmasi Pengembalian</b></h4><br>
            <div class="content">
                <div class="float-page">
                    <form action="updatedata.php" id="additem" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php $id = $_GET['id'];
                                                    echo $id; ?>" name="id">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_pemilik" required>
                        <label>Status</label>
                        <select class="form-select" name="status" required>
                            <option selected>Pilih Status pemilik</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="pengajar">Pengajar</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <label>Kelas</label><i style="display: inline-block; font-size: 12px; color: red;">*kosongi jika bukan mahasiswa</i>
                        <input type="text" name="kelas">
                        <label>Foto Bukti</label><br>
                        <i style="font-size: 12px;">Bukti berupa foto pemilik bersama barang</i><br>
                        <button type="button" class="btn-warning">
                            <input type="file" name="foto_bukti" accept="image/*.png,.jpg, .jpeg" required>
                        </button>
                        <br><br>
                        <input type="submit" value="Submit" name="submit" class="btn btn-success" style="background-color: #fdd563; border: none; color: black;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>