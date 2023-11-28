<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        $query = "SELECT id, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['user_id'] = $userId;
            echo "Login successful. Redirecting to the dashboard...";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Login</h2>
        <form method="post" action="login_process.php" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" required class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" required class="mt-1 p-2 border rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Login</button>
        </form>
        <p class="mt-4 text-gray-700">Don't have an account? <a href="register.php" class="text-blue-500">Register here</a>.</p>
    </div>

</body>
</html>
