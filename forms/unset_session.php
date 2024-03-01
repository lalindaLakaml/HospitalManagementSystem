<?php
// Start the session
session_start();

// Check if unset_variable is provided and unset the session variable
if (isset($_POST['section']) && $_POST['section'] == true) {
    // Unset the session variable
    unset($_SESSION['section']);
    echo "Session variable unset successfully!";
} else {
    echo "Error: Unset variable not provided";
}
?>
