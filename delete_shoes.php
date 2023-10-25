<?php
include 'connect.php';
if (isset($_GET['code_s'])) {
    $delete = mysqli_query($con, "DELETE FROM shoes WHERE code_s='" . $_GET['code_s'] . "'");
    header('location:shoes.php');
}
