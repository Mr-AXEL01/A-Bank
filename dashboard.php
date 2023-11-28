<?php
session_starts();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>