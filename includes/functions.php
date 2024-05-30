<?php
// Function to securely hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify the password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}
?>
