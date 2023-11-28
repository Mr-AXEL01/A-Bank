<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

include_once 'crud_users.php';
$userDetails = getUserDetails($user_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto">
            <span class="text-2xl font-bold">Your Bank</span>
            <div class="float-right">
                <span>Welcome, <?= $username ?></span>
                <a href="logout.php" class="ml-4">Logout</a>
            </div>
        </div>
    </nav>

    <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-bold mb-2">User Information</h2>
            <p>User ID: <?= $user_id ?></p>
            <p>Username: <?= $username ?></p>
            <?php
            if (isset($userDetails)) {
                ?>
                <p>Email: <?= $userDetails['email'] ?></p>
                <p>Phone: <?= $userDetails['phone'] ?></p>
                <?php
            }
            ?>
        </div>
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-bold mb-2">Recent Transactions</h2>
            <?php
            if (isset($transactions)) {
                foreach ($transactions as $transaction) {
                    ?>
                    <p><?= $transaction['type'] ?>: <?= $transaction['amount'] ?> <?= $transaction['currency'] ?></p>
                    <?php
                }
            } else {
                ?>
                <p>No recent transactions.</p>
                <?php
            }
            ?>
        </div>
    </div>

    <footer class="mt-8 bg-blue-500 p-4 text-white">
        <div class="container mx-auto text-center">
            &copy; <?= date('Y') ?> Your Bank. All rights reserved.
        </div>
    </footer>
</body>
</html>