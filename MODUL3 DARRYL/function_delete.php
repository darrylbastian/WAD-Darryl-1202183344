<?php
include_once('connect.php');
if (isset($_POST['Delete'])) {
    $id = $_POST['id'];

    $result = mysqli_query($conn, "DELETE FROM Buku_table WHERE id_buku = $id");

    header("Location: home.php");
    // $result = mysqli_query($conn, "INSERT INTO buku_table(judul_buku, penulis_buku, tahun_terbit, deskripsi, gambar, tag, bahasa) value('$judul', '$penulis', '$tahun_terbit', '$deskripsi', '$foto', '$tag', '$bahasa')");
}
