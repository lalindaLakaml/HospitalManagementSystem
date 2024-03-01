<?php
// Start the session
session_start();

// Check if the section value is sent via POST request
if (isset($_POST['section'])) {
    // Set the session variable
    $_SESSION['section'] = $_POST['section'];
    echo "Session variable set successfully";
} else {
    echo "Failed to set session variable";
}
?>
