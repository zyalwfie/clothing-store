<?php
include "connect.php";
$code_s = $_GET['code_s'];
$query = mysqli_query($con, "SELECT * FROM shoes WHERE code_s='$code_s'");
$rows = mysqli_fetch_array($query);
?>

<?php
if (isset($_POST['save'])) {
    $code_s = $_POST['code_s'];
    $brand = $_POST['brand'];
    $ctgry_code_sSelect = $_POST['ctgry_code_s'];
    if ($ctgry_code_sSelect == 'S0001') {
        $ctgry_code_s = 'S0001';
    }
    if ($ctgry_code_sSelect == 'S0002') {
        $ctgry_code_s = 'S0002';
    }
    if ($ctgry_code_sSelect == 'S0003') {
        $ctgry_code_s = 'S0003';
    }
    if ($ctgry_code_sSelect == 'S0004') {
        $ctgry_code_s = 'S0004';
    }
    if ($ctgry_code_sSelect == 'S0005') {
        $ctgry_code_s = 'S0005';
    }
    if ($ctgry_code_sSelect == 'S0006') {
        $ctgry_code_s = 'S0006';
    }
    if ($ctgry_code_sSelect == 'S0007') {
        $ctgry_code_s = 'S0007';
    }
    if ($ctgry_code_sSelect == 'S0008') {
        $ctgry_code_s = 'S0008';
    }
    if ($ctgry_code_sSelect == 'S0009') {
        $ctgry_code_s = 'S0009';
    }
    if ($ctgry_code_sSelect == 'S0010') {
        $ctgry_code_s = 'S0010';
    }
    if ($ctgry_code_sSelect == 'S0011') {
        $ctgry_code_s = 'S0011';
    }
    if ($ctgry_code_sSelect == 'S0012') {
        $ctgry_code_s = 'S0012';
    }
    $size = $_POST['size'];
    $about = $_POST['about'];
    $picture = $_FILES['picture']['name'];
    $dir = "img/shoes/" . $picture;
    $dirFile = $_FILES['picture']['tmp_name'];
    move_uploaded_file($dirFile, $dir);
    $price = $_POST['price'];

    if (empty($picture)) {
        $query = mysqli_query($con, "UPDATE shoes SET brand='$brand',ctgry_code_s='$ctgry_code_s',size='$size',about='$about',picture='$picture',price='$price' WHERE code_s='$code_s'");
    } else {
        $query = mysqli_query($con, "UPDATE shoes SET brand='$brand',ctgry_code_s='$ctgry_code_s',size='$size',about='$about',picture='$picture',price='$price' WHERE code_s='$code_s'");
    }

    if ($query) {
        echo "<script> location='shoes.php' </script>";
    } else {
        echo "<script> alert ('Editing failed') </script>";
        echo "<script> location='shoes.php.php' </scrip>";
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
    <title>Edit Shoes Data</title>
</head>

<style>
    body {
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/shoes.jpg");
        background-position: center;
        background-size: cover;
    }
</style>

<body class="shoes">
    <div class="container mt-3">
        <a href="shoes.php" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Back</a>
        <h1 class="display-1 text-white text-center">Edit Shoes Data</h1>

        <!-- Form -->
        <form class="w-50 mx-auto text-white" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="code_s" class="form-label"><i class="bi bi-upc"></i> Code</label>
                    <input id="code_s" type="text" class="form-control" name="code_s" value="<?= $rows['code_s'] ?>">
                </div>
                <div class="col-6">
                    <label for="brand" class="form-label"><i class="bi bi-bookmark"></i> Brand</label>
                    <input id="brand" type="text" class="form-control" name="brand" value="<?= $rows['brand'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="ctgry_code_s" class="form-label"><i class="bi bi-hdd-stack"></i> Kind</label>
                <select id="ctgry_code_s" type="text" class="form-select" name="ctgry_code_s">
                    <?php
                    $tampil = mysqli_query($con, "SELECT * FROM category_s ORDER BY kind");
                    while ($w = mysqli_fetch_array($tampil)) {
                    ?>
                        <option value="<?php echo $w['ctgry_code_s']; ?>" <?php echo ($w['ctgry_code_s'] == $rows['ctgry_code_s']) ? 'selected' : ''; ?>><?php echo $w['kind'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-3">
                    <label class="form-label">Size:</label>
                    <div class="form-check">
                        <input id="flexRadioDefault1" class="form-check-input" type="radio" value="38" name="size" <?php
                                                                                                                    if ($rows['size'] == "38") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault1" class="form-check-label">
                            38
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault2" class="form-check-input" type="radio" value="39" name="size" <?php
                                                                                                                    if ($rows['size'] == "39") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault2" class="form-check-label">
                            39
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault3" class="form-check-input" type="radio" value="40" name="size" <?php
                                                                                                                    if ($rows['size'] == "40") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault3" class="form-check-label">
                            40
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault4" class="form-check-input" type="radio" value="41" name="size" <?php
                                                                                                                    if ($rows['size'] == "41") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault4" class="form-check-label">
                            41
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="flexRadioDefault5" class="form-check-input" type="radio" value="42" name="size" <?php
                                                                                                                    if ($rows['size'] == "42") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                        <label for="flexRadioDefault5" class="form-check-label">
                            42
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
                    <img src="img/shoes/<?= $rows['picture'] ?>" alt="picture" style="width: 100px; margin-top: 5px;">
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