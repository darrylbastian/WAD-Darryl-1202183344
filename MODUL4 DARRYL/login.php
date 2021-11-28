<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
    <?php
    session_start();
    include_once('connect.php');
    $database = new modul4();

    

    if (isset($_SESSION['is_login'])) {
        header('location:index.php');
    }

    if (isset($_COOKIE['email'])) {
        $database->relogin($_COOKIE['email']);
        header('location:index.php');
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if ($database->login($email, $pass)) {
            header('location:index.php?alert=berhasil');
        } else {
            header('location: login.php?alert=gagal');
        }
    }
    ?>
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
    <?php
      if(isset($_GET['alert'])){
        echo '<div class="alert alert-danger" role="alert">login tidak berhasil</div>';
      }
    ?>

    <div class="card mx-auto py-3 mt-5" style="width:30rem;">
        <h2 class="card-title text-center">Login</h2>
        <hr class="mx-3" />
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </form>
            <p class="text-center">Anda belum punya akun ? <a href="#">Register</a></p>
        </div>
    </div>
</body>

</html>