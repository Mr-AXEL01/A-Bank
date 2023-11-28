<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Role</title>
</head>
<body  class="bg-gray-100 p-8">
    <?php
    include_once 'crud_roles.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $role_id = $_POST['role_id'];
        $new_name = $_POST['new_name'];

        updateRole($role_id, $new_name);

        header("Location: roles.php");
        exit();
    }
    ?>

    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-3xl font-bold mb-4">Update Role</h1>
    
        <?php if (isset($error)): ?>
            <div class="text-red-500 mb-4"><?= $error ?></div>
        <?php endif; ?>
    
        <form action="" method="post">
            <input type="hidden" name="role_id" value="<?= $role_id ?>">
            
            <div class="mb-4">
                <label for="new_role_name" class="block text-gray-700">New Role Name:</label>
                <input type="text" name="new_role_name" id="new_role_name" class="border border-gray-300 p-2 w-full" value="<?= $new_role_name ?>" required>
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Update Role</button>
                <a href="roles.php" class="ml-2 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>