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
    $productname = $row["product_name"];
    $productprice = $row["product_price"];
    $path = $row["image_path"];
    $sendpath = '.' . $row["image_path"];
    echo '
    <form action="" method="post" class="w-full md:w-72">
    <div class="h-90 w-full md:w-72 flex flex-col bg-white border rounded-xl shadow-md">
        <div class="w-full h-56">
        <img class="w-full h-full object-cover rounded-t-xl" src="' . $path . '" alt="Image Description">
        </div>
        <div class="p-4 md:p-5">
          <h3 class="text-lg font-bold text-gray-800 ">
            ' . $productname . '
          </h3>
          <p class="mt-1 text-gray-500 ">Rs.
            ' . $productprice . '
          </p>
          <input type="hidden" name="productname" value = "' . $productname . '">
          <input type="hidden" name="productprice" value = "' . $productprice . '">
          <input type="hidden" name="productimage" value = "' . $sendpath . '">
          <button type="submit" name="add" class="mt-2 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
            Add to cart
          </button>
        </div>
      </div>
    </form>
    ';
  }
}
