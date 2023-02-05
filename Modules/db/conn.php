<?php

$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'rootpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

$sql = 'CREATE DATABASE exam_db';
$retval = mysql_query($sql, $conn);

if (!$retval) {
    die('Could not create database: ' . mysql_error());
}

echo "Database exam_db created successfully\n";

?>
