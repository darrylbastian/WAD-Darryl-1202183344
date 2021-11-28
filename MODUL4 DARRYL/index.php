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
    session_start();
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
    <!-- alert ketika berhasil -->S
    <?php
      if(isset($_GET['alert'])){
        echo '<div class="alert alert-success" role="alert">login berhasil</div>';
      }
    ?>

    <div class="container py-5">
        <div class="card text-center bg-success" style="padding: 80px 0;">
            <h1 class=" card-title ">EAD Travel</h1>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1633114128814-11fac33f707b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" class="card-img-top">
                    <div class="card">
                        <div class="card-body">
                            <h5>Raja Ampat, Papua</h5>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur sed qui aliquid sunt earum molestiae est illum beatae repellat hic!
                            <hr>
                            <b>Rp.7.000.000</b>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#pesan1">Pesan Tiket</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1633114128814-11fac33f707b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" class="card-img-top">
                    <div class="card">
                        <div class="card-body">
                            <h5>Gunung Bromo, Malang</h5>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur sed qui aliquid sunt earum molestiae est illum beatae repellat hic!
                            <hr>
                            <b>Rp.2.000.000</b>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#pesan2">Pesan Tiket</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <img src="https://images.unsplash.com/photo-1633114128814-11fac33f707b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" class="card-img-top">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tanah Lot, Bali</h5>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur sed qui aliquid sunt earum molestiae est illum beatae repellat hic!
                            <hr>
                            <b>Rp.5.000.000</b>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#pesan3">Pesan Tiket</a>
                        </div>
                    </div>
                </div>
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
                    <p>NIM : 1202183344</p>

                </div>
            </div>
        </div>
    </div>

    <!-- modal pesan tiket -->
    <div class="modal fade" id="pesan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="cart_function.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= $_SESSION['id'] ?>" name="user_id">
                            <input type="hidden" class="form-control" value="Raja Ampat" name="tempat">
                            <input type="hidden" class="form-control" value="Papua" name="lokasi">
                            <input type="hidden" class="form-control" value="7000000" name="harga">

                            <label for="exampleInputEmail1">Tanggal Perjalanan</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">+ Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pesan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="cart_function.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= $_SESSION['id'] ?>" name="user_id">
                            <input type="hidden" class="form-control" value="Gunung Bromo" name="tempat">
                            <input type="hidden" class="form-control" value="Malang" name="lokasi">
                            <input type="hidden" class="form-control" value="2000000" name="harga">

                            <label for="exampleInputEmail1">Tanggal Perjalanan</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary">+ Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pesan3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="cart_function.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= $_SESSION['id'] ?>" name="user_id">
                            <input type="hidden" class="form-control" value="Tanah Lot" name="tempat">
                            <input type="hidden" class="form-control" value="Bali" name="lokasi">
                            <input type="hidden" class="form-control" value="5000000" name="harga">

                            <label for="exampleInputEmail1">Tanggal Perjalanan</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">+ Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>