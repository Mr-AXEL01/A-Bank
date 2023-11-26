<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_users.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $addressId = $_POST['address_id'];
        createUser($username, $password, $addressId);
    }

    $users = getAllUsers();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <form method="post" action="">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="mt-1 p-2 border rounded-md w-full">

            <label for="password" class="block text-sm font-medium text-gray-700 mt-4">Password</label>
            <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md w-full">

            <label for="address_id" class="block text-sm font-medium text-gray-700 mt-4">Address ID</label>
            <input type="number" name="address_id" id="address_id" class="mt-1 p-2 border rounded-md w-full">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create User</button>
        </form>

        <table class="mt-8 w-full">

        </table>
    </div>
</body>
</html>