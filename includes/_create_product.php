<?php

include "partials/_dbconnect.php";

$showAlert = false;
$imagePath;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = htmlspecialchars($_POST["productname"]);
    $productprice = htmlspecialchars($_POST["productprice"]);

    if (isset($_FILES["productimage"])) {
        $filename = $_FILES["productimage"]["name"];
        $filesize = $_FILES["productimage"]["size"];
        $filetmp = $_FILES["productimage"]["tmp_name"];
        $filetype = $_FILES["productimage"]["type"];
        $imagePath = "./uploads/$filename";
        $_SESSION["file"] = $filename;
        move_uploaded_file($filetmp, "../uploads/" . $filename);
    }

    $addedBy = $_SESSION["username"];

    // sql query to add new product
    $sql = "INSERT INTO products (product_name, product_price, added_by, image_path) VALUES('$productname','$productprice', '$addedBy', '$imagePath')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $showAlert = true;
    }
}
