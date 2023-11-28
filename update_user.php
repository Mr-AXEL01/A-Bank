<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_address_id = $_POST['new_address_id'];

    if (!empty($new_username) && !empty($new_password) && !empty($new_address_id)) {
        if (updateUser($user_id, $new_username, $new_password, $new_address_id)) {
            header('Location: users.php');
            exit();
        } else {
            $error = 'Failed to update user.';
        }
    } else {
        $error = 'All fields are required.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['id'];
    $user = getUserById($user_id);

    if (!$user) {
        header('Location: users.php');
        exit();
    }

    $new_username = $user['username'];
    $new_address_id = $user['address_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update User</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Update User</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            
            <div class="mb-4">
                <label for="new_username" class="block text-gray-700">New Username:</label>
                <input type="text" name="new_username" id="new_username" class="border border-gray-300 p-2 w-full" value="<?= $new_username ?>" required>
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700">New Password:</label>
                <input type="password" name="new_password" id="new_password" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="new_address_id" class="block text-gray-700">New Address ID:</label>
                <input type="number" name="new_address_id" id="new_address_id" class="border border-gray-300 p-2 w-full" value="<?= $new_address_id ?>" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Update User</button>
                <a href="users.php" class="ml-2 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
