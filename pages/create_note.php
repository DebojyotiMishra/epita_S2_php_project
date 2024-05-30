<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('../includes/db.php');

// Handle form submission
if(isset($_POST['create_note'])) {
    $user_id = $_SESSION['user_id'];
    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];

    // Insert new note into the database
    $sql = "INSERT INTO notes (user_id, note_title, note_content) VALUES ('$user_id', '$note_title', '$note_content')";
    if(mysqli_query($conn, $sql)) {
        $success = "Note created successfully!";
        header("Location: dashboard.php");
    } else {
        $error = "Error creating note. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Create Note</title>
</head>
<body>
    <h2>Create a New Note</h2>
    <?php
    if(isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    if(isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    ?>
    <form method="POST" action="">
        <label for="note_title">Note Title</label>
        <input type="text" id="note_title" name="note_title" required><br><br>

        <label for="note_content">Note Content:</label><br>
        <textarea id="note_content" name="note_content" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" name="create_note" value="Create Note">
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
