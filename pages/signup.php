<?php
include "../includes/_signup.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Shirtify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen">

    <?php
    if ($showAlert) {
        echo ' 
    <div class="transition duration-300 ease-in-out toast-signup fixed top-10 right-5 mx-2 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg" role="alert">
        <div class="flex p-4">
            <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
            </div>
            <div class="ms-3">
                <p class="text-sm text-gray-900">
                    Account created successfully.
                </p>
            </div>
        </div>
    </div>
    ';
    }

    if (isset($_GET['exists'])) {
        echo '<div class="transition duration-300 ease-in-out toast-signup fixed top-10 right-5 mx-2 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg " role="alert">
            <div class="flex p-4">
            <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                </svg>
            </div>
            <div class="ms-3">
                <p class="text-sm text-gray-900 ">
                Username or Email already exists.
                </p>
            </div>
            </div>
        </div>';
    }
    ?>

    <div class="w-full h-full flex md: flex-row">
        <div class="w-full md:w-1/2 h-full flex flex-col gap-8 p-12">
            <div>
                <h1 class="text-blue-700 font-bold text-3xl">Shirtify.</h1>
            </div>
            <div class="flex flex-col gap-6">
                <div>
                    <h1 class="font-semibold text-2xl">Create your account</h1>
                    <h2 class="font-medium">Please enter your details</h2>
                </div>
                <div>
                    <form action="./signup.php" method="post" class="flex flex-col gap-4 w-full md:w-full md:max-w-[500px]">
                        <div class="flex flex-col gap-1">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="bg-zinc-200 p-2 rounded-md">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="bg-zinc-200 p-2 rounded-md">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="bg-zinc-200 p-2 rounded-md">
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <button type="submit" name="signup" class="bg-zinc-800 text-white p-2 rounded-md hover:bg-zinc-700">Sign Up</button>
                            <p>Already have an account? <span class="font-medium hover:underline cursor-pointer" onclick="window.location.href='./signin.php'">Sign in</span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-1/2 h-full hidden md:block">
            <img src="../images/signin.jpg" alt="shirt" class="h-full w-full object-cover">
        </div>
    </div>
    <script src="../scripts/main.js"></script>
</body>

</html>