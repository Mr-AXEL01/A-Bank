<?php

include_once 'db_connection.php';

// Functions for roles
function createRole($name) {
    global $conn;
    $query = "INSERT INTO roles (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    return $stmt->execute();
}

function getAllRoles() {
    global $conn;
    $query = "SELECT * FROM roles";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateRole($roleID, $newName) {
    global $conn;
    $query = "UPDATE roles SET name=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $newName, $roleID);
    return $stmt->execute();
}

function deleteRole($roleID) {
    global $conn;
    $query = "DELETE FROM roles WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $roleID);
    return $stmt->execute();
}

// Functions for permissions
function createPermission($name) {
    global $conn;
    $query = "INSERT INTO permissions (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    return $stmt->execute();
}

function getAllPermissions() {
    global $conn;
    $query = "SELECT * FROM permissions";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updatePermission($permissionID, $newName) {
    global $conn;
    $query = "UPDATE permissions SET name=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $newName, $permissionID);
    return $stmt->execute();
}

function deletePermission($permissionID) {
    global $conn;
    $query = "DELETE FROM permissions WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $permissionID);
    return $stmt->execute();
}

function assignPermission($roleID, $permissionID) {
    global $conn;
    $query = "INSERT INTO role_permissions (role_id, permission_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $roleID, $permissionID);
    return $stmt->execute();
}

function revokePermission($roleID, $permissionID) {
    global $conn;
    $query = "DELETE FROM role_permissions WHERE role_id=? AND permission_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $roleID, $permissionID);
    return $stmt->execute();
}

?>
