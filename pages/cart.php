<?php
session_start();

// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Shirtify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include "../includes/partials/_nav.php" ?>
    <div>
        <h1 class="px-8 py-5 text-xl font-bold">Cart</h1>
    </div>

    <?php
    if (isset($_GET['success'])) {
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
                    Product removed successfully.
                </p>
            </div>
        </div>
    </div>
    ';
    }
    ?>

    <section class="bg-white px-8">
        <div class="max-w-screen-xl 2xl:px-0">
            <div class="mt-3 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6 mb-4">
                        <?php include "../includes/_display_cart.php" ?>
                    </div>
                </div>
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <?php include "../includes/_display_total.php" ?>
                </div>
            </div>
        </div>
    </section>
    <script src="../scripts/main.js"></script>
</body>

</html>