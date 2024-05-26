<?php
include "../includes/_cart_number.php";
?>

<div class="bg-gray-100 shadow-sm px-8 py-3 flex flex-wrap justify-between items-center">
    <div class="text-blue-700 text-3xl font-bold cursor-pointer" onclick="window.location.href='../index.php'">Shirtify.</div>
    <div class="flex flex-wrap gap-4 items-center w-full md:w-max">
        <a href="./cart.php" class="font-medium hover:underline flex items-center gap-2">Cart <span class="inline-block h-6 w-6 rounded-full bg-zinc-800 text-white text-center"><?= $countItems ?></span> </a>
        <a href="./account.php" class="font-medium hover:underline flex items-center gap-2">My Account <span class="inline-block h-8 w-8"><img class="h-full w-full object-cover rounded-full" src="<?= $_SESSION["avatar"] ?>" alt=""></span></a>
        <button type="submit" name="logout" onclick="window.location.href='../includes/_logout.php'" class="bg-zinc-800 text-white px-4 py-2 rounded-md hover:bg-zinc-700 w-full md:w-max">Logout</button>
    </div>
</div>