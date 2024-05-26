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
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
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
                        <?php include "../includes/_display_cart.php";
                        ?>
                    </div>
                </div>
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm  sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 ">Order summary</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 ">Total MRP</dt>
                                    <dd class="text-base font-medium text-gray-900 ">Rs.0.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 ">Delivery Fee</dt>
                                    <dd class="text-base font-medium text-green-600">Rs.0.00</dd>
                                </dl>
                            </div>

                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 ">
                                <dt class="text-base font-bold text-gray-900 ">Total Amount</dt>
                                <dd class="text-base font-bold text-gray-900 ">Rs.0.00</dd>
                            </dl>
                        </div>

                        <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white bg-zinc-900 hover:bg-zinc-700 focus:outline-none focus:ring-4 focus:ring-primary-300 ">Proceed to Checkout</a>
                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 "> or </span>
                            <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline ">
                                Continue Shopping
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../scripts/main.js"></script>
</body>

</html>