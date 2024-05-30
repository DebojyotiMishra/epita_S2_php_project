<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php
    // Include database connection and helper functions
    include('../includes/db.php');
    include('../includes/functions.php');

    // Check if the form is submitted
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve user record from the database based on the provided username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password
            if(verifyPassword($password, $row['password_hash'])) {
                // Start session and redirect user to dashboard or homepage
                session_start();
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password!";
            }
        } else {
            $error = "Invalid username or password!";
        }
    }
    ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php
    if(isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>
