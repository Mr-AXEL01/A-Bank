<?php
session_starts();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>dashboard</title>
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

    
</body>
</html>