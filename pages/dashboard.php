<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('../includes/db.php');

// Check if a message is set
if (isset($_SESSION['message'])) {
    // Choose the color based on the message type
    $color = $_SESSION['msg_type'] === "success" ? "green" : "red";

    // Display the message
    echo "<p style='color: {$color};'>{$_SESSION['message']}</p>";

    // Unset the message
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}

// Retrieve user's notes from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM notes WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to your Dashboard</h2>
    <h3>My Notes</h3>
    <div class="create-note">
        <img src="../images/add_note.svg" alt="">
        <h3><a href="create_note.php">Create a new note</a></h3>
    </div>
    <ul>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='card'>";
        echo "<h4>{$row['note_title']}</h4>";
        echo "<div class='card-body'>{$row['note_content']}</div>";
        echo "<div class='card-options'>";
        echo "<a href='read_note.php?id={$row['id']}' class='card-option'><img src=\"../images/eye.svg\" alt=\"\"></a>";
        echo "<a href='update_note.php?id={$row['id']}' class='card-option'><img src=\"../images/edit.svg\" alt=\"\"></a>";
        echo "<a href='delete_note.php?id={$row['id']}' class='card-option'><img src=\"../images/trash.svg\" alt=\"\"></a>";
        echo "</div>";
        echo "</li>";
    }
    ?>
    </ul>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
