<?php
session_start();

// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./pages/signin.php");
    exit;
}

include "./includes/_add_cart.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Shirtify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./images/favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    $originalPath = $_SESSION["avatar"];
    $avatar = str_replace("../", "./", $originalPath);
    ?>

    <div class="bg-gray-100 shadow-sm px-8 py-3 flex flex-wrap justify-between items-center">
        <div class="text-blue-700 text-3xl font-bold cursor-default">Shirtify.</div>
        <div class="flex flex-wrap gap-4 items-center w-full md:w-max">
            <a href="./pages/cart.php" class="font-medium hover:underline">Cart</a>
            <a href="./pages/account.php" class="font-medium hover:underline flex items-center gap-2">My Account <span class="inline-block h-8 w-8"><img class="h-full w-full object-cover rounded-full" src="<?= $avatar ?>" alt=""></span></a>
            <button type="submit" name="logout" onclick="window.location.href='./includes/_logout.php'" class="bg-zinc-800 text-white px-4 py-2 rounded-md hover:bg-zinc-700 w-full md:w-max">Logout</button>
        </div>
    </div>

    <?php
    if (isset($_GET["success"])) {
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
                        Added to cart successfully.
                    </p>
                </div>
            </div>
        </div>
        ';
    }

    if (isset($_GET['exists'])) {
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
                    Product is already added to cart.
                </p>
            </div>
        </div>
    </div>
    ';
    }
    ?>

    <div>
        <h1 class="px-8 py-5 text-xl font-bold">Shop</h1>
    </div>
    <div class="px-8 py-3 flex gap-6 flex-wrap">
        <?php include "./includes/_display_product.php" ?>
    </div>
    <script src="./scripts/main.js"></script>
</body>

</html>