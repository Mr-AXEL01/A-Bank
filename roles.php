<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Roles</title>
</head>
<body class="bg-gray-100 p-8">
    <?php
    include_once 'crud_roles.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['create'])) {
            $name = $_POST['name'];
            createRole($name);
        } elseif (isset($_POST['update'])) {
            $role_id = $_POST['role_id'];
            $new_name = $_POST['new_name'];
            updateRole($role_id, $new_name);
        } elseif (isset($_POST['delete'])) {
            $role_id = $_POST['role_id'];
            deleteRole($role_id);
        }
    }
    
    $roles = getAllRoles();
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <form method="post" action="">
            <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create Role</button>
        </form>

        <table class="mt-8 w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">ID</th>
                    <th class="py-2 px-4 bg-gray-200">Name</th>
                    <th class="py-2 px-4 bg-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td class="py-2 px-4"><?= $role['id'] ?></td>
                        <td class="py-2 px-4"><?= $role['name'] ?></td>
                        <td class="py-2 px-4">
                            <form action="update_role.php" method="post" class="inline">
                                <input type="hidden" name="role_id" value="<?= $role['id'] ?>">
                                <input type="text" name="new_name" placeholder="New Name" class="mr-2 p-2 border rounded-md">
                                <button type="submit" name="update" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
                            </form>
                            <form action="delete_role.php" method="post" class="inline">
                                <input type="hidden" name="role_id" value="<?= $role['id'] ?>">
                                <button type="submit" name="delete" class="bg-red-500 text-white p-2 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>