<?php
include "partials/_dbconnect.php";
$showAlert = false;
$currentUsername = $_SESSION["username"];

// sql query to select table row
$sql = "SELECT * FROM users WHERE username = '$currentUsername'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$avatarPath = $row["avatar"];

if (isset($_POST["update"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $updateProductTable = "UPDATE products SET added_by = '$username' WHERE added_by = '$currentUsername'";
    $updateCartTable = "UPDATE cart SET added_by = '$username' WHERE added_by = '$currentUsername'";
    mysqli_query($conn, $updateProductTable);
    mysqli_query($conn, $updateCartTable);

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0) {
        $filename = $_FILES["avatar"]["name"];
        $filesize = $_FILES["avatar"]["size"];
        $filetmp = $_FILES["avatar"]["tmp_name"];
        $filetype = $_FILES["avatar"]["type"];
        $avatarPath = "../includes/avatar/$filename";
        move_uploaded_file($filetmp, "../includes/avatar/" . $filename);
    }

    if (empty($password)) {
        // no password update
        $password = $row["password"];
        $sql = "UPDATE users SET username = '$username', email = '$email', avatar = '$avatarPath' WHERE username = '$currentUsername'";
    } else {
        // password update
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = '$username', email = '$email', password = '$hash', avatar = '$avatarPath' WHERE username = '$currentUsername'";
    }

    if (mysqli_query($conn, $sql)) {
        $showAlert = true;
        // Update session username
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["avatar"] = $avatarPath;
        header("Location: ./account.php?success=1");
        exit();
    }
}
