<?php
session_start();

// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./pages/signin.php");
    exit;
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Shirtify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-gray-100 shadow-sm px-8 py-3 flex flex-wrap justify-between items-center">
        <div class="text-blue-700 text-3xl font-bold cursor-default">Shirtify.</div>
        <div class="flex flex-wrap gap-4 items-center w-full md:w-max">
            <a href="#" class="font-medium hover:underline">Cart</a>
            <a href="#" class="font-medium hover:underline" onclick="window.location.href='./pages/account.php'">My Account</a>
            <button type="submit" name="logout" onclick="window.location.href='./includes/_logout.php'" class="bg-zinc-800 text-white px-4 py-2 rounded-md hover:bg-zinc-700 w-full md:w-max">Logout</button>
        </div>
    </div>
    <div>
        <h1 class="px-8 py-5 text-xl font-bold">Shop</h1>
    </div>
    <div class="px-8 py-3 flex gap-6 flex-wrap">
        <?php include "./includes/_display_product.php" ?>
    </div>
</body>

</html>