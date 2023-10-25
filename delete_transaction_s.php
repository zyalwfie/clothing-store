<?php
include 'connect.php';
if (isset($_GET['number'])) {
    $delete = mysqli_query($con, "DELETE FROM transaction_s WHERE number='" . $_GET['number'] . "'");
    header('location:transaction_s.php');
}
