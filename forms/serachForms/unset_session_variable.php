<?php
// Start the session
session_start();

// Unset the session variable
unset($_SESSION['section']);

// Send a response indicating success
echo "Session variable 'section' unset successfully";
?>