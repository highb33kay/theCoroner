<?php

session_start();

if (isset($_POST['user']) && !isset($_SESSION['user'])) {
    // User & Password
    $users = [
        'highb33kay' => '123456',
    ];

    if (
        isset($users[$_POST['user']]) &&
        $users[$_POST['user']] == $_POST['password']
    ) {
        $_SESSION['user'] = $_POST['user'];
    }

    if (!isset($_SESSION['user'])) {
        $failed = true;
    }
}

if (isset($_SESSION['user'])) {
    header('Location: dash.php');
    exit();
}
