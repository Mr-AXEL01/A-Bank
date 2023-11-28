<?php
include_once 'db_connection.php';
include_once 'crud_users.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['id'];

    if (deleteUser($user_id)) {
        header('Location: users.php');
        exit();
    } else {
        $error = 'Failed to delete user.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete User</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Delete User</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <p>Are you sure you want to delete this user?</p>
        
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            
            <div class="mb-4">
                <button type="submit" class="bg-red-500 text-white py-2 px-4">Delete User</button>
                <a href="users.php" class="ml-2 text-blue-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
