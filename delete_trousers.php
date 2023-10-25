<?php
include 'connect.php';
if (isset($_GET['code_t'])) {
    $delete = mysqli_query($con, "DELETE FROM trousers WHERE code_t='" . $_GET['code_t'] . "'");
    header('location:trousers.php');
}
