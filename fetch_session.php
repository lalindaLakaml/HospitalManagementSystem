<?php
// Start the session
session_start();

// Check if the session variable is set
if (isset($_SESSION['section'])) {
    // Return the session variable value
    echo $_SESSION['section'];
} else {
    // Return an error message if the session variable is not set
    echo "Session variable not set";
}
?>
