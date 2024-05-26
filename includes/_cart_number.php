<?php
include "partials/_dbconnect.php";
$currentUser = $_SESSION["username"];

$sql = "SELECT * FROM cart WHERE added_by = '$currentUser'";
$items = mysqli_query($conn, $sql);
if (mysqli_num_rows($items) > 0) {
    $countItems = mysqli_num_rows($items);
} else {
    $countItems = 0;
}
