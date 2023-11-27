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