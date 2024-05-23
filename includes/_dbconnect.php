<?php

// server variables
$servername = "localhost";
$username = "root";
$password = "";
$database = "shirtify";

// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check connection
if (!$conn) {
    die(mysqli_connect_error());
}
