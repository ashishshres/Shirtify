<?php
include "partials/_dbconnect.php";
$showAlert = false;

if (isset($_GET["updateid"])) {
    $id = $_GET["updateid"];

    // sql query to select table row
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die(mysqli_connect_error());
    }

    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["update"])) {
        $currentuser = $_SESSION["username"];
        $productname = $_POST["productname"];
        $productprice = $_POST["productprice"];
        $currentname = $_POST["currentname"];
        $currentprice = $_POST["currentprice"];

        if (isset($_FILES["product-image"]) && $_FILES["product-image"]["size"] > 0) {
            $filename = $_FILES["product-image"]["name"];
            $filesize = $_FILES["product-image"]["size"];
            $filetmp = $_FILES["product-image"]["tmp_name"];
            $filetype = $_FILES["product-image"]["type"];
            $cartImagePath = "../uploads/$filename";
            $productImagePath = "./uploads/$filename";
            move_uploaded_file($filetmp, "../uploads/" . $filename);
        } else {
            $cartImagePath = '.' . $row["image_path"];
            $productImagePath = $row["image_path"];
        }

        $sql = "UPDATE cart SET product_name = '$productname', product_price = '$productprice', image_path = '$cartImagePath' WHERE product_name = '$currentname' AND added_by = '$currentuser'";
        mysqli_query($conn, $sql);

        // sql query to update table
        $sql = "UPDATE products SET product_name = '$productname', product_price = '$productprice', image_path = '$productImagePath' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("location: ./update_product.php?updateid=$id&success=1");
    }
}
