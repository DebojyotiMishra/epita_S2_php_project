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

// Delete note from the database
$sql = "DELETE FROM notes WHERE id = '$note_id' AND user_id = '$user_id'";
if(mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Note deleted successfully!";
    $_SESSION['msg_type'] = "success";
} else {
    $_SESSION['message'] = "Error deleting note. Please try again later.";
    $_SESSION['msg_type'] = "error";
}

// Redirect to dashboard
header("Location: dashboard.php");
?>
