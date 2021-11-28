<?php 
session_start();
session_unset();
session_destroy();
setcookie('email', '', 0, '/');
setcookie('nama', '', 0, '/');
header('location:Login.php?alert=berhasil');
?>