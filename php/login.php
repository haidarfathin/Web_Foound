<?php
session_start();
include 'config.php';

if ($stmt = mysqli_prepare($conn,'SELECT id, password FROM users WHERE username = ?')) {
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
			header('Location: home_page.php');
		} else {
            echo "<script type='text/javascript'>alert('Passoword anda salah')</script>";
		}
	} else {
		echo "<script type='text/javascript'>alert('Username tidak sama')</script>";
	}
	$stmt->close();
}
