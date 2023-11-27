<?php

include_once 'crud_roles.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $roleId = $_POST['role_id'];
    $newName = $_POST['new_name'];

    updateRole($roleId, $newName);
}

header("Location: roles.php");
exit();
?>