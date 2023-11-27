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
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">ID</th>
                    <th class="py-2 px-4 bg-gray-200">Username</th>
                    <th class="py-2 px-4 bg-gray-200">Password</th>
                    <th class="py-2 px-4 bg-gray-200">Address ID</th>
                    <th class="py-2 px-4 bg-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="py-2 px-4"><?$user['id']?></td>
                        <td class="py-2 px-4"><?$user['username']?></td>
                        <td class="py-2 px-4"><?$user['PASSWORD']?></td>
                        <td class="py-2 px-4"><?$user['address_id']?></td>
                        <td class="py-2 px-4">
                            <form action="update_user.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <input type="hidden" name="new_username" value="new_username_value">
                                <input type="hidden" name="new_password" value="new_password_value">
                                <input type="hidden" name="new_address_id" value="new_address_id_value">
                                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
                            </form>
                            <form action="delete_user.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>