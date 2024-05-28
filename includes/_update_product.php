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
        $productname = $_POST["productname"];
        $productprice = $_POST["productprice"];

        // sql query to update  table
        $sql = "UPDATE products SET product_name = '$productname', product_price = '$productprice' WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $showAlert = true;
            header("location: ./update_product.php?updateid=$id&success=1");
        }
    }
}
