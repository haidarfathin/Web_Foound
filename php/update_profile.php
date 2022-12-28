<?php
include 'config.php';
$usrnm = $_GET['name'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$usrnm'");
$data = $result->fetch_assoc();

function generateName($usrnm)
{
    date_default_timezone_set('Asia/Jakarta');
    $extensionImg = pathinfo($_FILES["foto_profil"]["name"], PATHINFO_EXTENSION);
    $nama_gambar = "profil-" . $usrnm . "." . $extensionImg;
    return $nama_gambar;
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor = $_POST['nomor'];
    $fnomor = setNomor($nomor);
    $file_tmp = $_FILES['foto_profil']['tmp_name'];
    $gambar = generateName($usrnm);
    move_uploaded_file($file_tmp, 'foto_profil/' . $gambar);
    $query = $query = mysqli_query($conn, "UPDATE users SET nama_lengkap='$nama_lengkap', nomor='$fnomor', foto_profil='$gambar' WHERE username='$name'");
    if ($query) {
        header('Location: profile_page.php');
    } else {
        echo "<script type='text/javascript'>alert('Gagal mengupload gambar, koneksi terganggu')</script>";
    }
}


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
            height: 380px;
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
            <h4><b>Update Profile <?php echo ucwords($usrnm); ?></b></h4><br>
            <div class="content">
                <div class="float-page">
                    <form action="" id="additem" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php $usrnm = $_GET['name'];
                                                    echo $usrnm; ?>" name="name">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?php echo ucwords($data['nama_lengkap']) ?>" required>
                        <label>Nomor Whatsapp</label>
                        <input type="text" class="input" placeholder="No.Whatsapp" name="nomor" value="<?php echo $data['nomor'] ?>" required />
                        <label>Foto Profile</label><br>
                        <button type="button" class="btn-warning">
                            <input type="file" name="foto_profil" accept="image/*.png,.jpg, .jpeg" required >
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