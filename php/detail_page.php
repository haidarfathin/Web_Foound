<?php
include 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM lost INNER JOIN users ON users.username=lost.username WHERE lost.id=$id");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?php echo strtoupper($data['nama_barang']); ?> | Details page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            background-color: #e6e6e6;
            font-family: 'Poppins', sans-serif;
        }

        .judul,
        .desc {
            width: 320px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .img-banner {
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 400px;
            width: 400px;
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
            margin-left: -400px;
            background-color: #ffff;
            padding: 20px;
            border-radius: 15px;
            width: 800px;
            max-height: 450px;
            overflow: auto;
        }

        .img-banner {
            border-radius: 3%;
        }

        i {
            color: #aaaaaa;
            font-size: 12px;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #444c74;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #fdd563;

        }

        .re {
            margin-bottom: 3px;
        }

        /* untuk modal */
        #img-bukti {
            width: 60%;
            cursor: pointer;
            transition: 0.3s;
        }

        #img-bukti:hover {
            opacity: 0.7;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 40%;
            max-width: 700px;
        }

        .modal-content {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
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
                <img src="data_gambar/<?php echo $data['gambar'] ?>" class="img-banner" />
            </div>
            <div class="col-md-6" style="padding: 0 10px 0 50px ; max-width: 400px; overflow: hidden; text-overflow: ellipsis;">
                <h2 class="judul"><b><?php echo strtoupper($data['nama_barang']); ?></b></h2>
                <p class="desc"><?php echo $data['desc_barang'] ?></p>
                <p><b>Tempat : </b> <?php echo $data['area']; ?></p>
                <p><b>Waktu : </b> <?php echo $data['tanggal']; ?></p>
                <hr class="solid">
                <?php
                if ($data['returned'] == '1') {
                    echo "
                        <p class='re'><b>Barang ini telah dikembalikan...</b></p>
                        <p class='re'>Nama Pemilik : " . $data['nama_pemilik'] . "</p>
                        <p class='re'>Status : " . $data['status_pemilik'] . "</p>
                        <p class='re'>Kelas : " . $data['kelas'] . "</p>
                        <img src='foto_bukti/" . $data['foto_bukti'] . "' id='img-bukti'/><br>
                        ";
                }
                ?>
                <br>
                <p><i>Merasa memiliki ? Hubungi</i></p>
                <a href="https://api.whatsapp.com/send/?phone=<?php echo $data['nomor']; ?>&text=%20Hai,%20kayanya%20itu%20punyaku%20deh...&type=phone_number&app_absent=0">
                    <button type="button" class="btn btn-primary" style="display:inline-block; background-color: #25D366; border: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/479px-WhatsApp.svg.png" style="float: left; margin-right: 0.5em; max-width: 1.5em;">Hubungi Whatsapp
                    </button>
                </a>

            </div>
        </div>
    </div>


    <div id="myModal" class="modal">
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
        var modal = document.getElementById('myModal');
        var img = document.getElementById('img-bukti');
        var modalImg = document.getElementById("img01");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>