<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User</title>
   
</head>
<body class="bg-gray-100 font-sans">
    <div class="bg-gray-800 text-white w-1/5">
        <div class="p-4">
            <h1 class="text-2xl font-semibold">Navigation</h1>
            <ul class="mt-4">
                <li><a href="banks.php" class="text-blue-300 hover:text-blue-500">Banks</a></li>
                <li><a href="agencies.php" class="text-blue-300 hover:text-blue-500">Agencies</a></li>
                <li><a href="addresses.php" class="text-blue-300 hover:text-blue-500">Addresses</a></li>
                <!-- Add links for other pages -->
            </ul>
        </div>
    </div>
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Users</h1>
    
        <table class="w-full border border-collapse">
            <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Username</th>
                <th class="py-2 px-4 border">Password</th>
                <th class="py-2 px-4 border">Address ID</th>
                <th class="py-2 px-4 border">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="py-2 px-4 border"><?= $user['id'] ?></td>
                        <td class="py-2 px-4 border"><?= $user['username'] ?></td>
                        <td class="py-2 px-4 border"><?= $user['address_id'] ?></td>
                        <td class="py-2 px-4 border">
                            <a href="update_user.php?id=<?= $user['id'] ?>" class="text-blue-500">Update</a>
                            <a href="delete_user.php?id=<?= $user['id'] ?>" class="text-red-500 ml-2">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add_user.php" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Add New User</a>
    </div>
</body>
</html>