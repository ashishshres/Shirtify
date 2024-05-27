<?php
include "partials/_dbconnect.php";

if (isset($_POST["increment"])) {
    $updateid = $_POST["update"];
    $updateQuantity = $_POST["update-quantity"];

    $sql = "UPDATE cart SET quantity = $updateQuantity WHERE id = '$updateid'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/cart.php");
        exit();
    }
}

if (isset($_POST["decrement"])) {
    $updateid = $_POST["update"];
    $updateQuantity = $_POST["update-quantity"];

    $sql = "UPDATE cart SET quantity = $updateQuantity WHERE id = '$updateid'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../pages/cart.php");
        exit();
    }
}
