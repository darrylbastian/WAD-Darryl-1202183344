<?php
include_once('connect.php');
if (isset($_POST['Submit'])) {
    $id_buku = $_POST['id'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = implode(",", $_POST['tag']);

    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'images/' . $nama);
            $result = mysqli_query($conn, "UPDATE Buku_table SET judul_buku='$judul', penulis_buku='$penulis', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi', gambar='$nama', tag='$tag', bahasa='$bahasa' WHERE id_buku = $id_buku");
        if($result){
            header("location:detail.php?id=$id_buku");
        }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    // $result = mysqli_query($conn, "INSERT INTO buku_table(judul_buku, penulis_buku, tahun_terbit, deskripsi, gambar, tag, bahasa) value('$judul', '$penulis', '$tahun_terbit', '$deskripsi', '$foto', '$tag', '$bahasa')");
}
