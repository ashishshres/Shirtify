<?php

include "partials/_dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["view"])) {
    $productid = htmlspecialchars($_POST["productid"]);
    $productname = htmlspecialchars($_POST["productname"]);
    $productprice = htmlspecialchars($_POST["productprice"]);
    $productimage = htmlspecialchars($_POST["productimage"]);
    header("location: ./pages/product_page.php?productid=$productid");
}
