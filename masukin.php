<?php
include "php/config.php";
session_start();
if (isset($_POST['daftar'])) {
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$nomor     = stripslashes($_POST['nomor']);
	$nomor     = mysqli_real_escape_string($conn, $nomor);
	$finalNomor = setNomor($nomor);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	$repass   = stripslashes($_POST['cpassword']);
	$repass   = mysqli_real_escape_string($conn, $repass);
	if (!empty(trim($username)) && !empty(trim($nomor)) && !empty(trim($password)) && !empty(trim($repass))) {
		if ($password == $repass) {
			if (cek_nama($username, $conn) == 0) {
				$pass  = password_hash($password, PASSWORD_DEFAULT);
				$query = "INSERT INTO users (username, password, nomor ) VALUES ('$username','$pass','$finalNomor')";
				$result   = mysqli_query($conn, $query);
				if ($result) {
					$_SESSION['name'] = $username;
					header('Location: php/home_page.php');
				} else {
					echo "<script type='text/javascript'>alert('Gagal mendaftar, koneksi terganggu')</script>";
				}
			} else {
				echo "<script type='text/javascript'>alert('Username ini telah ada')</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Password tidak sama')</script>";
		}
	} else {
		echo "<script type='text/javascript'>alert('Data tidak boleh kosong')</script>";
	}
}
if (isset($_POST['masuk'])) {

	if ($stmt = mysqli_prepare($conn, 'SELECT id, password FROM users WHERE username = ?')) {
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();
			if (password_verify($_POST['password'], $password)) {
				session_regenerate_id();
				$_SESSION['id'] = $_POST['id'];
				$_SESSION['name'] = $_POST['username'];
				header('Location: php/home_page.php');
			} else {
				echo "<script type='text/javascript'>alert('Password anda salah')</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Username tidak sama')</script>";
		}
		$stmt->close();
	}
}
?>



<!DOCTYPE html>
<html lang="en" style="background-color: #434A75;">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="login/css/style.css">
	<title>Login</title>
</head>

<body style="background-color: #434A75;">
	<div class="form-structor">
		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
			<form action="" method="POST">
				<div class="form-holder">
					<input type="text" class="input" placeholder="Username" name="username" required />
					<input type="text" class="input" placeholder="No.Whatsapp" name="nomor" required />
					<input type="password" class="input" placeholder="Password" name="password" required />
					<input type="password" class="input" placeholder="Konfirmasi Password" name="cpassword" required />
				</div>
				<button type="submit" name="daftar" class="submit-btn">Sign up</button>
			</form>
		</div>
		<div class="login slide-up">
			<div class="center">
				<h2 class="form-title" id="login"><span>or</span>Log in</h2>
				<form action="" method="POST">
					<div class="form-holder">
						<input type="text" class="input" placeholder="Username" name="username" required>
						<input type="password" class="input" placeholder="Password" name="password" required>
					</div>
					<button type="submit" name="masuk" class="submit-btn">Log in</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="login/js/main.js"></script>

</html>