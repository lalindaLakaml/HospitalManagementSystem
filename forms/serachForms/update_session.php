<?php
// Start the session
session_start();

// Check if set_variable is provided and set its value in the session
if (isset($_POST['section'])) {
    $_SESSION['section'] = $_POST['section'];
    echo "Session variable updated successfully!";
} else {
    echo "Error: New value not provided";
}
?>
