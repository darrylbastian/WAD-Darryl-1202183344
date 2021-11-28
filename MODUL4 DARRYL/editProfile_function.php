<?php
include 'connect.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['no_hp'];
$background_color = $_POST['theme'];
setcookie("nav", $background_color); 
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$conn = new modul4();
$query = $conn->editProfile($nama, $email, $phone, $pass);
header('location:profile.php?alert=berhasil');