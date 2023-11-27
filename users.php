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
    <title>User Management</title>
   
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-bold mb-4">User Management</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Username</th>
            <th class="py-2 px-4 border-b">Password</th>
            <th class="py-2 px-4 border-b">Address ID</th>
            <th class="py-2 px-4 border-b">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $users = getAllUsers();
        foreach ($users as $user) {
            echo "<tr class='hover:bg-gray-50'>";
            echo "<td class='py-2 px-4 border-b'>{$user['id']}</td>";
            echo "<td class='py-2 px-4 border-b'>{$user['username']}</td>";
            echo "<td class='py-2 px-4 border-b'>{$user['password']}</td>";
            echo "<td class='py-2 px-4 border-b'>{$user['address_id']}</td>";
            echo "<td class='py-2 px-4 border-b'><a href='update_user.php?id={$user['id']}' class='text-blue-500'>Update</a> | <a href='delete_user.php?id={$user['id']}' class='text-red-500'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>