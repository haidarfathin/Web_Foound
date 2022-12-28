<?php
include "config.php";
session_start();
if(isset($_POST['daftar']) ){
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $nomor     = stripslashes($_POST['nomor']);
    $nomor     = mysqli_real_escape_string($conn, $nomor);
    $finalNomor = setNomor($nomor);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $repass   = stripslashes($_POST['cpassword']);
    $repass   = mysqli_real_escape_string($conn, $repass);
    if(!empty(trim($username)) && !empty(trim($nomor)) && !empty(trim($password)) && !empty(trim($repass))){
        if($password == $repass){
            if( cek_nama($username,$conn) == 0 ){
                $pass  = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, password, nomor ) VALUES ('$username','$pass','$finalNomor')";
                $result   = mysqli_query($conn, $query);
                if ($result) {
                    $_SESSION['name'] = $username;
                    header('Location: home_page.php');
                } else {
                    echo "<script type='text/javascript'>alert('Gagal mendaftar, koneksi terganggu')</script>";
                }
            }else{
                    echo "<script type='text/javascript'>alert('Username ini telah ada')</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('Password tidak sama')</script>";
        }
         
    }else {
            echo "<script type='text/javascript'>alert('Data tidak boleh kosong')</script>";

    }
} 

