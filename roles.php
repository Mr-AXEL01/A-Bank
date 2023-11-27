<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_roles.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        createRole($name);
    }
    
    $roles = getAllRoles();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <form method="post" action="">
            <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create Role</button>
        </form>
    </div>
</body>
</html>