<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $addressId = $_POST['address_id'];

    if (!empty($username) && !empty($password) && !empty($addressId)) {
        if (createUser($username, $password, $addressId)) {
            header('Location: users.php');
            exit();
        } else {
            $error = 'Failed to add the user.';
        }
    } else {
        $error = 'All fields are required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add User</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Add User</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" name="username" id="username" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="address_id" class="block text-gray-700">Address ID:</label>
                <input type="number" name="address_id" id="address_id" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Add User</button>
            </div>
        </form>
    </div>
</body>
</html>
