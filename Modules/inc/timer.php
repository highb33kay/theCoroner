<?php
include 'variables.php';
// session_start();

// get the remaining time from the session variable
$remainingTime = $_SESSION['remainingTime'] ?? $set_time * 60; // 30 minutes in seconds

// if the remaining time is zero, log the user out
if ($remainingTime <= 0) {
    session_destroy();
    header('Location: logout.php');
    exit();
}

// get the current time
$currentTime = time();

// get the time of the last page load from the session variable
$lastPageLoadTime = $_SESSION['lastPageLoadTime'] ?? $currentTime;

// calculate the elapsed time since the last page load
$elapsedTime = $currentTime - $lastPageLoadTime;

// update the remaining time in the session variable
$_SESSION['remainingTime'] = $remainingTime - $elapsedTime;

// update the time of the last page load in the session variable
$_SESSION['lastPageLoadTime'] = $currentTime;
?>
