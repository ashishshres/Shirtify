<?php
session_start();

// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

include "../includes/partials/_dbconnect.php";
include "../includes/_product_page.php";
include "../includes/_add_cart.php";

if (isset($_GET["productid"])) {
    $productid = $_GET["productid"];
    $sql = "SELECT * FROM products WHERE id = $productid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productname = $row["product_name"];
            $productprice = number_format($row["product_price"], 2);
            $productimage = $row["image_path"];
            $imageSrc = '.' . $productimage;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include "../includes/partials/_nav.php" ?>
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
    <form action="" method="post">
        <section class="relative">
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 md:gap-8 mx-auto max-md:px-2 px-8">
                    <div class="img py-8">
                        <div class="img-box h-full max-lg:mx-auto">
                            <img src="<?= $imageSrc ?>" alt="Yellow Tropical Printed Shirt image" class="max-lg:mx-auto lg:ml-auto h-96 w-full object-cover rounded-md shadow-sm">
                        </div>
                    </div>
                    <div class="md:py-8 data w-full lg:pr-8 pr-0 xl:justify-start max-lg:pb-10 xl:my-2 lg:my-5 my-0">
                        <div class="data w-full max-w-xl">
                            <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2 capitalize"><?= $productname ?></h2>
                            <div class="flex flex-col sm:flex-row sm:items-center mb-6">
                                <h6 class="font-manrope font-semibold text-2xl leading-9 text-gray-900 pr-5 sm:border-r border-gray-200 mr-5">
                                    Rs.<?= $productprice ?></h6>
                            </div>
                            <p class="text-gray-500 text-base font-normal mb-5">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dolores voluptates explicabo dicta? Molestias, earum!
                            </p>
                            <div class="w-48 py-3">
                                <input type="hidden" name="productid" value="<?= $productid ?>">
                                <input type="hidden" name="productname" value="<?= $productname ?>">
                                <input type="hidden" name="productprice" value="<?= $productprice ?>">
                                <input type="hidden" name="productimage" value="<?= $productimage ?>">
                                <button type="submit" name="add-product" class="flex items-center justify-center rounded-md bg-blue-600 px-5 py-2.5 text-center text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script src="../scripts/main.js"></script>
</body>

</html>