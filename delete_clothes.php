<?php
include 'connect.php';
if (isset($_GET['code_c'])) {
    $delete = mysqli_query($con, "DELETE FROM clothes WHERE code_c='" . $_GET['code_c'] . "'");
    header('location:clothes.php');
}
