<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete Role</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_roles.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $role_id = $_POST['role_id'];

        deleteRole($role_id);

        header("Location: roles.php");
        exit();
    }
    ?>

    <div classs="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <p class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to delete this role?</p>
    </div>
</body>
</html>