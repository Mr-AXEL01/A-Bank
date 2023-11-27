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
<body>
    
</body>
</html>