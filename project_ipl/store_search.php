<?php
session_start();
require_once "controllerUserData.php"; // This file should have your DB connection $con

if (isset($_SESSION['email']) && isset($_POST['query'])) {
    $email = $_SESSION['email'];
    $query = trim($_POST['query']);

    if ($query !== '') {
        $stmt = $con->prepare("INSERT INTO search_history (user_email, search_query) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $query);
        $stmt->execute();
        $stmt->close();
    }
}
?>
