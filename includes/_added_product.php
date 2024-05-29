<?php
// check if the user is loggedin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: ./signin.php");
    exit;
}

include "partials/_dbconnect.php";

$sn = 1;
$addedBy = $_SESSION["username"];

// sql query to display from table
$sql = "SELECT * FROM products WHERE added_by = '$addedBy'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<thead>
    <tr>
        <th scope="col" class="px-4 py-3 text-start font-bold text-gray-800 uppercase">S.N.</th>
        <th scope="col" class="px-4 py-3 text-start font-bold text-gray-800 uppercase">Product Name</th>
        <th scope="col" class="px-4 py-3 text-start font-bold text-gray-800 uppercase">Product Price</th>
        <th scope="col" class="px-4 py-3 text-start font-bold text-gray-800 uppercase">Action</th>
    </tr>
</thead>';
    // fetch each row from the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tbody><tr class="odd:bg-white even:bg-gray-100 ">
        <td class="px-5 py-4 whitespace-nowrap  font-medium text-gray-800 ">' . $sn . '</td>
        <td class="px-5 py-4 whitespace-nowrap  text-gray-800 ">' . $row["product_name"] . '</td>
        <td class="px-5 py-4 whitespace-nowrap  text-gray-800 ">' . $row["product_price"] . '</td>
        <td class="px-5 py-4 whitespace-nowrap font-medium flex gap-4">
            <a href="./update_product.php?updateid=' . $row["id"] . '" class="font-semibold rounded-lg border border-transparent hover:underline text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">Update</a>
            <button type="button" data-id="' . $row["id"] . '" class="delete font-semibold rounded-lg border border-transparent hover:underline text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
        </td>
    </tr></tbody>';
        $sn++;
    }
} else {
    echo '<tr class="odd:bg-white even:bg-gray-100 ">
    <td class="px-5 py-4 whitespace-nowrap text-center text-xl font-medium text-gray-800 ">No Products Added</td>
</tr>';
}
