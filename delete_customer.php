<?php
include 'connect.php';
if (isset($_GET['phone_number'])) {
    $delete = mysqli_query($con, "DELETE FROM customer WHERE phone_number='" . $_GET['phone_number'] . "'");
    header('location:customer.php');
}
