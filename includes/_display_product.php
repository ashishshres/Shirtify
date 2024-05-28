<?php
// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

include "partials/_dbconnect.php";

// sql query to display from table
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // fetch each row from the table
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row["id"];
        $productname = $row["product_name"];
        $productprice = $row["product_price"];
        $formattedProductPrice = number_format($productprice, 2);
        $path = $row["image_path"];
        $sendpath = '.' . $row["image_path"];
        echo '
    <form action="" method="post" class="w-full md:w-72">
    <div class="card relative flex w-full flex-col overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md">
            <a class="relative mx-3 mt-3 flex h-52 overflow-hidden rounded-xl" href="#">
                <img class="object-cover w-full" src="' . $path . '" alt="product image" />
            </a>
            <div class="mt-4 px-5 pb-5">
                <button type="submit" name="view" class="text-xl tracking-tight text-slate-900">
                    ' . $productname . '
                </button>
                <div class="mt-2 mb-5 flex items-center justify-between">
                    <p>
                        <span class="text-2xl font-bold text-zinc-800">Rs.' . $formattedProductPrice . '</span>
                    </p>
                </div>
                <input type="hidden" name="productid" value="' . $productId . '">
                <input type="hidden" name="productname" value="' . $productname . '">
                <input type="hidden" name="productprice" value="' . $productprice . '">
                <input type="hidden" name="productimage" value="' . $sendpath . '">
                <button type="submit" name="add" class="flex items-center justify-center rounded-md bg-blue-600 px-5 py-2.5 text-center text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to cart</button>
            </div>
        </div>
    </form>
    ';
    }
}
