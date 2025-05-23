<?php
session_start();
require_once "controllerUserData.php"; //DB connection file

if (isset($_SESSION['email']) && isset($_POST['page'])) {
    $email = $_SESSION['email'];
    $page = trim($_POST['page']);

    if ($page !== '') {
        $stmt = $con->prepare("INSERT INTO page_visits (user_email, page) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $page);
        $stmt->execute();
        $stmt->close();
    }
}
?>
