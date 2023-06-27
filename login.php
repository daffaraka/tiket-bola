<?php
require 'config.php';
session_start();
if (!empty($_SESSION["email"])) {
    header('Location: home.html');
}
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['email'] = $row['email'];
            header("Location: home.html");
        } else {
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light py-4">
        <div class="container">
            <a class="navbar-brand" href="home.html">Tiket Bola</a>
            <div class="d-flex" id="collapsibleNavId">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pesanan.html">Cek Order <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pendaftaran.php">Daftar <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Masuk <span class="visually-hidden">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-5 rounded-0 shadow my-5" style="background-image: url('image/rectangle-94.png');">
        <div class="container">

            <div class="card ">

                <div class="d-flex justify-content-between p-5">
                    <div class="px-5">
                        <img src="image/pemain-cewe.svg" class="img- rounded-top" alt="">
                    </div>
                    <form action="" class="w-50 py-5" method="post">
                        <p class="text-center">Masuk ke akun Beli Tiket Anda</p>
                       
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="*****">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-dark px-5 py-2 my-3" type="submit" name="submit">Login</button>

                        </div>
                        <p class="text-center">Belum punya akun ? ? <a href="pendaftaran.php">Daftar Sekarang!</a></p>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>