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

// Retrieve note details from the database
$sql = "SELECT * FROM notes WHERE id = '$note_id' AND user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
    header("Location: dashboard.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
$note_content = $row['note_content'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Read Note</title>
</head>
<body>
    <h2>Note Content</h2>
    <p><?php echo $note_content; ?></p>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
