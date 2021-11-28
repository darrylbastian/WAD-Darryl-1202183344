<?php
     include 'connect.php';
     $connect = new modul4();
     $id = $_GET['id'];
     $query = $connect->delete($id);
     header('location:cart.php?alert=berhasil');
?>