<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="home.css" />
    <title>List of Customer</title>
</head>

<style>
    body {
        background-color: whitesmoke;
    }

    .edit {
        color: black;
    }

    .delete {
        color: black;
    }

    .edit:hover {
        color: #0d6efd;
    }

    .delete:hover {
        color: #dc3545;
    }

    .container .nav-item a {
        color: #2192FF;
    }

    .container .nav-item a:hover {
        color: #0002A1;
    }

    .container .nav-item a::after {
        content: "";
        display: block;
        border-bottom: 1px solid #0002A1;
        transform: scaleX(0);
        transition: 0.2s linear;
    }

    .container .nav-item a:hover::after {
        transform: scaleX(1);
    }
</style>

<body>
    <div class="container fs-4 mb-5 mt-2">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="home.html"><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="clothes.php">Clothes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trousers.php">Trousers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shoes.php">Shoes</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th colspan="2">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connect.php";
                $no = 1;
                $tampil = mysqli_query($con, "SELECT * FROM customer ORDER BY name");
                while ($r = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['gender'] ?></td>
                        <td><?= $r['phone_number'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><a href="edit_customer.php?phone_number=<?php echo $r['phone_number'] ?>" class="edit"><i class="bi bi-pen"></i></a></td>
                        <td><a href="delete_customer.php?phone_number=<?php echo $r['phone_number'] ?>" class="delete"><i class="bi bi-trash3"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-end">
        <a href="input_customer.php" class="btn btn-outline-primary btn-sm">List your data</a>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>