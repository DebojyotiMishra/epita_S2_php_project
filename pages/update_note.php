<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('../includes/db.php');

// Check if note ID is provided
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

// Get note ID from the URL
$note_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if(isset($_POST['update_note'])) {
    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];

    // Update note in the database
    $sql = "UPDATE notes SET note_title = '$note_title', note_content = '$note_content' WHERE id = '$note_id' AND user_id = '$user_id'";
    if(mysqli_query($conn, $sql)) {
        $success = "Note updated successfully!";
    } else {
        $error = "Error updating note. Please try again later.";
    }
}

// Retrieve note details from the database
$sql = "SELECT * FROM notes WHERE id = '$note_id' AND user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$note_title = $row['note_title'];
$note_content = $row['note_content'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Update Note</title>
</head>
<body>
    <h2>Update Note</h2>
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
        <input type="text" id="note_title" name="note_title" value="<?php echo $note_title; ?>" required><br><br>

        <label for="note_content">Note Content:</label><br>
        <textarea id="note_content" name="note_content" rows="4" cols="50" required><?php echo $note_content; ?></textarea><br><br>
        <input type="submit" name="update_note" value="Update Note">
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
