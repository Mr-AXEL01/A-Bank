<?php
include_once 'crud_roles.php';
include_once 'crud_permissions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['permission_name'])) {
    $permission_name = $_POST['permission_name'];
    createPermission($permission_name);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role_id_assign']) && isset($_POST['permission_id_assign'])) {
    $role_id_assign = $_POST['role_id_assign'];
    $permission_id_assign = $_POST['permission_id_assign'];

    $assignmentExists = checkPermissionAssignment($role_id_assign, $permission_id_assign);

    if (!$assignmentExists) {
        assignPermissionToRole($role_id_assign, $permission_id_assign);
    } else {
        revokePermissionFromRole($role_id_assign, $permission_id_assign);
    }
}

$permissions = getAllPermissions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Roles and Permissions</title>
</head>
<body class="bg-gray-100 p-8">
    <form method="post" action="">
        <label for="permission_name" class="block text-sm font-medium text-gray-700">Permission Name</label>
        <input type="text" name="permission_name" id="permission_name" class="mt-1 p-2 border rounded-md w-full">
        <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md">Create Permission</button>
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
            <?php foreach ($permissions as $permission): ?>
                <tr>
                    <td class="py-2 px-4"><?= $permission['id'] ?></td>
                    <td class="py-2 px-4"><?= $permission['name'] ?></td>
                    <td class="py-2 px-4">
                        <form action="update_permission.php" method="post">
                            <input type="hidden" name="permission_id" value="<?= $permission['id'] ?>">
                            <input type="hidden" name="new_name" value="new_name_value">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
                        </form>
                        <form action="delete_permission.php" method="post">
                            <input type="hidden" name="permission_id" value="<?= $permission['id'] ?>">
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form method="post" action="">
        <label for="role_id_assign" class="block text-sm font-medium text-gray-700">Role ID</label>
        <input type="text" name="role_id_assign" id="role_id_assign" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter Role ID">

        <label for="permission_id_assign" class="block text-sm font-medium text-gray-700 mt-4">Permission ID</label>
        <input type="text" name="permission_id_assign" id="permission_id_assign" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter Permission ID">

        <button type="submit" class="mt-4 bg-green-500 text-white p-2 rounded-md">Assign/Revoke Permission</button>
    </form>

    <table class="mt-8 w-full">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Role ID</th>
                <th class="py-2 px-4 bg-gray-200">Permission ID</th>
                <th class="py-2 px-4 bg-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rolePermissions = getAllRolePermissions();
            foreach ($rolePermissions as $rolePermission): ?>
                <tr>
                    <td class="py-2 px-4"><?= $rolePermission['role_id'] ?></td>
                    <td class="py-2 px-4"><?= $rolePermission['permission_id'] ?></td>
                    <td class="py-2 px-4">
                        <form action="roles_permissions.php" method="post">
                            <input type="hidden" name="role_id_assign" value="<?= $rolePermission['role_id'] ?>">
                            <input type="hidden" name="permission_id_assign" value="<?= $rolePermission['permission_id'] ?>">
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-md">Revoke</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
