<?php
include_once('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('eror no id');
}



$result = mysqli_query($conn, "SELECT * FROM Buku_table WHERE id_buku = '$id'");

$detail = mysqli_fetch_array($result);

$data_tag = explode(',', $detail['tag']);

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
                        <h1 class="card-title text-center">Detail Buku</h1>
                        <div class=" d-flex justify-content-center">
                            <img src="<?php echo "images/".$detail['gambar']?>" alt="">
                        </div>
                        <hr class="my-5 bg-primary" />
                        <!-- bagian tampilkan data dari buku -->
                        <div>
                            <b>Judul : </b>
                            <p><?php echo $detail['judul_buku'] ?></p>
                        </div>
                        <div>
                            <b>Penulis : </b>
                            <p><?php echo $detail['penulis_buku'] ?></p>
                        </div>
                        <div>
                            <b>Tahun Terbit : </b>
                            <p><?php echo $detail['tahun_terbit'] ?></p>
                        </div>
                        <div>
                            <b>Deskripsi : </b>
                            <p><?php echo $detail['deskripsi'] ?></p>
                        </div>
                        <div>
                            <b>Bahasa : </b>
                            <p><?php echo $detail['bahasa'] ?></p>
                        </div>
                        <div>
                            <b>Tag : </b>
                            <p><?php echo $detail['tag'] ?></p>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-primary w-100" data-toggle="modal" data-target="#exampleModal" href="">Sunting</a>
                            <div class="mx-3"></div>
                            <a class="btn btn-danger w-100" href="" data-toggle="modal" data-target="#delete">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- bagian modal untuk edit -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="function_update.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Buku</label>
                                <input type="text" name="judul_buku" value="<?php echo $detail['judul_buku'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                <input type="hidden" name="id" value="<?php echo $detail['id_buku'] ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Penulis Buku</label>
                                <input type="text" name="penulis_buku" value="<?php echo $detail['penulis_buku'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun Terbit Buku</label>
                                <input type="text" name="tahun_terbit" value="<?php echo $detail['tahun_terbit'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $detail['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-3">Bahasa</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="indonesia" <?php echo ($detail['bahasa'] == "indonesia") ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="lainnya" <?php echo ($detail['bahasa'] == "indonesia") ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="inlineRadio1">Lainnya</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mr-3">Tag</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox1" value="pemrograman" <?php if (in_array("pemrograman", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="website" <?php if (in_array("website", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="java" <?php if (in_array("java", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">Java</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="oop" <?php if (in_array("oop", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">OOP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="mvc" <?php if (in_array("mvc", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">MVC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="kalkulus" <?php if (in_array("kalkulus", $data_tag)) echo "checked"; ?>>
                                    <label class="form-check-label" for="inlineCheckbox2">Kalkulus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="lainnya" <?php if (in_array("lainnya", $data_tag)) echo "checked"; ?>>
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input name="Submit" type="submit" value="Save changes" class="btn btn-primary"></input>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>apakah anda yakin ingin menghapus data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form action="function_delete.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $detail['id_buku']?>" name="id" />
                        <input name="Delete" type="submit" value="Yes" class="btn btn-primary"></input>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>