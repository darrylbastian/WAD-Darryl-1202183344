<?php
    include_once('connect.php');
    $database = new modul4();
    if (isset($_POST['tanggal'])) {
        $userId = intval($_POST['user_id']);
        $tempat = $_POST['tempat'];
        $lokasi = $_POST['lokasi'];
        $harga = intval($_POST['harga']);
        $tanggal = $_POST['tanggal'];
        echo $tempat;
        echo 'berhasil';
        if ($database->addCatalog($userId, $tempat, $lokasi, $harga, $tanggal)) {
            echo 'berhasil';
            header('Location: index.php?pesan=berhasil');
        }
    }
?>