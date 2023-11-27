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

    
</body>
</html>