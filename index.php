<?php
// index.php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullName = $_POST['full_name'];

    // Perform any necessary validation and data processing

    // Display the output
    echo "<h2>Registration Successful!</h2>";
    echo "<p>Username: $username</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Full Name: $fullName</p>";
    exit;
}
?>

<!-- templates/registration/register.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com/2.2.17/tailwind.min.css">
    <title>Registration Form</title>
</head>

<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <form class="w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
            <h2 class="text-2xl mb-6">Register</h2>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input id="username" name="username" type="text" placeholder="Username" required
                    class="form-input">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" name="email" type="email" placeholder="Email" required class="form-input">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" required
                    class="form-input">
            </div>
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                <input id="full_name" name="full_name" type="text" placeholder="Full Name" required
                    class="form-input">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Register
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</body>

</html>