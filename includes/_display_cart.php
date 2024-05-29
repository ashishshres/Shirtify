<?php
// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}
include "partials/_dbconnect.php";

$sn = 0;
$addedBy = $_SESSION["username"];

// sql query to display from table
$sql = "SELECT * FROM cart WHERE added_by = '$addedBy'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // fetch each row from the table
    echo '<div class="mt-3 md:gap-6 lg:flex lg:items-start xl:gap-8">
    <div class="w-full flex-none lg:max-w-2xl xl:max-w-4xl">
        <div class="space-y-6 mb-4">';
    while ($row = mysqli_fetch_assoc($result)) {
        $productid = $row["id"];
        $productimage = $row["image_path"];
        $productname = $row["product_name"];
        $productprice = $row["product_price"];
        $quantity = $row["quantity"];

        echo '<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                <img class="h-20 w-20 object-cover" src="' . $productimage . '" alt="imac image" />
            <label for="counter-input" class="sr-only">Choose quantity:</label>
            <div class="flex items-center justify-between md:order-3 md:justify-end">
                <div class="flex items-center">
                    <form action="../includes/_update_cart.php" method = "post">
                        <input type = "hidden" name="update" value = "' . $productid . '">
                        <button type="submit" name="decrement" id="decrement-button-4" data-input-counter-decrement="counter-input-4" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 ">
                            <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" name="update-quantity" id="counter-input-4" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 " placeholder="" value="' . $quantity . '"/>
                        <button type="submit" name="increment" id="increment-button-4" data-input-counter-increment="counter-input-4" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 ">
                            <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="text-end md:order-4 md:w-32">
                    <p class="text-base font-bold text-gray-900 ">Rs.' . $productprice . '</p>
                </div>
            </div>
    
            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                <h1 class="text-xl font-medium">' . $productname . '</h1>
    
                <div class="flex items-center gap-4">
                    <a href="../includes/_remove_cart.php?deleteid=' . $productid . '" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline cursor-pointer">
                        <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        Remove
                    </a>
                </div>
            </div>
        </div>
    </div>';
        $sn++;
    }
    echo '</div></div>';
} else {
    echo '<div class="w-full">
    <p class="text-center text-xl font-medium text-gray-800 ">No Products Added to Cart</p>
</div>';
}
