<?php
include 'connect.php';
if (isset($_GET['number'])) {
    $delete = mysqli_query($con, "DELETE FROM transaction_c WHERE number='" . $_GET['number'] . "'");
    header('location:transaction_c.php');
}
