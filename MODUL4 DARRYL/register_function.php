<?php
    include_once('connect.php');
    $database = new modul4();
    if (isset($_POST['email'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        echo 'hello gais';
        if ($database->registrasi($nama,$email,$no_hp,$pass)) {
            echo 'hello gais';
            header('Location: http://127.0.0.1:8888/register.php?pesan=berhasil');
        }
    }
?>