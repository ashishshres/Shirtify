<?php
include "partials/_dbconnect.php";
$showAlert = false;

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    // sql query to select table row
    $sql = "DELETE FROM cart WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("location: ../pages/cart.php?success=1");
    }
}
