<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

echo 'Connected successfully';

mysqli_select_db($conn, 'exam_db');

$sql = 'CREATE DATABASE exam_db';
$retval = mysqli_query($conn, $sql);

if (!$retval) {
    die('Could not create database: ' . mysqli_error($conn));
}

echo "Database exam_db created successfully\n";
?>
