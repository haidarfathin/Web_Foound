<?php
require '../getdata.php';
$keyword = $_GET['keyword'];
$query = mysqli_query($conn, "SELECT * FROM lost WHERE 
            nama_barang LIKE '%$keyword%' OR
            area LIKE '%$keyword%'
            ORDER BY id DESC");
$barang = array();
while ($fetchData = $query->fetch_assoc()) {
    $barang[] = $fetchData;
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: "gotham-font";
            src: url("style/fonts/Gotham/Gothambold.ttf");
        }

        .img-fluid {
            width: 400px;
            height: 300px;
            object-fit: cover;
        }

        .wel-text {
            text-decoration: none;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .wel-text:hover {
            color: #fdd563;
        }

        .text-drop {
            color: #e6e6e6;
        }

        .cont-header {
            margin-left: 40px;
            margin-top: 30px;
        }

        .input-group {
            width: 50%;
            margin-top: 20px;
        }

        .btn {
            background-color: #f9f9f9;
            color: #444c74;
            font-weight: bold;
            border-color: #444c74;
            display: block;
        }

        .btn:hover {
            background-color: #444c74;
            color: #e6e6e6;
        }

        .form-control {
            border-radius: 20px;
        }

        .form-control:focus{
            box-shadow: none;
        }

        .nav-link {
            color: #e6e6e6;
            font-weight: 400;
            font-size: 18px;
        }

        .nav-link:hover {
            color: #e6e6e6
        }
    </style>
</head>
<div class=" row justify-content-md-center" id="barang">
    <?php
    if (mysqli_num_rows($query) == 0) { ?>
        <div class="col-md-auto" style="text-align: center; align-items: center;margin-top:10%;">
            <p>Belum ada barang yang dilaporkan</p>
        </div>
        <?php
    } else {
        foreach ($query as $x) {
        ?>
            <div class="col-md-auto">
                <a href="detail_page.php?id=<?php echo $x['id']; ?>">
                    <div class="card" style="width: 300px;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="<?php echo "data_gambar/" . $x['gambar']; ?>" class="img-fluid" />
                            <a href="">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo strtoupper($x['nama_barang']); ?></b></h5>
                            <p class="card-text">
                                <?php echo $x['desc_barang']; ?>
                            </p>
                            <p><b>Tempat:</b> <?php echo $x['area']; ?></p>

                        </div>
                        <div class="card-footer">
                            <?php
                            $tanggal_nemu = $x['tanggal'];
                            $tanggal_nemu_formatted = date("d-M-Y", strtotime($tanggal_nemu));
                            echo $tanggal_nemu_formatted;
                            ?>
                        </div>
                    </div>
                    <br>
                </a>
            </div>
    <?php
        }
    }
    ?>
</div>

</html>