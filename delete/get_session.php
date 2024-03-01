<?php
// Start the session
session_start();

// Check if the session variable is set
if (isset($_SESSION['user'])) {
    // Return the session variable value
    echo $_SESSION['user'];
} else {
    // Return an error message if the session variable is not set
    echo "Session variable not set";
}
?>
