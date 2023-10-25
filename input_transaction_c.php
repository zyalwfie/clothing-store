<?php
include "connect.php";
if (isset($_POST['save'])) {
    $number = $_POST['number'];
    $date = $_POST['date'];
    $phone_number = $_POST['phone_number'];
    $code_c = $_POST['code_c'];
    $payment = $_POST['payment'];

    $sql = mysqli_query($con, "INSERT INTO transaction_c VALUES ('$number','$date','$phone_number','$code_c','$payment')");
    if ($sql) {
        header('location:transaction_c.php');
    } else {
        echo "Your data couldn't save";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Transaction Clothes</title>
</head>

<style>
    body {
        background-color: whitesmoke;
    }

    .cart {
        font-size: 75px;
        color: #3330E4;
    }

    .container p a {
        text-decoration: none;
        font-style: italic;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="container mt-3"><a href="home.html" class="btn btn-outline-dark"><i class="bi bi-arrow-left"></i> Back</a></div>
        <div class="container cart mt-5 w-25 mx-auto text-center"><i class="bi bi-cart3"></i></div>
        <div class="container text-center">
            <h1>Checkout your clothes</h1>
            <p class="lead">Below is an form data checkout, make sure before you confirm your choose. Because if it has been confirmed, it cannot<br> be changed again. This some <a href="transaction_c.php">list of transaction.</a> Before make a transaction, <a href="input_customer.php">register</a> your data first.</p>
        </div>
        <div class="container">
            <!-- Form -->
            <form method="post" class="w-50 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="number"><i class="bi bi-upc"></i></span>
                    <input type="text" class="form-control" placeholder="ID Transaction" name="number">
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="input-group">
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text" id="phone_number"><i class="bi bi-person-lines-fill"></i></span>
                            <select type="text" class="form-select" placeholder="Your ID" name="phone_number">
                                <?php
                                include("connect.php");
                                $sql = mysqli_query($con, "SELECT * FROM customer ORDER BY name");
                                ?>
                                <?php
                                while ($r = mysqli_fetch_array($sql)) {
                                    echo "<option value=$r[phone_number]>$r[phone_number]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="code_c"><i class="bi bi-bag"></i></span>
                    <select type="text" class="form-select" name="code_c">
                        <?php
                        include("connect.php");
                        $sql = mysqli_query($con, "SELECT * FROM clothes ORDER BY code_c");
                        ?>
                        <?php
                        while ($r = mysqli_fetch_array($sql)) {
                            echo "<option value=$r[code_c]>$r[code_c]</option>";
                        }
                        ?>
                    </select>
                </div>
                <label class="fs-5">Payment</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="Cash" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Cash
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="Debit Card" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Debit Card
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="Paypal" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Paypal
                    </label>
                </div>
                <button type="submit" name="save" class="btn btn-primary w-100 mt-3">Confirm to checkout</button>
            </form>
            <!-- Form End -->
        </div>
    </div>

</body>

</html>