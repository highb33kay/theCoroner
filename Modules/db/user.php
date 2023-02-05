<?php

include 'conn.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

echo 'Connected successfully';

$sql_user = "CREATE TABLE if not exists Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    login_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sql_exam = "CREATE TABLE if not exists exam (
    id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    time INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    admin_id INT NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES Users(id)
)";

if (mysqli_query($conn, $sql_exam) && mysqli_query($conn, $sql_user)) {
    echo 'Table exam and Users created successfully';
} else {
    die('Could not create table: ' . mysqli_error($conn));
}

mysqli_close($conn);

?>
