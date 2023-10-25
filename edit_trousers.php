<?php
include "connect.php";
$code_t = $_GET['code_t'];
$query = mysqli_query($con, "SELECT * FROM trousers WHERE code_t='$code_t'");
$rows = mysqli_fetch_array($query);
?>

<?php
if (isset($_POST['save'])) {
    $code_t = $_POST['code_t'];
    $brand = $_POST['brand'];
    $ctgry_code_tSelect = $_POST['ctgry_code_t'];
    if ($ctgry_code_tSelect == 'T0001') {
        $ctgry_code_t = 'T0001';
    }
    if ($ctgry_code_tSelect == 'T0002') {
        $ctgry_code_t = 'T0002';
    }
    if ($ctgry_code_tSelect == 'T0003') {
        $ctgry_code_t = 'T0003';
    }
    if ($ctgry_code_tSelect == 'T0004') {
        $ctgry_code_t = 'T0004';
    }
    if ($ctgry_code_tSelect == 'T0005') {
        $ctgry_code_t = 'T0005';
    }
    if ($ctgry_code_tSelect == 'T0006') {
        $ctgry_code_t = 'T0006';
    }
    $size = $_POST['size'];
    $about = $_POST['about'];
    $picture = $_FILES['picture']['name'];
    $dir = "img/trousers/" . $picture;
    $dirFile = $_FILES['picture']['tmp_name'];
    move_uploaded_file($dirFile, $dir);
    $price = $_POST['price'];

    if (empty($picture)) {
        $query = mysqli_query($con, "UPDATE trousers SET brand='$brand',ctgry_code_t='$ctgry_code_t',size='$size',about='$about',picture='$picture',price='$price' WHERE code_t='$code_t'");
    } else {
        $query = mysqli_query($con, "UPDATE trousers SET brand='$brand',ctgry_code_t='$ctgry_code_t',size='$size',about='$about',picture='$picture',price='$price' WHERE code_t='$code_t'");
    }

    if ($query) {
        echo "<script> location='trousers.php' </script>";
    } else {
        echo "<script> alert ('Editing failed') </script>";
        echo "<script> location='trousers.php.php' </scrip>";
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
    <title>Edit Trousers Data</title>
</head>

<style>
    body {
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/trousers.jpg");
        background-position: center;
        background-size: cover;
    }
</style>

<body class="trousers">
    <div class="container mt-3">
        <a href="trousers.php" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Back</a>
        <h1 class="display-1 text-white text-center">Edit Trousers Data</h1>

        <!-- Form -->
        <form class="w-50 mx-auto text-white" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="code_t" class="form-label"><i class="bi bi-upc"></i> Code</label>
                    <input id="code_t" type="text" class="form-control" name="code_t" value="<?= $rows['code_t'] ?>">
                </div>
                <div class="col-6">
                    <label for="brand" class="form-label"><i class="bi bi-bookmark"></i> Brand</label>
                    <input id="brand" type="text" class="form-control" name="brand" value="<?= $rows['brand'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="ctgry_code_t" class="form-label"><i class="bi bi-hdd-stack"></i> Kind</label>
                <select id="ctgry_code_t" type="text" class="form-select" name="ctgry_code_t">
                    <?php
                    $tampil = mysqli_query($con, "SELECT * FROM category_t ORDER BY kind");
                    while ($w = mysqli_fetch_array($tampil)) {
                    ?>
                        <option value="<?php echo $w['ctgry_code_t']; ?>" <?php echo ($w['ctgry_code_t'] == $rows['ctgry_code_t']) ? 'selected' : ''; ?>><?php echo $w['kind'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-3">
                    <label class="form-label">Size:</label>
                    <div class="form-check">
                        <input id="flexRadioDefault1" class="form-check-input" type="radio" value="L" name="size" <?php
                                                                                                                    if ($rows['size'] == "L") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault1" class="form-check-label">
                            L
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault2" class="form-check-input" type="radio" value="M" name="size" <?php
                                                                                                                    if ($rows['size'] == "M") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault2" class="form-check-label">
                            M
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault3" class="form-check-input" type="radio" value="S" name="size" <?php
                                                                                                                    if ($rows['size'] == "S") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault3" class="form-check-label">
                            S
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault4" class="form-check-input" type="radio" value="XL" name="size" <?php
                                                                                                                    if ($rows['size'] == "XL") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault4" class="form-check-label">
                            XL
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault5" class="form-check-input" type="radio" value="XXL" name="size" <?php
                                                                                                                    if ($rows['size'] == "XXL") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault5" class="form-check-label">
                            XXL
                        </label>
                    </div>
                </div>
                <div class="col-9">
                    <label for="about" class="form-label"><i class="bi bi-textarea-t"></i> About</label>
                    <textarea id="about" class="form-control" rows="5" name="about"><?= $rows['about'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-8">
                    <label for="formFile" class="form-label"><i class="bi bi-image"></i> Picture</label>
                    <input id="formFile" type="file" class="form-control" name="picture">
                    <img src="img/trousers/<?= $rows['picture'] ?>" alt="picture" style="width: 100px; margin-top: 5px;">
                </div>
                <div class="col-4">
                    <label for="price" class="form-label"><i class="bi bi-tags"></i> Price</label>
                    <input id="price" type="text" class="form-control" name="price" value="<?= $rows['price'] ?>">
                </div>
            </div>
            <button type="submit" name="save" class="btn btn-primary mx-auto w-100" style="display: block;">Save</button>
        </form>
        <!-- Form End -->

    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>