<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // If the user is already logged in, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a function like validateUser() to check credentials
    // Implement your user validation logic here
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example validation (replace this with your actual validation logic)
    if (validateUser($username, $password)) {
        // Assuming $user_data is an associative array containing user details
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];
        // Add other relevant user information to the session if needed
        // ...

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password"; // Display an error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Login</h2>
        
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="mt-1 p-2 border rounded-md w-full" required>

            <label for="password" class="block text-sm font-medium text-gray-700 mt-4">Password</label>
            <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md w-full" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Login</button>
        </form>
    </div>
</body>
</html>
