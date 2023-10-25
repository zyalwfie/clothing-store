<?php
include "connect.php";
$phone_number = $_GET['phone_number'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE phone_number='$phone_number'");
$rows = mysqli_fetch_array($query);
?>

<?php
include "connect.php";
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = mysqli_query($con, "UPDATE customer SET name='$name', gender='$gender', email='$email' WHERE phone_number='$phone_number'");
    if ($sql) {
        header('location:customer.php');
    } else {
        echo "<p style='color: red;'>Your data couldn't save</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="home.css" />
    <title>Input Customer Data</title>
</head>

<style>
    body {
        background-color: whitesmoke;
    }
</style>

<body>
    <div class="container mt-5">
        <h1 class="fs-1 text-center text-dark mb-3">Register Your Data</h1>
        <form method="post" class="mx-auto w-25">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $rows['name'] ?>">
            </div>
            <label class="fs-5">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" <?php
                                                                                                                if ($rows['gender'] == "Male") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" <?php
                                                                                                                    if ($rows['gender'] == "Female") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?= $rows['phone_number'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $rows['email'] ?>">
            </div>
            <button type="submit" name="save" class="btn btn-primary w-100">Register your data</button>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>