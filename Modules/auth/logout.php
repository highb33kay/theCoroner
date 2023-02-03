<?php

if (session_status() == PHP_SESSION_ACTIVE) {
    // session is active
    if (isset($_GET['logout'])) {
        // store the logout time in the session variable
        $_SESSION['logoutTime'] = time();
        // end the session
        session_destroy();
        header('Location: login.php');
        exit();

        if (isset($_GET['logout'])) {
            // store the logout time in the session variable
            $_SESSION['logoutTime'] = time();
            // end the session
            session_destroy();
            header('Location: login.php');
            exit();
        }

        // check if the user is logging in
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // check if the user has been logged out for less than one hour
            if (
                !isset($_SESSION['logoutTime']) ||
                time() - $_SESSION['logoutTime'] >= 3600
            ) {
                // log the user in
                // ...
            } else {
                // show an error message
                echo 'You must wait one hour before logging in again.';
            }
        }
    }
} else {
    // session is not active
    // redirect to login page
    header('Location: login.php');
}

?>
