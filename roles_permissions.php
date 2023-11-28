<?php
include_once 'crud_permissions.php';
include_once 'crud_roles.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['assign_permission'])) {
        $role_id = $_POST['role_id'];
        $permission_id = $_POST['permission_id'];

        $rolePermissions = getAllRolePermissions($role_id);
        $isPermissionAssigned = false;

        foreach ($rolePermissions as $rolePermission) {
            if ($rolePermission['permission_id'] == $permission_id) {
                $isPermissionAssigned = true;
                break;
            }
        }

        if (!$isPermissionAssigned) {
            assignPermissionToRole($role_id, $permission_id);
        }
    } elseif (isset($_POST['revoke_permission'])) {
        $role_id = $_POST['role_id'];
        $permission_id = $_POST['permission_id'];
        revokePermissionFromRole($role_id, $permission_id);
    }
}
$roles = getAllRoles();
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
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Roles and Permissions</h2>

        <form method="post" action="">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Select Role</label>
            <select name="role_id" id="role_id" class="mt-1 p-2 border rounded-md w-full">
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="permission_id" class="block text-sm font-medium text-gray-700 mt-4">Select Permission</label>
            <select name="permission_id" id="permission_id" class="mt-1 p-2 border rounded-md w-full">
                <?php foreach ($permissions as $permission): ?>
                    <option value="<?= $permission['id'] ?>"><?= $permission['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="assign_permission" class="mt-4 bg-green-500 text-white p-2 rounded-md">Assign Permission</button>
            <button type="submit" name="revoke_permission" class="mt-4 bg-red-500 text-white p-2 rounded-md">Revoke Permission</button>
        </form>

        <table class="mt-8 w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Role</th>
                    <th class="py-2 px-4 bg-gray-200">Permission</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <?php $rolePermissions = getAllRolePermissions($role['id']); ?>
                    <?php foreach ($rolePermissions as $rolePermission): ?>
                        <tr>
                            <td class="py-2 px-4"><?= $role['name'] ?></td>
                            <td class="py-2 px-4"><?= $rolePermission['permission_name'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
