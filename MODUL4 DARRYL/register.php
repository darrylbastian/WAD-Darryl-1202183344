<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <nav class="navbar navbar-light bg-primary justify-content-between">
        <div class="container ">
        <a class="navbar-brand text-white" href="index.php">EAD Travel</a>
            <div>
                <a class="mr-3 text-white" href="register.php">register</a>
                <a class="text-white" href="login.php">login</a>
            </div>
        </div>
    </nav>
     <!-- alert ketika berhasil -->
     <?php
      if(isset($_GET['pesan'])){
        echo '<div class="alert alert-success" role="alert">Registrasi berhasil</div>';
      }
    ?>

    <div class="card mx-auto py-3 mt-5" style="width:30rem;">
        <h2 class="card-title text-center">Register</h2>
        <hr class="mx-3" />
        <div class="card-body">
            <form action="register_function.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password Confirm</label>
                    <input type="password" name="konfirmasi_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password confirm">
                </div>
                <div class="text-center my-4">
                    <button class="btn btn-primary px-5 mx-auto" type="submit" name="register">Daftar</button>
                </div>
            </form>
            <p class="text-center">Anda sudah punya akun ? <a href="#">Login</a></p>
        </div>
    </div>
</body>

</html>