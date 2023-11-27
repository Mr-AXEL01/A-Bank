<?php

include_once 'crud_roles.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $roleId = $_POST['role_id'];

    deleteRole($roleId);
}

header("Location: roles.php");
exit();
?>