<!-- tampil data -->
<?php
include "getdata.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LostAndFound</title>
    <style>
        body {
            padding: 20px;
        }

        ul {
            padding: 10px;
        }

        .btn-primary {
            padding-bottom: 10px;
        }

        .card {
            background-color: #ffffff;
            width: 300px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <h3>Lost</h3>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h3>Lost</h3>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h3>Lost</h3>
            </a>
        </li>
    </ul>
    <a href="add_page.php"><button type="button" class="btn btn-primary">Tambah</button></a>
    <?php
    foreach ($queryResult as $x) {
    ?>
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/111.webp" class="img-fluid" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $x['nama_barang']; ?></h5>
                <p class="card-text">
                    <?php echo $x['desc_barang']; ?>
                </p>
                <p>Tempat: <?php echo $x['area']; ?></p>
                <a href="edit_page.php?id=<?php echo $x['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>

            </div>
            <div class="card-footer">
                <?php
                $tanggal_nemu = $x['tanggal'];
                $tanggal_nemu_formatted = date("d-M-Y", strtotime($tanggal_nemu));
                echo $tanggal_nemu_formatted;
                ?>
            </div>
        </div><br>
    <?php }
    ?>

    <a href="logout.php">Logout</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>