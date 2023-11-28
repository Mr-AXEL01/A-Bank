<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Customer Dashboard</title>
</head>
<body class="bg-gray-100 flex">
    <aside class="bg-blue-500 text-white w-1/5 p-4">
        <div class="mb-4">
            <span class="text-2xl font-bold">Your Bank</span>
            <p>Welcome, <?= $username ?></p>
        </div>
        <nav>
            <ul>
                <li><a href="customer_accounts.php">Accounts</a></li>
                <li><a href="customer_transactions.php">Transactions</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="w-4/5 p-4">
        <!-- Content for the main section goes here -->
        <h1 class="text-3xl font-bold mb-4">Customer Information</h1>
        <p>Main content for customer details goes here.</p>
    </main>
</body>
</html>

