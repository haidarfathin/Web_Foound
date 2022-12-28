<!-- tampil data -->
<?php
include "getdata.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Foound | Share jarkom kehilanganmu</title>
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

    .form-control:focus {
      border: none;
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

<body style="background-color: #e6e6e6;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #444c74; height: 80px; padding: 0 30px 0 30px;">
    <div class="container-fluid">
      <img height="50" src="images/logo-new.png" alt="LAF logo" draggable="false" />
      <ul class="d-flex" style="list-style-type:none;margin-top: 15px;">
        <?php
        if (!isset($_SESSION['name'])) {
          $username = ' ';
          echo "<script type='text/javascript'>alert('Silahkan login, apabila ingin menambahkan barang')</script>";
        } else {
          $username = $_SESSION['name'];
        }
        function welcomeName($username)
        {
          echo '
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Halo, ' . $username . '
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile_page.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>';
        }
        if (!isset($_SESSION['name'])) {
          echo "<a href='../index.php' class='wel-text'>Login dulu yuk</a>";
        } else {
          welcomeName($username);
        }
        ?>
      </ul>
    </div>
  </nav>


  <div class="cont-header">
    <h2><b>Apa yang hilang ?</b></h1>
      <form action="" method="post">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Cari nama, tempat atau deskripsi barang" name="keyword" />
          <button type="submit" class="btn" name="cari" style="z-index:auto;">Cari</button>
        </div>
      </form>
  </div>
  <div class="row justify-content-md-center" style="margin: 20px 0 0 0;">
    <?php
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
              <!-- <a href="detail_page.php?id=<?php echo $x['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a> -->
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
    ?>
  </div>

  <!-- act button -->
  <?php
  if (isset($_SESSION['name'])) { ?>
    <a href="#divOne" class="act-btn">+</a>
  <?php
  }
  ?>
  <div class="overlay" id="divOne">
    <div class="wrapper">
      <h4>Postingan Baru</h4><a class="close" href="#">&times;</a>
      <div class="content">
        <div class="float-page">
          <form action="adddata.php" id="additem" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $_SESSION['name'] ?>" name="userid">
            <label>Nama barang</label>
            <input placeholder="Nama barang.." type="text" name="nama_barang" required>
            <label>Deskripsi barang</label>
            <textarea rows="3" cols="40" placeholder="Deskripsi barang" name="desc_barang" required></textarea>
            <label>Tempat penemuan</label>
            <input placeholder="Tempat penemuan barang.." type="text" name="area" required>
            <label>Tanggal penemuan</label>
            <input type="datetime-local" name="tanggal" required><br>
            <label>Foto barang</label>
            <button type="button" class="btn-warning">
              <input type="file" name="gambar" accept="image/*.png,.jpg, .jpeg" required>
            </button>
            <br><br>
            <input type="submit" value="Simpan" name="submit" class="btn btn-fly">
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>