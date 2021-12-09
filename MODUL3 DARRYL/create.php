<?php
include_once('connect.php');
if (isset($_POST['Submit'])) {
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
            $result = mysqli_query($conn, "INSERT INTO buku_table(judul_buku, penulis_buku, tahun_terbit, deskripsi, gambar, tag, bahasa) value('$judul', '$penulis', '$tahun_terbit', '$deskripsi', '$nama', '$tag', '$bahasa')");
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    // $result = mysqli_query($conn, "INSERT INTO buku_table(judul_buku, penulis_buku, tahun_terbit, deskripsi, gambar, tag, bahasa) value('$judul', '$penulis', '$tahun_terbit', '$deskripsi', '$foto', '$tag', '$bahasa')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="home.php">
        <img src="./images/logo-ead-1.png" width="200" />
        </a>
        <a class="btn btn-primary my-2 text-white my-sm-0" href="create.php" type="submit">Tambah Buku</a>
    </nav>
    <div class="container">
        <div class="row py-5">
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">tambah data buku</h1>
                        <form action="create.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Buku</label>
                                <input type="text" name="judul_buku" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Penulis Buku</label>
                                <input type="text" name="penulis_buku" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Terbit Buku</label>
                                <input type="text" name="tahun_terbit" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-3">Bahasa</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="indonesia">
                                    <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="lainnya">
                                    <label class="form-check-label" for="inlineRadio1">Lainnya</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mr-3">Tag</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox1" value="pemrograman">
                                    <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="website">
                                    <label class="form-check-label" for="inlineCheckbox2">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="java">
                                    <label class="form-check-label" for="inlineCheckbox2">Java</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="oop">
                                    <label class="form-check-label" for="inlineCheckbox2">OOP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="mvc">
                                    <label class="form-check-label" for="inlineCheckbox2">MVC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="kalkulus">
                                    <label class="form-check-label" for="inlineCheckbox2">Kalkulus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="lainnya">
                                    <label class="form-check-label" for="inlineCheckbox2">Lainnya</label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>

                            <input class="btn btn-primary w-100 mt-5 mb-3" type="submit" name="Submit" value="+ Tambah"></input>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>