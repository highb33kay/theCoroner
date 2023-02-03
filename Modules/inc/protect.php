<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST['logout'])) {
    $time = time();
    $_SESSION['logoutTime'] = $time;
    session_destroy();
    unset($_SESSION);
}

// (C) CHECK IF LOGOUT TIME IS WITHIN 1 HOUR
if (isset($_SESSION['logoutTime']) && time() - $_SESSION['logoutTime'] < 3600) {
    header('Location: login.php');
    exit();
}

// (D) REDIRECT TO LOGIN PAGE IF NOT SIGNED IN
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
