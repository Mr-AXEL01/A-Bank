<?php
include_once 'db_connection.php';
include_once 'crud_roles.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roleName = $_POST['role_name'];

    if (!empty($roleName)) {
        if (addRole($roleName)) {
            header('Location: roles.php'); 
            exit();
        } else {
            $error = 'Failed to add the role.';
        }
    } else {
        $error = 'Role name is required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg_gray-100">
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-semibold mb-4">Add New Role</h1>
        <?php
        if (isset($error)) {
            echo '<div class="text-red-500 mb-4">' . $error . '</div>';
        }
        ?>

        <form action="add_role.php" method="post" class="max-w-md">
            <div class="mb-4">
                <label for="role_name" class="block text-gray-600">Role Name:</label>
                <input type="text" name="role_name" id="role_name" class="w-full border rounded py-2 px-3" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Role</button>
        </form>
    </div>
</body>
</html>