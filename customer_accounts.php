<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// You might want to fetch and display the customer's account information here.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Customer Accounts</title>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar (similar to customer_dashboard.php) -->
    <aside class="bg-blue-500 text-white w-1/5 p-4">
        <div class="mb-4">
            <span class="text-2xl font-bold">Your Bank</span>
            <p>Welcome, <?= $username ?></p>
        </div>
        <nav>
            <ul>
                <li><a href="customer_dashboard.php">Back to Dashboard</a></li>
                <!-- Add more links as needed -->
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="w-4/5 p-4">
        <h1 class="text-3xl font-bold mb-4">Customer Accounts</h1>
    </main>
</body>
</html>
