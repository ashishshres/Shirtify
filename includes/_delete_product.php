<?php
include "partials/_dbconnect.php";
$showAlert = false;

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];

    $productsql = "SELECT * FROM products where id = $id";
    $result = mysqli_query($conn, $productsql);
    $row = mysqli_fetch_assoc($result);
    $currentProduct = $row["product_name"];
    $currentuser = $_SESSION["username"];

    $sql = "DELETE FROM cart WHERE product_name = '$currentProduct' AND added_by = '$currentuser'";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("location: ./product.php?success=1");
    }
}
