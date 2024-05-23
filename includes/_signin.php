<?php
include "_dbconnect.php";

$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // check for the email and password
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $isFound = mysqli_num_rows($result);
    if ($isFound == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $row["username"];
                $_SESSION["email"] = $row["email"];
                header("location: ../index.php");
            } else {
                $showError = true;
            }
        }
    } else {
        $showError = true;
    }
}
