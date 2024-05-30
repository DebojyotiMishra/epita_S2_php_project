<?php
// Start session
session_start();

// Include database connection and helper functions
include('includes/db.php');
include('includes/functions.php');

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    // If user is logged in, redirect to dashboard
    header("Location: pages/dashboard.php");
} else {
    // If user is not logged in, redirect to login page
    header("Location: pages/login.php");
}
?>