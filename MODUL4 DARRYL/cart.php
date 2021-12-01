<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Register</title>
    <?php
    include 'connect.php';
    session_start();
    $connect = new modul4();
    $id = $_SESSION['id'];
    $detail = $connect->show($id);
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
    <!-- alert ketika berhasil -->
    <?php
    if (isset($_GET['pesan'])) {
        echo '<div class="alert alert-success" role="alert">Login berhasil</div>';
    }
    ?>

    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="">
                            <th scope="col">No</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal Perjalanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        function rupiah($angka)
                        {
    
                            $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
                            return $hasil_rupiah;
                        }

                        foreach($detail as $dt) {
                         $total += $dt['harga'];
                        ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?=$dt['nama_tempat']?></td>
                            <td><?=$dt['lokasi']?></td>
                            <td><?=$dt['tanggal']?></td>
                            <td><?=rupiah($dt['harga'])?></td>
                            <td><a href="delete_function.php?id=<?= $dt['id']?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th colspan="4">Total</th>
                            <th colspan="2"><?= rupiah($total)?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                    <p>NIM : 120218</p>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>