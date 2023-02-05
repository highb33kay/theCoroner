<?php

require_once 'conn.php';
include 'user.php';

// registration form for users
$username = $password = $confirm_password = $role = '';
$username_err = $password_err = $confirm_password_err = $role = '';

// processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate username
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter a username.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))) {
        $username_err =
            'Username can only contain letters, numbers, and underscores.';
    } else {
        // prepare a select statement
        $sql = 'SELECT id FROM Users WHERE username = ?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $param_username);

            // set parameters
            $param_username = trim($_POST['username']);

            // attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = 'This username is already taken.';
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
            mysqli_stmt_close($stmt);
        }
    }

    // validate password
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter a password.';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Password must have atleast 6 characters.';
    } else {
        $password = trim($_POST['password']);
    }

    // validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($password_err) && $password != $confirm_password) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // validate role
    if (empty(trim($_POST['role']))) {
        $role_err = 'Please select a role.';
    } else {
        $role = trim($_POST['role']);
    }

    // check input errors before inserting in database
    if (
        empty($username_err) &&
        empty($password_err) &&
        empty($confirm_password_err) &&
        empty($role_err)
    ) {
        // prepare an insert statement
        $sql = 'INSERT INTO users (username, password, role) VALUES (?, ?, ?)';

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                'ss',
                $param_username,
                $param_password,
                $param_role
            );

            // set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_role = $role;

            // attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // redirect to login page
                header('location: login.php');
            } else {
                echo 'Something went wrong. Please try again later.';
            }
            mysqli_stmt_close($stmt);
        }
    }
    // close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <p>Sign Up Here</p>
       <!-- Add the form HTML code -->
<form action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
); ?>" method="post">
    <div class="form-group <?php echo !empty($username_err)
        ? 'has-error'
        : ''; ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>">
    <span class="help-block"><?php echo $username_err; ?></span>
</div>

<div class="form-group <?php echo !empty($password_err) ? 'has-error' : ''; ?>">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="form-control">
    <span class="help-block"><?php echo $password_err; ?></span>
</div>

<div class="form-group <?php echo !empty($confirm_password_err)
    ? 'has-error'
    : ''; ?>">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
    <span class="help-block"><?php echo $confirm_password_err; ?></span>
</div>

<div class="form-group <?php echo !empty($role_err) ? 'has-error' : ''; ?>">
    <label for="role">Role:</label>
    <select name="role" id="role" class="form-control">
        <option value="">Select Role</option>
        <option value="admin" <?php echo $role == 'admin'
            ? 'selected'
            : ''; ?>>Admin</option>
        <option value="user" <?php echo $role == 'user'
            ? 'selected'
            : ''; ?>>User</option>
    </select>
    <span class="help-block"><?php echo $role_err; ?></span>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
    <input type="reset" value="Reset" class="btn btn-default">
</div>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</form>
        
    </form>
    </div>
</body>
</html>
