<?php
session_start();

// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

include "../includes/_update_account.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Shirtify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include "../includes/partials/_nav.php" ?>
    <div class="flex flex-wrap gap-8 px-8 py-5">
        <a href="./account.php" class="text-xl font-bold">My Account</a>
        <a href="./product.php" class="text-xl">My Products</a>
        <a href="./create_product.php" class="text-xl">Create New Product</a>
    </div>

    <?php
    if ($showAlert || isset($_GET['success'])) {
        echo ' 
    <div class="transition duration-300 ease-in-out toast-signup fixed top-20 right-5 mx-2 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg" role="alert">
        <div class="flex p-4">
            <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
            </div>
            <div class="ms-3">
                <p class="text-sm text-gray-900">
                    Account updated successfully.
                </p>
            </div>
        </div>
    </div>
    ';
    }
    ?>

    <div class="px-8 py-3">
        <form action="" method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-full md:w-full md:max-w-[467px]">
            <div class="w-40 h-40 ">
                <img class="w-full h-full rounded-full object-cover" src="<?= $_SESSION["avatar"] ?>" alt="">
            </div>
            <div class="flex flex-col gap-1">
                <label for="username">Username</label>
                <input type="text" value="<?= $_SESSION["username"] ?>" name="username" id="username" class="bg-zinc-200 p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-1">
                <label for="email">Email</label>
                <input type="email" value="<?= $_SESSION["email"] ?>" name="email" id="email" class="bg-zinc-200 p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-1">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="bg-zinc-200 p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-1">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="hidden" onchange="updateAvatar()" />
                <button type="button" onclick="document.getElementById('avatar').click()" class="border border-zinc-800 px-4 py-2 rounded-md w-max">
                    Choose File
                </button>
                <span id="file-chosen" class="mt-2 text-gray-600">
                    Not Chosen
                </span>
            </div>
            <div class="flex flex-col gap-1 text-center">
                <button type="submit" name="update" class="bg-zinc-800 text-white p-2 rounded-md hover:bg-zinc-700">Update Details</button>
            </div>
        </form>
    </div>
    <script src="../scripts/files.js"></script>
    <script src="../scripts/main.js"></script>
</body>

</html>