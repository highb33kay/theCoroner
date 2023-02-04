<?php require '../inc/protect.php';
include '../inc/timer.php';
include 'variables.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/css/dash.css">
    <title>Admin</title>
</head>
<body>
    <header>
        <h3>Welcome <?php
        $user = $_SESSION['user'];
        echo $user;
        ?></h3>
        <nav>
            <ul>
                <li><a href="dash.php">Dashboard</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Admin</h1>
        <p>Admin page</p>
    </div>
    <!-- form that updates time and iframe url -->
    <form action="admin.php" method="post">
        <label for="time">Time</label>
        <input type="text" name="time" id="time">
        <label for="url">URL</label>
        <input type="text" name="url" id="url">
        <input type="submit" value="Update">
    </form>

    <?php
    echo $url;
    echo $set_time;
    ?>
        
</body>
</html>

