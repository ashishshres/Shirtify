<?php

include "partials/_dbconnect.php";
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = htmlspecialchars($_POST["productname"]);
    $productprice = htmlspecialchars($_POST["productprice"]);
    $productimage = htmlspecialchars($_POST["productimage"]);
    $productquantity = 1;
    $addedBy = $_SESSION["username"];

    // sql query to add to cart
    $sql = "SELECT * FROM cart WHERE product_name = '$productname' AND added_by = '$addedBy'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("location: ./index.php?exists=1");
    } else {
        $sql = "INSERT INTO cart (product_name, product_price, image_path, quantity, added_by) VALUES('$productname','$productprice', '$productimage', $productquantity, '$addedBy')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ./index.php?success=1");
        }
    }
}
