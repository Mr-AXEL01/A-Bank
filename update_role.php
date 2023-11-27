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

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Role</h2>
        <form method="post" action="">
            <input type="hidden" name="role_id" value="<?= $_POST['role_id'] ?>">

            <label for="new_name" class="block text-sm font-medium text-gray-700">New Role Name</label>
            <input type="text" name="new_name" id="new_name" class="mt-1 p-2 border rounded-md w-full" value="<?= $_POST['role_name'] ?>">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Update Role</button>
        </form>
    </div>
</body>
</html>