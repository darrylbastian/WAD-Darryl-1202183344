<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Profile</title>
    <?php
    include 'connect.php';
    session_start();
    $connect = new modul4();
    $id = $_SESSION['id'];
    $detail = $connect->detailProfile($id);
    if(!isset($_SESSION['is_login'])){
        header('Location: login.php');
    }
    ?>
</head>

<body>
<nav class="navbar navbar-light bg-primary justify-content-between">
        <div class="container ">
            <a class="navbar-brand text-white" href="index.php">EAD Travel</a>
            <?php
            if (!isset($_SESSION['is_login'])) {
            ?>
                <div>
                    <a class="mr-3 text-white" href="register.php">register</a>
                    <a class="text-white" href="login.php">login</a>
                </div>
            <?php
            } else {
            ?>
                <div>
                    <a class="mr-3 text-white" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <div class="btn-group">
                        <a href="" class="dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['nama'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php">profile</a>
                            <a class="dropdown-item" href="logout.php">logout</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>
    <div class="container py-5" style="height: 86vh;">
        <div class="card text-center">
            <h2 class=" card-title my-3">Profile</h2>
            <form action="editProfile_function.php" method="post" class="mx-4 ">
                <?php foreach($detail as $data ) {?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Email</label>
                    <div class="col-sm-10 text-left py-1">
                        <p><?=$data['email']?></p>
                        <input type="hidden" name="email" value="<?=$data['email']?>" class="form-control" id="inputEmail3" placeholder="nama anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" value="<?=$data['nama']?>" class="form-control" id="inputEmail3" placeholder="nama anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_hp" value="<?=$data['no_hp']?>" class="form-control" id="inputEmail3" placeholder="no. handphone">
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Kata Sandi</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass" class="form-control" id="inputEmail3" placeholder="kata sandi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left" style="font-size: 15px;">Konfirmasi Kata Sandi</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="konfirmasi kata sandi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Warna Navbar</label>
                    <div class="col-sm-10">
                        <input type="text" name="theme" class="form-control" id="inputEmail3" placeholder="Blue Ocean atau Dark Boba">
                    </div>
                </div>
                <div class="my-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-warning">Cancel</button>
                </div>
                <?php }?>
            </form>
        </div>
    </div>

    <footer class="bg-primary py-3 d-flex justify-content-center align-items-center">
        <p class="p-0 m-0">&copy; 2021 Copyright <a href="#" class="text-white" data-toggle="modal" data-target="#copyright">wad modul 4</a></p>
    </footer>


    <!-- modal copyright -->
    <div class="modal fade" id="copyright" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nama : Darryl Bastian</p>
                    <p>NIM : 1202183344</p>

                </div>
            </div>
        </div>
    </div>

    <!-- modal pesan tiket -->
    <div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Perjalanan</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">+ Tambahkan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>