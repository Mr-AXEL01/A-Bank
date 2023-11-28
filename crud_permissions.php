<?php

include_once 'db_connection.php';

if (!function_exists('createPermission')) {
    function createPermission($name) {
        global $conn;
        $query = "INSERT INTO permissions (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }
}

if (!function_exists('getAllPermissions')) {
    function getAllPermissions() {
        global $conn;
        $query = "SELECT * FROM permissions";
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

if (!function_exists('updatePermission')) {
    function updatePermission($permissionId, $name) {
        global $conn;
        $query = "UPDATE permissions SET name=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $name, $permissionId);
        return $stmt->execute();
    }
}

if (!function_exists('deletePermission')) {
    function deletePermission($permissionId) {
        global $conn;
        $query = "DELETE FROM permissions WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $permissionId);
        return $stmt->execute();
    }
}

?>
