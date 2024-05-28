<?php
// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

include "partials/_dbconnect.php";

$addedBy = $_SESSION["username"];

// sql query to display from table
$sql = "SELECT * FROM cart WHERE added_by = '$addedBy'";
$result = mysqli_query($conn, $sql);
$totalAmount = 0;
$deliveryFee = number_format(100, 2);

if (mysqli_num_rows($result) > 0) {
    // fetch each row from the table
    while ($row = mysqli_fetch_assoc($result)) {
        $productprice = $row["product_price"];
        $quantity = $row["quantity"];
        $totalAmount = $totalAmount + ($productprice * $quantity);
    }

    $formattedTotalMRP = number_format($totalAmount, 2);
    $totalAmount = $totalAmount + $deliveryFee;
    $formattedTotalAmount = number_format($totalAmount, 2);

    echo '<div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm  sm:p-6">
    <p class="text-xl font-semibold text-gray-900 ">Order summary</p>
    <div class="space-y-4">
        <div class="space-y-2">
            <dl class="flex items-center justify-between gap-4">
                <dt class="text-base font-normal text-gray-500 ">Total MRP</dt>
                <dd class="text-base font-medium text-gray-900 ">Rs.' . $formattedTotalMRP . '</dd>
            </dl>

            <dl class="flex items-center justify-between gap-4">
                <dt class="text-base font-normal text-gray-500 ">Delivery Fee</dt>
                <dd class="text-base font-medium text-green-600">Rs.' . $deliveryFee . '</dd>
            </dl>
        </div>

        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 ">
            <dt class="text-base font-bold text-gray-900 ">Total Amount</dt>
            <dd class="text-base font-bold text-gray-900 ">Rs.' . $formattedTotalAmount . '</dd>
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
</div>';
}
