<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <title>Login Form</title>
</head>

<style>
    body {
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/login.jpg");
        background-position: center;
        background-size: cover;
    }

    .pict {
        height: 350px;
        background-image: url("img/login.jpg");
        background-position: center;
        background-size: cover;
    }

    .card {
        background-color: #FAF8F1;
        box-shadow: -1px -1px 30px white;
    }

    .content {
        margin-top: 110px;
    }

    h1,
    p {
        text-shadow: -1px -1px 5px black;
    }
</style>

<body>
    <div class="container head d-flex justify-content-center position-absolute top-50 start-50 translate-middle">
        <div class="card w-50">
            <div class="container pict">
                <div class="container content text-center text-white">
                    <h1 class="display-3">Get into my store</h1>
                    <p class="lead fs-4">Have a prosperous day<br>with our special deals</p>
                </div>
            </div>
            <form method="post">
                <div class="card-body">
                    <div class="input-group w-50 mb-3 mx-auto">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="text" class="form-control" id="floatingInputGroup2" placeholder="Username" name="username">
                            <label for="floatingInputGroup2">Username</label>
                        </div>
                    </div>
                    <div class="input-group w-50 mb-3 mx-auto">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="password" class="form-control" id="floatingInputGroup2" placeholder="Password" name="password">
                            <label for="floatingInputGroup2">Password</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="save" class="btn btn-primary w-50 mx-auto">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    include "connect.php";
    if (isset($_POST['save'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $qry = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password=md5('$password')");
        $cek = mysqli_num_rows($qry);
        if ($cek == 1) {
            $_SESSION['userweb'] = $username;
            header('location:home.html');
            exit;
        } else {
            echo "Sorry! Username and password is wrong! Please try again!";
        }
    }
    ?>



    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>