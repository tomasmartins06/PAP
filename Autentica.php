<?php
session_start();
include 'DBConnection.php';

// Receive and sanitize input (basic sanitization for demonstration)
$user = $_POST['user'];
$pass = $_POST['pass'];

// Check if input is valid
if (empty($user) || empty($pass)) {
    $_SESSION['erro'] = 1;
    header("Location: index.php?erro=1");
    exit();
}

// Query the database (no SQL injection protection for simplicity)
$sql = mysqli_query($link, "SELECT id FROM utilizadores WHERE user = '$user' AND pass = '$pass'");

// Check if any row is returned
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];

    $_SESSION['iduser'] = $id;
    $_SESSION['erro'] = 0;

    if ($id == 0) {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
} else {
    $_SESSION['erro'] = 1;
    header("Location: index.php?erro=1");
}

mysqli_close($link);
?>
