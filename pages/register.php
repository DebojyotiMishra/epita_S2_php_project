<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <?php
    // Include database connection and helper functions
    include('../includes/db.php');
    include('../includes/functions.php');

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate inputs
        if(empty($username) || empty($password)) {
            $error = "Username and password are required!";
        } else {
            // Check if username is unique
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $error = "Username already exists!";
            } else {
                // Hash the password
                $hashedPassword = hashPassword($password);

                // Insert user into database
                $sql = "INSERT INTO users (username, password_hash) VALUES ('$username', '$hashedPassword')";
                if(mysqli_query($conn, $sql)) {
                    $success = "Registration successful!";
                } else {
                    $error = "Registration failed! Please try again later.";
                }
            }
        }
    }
    ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
    <?php
    if(isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    if(isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    ?>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>
