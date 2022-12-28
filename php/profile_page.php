<?php
include 'config.php';
session_start();
$hasil1 = mysqli_query($conn, "SELECT * FROM lost WHERE username='" . $_SESSION['name'] . "'");
$hasil2 = mysqli_query($conn, "SELECT * FROM users WHERE username='" . $_SESSION['name'] . "'");
$data1 = $hasil1->fetch_assoc();
$data2 = $hasil2->fetch_assoc();
$usrnm = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Foound | Profile page</title>
    <style>
        @font-face {
            font-family: "gotham-font";
            src: url("style/fonts/Gotham/Gothambold.ttf");
        }


        body {
            background-color: #e6e6e6;
        }

        .judul {
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 70px;
            font-family: "gotham-font";
        }

        .img-banner {
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 250px;
            width: 250px;

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
            margin-top: -250px;
            margin-left: -500px;
            background-color: #ffff;
            padding: 80px 120px;
            border-radius: 15px;
            max-width: 1000px;
        }

        .img-banner {
            border-radius: 3%;
        }

        .card {
            margin: 10px -12px;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            vertical-align: middle;
        }

        .check {
            margin-top: 30%;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="fab-container">
        <div class="iconbutton">
            <a href="home_page.php">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
    <div class="container cont-banner">
        <div class="row">
            <div class="col-md-6 img-col">
                <img src="foto_profil/<?php 
                    if($data2['foto_profil']==null){
                        echo 'default.jpg';
                    } else {
                        echo $data2['foto_profil'];
                    }
                ?>" class="img-banner" style="border-radius: 50%; padding-right:-90px" />
            </div>
            <div class="col-md-5" style="overflow: hidden; text-overflow: ellipsis; width:auto;margin-top:10px;">
                <p style="margin-bottom: -14px;">Profile</p>
                <h1 class="judul"><strong><?php echo ucwords($_SESSION['name']); ?></strong></h1>
                <h5><?php echo $data2['nama_lengkap'] ?></h5>
                <i>+<?php echo $data2['nomor'] ?></i><br><br>
                <a href="update_profile.php?name=<?php echo $usrnm; ?>" style="text-decoration:none;">
                    <button type="button" class="btn btn-dark">Edit Profile</button>
                </a>
            </div>
        </div>
        <br>
        <hr style="border: 0; border-top: 2px solid black">
        <h2>History</h2>
        <div class="container" style=" padding-top: 20px;">
            <?php
            foreach ($hasil1 as $y) { ?>

                <a href="
                    <?php
                    if ($y['returned'] == 0) {
                        echo 'update_page.php?id=' . $y['id'];
                    }
                    ?>" style="color: #212529;" title="Klik untuk mengkonfirmasi pengembalian">
                    <div class="card">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?php echo "data_gambar/" . $y['gambar']; ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" />
                            </div>
                            <div class="col-md" style="margin-top: 4px;">
                                <h4 style="margion-bttom: -4px; font-weight:bold;"><?php echo ucwords($y['nama_barang']) ?></h4>
                                <p><i>
                                        <?php if ($y['returned'] == 1) {
                                            echo "has already returned to <strong>" . $y['nama_pemilik'] . "</strong>";
                                        } else {
                                            echo 'Not returned yet';
                                        } ?>
                                    </i></p>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-circle-check fa-3x check" style="color:
                                <?php if ($y['returned'] == 1) {
                                    echo '#fdd563';
                                } else {
                                    echo '#a1a1a1';
                                } ?>;">
                                </i>
                            </div>
                        </div>
                    </div>
                </a>

            <?php
            }
            ?>

        </div>
        <br>
    </div>
</body>

</html>